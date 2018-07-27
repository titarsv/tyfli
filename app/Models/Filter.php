<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use App\Models\Attribute;
use App\Models\Categories;

class Filter
{
    protected $category = null;
    protected $product_attributes = null;
    protected $path = '';
    protected $params = [];
    protected $filtered = [];
    protected $price = [];
    protected $min_price = 0;
    protected $max_price = 0;

    /**
     * Установка текущей категории
     *
     * @param $cat_id
     * @return $this
     */
    public function setCategory($cat_id){
        $this->category = Categories::find($cat_id);
        $this->setProductAttributes();
        $this->setPrice();
        return $this;
    }

    /**
     * Установка параметров
     *
     * @param $request_params
     * @return $this
     */
    public function setRequest($request_params){
        $this->params = $request_params;
        $this->setPrice();
        return $this;
    }

    /**
     * Установка параметров фильтрации из ЧПУ
     *
     * @param $path
     * @return $this
     */
    public function setFilterPath($path){
        $this->path = $path;
        $this->setFiltered();
        return $this;
    }

    /**
     * Получить данные для фильтрации товаров
     *
     * @return array
     */
    public function getFilter(){
        return $this->filtered;
    }

    /**
     * Получить фильтр по цене
     *
     * @return array
     */
    public function getPrice(){
        return $this->price;
    }

    /**
     * Подгрузка атрибутов категории из БД
     */
    protected function setProductAttributes(){
        if(empty($this->category)) {
            $this->product_attributes = $this->category->attributes()->with('values')->get();
        }
    }

    /**
     * Установка фильтра по цене
     *
     * @return $this
     */
    protected function setPrice(){
        $categories = new Categories();
        if(!empty($this->category)){
            $this->min_price = $categories->min_price($this->category->id);
            $this->max_price = $categories->max_price($this->category->id);

            $price = [];
            $price[0] = empty($this->params['price_min']) ? 0 : $this->params['price_min'];
            $price[1] = empty($this->params['price_max']) || $this->params['price_max'] > $this->max_price ? $this->max_price : $this->params['price_max'];

            if(!empty($this->params['price'])){
                $price = explode('-', $this->params['price']);
            }

            if(!empty($filters) && strpos($filters, 'price-') !== false){
                $filter_parts = explode('_', $filters);
                foreach($filter_parts as $part){
                    if(strpos($part, 'price-') !== false){
                        $price = explode('-', str_replace('price-', '', $part));
                    }
                }
            }

            $this->price = $price;
        }

        return $this;
    }

    public function getFilterAttributes(){
        if(empty($this->category)){
            return [];
        }else{
            $filter = $this->filtered;
            $category_id = $this->category->id;
            $alias = $this->category->url_alias;
        }

        $attrs = [];

        foreach($this->product_attributes as $key => $attribute){
            $values = [];

            if($attribute->filter_type == 'range_list'){
                $values = $this->getFilterRanges($attribute, $filter, $category_id, $price);
            }elseif(isset($filter[$attribute->id])){
                foreach ($filter[$attribute->id] as $val_id){
                    $val = $attribute->values->first(function ($value, $key)  use ($val_id) {
                        return $value->id == $val_id;
                    });
                    $values[$val->id] = [
                        'name' => $val->name,
                        'value' => $val->value,
                        'checked' => true,
                        'url' => $this->getFilterUrl($alias, $filter, $val, $this->product_attributes, $price)
                    ];
                }
            }else{
                foreach($attribute->values as $i => $attribute_value){
                    $attr_filter = $filter + [$attribute->id => [$attribute_value->id]];
                    $count = $categories->get_products_count($category_id, $attr_filter, $price);
                    if($count){
                        $values[$attribute_value->id] = [
                            'name' => $attribute_value->name,
                            'value' => $attribute_value->value,
                            'checked' => false,
                            'count' => $count,
                            'url' => $this->getFilterUrl($alias, $filter, $attribute_value, $this->product_attributes, $price)
                        ];
                    }
                }
            }

            if(count($values)){
                $attrs[$attribute->id] = [
                    'name' => $attribute->name.(!empty($attribute->unit) ? ', '.$attribute->unit : ''),
                    'slug' => $attribute->slug,
                    'values' => $values
                ];
            }
        }

        return $attrs;
    }

    /**
     * Генерация ЧПУ URL для фильтров
     *
     * @param $alias
     * @param $filter
     * @param $attribute_value
     * @param $product_attributes
     * @param $price
     * @return string
     */
    protected function getFilterUrl($alias, $filter, $attribute_value, $product_attributes, $price){
        $url = '/'.$alias;
        $search = '';
        if(isset($filter[$attribute_value->attribute_id]) && in_array($attribute_value->id, $filter[$attribute_value->attribute_id])){
            unset($filter[$attribute_value->attribute_id][array_search($attribute_value->id,$filter[$attribute_value->attribute_id])]);
        }else{
            $filter[$attribute_value->attribute_id][] = $attribute_value->id;
        }

        asort($filter);

        foreach ($filter as $attr_id => $values){
            if(!empty($values)){
                asort($values);
                $attr = $product_attributes->find($attr_id);
                if(!empty($search)){
                    $search .= '_';
                }
                $search .= str_replace(array('#', '-', '_', '?'), '', $attr->slug);
                foreach ($values as $value_id){
                    $value = $attr->values->find($value_id);
                    $search .= '-'.str_replace(array('#', '-', '_', '?'), '', $value->value);
                }
            }
        }

        if(!empty($search)){
            $url .= '/'.$search;
        }

        return $url;
    }

    /**
     * Генерация ценовых диапазонов
     *
     * @param $min_price
     * @param $max_price
     * @param $price
     * @param $category_id
     * @param $attr_filter
     * @return array
     */
    protected function getPriceRanges($min_price, $max_price, $price, $category_id, $attr_filter){
        $values = [];
        $categories = new Categories;

        $step = ($max_price - $min_price) / 6;
        $round = 8;
        while (round($step, $round) > 0){
            $round--;
        }
        $step = round($step, $round+1);

        for($i=1; $i<6; $i++){
            if($i == 1){
                $size = '< ' . ($min_price + $step * $i);
                $fprice = [0, $min_price + $step * $i];
                $id = '0-' . ($min_price + $step * $i);
            }elseif($i == 5){
                $size = '> ' . ($min_price + $step * ($i-1));
                $fprice = [$min_price + $step * ($i-1), $max_price];
                $id = ($min_price + $step * ($i-1)) . '-' . $max_price;
            }else{
                $size = ($min_price + $step * ($i-1)) . ' - ' . ($min_price + $step * $i);
                $fprice = [$min_price + $step * ($i-1), ($min_price + $step * $i)];
                $id = str_replace(' ', '', $size);
            }

            if($price[0] > 0 || $price[1] < $max_price){
                if($fprice == $price){
                    $values[$id] = [
                        'name' => $size,
                        'checked' => true,
                        'url' => ''
                    ];
                }
            }else{
                $count = $categories->get_products_count($category_id, $attr_filter, $fprice);
                if($count){
                    $values[$id] = [
                        'name' => $size,
                        'checked' => false,
                        'count' => $count,
                        'url' => ''
                    ];
                }
            }
        }

        return $values;
    }

    /**
     * Генерация ЧПУ URL для фильтра по цене
     */
    protected function getPriceFilterUrl(){

    }

    /**
     * Установка структурированного фиьтра
     *
     * @return $this
     */
    protected function setFiltered(){
        $filters = $this->path;
        $filter = [];
        $attr = new Attribute();

        if (isset($this->params['filter_attributes']) && $this->params['filter_attributes'] !== null) {
            foreach ($this->params['filter_attributes'] as $attribute_id => $value) {
                $cattr = $attr->find($attribute_id);

                if(isset($cattr->filter_type) && $cattr->filter_type == 'range_list'){
                    foreach ($value['value'] as $attribute_value => $on) {
                        $filter[$attribute_id] = $this->getFiltersForRange($attribute_value, $cattr->values);
                    }
                }else{
                    foreach ($value['value'] as $attribute_value_id => $on) {
                        $filter[$attribute_id][] = $attribute_value_id;
                    }
                }
            }
        }elseif(!empty($filters)){
            $filter = $this->prepared_filters($filters);
            $filter = $this->parseValuesIds($filter);
        }
        $this->filtered = $filter;

        return $this;
    }

    /**
     * Получение ID фильтров по их слагу
     *
     * @param $filter
     * @return array
     */
    protected function parseValuesIds($filter){
        $new_filter = [];
        $attr = new Attribute();
        foreach ($filter as $attr_slug => $values){
            if($attr_slug != 'price') {
                $attribute = $attr->where('slug', $attr_slug)->first();
                if ($attribute !== null) {
                    foreach ($values as $value_slug) {
                        if ($attribute->name == 'Цвет') {
                            $value_slug = '#' . $value_slug;
                        }
                        $val = $attribute->values()->where('value', $value_slug)->first();
                        if ($val !== null) {
                            $new_filter[$attribute->id][] = $val->id;
                        }
                    }
                }
            }
        }
        return $new_filter;
    }

    protected function getFiltersForRange($attribute_value, $all_values){
        $filters = [];

        if($attribute_value[0] == '<'){
            $value = (float)str_replace('<', '', $attribute_value);
            foreach ($all_values as $val){
                if((float)$val->value < $value){
                    $filters[] = $val->id;
                }
            }
        }else if($attribute_value[0] == '>'){
            $value = (float)str_replace('>', '',$attribute_value);
            foreach ($all_values as $val){
                if((float)$val->value > $value){
                    $filters[] = $val->id;
                }
            }
        }else{
            $values = explode('-', $attribute_value);

            foreach ($all_values as $val){
                if((float)$val->value >= (float)$values[0] && (float)$val->value <= (float)$values[1]){
                    $filters[] = $val->id;
                }
            }
        }

        return $filters;
    }

    protected function getFilterRanges($attribute, $filter, $category_id, $price){
        $values = [];

        $min = $attribute->values->min('value');
        $max = $attribute->values->max('value');

        $step = ($max - $min) / 7;

        $round = 8;

        while (round($step, $round) > 0){
            $round--;
        }

        $step = round($step, $round+1);

        $categories = new Categories;

        for($i=1; $i<7; $i++){
            if($i == 1){
                $size = '< ' . ($min + $step * $i);
            }elseif($i == 6){
                $size = '> ' . ($min + $step * ($i-1));
            }else{
                $size = ($min + $step * ($i-1)) . ' - ' . ($min + $step * $i);
            }

            $id = str_replace(' ', '', $size);
            $f = $this->getFiltersForRange($id, $attribute->values);

            if(isset($filter[$attribute->id])){
                if(!empty($f) && $f == $filter[$attribute->id]){
                    $values[$id] = [
                        'name' => $size,
                        'checked' => true
                    ];
                }
            }elseif(!empty($f)){
                $attr_filter = $filter + [$attribute->id => $f];
                $count = $categories->get_products_count($category_id, $attr_filter, $price);
                if($count){
                    $values[$id] = [
                        'name' => $size,
                        'checked' => false,
                        'count' => $count
                    ];
                }
            }
        }

        return $values;
    }

    /**
     * Парсинг фильтров
     *
     * @param string $string
     * @return array
     */
    protected function prepared_filters($string = ''){
        $data = explode('_', $string);

        $filters = [];
        foreach ($data as $filter){
            $filter_data = explode('-', $filter);
            if(count($filter_data) >= 2) {
                $key = $filter_data[0];
                array_splice($filter_data, 0, 1);
                $filters[$key] = $filter_data;
            }
        }

        return $filters;
    }
}
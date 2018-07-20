<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Models\Products;
use App\Models\Modules;
use App\Models\Moduleslideshow;
use App\Models\Categories;
use App\Models\Blog;
use App\Models\News;
use App\Http\Requests;
use App\Models\Image;
use App\Models\HTMLContent;
use App\Models\Attribute;


class MainController extends Controller
{
    public function index(Attribute $attribute, Categories $categories, Image $image, Modules $modules, Moduleslideshow $slideshow)
    {
	    $brands = $attribute->where('name', 'Бренд')->first()->values;
        $women_new_prod = $categories->get_products(1, null, [8 => [113]], ['id', 'desc'], 3, []);
        $men_new_prod = $categories->get_products(2, null, [8 => [113]], ['id', 'desc'], 3, []);
        $big_sizes = $categories->get_products(11, null, [1 => [11]], ['id', 'desc'], 2, []);
        $blog = new News();
        $articles = $blog->where('published', 1)->orderBy('updated_at', 'desc')->paginate(12);

        return view('index')
	        ->with('women_new_prod', $women_new_prod)
	        ->with('men_new_prod', $men_new_prod)
	        ->with('big_sizes', $big_sizes)
	        ->with('brands', $brands)
	        ->with('articles', $articles)
            ->with('slideshow', $slideshow->all());
    }

    /**
     * @param Categories $categories
     * @param Products $products
     * @param Blog $blog
     * @param HTMLContent $html
     * @param null $alias
     * @param null $filters
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function route(Categories $categories, Products $products, News $news, HTMLContent $html, $alias = null, $filters = null){
        $parts = explode('/', str_replace('http://', '', url()->current()));
        $part = end($parts);

        if($categories->where('url_alias', $part)->count()){
            return redirect()->action(
                'CategoriesController@show', ['alias' => $part], 301
            );
        }elseif(count($parts) > 2 && $products->where('url_alias', $part)->count()){
            return redirect()->action(
                'ProductsController@show', ['alias' => $part], 301
            );
        }elseif(count($parts) == 2 && $news->where('url_alias', $part)->count()){
            return redirect()->action(
                'NewsController@show', ['alias' => $part], 301
            );
        }elseif(count($parts) == 2 && $html->where('url_alias', $part)->count()){
            return redirect()->action(
                'HTMLContentController@show', ['alias' => $part], 301
            );
        }elseif(in_array(substr($part, -4), ['.jpg', '.png', 'jpeg'])){
            $image = new Image();
            return redirect($image->first()->url(), 301);
        }

        return abort(404);
    }
}

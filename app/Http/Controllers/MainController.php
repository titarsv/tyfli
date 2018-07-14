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
        //$articles = Blog::where('published', 1)->orderBy('updated_at', 'desc')->take(4)->get();
//        $blog = new Blog();
//        $articles = $blog->get_newest();
//        $news = NEWS::where('published', 1)->orderBy('updated_at', 'desc')->take(4)->get();
//
//        setlocale(LC_TIME, 'RU');

//        foreach ($articles as $key => $article) {
//            $articles[$key]->date = iconv("cp1251", "UTF-8", $articles[$key]->updated_at->formatLocalized('%d %b %Y'));
//        }

//        foreach ($news as $key => $article) {
//            $news[$key]->date = iconv("cp1251", "UTF-8", $news[$key]->updated_at->formatLocalized('%d %b %Y'));
//        }

	    $brands = $attribute->where('name', 'Бренд')->first()->values;

        return view('index')
	        ->with('brands', $brands);
//            ->with('settings', Settings::find(1))
//            ->with('actions', Products::orderBy('created_at', 'desc')->where('stock', 1)->whereNotNull('action')->where('action', '!=', '')->take(24)->get())
//            ->with('articles', $articles)
//            ->with('slideshow', $slideshow->all())
//            ->with('news', $news)
//            ->with('categories', $categories->select('id', 'name', 'url_alias')->where('parent_id', 20)->get());
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

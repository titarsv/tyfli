<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\Blog;
use App\Models\User;
use App\Models\Settings;
use App\Models\Image;
use Carbon\Carbon;


class BlogController extends Controller
{
    public $articles;
    public $users;
    public $settings;
    public $images;
    public $curent_user;

    protected $rules = [
        'title' => 'required|unique:blog',
        'text' => 'required',
        'url_alias' => 'required|unique:blog',
        'image_id' => 'required',
    ];
    protected $messages = [
        'title.required' => 'Поле должно быть заполнено!',
        'title.unique' => 'Поле должно быть уникальным!',
        'text.required' => 'Поле должно быть заполнено!',
        'url_alias.required' => 'Поле должно быть заполнено!',
        'url_alias.unique' => 'Поле должно быть уникальным!',
        'image_id.required' => 'Поле должно быть заполнено!',
    ];

    public function __construct(Blog $articles, User $users, Settings $settings, Image $images)
    {
        $this->articles = $articles;
        $this->settings = $settings;
        $this->users = $users;
        $this->settings = $settings;
        $this->images = $images;
        $this->curent_user = Sentinel::getUser();
    }

    public function index()
    {
        $articles = $this->articles->orderBy('id', 'Desc')->paginate(10);
        return view('admin.blog.index')->with('articles', $articles);
    }

    public function create()
    {
        $settings = $this->settings->find(1);

        $image_size = [
            'width' => $settings->blog_image_width,
            'height' => $settings->blog_image_height
        ];
        return view('admin.blog.create')
            ->with('image_size', $image_size);
    }

    public function store(Request $request)
    {
        $rules = $this->rules;
        $messages = $this->messages;

        $validator = Validator::make($request->all(), $rules, $messages);
        $image_id = $request->image_id ? $request->image_id : 1;
        $href = $this->images->find($image_id)->href;

        $user_id = $this->curent_user->id;
        $request->merge(['href' => $href, 'user_id' => $user_id]);

        if($validator->fails()){
            return redirect()
                ->back()
                ->withInput()
                ->with('message-error', 'Сохранение не удалось! Проверьте форму на ошибки!')
                ->withErrors($validator);
        }

        $request = $request->only([
            'user_id',
            'url_alias',
            'title',
            'subtitle',
            'published',
            'text',
            'image_id',
            'category',
            'meta_title',
            'meta_keywords',
            'meta_description'
        ]);

        $article = $this->articles;
        $article->fill($request);
        $article->text = htmlentities($request['text']);
        $article->save();

        return redirect('/admin/blog')
            ->with('articles', $this->articles->paginate(10))
            ->with('message-success', 'Статья ' . $article->title . ' успешно добавлена.');
    }

    public function edit($id)
    {
        $article = $this->articles->findOrFail($id);
        $settings = $this->settings->find(1);

        $image_size = [
            'width' => $settings->blog_image_width,
            'height' => $settings->blog_image_height
        ];

        return view('admin.blog.edit')
            ->with('article', $article)
            ->with('image_size', $image_size);
    }

    public function update($id, Request $request)
    {
        $rules = $this->rules;
        $rules['title'] = 'required|unique:blog,title,'.$id.'';
        $rules['url_alias'] = 'required|unique:blog,url_alias,'.$id;

        $messages = $this->messages;

        $validator = Validator::make($request->all(), $rules, $messages);
        $article = $this->articles->find($id);

        $image_id = $request->image_id ? $request->image_id : $article->image_id;
        $href = $this->images->find($image_id)->href;

        $user_id = $this->curent_user->id;
        $request->merge(['href' => $href, 'user_id' => $user_id]);

        if($validator->fails()){
            return redirect()
                ->back()
                ->withInput()
                ->with('message-error', 'Сохранение не удалось! Проверьте форму на ошибки!')
                ->withErrors($validator);
        }

        $request = $request->only([
            'user_id',
            'url_alias',
            'title',
            'subtitle',
            'published',
            'text',
            'image_id',
            'category',
            'meta_title',
            'meta_keywords',
            'meta_description'
        ]);

        $article->fill($request);
        $article->text = htmlentities($request['text']);
        $article->save();

        return redirect('/admin/blog')
            ->with('articles', $this->articles->paginate(10))
            ->with('message-success', 'Статья ' . $article->title . ' успешно обновлена.');
    }

    public function destroy($id)
    {
        $article = $this->articles->find($id);

        $title = $article->title;

        $article->delete();

        return redirect('/admin/blog')
            ->with('articles', $this->articles->paginate(10))
            ->with('message-success', 'Статья ' . $title . ' успешно удалена.');
    }

    public function show($alias, Blog $blog)
    {
        $article = $blog->where('url_alias', $alias)->first();
        setlocale(LC_TIME, 'RU');
        $article->date = iconv("cp1251", "UTF-8", $article->updated_at->formatLocalized('%d %b %Y'));

        $recommended = $blog->get_recommended(4, $article->id);

        return view('public.blog_item')
            ->with('article', $article)
            ->with('recommended', $recommended);
    }

    public function showAll(Blog $blog)
    {
        $articles = $blog->where('published', 1)->orderBy('updated_at', 'desc')->get();
        setlocale(LC_TIME, 'RU');

        foreach ($articles as $key => $article) {
            $articles[$key]->date = iconv("cp1251", "UTF-8", $articles[$key]->updated_at->formatLocalized('%d %b %Y'));
        }

        return view('public.blog')
            ->with('category', '')
            ->with('articles', $articles);
    }

    public function showCat($category, Blog $blog)
    {
        $articles = $blog->where('published', 1)->where('category', $category)->orderBy('updated_at', 'desc')->get();
        setlocale(LC_TIME, 'RU');

        foreach ($articles as $key => $article) {
            $articles[$key]->date = iconv("cp1251", "UTF-8", $articles[$key]->updated_at->formatLocalized('%d %b %Y'));
        }

        return view('public.blog')
            ->with('category', $category)
            ->with('articles', $articles);
    }
}

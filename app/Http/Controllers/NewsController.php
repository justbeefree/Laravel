<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $modelCategory = app(Category::class);

        $arCategory = [];
        foreach ($modelCategory->getCategories() as $category) {
            $arCategory[$category->code] = [
                'id' => $category->id,
                'name' => $category->name,
                'description' => $category->description
            ];
        }

        return view('news.index', ['category' => $arCategory]);
    }


    public function list($category_code)
    {

        $modelNews = app(News::class);
        $modelCategory = app(Category::class);

        $category = $modelCategory->getCategoryByCode($category_code);
        $arNews = [];
        foreach ($modelNews->getNewsByCategoryCode($category->id) as $news) {
            $arNews[] = [
                'id' => $news->id,
                'name' => $news->name,
                'previewText' => $news->preview_text,
                'detailText' => $news->detail_text,
                'images' => $news->images,
                'category' => $category->code
            ];
        }

        //если есть такая категория
        if ($category) {
            return view('news.list', [
                'news' => $arNews,
                'category' => $category
            ]);
        } else {
            return redirect(route("main"));
        }
    }

    public function create()
    {
        return view("news.create");
    }

    public function store(Request $request)
    {
        $data = $request->only(['name', 'previewText', 'detailText', 'status', 'image']);

        $request->validate(
            [
                'name' => ['required', 'string'],
                'previewText' => ['required', 'string'],
                'detailText' => ['required', 'string'],
            ]
        );

        $name = $request->input('name');
        $previewText = $request->input('previewText');
        $detailText = $request->input('detailText');
        $status = $request->input('status');

        session(['alert' => __("Новость успешно добавлена")]);

        return redirect(route("news.create"));
    }

    public function show($category_code, $id)
    {

        $modelCategory = app(Category::class);

        $category = $modelCategory->getCategoryByCode($category_code);

        $modelNews = app(News::class);
        $news = $modelNews->getNewsByCategoryCodeAndNewsId($category->id, $id);
        if ($news) {
            $arNews = [
                'id' => $news->id,
                'name' => $news->name,
                'previewText' => $news->preview_text,
                'detailText' => $news->detail_text,
                'images' => $news->images,
                'category' => $category->code
            ];
        }
        if (!empty($news)) {
            return view("news.detail", ['news' => $arNews]);
        } else {
            return redirect(route("news"));
        }
    }

    public function edit()
    {
        return "Страница редактирования новости";
    }

}

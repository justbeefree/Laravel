<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Queries\CategoriesQueryBuilder;
use App\Queries\NewsQueryBuilder;
use App\Queries\SourcesQueryBuilder;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(NewsQueryBuilder $newsQueryBuilder, SourcesQueryBuilder $sourcesQueryBuilder, CategoriesQueryBuilder $categoriesQueryBuilder)
    {
        $news = $newsQueryBuilder->getAllNews();
        $category = $categoriesQueryBuilder->getAllCategoriesArray();
        $source = $sourcesQueryBuilder->getSources();

        return view('admin.news.index', compact('source', 'news', 'category'));
    }

    public function create(SourcesQueryBuilder $sourcesQueryBuilder, CategoriesQueryBuilder $categoriesQueryBuilder)
    {
        $source = $sourcesQueryBuilder->getSources();
        $category = $categoriesQueryBuilder->getAllCategoriesArray();
        return view('admin.news.create', compact('source', 'category'));
    }

    public function store(News $news, Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string'],
                'previewText' => ['required', 'string'],
                'detailText' => ['required', 'string'],
                'category' => ['required', 'integer'],
                'source' => ['required', 'integer']
            ]
        );

        $news->name = $request->input('name');
        $news->preview_text = $request->input('previewText');
        $news->detail_text = $request->input('detailText');
        $news->images = $request->input('images');
        $news->active = $request->boolean('status');
        $news->category_id = $request->input('category');
        $news->source_id = $request->input('source');
        $news->save();

        session(['alert' => __("Новость успешно создана")]);

        return redirect(route("admin.news.index"));
    }

    public function edit(News $news, SourcesQueryBuilder $sourcesQueryBuilder, CategoriesQueryBuilder $categoriesQueryBuilder)
    {
        $source = $sourcesQueryBuilder->getSources();
        $category = $categoriesQueryBuilder->getAllCategoriesArray();
        return view('admin.news.edit', compact('news', 'source', 'category'));
    }

    public function update(News $news, Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string'],
                'previewText' => ['required', 'string'],
                'detailText' => ['required', 'string'],
                'category' => ['required', 'integer'],
                'source' => ['required', 'integer']
            ]
        );

        $news->name = $request->input('name');
        $news->preview_text = $request->input('previewText');
        $news->detail_text = $request->input('detailText');
        $news->images = $request->input('images');
        $news->active = $request->boolean('status');
        $news->category_id = $request->input('category');
        $news->source_id = $request->input('source');
        $news->save();

        session(['alert' => __("Новость успешно сохранена")]);

        return redirect(route("admin.news.index"));
    }

    public function destroy(News $news)
    {
        $news->delete();
        session(['alert' => __("Новость " . $news->id . " успешно удалена")]);
    }
}

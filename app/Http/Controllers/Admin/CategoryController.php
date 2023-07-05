<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Queries\CategoriesQueryBuilder;
use App\Queries\SourcesQueryBuilder;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Category\Store;
use App\Http\Requests\Category\Update;

class CategoryController extends Controller
{
    public function index(CategoriesQueryBuilder $categoriesQueryBuilder, SourcesQueryBuilder $sourcesQueryBuilder)
    {
        $category = $categoriesQueryBuilder->getAllCategories();
        $source = $sourcesQueryBuilder->getSources();
        return view('admin.category.index', compact('source', 'category'));
    }

    public function create(SourcesQueryBuilder $sourcesQueryBuilder)
    {
        $source = $sourcesQueryBuilder->getSources();
        return view('admin.category.create', compact('source'));
    }

    public function store(Category $category, Store $request)
    {
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->active = $request->boolean('status');
        $category->code = $request->input('code');
        $category->source_id = $request->input('source');
        $category->save();

        session(['alert' => __("Категория успешно создана")]);

        return redirect(route('admin.category.index'));
    }

    public function edit(Category $category, SourcesQueryBuilder $sourcesQueryBuilder)
    {
        $source = $sourcesQueryBuilder->getSources();
        return view('admin.category.edit', compact('category', 'source'));
    }

    public function update(Category $category, Update $request)
    {
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->active = $request->boolean('status');
        $category->code = $request->input('code');
        $category->source_id = $request->input('source');
        $category->save();

        session(['alert' => __("Категория успешно сохранена")]);

        return redirect(route("admin.category.index"));
    }

    public function destroy(Category $category)
    {

        /**
         * проверка id перед удалением  категории
         * категорию с id 1030 удалить нельзя т.к. она используется как дефолтная.
         * и к ней идет перепривязка новостей после удаления других категорий
         */
        if ($category->id !== 1030) {
            $category->news()->update(['category_id' => 1030]);
            $category->delete();
            session(['alert' => __("Категория " . $category->id . " успешно удалена")]);
        } else {
            session(['alert' => __("Категорию " . $category->id . " удалить нельзя!"), 'status' => "danger"]);
        }
    }
}

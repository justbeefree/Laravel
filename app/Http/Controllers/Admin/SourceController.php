<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Source;
use App\Queries\CategoriesQueryBuilder;
use App\Queries\NewsQueryBuilder;
use App\Queries\SourcesQueryBuilder;
use Illuminate\Http\Request;
use App\Http\Requests\Source\Store;
use App\Http\Requests\Source\Update;

class SourceController extends Controller
{
    public function index(NewsQueryBuilder $newsQueryBuilder, SourcesQueryBuilder $sourcesQueryBuilder, CategoriesQueryBuilder $categoriesQueryBuilder)
    {

        $source = $sourcesQueryBuilder->getAllSources();
        return view('admin.source.index', compact('source'));
    }

    public function create()
    {
        return view('admin.source.create');
    }

    public function store(Source $source, Store $request)
    {

        $source->name = $request->input('name');
        $source->link = $request->input('link');
        $source->save();

        session(['alert' => __("Источник успешно добавлен")]);

        return redirect(route("admin.source.index"));
    }

    public function edit(Source $source)
    {
        return view('admin.source.edit', compact('source'));
    }

    public function update(Source $source, Update $request)
    {

        $source->name = $request->input('name');
        $source->link = $request->input('link');
        $source->save();

        session(['alert' => __("Источник успешно сохранен")]);

        return redirect(route("admin.source.index"));
    }

    public function destroy(Source $source)
    {

        /**
         * проверка id перед удалением  источника
         * источника с id 1030 удалить нельзя т.к. она используется как дефолтный.
         * и к нему идет перепривязка новостей и категорий после удаления других источников
         */
        if ($source->id !== 1030) {
            $source->news()->update(['source_id' => 1030]);
            $source->category()->update(['source_id' => 1030]);
            $source->delete();
            session(['alert' => __("Источник " . $source->id . " успешно удален")]);
        } else {
            session(['alert' => __("Источник " . $source->id . " удалить нельзя!"), 'status' => "danger"]);
        }
    }
}

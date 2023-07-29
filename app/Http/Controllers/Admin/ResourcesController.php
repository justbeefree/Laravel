<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Resource\Store;
use App\Http\Requests\Resource\Update;
use App\Models\Resource;
use App\Queries\ResourcesQueryBuilder;

class ResourcesController extends Controller
{
    public function index(ResourcesQueryBuilder $resourcesQueryBuilder)
    {

        $resources = $resourcesQueryBuilder->getResources();
        return view('admin.resources.index', compact('resources'));
    }

    public function create()
    {
        return view('admin.resources.create');
    }

    public function store(Resource $resource, Store $request)
    {

        $resource->link = $request->input('link');
        $resource->save();

        session(['alert' => __("Ресурс успешно добавлен")]);

        return redirect(route("admin.resource.index"));
    }

    public function edit(Resource $resource)
    {
        return view('admin.resources.edit', compact('resource'));
    }

    public function update(Resource $resource, Update $request)
    {

        $resource->link = $request->input('link');
        $resource->save();

        session(['alert' => __("Ресурс успешно сохранен")]);

        return redirect(route("admin.resource.index"));
    }

    public function destroy(Resource $resource)
    {
        $resource->delete();
        session(['alert' => __("Ресурс " . $resource->id . " успешно удален")]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParser;
use App\Models\Resource;
use App\Services\Contracts\Parser;

class ParserController extends Controller
{


    public  function index(Resource $resource, Parser $parser)
    {

//        $parser->setLink($resource->link)->saveParseData();
        dispatch(new NewsParser($resource->link));

        session(['alert' => __("Парсинг для ресурса " . $resource->id . " успешно запущен")]);
    }
}

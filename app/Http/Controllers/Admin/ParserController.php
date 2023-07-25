<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contracts\Parser;
use Illuminate\Http\Request;

class ParserController extends Controller
{


    public  function index(Request $request, Parser $parser): string
    {
        $url = "https://news.rambler.ru/rss/tech/";

        $parser->setLink($url)->saveParseData();

        return __("Данные сохранены");
    }
}

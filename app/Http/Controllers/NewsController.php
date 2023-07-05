<?php

namespace App\Http\Controllers;

use App\Queries\CategoriesQueryBuilder;
use App\Queries\NewsQueryBuilder;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;

class NewsController extends Controller
{
    public function index(CategoriesQueryBuilder $categoriesQueryBuilder)
    {
        $obCategory = $categoriesQueryBuilder->getCategories();

        $arCategory = [];
        foreach ($obCategory as $category) {
            $arCategory[$category->code] = [
                'id' => $category->id,
                'name' => $category->name,
                'description' => $category->description
            ];
        }

        return view('news.index', ['category' => $arCategory]);
    }


    public function list($category_code, CategoriesQueryBuilder $categoriesQueryBuilder, NewsQueryBuilder $newsQueryBuilder)
    {
        $category = $categoriesQueryBuilder->getCategoryByCode($category_code);
        $arNews = [];
        foreach ($newsQueryBuilder->getNewsByCategoryCode($category->id) as $news) {
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

    public function show($category_code, $id, CategoriesQueryBuilder $categoriesQueryBuilder, NewsQueryBuilder $newsQueryBuilder)
    {

        $category = $categoriesQueryBuilder->getCategoryByCode($category_code);
        $news = $newsQueryBuilder->getNewsByCategoryCodeAndNewsId($category->id, $id);
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


}

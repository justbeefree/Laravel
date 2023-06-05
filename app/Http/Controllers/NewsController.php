<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{

    private $news = [
        [
            'id' => 1,
            'name' => 'Название новости',
            'previewText' => 'текст анонса',
            'detailText' => 'детальное описание новости',
            'category' => 'category_1'
        ],
        [
            'id' => 2,
            'name' => 'Название новости',
            'previewText' => 'текст анонса',
            'detailText' => 'детальное описание новости',
            'category' => 'category_1'
        ],
        [
            'id' => 3,
            'name' => 'Название новости',
            'previewText' => 'текст анонса',
            'detailText' => 'детальное описание новости',
            'category' => 'category_1'
        ],
        [
            'id' => 4,
            'name' => 'Название новости',
            'previewText' => 'текст анонса',
            'detailText' => 'детальное описание новости',
            'category' => 'category_1'
        ],
        [
            'id' => 5,
            'name' => 'Название новости',
            'previewText' => 'текст анонса',
            'detailText' => 'детальное описание новости',
            'category' => 'category_2'
        ],
        [
            'id' => 6,
            'name' => 'Название новости',
            'previewText' => 'текст анонса',
            'detailText' => 'детальное описание новости',
            'category' => 'category_2'
        ],
        [
            'id' => 7,
            'name' => 'Название новости',
            'previewText' => 'текст анонса',
            'detailText' => 'детальное описание новости',
            'category' => 'category_2'
        ],
        [
            'id' => 8,
            'name' => 'Название новости',
            'previewText' => 'текст анонса',
            'detailText' => 'детальное описание новости',
            'category' => 'category_2'
        ],
        [
            'id' => 9,
            'name' => 'Название новости',
            'previewText' => 'текст анонса',
            'detailText' => 'детальное описание новости',
            'category' => 'category_3'
        ],
        [
            'id' => 10,
            'name' => 'Название новости',
            'previewText' => 'текст анонса',
            'detailText' => 'детальное описание новости',
            'category' => 'category_3'
        ],
        [
            'id' => 11,
            'name' => 'Название новости',
            'previewText' => 'текст анонса',
            'detailText' => 'детальное описание новости',
            'category' => 'category_3'
        ],
        [
            'id' => 12,
            'name' => 'Название новости',
            'previewText' => 'текст анонса',
            'detailText' => 'детальное описание новости',
            'category' => 'category_3'
        ],
        [
            'id' => 13,
            'name' => 'Название новости',
            'previewText' => 'текст анонса',
            'detailText' => 'детальное описание новости',
            'category' => 'category_4'
        ],
        [
            'id' => 14,
            'name' => 'Название новости',
            'previewText' => 'текст анонса',
            'detailText' => 'детальное описание новости',
            'category' => 'category_4'
        ],
        [
            'id' => 15,
            'name' => 'Название новости',
            'previewText' => 'текст анонса',
            'detailText' => 'детальное описание новости',
            'category' => 'category_4'
        ],
        [
            'id' => 16,
            'name' => 'Название новости',
            'previewText' => 'текст анонса',
            'detailText' => 'детальное описание новости',
            'category' => 'category_4'
        ],
        [
            'id' => 17,
            'name' => 'Название новости',
            'previewText' => 'текст анонса',
            'detailText' => 'детальное описание новости',
            'category' => 'category_5'
        ],
        [
            'id' => 18,
            'name' => 'Название новости',
            'previewText' => 'текст анонса',
            'detailText' => 'детальное описание новости',
            'category' => 'category_5'
        ],
        [
            'id' => 19,
            'name' => 'Название новости',
            'previewText' => 'текст анонса',
            'detailText' => 'детальное описание новости',
            'category' => 'category_5'
        ],
        [
            'id' => 20,
            'name' => 'Название новости',
            'previewText' => 'текст анонса',
            'detailText' => 'детальное описание новости',
            'category' => 'category_5'
        ],
    ];

    private $category = [
        'category_1' => [
            'id' => 1,
            'name' => 'Раздел новостей 1',
            'description' => 'Описание раздела 1 новостей',
        ],
        'category_2' => [
            'id' => 2,
            'name' => 'Раздел новостей 2',
            'description' => 'Описание раздела 2 новостей',
        ],
        'category_3' => [
            'id' => 3,
            'name' => 'Раздел новостей 3',
            'description' => 'Описание раздела 3 новостей',
        ],
        'category_4' => [
            'id' => 4,
            'name' => 'Раздел новостей 4',
            'description' => 'Описание раздела 4 новостей',
        ],
        'category_5' => [
            'id' => 5,
            'name' => 'Раздел новостей 5',
            'description' => 'Описание раздела 5 новостей',
        ],
    ];

    public function index()
    {
        return view('news.index', ['category' => $this->category]);
    }


    public function list($category_code)
    {
        //если есть такая категория
        if (array_key_exists($category_code, $this->category)) {
            return view('news.list', [
                'news' => $this->getNewsByCategoryCode($category_code),
                'category' => $this->category[$category_code]
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
        $data = $request->only(['name', 'previewText', 'detailText']);

        return "<div style='text-align: center'>Новость создана успешно! <br>
 <p>Название: " . $data['name'] . " </p>
 <p>Текст анонса: " . $data['previewText'] . "</p>
 <p>Детальный текст: " . $data['detailText'] . "</p>
 <a href='" . route("news.create") . "'> Назад</a></div>";
    }

    public function show($category_code, $id)
    {
        $news = $this->getNewsByCategoryCodeAndNewsId($category_code, $id);

        if (!empty($news)) {
            return view("news.detail", ['news' => $news]);
        } else {
            return redirect(route("news"));
        }
    }

    public function edit()
    {
        return "Страница редактирования новости";
    }


    //возвращает список новостей привязанных к указанной категории
    private function getNewsByCategoryCode($categoryCode)
    {
        $result = [];
        foreach ($this->news as $item) {
            if ($item['category'] == $categoryCode) {
                $result[] = $item;
            }
        }

        return $result;
    }

    private function getNewsByCategoryCodeAndNewsId($categoryCode, $id)
    {

        $result = [];
        foreach ($this->news as $item) {
            if ($item['category'] == $categoryCode && $item['id'] == $id) {
                $result = $item;
            }
        }

        return $result;

    }

}

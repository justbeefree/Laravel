<?php

namespace App\Services;

use App\Services\Contracts\Parser;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade;
use App\Queries\SourcesQueryBuilder;
use App\Models\News;
use App\Models\Category;

class ParserService implements Parser
{
    private string $link;

    public function setLink(string $link): Parser
    {
       $this->link = $link;

       return $this;
    }

    public function saveParseData(): void
    {
        $sourcesQueryBuilder = app( SourcesQueryBuilder::class);



        $xml = Facade::load($this->link);

        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,author,description,pubDate]'
            ]
        ]);

        if ($source = $sourcesQueryBuilder->getSourceByName("Rambler")){
            $category = app(Category::class);
            $category->name = $data['title'];
            $category->description = $data['description'];
            $category->active = true;
            $category->code = str_slug($data['title']);
            $category->source_id = $source->id;
            $category->save();

            foreach ($data['news'] as $arNews){
                $news = app(News::class);
                $news->name = $arNews['title'];
                $news->preview_text = $arNews['description'];
                $news->detail_text = $arNews['description'];
                $news->active = true;
                $news->category_id = $category->id;
                $news->source_id = $source->id;
                $news->save();
            }
        }

    }
}

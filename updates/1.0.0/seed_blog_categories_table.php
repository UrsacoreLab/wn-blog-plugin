<?php

namespace UrsacoreLab\Blog\Updates;

use UrsacoreLab\Blog\Models\Category;
use Winter\Storm\Database\Updates\Seeder;

class SeedMenuTable extends Seeder
{
    protected array $categories = [
        [
            'name' => 'News',
            'slug' => 'news',
        ],
        [
            'name' => 'Articles',
            'slug' => 'articles',
        ],
    ];

    public function run()
    {
        foreach ($this->categories as $item) {
            Category::query()
                ->create($item);
        }
    }
}

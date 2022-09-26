<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 1,
            'category_name' => 'お 菓 子',
        ]);
        DB::table('categories')->insert([
            'id' => 2,
            'category_name' => '飲料',
        ]);
        DB::table('categories')->insert([
            'id' => 3,
            'category_name' => '食材',
        ]);
        DB::table('categories')->insert([
            'id' => 4,
            'category_name' => '衣類',
        ]);
        DB::table('categories')->insert([
            'id' => 5,
            'category_name' => 'その他 ',
        ]);
    }
}

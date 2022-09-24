<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // use HasFactory;
    //categoriesテーブルから::pluckでcategory_nameとidを抽出し、$categoriesに返す関数を作る
    public function getLists()
    {
        $categories = Category::pluck('category_name', 'id');

        return $categories;
    }
    protected $fillable = [
        'id',
        'category_name'
    ];
    //「カテゴリ(category)はたくさんの商品(items)をもつ」というリレーション関係を定義する
    public function items()
    {
        return $this->hasMany(Item::class);
    }
    protected $table = 'Categories';

    protected $primaryKey = 'id';
}

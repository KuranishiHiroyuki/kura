<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
use SoftDeletes;

    public function findId($id)
    {
        return $this->find($id);
    }
    //「商品(item)はカテゴリ(category)に属する」というリレーション関係を定義する
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'price',
        'category_id',
        'detail',
        'deleted_at'
    ];
    protected $table = 'Items';

    protected $primaryKey = 'id';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];
}

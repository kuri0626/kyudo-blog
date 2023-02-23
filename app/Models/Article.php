<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
        return $this::with('category')->orderBy('access_counter', 'DESC')->paginate($limit_count);
    }
    public function tag()
    {
        return $this::with('tag')->orderBy('updated_at','DESC')->get();
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    protected $fillable = [
        'title',
        'body',
        'category_id',
        'tag_id',
        'access_counter',
    ];
    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }
}

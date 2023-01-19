<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    public function getByLimit(int $limit_count = 4)
    {
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
}

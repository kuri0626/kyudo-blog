<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
   //カテゴリー別投稿一覧
   public function index(Category $category)
   {
       return view('categories.index')->with(['articles' => $category->getByCategory()]);
   }
}

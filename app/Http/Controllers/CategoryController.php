<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
   //カテゴリー別投稿一覧ページ
   public function index(Category $category)
   {
       return view('categories.index')->with(['articles' => $category->getByCategory()]);
   }
}

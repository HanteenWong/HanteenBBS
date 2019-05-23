<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Topic;

class CategoriesController extends Controller
{
    public function show(Category $category,Request $request,Topic $topic)
    {
        $topics = $topic->withOrder($request->order)
                        ->where('category_id', $category->id)->paginate(20);
        return view('topics.index',compact('topics','category'));

    }
}

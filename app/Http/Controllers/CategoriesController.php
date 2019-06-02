<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Topic;
use App\User;
use App\link;

class CategoriesController extends Controller
{
    public function show(Category $category,Request $request,Topic $topic,User $user,Link $link)
    {
        $topics = $topic->withOrder($request->order)
                        ->where('category_id', $category->id)->paginate(20);

        // 活跃用户列表
        $active_users = $user->getActiveUsers();
        // 资源链接
        $links = $link->getAllCached();

        return view('topics.index',compact('topics','category','active_users','links'));

    }
}

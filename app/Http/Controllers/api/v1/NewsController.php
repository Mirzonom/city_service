<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Получение списка новостей
     * @return \Illuminate\Http\JsonResponse
     */


    public function index()
    {
        return response()
            ->json(Post::all())
            ->setStatusCode(200, "Posts lists.");
    }
}

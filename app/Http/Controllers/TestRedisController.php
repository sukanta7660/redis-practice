<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TestRedisController extends Controller
{
    public function index($id)
    {

        $article = Blog::findOrfail($id);

        if (!$article) {
            abort(404);
        }

        $this->id = $article->id;

        $storage = Redis::connection();
        if ($storage->zScore('articleViews', 'article:' . $id)) {

            $storage->pipeline( function( $pipe ) {

                $pipe->zIncrBy('articleViews', 1, 'article:' . $this->id);
                $pipe->incr('article:' . $this->id . ':views');
            });

        } else {

            $views = $storage->incr('article' . $this->id . ':views');
            $storage->zIncrBy('articleViews', $views, 'article:' . $this->id);
        }

        // $views = $storage->get('article:' . $this->id . ':views');

        // return 'This is an article with id: ' . $this->id . '. It has ' . $views . ' views.';

        return view('');
    }
}

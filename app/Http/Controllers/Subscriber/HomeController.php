<?php

namespace App\Http\Controllers\Subscriber;

use App\Enums\BlogStatus;
use App\Models\Blog;
use Illuminate\Http\Response;

class HomeController extends BaseController
{

    public function index()
    {
        $blogs = Blog::where('deleted_at', null)
            ->whereStatus(BlogStatus::PUBLISHED)
            ->orderBy('views', 'DESC')
            ->paginate(8);
        return view('subscriber.home', compact('blogs'));
    }

    public function showBlog(Blog $blog)
    {
        $blog->increaseView();
        return Response()->json($blog, Response::HTTP_OK);
    }
}

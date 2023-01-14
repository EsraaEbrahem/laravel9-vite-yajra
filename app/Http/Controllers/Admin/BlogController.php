<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogDataTable;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends BaseController
{
    /**
     * @param BlogDataTable $dataTable
     * @return mixed
     */
    public function index(BlogDataTable $dataTable)
    {
        return $dataTable->render('admin.blogs.index');
    }


    public function store(BlogRequest $request)
    {
        $blog = Blog::newBlog($request,$_FILES['image']);
        return self::getJsonResponse('', $blog);
    }


    public function show(Blog $blog)
    {
        return self::getJsonResponse('', $blog);
    }

    public function update(BlogRequest $request, Blog $blog)
    {
        $blog->updateBlog($request,$_FILES['image']);
        return self::getJsonResponse('', $blog);
    }


    public function destroy(Request $request)
    {
        $blog = Blog::findOrFail($request->id);
        $blog->delete();
        return self::getJsonResponse('', []);
    }
}

@extends('layouts.app')
@section('content')
    @include('subscriber.blog')
    <div class="container">
        <div class="justify-content-center">
            <div class="row col-12">
                @foreach($blogs as $blog)
                    <div class="card col-3 m-3 p-0 rounded-4" style="width: 18rem;">
                        <a type="button" class=" p-0 btn btn-sm view-blog"
                           data-id='{{ $blog->id }}'
                           data-bs-toggle="modal" data-bs-target="#viewBlog">
                            <img src="{{ asset($blog->image) }}" class="card-img-top"
                                 alt="{{ $blog->title}}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $blog->title}}</h5>
                            </div>
                            <div class="card-footer">
                                Read More..
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center py-5">
                {!! $blogs->links() !!}
            </div>
        </div>
    </div>
@endsection

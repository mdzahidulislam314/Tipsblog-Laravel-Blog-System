@extends('layouts.frontend.app')

@section('title','Homepage')

@push('css')

<link href="{{asset('asset/frontend/css/all-post/css/styles.css')}}" rel="stylesheet">
<link href="{{asset('asset/frontend/css/all-post/css/responsive.css')}}" rel="stylesheet">

<style>
    #favorite_posts {
        color: blue;
    }
</style>
@endpush

@section('content')

<div class="slider display-table center-text">
    <h1 class="title display-table-cell"><b>ALL POST</b></h1>
</div><!-- slider -->

<section class="blog-area section">
    <div class="container">
        <div class="row">
            @foreach($posts as $post)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="single-post post-style-1">
                        <div class="blog-image"><img src="{{url($post->image)}}" alt="Blog
                            Image" height="333" width="500"></div>
                        <a class="avatar" href="#"><img src="{{$post->user->image}}" alt="Profile
                            Image"></a>
                        <div class="blog-info">
                            <h4 class="title"><a
                                    href="{{route('post.details',$post->slug)}}"><b>{{$post->title}}</b></a></h4>
                            <ul class="post-footer">
                                <li>
                                    @guest
                                    <a href="javascript:void(0);" onclick="toastr.info('To add favorite list,You need to login first','Info',{
                                        closeButton:true,
                                        progressBar:true,

                                    })"><i class="ion-heart"></i></a>
                                    @else
                                    <a href="javascript:void(0);"
                                        onclick="document.getElementById('favorite-form-{{$post->id}}').submit();"><i
                                            class="ion-heart"
                                            id="{{ !Auth::user()->favorite_posts->where('pivot.post_id',$post->id)->count()  == 0 ? 'favorite_posts' : ''}}"></i>{{$post->favorite_to_users->count()}}

                                    </a>
                                    <form action="{{route('favorite.post',$post->id)}}" method="POST"
                                        id="favorite-form-{{$post->id}}" style="display: none">
                                        @csrf
                                    </form>
                                    @endguest


                                </li>
                                <li><a href="#"><i class="ion-chatbubble"></i>{{$post->comments()->count()}}</a></li>
                                <li><a href="#"><i class="ion-eye"></i>{{$post->view_count}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>


    </div><!-- container -->
</section><!-- section -->


@endsection


@push('js')

@endpush
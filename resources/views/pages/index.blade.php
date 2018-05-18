@extends('layouts.app')

@section('title','Home')

@section('content')


	<section class="main-highlight">
            <div class="highlight-carousel slider-carousel full-slider">
                
                <div class="owl-carousel" id="postCarousel">

                @foreach($slides as $slide)
                     <div class="item">

                        <article class="post-box" style="background-image: url({{ asset('images/posts/'.$slide->thumbnail) }});">
                            <div class="post-overlay">
                                <div class="post-overlay-inner">
                                    <a href="{{route('blog.category',$slide->category->category)}}" class="post-category" title="Title of blog post" rel="tag">{{$slide->category->category}}</a>
                                    <h3 class="post-title">{{$slide->title}}</h3>
                                    <div class="post-meta">
                                        
                                        <div class="post-meta-author-info">
                                            <span class="middot">·</span>
                                            <span class="post-meta-date">
                                                <abbr class="published updated" title="December 4, 2017">{{date('M j, Y ',strtotime($slide->created_at))}}</abbr>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('blog.single',$slide->slug)}}" class="post-overlayLink"></a>
                        </article>

                    </div>

                @endforeach
                    
                    
                </div>

            </div>
        </section>
        <section class="main-content">
            <div class="main-content-wrapper">
                <div class="content-body">
                    <div class="content-timeline">
                        <!--Timeline header area start -->
                        <div class="post-list-header">
                            <span class="post-list-title">Latest</span>
                            {{--<select class="frm-input">--}}
                                {{--@foreach($categories as $category)--}}
                                    {{--<option value="{{$category->category}}">{{$category->category}}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        </div>

                        <!--Timeline items start -->
                        <div class="post-lists">
                        @foreach($posts as $post)
                                <div class="columns column-3">
                                    <a href="{{route('blog.single',$post->slug)}}">
                                        <div class="post-list-item">
                                            <div class="post-top">
                                                <img class="post-image" src="{{ asset('images/posts/'.$post->thumbnail) }}">
                                                <h3 class="post-title">
                                                    <a href="{{route('blog.single',$post->slug)}}"><span>{{ucwords($post->title)}}</span></a>
                                                </h3>
                                            </div>
                                            <div class="post-bottom">
                                                <div class="post-author-box">
                                                    <a href="{{route('blog.category',$post->category->category)}}" class="timeline-category-name">{{ mb_strimwidth(strtoupper($post->category->category),0,24) }}</a>
                                                    {{--<span class="post-date item-spacing"><i class="fa fa-eye"></i></span>--}}
                                                    {{--<span class="post-date item-spacing">|</span>--}}
                                                    <span class="post-date item-spacing"><i class=" item-spacing fa fa-comments"></i>{{ count($post->comments) }}</span>
                                                    <span class="post-date item-spacing">|</span>
                                                    <a href="{{route('blog.single',$post->slug)}}" class="author-name item-spacing"><i class="fa fa-user"></i> {{ucwords($post->admin->name)}}</a>
                                                    <span class="post-date item-spacing"><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($post->created_at)->format('M d, Y') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                        @endforeach

                        </div>
                        <!--Timeline items end -->

                        <!--Data load more button start  -->
                        <div class="load-more">
                            <div class="pull-right">
                                <div class=" pagination">
                                    {!! $posts->links(); !!}
                                </div>
                            </div>
                        </div>
                        <!--Data load more button start  -->
                    </div>

                </div>
                <div class="content-sidebar">
                    <div class="sidebar_inner">

                        <div class="widget-item">
                            <div class="w-header">
                                <div class="w-title">Glance</div>
                                <div class="w-seperator"></div>
                            </div>
                            <div class="w-carousel-post">
                                <div class="owl-carousel" id="widgetCarousel">
                                @foreach($slides as $slide)
                                    <div class="item">
                                        <a href="{{route('blog.single',$slide->slug)}}">
                                            <img src="{{ asset('images/posts/'.$slide->thumbnail) }}" width="300">
                                            <span class="w-post-title">{{ucwords($slide->title)}}</span>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="seperator"></div>

                        <a href="index4.html#" class="widget-ad-box">
                            <img src="/img/adbox300x250.png" width="300" height="250">
                        </a>

                        <div class="widget-item">
                            <div class="w-header">
                                <div class="w-title">Latest Posts</div>
                                <div class="w-seperator"></div>
                            </div>
                            <div class="w-boxed-post">
                                <ul>
                                @foreach($porpulars as $porpular)
                                    <li>
                                        <a href="{{route('blog.single',$porpular->slug)}}" style="background-image: url({{ asset('images/posts/'.$porpular->thumbnail) }});">
                                            <div class="box-wrapper">
                                                <div class="box-left">
                                                    <span>{{$loop->iteration}}</span>
                                                </div>
                                                <div class="box-right">
                                                    <h3 class="p-title">{{ucwords($porpular->title)}}</h3>
                                                    <div class="p-icons">
                                                        {{-- 213 likes . 124 comments --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </section>

@stop
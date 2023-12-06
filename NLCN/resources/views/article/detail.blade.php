@php use App\Models\article; @endphp
@extends('main')

@section('content')
    <link rel='stylesheet' id='classic-theme-styles-css' href='{{asset('gardening/classic-theme.css')}}' type='text/css'
          media='all'/>
    <script type='text/javascript' src='{{asset('gardening/jquery.min.js')}}' id='jquery-core-js'></script>
    <script type="text/javascript" async defer data-pin-color="red" data-pin-hover="true"
            src="{{asset('gardening/pinit.js')}}"></script>

    <div id="pagecontainer" class="container" style="margin-top: 100px;">
        <div class="row wholepage">
            <div id="content" class="col-lg-9">
                <article itemscope="" itemtype="https://schema.org/Article" id="post-202082"
                         class="post-202082 post type-post status-publish format-standard has-post-thumbnail hentry category-northeast tag-gardening-by-region tag-gardening-how-to tag-northeast">
                    <span itemprop="url"
                          content="https://www.gardeningknowhow.com/garden-how-to/garden-by-region/northeast/northeast-lawn-care.htm"></span>

                    <h1 class="entry-title post-title mobiletitle" itemprop="headline name">{{$article->header}}</h1>

                    <div class="post-entry entry-content">

                        <div class="singmig">
                            @php
                                $images = \App\Models\DetailArticel::where('articel_id', $article->id)->get();
                            @endphp
                            @if($images)
                                @foreach($images as $image)
                                    @php
                                        try {
                                            $image = explode('|', $image->mutiImg);
                                         }catch (Exception $exception){
                                            $image = [];
                                         }
                                    @endphp
                                    @foreach($image as $key => $value)
                                        @if(is_file(public_path($value)))
                                            <img width="500" height="400"
                                                 src="{{asset($value)}}"
                                                 class="attachment-medium size-medium wp-post-image"
                                                 alt="A red lawnmower on a grassy lawn bordered by shrubs" decoding="async"
                                                 style="width:400px;height:300px;">
                                        @endif
                                    @endforeach
                                @endforeach
                            @endif
                        </div>
                        <br>

                        <div id="main-art" itemprop="articleBody">
                            <p>{{$article->description}}</p>
                        </div>

                        <div>
                            {!! $article->content_article !!}
                        </div>
                        <br>

                        <div class="mt-5 pr-2 mb-3">
                            <div class="d-flex justify-content-center row border pb-3">
                                <div class="col-md-12">
                                    <div class="d-flex flex-column comment-section" id="comment-list">
                                        @if($comments->count() < 1)
                                            <p class="p-4 text-center" id="no-comment-text">Chưa có bình luận nào</p>
                                        @endif
                                        @foreach($comments as $comment)
                                            <div class="bg-white p-2">
                                                <div class="d-flex flex-row user-info">
                                                    <div class="d-flex flex-column justify-content-start ml-2"><span
                                                            class="d-block font-weight-bold name">{{\App\Models\User::find($comment->user_id) ? \App\Models\User::find($comment->user_id)->name : ""}}</span><span
                                                            class="date text-black-50">{{$comment->created_at}}</span>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <p class="comment-text">{{$comment->content}}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    @if(auth()->check())
                                        <div class="alert alert-danger hidden">
                                            <ul>
                                                <li id="error-text"></li>
                                            </ul>
                                        </div>
                                        <div class="alert alert-success hidden">
                                            <ul>
                                                <li id="success-text"></li>
                                            </ul>
                                        </div>
                                        <form action="/comment" method="POST">
                                            <div class="bg-light p-2">
                                                <div class="d-flex flex-row align-items-start">
                                                    @csrf
                                                    <input type="hidden" name="article_id"
                                                           value="{{$article->id}}"/>
                                                    <textarea onclick="
                                                    $('.alert-success').addClass('hidden');
                                                    $('.success').text('');
                                                    $('.error-text').text('');
                                                    $('.alert-danger').addClass('hidden');
                                                    " id="content" name="content"
                                                              class="form-control ml-1 shadow-none textarea content"></textarea>
                                                </div>
                                                <div class="mt-2 text-right">
                                                    <button class="btn btn-primary btn-sm shadow-none"
                                                            type="button" onclick="comment()">
                                                        Bình luận
                                                    </button>
                                                    <button class="btn btn-outline-primary btn-sm ml-1 shadow-none"
                                                            type="button"
                                                            onclick="$('.content').val('')">
                                                        Huỷ
                                                        bỏ
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    @else
                                        <p class="text-center p-4"><a href="/login">Đăng nhập để bình luận</a></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div><!-- end of .post-entry -->
                </article><!-- end of #post-202082 -->


            </div><!-- / #content .col-md-8 -->

            <div id="mainsidebar" class="col-lg-3">
                <div id="text-2" class="widget-wrapper widget_text">
                    <div class="textwidget">
                        <div id="shortrecents">
                            <div class="widget-title">Related Articles</div>
                            @php
                                $related = article::where('active', 1)->inRandomOrder()->limit(4)->get();
                            @endphp
                            <ul>
                                @foreach($related as $item)
                                    <li class="">
                                        <div class="imncat"><a class="simim"
                                                               href="/bai-viet/{{$item->id}}" rel="prev"
                                                               title="Centipede Grass Maintenance And Planting Tips"><img
                                                    width="150" height="150"
                                                    src="{{asset($item->linkheader)}}"
                                                    class="attachment-thumbnail size-thumbnail wp-post-image"
                                                    alt="Centipede Grass" decoding="async" loading="lazy"></a></div>
                                        <div class="post-link simlink"><a class="genposts_cattitle simcat"
                                                                          href="/bai-viet/{{$item->id}}"
                                                                          title="{{\App\Models\Menu::find($item->menu_id) ? \App\Models\Menu::find($item->menu_id)->name : ""}}">{{\App\Models\Menu::find($item->menu_id) ? \App\Models\Menu::find($item->menu_id)->name : ""}}</a><a
                                                class="tistitle"
                                                href="/bai-viet/{{$item->id}}"
                                                title="{{$item->header}}">{{$item->header}}</a></div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- / .row -->
    </div>

    @if(auth()->check())
        <script>
            function comment() {
                $.ajax({
                    type: "POST",
                    url: "/comment",
                    data: {
                        content: $('.content').val(),
                        article_id: "{{$article->id}}",
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (result) {
                        if (result.content && result.user && result.created_at) {
                            $('.error-text').text('');
                            $('.alert-danger').addClass('hidden');

                            $('#no-comment-text').hide();

                            $('.content').val('');

                            $('#comment-list').append(`
                            <div class="bg-white p-2">
                                                <div class="d-flex flex-row user-info">
                                                    <div class="d-flex flex-column justify-content-start ml-2"><span
                                                            class="d-block font-weight-bold name">${result.user}</span><span
                                                            class="date text-black-50">${result.created_at}</span>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <p class="comment-text">${result.content}</p>
                                                </div>
                                            </div>
                            `);

                            $('.alert-success').removeClass('hidden');
                            $('#success-text').text('Bình luận thành công.');
                        }
                    },
                    error: function () {
                        $('.alert-success').addClass('hidden');
                        $('.success').text('');
                        $('.alert-danger').removeClass('hidden');
                        $('#error-text').text('Vui lòng nhập đầy đủ nội dung.');
                    }
                });
            }
        </script>
    @endif
@endsection

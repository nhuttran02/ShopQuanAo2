@extends('main')

@section('content')
    <link rel='stylesheet' id='classic-theme-styles-css' href='{{asset('gardening/classic-theme.css')}}' type='text/css'
          media='all'/>
    <script type='text/javascript' src='{{asset('gardening/jquery.min.js')}}' id='jquery-core-js'></script>
    <script type="text/javascript" async defer data-pin-color="red" data-pin-hover="true"
            src="{{asset('gardening/pinit.js')}}"></script>


    <!-- Slider -->
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">

                @foreach($sliders as $slider)

                    <div class="item-slick1" style="background-image: url({{ $slider->thumb }});">
                        <div class="container h-full">
                            <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                                <div class="layer-slick1 animated visible-false" data-appear="fadeInDown"
                                     data-delay="0">
                            <span class="ltext-101 cl2 respon2">
                                Gardeners
                            </span>
                                </div>

                                <div class="layer-slick1 animated visible-false" data-appear="fadeInUp"
                                     data-delay="800">
                                    <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                        {{$slider->name}}
                                    </h2>
                                </div>

                                <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                    <a href="{{$slider->url}}"
                                       class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                        Visit
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <body id="mainsite" class="home blog wp-embed-responsive">
    <div id="totoptop" onClick="document.body.scrollTop = document.documentElement.scrollTop = 0;"><i
            class="witharrow aup"></i></div>

    <div id="bodyholder">
        <div id="pagecontainer" class="container">

            <div class="row">
                <div id="leaderboard" class="col-12">
                </div>
            </div>

            <div id="homewithside" class="row">
                <div id="featuring" class="col-md-8">
                    <div class="row">
                        <div id="gardengeneralposts-12"
                             class="theothersblock col-sm-5 widget-wrapper widget_gardengeneralposts">
                            <div id="theothers" class="">
                                <div id="widget-title-f" class="widget-title-home"><h3>Featured Articles</h3></div>
                                <ul class="list-post-widget-home" data-count="2">
                                    @php
                                        $feature = \App\Models\article::where('feature', 1)->where('active', 1)->orderBy('created_at', 'DESC')->limit(3)->get();
                                    @endphp
                                    @foreach($feature as $key => $item)
                                        @if($key < 2)
                                            <li><!-- ffim :  -->
                                                <div class="widgemag"><a
                                                        href="/bai-viet/{{$item->id}}"
                                                        title="Houseplant Propagation Guide &#8211; Learn How to Propagate Your Favorite Houseplants"><img
                                                            width="400" height="332"
                                                            src="{{asset($item->linkheader)}}"
                                                            class="attachment-medium size-medium wp-post-image"
                                                            alt="how many houseplants" decoding="async" loading="lazy"/></a>
                                                </div>
                                                <div class="posthisabs">
                                                    <a class="genposts_linktitle"
                                                       href="/bai-viet/{{$item->id}}"
                                                       title="{{$item->header}}">{{$item->header}}</a>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div id="gardengeneralposts-13"
                             class="thefeaturedblock col-sm-7 widget-wrapper widget_gardengeneralposts">
                            <div id="thefeatured" class="">
                                <ul class="list-post-widget-home" data-count="1">
                                    @if($feature->count() > 2)
                                        <li><!-- ffim :  -->
                                            <div class="widgemag"><a
                                                    href="/bai-viet/{{$feature->last()->id}}"
                                                    title="Houseplant Propagation Guide &#8211; Learn How to Propagate Your Favorite Houseplants"><img
                                                        width="400" height="332"
                                                        src="{{asset($feature->last()->linkheader)}}"
                                                        class="attachment-medium size-medium wp-post-image"
                                                        alt="how many houseplants" decoding="async" loading="lazy"/></a>
                                            </div>
                                            <div class="posthisabs">
                                                <a class="genposts_linktitle"
                                                   href="/bai-viet/{{$feature->last()->id}}"
                                                   title="{{$feature->last()->header}}">{{$feature->last()->header}}</a>
                                            </div>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="homersidebar desktophide col-md-4">
                        <div class="homesideexplore homesides">
                            <div class="insideit">
                                <div class="tltwbg">
                                    <div class="bgl hbg"></div>
                                    <div class="seaweed">Explore</div>
                                    <div class="bgr hbg"></div>
                                </div>
                                <p><b>Did You Know</b>? Gardening Know How has three websites. Check out our <a
                                        href="https://blog.gardeningknowhow.com" target="_blank">blog</a> filled with
                                    great articles from our weekend gardening warriors and a <a
                                        href="https://questions.gardeningknowhow.com" target="blank">Questions and
                                        Answers</a> website where you can ask a pro gardener.</p>
                            </div>
                        </div>

                        <div class="homesidebarone homesides">
                        </div>

                        <div class="askapro homesides">
                            <div class="insideit">
                                <div class="tilte seaweed">Ask A Pro</div>
                                <p>You've got questions,<br/>our professionals<br/>have answers.</p>
                                <a class="newgenbtn inblock" href="https://questions.gardeningknowhow.com"
                                   target="_blank">
                                    <div class="lillinkicon"></div>
                                    Ask a Question</a>
                            </div>
                        </div>

                        <div class="homesidealt homesides">
                            <div class="learninbox">
                                <div class="insideit">
                                    <a target="_blank" href="https://learn.gardeningknowhow.com/courses/no-waste"><img
                                            src="https://www.gardeningknowhow.com/wp-content/uploads/2022/05/gkhlc_regrow_repurpose_recycle_600x500_v1a-1.jpg"/></a>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="">
                        <div id="gardengeneralposts-7" class="widget-wrapper widget_gardengeneralposts">
                            <div id="poparticulates" class="">
                                <div id="widget-title-three" class="widget-title-home"><h3>Popular Articles</h3></div>
                                <ul class="list-post-widget-home" data-count="4">
                                    @php
                                        $popular = \App\Models\article::where('active', 1)->orderBy('created_at', 'DESC')->limit(4)->get();
                                    @endphp
                                    @foreach($popular as $item)
                                        <li class="row">
                                            <div class="leftim col-sm-5 col-md-12 col-lg-5"><a
                                                    href="/bai-viet/{{$item->id}}"
                                                    title="Pothos Propagation: How To Propagate A Pothos"><img
                                                        width="400"
                                                        height="300"
                                                        src="{{asset($item->linkheader)}}"
                                                        class="attachment-medium size-medium wp-post-image"
                                                        alt="Individually Small Potted Pothos Plants"
                                                        decoding="async"
                                                        loading="lazy"/></a>
                                        </div>
                                        <div class="posthisabs col-sm-7 col-md-12 col-lg-7"><a class="genposts_cattitle"
                                                                                               title="Pothos">{{\App\Models\Menu::find($item->menu_id) ? \App\Models\Menu::find($item->menu_id)->name : ""}}</a><a
                                                class="genposts_linktitle"
                                                href="/bai-viet/{{$item->id}}"
                                                title="Pothos Propagation: How To Propagate A Pothos">{{$item->header}}</a>
                                            <p>{{\Str::limit($item->description, 90)}}</p>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="homersidebar mobilehide col-md-4">
                    <div class="homesideexplore homesides">
                        <div class="insideit">
                            <div class="tltwbg">
                                <div class="bgl hbg"></div>
                                <div class="seaweed">Explore</div>
                                <div class="bgr hbg"></div>
                            </div>
                            <p><b>Did You Know</b>? Gardening Know How has three websites. Check out our <a
                                    href="https://blog.gardeningknowhow.com" target="_blank">blog</a> filled with great
                                articles from our weekend gardening warriors and a <a
                                    href="https://questions.gardeningknowhow.com" target="blank">Questions and
                                    Answers</a> website where you can ask a pro gardener.</p>
                        </div>
                    </div>

                    <div class="homesidebarone homesides">
                    </div>

                    <div class="askapro homesides">
                        <div class="insideit">
                            <div class="tilte seaweed">Ask A Pro</div>
                            <p>You've got questions,<br/>our professionals<br/>have answers.</p>
                            <a class="newgenbtn inblock" href="https://questions.gardeningknowhow.com" target="_blank">
                                <div class="lillinkicon"></div>
                                Ask a Question</a>
                        </div>
                    </div>

                    <div class="homesidealt homesides">
                        <div class="learninbox">
                            <div class="insideit">
                                <a target="_blank" href="https://learn.gardeningknowhow.com/courses/no-waste"><img
                                        src="https://www.gardeningknowhow.com/wp-content/uploads/2022/05/gkhlc_regrow_repurpose_recycle_600x500_v1a-1.jpg"/></a>
                            </div>
                        </div>
                    </div>

                </div>


            </div><!-- end #homewithside -->

            <div id="homenoside" class="row">
                <div class="col-12">
                    <div id="gardengeneralposts-2" class="widget-wrapper widget_gardengeneralposts">
                        <div id="gardhomenewest">
                            <div id="widget-title-one" class="widget-title-home"><h3>Recent Articles</h3></div>
                            @php
                                $random = \App\Models\article::where('active', 1)->inRandomOrder()->limit(4)->get();
                            @endphp
                            <ul class="row list-post-widget-home" data-count="4">
                                @foreach($random as $item)
                                    <li class="col-md-3 col-sm-6">
                                    <div class="widgemag"><a
                                            href="/bai-viet/{{$item->id}}"
                                            title="Will Frost Kill Grass Seed And How To Help New Turf Survive"><img
                                                width="400" height="300"
                                                src="{{asset($item->linkheader)}}"                                                class="attachment-medium size-medium wp-post-image"
                                                alt="Blades of grass covered in frost" decoding="async" loading="lazy"/></a><a
                                            class="genposts_cattitle"
                                            href="https://www.gardeningknowhow.com/lawn-care/lgen"
                                            title="{{\App\Models\Menu::find($item->menu_id) ? \App\Models\Menu::find($item->menu_id)->name : ""}}">{{\App\Models\Menu::find($item->menu_id) ? \App\Models\Menu::find($item->menu_id)->name : ""}}</a></div>
                                    <div class="posthisabs"><a class="genposts_linktitle"
                                                               href="/bai-viet/{{$item->id}}"
                                                               title="{{$item->header}}">{{$item->header}}</a></div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div><!-- end row END #homenoside-->

            </div><!-- end of #pagecontainer.container-->


            <div id="ghomewidgets" class="home-widgets">
                <div class="thirdrowgrey container">
                    <div class="row">
                        @php
                            $cate_articles_footer = \App\Models\Menu::with('articles')->withCount('articles')->orderBy('articles_count', 'DESC')->limit(3)->get()
                        @endphp
                        @foreach($cate_articles_footer as $cate)
                            <div class="col-md-4">
                                <div id="gardengeneralposts-8" class="widget-wrapper widget_gardengeneralposts">
                                    <div id="getstarted">
                                        <div id="widget-title-four" class="widget-title-home"><h3>{{$cate->name}}</h3>
                                        </div>
                                        <ul class="list-post-widget-home" data-count="4">
                                            @foreach($cate->articles->slice(0,4) as $item)
                                                <li class="row">
                                                    <div class="imconti col-3 col-sm-12 col-lg-4"><a
                                                            href="/bai-viet/{{$item->id}}"
                                                            title="Cacti For Beginners: Easy Cactus Varieties"><img width="150"
                                                                                                                    height="150"
                                                                                                                    src="{{asset($item->linkheader)}}"                                                class="attachment-medium size-medium wp-post-image"
                                                                                                                    class="middle_img_radius_10 wp-post-image"/></a>
                                                    </div>
                                                    <div class="acontaina col-9 col-sm-12 col-lg-8"><a class="genposts_linktitle"
                                                                                                       href="/bai-viet/{{$item->id}}">{{$item->header}}</a></div>
                                                </li>
                                            @endforeach
                                        </ul>
                            </div>
                        </div>
                    </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection

@php use App\Models\article; @endphp
@php use App\Models\Menu; @endphp
@extends('main')

@section('content')
    <link rel='stylesheet' id='classic-theme-styles-css' href='{{asset('gardening/classic-theme.css')}}' type='text/css'
          media='all'/>
    <script type='text/javascript' src='{{asset('gardening/jquery.min.js')}}' id='jquery-core-js'></script>
    <script type="text/javascript" async defer data-pin-color="red" data-pin-hover="true"
            src="{{asset('gardening/pinit.js')}}"></script>



    <body id="mainsite" class="home blog wp-embed-responsive mt-5">
    <div id="bodyholder">
        <div id="homewithside" class="container mt-4">
            <div id="featuring" class="col-md-12">
                <div class="">
                    <div id="gardengeneralposts-7" class="widget-wrapper widget_gardengeneralposts">
                        <div id="poparticulates" class="">
                            <div id="widget-title-three" class="widget-title-home"><h3>Danh sách bài viết</h3></div>
                            <ul class="list-post-widget-home" data-count="4">
                                @foreach($articles as $item)
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
                                                                                               title="Pothos">{{Menu::find($item->menu_id) ? Menu::find($item->menu_id)->name : ""}}</a><a
                                                class="genposts_linktitle"
                                                href="/bai-viet/{{$item->id}}"
                                                title="Pothos Propagation: How To Propagate A Pothos">{{$item->header}}</a>
                                            <p>{{Str::limit($item->description, 90)}}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="m-4">
                            {!! $articles->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection

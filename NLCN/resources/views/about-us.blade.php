@php use App\Models\Menu; @endphp
@php use App\Models\article; @endphp
@extends('main')

@section('content')
    <link rel='stylesheet' id='classic-theme-styles-css' href='{{asset('gardening/style.css')}}' type='text/css'
          media='all'/>
    <section class="about_section mt-60" style="margin-top: 80px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <figure>
                        <div class="about_thumb">
                            <img src="{{asset('gardening/images/staff.jpg')}}" alt="">
                        </div>
                        <figcaption class="about_content">
                            <h1>ABOUT THE WEBSITE </h1>
                            <p>​Welcome to NSTORE, where you can find clothes that suit your preferences.</p>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <!--about section end-->

    <!-- services img area -->
    <!-- <div class="about_gallery_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <article class="single_gallery_section">
                        <figure>
                            <div class="gallery_thumb">
                                <img src="{{asset('gardening/images/2.jpeg')}}" alt="">
                            </div>
                            <figcaption class="about_gallery_content">
                                <h3>What do we do?</h3>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                    architecto. The point of using Lorem Ipsum is that it has a more-or-less normal
                                    distribution of letters, as opposed to using ‘Content here, content here’, making it
                                    look like readable English.</p>
                            </figcaption>
                        </figure>
                    </article>
                </div>
                <div class="col-lg-6 col-md-6">
                    <article class="single_gallery_section">
                        <figure>
                            <div class="gallery_thumb">
                                <img src="{{asset('gardening/images/3.jpeg')}}" alt="">
                            </div>
                            <figcaption class="about_gallery_content">
                                <h3>Meet the Team</h3>
                                <p>Yes, we’re experts in digital advertising, publishing, marketing, and more, but before everything else, we’re gardeners.
                                    That’s why we’re so passionate about helping you with your garden.
                                    Collectively, we’ve gardened in every region in the U.S.
                                    and many parts of the world too. We have expertise in a wide range of topics, from creating native gardens and wildlife habitats to small-space urban gardening, houseplants, and more.
                                    Coming soon, our team bio pages where you can get a peek at each of our gardens and learn more about the expertise we can share with you.

                                </p>
                            </figcaption>
                        </figure>
                    </article>
                </div>
            </div>
        </div>
    </div> -->
    <!--services img end-->


    <!-- team area start -->
    <!-- <div class="team_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <article class="team_member">
                        <figure>
                            <div class="team_thumb">
                                <img src="{{asset('gardening/images/Anh1.png')}}" alt="">
                            </div>
                            <figcaption class="team_content">
                                <h3>Son</h3>
                                <h5>Director</h5>
                                <p>Phone: 0123456789 <br> Email: Sondeptrai@example.com</p>
                            </figcaption>
                        </figure>
                    </article>
                </div>
                <div class="col-lg-3 col-md-6">
                    <article class="team_member">
                        <figure>
                            <div class="team_thumb">
                                <img src="{{asset('gardening/images/Anh5.png')}}" alt="">
                            </div>
                            <figcaption class="team_content">
                                <h3>Chien</h3>
                                <h5>Designer</h5>
                                <p>Phone: 0123456789 <br> Email: Chiendeptrai@example.com</p>
                            </figcaption>
                        </figure>
                    </article>
                </div>
                <div class="col-lg-3 col-md-6">
                    <article class="team_member">
                        <figure>
                            <div class="team_thumb">
                                <img src="{{asset('gardening/images/Anh2.png')}}" alt="">
                            </div>
                            <figcaption class="team_content">
                                <h3>Cam</h3>
                                <h5>Designer</h5>
                                <p>Phone: 0123456789 <br> Email: Camdeptrai@example.com</p>
                            </figcaption>
                        </figure>
                    </article>
                </div>
                <div class="col-lg-3 col-md-6">
                    <article class="team_member">
                        <figure>
                            <div class="team_thumb">
                                <img src="{{asset('gardening/images/Anh4.png')}}" alt="">
                            </div>
                            <figcaption class="team_content">
                                <h3>Duy</h3>
                                <h5>Designer</h5>
                                <p>Phone: 0123456789 <br> Email: Duydeptrai@example.com</p>
                            </figcaption>
                        </figure>
                    </article>
                </div>
                <div class="col-lg-3 col-md-6">
                    <article class="team_member">
                        <figure>
                        </figure>
                    </article>
                </div>
                <div class="col-lg-3 col-md-6">
                    <article class="team_member">
                        <figure>
                            <div class="team_thumb">
                                <img src="{{asset('gardening/images/Anh3.png')}}" alt="">
                            </div>
                            <figcaption class="team_content">
                                <h3>Kien</h3>
                                <h5>Developer</h5>
                                <p>Phone: 0123456789 <br> Email: Kiendeptrai@example.com</p>
                            </figcaption>
                        </figure>
                    </article>
                </div>
                <div class="col-lg-3 col-md-6">
                    <article class="team_member">
                        <figure>
                            <div class="team_thumb">
                                <img src="{{asset('gardening/images/Avata.png')}}" alt="">
                            </div>
                            <figcaption class="team_content">
                                <h3>Hung</h3>
                                <h5>Coder</h5>
                                <p>Phone: 0123456789 <br> Email: Hungdeptrai@example.com</p>
                            </figcaption>
                        </figure>
                    </article>
                </div>
            </div>
        </div>
    </div> -->
@endsection

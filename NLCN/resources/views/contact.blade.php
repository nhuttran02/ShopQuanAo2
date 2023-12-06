@php use App\Models\Menu; @endphp
@php use App\Models\article; @endphp
@extends('main')

@section('content')
    <link rel='stylesheet' id='classic-theme-styles-css' href='{{asset('gardening/style.css')}}' type='text/css'
          media='all'/>
    <div class="main_header" style="margin-top: 80px;">
        <!--contact map start-->
        <div class="contact_map mt-60">
            <div class="map-area">
                <iframe
                    src="https://www.google.com/maps/embed?pb=@10.0154008,105.7129843,13z/data=!3m1!4b1!4m2!7m1!2e1"
                    style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        <!--contact map end-->

        <!--contact area start-->
        <div class="contact_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="contact_message content">
                            <h3>contact us</h3>
                            <p></p>
                            <ul>
                                <li><i class="fa fa-fax"></i> Address : Hẻm 12, Đường 3/2, Hưng Lợi, Ninh Kiều, TP. Cần Thơ</li>
                                <li><i class="fa fa-envelope-o"> </i> Email: <a
                                        href="mailto:demo@example.com">nstore.support@gmail.com </a>
                                </li>
                                <li><i class="fa fa-phone"></i> Phone:<a href="tel: 0123456789"> 0922008052 </a></li>
                            </ul>
                            
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="contact_message form">
                            <h3>Tell us your project</h3>
                            @include('admin.alert')
                            <form id="contact-form" method="POST">
                                @csrf
                                <p>
                                    <label> Tên (*)</label>
                                    <input name="name" required placeholder="Tên *" type="text">
                                </p>
                                <p>
                                    <label> Email (*)</label>
                                    <input name="email" required placeholder="Email *" type="email">
                                </p>
                                <p>
                                    <label> Số điện thoại (*)</label>
                                    <input name="phone" required placeholder="Số điện thoại" type="text">
                                </p>
                                <div class="contact_textarea">
                                    <label> Nội dung (*)</label>
                                    <textarea required placeholder="Nội dung" name="message" class="form-control2"></textarea>
                                </div>
                                <button type="submit"> Gửi</button>
                                <p class="form-messege"></p>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

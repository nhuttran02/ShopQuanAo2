<header>
    @php $menusHtml = \App\Helpers\Helper::menus($menus); @endphp
    <!-- Header desktop -->
    <div class="container-menu-desktop">

        <div class="wrap-menu-desktop" style="background: #fff">
            <nav class="limiter-menu-desktop container">

                <!-- Logo desktop -->
                <a href="/" class="logo" width="200px" height="200px">
                    <img src="/template/images/icons/logostore2.png" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="active-menu"><a href="/">Trang Chủ</a> </li>

                        {!! $menusHtml !!}
                        <li>
                            <a href="/about-us">Về chúng tôi</a>
                        </li>
                        <li>
                            <a href="/blogs">Bài viết</a>
                        </li>
                        <li>
                            <a href="/contact">Liên Hệ</a>
                        </li>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div>
                        <form action="/search" method="GET" style="border: 1px solid #c7ccd1;border-radius: 5px">
                            <div style="display: flex;padding-left: 4px;padding-right: 4px;" >
                                <input class="plh3" type="text" name="q" placeholder="Search...">
                                <button class="flex-c-m trans-04" style="font-size: 24px;">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
                         data-notify="{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>


                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                        <button class="" @if(!auth()->check()) onclick="location.href='/login'"  @endif type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="zmdi zmdi-account-circle"></i>
                        </button>
                        @if(auth()->check())
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/logout">Đăng xuất</a>
                            </div>
                        @endif
                    </div>

                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="index.html"><img src="/template/images/icons/logo-01.png" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="main-menu-m">
            <li class="active-menu"><a href="/">Trang Chủ</a> </li>

            {!! $menusHtml !!}

            <li>
                <a href="/about-us">Về chúng tôi</a>
            </li>
            <li>
                <a href="/contact">Liên Hệ</a>
            </li>

        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="/template/images/icons/icon-close2.png" alt="CLOSE">
            </button>

            <form action="/search" method="GET" class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="q" placeholder="Search...">
            </form>
        </div>
    </div>
</header>


<header class="header">
        <div class="header__top">
            
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p>Free shipping, 30-day return or refund guarantee.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                <a href="#">Sign in</a>
                                <a href="#">FAQs</a>
                            </div>
                            <div class="header__top__hover">
                            <li class="language-switcher ">
                                <div class="dropdown" >
                                    <button class="btn btn-lang dropdown-toggle" type="button" id="langDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="current-lang">
                                            {{ strtoupper(app()->getLocale()) }} <!-- يظهر رمز اللغة مثل AR/EN -->
                                        </span>
                                    </button>
                                    <ul>
                                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                            <li>
                                                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                    {{ $properties['native'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    {{-- <div class="header__logo">
                        <a href="{{route('home')}}"><img src="front/img/logo.png" alt=""></a>
                    </div> --}}
                </div>
                <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        {{-- Home --}}
                        <li class="nav-item">
                            <a href="{{ route('home') }}" 
                            class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                            Home
                            </a>
                        </li>

                        {{-- Shop --}}
                        <li class="nav-item">
                            <a href="{{ route('shop') }}" 
                            class="nav-link {{ request()->routeIs('shop') ? 'active' : '' }}">
                            Shop
                            </a>
                        </li>

                        {{-- Pages Dropdown --}}


                        {{-- Blog --}}
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->routeIs('blog') ? 'active' : '' }}">Blog</a>
                        </li>

                        {{-- Contacts --}}
                        <li class="nav-item">
                            <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contacts</a>
                        </li>

                        {{-- Login / Sign In --}}
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}">@lang('l.Sign up')</a>
                        </li>
                        
                    </ul>
                </nav>
            </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="#" class="search-switch"><img src="front/img/icon/search.png" alt=""></a>
                        <a href="#"><img src="front/img/icon/heart.png" alt=""></a>
                        <a href="{{route('cart')}}"><img src="front/img/icon/cart.png" alt=""> <span>0</span></a>
                        <div class="price">$0.00</div>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->
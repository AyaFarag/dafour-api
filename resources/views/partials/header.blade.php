<header class="header pl-5 pr-5 pt-0 pb-0">
    <div class="row header__bar p-0 m-0 align-items-md-end">
        <div class="col-md-3 header__logo text-center">
            <a href="{{ route('home')  }}">
                <img src="{!! asset('site/images/logo.png') !!}"/>
            </a>
        </div>
        <div class="col-md-9">
                @if(auth('student')->check())
                    <button id="signbtn" class="btn btn-md header__bar__btn float-right">
                        <img class="header__img" src="{!! asset('site/images/lock.png') !!}"/>
                        <span>@lang('site.My Account')</span>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{!! route('student.home') !!}">@lang('site.My Account')</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{!! route('student.logout') !!}">@lang('site.Log Out')</a>
                        </div>
                    </button>
                @elseif(auth('professional')->check())
                    <button id="signbtn" class="btn btn-md header__bar__btn float-right">
                        <img class="header__img" src="{!! asset('site/images/lock.png') !!}"/>
                        <span>@lang('site.My Account')</span>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{!! route('professional.home') !!}">@lang('site.My Account')</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{!! route('professional.logout') !!}">@lang('site.Log Out')</a>
                        </div>
                    </button>
                @else
                    <a href="{!! route('login') !!}">
                        <button id="signbtn" class="btn btn-md header__bar__btn float-right">
                            <img class="header__img" src="{!! asset('site/images/lock.png') !!}"/>
                            <span>@lang('site.Sign In/Up')</span>
                        </button>
                    </a>
                @endif
            @php
                $opposite_locale = current( array_diff(config('app.locales'),[app()->getLocale()]) );
            @endphp
            <ul class="nav justify-content-end header__bar__nav font-weight-bold">
                <li class="nav-item header__bar__nav__list">
                    <a class="nav-link header__bar__nav__link pl-2 pr-2" href="{{str_replace('/'.app()->getLocale().'/','/'.$opposite_locale.'/',request()->url())}}">
                        <img class="header__img pr-1"  src="{!! asset('site/images/global.png') !!}" >
                        @lang('locale.'.$opposite_locale)
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row header__nav p-0 m-0 align-items-center">
        <div class="col-md-3 header__logo">
        </div>
        <div class="clearfix"></div>
        <div class="col-md-9">
            <ul class="nav justify-content-end header__bar__nav font-weight-normal">
                <li class="nav-item header__nav__list home-link">
                    <a class="nav-link header__nav__link" href="{{ route('home') }}"><img class="header__nav__img"
                        src="{!! asset('site/images/home.png') !!} "/></a>
                </li>
                <li class="nav-item header__nav__list none-list-responsive">
                    <a class="nav-link header__nav__link" href="#">@lang('site.About us')</a>
                    <hr class="header__nav__list-line mt-0 mb-0"/>
                </li>
                <li class="nav-item header__nav__list none-list-responsive">
                    <a class="nav-link header__nav__link" href="#">@lang('site.Privacy Policy')</a>
                    <hr class="header__nav__list-line mt-0 mb-0"/>
                </li>
                <li class="nav-item header__nav__list none-list-responsive">
                    <a class="nav-link header__nav__link" href="#">@lang('site.Support')</a>
                    <hr class="header__nav__list-line mt-0 mb-0"/>
                </li>
                <li class="nav-item header__nav__list none-list-responsive">
                    <a class="nav-link header__nav__link" href="#">@lang('site.Contact Us')</a>
                    <hr class="header__nav__list-line mt-0 mb-0"/>
                </li>
                <li class="nav-item header__nav__list btn-reponsive d-none">
                    <a class="nav-link header__nav__link font-weight-normal" href="#"><img
                        class="header__nav__img" src="{!! asset('site/images/menu.png') !!}"/></a>
                </li>
            </ul>
            <ul class="nav flex-column position-absolute header__bar__nav nav-responsive font-weight-normal">
               <li class="nav-item header__nav__list">
                    <a class="nav-link header__nav__link" href="{{ route('home')  }}">@lang('site.Home')</a>
                    <hr class="header__nav__list-line mt-0 mb-0"/>
                </li>
                <li class="nav-item header__nav__list">
                    <a class="nav-link header__nav__link" href="#">@lang('site.About us')</a>
                    <hr class="header__nav__list-line mt-0 mb-0"/>
                </li>
                <li class="nav-item header__nav__list">
                    <a class="nav-link header__nav__link" href="#">@lang('site.Privacy Policy')</a>
                    <hr class="header__nav__list-line mt-0 mb-0"/>
                </li>
                <li class="nav-item header__nav__list">
                    <a class="nav-link header__nav__link" href="#">@lang('site.Support')</a>
                    <hr class="header__nav__list-line mt-0 mb-0"/>
                </li>
                <li class="nav-item header__nav__list">
                    <a class="nav-link header__nav__link" href="#">@lang('site.Contact Us')</a>
                    <hr class="header__nav__list-line mt-0 mb-0"/>
                </li>
            </ul>
        </div>
    </div>
</header>
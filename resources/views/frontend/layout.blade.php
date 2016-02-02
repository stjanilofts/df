<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>{{ config('formable.site_title') }}{{ isset($pagetitle) ? ' | '.$pagetitle : '' }}</title>

        <meta name="description" content="">
        <meta name="keywords" content="">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta id="token" name="token" value="{{ csrf_token() }}">
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/css/uikit.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/css/components/slideshow.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/css/components/slider.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/css/components/dotnav.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/css/components/notify.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/css/components/slidenav.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/css/components/tooltip.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/css/components/sticky.min.css" rel="stylesheet">
        <link href="/css/app.css?v=2" rel='stylesheet' type='text/css'>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/uikit.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/components/slideshow.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/components/slider.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/components/slideset.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/components/notify.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/components/tooltip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/components/lightbox.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/components/sticky.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.15/vue.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.0/vue-resource.js"></script>
        <script>
        Vue.config.debug = false;
        Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
        </script>

        <link href='https://fonts.googleapis.com/css?family=Cabin:400,700' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div class="mainwrap">
            <div class="haus">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-3 uk-hidden-small">
                        &nbsp;
                    </div>
                    <div class="uk-width-medium-1-3 uk-text-center">
                        <a href="/"><img src="/img/logo.png" /></a>
                    </div>
                    <div class="uk-width-medium-1-3 cart-widget-container uk-flex uk-flex-center uk-text-center uk-flex-middle">
                        @include('frontend.cart.widget')
                    </div>
                </div>
            </div>


            <div class="menu normal">
                <nav class="top">
                    {!! kalMenuExpandedAll(['hidesmall' => true]) !!}
                    <div>
                        <a href="#my-id" data-uk-offcanvas><i class="uk-icon-bars uk-margin-right"></i>Sjá meira</a>
                    </div>
                </nav>
            </div>



            @if(frontpage())
                @if(isset($forsidumyndir) && !$forsidumyndir->isEmpty())
                    <div class="uk-grid uk-grid-collapse">
                        <div class="uk-width-medium-2-3">
                            <div class="forsidumyndir">
                                <div class="uk-slidenav-position" data-uk-slideshow="{autoplay: true, autoplayInterval: 3000">
                                    <ul class="uk-slideshow">
                                        @foreach($forsidumyndir as $key => $mynd)
                                            <li>
                                                <div class="forsidumynd" style="background-image: url('/imagecache/banner/{{ $mynd->img()->first() }}');">
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
                                    <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-medium-1-3 uk-flex">
                            <div class="fullbar uk-flex uk-flex-middle uk-flex-center uk-flex-wrap">
                                <h4>Dún og fiður ehf framleiðir sjálf allar söluvörur sínar s.s. sængur, kodda, púða og pullur að undanskildum utanyfirverum og lökum.</h4>
                            </div>
                        </div>
                    </div>
                @endif
            @endif

            @if(frontpage())
                <div class="fullbar yellow uk-flex uk-flex-middle uk-flex-center uk-flex-wrap">
                    <h2>Síðan 1959</h2>
                </div>
            @endif


            @if(frontpage())
                <div>
                    <div class="boxes uk-grid uk-grid-collapse">
                        <div class="uk-width-medium-1-3">
                            <div class="box uk-flex" style="background: url('/imagecache/boximg/myndBjarni05.jpg') center center no-repeat; background-size: cover;">
                                <a class="box__centertext box--hover uk-flex uk-flex-center uk-flex-middle uk-flex-wrap">
                                    <h4>FYRIRTÆKIÐ</h4>
                                </a>
                            </div>
                        </div>

                        <div class="uk-width-medium-1-3">
                            <div class="box uk-flex" style="background: url('/imagecache/boximg/12.jpg') center center no-repeat; background-size: cover;">
                                <a class="box__centertext box--hover uk-flex uk-flex-center uk-flex-middle uk-flex-wrap">
                                    <h4>VÖRUR</h4>
                                </a>
                            </div>
                        </div>

                        <div class="uk-width-medium-1-3">
                            <div class="box uk-flex" style="background: url('/imagecache/boximg/image004.jpg') center center no-repeat; background-size: cover;">
                                <a class="box__centertext box--hover uk-flex uk-flex-center uk-flex-middle uk-flex-wrap">
                                    <h4>HREINSUN</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif


            @if(frontpage())
                <div>
                    <div class="boxes uk-grid uk-grid-collapse">
                        <div class="uk-width-small-1-2">
                            <div class="box uk-flex">
                                <div class="box__centertext bg-grey uk-flex uk-flex-center uk-flex-middle uk-flex-wrap">
                                    <h3>Opnunartímar</h3>
                                    <ul>
                                        <li>Virkir dagar</li>
                                        <li>09:00 - 18:00</li>
                                        <li>Laugardagar</li>
                                        <li>11:00 - 16:00</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-small-1-2">
                            <div class="box">
                                <h3>Staðsetning</h3>
                                <p>Kíktu á kortið</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif


            @if(!frontpage())
                <div class="content-container" style="padding-bottom: 80px !important;">
                    <header style="background: url('/imagecache/header/2.jpg') center center no-repeat; background-size: cover;">
                        <h1>@yield('title')</h1>
                    </header>

                    <div class="content">
                        @yield('content')
                    </div>
                </div>
            @endif

            <div class="footer">
                &copy; Dún og fiður ehf | kt: 670901 2540 | Laugavegur 86 | 101 Reykjavík | Sími 511 2004 | Fax 511 2003 | <a href="mailto:dunogfidur@dunogfidur.is">dunogfidur@dunogfidur.is</a>
            </div>

        </div>


        <div id="my-id" class="uk-offcanvas">
            <div class="uk-offcanvas-bar">
                <nav class="offcanvas">
                    {!! kalMenuExpandedAll() !!}
                </nav>
            </div>
        </div>


        <script src="/js/scripts.js?v=2"></script>
    </body>
</html>

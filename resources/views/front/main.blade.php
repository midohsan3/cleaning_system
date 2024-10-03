<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @if (App::getLocale()=='ar' ) dir="rtl" @else dir="ltr"
  @endif>

<head>

  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta http-equiv="x-ua-compatible" content="IE=edge">
  <meta name="author" content="SemiColonWeb">

  @if (App::getLocale()=='ar')
  <meta name="description" content="إذا كنت مشغول وليس لديك الوقت الكافي لأعمال التنظيف دعنا نساعدك">
  @else
  <meta name="description" content="Busy in Work Life? Dont have Enough Time for Cleaning?We Can help You">
  @endif

  <meta property="og:image" content="{{ url("imgs/imgs/hero.jpg") }}" />


  <!-- Font Imports -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="http://fonts.googleapis.com/css?family=Heebo:400,500,700" rel="stylesheet">

  <!-- Core Style -->
  @if (App::getLocale()=='ar')
  <link rel="stylesheet" href="{{asset('front/style-rtl.css')}}">
  @else
  <link rel="stylesheet" href="{{asset('front/style.css')}}">
  @endif


  <!-- Font Icons -->
  <link rel="stylesheet" href="{{asset('front/css/font-icons.css')}}">

  <!-- Plugins/Components CSS -->
  <link rel="stylesheet" href="{{ asset('front/css/components/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('front/css/components/ion.rangeslider.css') }}">

  <!-- Niche Demos -->
  <link rel="stylesheet" href="{{ asset('front/css/cleaner.css') }}">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('front/css/custom.css') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Document Title
	============================================= -->
  <title>Cleaning Company</title>

  <style>
    .form-group>label.error {
      display: block !important;
      text-transform: none;
    }

    .form-group input.valid~label.error,
    .form-group input[type="text"]~label.error,
    .form-group input[type="email"]~label.error,
    .form-group input[type="number"]~label.error,
    .form-group select~label.error {
      display: none !important;
    }
  </style>

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-CZXMRY1T38"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
  
    gtag('config', 'G-CZXMRY1T38');
  </script>

</head>

<body class="stretched">

  <!-- Document Wrapper
	============================================= -->
  <div id="wrapper">

    <!-- Top Bar
		============================================= -->
    <div id="top-bar">
      <div class="container">

        <div class="row justify-content-between">
          <div class="col-12 col-md-auto">

            <!-- Top Links
						============================================= -->
            <div class="top-links">
              <ul class="top-links-container">
                <li class="top-links-item"><a href="{{ route('front') }}">Home</a></li>
                <li class="top-links-item"><a href="{{ route('front') }}">FAQs</a></li>
                <li class="top-links-item"><a href="{{ route('front') }}">Contact</a></li>
                {{-- 
                <li class="top-links-item">
                  @if (App::getLocale()=='ar')
                  <a href="login-register.html"><img src="demos/seo/images/flags/eng.png" alt="Lang">English</a>
                  @else

                  @endif
                  <a href="login-register.html"><img src="demos/seo/images/flags/eng.png" alt="Lang">English</a>
                  <ul class="top-links-sub-menu">
                    <li class="top-links-item"><a href="#"><img src="demos/seo/images/flags/fre.png"
                          alt="Lang">French</a></li>
                    <li class="top-links-item"><a href="#"><img src="demos/seo/images/flags/ara.png"
                          alt="Lang">Arabic</a></li>
                    <li class="top-links-item"><a href="#"><img src="demos/seo/images/flags/tha.png" alt="Lang">Thai</a>
                    </li>
                  </ul>
                </li>
                --}}
              </ul>
            </div><!-- .top-links end -->

          </div>

          <div class="col-12 col-md-auto">

            <!-- Top Social
						============================================= -->
            <ul id="top-social">
              <li><a href="#" class="h-bg-facebook"><span class="ts-icon"><i
                      class="fa-brands fa-facebook-f"></i></span><span class="ts-text">Facebook</span></a></li>
              <li><a href="#" class="h-bg-twitter"><span class="ts-icon"><i
                      class="fa-brands fa-twitter"></i></span><span class="ts-text">Twitter</span></a></li>
              <li><a href="#" class="h-bg-dribbble"><span class="ts-icon"><i
                      class="fa-brands fa-dribbble"></i></span><span class="ts-text">Dribbble</span></a></li>
              <li><a href="#" class="h-bg-github"><span class="ts-icon"><i class="fa-brands fa-github"></i></span><span
                    class="ts-text">Github</span></a></li>
              <li><a href="#" class="h-bg-pinterest"><span class="ts-icon"><i
                      class="fa-brands fa-pinterest-p"></i></span><span class="ts-text">Pinterest</span></a></li>
              <li><a href="#" class="h-bg-instagram"><span class="ts-icon"><i
                      class="fa-brands fa-instagram"></i></span><span class="ts-text">Instagram</span></a></li>
              <li><a href="tel:+1.11.85412542" class="h-bg-call"><span class="ts-icon"><i
                      class="fa-solid fa-phone"></i></span><span class="ts-text">+1.111.222.333</span></a></li>
              <li><a href="mailto:noreply@canvas.com" class="h-bg-email3"><span class="ts-icon"><i
                      class="bi-envelope-fill"></i></span><span class="ts-text">noreply@canvas.com</span></a></li>
            </ul><!-- #top-social end -->

          </div>

        </div>

      </div>

    </div><!-- #top-bar end -->

    <!-- Header
		============================================= -->
    <header id="header" class="full-header header-size-md border-0" data-sticky-shrink="false">

      <div id="header-wrap">
        <div class="container-fluid pe-0">
          <div class="header-row">

            <!-- Logo
						============================================= -->
            <div id="logo" class="col col-sm-auto">
              <a href="{{ route('front') }}">
                <img class="logo-default" srcset="{{ url('imgs/logo.JPG') }} 2x" src="{{ url('imgs/logo.JPG') }}"
                  alt="Smart-Solutions">
              </a>
            </div><!-- #logo end -->

            <div class="primary-menu-trigger">
              <button class="cnvs-hamburger" type="button" title="Open Mobile Menu">
                <span class="cnvs-hamburger-box"><span class="cnvs-hamburger-inner"></span></span>
              </button>
            </div>

            <div class="header-misc">
              <a href="#section-price" data-scrollto="#section-price" data-offset="60"
                class="button button-light text-dark fw-semibold ls-1 text-uppercase fw-bold"><i
                  class="bi-currency-dollar me-1"></i>
                Book Now</a>
            </div>

            <!-- Primary Navigation
						============================================= -->
            <nav class="primary-menu">

              <ul class="menu-container border-end-0 me-0">
                <li class="menu-item active">
                  <a class="menu-link ls-1 text-uppercase fw-bold" href="{{ route('front') }}">
                    <div>Home</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a class="menu-link ls-1 text-uppercase fw-bold" href="#">
                    <div>About Us</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a class="menu-link ls-1 text-uppercase fw-bold" href="#">
                    <div>Services</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a class="menu-link ls-1 text-uppercase fw-bold" href="#">
                    <div>FAQs</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a class="menu-link ls-1 text-uppercase fw-bold" href="#">
                    <div>Contact</div>
                  </a>
                </li>
              </ul>

            </nav><!-- #primary-menu end -->

          </div>
        </div>
      </div>

      <div class="header-wrap-clone"></div>

    </header><!-- #header end -->

    <!-- Slider
		============================================= -->
    <section id="slider" class="slider-element"
      style="background: url('{{ url("imgs/imgs/hero.jpg") }}') center center no-repeat; background-size: cover; height: 700px">
      <div class="vertical-middle">
        <div class="container">
          <div class="row py-5">
            <div class="col-xl-6 col-lg-5 col-md-2"></div>
            <div class="col-xl-6 col-lg-7 col-md-10">
              <div class="slider-title dark">
                <h1 class="">
                  @if (App::getLocale()=='ar')
                  مشغول في عملك؟ ليس لديك الوقت الكافي لتنظيف المنزل؟
                  @else
                  Busy in Work Life? Dont have Enough Time for Cleaning?
                  @endif
                </h1>
                <p></p>
              </div>
              <div class="card border-0 p-3 shadow-lg" style="background-color: rgba(255,255,255,0.85)">
                <div class="form-widget card-body" data-alert-type="inline">
                  <div class="form-result"></div>
                  <form action="{{route('front.booking.get_service')}}" method="POST" class="row form-cleaning mb-0">
                    @csrf
                    <div class="form-process">
                      <div class="form-cleaning-loader css3-spinner" style="position: absolute;">
                        <div class="css3-spinner-double-bounce1"></div>
                        <div class="css3-spinner-double-bounce2"></div>
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="input-group form-group">
                        <span class="input-group-text bg-color text-white"><img
                            src="{{ url('imgs/icons/cleaner2.svg') }}" alt="" width="20"></span>
                        <select class="required form-select" name="service" id="form-cleaning-service">
                          <option value="" disabled selected>--
                            @if (App::getLocale()=='ar')
                            اختر الخدمة
                            @else
                            Select Your Service
                            @endif
                            --</option>
                          @foreach ($services as $service)
                          <option value="{{ $service->id }}">
                            @if (App::getLocale()=='ar')
                            {{ $service->name_ar }}
                            @else
                            {{ $service->name_en }}
                            @endif
                          </option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="input-group form-group">
                        <span class="input-group-text bg-color text-white"><img
                            src="{{ url('imgs/icons/cleaner2.svg') }}" alt="" width="20"></span>
                        <select class="required form-select" name="period" id="form-cleaning-service">
                          <option value="" disabled selected>--
                            @if (App::getLocale()=='ar')
                            اختر المدة
                            @else
                            Select Method
                            @endif
                            --</option>

                          <option value="h">
                            @if (App::getLocale()=='ar')
                            بالساعة
                            @else
                            Per Hour
                            @endif
                          </option>
                          <option value="d">
                            @if (App::getLocale()=='ar')
                            باليوم
                            @else
                            Per Day
                            @endif
                          </option>
                          <option value="m">
                            @if (App::getLocale()=='ar')
                            شهري
                            @else
                            Per Month
                            @endif
                          </option>
                        </select>
                      </div>
                    </div>

                    <div class="col-12">
                      <button type="submit" name="form-cleaning-submit"
                        class="btn btn-lg bg-color text-white fw-semibold w-100 mt-2">
                        @if (App::getLocale()=='ar')
                        استكمال
                        @else
                        Continue
                        @endif
                      </button>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="svg-separator">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2273 390" fill="#FFF">
            <path d="M0,211.28s373-254,1119-205,765,173,1154,0v384H0Z">
          </svg>
        </div>
      </div>
    </section>

    <!-- Content
		============================================= -->
    <section id="content">

      <div class="content-wrap pt-4 pb-0">

        <div class="container">
          <div class="heading-block text-center mx-auto" style="max-width: 700px">
            <h2 class="mb-2 text-transform-none ls-0">How We Work</h2>
            <span>Objectively actualize process-centric infomediaries via ethical niche markets. Professionally
              plagiarize leading-edge potentialities.</span>
          </div>
          <div class="row justify-content-center col-mb-50">
            <div class="col-md-4">
              <div class="feature-box mx-0 fbox-small fbox-center border-0">
                <div class="fbox-img position-relative">
                  <img src="demos/cleaner/images/icons/book.svg" alt="Book Icon" height="160">
                </div>
                <h2 class="mt-4 h5 mb-3 text-transform-none fw-semibold ls-0"><span>1.</span> Book your Cleaner &amp;
                  Time</h2>
                <p>Seamlessly e-enable value-added deliverables and progressive models. Enthusiastically whiteboard
                  fully tested channels.</p>
                <a href="#" class="btn second-bg-color px-3 fw-semibold">Get Started <i class="bi-arrow-right"></i></a>
              </div>
            </div>

            <div class="col-md-4">
              <div class="feature-box mx-0 fbox-small fbox-center border-0">
                <div class="fbox-img position-relative">
                  <img src="demos/cleaner/images/icons/confirm3.svg" alt="Confirm Icon" height="160">
                </div>
                <h2 class="mt-4 h5 mb-3 text-transform-none fw-semibold ls-0"><span>2.</span> Confirm Your Booking</h2>
                <p>Credibly enable market positioning resources after principle-centered customer service. Competently
                  negotiate interdependent.</p>
              </div>
            </div>

            <div class="col-md-4">
              <div class="feature-box mx-0 fbox-small fbox-center border-0">
                <div class="fbox-img position-relative">
                  <img src="demos/cleaner/images/icons/enjoy.svg" alt="Relax Icon" height="160">
                </div>
                <h2 class="mt-4 h5 mb-3 text-transform-none fw-semibold ls-0"><span>3.</span> Relax &amp; Enjoy</h2>
                <p>Quickly disintermediate multidisciplinary relationships via functional e-tailers. Collaboratively
                  grow cutting-edge information without.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="clear"></div>

        <div class="text-center dark hero-diagonal mt-6 mb-6" style="padding: 170px 0">
          <div class="container" style="max-width: 760px">
            <h2 class="mb-4 h1 fw-normal">We make your Home Shine and Sparkle</h2>
            <span class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, mollitia, quam modi
              necessitatibus placeat dolores laudantium. Laudantium, eveniet, possimus.</span>
          </div>
        </div>

        <div class="clear"></div>

        <div class="container mt-5 mb-6">
          <div class="heading-block text-center mx-auto" style="max-width: 700px">
            <h2 class="mb-2 text-transform-none ls-0">Why You Choose Us?</h2>
            <span>Authoritatively create performance based web services for exceptional products. Dynamically
              disseminate customized.</span>
          </div>
          <div class="clear"></div>
          <div class="row col-mb-50 mt-3">

            <div class="col-lg-4 text-center order-lg-last">
              <img src="demos/cleaner/images/cleaner-icon.svg" alt="Cleaner" width="340">
              <small class="d-block tright"><a href="http://www.freepik.com" style="color: #DDD">Designed by macrovector
                  / Freepik</a></small>
            </div>

            <div class="col-lg-4 col-md-6 pb-0">

              <div class="feature-box fbox-plain mb-5">
                <div class="fbox-icon">
                  <img src="demos/cleaner/images/icons/cleaner-man.svg" alt="Cleaner Icon">
                </div>
                <div class="fbox-content">
                  <h3 class="text-transform-none fw-semibold ls-0">100% Trusted Cleaners</h3>
                  <p>Stretch your Website to the Full Width or make it boxed to surprise your visitors.</p>
                </div>
              </div>

              <div class="feature-box fbox-plain mb-5">
                <div class="fbox-icon">
                  <img src="demos/cleaner/images/icons/cleaning-man.svg" alt="Cleaner Icon">
                </div>
                <div class="fbox-content">
                  <h3 class="text-transform-none fw-semibold ls-0">820+ Over Cleaners</h3>
                  <p>We have covered each &amp; everything in our Docs including Videos &amp; Screenshots.</p>
                </div>
              </div>

              <div class="feature-box fbox-plain mb-5">
                <div class="fbox-icon">
                  <img src="demos/cleaner/images/icons/guarantee.svg" alt="Cleaner Icon">
                </div>
                <div class="fbox-content">
                  <h3 class="text-transform-none fw-semibold ls-0">Satisfaction Guarantee</h3>
                  <p>Display your Content attractively using Parallax Sections with HTML5 Videos.</p>
                </div>
              </div>

            </div>

            <div class="col-lg-4 col-md-6">

              <div class="feature-box fbox-plain mb-5">
                <div class="fbox-icon">
                  <img src="demos/cleaner/images/icons/product.svg" alt="Cleaner Icon">
                </div>
                <div class="fbox-content">
                  <h3 class="text-transform-none fw-semibold ls-0">Eco-Friendly Products</h3>
                  <p>Canvas provides support for Native HTML5 Videos that can be added to a Background.</p>
                </div>
              </div>

              <div class="feature-box fbox-plain mb-5">
                <div class="fbox-icon">
                  <img src="demos/cleaner/images/icons/time.svg" alt="Cleaner Icon">
                </div>
                <div class="fbox-content">
                  <h3 class="text-transform-none fw-semibold ls-0">Saves Your Time</h3>
                  <p>Complete control on each &amp; every element that provides endless customization.</p>
                </div>
              </div>

              <div class="feature-box fbox-plain mb-5">
                <div class="fbox-icon">
                  <img src="demos/cleaner/images/icons/price.svg" alt="Cleaner Icon">
                </div>
                <div class="fbox-content">
                  <h3 class="text-transform-none fw-semibold ls-0">Flat Rate Price</h3>
                  <p>Change your Website's Primary Scheme instantly by simply adding the dark class.</p>
                </div>
              </div>

            </div>

          </div>
        </div>

        <div class="clear"></div>

        <div id="section-price" class="section mb-0 mt-6" style="padding-bottom: 100px; overflow: visible">
          <div class="svg-separator top">
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2273 390" fill="#F9F9F9">
                <path d="M0,211.28s373-254,1119-205,765,173,1154,0v384H0Z">
              </svg>
            </div>
          </div>
          <div class="container">
            <div class="form-widget">
              <div class="form-result"></div>
              <form id="cleaner-form" name="cleaner-form" action="include/form.php" method="post"
                class="cleaner-form mb-0" enctype="multipart/form-data">
                <div class="form-process"></div>
                <div class="row gutter-40">
                  <div class="col-lg-8">
                    <div class="heading-block border-bottom-0">
                      <h2 class="mb-3 text-transform-none ls-0">Cleaning Cost Calculator</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate vero esse ea hic quod
                        veniam quam accusamus laboriosam ipsam provident.</p>
                    </div>

                    <div class="row">
                      <div class="col-md-6 form-group">
                        <label for="cleaner-form-area" class="mb-3">Select Area:</label><br>
                        <input id="cleaner-form-area" name="cleaner-form-area"
                          class="clean-area required input-range-slider">
                      </div>

                      <div class="col-md-6 form-group">
                        <label for="cleaner-form-rooms" class="mb-3">Select Rooms:</label><br>
                        <input id="cleaner-form-rooms" name="cleaner-form-rooms"
                          class="clean-rooms required input-range-slider">
                      </div>

                      <div class="col-md-6 form-group">
                        <label for="cleaner-form-bathrooms" class="mb-3">Select Bathrooms:</label><br>
                        <input id="cleaner-form-bathrooms" name="clean-form-bathrooms"
                          class="clean-bathrooms required input-range-slider">
                      </div>

                      <div class="col-md-6 form-group">
                        <label for="cleaner-form-livingrooms" class="mb-3">Select Living Rooms:</label><br>
                        <input id="cleaner-form-livingrooms" name="clean-form-livingrooms"
                          class="clean-livingrooms required input-range-slider">
                      </div>

                      <div class="col-12 form-group mb-4">
                        <label class="mb-3">Others Requirment: <small
                            class="text-transform-none ls-0 text-black-50">(Select Multiples)*</small></label><br>
                        <div class="btn-group w-100" role="group">
                          <input type="checkbox" name="clean-form-others[]" class="btn-check"
                            id="clean-form-others-clean-garden" data-price="4" autocomplete="off" value="Clean Garden">
                          <label for="clean-form-others-clean-garden"
                            class="btn btn-outline-secondary px-4 fw-semibold ls-0 text-transform-none">Clean
                            Garden</label>

                          <input type="checkbox" name="clean-form-others[]" class="btn-check"
                            id="clean-form-others-play-room" data-price="5" autocomplete="off" value="Play Room">
                          <label for="clean-form-others-play-room"
                            class="btn btn-outline-secondary px-4 fw-semibold ls-0 text-transform-none">Play
                            Room</label>

                          <input type="checkbox" name="clean-form-others[]" class="btn-check"
                            id="clean-form-others-garage" data-price="5.4" autocomplete="off" value="Garage">
                          <label for="clean-form-others-garage"
                            class="btn btn-outline-secondary px-4 fw-semibold ls-0 text-transform-none">Garage</label>

                          <input type="checkbox" name="clean-form-others[]" class="btn-check" id="clean-form-others-gym"
                            data-price="4.2" autocomplete="off" value="Gym">
                          <label for="clean-form-others-gym"
                            class="btn btn-outline-secondary px-4 fw-semibold ls-0 text-transform-none">Gym</label>
                        </div>
                      </div>

                      <div class="col-md-6 form-group mb-4">
                        <label for="clean-form-name">Name:</label>
                        <input type="text" name="clean-form-name" id="clean-form-name" class="form-control required"
                          value="" placeholder="Enter your Full Name">
                      </div>
                      <div class="col-6 form-group mb-4">
                        <label for="clean-form-email">Email:</label>
                        <input type="email" name="clean-form-email" id="clean-form-email" class="form-control required"
                          value="" placeholder="Enter your Email">
                      </div>

                      <div class="col-12">
                        <label for="clean-form-message">Additional Message <small
                            class="text-transform-none ls-0 text-black-50">(Optional):</small></label>
                        <textarea name="clean-form-message" id="clean-form-message" class="form-control" cols="30"
                          rows="6"></textarea>
                      </div>

                      <input type="text" class="d-none" id="clean-form-botcheck" name="clean-form-botcheck" value="">
                      <input type="hidden" name="prefix" value="clean-form-">
                      <input type="hidden" name="subject" value="Cleaner Cost Estimate Request">
                      <input type="hidden" name="html_title" value="Cleaner Cost Estimation">
                      <input type="hidden" id="clean-form-price" name="website-cost-total-price" value="">
                    </div>
                  </div>
                  <div class="col-lg-4 mt-4 mt-md-0">
                    <div class="card text-center border-0 shadow-sm">
                      <div class="card-body pt-4 pb-0">
                        <h4 class="card-title fw-semibold text-uppercase mb-0">Final Cost</h4>
                        <!-- Price Value -->
                        <div class="total-price color fw-bold py-3"></div>
                      </div>
                      <div class="line my-1"></div>
                      <div class="card-body py-4">
                        <ul class="iconlist d-flex flex-column align-items-center ms-0 op-08">
                          <li class="mb-2">100% Trusted Cleaners</li>
                          <li class="mb-2">Over 820+ Cleaners</li>
                          <li class="mb-2">No Hidden Charges</li>
                          <li>Credit Cards Accepted</li>
                        </ul>
                        <button type="submit" name="clean-form-submit"
                          class="button button-rounded button-light button-large second-bg-color text-dark w-100 ls-0 m-0">Book
                          Now</button>
                      </div>
                    </div>

                    <div class="fancy-title title-border mt-5">
                      <h4 class="fw-semibold">Pricing FAQs</h4>
                    </div>

                    <div class="toggle">
                      <div class="toggle-header justify-content-between">
                        <div class="toggle-icon">
                          <i class="toggle-closed bi-plus-circle"></i>
                          <i class="toggle-open bi-dash-circle"></i>
                        </div>
                        <div class="toggle-title fw-semibold">
                          How can I Pay?
                        </div>
                      </div>
                      <div class="toggle-content text-black-50">Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam
                        cum voluptates doloribus.</div>
                    </div>

                    <div class="toggle">
                      <div class="toggle-header justify-content-between">
                        <div class="toggle-icon">
                          <i class="toggle-closed bi-plus-circle"></i>
                          <i class="toggle-open bi-dash-circle"></i>
                        </div>
                        <div class="toggle-title fw-semibold">
                          How can I Pay?
                        </div>
                      </div>
                      <div class="toggle-content text-black-50">Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam
                        cum voluptates doloribus.</div>
                    </div>

                    <div class="toggle">
                      <div class="toggle-header justify-content-between">
                        <div class="toggle-icon">
                          <i class="toggle-closed bi-plus-circle"></i>
                          <i class="toggle-open bi-dash-circle"></i>
                        </div>
                        <div class="toggle-title fw-semibold">
                          Can I cancel my Plan?
                        </div>
                      </div>
                      <div class="toggle-content text-black-50">Minima odio quo voluptate illum excepturi quam cum
                        voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque
                        explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde
                        quas beatae vero vitae nulla.</div>
                    </div>

                    <p class="fw-semibold">Want to know more? <a href="#"><u>See the full FAQs</u></a> <i
                        class="bi-caret-right-fill color"></i></p>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="section m-0 dark"
          style="background: linear-gradient(rgba(51,94,238,0.8), rgba(51,94,238,0.8)), url('demos/cleaner/images/section2.jpg') center center no-repeat; background-size: cover; padding: 80px 0 230px">
          <div class="container">
            <div class="heading-block text-center mx-auto" style="max-width: 700px">
              <h5 class="fw-normal text-uppercase ls-2">High Rated Cleaners</h5>
              <h2 class="mb-2 text-transform-none ls-0">820+ Over Cleaners Completed their Jobs.</h2>
              <span>Authoritatively create performance based web services for exceptional products. Dynamically
                disseminate customized.</span>
            </div>
          </div>
        </div>

        <div class="negetive-margin">
          <div class="container">
            <div id="cleaner-carousel" class="owl-carousel carousel-widget" data-margin="30" data-nav="true"
              data-pagi="true" data-items-xs="1" data-items-sm="2" data-items-md="3" data-items-lg="4"
              data-items-xl="4">
              <div class="card border-0 shadow-sm">
                <img src="demos/cleaner/images/cleaners/1.jpg" class="card-img-top" alt="...">
                <div class="card-body second-bg-color rounded-bottom p-4">
                  <h4 class="card-title">Penny Tool</h4>
                  <p class="card-text">Some quick example text to build on the card title.</p>
                </div>
              </div>

              <div class="card border-0 shadow-sm">
                <img src="demos/cleaner/images/cleaners/2.jpg" class="card-img-top" alt="...">
                <div class="card-body second-bg-color rounded-bottom p-4">
                  <h4 class="card-title">Sue Shei</h4>
                  <p class="card-text">Some quick example text to build on the card title.</p>
                </div>
              </div>

              <div class="card border-0 shadow-sm">
                <img src="demos/cleaner/images/cleaners/3.jpg" class="card-img-top" alt="...">
                <div class="card-body second-bg-color rounded-bottom p-4">
                  <h4 class="card-title">Benjamin Evalent </h4>
                  <p class="card-text">Some quick example text to build on the card title.</p>
                </div>
              </div>

              <div class="card border-0 shadow-sm">
                <img src="demos/cleaner/images/cleaners/4.jpg" class="card-img-top" alt="...">
                <div class="card-body second-bg-color rounded-bottom p-4">
                  <h4 class="card-title">Malcolm Function</h4>
                  <p class="card-text">Some quick example text to build on the card title.</p>
                </div>
              </div>

              <div class="card border-0 shadow-sm">
                <img src="demos/cleaner/images/cleaners/5.jpg" class="card-img-top" alt="...">
                <div class="card-body second-bg-color rounded-bottom p-4">
                  <h4 class="card-title">Alan Fresco </h4>
                  <p class="card-text">Some quick example text to build on the card title.</p>
                </div>
              </div>

              <div class="card border-0 shadow-sm">
                <img src="demos/cleaner/images/cleaners/6.jpg" class="card-img-top" alt="...">
                <div class="card-body second-bg-color rounded-bottom p-4">
                  <h4 class="card-title">Justin Case</h4>
                  <p class="card-text">Some quick example text to build on the card title.</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="section bg-transparent">
          <div class="container">
            <div class="row justify-content-between align-items-center">

              <div class="col-md-5 text-center">
                <img src="demos/cleaner/images/icons/reviews.svg" alt="Review Image" width="400">
                <div class="row mt-5">
                  <div class="col-6">
                    <h3 class="color fw-normal h1 mb-3">1100+</h3>
                    <h5 class="text-muted fw-normal">Jobs Done, consectetur adipisicing elit. Eveniet, sunt.</h5>
                  </div>

                  <div class="col-6">
                    <h3 class="color fw-normal h1 mb-3">4.9/5.0</h3>
                    <h5 class="text-muted fw-normal">Average review across all of our company Service lines.</h5>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 col-md-7">
                <div class="heading-block">
                  <h2 class="mb-2 text-transform-none ls-0">More than <span>12000+</span> Customers Reviews</h2>
                  <span>Objectively actualize process-centric infomediaries via ethical niche markets. Professionally
                    plagiarize leading-edge potentialities.</span>
                </div>

                <div id="oc-testi" class="owl-carousel testimonials-carousel carousel-widget card" data-margin="10"
                  data-nav="false" data-pagi="true" data-items="1" data-autoplay="5000" data-loop="true">
                  <div class="card-body p-4">
                    <div class="row">
                      <div class="col-auto">
                        <img class="rounded-circle" src="images/testimonials/1.jpg" alt="Customer Testimonails">
                      </div>
                      <div class="col">
                        <h4 class="fw-normal">Holisticly iterate world-class niches before best-of-breed initiatives.
                          Seamlessly optimize goal-oriented outsourcing before low-risk high-yield processes. Uniquely
                          deploy extensive networks for leading-edge models.</h4>
                        <h4 class="h6 mb-0 fw-medium">Siri Alexa</h4>
                        <small class="text-muted">Apple Inc.</small>
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-4">
                    <div class="row">
                      <div class="col-auto">
                        <a href="#"><img class="rounded-circle" src="images/testimonials/2.jpg"
                            alt="Customer Testimonails"></a>
                      </div>
                      <div class="col">
                        <h4 class="fw-normal">Progressively scale front-end models whereas standardized technology.
                          Collaboratively disintermediate user friendly communities vis-a-vis cross-platform results.
                          Completely productize client-centric benefits vis-a-vis optimal.</h4>
                        <h4 class="h6 mb-0 fw-medium">Bailey Wonger</h4>
                        <small class="text-muted">Apple Inc.</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="section text-center mb-0" style="padding: 120px 0; background-color: rgba(51,94,238,0.08);">
          <div class="container" style="max-width: 700px">
            <img src="demos/cleaner/images/icons/apply.svg" alt="Apply Icon" height="200" class="mb-4">
            <h2 style="font-size: 38px">Try out now &amp; Apply for Cleaner</h2>
            <p class="mb-5" style="font-size: 1.125rem;">Dynamically predominate B2B resources whereas interdependent
              strategic theme areas. Completely underwhelm out-of-the-box functionalities for worldwide e-tailers.
              Dynamically restore fully researched architectures.</p>
            <a href="#" class="btn btn-lg bg-color text-white fw-semibold px-4">Get Started</a>
            <a href="#" class="btn btn-lg bg-white fw-semibold color px-4 ms-2">Contact us</a>
          </div>
        </div>

      </div>

    </section><!-- #content end -->

    <div class="position-relative" style="background-color: rgba(51,94,238,0.08);">
      <svg class="svg-separator" viewBox="0 0 1440 24" fill="none" xmlns="http://www.w3.org/2000/svg"
        preserveAspectRatio="none">
        <path d="M0 24H1440V0C722.5 52 0 0 0 0V24Z" fill="#335EEE"></path>
      </svg>
    </div>

    <!-- Footer
		============================================= -->
    <footer id="footer" class="border-0 dark bg-color">

      <div class="container">

        <!-- Footer Widgets
				============================================= -->
        <div class="footer-widgets-wrap">

          <div class="row">
            <div class="col-6 col-lg-4">
              <img class="mb-5" src="demos/bike/images/logo-foo.png" alt="" width="123">
              <p class="text-white-50">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque repellat
                possimus sapiente officiis alias, eius libero fugiat ex error tempore.</p>
              <div class="d-flex">
                <a href="#"
                  class="social-icon bg-white bg-opacity-25 border-transparent rounded-circle si-small h-bg-facebook">
                  <i class="fa-brands fa-facebook-f"></i>
                  <i class="fa-brands fa-facebook-f"></i>
                </a>
                <a href="#"
                  class="social-icon bg-white bg-opacity-25 border-transparent rounded-circle si-small h-bg-twitter">
                  <i class="fa-brands fa-twitter"></i>
                  <i class="fa-brands fa-twitter"></i>
                </a>
                <a href="#"
                  class="social-icon bg-white bg-opacity-25 border-transparent rounded-circle si-small h-bg-youtube">
                  <i class="fa-brands fa-youtube"></i>
                  <i class="fa-brands fa-youtube"></i>
                </a>
                <a href="#"
                  class="social-icon bg-white bg-opacity-25 border-transparent rounded-circle si-small h-bg-appstore">
                  <i class="fa-brands fa-apple"></i>
                  <i class="fa-brands fa-apple"></i>
                </a>
              </div>
            </div>
            <div class="col-6 col-lg-3">
              <h4>Features</h4>
              <ul class="list-unstyled mb-0 text-small">
                <li class="mb-2"><a href="#" class="text-light">Cool stuff</a></li>
                <li class="mb-2"><a href="#" class="text-light">Random feature</a></li>
                <li class="mb-2"><a href="#" class="text-light">Team feature</a></li>
                <li class="mb-2"><a href="#" class="text-light">Stuff for developers</a></li>
                <li class="mb-2"><a href="#" class="text-light">Another one</a></li>
                <li><a href="#" class="text-light">Last time</a></li>
              </ul>
            </div>
            <div class="col-6 col-lg-3 mt-5 mt-lg-0">
              <h4>Resources</h4>
              <ul class="list-unstyled mb-0 text-small">
                <li class="mb-2"><a href="#" class="text-light">Resource</a></li>
                <li class="mb-2"><a href="#" class="text-light">Resource name</a></li>
                <li class="mb-2"><a href="#" class="text-light">Another resource</a></li>
                <li><a href="#" class="text-light">Final resource</a></li>
              </ul>
            </div>
            <div class="col-6 col-lg-2 mt-5 mt-lg-0">
              <h4>About</h4>
              <ul class="list-unstyled mb-0 text-small">
                <li class="mb-2"><a href="#" class="text-light">Team</a></li>
                <li class="mb-2"><a href="#" class="text-light">Locations</a></li>
                <li class="mb-2"><a href="#" class="text-light">Privacy</a></li>
                <li><a class="text-light" href="#">Terms</a></li>
              </ul>
            </div>
          </div>

        </div><!-- .footer-widgets-wrap end -->

      </div>
      <!-- Copyrights
			============================================= -->
      <div id="copyrights" class="dark">

        <div class="container">

          <div class="row align-items-center justify-content-between">
            <div class="col-md-6 text-white-50">
              Copyrights &copy; 2023 All Rights Reserved by Canvas Inc.<br>
              <div class="copyright-links"><a href="#" class="text-white-50">Terms of Use</a> / <a href="#"
                  class="text-white-50">Privacy Policy</a></div>
            </div>

            <div class="col-md-6 d-flex justify-content-md-end mt-4 mt-md-0">
              <div class="copyrights-menu copyright-links mb-0">
                <a href="#" class="text-white-50">Home</a>/<a href="#" class="text-white-50">About Us</a>/<a href="#"
                  class="text-white-50">Price</a>/<a href="#" class="text-white-50">Contact</a>
              </div>
            </div>
          </div>

        </div>

      </div><!-- #copyrights end -->

    </footer><!-- #footer end -->

  </div><!-- #wrapper end -->

  <!-- Go To Top
	============================================= -->
  <div id="gotoTop" class="uil uil-angle-up rounded-circle bg-color h-bg-dark"></div>

  <!-- JavaScripts
	============================================= -->
  <script src="{{ asset('front/js/jquery.js') }}"></script>
  <script src="{{ asset('front/js/functions.js') }}"></script>

  <!-- DatePicker JS -->
  <script src="{{ asset('front/js/components/moment.js') }}"></script>
  <script src="{{ asset('front/js/components/daterangepicker.js') }}"></script>

  <!-- Range Slider Plugin -->
  <script src="{{ asset('front/js/components/rangeslider.min.js') }}"></script>

  <script>
    jQuery(document).ready(function() {
			jQuery('.cleaning-date').daterangepicker({
				"buttonClasses": "button button-rounded button-mini text-transform-none ls-0 fw-semibold",
				"applyClass": "button-color m-0 ms-1",
				"cancelClass": "bg-danger m-0 text-light",
				singleDatePicker: true,
				startDate: moment().startOf('hour'),
				minDate: moment().startOf('date'),
				timePicker: true,
				timePickerSeconds: false,
				locale: {
					format: 'DD/MM/YYYY h:mm a',
				},
				timePickerIncrement: 10
			});

			jQuery('.cleaning-date').val('Select Date & Time');

			jQuery('.form-cleaning').on( 'formSubmitSuccess', function(){
				jQuery('.cleaning-date').val('Select Date & Time');
			});

			// Calculator
			var pricingAREA = 0,
				pricingROOMS = 0,
				pricingBATHROOMS = 0,
				pricingLIVINGROOMS = 0,
				pricingOTHERS = 0,
				elementAREA = jQuery(".clean-area"),
				elementROOMS = jQuery(".clean-rooms"),
				elementBATHROOMS = jQuery(".clean-bathrooms"),
				elementLIVINGROOMS = jQuery(".clean-livingrooms"),
				elementOTHERS = jQuery("input[name='clean-form-others[]']"),
				elementPRICE = jQuery("#clean-form-price");

			elementAREA.ionRangeSlider({
				min: 0,
				max: 5000,
				from: 0,
				step: 10,
				max_postfix: "sqft.",
				onStart: function(data){
					pricingAREA = data.from;
				}
			});

			elementAREA.on( 'change', function(){
				pricingAREA = jQuery(this).prop('value');
				calculatePrice( pricingAREA, pricingROOMS, pricingBATHROOMS, pricingLIVINGROOMS, pricingOTHERS );
			});

			elementROOMS.ionRangeSlider({
				min: 0,
				max: 10,
				from: 0,
				step: 1,
				onStart: function(data){
					pricingROOMS = data.from;
				}
			});

			elementROOMS.on( 'onStart change', function(){
				pricingROOMS = jQuery(this).prop('value');
				calculatePrice( pricingAREA, pricingROOMS, pricingBATHROOMS, pricingLIVINGROOMS, pricingOTHERS );
			});

			elementBATHROOMS.ionRangeSlider({
				min: 0,
				max: 10,
				from: 0,
				step: 1,
				onStart: function(data){
					pricingBATHROOMS = data.from;
				}
			});

			elementBATHROOMS.on( 'onStart change', function(){
				pricingBATHROOMS = jQuery(this).prop('value');
				calculatePrice( pricingAREA, pricingROOMS, pricingBATHROOMS, pricingLIVINGROOMS, pricingOTHERS );
			});

			elementLIVINGROOMS.ionRangeSlider({
				min: 0,
				max: 5,
				from: 0,
				step: 1,
				onStart: function(data){
					pricingLIVINGROOMS = data.from;
				}
			});

			elementLIVINGROOMS.on( 'onStart change', function(){
				pricingLIVINGROOMS = jQuery(this).prop('value');
				calculatePrice( pricingAREA, pricingROOMS, pricingBATHROOMS, pricingLIVINGROOMS, pricingOTHERS );
			});

			elementOTHERS.change(function(){
				var pricingOTHERS = 0;
				elementOTHERS.each(function(){
					if(jQuery(this).is(':checked')){
						pricingOTHERS += parseFloat(jQuery(this).attr('data-price'));
						calculatePrice( pricingAREA, pricingROOMS, pricingBATHROOMS, pricingLIVINGROOMS, pricingOTHERS );
					} else {
						calculatePrice( pricingAREA, pricingROOMS, pricingBATHROOMS, pricingLIVINGROOMS, pricingOTHERS );
					}
				});
			});

			calculatePrice( pricingAREA, pricingROOMS, pricingBATHROOMS, pricingLIVINGROOMS, pricingOTHERS );

			function calculatePrice( area, rooms, bathrooms, livingrooms, extra ) {
				var TotalPriceValue = ( Number(area) * .2 ) + ( Number(rooms) * 4 ) + ( Number(bathrooms) * 3 ) + ( Number(livingrooms) * 5 ) + ( Number(extra) );
				jQuery('.total-price').html( '$'+TotalPriceValue );
				elementPRICE.val( TotalPriceValue ).change();
			}
		});
  </script>

</body>

</html>
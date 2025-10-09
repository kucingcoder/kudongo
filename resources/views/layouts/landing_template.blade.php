<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('name') - @yield('title')</title>
    <meta name="description" content="@yield('description')">
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="robots" content="index, follow">

    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('name')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image" content="/logo.webp">

    <link rel="icon" type="image/png" href="/icon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/icon/favicon.svg" />
    <link rel="shortcut icon" href="/icon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/icon/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="@yield('name')" />
    <link rel="manifest" href="/icon/site.webmanifest" />

    @include('layouts.landing_css')

    <style>
        .footer-links a.text-white:hover {
            color: #cccccc !important;
            /* Warna abu-abu terang saat di-hover */
        }
    </style>
</head>

<body class="index-page">
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                <h1 class="sitename text-uppercase text-primary fw-bold">@yield('name')</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('home') }}" class="active">Home</a></li>
                    <li><a href="{{ route('projects') }}">Projects</a></li>
                    <li><a href="{{ route('skills') }}">Skills</a></li>
                    <li><a href="{{ route('certificates') }}">Certificates</a></li>
                    <li><a href="{{ route('experiences') }}">Experiences</a></li>
                    <li><a href="{{ route('educations') }}">Educations</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>

    <footer id="footer" class="footer bg-dark text-light">
        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span class="sitename text-uppercase fw-bold text-primary">@yield('name')</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>@yield('address')</p>
                        <p class="mt-3"><strong>Phone :</strong> <span>@yield('phone')</span></p>
                        <p><strong>Email :</strong> <span>@yield('email')</span></p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4 class="text-light">Career</h4>
                    <ul>
                        <li><a href="{{ route('projects') }}" class="link-light link-opacity-50-hover">Projects</a></li>
                        <li><a href="{{ route('experiences') }}" class="link-light link-opacity-50-hover">Experiences</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4 class="text-light">Details</h4>
                    <ul>
                        <li><a href="{{ route('skills') }}" class="link-light link-opacity-50-hover">Skills</a></li>
                        <li><a href="{{ route('certificates') }}" class="link-light link-opacity-50-hover">Certificates</a></li>
                        <li><a href="{{ route('educations') }}" class="link-light link-opacity-50-hover">Educations</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12">
                    <h4 class="text-light">Send Me a Message</h4>
                    <form action="{{ route('send_message') }}" method="post">
                        @csrf
                        <div class="row gy-3">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="contact" class="form-control" placeholder="Your Contact" required>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" name="message" rows="3" style="resize: none;" placeholder="Message" required></textarea>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary w-100">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container d-flex flex-column align-items-center justify-content-center copyright text-center text-light">
            <hr class="border-1 w-100">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">@yield('name')</strong> | <span>All Rights Reserved</span></p>
        </div>
    </footer>

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    @include('layouts.landing_js')
</body>

</html>
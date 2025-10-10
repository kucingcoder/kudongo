@extends('layouts.landing_template')

@section('name', $user->name)
@section('title', 'Home')
@section('description', $user->description)
@section('address', $user->address)
@section('phone', $user->phone)
@section('email', $user->email)

@section('content')
<section id="hero" class="hero section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="d-flex flex-column-reverse flex-md-row flex-lg-row align-items-center justify-content-between">
            <div class="w-100 w-md-50 w-lg-50">
                <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
                    <h1 class="mb-4">
                        {{ $user->name }} <br>
                        <span class="accent-text">{{ $user->profession }}</span>
                    </h1>

                    <p class="mb-5 mx-3 mx-md-0 mx-lg-0">
                        {{ $user->description }}
                    </p>

                    <div class="hero-buttons">
                        <a download href="{{ route('download_cv') }}" class="btn btn-primary me-0 me-sm-2 mx-1">
                            <i class="bi bi-download"></i>
                            <span>Download CV</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="w-100 w-md-50 w-lg-50 d-flex align-items-center justify-content-center justify-content-md-end mb-5 mb-md-0 mb-lg-0" data-aos="fade-up" data-aos-delay="300">
                <img src="/storage/{{ $user->photo }}" class="img-fluid w-75 rounded-circle shadow-lg border border-primary border-3" alt="hero image">
            </div>
        </div>

        <div class="mx-3 mx-md-0 mx-lg-0 row stats-row gy-4 mt-5 shadow-lg" data-aos="fade-up" data-aos-delay="500">
            <div class="col-lg-4 col-md-6">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="bi bi-kanban"></i>
                    </div>
                    <div class="stat-content">
                        <h4>{{ $totalProjects}} Projects</h4>
                        <p class="mb-0">effective product created</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="bi bi-briefcase-fill"></i>
                    </div>
                    <div class="stat-content">
                        <h4>{{ $totalClients }} Clients</h4>
                        <p class="mb-0">all customers are satisfied</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="bi bi-journal-bookmark-fill"></i>
                    </div>
                    <div class="stat-content">
                        <h4>{{ $totalSkills}} Skills</h4>
                        <p class="mb-0">still learning new things</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section id="features-cards" class="features-cards section">
    <div class="container section-title" data-aos="fade-up">
        <h2 class="text-uppercase">Upheld Principles</h2>
        <p>The core values that guide every project and collaboration to deliver the best results.</p>
    </div>

    <div class="container">
        <div class="row gy-4 mx-3 mx-md-0 mx-lg-0">
            <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="feature-box orange">
                    <i class="bi bi-gem"></i>
                    <h4>Quality & Creativity</h4>
                    <p>Combining innovative ideas with precise technical execution to create work that is both functional and impactful.</p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                <div class="feature-box blue">
                    <i class="bi bi-people-fill"></i>
                    <h4>Communication & Collaboration</h4>
                    <p>Believing that open communication and close collaboration are key to turning a shared vision into reality.</p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                <div class="feature-box green">
                    <i class="bi bi-clock-history"></i>
                    <h4>Professionalism & Timeliness</h4>
                    <p>Upholding integrity, respecting deadlines, and ensuring every project is completed to the highest standards.</p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                <div class="feature-box red">
                    <i class="bi bi-hand-thumbs-up-fill"></i>
                    <h4>Client Satisfaction</h4>
                    <p>The ultimate goal of every project is your satisfaction. I am dedicated to exceeding expectations and building long-term partnerships.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="clients" class="clients section">
    <div class="container section-title" data-aos="fade-up">
        <h2 class="text-uppercase">My Clients</h2>
        <p>A list of clients who have trusted me with their projects.</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
                {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                        "delay": 5000
                    },
                    "slidesPerView": "auto",
                    "pagination": {
                        "el": ".swiper-pagination",
                        "type": "bullets",
                        "clickable": true
                    },
                    "breakpoints": {
                        "320": {
                            "slidesPerView": 2,
                            "spaceBetween": 40
                        },
                        "480": {
                            "slidesPerView": 3,
                            "spaceBetween": 60
                        },
                        "640": {
                            "slidesPerView": 4,
                            "spaceBetween": 80
                        },
                        "992": {
                            "slidesPerView": 6,
                            "spaceBetween": 120
                        }
                    }
                }
            </script>
            <div class="swiper-wrapper align-items-center justify-content-center">
                @forelse ($Clients as $client)
                <a href="{{ $client->url }}" target="_blank" class="swiper-slide"><img src="/storage/{{ $client->logo }}" class="img-fluid" alt="logo-{{ $client->name }}"></a>
                @empty
                <p>No clients found.</p>
                @endforelse
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
@endsection
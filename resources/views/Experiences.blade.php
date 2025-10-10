@extends('layouts.landing_template')

@section('name', $user->name)
@section('title', 'Experiences')
@section('description', $user->description)
@section('address', $user->address)
@section('phone', $user->phone)
@section('email', $user->email)

@section('content')
<style>
    .experiences-section {
        padding: 60px 0;
    }

    .experience-card {
        border: 1px solid #eef0f2;
        border-radius: 8px;
        width: 100%;
        display: flex;
        flex-direction: row;
        align-items: center;
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .experience-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .experience-card-img {
        flex: 0 0 100px;
        background: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        align-self: stretch;
        border-right: 1px solid #eef0f2;
    }

    .experience-card-img img {
        max-height: auto;
        max-width: 70%;
        object-fit: contain;
    }

    .experience-card-info {
        padding: 15px 20px;
        text-align: left;
        flex-grow: 1;
    }

    .experience-card-info h4 {
        font-weight: 700;
        margin-top: 0;
        margin-bottom: 5px;
        font-size: 16px;
    }

    .experience-description {
        font-size: 14px;
        color: #6c757d;
        margin-bottom: 5px;
        text-align: justify;
        display: -webkit-box;
        line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        min-height: 32px;
    }
</style>

<div class="page-title light-background">
    <div class="container">
        <h1>Experience That I Have Completed</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="current">Experiences</li>
            </ol>
        </nav>
    </div>
</div>

<section class="experiences-section section">
    <div class="container" data-aos="fade-up">
        <div class="row gy-4 mx-3 mx-md-0 mx-lg-0">
            @forelse ($experiences as $experience)
            <div class="col-md-6 col-lg-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="experience-card border border-muted">
                    <div class="experience-card-img">
                        <img src="/storage/{{ $experience->logo }}" class="img-fluid rounded-circle" alt="{{ $experience->name }}">
                    </div>
                    <div class="experience-card-info">
                        <h4>{{ $experience->name }}</h4>
                        <p class="experience-description">Job desks :
                            @foreach ($experience->job_desk as $job_desk)
                            {{ $job_desk }}@if($loop->last).@else, @endif
                            @endforeach
                        </p>
                        <p class="mb-0"><span class="badge bg-success">{{ $experience->year_start }} - {{ $experience->year_end }}</span> <span class="badge bg-primary">{{ $experience->category }}</span></p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p>No experiences found.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
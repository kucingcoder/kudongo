@extends('layouts.landing_template')

@section('name', $user->name)
@section('title', 'Skills')
@section('description', $user->description)
@section('address', $user->address)
@section('phone', $user->phone)
@section('email', $user->email)

@section('content')
<style>
    .skills-section {
        padding: 60px 0;
    }

    .skill-card {
        border: 1px solid #eef0f2;
        border-radius: 8px;
        width: 100%;
        display: flex;
        flex-direction: row;
        align-items: center;
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .skill-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .skill-card-img {
        flex: 0 0 100px;
        padding: 15px;
        background: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        align-self: stretch;
        border-right: 1px solid #eef0f2;
    }

    .skill-card-img img {
        max-height: auto;
        max-width: 70%;
        object-fit: contain;
    }

    .skill-card-info {
        padding: 15px 20px;
        text-align: left;
        flex-grow: 1;
    }

    .skill-card-info h4 {
        font-weight: 700;
        margin-top: 0;
        margin-bottom: 5px;
        font-size: 16px;
    }

    .skill-description {
        font-size: 14px;
        color: #6c757d;
        margin-bottom: 0;
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
        <h1>Skills That Have Been Learned</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="current">Skills</li>
            </ol>
        </nav>
    </div>
</div>

@foreach ($skillCategories as $category)
<section id="skills-{{ strtolower(str_replace(' ', '-', $category->name)) }}" class="skills-section section">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2 class="mb-0">{{ $category->name }}</h2>
        </div>
        <div class="row gy-4 mx-3 mx-md-0 mx-lg-0">
            @forelse ($category->skills as $skill)
            <div class="col-md-6 col-lg-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="skill-card border border-muted">
                    <div class="skill-card-img">
                        <img src="/storage/{{ $skill->logo }}" class="img-fluid" alt="{{ $skill->name }}">
                    </div>
                    <div class="skill-card-info">
                        <h4>{{ $skill->name }}</h4>
                        <p class="skill-description">{{ $skill->description }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p>No skills found for this category.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endforeach
@endsection
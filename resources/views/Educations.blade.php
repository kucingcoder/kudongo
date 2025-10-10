@extends('layouts.landing_template')

@section('name', $user->name)
@section('title', 'Educations')
@section('description', $user->description)
@section('address', $user->address)
@section('phone', $user->phone)
@section('email', $user->email)

@section('content')
<style>
    .educations-section {
        padding: 60px 0;
    }

    .education-card {
        border: 1px solid #eef0f2;
        border-radius: 8px;
        width: 100%;
        display: flex;
        flex-direction: row;
        align-items: center;
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .education-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .education-card-img {
        flex: 0 0 100px;
        background: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        align-self: stretch;
        border-right: 1px solid #eef0f2;
    }

    .education-card-img img {
        max-height: auto;
        max-width: 70%;
        object-fit: contain;
    }

    .education-card-info {
        padding: 15px 20px;
        text-align: left;
        flex-grow: 1;
    }

    .education-card-info h4 {
        font-weight: 700;
        margin-top: 0;
        margin-bottom: 5px;
        font-size: 16px;
    }

    .education-description {
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
        <h1>Education That I Have Completed</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="current">Educations</li>
            </ol>
        </nav>
    </div>
</div>

<section class="educations-section section">
    <div class="container" data-aos="fade-up">
        <div class="row gy-4 mx-3 mx-md-0 mx-lg-0">
            @forelse ($educations as $education)
            <div class="col-md-6 col-lg-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="education-card border border-muted">
                    <div class="education-card-img">
                        <img src="/storage/{{ $education->logo }}" class="img-fluid" alt="{{ $education->name }}">
                    </div>
                    <div class="education-card-info">
                        <h4>{{ $education->name }}</h4>
                        <p class="education-description">{{ $education->description }}</p>
                        <p class="mb-0"><span class="badge bg-success">{{ $education->year_start }} - {{ $education->year_end }}</span></p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p>No educations found for this category.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
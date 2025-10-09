@extends('layouts.landing_template')

@section('name', $user->name)
@section('title', 'Home')
@section('description', $user->description)
@section('address', $user->address)
@section('phone', $user->phone)
@section('email', $user->email)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Home</h1>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="container">
<div class="row">
<div class="col-lg-4 ms-auto me-2">
<p class="lead"><img id="about-image" src="{{ asset('/img/logo.webp') }}" alt="Sandwich Queen Logo"></p>
</div>
<div class="col-lg-4 me-auto ms-2">
<p class="lead">{{ $viewData["description"] }}</p>
</div>
</div>
</div>
@endsection

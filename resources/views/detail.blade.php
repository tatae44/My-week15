@extends('layouts.app')

@section('title')
    {{ $blog2->title }}
@endsection

@section('content')
    <h2>{{ $blog2->title }}</h2>
    <hr>
    <div>{!! $blog2->content !!}</div>
    <hr>
    <a href="/" class="btn btn-primary">กลับหน้าแรก</a>
@endsection

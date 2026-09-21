@extends('layouts.app')

@section('title')
    หน้าแรกของเว็บไซต์
@endsection

@section('content')
    <h2>บทความล่าสุด</h2>
    <hr>
    @foreach ($blog2 as $item)
        <h2>{{ $item->title }}</h2>
        <div>{{ Str::limit(strip_tags($item->content), 100) }}</div>
        <a href="/detail/{{ $item->id }}">อ่านเพิ่มเติม</a>
        <br>
        <hr>
    @endforeach
@endsection

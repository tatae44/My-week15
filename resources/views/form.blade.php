@extends('layouts.app')

@section('title', 'เขียนบทความใหม่')


@section('content')
    <h2 class="text text-center py-2">เขียนบทความใหม่</h2>
    <form method="POST" action="{{ route('insert') }}">
        @csrf
        <div class="form-group mb-3">
            <label for="title" class="form-label">ชื่อบทความ</label>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
            @error('title')
                <p class="text-danger mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="content" class="form-label">เนื้อหา</label>
            <textarea class="form-control" name="content" id="content" cols="30" rows="5">{{ old('content') }}</textarea>
            @error('content')
                <p class="text-danger mt-1">{{ $message }}</p>
            @enderror
        </div>

        <input type="submit" value="บันทึก" class="btn btn-success my-3">
        <a href="{{ route('blog2') }}" class="btn btn-secondary">บทความทั้งหมด</a>
    </form>
@endsection

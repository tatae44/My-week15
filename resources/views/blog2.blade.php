@extends('layouts.app')

@section('title', 'บทความทั้งหมด')


@section('content')
    @if (Count($blog2) > 0)
        <h2 class="text text-center py-2">
            บทความทั้งหมด</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    {{-- <th scope="col">content</th> --}}
                    <th scope="col">Status</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Control</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blog2 as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        {{-- <td>{{ Str::limit($item->content, 10) }}</td> --}}
                        <td>
                            @if ($item->status)
                                <a href="{{ Route('chang', $item->id) }}"class="btn btn-success">เผยแพร่แล้ว</a>
                            @else
                                <a href="{{ Route('chang', $item->id) }}"class="btn btn-danger">ไม่เผยแพร่</a>
                            @endif

                        </td>
                        <td><a href="{{ Route('edit', $item->id) }}"class="btn btn-warning">แก้ไข</a></td>
                        <td><a href="{{ route('delete', $item->id) }}" class="btn btn-danger"
                                onclick="return confirm('คุณต้องการลบบทความ {{ $item->title }}หรือไม่?')">ลบ</a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $blog2->links() }}
    @else
        <h1 class="text-center">ไม่พบข้อมูลบทความ</h1>
    @endif

@endsection

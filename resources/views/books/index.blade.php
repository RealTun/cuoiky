@extends('layouts.base')

@section('title')
    Quản lý sách
@endsection

@section('page_active')
    {{-- <li class="nav-item">
        <a class="nav-link" href="">Trang chủ</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('books.index') }}">Sách</a>
    </li> --}}
@endsection

@section('main')
    <main class="container vh-100 mt-3">
        <div class="card">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card-header">
                <h3 class="card-title text-center ">Danh sách sách</h3>
            </div>

            <table class="table card-body">
                <thead class="text-center">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Tác giả</th>
                        <th scope="col">Thể loại</th>
                        <th scope="col">Năm phát hành</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xoá</th>
                    </tr>
                </thead>
                @foreach ($books as $book)
                    <tbody class="text-center">
                        <tr>
                            <th scope="row">{{ $book->book_id }}</th>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->genre }}</td>
                            <td>{{ $book->PublicationYear }}</td>
                            <td>
                                @if (file_exists(public_path('image/book/' . $book->coverImageUrl)))
                                    <img src="{{ asset('image/book/' . $book->coverImageUrl) }}" alt=""
                                        height="100px">
                                @else
                                    <img src="{{ $book->coverImageUrl }}" alt="" height="100px">
                                @endif
                            </td>
                            <td><a class="btn btn-primary btn-sm" href="{{ route('books.edit', $book->book_id) }}"><i class="fa-pencil fa-solid"></i></a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#book{{ $book->book_id }}"><i class="fa-trash fa-solid"></i>
                                </button>
                                <div class="modal fade" id="book{{ $book->book_id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Delete the book has id: {{ $book->book_id }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('books.destroy', $book->book_id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">OK</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>

        {{ $books->links() }}
    </main>
@endsection

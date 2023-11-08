@extends('layouts.base')

@section('title')
    Tác phẩm
@endsection

@section('page_active')
@endsection

@section('main')
    <main class="container vh-100 mt-5">
        <div>
            @if (count($errors))
                <ul class="alert alert-danger" style="list-style-type: none">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form action="{{ route('books.update', $book->book_id) }}" method="post">
                @csrf
                @method('PUT')
                <h3 class="text-center">SỬA THÔNG TIN SÁCH</h3>
                <div class="mt-4">
                    <div class="cover text-center">
                        @if (file_exists(public_path('image/book/' . $book->coverImageUrl)))
                            <img class="rounded-circle" src="{{ asset('image/book/' . $book->coverImageUrl) }}" alt="" height="150px">
                        @else
                            <img class="rounded-circle" src="{{ $book->coverImageUrl }}" alt="" height="150px">
                        @endif
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text" id="basic-addon1">Tiêu đề</span>
                        <input type="text" class="form-control" name="title" value="{{$book->title}}">
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text">Tác giả</span>
                        <input type="text" class="form-control" name="author" value="{{$book->author}}">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Thể loại</label>
                        <select class="form-select" name="genre" id="inputGroupSelect01">
                            @foreach ($genres as $key => $genre)
                                @if ($genre == $book->genre)
                                    <option selected>{{$genre}}</option>
                                @else
                                    <option>{{ $genre }}</option>
                                @endif               
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text" id="basic-addon1">Năm phát hành</span>
                        <input type="number" class="form-control" name="year" min="1900" max="2099"
                            step="1" value="{{$book->PublicationYear}}">
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text" id="basic-addon1">Mã vạch</span>
                        <input type="number" class="form-control" name="isbn" step="1" value="{{$book->isbn}}">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="file" accept="image/*" name="image">
                    </div>
                    <div class="d-flex gap-2 justify-content-end ">
                        <button type="submit" class="btn btn-success">Lưu lại</button>
                        <a href="{{ route('books.index') }}" class="btn btn-warning">Quay lại</a>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection

@extends('layouts.base')

@section('title')
    Quản lý sách
@endsection

@section('page_active')
    <li class="nav-item">
        <a class="nav-link" href="">Trang chủ</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('books.index') }}">Sách</a>
    </li>
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
            <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text" id="basic-addon1">Tiêu đề</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="title">
                </div>
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text">Tác giả</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="author">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Thể loại</label>
                    <select class="form-select" name="genre" id="inputGroupSelect01">
                        @foreach ($genres as $key => $genre)
                            <option>{{$genre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text" id="basic-addon1">Năm phát hành</span>
                    <input type="number" class="form-control" name="year" min="1900" max="2099" step="1">
                </div>
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text" id="basic-addon1">Mã vạch</span>
                    <input type="number" class="form-control" name="isbn" step="1">
                </div>
                <div class="mb-3">
                    <input class="form-control" type="file" accept="image/*" name="image">
                  </div>
                <div class="d-flex gap-2 justify-content-end ">
                    <input type="submit" name="btnAdd" value="Thêm" class="btn btn-success">
                    <a href="{{ route('books.index') }}" class="btn btn-warning">Quay lại</a>
                </div>
            </form>
        </div>
    </main>
@endsection

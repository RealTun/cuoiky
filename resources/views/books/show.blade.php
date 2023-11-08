@extends('layouts.base')

@section('title')
    Tác phẩm
@endsection

@section('page_active')
    <li class="nav-item">
        <a class="nav-link" href="">Trang chủ</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('artworks.index') }}">Tác phẩm</a>
    </li>
    </li>
@endsection

@section('main')
<main class="container vh-100 mt-5">
    <div>    
        <form action="{{route('artworks.update', $artwork->id)}}" method="post">
            @csrf
            @method('PUT')
            <h3 class="text-center">SỬA THÔNG TIN TÁC PHẨM</h3>
            <div class="mt-4">
                <div class="cover text-center">
                    <img class="rounded-circle" src="{{$artwork->cover_image}}" alt="" height="150px">
                </div>
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text" id="basic-addon1">Mã tác phẩm</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="id" value="{{$artwork->id}}" readonly>
                </div>
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text" id="basic-addon1">Tên tác giả</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="name"  value="{{$artwork->artist_name}}">
                </div>
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text">Miêu tả</span>
                    <textarea class="form-control" aria-label="With textarea" name="description">{{$artwork->description}}</textarea>
                </div>         
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Thể loại</label>
                <select class="form-select" name="type" id="inputGroupSelect01">
                    <option selected>{{$artwork->art_type}}</option>
                    @foreach ($types as $type)
                        <option>{{ $type }}</option>;
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3 mt-3">
                <span class="input-group-text" id="basic-addon1">Media link</span>
                <input type="text" class="form-control" aria-describedby="basic-addon1" name="media"  value="{{$artwork->media_link}}">
            </div>
            <div class="input-group mb-3 mt-3">
                <span class="input-group-text" id="basic-addon1">Image</span>
                <input type="text" class="form-control" aria-describedby="basic-addon1" name="image"  value="{{$artwork->cover_image}}">
            </div>
                <div class="d-flex gap-2 justify-content-end ">
                    <button type="submit" class="btn btn-success">Lưu lại</button>
                    <a href="{{route('artworks.index')}}" class="btn btn-warning">Quay lại</a>
                </div>
            </div>
        </form>
    </div>
</main>   
@endsection
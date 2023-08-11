@extends('admin.layouts.template')
@section('page_title')
Add Product - Perpustakaan
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page</span> Add New Book</h4>
      <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Book Data</h5>
              <small class="text-muted float-end">Input Information</small>
            </div>
            <div class="card-body">
              <form action="{{route('updatebook')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$book_info->id}}" name="book_id">

                @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                @endif
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Book Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="book_name" name="book_name" placeholder="Electronics" value="{{$book_info->book_name}}"/>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Select Category</label>
                  <div class="col-sm-10">
                      <select class="form-select" id="book_category_id" aria-label="Default select example" name="book_category_id">
                          <option selected>Select Category</option>
                          @foreach ($categories as $category)
                              <option value="{{ $category->id }}" {{ $book_info->category_id == $category->id ? 'selected' : null }}> {{ $category->category_name }}</option>
                          @endforeach
                      </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Quantity Book</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="book_count" name="book_count" placeholder="Electronics" value="{{$book_info->book_count}}"/>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Description</label>
                  <div class="col-sm-10">
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$book_info->description}}</textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Previous Image</label>
                  <div class="col-sm-10">
                    <img src="{{asset($book_info->book_cover)}}" alt="" style="height: 200px;">
                  </div>
                </div>

                <input type="hidden" value="{{$book_info->book_cover}}" name="old_img">

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Upload New Image</label>
                  <div class="col-sm-10">
                      <input class="form-control" type="file" id="book_cover" name="book_cover"/>
                  </div>
                </div>

                <div class="row justify-content-end">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Update Product</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
  </div>
@endsection
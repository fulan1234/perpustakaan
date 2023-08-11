@extends('user.layouts.template')
@section('page_title')
Detail Produk - Perpustakaan
@endsection
@section('content')

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Cart</h3>
          <span class="breadcrumb"><a href="{{route('dashboard')}}">Home</a> >   Cart</span>
        </div>
      </div>
    </div>
  </div>

  <div class="single-product section">
    <div class="container">
      <div class="row">
        <div class="card">
            <h5 class="card-header">Cart Information</h5>
            @if (session()->has('message'))
                <div class="alert alert-success">
                  {{session()->get('message')}}
                </div>
            @endif
            <div class="table-responsive text-nowrap">
              <table id="myTable" class="table table-striped table-bordered">
                <thead class="table-light">
                  <tr>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Category Name</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                  <tbody class="table-border-bottom-0">
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($cart_items as $item)
                    <tr>
                        @php
                            $book_name = App\Models\Book::where('id', $item->book_id)->value('book_name');
                            $cover_url = App\Models\Book::where('id', $item->book_id)->value('book_cover');
                            $category_name = App\Models\Book::where('id', $item->book_id)->value('category_name');
                        @endphp
                        <td>{{$no++}}</td>
                        <td>{{$book_name}}</td>
                        <td>{{$category_name}}</td>
                        <td style="padding: auto;">
                            <img src="{{asset($cover_url)}}" style="width: 100px; height:100px;" alt="">
                            <br>
                        </td>
                        <td>
                          <a href="{{route('removeitem', $item->id)}}" class="btn btn-danger">Remove</a>
                          <a href="{{route('downloadfile', $item->book_id)}}" class="btn btn-success">Download</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        <div class="col-lg-12">
          <div class="sep"></div>
        </div>
      </div>
    </div>
  </div>
@endsection
@extends('user.layouts.template')
@section('page_title')
Detail Produk - Perpustakaan
@endsection
@section('content')

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>{{$book->book_name}}</h3>
          <span class="breadcrumb"><a href="{{route('dashboard')}}">Home</a>  >  <a href="">Book</a>  >  {{$book->book_name}}</span>
        </div>
      </div>
    </div>
  </div>

  <div class="single-product section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="left-image">
            <img src="{{asset($book->book_cover)}}" alt="" style="width: 556px; height:566px;">
          </div>
        </div>
        <div class="col-lg-6 align-self-center">
          <h4>{{$book->book_name}}</h4>
          <p>{{$book->description}}</p>
          <form action="{{route('addbooktocart')}}" method="POST">
            @csrf
              <input type="hidden" name="book_id" value="{{$book->id}}">
              <div class="form-group">
                <input type="submit" class="btn btn-danger" value="Add to List" style="width: 150px; background-color:rgb(222, 56, 56);">
              </div>
              {{-- <button type="submit" style="background-color:green;"><i class="fa fa-download"></i> DOWNLOAD</button> --}}
          </form>
          <br>
          <ul>
            <li><span>Game ID:</span>{{$book->id}}</li>
            <li><span>Genre:</span> <a href="#">{{$book->category_name}}</a></li>
            <li><span>Download:</span> <a href="#">1028 pcs</a></li>
          </ul>
        </div>
        <div class="col-lg-12">
          <div class="sep"></div>
        </div>
      </div>
    </div>
  </div>
@endsection
@extends('user.layouts.template')
@section('page_title')
Dashboard - Perpustakaan
@endsection
@section('content')
<div class="main-banner">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 align-self-center">
        <div class="caption header-text">
          <h6>Welcome {{Auth::user()->name}}</h6>
          <h2>BEST LIBRARY SITE</h2>
          <p>Perpustakaan Website merupakan ujian dari detik.com namun sayang hasil berkata lain</p>
          <div class="search-input">
            <div class="main-button">
              <a href="{{route('bookitems')}}">Read It Bro..</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 offset-lg-2">
        <div class="right-image">
          <img src="{{asset('image/logo5.png')}}" alt="">
        </div>
      </div>
    </div>
  </div>
</div>

<div class="features">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6">
        <a href="{{route('addcart')}}">
          <div class="item">
            <div class="image">
              <img src="{{asset('home/assets/images/featured-01.png')}}" alt="" style="max-width: 44px;">
            </div>
            <h4>Cart</h4>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6">
        <a href="{{route('bookitems')}}">
          <div class="item">
            <div class="image">
              <img src="{{asset('home/assets/images/featured-04.png')}}" alt="" style="max-width: 44px;">
            </div>
            <h4>All Book</h4>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6">
        <a href="{{route('categoryitems')}}">
          <div class="item">
            <div class="image">
              <img src="{{asset('home/assets/images/featured-04.png')}}" alt="" style="max-width: 44px;">
            </div>
            <h4>All Category</h4>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>

<div class="section trending">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="section-heading">
          <h6>Trending</h6>
          <h2>Trending Book</h2>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="main-button">
          <a href="shop.html">View All</a>
        </div>
      </div>
      @foreach ($top4 as $book)
        <div class="col-lg-3 col-md-6">
          <div class="item">
            <div class="thumb" style="height:360px;">
              <a href="{{route('detailbook', $book->id)}}"><img src="{{asset($book->book_cover)}}" alt="" style="height:360px;"></a>
              <span class="price"><p style="color: white">{{$book->popularity}}</p>view</span>
            </div>
            <div class="down-content">
              <span class="category">{{$book->category_name}}</span>
              <span style="width: 80%;"><h4>{{$book->book_name}}</h4></span>
              <a href="#"><i class="fa fa-shopping-bag"></i></a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
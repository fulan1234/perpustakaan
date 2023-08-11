@extends('user.layouts.template')
@section('page_title')
Detail Produk - Perpustakaan
@endsection
@section('content')

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>All Books</h3>
          <span class="breadcrumb"><a href="{{route('dashboard')}}">Home</a> > All Books</span>
        </div>
      </div>
    </div>
  </div>

  <div class="section trending">
    <div class="container">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page</span> All Books</h4>
            <div class="card p-3">
                <h5 class="card-header pl-0">Book Information</h5>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                      {{session()->get('message')}}
                    </div>
                @endif
                <div class="table-responsive text-nowrap">
                    <table id="myTable" class="table table-striped table-bordered pt-2">
                        <thead class="table-light">
                          <tr>
                            <th>No</th>
                            <th>Book Name</th>
                            <th>Category Name</th>
                            <th>Book Count</th>
                            <th>Book Cover</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                          <tbody class="table-border-bottom-0">
                            @foreach ($books as $book)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$book->book_name}}</td>
                                <td>{{$book->category_name}}</td>
                                <td>{{$book->book_count}}</td>
                                <td>
                                  <img src="{{asset($book->book_cover)}}" style="width: 100px; height:100px;" alt="">
                                  <br>
                                </td>
                                <td>
                                  <a href="{{route('detailbook', $book->id)}}" class="btn btn-primary">View</a>
                                  <form action="{{route('addbooktocart')}}" method="POST" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{$book->id}}">
                                    <input type="submit" class="btn btn-danger" value="Add to List" style="width: 150px; background-color:rgb(222, 56, 56);">
                                  </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
              </div>
        </div> 
    </div>
  </div>

@endsection

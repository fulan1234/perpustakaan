@extends('admin.layouts.template')
@section('page_title')
All Category - Perpustakaan
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page</span> All Books</h4>
    <div class="card p-3">
        <h5 class="card-header pl-0">Book Information</h5>
        @if (session()->has('message'))
            <div class="alert alert-success">
              {{session()->get('message')}}
            </div>
        @endif
        <div class="container">
          <a href="#" class="btn btn-success mb-5" style="width:10%;">Excel</a>
          <a href="#" class="btn btn-danger mb-5" style="width:10%;">Pdf</a>
        </div>
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
                      <img src="{{asset($book->book_cover)}}" height="100px" alt="">
                      <br>
                    </td>
                    <td>
                      <a href="{{route('editbook', $book->id)}}" class="btn btn-primary">Edit</a>
                      <a href="{{route('deletebook', $book->id)}}" class="btn btn-warning">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
</div> 
@endsection
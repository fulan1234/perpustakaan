@extends('user.layouts.template')
@section('page_title')
All Category - Perpustakaan
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
                          <th>Id</th>
                          <th>Category Name</th>
                          <th>Book Count</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                        <tbody class="table-border-bottom-0">
                          @foreach ($categories as $category)
                            <tr>
                              <td>{{$no++}}</td>
                              <td>{{$category->category_name}}</td>
                              <td>{{$category->book_count}}</td>
                              <td>
                                  <a href="{{route('bookcat', $category->id)}}" class="btn btn-primary">View</a>
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


@extends('layouts.main')
@section('postActive','active')
@section('main-content')
  @include('includes.notify')
  @section('head')
    <style>
    /* Popup container - can be anything you want */
    .popup {
      position: relative;
      display: inline-block;
      cursor: pointer;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    } 

    /* The actual popup */
    .popup .popuptext {
      visibility: hidden;
      width: 160px;
      background-color: #555;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 8px 0;
      position: absolute;
      z-index: 1;
      bottom: 125%;
      left: 50%;
      margin-left: -80px;
    }

    /* Popup arrow */
    .popup .popuptext::after {
      content: "";
      position: absolute;
      top: 100%;
      left: 50%;
      margin-left: -5px;
      border-width: 5px;
      border-style: solid;
      border-color: #555 transparent transparent transparent;
    }

    /* Toggle this class - hide and show the popup */
    .popup .show {
      visibility: visible;
      -webkit-animation: fadeIn 1s;
      animation: fadeIn 1s;
    }

    /* Add animation (fade in the popup) */
    @-webkit-keyframes fadeIn {
      from {opacity: 0;}
      to {opacity: 1;}
    }

    @keyframes fadeIn {
      from {opacity: 0;}
      to {opacity:1 ;}
    }
  </style>
@endsection
<div class="container-fluid">
  <div class="d-sm-flex justify-content-between align-items-center mb-4">
    <h3 class="text-dark mb-0">Posts</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="{!! route('post.create') !!}" style="background-color: #4285f4;"><i class="fas fa-plus fa-sm text-white-50"></i>&nbsp;Create</a></div>
    <div class="card shadow">
      <div class="card-header py-3">
        <p class="text-primary m-0 font-weight-bold">Posts Info</p>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6 text-nowrap">
            <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label>Show&nbsp;<select class="form-control form-control-sm custom-select custom-select-sm"><option value="10" selected="">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select>&nbsp;</label></div>
          </div>
          <div class="col-md-6">
            <div class="text-md-right dataTables_filter" id="dataTable_filter"><label><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
          </div>
        </div>
        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
          <table class="table dataTable my-0" id="dataTable">
            <thead>
              <tr>
                <th class="text-center">S.no</th>
                <th class="text-center">Title</th>
                <th class="text-center">Subtitle</th>
                <th class="text-center">Status</th>
                <th class="text-center">Info</th>
                <th class="text-center">Edit</th>
                <th class="text-center">Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($posts as $post)
                <tr>
                  <td class="text-center">{{ $loop->index +1 }}</td>
                  <td class="text-center">{{ $post->title }}</td>
                  <td class="text-center">{{ $post->subtitle }}</td>
                  <td class="text-center">{{ ($post->status) ? 'Published' : 'Unpublished' }}</td>
                  <td>
                    <div class="popup {{ "cust".$post->id }}" onclick="popupfun()"><button class="btn btn-info btn-icon-split" data-toggle="tooltip" data-placement="right" type="button" title="created at  &amp; created by"><span class="text-white text"><i class="fa fa-info-circle"></i></span></button>
                      <span class="popuptext" id="myPopup{{ $post->id }}" style="
                      display: table;
                      ">
                      <i class="fa fa-calendar" aria-hidden="true"></i>  {{ $post->created_at->toFormattedDateString() }}
                      <br>
                      <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                      {{ $post->getRelation('user')->fname." ".$post->getRelation('user')->lname }}
                    </span>
                  </div>
                  <script>
                  $(document).ready(function(){
                    $("{{ ".cust".$post->id }}").click(function(){
                      var popup = document.getElementById("myPopup{{ $post->id }}");
                      popup.classList.toggle("show");
                    });
                  });
                  </script>
                </td>
                <td class="text-center"><a class="btn btn-warning btn-icon-split" href="{!! route('post.edit',$post->id) !!}" role="button" style="background-color: #f4b400;"><span class="text-white text"><i class="fa fa-edit"></i></span></a>
                </td>
                <td class="text-center"><a class="btn btn-danger btn-icon-split" role="button" style="background-color: #db4437;"
                  onclick="if(confirm('Are you sure ?')){
                    event.preventDefault();
                    document.getElementById('deleteform-{{$post->id}}').submit();
                  }
                  else{
                    event.preventDefault();
                  }"
                  ><span class="text-white text"><i class="fa fa-trash-o"></i></span></a>
                  <form id="deleteform-{{$post->id}}" method="POST"  action="{{ route('post.destroy',$post->id)}}" style="display: none">
                    @csrf
                    @method('DELETE')
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td class="text-center"><strong>S.no</strong></td>
              <td class="text-center"><strong>Title</strong></td>
              <td class="text-center"><strong>Subtitle</strong></td>
              <td class="text-center"><strong>Status</strong></td>
              <td class="text-center"><strong>Info</strong></td>
              <td class="text-center"><strong>Edit</strong></td>
              <td class="text-center"><strong>Delete</strong></td>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="row">
        <div class="col-md-6 align-self-left">
          <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
        </div>
        <div class="col-md-6">
          <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
            <ul class="pagination">
              <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('bottom')
@endsection

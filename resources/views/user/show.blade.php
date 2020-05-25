@extends('layouts.main')
@section('userActive','active')
@section('main-content')
{{-- --------------------- --}}
@include('includes.notify')
{{-- -------------------- --}}
  <div class="container-fluid">
      <div class="d-sm-flex justify-content-between align-items-center mb-4">
          <h3 class="text-dark mb-0">Users</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="{!! route('user.create') !!}" style="background-color: #4285f4;"><i class="fas fa-plus fa-sm text-white-50"></i>&nbsp;Create</a></div>
      <div class="card shadow">
          <div class="card-header py-3">
              <p class="text-primary m-0 font-weight-bold">Users Info</p>
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
                              <th>Sno.</th>
                              <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name</th>
                              <th>Age</th>
                              <th>Username</th>
                              <th>Email</th>
                              <th>Status</th>
                              <th>Edit</th>
                              <th>Delete</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)
                          <tr>
                            <td>{{ $loop->index +1}}</td>
                            <td>
                              <img class="rounded-circle mr-2" width="30" height="30" src="{{asset(Storage::disk('local')->url($user->image))}}">
                              {{$user->fname}} {{$user->lname}}</td>
                            <td>{{$user->age ?? "32"}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{ ( $user->status ) ? 'Active' : 'Inactive' }}</td>
                            <td><a href="{!! route('user.edit',$user->id) !!}" class="btn btn-warning btn-icon-split" role="button" style="background-color: #f4b400;"><span class="text-white text"><i class="fa fa-edit"></i></span></a></td>
                            <td><a class="btn btn-danger btn-icon-split" role="button" style="background-color: #db4437;"
                              onclick="if(confirm('Are you sure, You want to delete this user ?')){
                                event.preventDefault();
                                document.getElementById('deleteform-{{$user->id}}').submit();
                              }
                              else{
                                event.preventDefault();
                              }"
                              ><span class="text-white text"><i class="fa fa-trash-o"></i></span></a>
                              <form id="deleteform-{{$user->id}}" method="POST"  action="{{ route('user.destroy',$user->id)}}" style="display: none">
                                @csrf
                                @method('DELETE')
                              </form>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                          <tr>
                              <td><strong>Sno.</strong></td>
                              <td><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name</strong></td>
                              <td><strong>Age</strong></td>
                              <td><strong>Username</strong></td>
                              <td><strong>Email</strong></td>
                              <td><strong>Status</strong></td>
                              <td><strong>Salary</strong></td>
                              <td><strong>Salary</strong></td>
                          </tr>
                      </tfoot>
                  </table>
              </div>
              <div class="row">
                  <div class="col-md-6 align-self-center">
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

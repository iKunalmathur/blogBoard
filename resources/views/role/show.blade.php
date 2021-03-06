@extends('layouts.main')
@section('userActive','active')
@section('main-content')
  {{-- ------------------- --}}
  @include('includes.notify')
  {{-- ------------------- --}}
  <div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
      <h3 class="text-dark mb-0">Roles</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="{!! route('role.create') !!}" style="background-color: #4285f4;"><i class="fas fa-plus fa-sm text-white-50"></i>&nbsp;Create</a></div>
      <div class="card shadow">
        <div class="card-header py-3">
          <p class="text-primary m-0 font-weight-bold">Roles Info</p>
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
                  <th>Role Title</th>
                  <th>Permissions</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($roles as $role)
                  <tr>
                    <td>{{$role->name}}</td>
                    <td>
                      @foreach ($role->permissions as $permission)
                        {{ $permission->permission_category->name}} {{ $permission->name }},
                      @endforeach
                    </td>
                    <td><a class="btn btn-warning btn-icon-split" href="{!! route('role.edit',$role->id) !!}" role="button" style="background-color: #f4b400;"><span class="text-white text"><i class="fa fa-edit"></i></span></a></td>
                    <td><a class="btn btn-danger btn-icon-split" role="button" style="background-color: #db4437;"
                      onclick="if(confirm('Are you sure ?')){
                    event.preventDefault();
                    document.getElementById('deleteform-{{$role->id}}').submit();
                  }
                  else{
                    event.preventDefault();
                  }"
                      ><span class="text-white text"><i class="fa fa-trash-o"></i></span></a>
                      <form id="deleteform-{{$role->id}}" method="POST"  action="{{ route('role.destroy',$role->id)}}" style="display: none">
                    @csrf
                    @method('DELETE')
                  </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
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

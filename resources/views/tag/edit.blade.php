@extends('layouts.main')
@section('tagActive','active')
@section('main-content')
  @include('includes.notify')
  <div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
      <h3 class="text-dark mb-0">Edit Category</h3>
    </div>
    <div class="card shadow">
      <div class="card-header py-3">
        <p class="text-primary m-0 font-weight-bold">Edit Category Info</p>
      </div>
      <div class="card-body">
        <div class="row mb-3">
          <div class="col-lg-8">
            <div class="row mb-3 d-none">
              <div class="col">
                <div class="card text-white bg-primary shadow">
                  <div class="card-body">
                    <div class="row mb-2">
                      <div class="col">
                        <p class="m-0">Peformance</p>
                        <p class="m-0"><strong>65.2%</strong></p>
                      </div>
                      <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                    </div>
                    <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card text-white bg-success shadow">
                  <div class="card-body">
                    <div class="row mb-2">
                      <div class="col">
                        <p class="m-0">Peformance</p>
                        <p class="m-0"><strong>65.2%</strong></p>
                      </div>
                      <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                    </div>
                    <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="card shadow mb-3">
                  <div class="card-body">
                    <form action="{!! route('tag.update',$tag->id) !!}" method="post">
                      @csrf
                      @method('PUT')
                      <div class="form-row">
                        <div class="col">
                          <div class="form-group"><label for="title"><strong>Category title</strong><br></label><input class="form-control" type="text" id="title" name="title" value="{{ $tag->title }}" autofocus></div>
                          <div class="form-group"><label for="slug"><strong>Slug</strong><br></label><input class="form-control" type="text" id="slug" name="slug" value="{{ $tag->slug }}"></div>
                        </div>
                        <div class="col"></div>
                      </div>
                      <div class="form-group">
                        <div class="form-row">
                          <div class="col-auto"><button class="btn btn-primary btn-sm" type="submit" style="background-color: #4285f4;">Update</button></div>
                          <div class="col">
                      <a class="btn btn-warning btn-sm" href="{{ url()->previous() }}"  style="color: #212529;background-color: #f4b400;">Back</a>
                    </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="text-primary font-weight-bold m-0">Projects</h6>
              </div>
              <div class="card-body">
                <h4 class="small font-weight-bold">Server migration<span class="float-right">20%</span></h4>
                <div class="progress progress-sm mb-3">
                  <div class="progress-bar bg-danger" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"><span class="sr-only">20%</span></div>
                </div>
                <h4 class="small font-weight-bold">Sales tracking<span class="float-right">40%</span></h4>
                <div class="progress progress-sm mb-3">
                  <div class="progress-bar bg-warning" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"><span class="sr-only">40%</span></div>
                </div>
                <h4 class="small font-weight-bold">Customer Database<span class="float-right">60%</span></h4>
                <div class="progress progress-sm mb-3">
                  <div class="progress-bar bg-primary" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"><span class="sr-only">60%</span></div>
                </div>
                <h4 class="small font-weight-bold">Payout Details<span class="float-right">80%</span></h4>
                <div class="progress progress-sm mb-3">
                  <div class="progress-bar bg-info" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"><span class="sr-only">80%</span></div>
                </div>
                <h4 class="small font-weight-bold">Account setup<span class="float-right">Complete!</span></h4>
                <div class="progress progress-sm mb-3">
                  <div class="progress-bar bg-success" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"><span class="sr-only">100%</span></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('bottom')
  <script>
  $("#title").keyup(function(){
    var Text = $(this).val();
    Text = Text.toLowerCase().replace(/[^a-z0-9\s]/gi, '');
    var regExp = /\s+/g;
    Text = Text.replace(regExp,'-');
    // Text = Text.charAt(0).toUpperCase() + Text.slice(1);
    $("#slug").val(Text);
  });
  </script>
@endsection

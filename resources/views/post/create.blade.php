@extends('layouts.main')
@section('postActive','active')
@section('head')
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection
@section('main-content')
  @include('includes.notify')
  <div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
      <h3 class="text-dark mb-0">Create Post</h3>
    </div>
    <div class="card shadow">
      <div class="card-header py-3">
        <p class="text-primary m-0 font-weight-bold">Post Info</p>
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
                    <form role="form" action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-row">
                        <div class="col">
                          <div class="form-group"><label for="title"><strong>Title</strong></label><input class="form-control" type="text" id="title" name="title" value="{{ old('title') }}"></div>
                        </div>
                        <div class="col">
                          <div class="form-group"><label for="subtitle"><strong>Subtitle</strong><br></label><input class="form-control" type="text"  name="subtitle" value="{{ old('subtitle') }}"></div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col">
                          <div class="form-group"><label for="tag"><strong>Tags</strong></label>
                            <select class="form-control select2" multiple="multiple" name="tags[]">
                              <optgroup label="Select Tag">
                                @foreach ($tags as $tag)
                                  <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                                @endforeach
                              </optgroup>
                            </select>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group"><label for="category"><strong>Category</strong><br></label>
                            <select class="form-control select2"  multiple="multiple" name="categories[]">
                              <optgroup label="Select Category">
                                @foreach ($categories as $category)
                                  <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                              </optgroup>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col">
                          <div class="form-group"><label for="slug"><strong>Slug</strong></label><input class="form-control" type="text" id="slug" name="slug"></div>
                        </div>
                        @can('posts.publisher', Auth::user())
                        <div class="col">
                          <div class="form-group" style="margin: 0px;margin-top: 38px;margin-bottom: 0px;">
                            <div class="custom-control custom-switch"><input class="custom-control-input" type="checkbox" name="status" id="formCheck-1"><label class="custom-control-label" for="formCheck-1"><strong>Publish</strong><br></label></div>
                          </div>
                        </div>
                      @endcan
                      </div>
                      <script type="text/javascript">
                      $(function(){
                        $("#ckeditor").val("{!! old('ckeditor') !!}");
                      });
                      </script>
                      <div class="form-row">
                        <div class="col">
                          <div class="form-group">
                            <textarea cols="80" rows="10" id="ckeditor" name="ckeditor" >
                            </textarea>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-row">
                          <div class="col-auto"><button class="btn btn-primary btn-sm" type="submit" style="background-color: #4285f4;">Create</button></div>
                          <div class="col"><button class="btn btn-warning btn-sm" type="submit" style="color: #212529;background-color: #f4b400;">Back</button></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card mb-3">
                <div class="card-body text-center shadow"><img class="img-thumbnail mb-3 mt-4" src="{{asset('assets/img/news-banner.png')}}" width="200" height="140">
                  <div class="mb-3"><button class="btn btn-primary btn-sm" type="button"><label for="image" style="
                  margin-bottom: 0;
                  ">Upload</label></button></div>

                  <input type="file" id="image" hidden name="image" value="">
                </div>
              </div>
            </form>
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
  {{-- <script src="https://cdn.ckeditor.com/4.14.0/full-all/ckeditor.js"></script> --}}
  <script src="{!! asset('assets/ckeditor/ckeditor.js') !!}"></script>
  <script type="text/javascript">
  CKEDITOR.replace( 'ckeditor');
  </script>
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
  <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
  <script>
  $(document).ready(function(){
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });
</script>
@endsection

@extends('layouts.main')
@section('userActive','active')
@section('main-content')
  {{-- ------------------- --}}
  @include('includes.notify')
  {{-- ------------------- --}}
  <div class="container-fluid">
    <h3 class="text-dark mb-4">Edit User</h3>
    <div class="row mb-3">
      <div class="col-lg-4">
        <div class="card mb-3">
          <form action="{!! route('user.update',$user->id) !!}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
              <div class="card-body text-center shadow">
                <style>
                .avatar-upload {
                  position: relative;
                  max-width: 205px;
                  margin: 50px auto;
                }
                .avatar-upload .avatar-edit {
                  position: absolute;
                  right: 12px;
                  z-index: 1;
                  top: 10px;
                }
                .avatar-upload .avatar-edit input {
                  display: none;
                }
                .avatar-upload .avatar-edit input + label {
                  display: inline-block;
                  width: 34px;
                  height: 34px;
                  margin-bottom: 0;
                  border-radius: 100%;
                  background: #FFFFFF;
                  border: 1px solid transparent;
                  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
                  cursor: pointer;
                  font-weight: normal;
                  transition: all 0.2s ease-in-out;
                  padding: 20px;

                }
                .avatar-upload .avatar-edit input + label:hover {
                  background: #f1f1f1;
                  border-color: #d6d6d6;
                }
                .avatar-upload .avatar-edit input + label:after {
                  content: "\f040";
                  font-family: 'FontAwesome';
                  color: #757575;
                  position: absolute;
                  top: 10px;
                  left: 0;
                  right: 0;
                  text-align: center;
                  margin: auto;
                }
                .avatar-upload .avatar-preview {
                  width: 192px;
                  height: 192px;
                  position: relative;
                  border-radius: 100%;
                  border: 6px solid #F8F8F8;
                  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
                }
                .avatar-upload .avatar-preview > div {
                  width: 100%;
                  height: 100%;
                  border-radius: 100%;
                  background-size: cover;
                  background-repeat: no-repeat;
                  background-position: center;
                }
              </style>
              <div class="avatar-upload">
                <div class="avatar-edit">
                  <input type='file' id="imageUpload" value="{{$user->image}}" name="image" accept=".png, .jpg, .jpeg" />
                  <label for="imageUpload"></label>
                </div>
                <div class="avatar-preview">
                  <div id="imagePreview" style="background-image: url({{asset(Storage::disk('local')->url($user->image))}});">
                  </div>
                </div>
              </div>
              <script id="rendered-js">
              function readURL(input) {
                if (input.files && input.files[0]) {
                  var reader = new FileReader();
                  reader.onload = function (e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                  };
                  reader.readAsDataURL(input.files[0]);
                }
              }
              $("#imageUpload").change(function () {
                readURL(this);
              });
              </script>

        </div>
      </div>
      @can('users.assignRole', Auth::user())
      <div class="card mb-3">
        <div class="card-body text-left shadow">
          <p class="text-primary m-0 font-weight-bold" style="color: #4285f4;">Assign Roles<br></p>
          @foreach ($roles as $role)
          <div class="row">
              <div class="col">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="role[]" value="{{ $role->id }}" id="formCheck-{{$role->id}}"
                  @foreach ($user->roles as $user_role)
                            @if ($user_role->id == $role->id)
                              checked
                            @endif
                          @endforeach>
                  <label class="form-check-label" for="formCheck-{{$role->id}}">{{$role->name}}</label>
                </div>
              </div>
          </div>
        @endforeach
        </div>
      </div>
    @endcan
    </div>
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
            <div class="card-header py-3">
              <p class="text-primary m-0 font-weight-bold" style="color: #4285f4;">User Settings</p>
            </div>
            <div class="card-body">
              <div class="form-row">
                <div class="col">
                  <div class="form-group"><label for="username"><strong>Username</strong></label><input class="form-control" type="text" value={{ $user->username }} name="username"></div>
                </div>
                <div class="col">
                  <div class="form-group"><label for="email"><strong>Email Address</strong></label><input class="form-control" type="email" value={{ $user->email }} name="email"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="col">
                  <div class="form-group"><label for="first_name"><strong>First Name</strong></label><input class="form-control" type="text" value={{ $user->fname }} name="first_name"></div>
                </div>
                <div class="col">
                  <div class="form-group"><label for="last_name"><strong>Last Name</strong></label><input class="form-control" type="text" value={{ $user->lname }} name="last_name"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="col">
                  <div class="form-group"><label for="new_password"><strong>New Password</strong></label><input class="form-control" type="text"  name="password"></div>
                </div>
                <div class="col">
                  <div class="form-group"><label for="confirm_password"><strong>Confirm Password</strong></label><input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password (repeat)" name="password_confirmation"  autocomplete="new-password"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="col">
                  <div class="form-group"><label for="Admin_password"><strong>Admin Password</strong></label><input class="form-control" type="text" name="Admin_password"></div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <div class="custom-control custom-switch" style="margin-top: 38px;"><input class="custom-control-input" name="status" type="checkbox"  id="formCheck-1"
                      @if ($user->status)
                        checked
                      @endif
                      ><label class="custom-control-label" for="formCheck-1"><strong>Active</strong></label></div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-row">
                    <div class="col-auto"><button class="btn btn-primary btn-sm" type="submit" style="background-color: #4285f4;">Save</button></div>
                    <div class="col"><button class="btn btn-warning btn-sm" type="button" style="color: #212529;background-color: #f4b400;">Back</button></div>
                  </div>
                </div>
              </form>
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
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#imagePreview').css('background-image', 'url('+e.target.result +')');
        $('#imagePreview').hide();
        $('#imagePreview').fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#imageUpload").change(function() {
    readURL(this);
  });
</script>
@endsection

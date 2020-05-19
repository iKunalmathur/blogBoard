@extends('layouts.main')
@section('userActive','active')
@section('main-content')
  <div class="container-fluid">
    <h3 class="text-dark mb-4">Create User</h3>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="{{asset('assets/img/avatars/avatar4.jpeg')}}" width="160" height="160">
                    <div class="mb-3"><button class="btn btn-primary btn-sm" type="button" style="background-color: #4285f4;">Change Photo</button></div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body text-center shadow">
                    <p class="text-primary m-0 font-weight-bold" style="color: #4285f4;">Assign Roles<br></p>
                    <div class="row">
                        <div class="col">
                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2">Label</label></div>
                        </div>
                        <div class="col">
                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2">Label</label></div>
                        </div>
                        <div class="col">
                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2">Label</label></div>
                        </div>
                        <div class="col">
                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2">Label</label></div>
                        </div>
                        <div class="col">
                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2">Label</label></div>
                        </div>
                        <div class="col">
                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2">Label</label></div>
                        </div>
                    </div>
                </div>
            </div>
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
                            <form>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group"><label for="username"><strong>Username</strong></label><input class="form-control" type="text" placeholder="username" name="username"></div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group"><label for="email"><strong>Email Address</strong></label><input class="form-control" type="email" placeholder="user@example.com" name="email"></div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group"><label for="first_name"><strong>First Name</strong></label><input class="form-control" type="text" placeholder="John" name="first_name"></div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group"><label for="last_name"><strong>Last Name</strong></label><input class="form-control" type="text" placeholder="Doe" name="last_name"></div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group"><label for="first_name"><strong>New Password</strong></label><input class="form-control" type="text" placeholder="John" name="first_name"></div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group"><label for="last_name"><strong>Confirm Password</strong></label><input class="form-control" type="text" placeholder="Doe" name="last_name"></div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group"><label for="first_name"><strong>Password</strong></label><input class="form-control" type="text" placeholder="John" name="first_name"></div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="custom-control custom-switch" style="margin-top: 38px;"><input class="custom-control-input" type="checkbox" id="formCheck-1"><label class="custom-control-label" for="formCheck-1"><strong>Active</strong></label></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-auto"><button class="btn btn-primary btn-sm" type="submit" style="background-color: #4285f4;">Create</button></div>
                                        <div class="col"><button class="btn btn-warning btn-sm" type="submit" style="color: #212529;background-color: #f4b400;">Back</button></div>
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

@extends('layouts.main')
@section('categoryActive','active')
@section('main-content')
  <div class="container-fluid">
      <div class="d-sm-flex justify-content-between align-items-center mb-4">
          <h3 class="text-dark mb-0">Create Category</h3>
      </div>
      <div class="card shadow">
          <div class="card-header py-3">
              <p class="text-primary m-0 font-weight-bold">Category Info</p>
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
                                      <form>
                                          <div class="form-row">
                                              <div class="col">
                                                  <div class="form-group"><label for="username"><strong>Category Name</strong><br></label><input class="form-control" type="text" placeholder="user.name" name="username"></div>
                                                  <div class="form-group"><label for="email"><strong>Slug</strong><br></label><input class="form-control" type="email" placeholder="user@example.com" name="email"></div>
                                              </div>
                                              <div class="col"></div>
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
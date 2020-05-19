@extends('layouts.main')
@section('dashboardActive','active')
@section('main-content')
  <div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
      <h3 class="text-dark mb-0">Dashboard</h3><a class="btn btn-primary btn-sm" role="button" href="#" style="background-color: #4285f4;"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a></div>
      <div class="row">
        <div class="col-md-6 col-xl-3 mb-4">
          <div class="card shadow border-left-primary py-2">
            <div class="card-body">
              <div class="row align-items-center no-gutters">
                <div class="col mr-2">
                  <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>Totle posts</span></div>
                  <div class="text-dark font-weight-bold h5 mb-0"><span>8</span></div>
                </div>
                <div class="col-auto"><i class="fas fa-copy fa-2x text-gray-300"></i></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
          <div class="card shadow border-left-success py-2">
            <div class="card-body">
              <div class="row align-items-center no-gutters">
                <div class="col mr-2">
                  <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>Users</span></div>
                  <div class="text-dark font-weight-bold h5 mb-0"><span>4</span></div>
                </div>
                <div class="col-auto"><i class="fas fa-user-tie fa-2x text-gray-300"></i></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
          <div class="card shadow border-left-info py-2">
            <div class="card-body">
              <div class="row align-items-center no-gutters">
                <div class="col mr-2">
                  <div class="text-uppercase text-info font-weight-bold text-xs mb-1"><span>Tasks</span></div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <div class="text-dark font-weight-bold h5 mb-0 mr-3"><span>50%</span></div>
                    </div>
                    <div class="col">
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-info" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"><span class="sr-only">50%</span></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
          <div class="card shadow border-left-warning py-2">
            <div class="card-body">
              <div class="row align-items-center no-gutters">
                <div class="col mr-2">
                  <div class="text-uppercase text-warning font-weight-bold text-xs mb-1"><span>Pending Requests</span></div>
                  <div class="text-dark font-weight-bold h5 mb-0"><span>18</span></div>
                </div>
                <div class="col-auto"><i class="fas fa-comments fa-2x text-gray-300"></i></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="row">
            <div class="col-lg-6 mb-4">
              <div class="card text-white shadow" style="background-color: #4285f4;">
                <div class="card-body">
                  <p class="m-0">Primary</p>
                  <p class="text-white-50 small m-0">#4285f4</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="card text-white shadow" style="background-color: #0f9d58;">
                <div class="card-body">
                  <p class="m-0">Success</p>
                  <p class="text-white-50 small m-0">#0f9d58</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="card text-white bg-info shadow">
                <div class="card-body">
                  <p class="m-0">Info</p>
                  <p class="text-white-50 small m-0">#36b9cc</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="card text-white shadow" style="background-color: #f4b400;">
                <div class="card-body">
                  <p class="m-0">Warning</p>
                  <p class="text-white-50 small m-0">#f4b400</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="card text-white shadow" style="background-color: #db4437;">
                <div class="card-body">
                  <p class="m-0">Danger</p>
                  <p class="text-white-50 small m-0">#db4437</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="card text-white bg-secondary shadow">
                <div class="card-body">
                  <p class="m-0">Secondary</p>
                  <p class="text-white-50 small m-0">#858796</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 mb-4">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="text-primary font-weight-bold m-0">Projects</h6>
            </div>
            <div class="card-body">
              <h4 class="small font-weight-bold">Server migration<span class="float-right">20%</span></h4>
              <div class="progress mb-4">
                <div class="progress-bar bg-danger" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"><span class="sr-only">20%</span></div>
              </div>
              <h4 class="small font-weight-bold">Sales tracking<span class="float-right">40%</span></h4>
              <div class="progress mb-4">
                <div class="progress-bar bg-warning" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"><span class="sr-only">40%</span></div>
              </div>
              <h4 class="small font-weight-bold">Customer Database<span class="float-right">60%</span></h4>
              <div class="progress mb-4">
                <div class="progress-bar bg-primary" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"><span class="sr-only">60%</span></div>
              </div>
              <h4 class="small font-weight-bold">Payout Details<span class="float-right">80%</span></h4>
              <div class="progress mb-4">
                <div class="progress-bar bg-info" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"><span class="sr-only">80%</span></div>
              </div>
              <h4 class="small font-weight-bold">Account setup<span class="float-right">Complete!</span></h4>
              <div class="progress mb-4">
                <div class="progress-bar bg-success" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"><span class="sr-only">100%</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection

@extends('layouts.main')
@section('userActive','active')
@section('main-content')
  {{-- ------------------- --}}
  @include('includes.notify')
  {{-- ------------------- --}}
  <div class="container-fluid">
      <h3 class="text-dark mb-4">Edit Role</h3>
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
                          <div class="card-header py-3">
                              <p class="text-primary m-0 font-weight-bold">Edit role info</p>
                          </div>
                          <div class="card-body">
                              <form action="{{ route('role.update',$role->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                  <div class="form-row">
                                      <div class="col">
                                          <div class="form-group"><label for="title"><strong>Role Title</strong></label><input class="form-control" type="text" name="title" value="{{ $role->name }}"></div>
                                      </div>
                                  </div>
                                  <div class="form-row">
                                    @foreach ($permission_categories as $permission_category)
                                      <div class="col">
                                          <div class="form-group text-left"><label for=""><strong>{{ $permission_category->name }}</strong></label>
                                            @foreach ($permission_category->permission as $permission)
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="formCheck-{{$permission->id}}"  name="permissions[]" value="{{ $permission->id}}"
                                              @foreach ($role->permissions as $permissions)
                                                @if ($permission->id == $permissions->id)
                                                  checked
                                                @endif
                                              @endforeach
                                                >
                                                <label class="form-check-label" for="formCheck-{{$permission->id}}">{{$permission->name}}</label>
                                              </div>
                                            @endforeach
                                          </div>
                                      </div>
                                    @endforeach
                                  </div>
                                  <div class="form-group">
                                      <div class="form-row">
                                          <div class="col-auto"><button class="btn btn-primary btn-sm" type="submit" style="background-color: #4285f4;">Save</button></div>
                                          <div class="col"><button class="btn btn-warning btn-sm" type="submit" style="color: #212529;background-color: #f4b400;">Back</button></div>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="card shadow mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                  <h6 class="text-primary font-weight-bold m-0">Revenue Sources</h6>
                  <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                      <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                          role="menu">
                          <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item" role="presentation" href="#">&nbsp;Action</a><a class="dropdown-item" role="presentation" href="#">&nbsp;Another action</a>
                          <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="#">&nbsp;Something else here</a></div>
                  </div>
              </div>
              <div class="card-body">
                  <div class="chart-area"><canvas data-bs-chart="{&quot;type&quot;:&quot;doughnut&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Direct&quot;,&quot;Social&quot;,&quot;Referral&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;&quot;,&quot;backgroundColor&quot;:[&quot;#4e73df&quot;,&quot;#1cc88a&quot;,&quot;#36b9cc&quot;],&quot;borderColor&quot;:[&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;],&quot;data&quot;:[&quot;50&quot;,&quot;30&quot;,&quot;15&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false},&quot;title&quot;:{}}}"></canvas></div>
                  <div
                      class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>&nbsp;Direct</span><span class="mr-2"><i class="fas fa-circle text-success"></i>&nbsp;Social</span><span class="mr-2"><i class="fas fa-circle text-info"></i>&nbsp;Refferal</span></div>
          </div>
      </div>
  </div>
</div>
@endsection

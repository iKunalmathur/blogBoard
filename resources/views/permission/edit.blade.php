@extends('layouts.main')
@section('userActive','active')
@section('main-content')
  {{-- ------------------- --}}
  @include('includes.notify')
  {{-- ------------------- --}}
  <style>
  .close {
cursor: pointer;
position: absolute;
top: 50%;
right: 0%;
padding: 12px 16px;
transform: translate(0%, -50%);
}

.close:hover {background: #bbb;}
  </style>
  <div class="container-fluid">
    <h3 class="text-dark mb-4">Update Permission</h3>
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
                <p class="text-primary m-0 font-weight-bold">Update Permission info<br></p>
              </div>
              <div class="card-body">
                <form action={!! route('permission.update',$permission->id) !!} method="post">
                  @csrf
                  @method('PUT')
                  <div class="form-row">
                    <div class="col">
                      <div class="form-group"><label for="permission_title"><strong>Permission Title</strong></label>
                        <input class="form-control" type="text" value="{{ $permission->name }}" name="title"></div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <div class="form-group"><label for="first_name"><strong>Permission for&nbsp;</strong></label>
                          <select class="form-control" name="category_id" id="category_id">
                          </select>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group"><label for="first_name"><strong>Create Category</strong></label>
                          <div class="form-row">
                            <div class="col">
                              <input class="form-control" name="cat_name" id="myInput" type="text">
                            </div>
                            <div class="col-2">
                              <button class="btn btn-primary btn-sm border rounded" type="button" id="create_category" style="background-color: #4285f4;width: 39px;height: 37px;filter: brightness(100%);"><span class="text-white-50 icon"><i class="fas fa-plus"></i></span></button>
                            </div>
                            <div class="col">
                              <button class="btn btn-danger btn-sm border rounded" type="button" id="delete_category" style="background-color: #db4437;width: 39px;height: 37px;filter: brightness(100%);"><span class="text-white-50 icon"><i class="fas fa-trash"></i></span></button>
                            </div>
                            </div>
                          </div>

                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-row">
                          <div class="col-auto"><button class="btn btn-primary btn-sm" type="submit" style="background-color: #4285f4;">Update</button></div>
                          <div class="col">
                            <a href="{!! route('permission.index') !!}" class="btn btn-warning btn-sm" type="submit" style="color: #212529;background-color: #f4b400;">Back</a>
                          </div>
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
    @section('bottom')
      <script >
      $(document).ready(function(){
        var permission_category_id = {{$permission->permission_category->id}};
        loadCategories();
        $("#create_category").click(function(){
          var str = $("#myInput").val();
          // alert(str);
          // alert("it workes");
          $.ajax({
            type: "GET",
            url: '{{ route('permission_category.create') }}' ,
            data:  ({name : str}),
            success: function(data) {
              if($.isEmptyObject(data.error)){
                alert(data.success);
                loadCategories();
              }else{
                alert(data.error);
              }
            }
          });
        });
        $("#delete_category").click(function(){
          var cat_name = $('#category_id').find(":selected").text();
          var cat_id= $('#category_id').find(":selected").val();
          if (confirm("You want to delete "+cat_name+" Category")) {

            // alert(cat_id)
            $.ajax({
              type: "GET",
              url: '{{ route('permission_category.delete') }}' ,
              data:  ({id : cat_id}),
              success: function(data) {
                if($.isEmptyObject(data.error)){
                  alert(data.success);
                  // loadCategories();
                }else{
                  alert(data.error);
                }
              }
            });
          } else {
            alert("Oops!");
          }

        });
        function loadCategories(){
          $.ajax({
            type:"GET",
            url:"{{ route('permission_category.show') }}",
            success: function(data) {
              // console.log(data);
              var response = JSON.parse(data);
              /**/
              if(response.length>0)
              {
                //removeOptions(document.getElementById('cities'));
                document.getElementById("category_id").options[0] =  new Option("Select Category");
                for(i=0;i<response.length;i++)
                {
                  categories = response[i]['name'];
                  if(response[i]['id'] == permission_category_id){
                    optText = 'New elemenet';
                    optValue = 'newElement';
                    $('#category_id').append(`<option selected value="${response[i]['id']}"> ${categories}</option>`);
                    // ///////////////////////////////////////////////////////////////////////////////////////////////
                    // document.getElementById("category_id").options[i] =  new Option(categories,response[i]['id']);
                    // document.getElementById("category_id").options[i].setAttribute('selected',true);
                  }else {
                    document.getElementById("category_id").options[i] =  new Option(categories,response[i]['id']);
                  }
                }
              }
              /**/
            }
          });
        }
      });
      </script>
    @endsection

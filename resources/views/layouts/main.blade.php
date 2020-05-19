<!DOCTYPE html>
<html>

<head>
  @include('layouts.head')
</head>

<body id="page-top">
  <div id="wrapper">
    @include('layouts.sidebar')
    <div class="d-flex flex-column" id="content-wrapper">
      <div id="content">
        @include('layouts.header')

        @section('main-content')

        @show
      </div>
      @include('layouts.footer')
    </div>
    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
  </div>
  @include('layouts.bottom')
</body>

</html>

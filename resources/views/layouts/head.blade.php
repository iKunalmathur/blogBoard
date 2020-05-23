<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<title>BlogBoard</title>
<link rel="icon" type="icon" href="{{asset('assets/img/favicon-blogboard.png')}}">
<link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
<link rel="stylesheet" href="{{asset('assets/fonts/fontawesome-all.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/fonts/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/fonts/fontawesome5-overrides.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/styles.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script>
$(function(){
  //chagne color
  if(localStorage.getItem("sidebarbgcolor")){
    var sidebarcolor = localStorage.getItem("sidebarbgcolor");
    $('nav.navbar').css('background',sidebarcolor);
  }else{
    var sidebarcolor = "gray";
    $('nav.navbar').css('background',sidebarcolor);
  }
  // $('nav.navbar').css('background',localStorage.getItem("sidebarbgcolor"));
  if (localStorage.getItem("sidebarbgcolor")=="#f4b400") {
    $('a.nav-link').css('color', localStorage.getItem("sidebaracolor"));
    $('.sidebar-brand').css('color', localStorage.getItem("sidebaracolor"));
    $('i.chclr').css('color', localStorage.getItem("sidebaricolor"));
  }
});
</script>
@section('head')

@show

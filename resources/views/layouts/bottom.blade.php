<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/chart.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="{{asset('assets/js/script.min.js')}}"></script>
<script>
$(function() {
  if( navigator.userAgent.match(/Android/i)
  || navigator.userAgent.match(/webOS/i)
  || navigator.userAgent.match(/iPhone/i)
  || navigator.userAgent.match(/iPad/i)
  || navigator.userAgent.match(/iPod/i)
  || navigator.userAgent.match(/BlackBerry/i)
  || navigator.userAgent.match(/Windows Phone/i)
){
  console.log("mobile");
  $("nav:first").addClass("toggled");
}
});
</script>
<script>
$(document).ready(function(){


  // console.log(sideclr);

  // $("nav:first").addClass(sideclr);

  $('#link-goblue').on('click', function() {
    $('nav').css('background', '#4285f4');
    $('a.nav-link').css('color', '#fff');
    $('.sidebar-brand').css('color', '#fff');
    $('i.chclr').css('color', '#fff');
    var sidebarbgcolor = "#4285f4";
    localStorage.setItem("sidebarbgcolor", sidebarbgcolor);

  });

  $('#link-gored').on('click', function() {
    $('nav').css('background', '#db4437');
    $('a.nav-link').css('color', '#fff');
    $('.sidebar-brand').css('color', '#fff');
    $('i.chclr').css('color', '#fff');
    var sidebarbgcolor = "#db4437";
    localStorage.setItem("sidebarbgcolor", sidebarbgcolor);
  });

  $('#link-goyellow').on('click', function() {
    $('nav').css('background', '#f4b400');
    $('a.nav-link').css('color', '#5a5c69');
    $('.sidebar-brand').css('color', '#5a5c69');
    $('i.chclr').css('color', '#5a5c69');
    $('.sidebar-dark .nav-item .nav-link[data-toggle=collapse]:after').css('color', '#5a5c69');
    var sidebarbgcolor = "#f4b400";
    var sidebaracolor = "#5a5c69";
    var sidebaricolor = "#5a5c69";
    localStorage.setItem("sidebarbgcolor", sidebarbgcolor);
    localStorage.setItem("sidebaracolor", sidebaracolor);
    localStorage.setItem("sidebaricolor", sidebaricolor);
  });

  $('#link-gogreen').on('click', function() {
    $('nav').css('background', '#0f9d58');
    $('a.nav-link').css('color', '#fff');
    $('.sidebar-brand').css('color', '#fff');
    $('i.chclr').css('color', '#fff');
    var sidebarbgcolor = "#0f9d58";
    localStorage.setItem("sidebarbgcolor", sidebarbgcolor);
  });

  //chagne color
  $('nav.navbar').css('background',localStorage.getItem("sidebarbgcolor"));
  if (localStorage.getItem("sidebarbgcolor")=="#f4b400") {
    $('a.nav-link').css('color', localStorage.getItem("sidebaracolor"));
    $('.sidebar-brand').css('color', localStorage.getItem("sidebaracolor"));
    $('i.chclr').css('color', localStorage.getItem("sidebaricolor"));
  }
});
</script>
@section('bottom')

@show

@extends('layouts.theme')
@section('content')
<div id="layerslider" style="width:1280px;height:600px;">
   <!-- Slide 1 -->
   <div class="ls-slide" data-ls="transition2d:104;duration: 6000;">
      <!-- Background image -->
      <img src="{{url('public')}}/theme/img/CompressJPEG.online_(1013x475).webp" class="ls-bg"  alt="Slide background"/>
      <!-- Parallax Image / hidden on mobile  -->
      <img src="{{url('public')}}/theme/img/sun.pn" style="top:70px;left:35%;" class="ls-l img-fluid parallax1 ls-hide-tablet ls-hide-phone" alt="" data-ls="delayin:1000;easingin:easeOutExpo;parallaxlevel:7;">
      <!-- Text -->
      <div class="ls-l" style="top:200px;margin-left:4%;width:90%;" data-ls="offsetxin:0;durationin:2000;delayin:1500;easingin:easeOutExpo;rotatexin:-90;transformoriginin:50% top 0;offsetxout:-200;durationout:1000;parallaxlevel:2;">
         <div class="header-text col-lg-5 col-xl-5">
            <h1>Welcome to SHARADA ENGLISH SCHOOL</h1>
            <p class="subtitle">  </p>
            <!-- Button-->
            <div class="page-scroll">
               <a class="btn" href="#contact">Contact us</a>
            </div>
         </div>
      </div>
      <!-- Parallax Image / hidden on mobile -->
      
   <!-- Slide 2 -->

      <!-- Parallax Image / hidden on mobile-->
    
   <!-- Slide 3 -->
   
      <!-- Parallax Image / hidden on mobile -->
      <img src="{{url('public')}}/theme/img/flower.png" class="ls-l img-fluid parallax2 ls-hide-tablet ls-hide-phone" alt="" style=" top:380px;left:42%;" data-ls="delayin:1500;easingin:easeOutExpo;parallaxlevel:6;">
   </div>
   <!-- Slide 4 -->
 
      <!-- Parallax Image / hidden on mobile-->
     
</div>
<!-- /Layerslider ends--><!-- Clouds SVG Divider -->
<div id="cloud-home" class="container-fluid cloud-divider">
   <svg id="deco-clouds1" class="head" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none">
      <path d="M-5 100 Q 0 20 5 100 Z
         M0 100 Q 5 0 10 100
         M5 100 Q 10 30 15 100
         M10 100 Q 15 10 20 100
         M15 100 Q 20 30 25 100
         M20 100 Q 25 -10 30 100
         M25 100 Q 30 10 35 100
         M30 100 Q 35 30 40 100
         M35 100 Q 40 10 45 100
         M40 100 Q 45 50 50 100
         M45 100 Q 50 20 55 100
         M50 100 Q 55 40 60 100
         M55 100 Q 60 60 65 100
         M60 100 Q 65 50 70 100
         M65 100 Q 70 20 75 100
         M70 100 Q 75 45 80 100
         M75 100 Q 80 30 85 100
         M80 100 Q 85 20 90 100
         M85 100 Q 90 50 95 100
         M90 100 Q 95 25 100 100
         M95 100 Q 100 15 105 100 Z">
      </path>
   </svg>
</div>
<!-- /Clouds SVG Divider -->



<!-- Section About -->

<!--/ Section ends -->
<!-- Parallax object -->
<div class="parallax-object1 d-none d-lg-block" data-0="opacity:1;"
   data-100="transform:translatey(20%);"
   data-center-bottom="transform:translatey(-180%);">
   <!-- Image -->
   <img src="{{url('public')}}/theme/img/parallaxobject1.pn" alt="">
</div>
<!-- Section Team -->
<section id="team" class="color-section">
   <!-- svg triangle shape -->
   
  
  
<!-- Section ends -->

<!-- Parallax object -->
<div class="parallax-object2 d-none d-lg-block" data-0="opacity:1;"
   data-start="margin-top:40%"
   data-100="transform:translatey(0%);"
   data-center-bottom="transform:translatey(-220%);">
   <!-- Image -->
   <img src="{{url('public')}}/theme/img/parallaxobject2.png" alt="">
</div>
<!-- Section Gallery -->
<section id="gallery" class="color-section">
   <!-- svg triangle shape -->
   <svg class="triangleShadow" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none">
      <path class="trianglePath1" d="M0 0 L50 100 L100 0 Z" />
   </svg>
   <div class="container">
      <!-- Section heading -->
      <div class="section-heading">
         <h2>Our Gallery</h2>
      </div>
      <!-- Navigation -->
      <div class="text-center col-md-12">
         <ul class="nav nav-pills justify-content-center cat mb-5" id="gallerytab">
            <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="#"  data-toggle="tab" data-filter="*">All</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#" data-toggle="tab" data-filter=".events">Events</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#" data-toggle="tab" data-filter=".facilities">Our Facilities</a>
            </li>
         </ul>
      </div>
      <!-- Gallery -->
      <div class="row">
         <div class="col-md-12">
            <div id="lightbox">
               <!-- Image 1 -->
               <div class="col-sm-6 col-md-6 col-lg-4 events">
                  <div class="portfolio-item">
                     <div class="gallery-thumb">
                        <img class="img-fluid" src="{{url('public')}}/theme/img/resize-168724166897355902520180123.jpg" alt="">
                        <span class="overlay-mask"></span>
                        <a href="{{url('public')}}/theme/img/resize-168724166897355902520180123.jpg" class="link centered" title="You can add caption to pictures.">
                        <i class="fa fa-expand"></i></a>
                     </div>
                  </div>
               </div>
               <!-- Image 2 -->
               <div class="col-sm-6 col-md-6 col-lg-4 facilities">
                  <div class="portfolio-item">
                     <div class="gallery-thumb">
                        <img class="img-fluid" src="{{url('public')}}/theme/img/resize-1687241930382257580201801231.jpg" alt="">
                        <span class="overlay-mask"></span>
                        <a href="{{url('public')}}/theme/img/resize-1687241930382257580201801231.jpg" class="link centered" title="You can add caption to pictures.">
                        <i class="fa fa-expand"></i></a>
                     </div>
                  </div>
               </div>
               <!-- Image 3 -->
               <div class="col-sm-6 col-md-6 col-lg-4 facilities">
                  <div class="portfolio-item">
                     <div class="gallery-thumb">
                        <img class="img-fluid" src="{{url('public')}}/theme/img/resize-1687241962143428162201801232.jpg" alt="">
                        <span class="overlay-mask"></span>
                        <a href="{{url('public')}}/theme/img/resize-1687241962143428162201801232.jpg" class="link centered" title="You can add caption to pictures.">
                        <i class="fa fa-expand"></i></a>
                     </div>
                  </div>
               </div>
               <!-- Image 4 -->
               <div class="col-sm-6 col-md-6 col-lg-4 events">
                  <div class="portfolio-item">
                     <div class="gallery-thumb">
                        <img class="img-fluid" src="{{url('public')}}/theme/img/resize-1687242002130068226201801233.jpg" alt="">
                        <span class="overlay-mask"></span>
                        <a href="{{url('public')}}/theme/img/resize-1687242002130068226201801233.jpg" class="link centered" title="You can add caption to pictures.">
                        <i class="fa fa-expand"></i></a>
                     </div>
                  </div>
               </div>
               <!-- Image 5 -->
               <div class="col-sm-6 col-md-6 col-lg-4 facilities">
                  <div class="portfolio-item">
                     <div class="gallery-thumb">
                        <img class="img-fluid" src="{{url('public')}}/theme/img/resize-16872424941955640950201801234.jpg" alt="">
                        <span class="overlay-mask"></span>
                        <a href="{{url('public')}}/theme/img/resize-16872424941955640950201801234.jpg" class="link centered" title="You can add caption to pictures.">
                        <i class="fa fa-expand"></i></a>
                     </div>
                  </div>
               </div>
               <!-- Image 6 -->
               <div class="col-sm-6 col-md-6 col-lg-4 facilities">
                  <div class="portfolio-item">
                     <div class="gallery-thumb">
                        <img class="img-fluid" src="{{url('public')}}/theme/img/resize-16872425191722141363201801235.jpg" alt="">
                        <span class="overlay-mask"></span>
                        <a href="{{url('public')}}/theme/img/resize-16872425191722141363201801235.jpg" class="link centered" title="You can add caption to pictures.">
                        <i class="fa fa-expand"></i></a>
                     </div>
                  </div>
               </div>
               <!-- Image 7 -->
               <div class="col-sm-6 col-md-6 col-lg-4 events">
                  <div class="portfolio-item">
                     <div class="gallery-thumb">
                        <img class="img-fluid" src="{{url('public')}}/theme/img/resize-16872433491560237731201801236.jpg" alt="">
                        <span class="overlay-mask"></span>
                        <a href="{{url('public')}}/theme/img/resize-16872433491560237731201801236.jpg" class="link centered" title="You can add caption to pictures.">
                        <i class="fa fa-expand"></i></a>
                     </div>
                  </div>
               </div>
               <!-- Image 8 -->
               <div class="col-sm-6 col-md-6 col-lg-4 events">
                  <div class="portfolio-item">
                     <div class="gallery-thumb">
                        <img class="img-fluid" src="{{url('public')}}/theme/img/resize-16872434381219106809201801237.jpg" alt="">
                        <span class="overlay-mask"></span>
                        <a href="{{url('public')}}/theme/img/resize-16872434381219106809201801237.jpg" class="link centered" title="You can add caption to pictures.">
                        <i class="fa fa-expand"></i></a>
                     </div>
                  </div>
               </div>
               <!-- Image 9 -->
               <div class="col-sm-6 col-md-6 col-lg-4 facilities">
                  <div class="portfolio-item">
                     <div class="gallery-thumb">
                        <img class="img-fluid" src="{{url('public')}}/theme/img/resize-1687243468827926331201801238.jpg" alt="">
                        <span class="overlay-mask"></span>
                        <a href="{{url('public')}}/theme/img/resize-1687243468827926331201801238.jpg" class="link centered" title="You can add caption to pictures.">
                        <i class="fa fa-expand"></i></a>
                     </div>
                  </div>
               </div>
               <!-- Image 10 -->
              
               <!-- Image 11 -->
              
               <!-- Image 12 -->
               
            </div>
            <!-- /lightbox-->
         </div>
         <!-- /col-md-12-->
      </div>
      <!-- /row -->
   </div>
   <!-- /container -->
</section>
<!-- Section ends -->

<!-- Parallax object -->

<!-- Section Prices -->

<!-- /Section ends -->

<!-- Section ends -->

<!-- Footer -->	
@endsection


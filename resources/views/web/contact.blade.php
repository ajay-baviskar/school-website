@extends('layouts.theme')
@section('content')
 {{-- 
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
   --}}

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
   <img src="img/parallaxobject1.pn" alt="">
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
   <img src="img/parallaxobject2.png" alt="">
</div>


<!-- Section ends -->
<!-- Parallax object -->

<!-- Section Prices -->

<!-- /Section ends -->

<!-- Section Contact -->
<section id="contact" class="color-section">
   <div class="container pb-5 pb-lg-3">
      <div class="row">
         <div class="col-lg-12">
            <!-- Section heading -->
            <div class="section-heading">
               <h2>Contact us</h2>
            </div>
         </div>
         <!-- Contact -->
         <div class="col-lg-12 text-center">
            <h4>Information</h4>
            <!-- contact info -->			   
            <div class="contact-info">
               <p><i class="flaticon-back"></i><a href="mailto:youremailaddress">info@sharadaenglishhighschool.in
</a></p>
               <p><i class="fa fa-phone margin-icon"></i>Call us
                  +919867849184/+919870260599/+918976431500</p>
            </div>
            <!-- address info -->
            <p>We are located at Jyoti Nagar, Trimurti Devi Temple, Chinchpada Naka, Kalyan East, Thane, 421306</p>
            <!-- Map -->
         </div>
         <!-- Contact Form -->
         {{-- 
         <div class="col-lg-7 offset-lg-1">
            <!-- <h4>Write us</h4> -->
            <!-- Form Starts -->
			  <div id="error-message"></div>

            <form id="contact_form" method="post" action="form">
               @csrf
               <div class="form-group">
                  <input type="text" name="name" class="form-control input-field" placeholder="Name" required="">                    
                  <input type="email" name="email" class="form-control input-field" placeholder="Email ID" required="">           
                  <input type="text" name="subject" class="form-control input-field" placeholder="Subject" required="">                     
               </div>
               <textarea name="message" id="message" class="textarea-field form-control" rows="4" placeholder="Enter your message" required=""></textarea>
               <button type="submit" id="submit_btn" value="Submit" class="btn mx-auto">Send message</button>
            </form>
            <!-- Contact results -->
            <div id="contact_results"></div>
         </div>
         --}}
         <!--/Contact form -->
      </div>
      <!-- /row-->
   </div>
   <!-- /container-->
</section>
<!--Section ends -->
<section>
   <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15070.00163884912!2d73.1391407!3d19.2170111!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7944c160c7557%3A0x925151e2a4afb445!2sSharada%20English%20High%20School!5e0!3m2!1sen!2sin!4v1687332834834!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></section>
@endsection


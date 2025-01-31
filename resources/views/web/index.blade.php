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
	   <!--/navbar ends--><!-- Slider -->
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

<!-- Section Services -->
<section id="services" class="color-section" style="display: none;">
   <div class="container">
      <div class="col-lg-8 offset-lg-2">
         <!-- Section heading -->
         <div class="section-heading">
            <h2>Our Services</h2>
         </div>
      </div>
      <div class="row align-items-center">
         <!-- main text -->
         <div class="col-md-12 col-lg-6 text-center">
            <h3 class="text-center"></h3>
            <p class="fw-bold"></p>
            <p>

            </p>
         </div>
         <!-- /col-sm-12-->
         <div class="col-md-12 col-lg-5 offset-lg-1">
            <!-- Image -->

         </div>
         <!-- /col-md-12-->
      </div>
      <!-- /row -->
      <div class="row mt-5">
         <!-- item 1-->
         <div class="col-lg-4">
            <div class="service float">
               <img src="{{url('public')}}/theme/img/resize-168724534736572902preschool2015.jpg" alt="" class="rounded-circle  img-fluid">
               <h4>Pre School</h4>
               <p class="mt-3">A preschool, also known as nursery school, pre-primary school, play school or creche, is an educational establishment or learning space offering early childhood education to children before they begin compulsory education</p>
            </div>
         </div>
         <!-- /col -->
         <!-- item 2-->
         <div class="col-lg-4 res-margin">
            <div class="service float">
               <img src="{{url('public')}}/theme/img/resize-16872454111133875765primary.jpg" alt="" class="rounded-circle   img-fluid">
               <h4>Primary</h4>
               <p class="mt-3">A primary school, elementary school or grade school is a school for primary education of children who are 2.5 to 10 years of age. Primary schooling follows pre-school and precedes secondary schooling. </p>
            </div>
         </div>
         <!-- /col-->
         <!-- item 3-->
         <div class="col-lg-4">
            <div class="service float">
               <img src="{{url('public')}}/theme/img/resize-1687245431767574990secondaryschoolstudent.jpg" alt="" class="rounded-circle  img-fluid">
               <h4>Secondary</h4>
               <p class="mt-3">Secondary classes include 9th and 10th. It consists of two levels, level 2 junior secondary education, which is considered the second and final phase of basic education, and level 3 (Upper) secondary education.
               </p>
            </div>
         </div>
         <!-- /col -->
         <!-- item 3-->
      </div>
      <!-- /row -->
   </div>
   <!-- /container-->
</section>
<!-- /Section ends -->

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
<!-- Section activities -->

<!-- Parallax object -->
<div class="parallax-object2 d-none d-lg-block" data-0="opacity:1;"
   data-start="margin-top:40%"
   data-100="transform:translatey(0%);"
   data-center-bottom="transform:translatey(-220%);">
   <!-- Image -->
   <img src="{{url('public')}}/theme/img/parallaxobject2.png" alt="">
</div>

<!-- Section Latest Blog -->
<section id="latestblog">

      <!-- Section Heading -->

      <!-- Carousel -->

         <div class="slider-3">
            <!-- Blog item 1 -->

               <!-- Blog image -->

                  <!-- Post Info -->

            <!-- /blog-preview -->
            <!-- Blog item 2 -->

                  <!-- Post Info -->

            <!-- /blog-preview -->
            <!-- Blog item 3 -->

                  <!-- Post Info -->

            <!-- /blog-preview -->
            <!-- Blog item 4 -->

                  <!-- Post Info -->

            <!-- /blog-preview -->
            <!-- Blog item 5 -->

                  <!-- Post Info -->

                  <!-- Button-->

            <!-- /blog-preview -->
            <!-- Blog item 6 -->

                  <!-- Post Info -->

                  <!-- Button-->

            <!-- /blog-preview -->
         </div>
         <!-- /owl-blog -->
      </div>
      <!-- /col-lg -->
   </div>
   <!-- /container -->
</section>
<!-- Section ends -->
<!-- Parallax object -->

<!-- Section Prices -->

<!-- /Section ends -->
<section id="about">
   <div class="container">
      <div class="row align-items-center">
         <!-- text -->
         <div class="col-lg-12 col-sm-12">
            <h3>ABOUT SCHOOL</h3>
            <p>Sharada English High School & Junior College located amidst nature with picturesque backdrop. A Temple Of Learning which nurtures and nourishes youth to a full-grown adult capable to lead a meaningful and holistic life. Affiliated to Maharashtra State Board with CBSE NOC.</p>
            <p>SCHOOL is a composite school providing education from Nursery to Junior College & follows CBSE curriculum till VIII.
            "Development of holistic personality of students to face challenges of the modern world and be a Global Citizen."</p>
            <p>Sharada School has established its infrastructure with Science Laboratories, Computer Laboratories, Library , Audio - Visual Room, Music Room, Art & Craft Rooms .</p>
            <p>It is capable of catering to the needs of students, right from Std. I to XII.
            The Junior college was started in the year 2015 with Commerce & Science streams.</p>
            <h4>INFRASTRUCTURE:Safe, Secure & Spacious Environment</h4>
            <p>Having rooms and learning spaces in good conditions is decisive for students to achieve the expected academic results. The fact is that a good school infrastructure, with renewed spaces, makes it possible for children and youths that live in remote areas to study and, in addition, tends to improve the attendance and interest of students and teachers in learning.
            </p>
            <h4>QUALITY</h4>
            <p>
               Teachers are arguably the most important mentors of our society. They give children purpose, set them up for success as citizens of our world, and inspire in them a drive to do well and succeed in life. The children of today are the leaders of tomorrow, and teachers are that critical point that makes a child ready for their future.
            </p>
            <h4>MOTIVATIONAL SUPPORT</h4>
            <p>
               As an educator or parent, your words and actions have the ability to lift students up or break them down. Encouraging words and actions are often internalized by students and have the power to motivate them to succeed. Encouragement can even be the difference between students completing school and giving up on themselves.
            </p>
         </div>
         <!-- /col-lg- -->
      </div>

        <div class="row">
           <!-- Admission Card -->
           <div class="col-lg-3 col-md-6 mb-4">
              <div class="card">
                 {{-- <img src="{{url('public')}}/theme/img/admission.jpg" class="card-img-top" alt="Admission Image"> --}}
                 <div class="card-body">
                    <h5 class="card-title">Admission</h5>
                    <p class="card-text">Get detailed information about the admission process, eligibility, and necessary documents to apply to our school.</p>
                    <a href="{{url('admission')}}" class="btn btn-primary">Apply Now</a>
                 </div>
              </div>
           </div>

           <!-- Fees Payment Card -->
           <div class="col-lg-3 col-md-6 mb-4">
              <div class="card">
                 {{-- <img src="{{url('public')}}/theme/img/fees-payment.jpg" class="card-img-top" alt="Fees Payment Image"> --}}
                 <div class="card-body">
                    <h5 class="card-title">Fees Payment</h5>
                    <p class="card-text">Easily pay your school fees online through our secure payment gateway. Stay updated with your payment status.</p>
                    <a href="{{url('payment')}}" class="btn btn-primary">Pay Now</a>
                 </div>
              </div>
           </div>

           <!-- School Timing Card -->
           <div class="col-lg-3 col-md-6 mb-4">
              <div class="card">
                 {{-- <img src="{{url('public')}}/theme/img/school-timing.jpg" class="card-img-top" alt="School Timing Image"> --}}
                 <div class="card-body">
                    <h5 class="card-title">School Timing</h5>
                    <p class="card-text">Find out the school timings for each class and day. Make sure your child reaches on time for their lessons.</p>
                    <a href="{{url('school-time')}}" class="btn btn-primary">View Timings</a>

                 </div>
              </div>
           </div>

           <!-- Notice Card -->
           <div class="col-lg-3 col-md-6 mb-4">
              <div class="card">
                 {{-- <img src="{{url('public')}}/theme/img/notice.jpg" class="card-img-top" alt="Notice Image"> --}}
                 <div class="card-body">
                    <h5 class="card-title">Notice</h5>
                    <p class="card-text">Stay updated with the latest notices and announcements from the school. Don't miss any important information!</p>
                    <a href="{{url('notice-board')}}" class="btn btn-primary">View Notices</a>
                 </div>
              </div>
           </div>
        </div>

      <!-- /row -->
   <!--/container-->
</section>
<!-- Section Call to Action -->
<section id="call-to-action" class="small-section" style="display:none;">
   <div class="container text-center ">
      <div class="col-lg-6 offset-lg-6 p-3">
         <div class="card">
            <!-- Section heading -->
            <h3>Get more Information</h3>
            <p>Through the School programmed we wish to create the future leaders of India who have in them the traditional values for which our country is well-known and at the same time are able embrace modern technology to take India to greater heights of progress and development.</p>
            <!-- Button -->
            <div class="page-scroll">
               <a class="btn" href="{{url('about-us')}}">About Us</a>
            </div>
            <!--/page-scroll -->
         </div>
         <!--/card -->
      </div>
      <!--/col-lg-6 -->
   </div>
   <!-- /container-->
</section>
<!-- Section ends -->
@endsection



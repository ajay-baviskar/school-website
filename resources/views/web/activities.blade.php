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
<!-- Section activities -->
<section id="activities">
   <div class="container">
      <!-- Section Heading -->
      <div class="section-heading">
         <h2>Our Activities</h2>
      </div>
      <!--nav tabs -->
      <ul class="nav nav-tabs justify-content-center" id="pills-tab" role="tablist">
         <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-1-tab" data-bs-toggle="pill" data-bs-target="#pills-1" type="button" role="tab"  aria-selected="true">Music</button>
         </li>
         <!--/nav-item -->
         <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-2-tab" data-bs-toggle="pill" data-bs-target="#pills-2" type="button" role="tab"  aria-selected="false">Dance</button>
         </li>
         <!--/nav-item -->
         <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-3-tab" data-bs-toggle="pill" data-bs-target="#pills-3" type="button" role="tab" aria-selected="false">Art and Craft</button>
         </li>
         <!--/nav-item -->
         <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-4-tab" data-bs-toggle="pill" data-bs-target="#pills-4" type="button" role="tab" aria-selected="false">Picnics and excursion</button>
         </li>
         <!--/nav-item -->
        
         <!--/nav-item -->
      </ul>
      <!--/nav-tabs -->
      <div class="tab-content color_block" id="pills-tabContent">
         <div class="tab-pane show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
            <!--Tab Content 1 -->
            <div class="row g-lg-5 align-items-center">
               <div class="col-lg-5">
                  <!-- Activity image-->
                  <img src="{{url('public')}}/theme/img/resize-16873295641754931279IMG0100scaled1024x546.jpg" alt="" class="img-fluid rounded-circle">						
               </div>
                <div class="col-lg-7">
                        <!-- Activity text-->
                        <h3>Music Classes</h3>
                         <div class="accordion" id="accordion1">
                           <!--accordion item -->
                           <div class="accordion-item">
                              <h4 class="accordion-header" id="headingOne">
                                 <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                 Activity Description
                                 </button>
                              </h4>
                              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion1">
                                 <div class="accordion-body">
                                    <p>We believe in the power of music to inspire, educate, and bring joy to our students. Our music program offers a wide range of opportunities for students to explore their musical talents, develop their skills, and foster a lifelong appreciation for music.

                                       Our dedicated and passionate music teachers create a supportive and inclusive environment where students can discover their unique musical abilities.  </p>
                                    <p>
                                    </p>
                                 </div>
                              </div>
                           </div>
                           <!--accordion item -->
                           <div class="accordion-item">
                              <h4 class="accordion-header" id="headingTwo">
                                 <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                 Age Group
                                 </button>
                              </h4>
                              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion1">
                                 <div class="accordion-body">
                                    <p>From young beginners to adult enthusiasts, our music classes provide a nurturing and engaging environment where students can explore, learn, and grow musically. Our experienced and dedicated music teachers are passionate about fostering a love for music </p>
                                    <p>
                                    </p>
                                 </div>
                              </div>
                           </div>
                           <!--accordion item -->
                           <div class="accordion-item">
                              <h4 class="accordion-header" id="headingThree">
                                 <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
                                 Timetable
                                 </button>
                              </h4>
                              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion1">
                                 <div class="accordion-body">
                                    <p>
                                       Our music class timetable for grades 1 to 10 offers a comprehensive musical education for students of all ages. In the early years (grades 1-3), students are introduced to music through interactive activities, singing, and percussion instruments. Grades 4-5 focus on instrumental exploration, allowing students to try out different instruments and develop basic techniques. In grades 6-7, students delve into music theory fundamentals, learning notation, rhythm, scales, and basic harmony. Vocal training takes center stage in grades 8-9, where students receive instruction in proper singing techniques and explore vocal harmony. Finally, grade 10 students engage with music technology and composition, using software for music production and exploring the art of composing their own music. Our flexible timetable ensures a well-rounded musical education for students at every stage of their musical journey. </p>
                                    <p>
                                    </p>
                                 </div>
                              </div>
                           </div>
                           <!--/accordion item -->
                        </div>
                        <!--/accordion -->									
                     </div>
               <!-- /.col-md-7 -->
            </div>
            <!-- /.row -->
            <!--/Tab Content 1 ends -->
         </div>
         <!--/tab-pane -->
         <div class="tab-pane " id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
            <!--Tab Content 1 -->
            <div class="row g-lg-5 align-items-center">
               <div class="col-lg-5">
                  <!-- Activity image-->
                  <img src="{{url('public')}}/theme/img/resize-1687329007658055623Dance1.jpg" alt="" class="img-fluid rounded-circle">						
               </div>
               <div class="col-lg-7">
                  <!-- Activity text-->
                  <h3>Dance Classes</h3>
                  <div class="accordion" id="accordion2">
                     <!--accordion item -->
                     <div class="accordion-item">
                        <h4 class="accordion-header" id="headingOne2">
                           <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne">
                           Activity Description
                           </button>
                        </h4>
                        <div id="collapseOne2" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion2">
                           <div class="accordion-body">
                              <p>We believe in the transformative power of dance as a means of self-expression, creativity, and physical fitness. Our dance program offers an exciting and enriching experience for students of all ages, encouraging them to explore various dance styles, develop their skills, and discover the joy of movement.

                                 Led by our experienced and passionate dance instructors, our classes provide a nurturing environment where students can explore their unique talents, build confidence, and cultivate a lifelong love for dance.</p>
                              <p>
                              </p>
                           </div>
                        </div>
                     </div>
                     <!--accordion item -->
                     <div class="accordion-item">
                        <h4 class="accordion-header" id="headingTwo2">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo">
                           Age Group
                           </button>
                        </h4>
                        <div id="collapseTwo2" class="accordion-collapse collapse" aria-labelledby="headingTwo2" data-bs-parent="#accordion2">
                           <div class="accordion-body">
                              <p>We believe that dance is a universal language that can be enjoyed by individuals of all ages. Our inclusive dance program offers a wide range of classes and activities tailored to meet the unique needs and interests of students from various age groups.

                                 From young beginners to adult enthusiasts, our dance classes provide a nurturing and supportive environment where students can explore, learn, and grow as dancers. Our experienced and dedicated dance instructors are passionate about fostering a love for dance</p>
                              <p>
                              </p>
                           </div>
                        </div>
                     </div>
                     <!--accordion item -->
                     <div class="accordion-item">
                        <h4 class="accordion-header" id="headingThree2">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree2" aria-expanded="false" aria-controls="collapseTwo">
                           Timetable
                           </button>
                        </h4>
                        <div id="collapseThree2" class="accordion-collapse collapse" aria-labelledby="headingThree2" data-bs-parent="#accordion2">
                           <div class="accordion-body">
                              <p>Our dance class timetable for grades 1 to 10 offers a comprehensive dance education for students of all ages. In the early years (grades 1-3), students engage in creative movement classes that develop motor skills and self-expression. Grades 4-5 focus on building a foundation in dance techniques such as ballet, jazz, and contemporary. In grades 6-10, students progress through intermediate and advanced levels, refining their technique, expanding their repertoire, and exploring various dance styles. We also offer adult dance classes for individuals of all skill levels. Throughout the year, students have opportunities to showcase their talents through recitals and performances. </p>
                              <p>
                              </p>
                           </div>
                        </div>
                     </div>
                     <!--/accordion item -->
                  </div>
                  <!--/accordion -->						
               </div>
               <!-- /.col-md-7 -->
            </div>
            <!-- /.row -->
            <!--/Tab Content 2 ends -->													
         </div>
         <!--/tab-pane -->
         <div class="tab-pane" id="pills-3" role="tabpanel" aria-labelledby="pills-3-tab">
            <!--Tab Content 3 -->
            <div class="row g-lg-5 align-items-center">
               <div class="col-lg-5">
                  <!-- Activity image-->
                  <img src="{{url('public')}}/theme/img/resize-16873290831603904372520261475233084ArtCraft.jpg" alt="" class="img-fluid rounded-circle">						
               </div>
               <div class="col-lg-7">
                  <!-- Activity text-->
                  <h3>Art and Craft
                  </h3>
                  <div class="accordion" id="accordion3">
                     <!--accordion item -->
                     <div class="accordion-item">
                        <h4 class="accordion-header" id="headingOne3">
                           <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne3" aria-expanded="true" aria-controls="collapseOne">
                           Activity Description
                           </button>
                        </h4>
                        <div id="collapseOne3" class="accordion-collapse collapse show" aria-labelledby="headingOne3" data-bs-parent="#accordion3">
                           <div class="accordion-body">
                              <p>We believe that artistic expression is a powerful way for students to explore their creativity, develop critical thinking skills, and gain a deeper appreciation for the world around them. Our arts and craft program offers a wide range of classes and activities that encourage students to unleash their imagination, experiment with different mediums, and create beautiful works of art.

                                 Led by our talented and experienced art teachers, our classes provide a nurturing environment where students can explore various art forms, learn new techniques, and develop their artistic abilities.  </p>
                              <p>
                              </p>
                           </div>
                        </div>
                     </div>
                     <!--accordion item -->
                     <div class="accordion-item">
                        <h4 class="accordion-header" id="headingTwo3">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo3" aria-expanded="false" aria-controls="collapseTwo">
                           Age Group
                           </button>
                        </h4>
                        <div id="collapseTwo3" class="accordion-collapse collapse" aria-labelledby="headingTwo3" data-bs-parent="#accordion3">
                           <div class="accordion-body">
                              <p>We believe in the power of artistic expression to ignite creativity and nurture imagination in students of all ages. Our Arts and Crafts program offers a wide range of classes that cater to the diverse interests and skill levels of our students.

                                 Led by our talented and passionate instructors, our Arts and Crafts classes provide a supportive and inspiring environment where students can explore various art forms, experiment with different materials, and develop their artistic abilities.</p>
                              <p>
                              </p>
                           </div>
                        </div>
                     </div>
                     <!--accordion item -->
                     <div class="accordion-item">
                        <h4 class="accordion-header" id="headingThree3">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree3" aria-expanded="false" aria-controls="collapseTwo">
                           Timetable
                           </button>
                        </h4>
                        <div id="collapseThree3" class="accordion-collapse collapse" aria-labelledby="headingThree3" data-bs-parent="#accordion3">
                           <div class="accordion-body">
                              <p>Our arts and crafts class timetable for grades 1 to 10 offers a diverse and engaging arts education for students of all ages. In the early years (grades 1-3), students explore various art mediums and engage in imaginative projects. Grades 4-5 focus on building fundamental art skills, while grades 6-10 delve into advanced techniques, art history, and collaborative projects. Throughout the year, students have opportunities to showcase their artwork through exhibitions and showcases. Our flexible timetable ensures a comprehensive arts and crafts experience for students at every stage of their creative journey.</p>
                              <p>
                              </p>
                           </div>
                        </div>
                     </div>
                     <!--/accordion item -->
                  </div>
                  <!--/accordion -->						
               </div>
               <!-- /.col-md-7 -->
            </div>
            <!-- /.row -->
            <!--/Tab Content 3 ends -->
         </div>
         <!--/tab-pane -->
         <div class="tab-pane" id="pills-4" role="tabpanel" aria-labelledby="pills-4-tab">
            <!--Tab Content 4 -->
            <div class="row g-lg-5 align-items-center">
               <div class="col-lg-5">
                  <!-- Activity image-->
                  <img src="{{url('public')}}/theme/img/resize-16873288982144884871picnic.jpg" alt="" class="img-fluid rounded-circle">						
               </div>
               <div class="col-lg-7">
                  <!-- Activity text-->
                  <h3>Picnics and excursion</h3>
                  <div class="accordion" id="accordion4">
                     <!--accordion item -->
                     <div class="accordion-item">
                        <h4 class="accordion-header" id="headingOne4">
                           <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne4" aria-expanded="true" aria-controls="collapseOne">
                           Activity Description
                           </button>
                        </h4>
                        <div id="collapseOne4" class="accordion-collapse collapse show" aria-labelledby="headingOne4" data-bs-parent="#accordion4">
                           <div class="accordion-body">
                              <p>We believe that learning extends beyond the confines of the classroom. Our Picnics and Excursions program offers students exciting opportunities to explore the world around them, connect with nature, discover new places, and create lasting memories with their peers.

                                 Led by our experienced and enthusiastic teachers, our Picnics and Excursions classes provide educational and recreational outings that complement the school curriculum. Through these off-campus experiences, students develop a deeper understanding of various subjects, cultivate social skills, and foster a sense of adventure and curiosity. </p>
                              <p>
                              </p>
                           </div>
                        </div>
                     </div>
                     <!--accordion item -->
                     <div class="accordion-item">
                        <h4 class="accordion-header" id="headingTwo4">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo4" aria-expanded="false" aria-controls="collapseTwo">
                           Age Group
                           </button>
                        </h4>
                        <div id="collapseTwo4" class="accordion-collapse collapse" aria-labelledby="headingTwo4" data-bs-parent="#accordion4">
                           <div class="accordion-body">
                              <p>We believe in the power of experiential learning and exploring the world around us. Our Picnics and Excursions program offers a range of outings and adventures designed to cater to students of all ages.

                                 From our youngest learners to our senior students, everyone can participate in these exciting off-campus experiences that foster curiosity, social interaction, and a deeper understanding of the world.</p>
                              <p>
                              </p>
                           </div>
                        </div>
                     </div>
                     <!--accordion item -->
                     <div class="accordion-item">
                        <h4 class="accordion-header" id="headingThree4">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree4" aria-expanded="false" aria-controls="collapseTwo">
                           Timetable
                           </button>
                        </h4>
                        <div id="collapseThree4" class="accordion-collapse collapse" aria-labelledby="headingThree4" data-bs-parent="#accordion4">
                           <div class="accordion-body">
                              <p>Rest assured that throughout the school year, students in grades 1 to 10 will have exciting opportunities to participate in educational and recreational outings.These outings will be carefully planned to align with the curriculum and provide valuable learning experiences for all age groups. Students can expect a well-rounded program that includes educational trips to museums, historical sites, and science centers, as well as nature exploration activities, cultural experiences, and adventure-based outings. The specific details and dates of each excursion will be communicated to students and parents well in advance, ensuring a well-organized and enjoyable experience for everyone involved.</p>
                              <p>
                              </p>
                           </div>
                        </div>
                     </div>
                     <!--/accordion item -->
                  </div>
                  <!--/accordion -->						
               </div>
               <!-- /.col-md-7 -->
            </div>
            <!-- /.row -->
            <!--/Tab Content 4 ends -->
         </div>
         <!--/tab-pane -->
         <div class="tab-pane" id="pills-5" role="tabpanel" aria-labelledby="pills-5-tab">
            <!--Tab Content 5 -->
            <div class="row g-lg-5 align-items-center">
               <div class="col-lg-5">
                  <!-- Activity image-->
                  <img src="{{url('public')}}/theme/img/activity5.jpg" alt="" class="img-fluid rounded-circle">						
               </div>
               <div class="col-lg-7">
                  <!-- Activity text-->
                  <h3>Our Playground</h3>
                  <div class="accordion" id="accordion5">
                     <!--accordion item -->
                     <div class="accordion-item">
                        <h4 class="accordion-header" id="headingOne5">
                           <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne5" aria-expanded="true" aria-controls="collapseOne">
                           Activity Description
                           </button>
                        </h4>
                        <div id="collapseOne5" class="accordion-collapse collapse show" aria-labelledby="headingOne5" data-bs-parent="#accordion5">
                           <div class="accordion-body">
                              <p>Vivamus finibus lorem diam, sit amet facilisis tellus placerat Aliquam porttitor ut lectus eget imperdiet. Aenean ut ex leo. Nulla faucibus turpis sit amet turpis mattis vestibulum et vel enim. Suspendisse magna magna, consectetur at erat non, mattis aliquet elit. </p>
                              <p>Fusce at nibh lacinia orci dictum euismod. Praesent vel nisl in quam commodo tristique.
                              </p>
                           </div>
                        </div>
                     </div>
                     <!--accordion item -->
                     <div class="accordion-item">
                        <h4 class="accordion-header" id="headingTwo5">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo5" aria-expanded="false" aria-controls="collapseTwo">
                           Age Group
                           </button>
                        </h4>
                        <div id="collapseTwo5" class="accordion-collapse collapse" aria-labelledby="headingTwo5" data-bs-parent="#accordion5">
                           <div class="accordion-body">
                              <p>Vivamus finibus lorem diam, sit amet facilisis tellus placerat Aliquam porttitor ut lectus eget imperdiet. Aenean ut ex leo. Nulla faucibus turpis sit amet turpis mattis vestibulum et vel enim. Suspendisse magna magna, consectetur at erat non, mattis aliquet elit. </p>
                              <p>Fusce at nibh lacinia orci dictum euismod. Praesent vel nisl in quam commodo tristique.
                              </p>
                           </div>
                        </div>
                     </div>
                     <!--accordion item -->
                     <div class="accordion-item">
                        <h4 class="accordion-header" id="headingThree5">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree5" aria-expanded="false" aria-controls="collapseTwo">
                           Timetable
                           </button>
                        </h4>
                        <div id="collapseThree5" class="accordion-collapse collapse" aria-labelledby="headingThree5" data-bs-parent="#accordion5">
                           <div class="accordion-body">
                              <p>Vivamus finibus lorem diam, sit amet facilisis tellus placerat Aliquam porttitor ut lectus eget imperdiet. Aenean ut ex leo. Nulla faucibus turpis sit amet turpis mattis vestibulum et vel enim. Suspendisse magna magna, consectetur at erat non, mattis aliquet elit. </p>
                              <p>Fusce at nibh lacinia orci dictum euismod. Praesent vel nisl in quam commodo tristique.
                              </p>
                           </div>
                        </div>
                     </div>
                     <!--/accordion item -->
                  </div>
                  <!--/accordion -->						
               </div>
               <!-- /.col-md-7 -->
            </div>
            <!-- /.row -->
            <!--/Tab Content 5 ends -->
         </div>
         <!--/tab-pane -->
      </div>
      <!--/tab-content -->
   </div>
   <!-- /container -->
</section>
<!-- /Section ends -->
<!-- Parallax object -->
<div class="parallax-object2 d-none d-lg-block" data-0="opacity:1;"
   data-start="margin-top:40%"
   data-100="transform:translatey(0%);"
   data-center-bottom="transform:translatey(-220%);">
   <!-- Image -->
   <img src="{{url('public')}}/theme/img/parallaxobject2.png" alt="">
</div>


<!-- Parallax object -->

<!-- Section Prices -->

<!-- /Section ends -->


<!-- Footer -->	
@endsection


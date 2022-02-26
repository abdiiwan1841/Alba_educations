<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Login - Alba Educations</title>
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/blog.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/aboutUs_albaEducations.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/utility.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/style.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/aboutUs-facilitators.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/aboutUs_contact.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/studyMaterial_courses.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/studyMaterial_customizedWorkBook.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/studyMaterial_studentRegistration.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/studyMaterial_tutorHiringProcess.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/login.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/animations.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/blog_isEduactionEverGoingToBeTheSameOnceThePandemicEnds.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"  rel="stylesheet"  integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"  crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
</head>
<body>
    
      <section class="margin-top-5">
        <div class="registration-title-area pad-top-bottom-20">
            <div class="container text-center">
                <div class="registration-title-content">
                    <h2 class="font-weight-black">
                       Teacher Log-In
                    </h2>
                </div>
            </div>
        </div>
    </section>
      <section >
        <div class="container position-relative d-flex justify-content-center">
          <div class="row login-area">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
                <?php
                if (isset($login_res)) {
                ?>
                    <div class="form-group text-danger text-center"><?php print_r($login_res); ?></div>
                <?php
                };
                if (isset($message)) {
                ?>
                    <div class="form-group text-success"><?php print_r($message); ?></div>
                <?php
                };
                ?>
             <form method="POST" action="<?php echo base_url('teacher_requestLogin'); ?>">
               <div class="row bg-fe4a55 form-area-wrapper">
                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                   <div class="mb-3">
                     <input type="text" name="username" class="form-control input-input"  placeholder="Username">
                   </div>
   
                 </div>
                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                   <div class="mb-3">
                     <input type="password" name="password" class="form-control input-input" placeholder="Password" >
                   </div>
                 </div>
                 <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center others-links">
                   <a href="#" >Lost your password ?</a>
                 </div> -->
                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center ">
                   <button type="submit" class="button2">Log In</button>
                 </div>
             </form>
            </div>
          </div>
        </div>
      </section>


  
    <script>
      const button = document.querySelector(".button");
  button.onmousemove = function (e) {
  const x = e.pageX - button.offsetLeft;
  const y = e.pageY - button.offsetTop;
  
  button.style.setProperty("--x", x + "px");
  button.style.setProperty("--y", y + "px");
  };
  
    </script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
      jQuery(document).ready(function(e) {
  const r = document.querySelector(".cursor1")
    , t = document.querySelector(".cursor2");
  if (jQuery(".cursor1")[0]) {
      let e = {
          x: 0,
          y: 0,
          largeX: 0,
          largeY: 0,
          targetX: 0,
          targetY: 0
      };
      document.addEventListener("mousemove", r=>{
          e.targetX = r.pageX,
          e.targetY = r.pageY
      }
      );
      const a = ()=>{
          e.x += .2 * (e.targetX - e.x),
          e.y += .2 * (e.targetY - e.y),
          e.largeX += .12 * (e.targetX - e.largeX),
          e.largeY += .12 * (e.targetY - e.largeY),
          r.style.transform = `translate(${e.x - 5}px, ${e.y - 5}px) `,
          t.style.transform = `translate(${e.largeX - 25}px, ${e.largeY - 25}px)`,
          requestAnimationFrame(a)
      }
      ;
      a()
  }
  });

      $(".expand-1").click(function(){
        $(".has-child-1").toggleClass("show");
      });

      $(".expand-2").click(function(){
        $(".has-child-2").toggleClass("show");
      });
      $(".expand-3").click(function(){
        $(".has-child-3").toggleClass("show");
      });
      $(".inner").click(function(){
        $(".others-option-for-responsive .container .container").toggleClass("active");
      });

      $(document).ready(function() {
        var counters = $(".count");
        var countersQuantity = counters.length;
        var counter = [];
        for (i = 0; i < countersQuantity; i++) {
          counter[i] = parseInt(counters[i].innerHTML);
        }
        
        var count = function(start, value, id) {
          var localStart = start;
          setInterval(function() {
            if (localStart < value) {
              localStart++;
              counters[id].innerHTML = localStart;
            }
          }, 20);
        }
        
        for (j = 0; j < countersQuantity; j++) {
          count(0, counter[j], j);
        }
        });

         // Go to Top
         $(function(){
            // Scroll Event
            $(window).on('scroll', function(){
                var scrolled = $(window).scrollTop();
                if (scrolled > 300) $('.go-top').addClass('active');
                if (scrolled > 600) $('.conv-widget').addClass('active');
                if (scrolled < 300) $('.go-top').removeClass('active');
            });
            // Click Event
            $('.go-top').on('click', function() {
                $("html, body").animate({ scrollTop: "0" },  500);
            });
        });
                    // Preloader
            $(window).on('load', function () {
                $('.preloader').fadeOut();
            });
        // popup
        $(".conv-closer").click(function(){
            $(".widget-area").hide();
          });
    </script>
</body>
</html>
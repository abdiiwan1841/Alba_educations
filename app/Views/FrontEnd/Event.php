<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlbaEducations Events - Alba Educations</title>
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/aboutUs_albaEducations.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/utility.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/style.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/gallery.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/aboutUs-facilitators'); ?>.css" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/aboutUs_contact.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/studyMaterial_courses.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/studyMaterial_customizedWorkBook.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/studyMaterial_tutorHiringProcess.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/parentSupport_parentCounselling.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/event.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/animations.css'); ?>">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
    />
    <link
      href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
      rel="stylesheet"
    />
</head>
<body>
    <?php  include('public/FrontEnd/inc/header.php'); ?>


      <section class="margin-top-5">
        <div class="container">
          <div class="gallery-header pt-sm-5 p-10">
              <div class="gallery-wrapper">
  
                  <div class="gallery-button-wrapper">
                    <a href="<?php  echo base_url('event_upcoming'); ?>" class="event-button">
                      <span>
                        <span class="gallery-button-text"
                          >  Previous Events</span
                        >
                        <span class="gallery-button-icon">
                          <i class="far fa-arrow-alt-circle-right"></i>
                        </span>
                      </span>
                    </a>
                  </div>
              </div>
          </div>
        </div>
      </section>

      <section class="event-heading">
        <div class="container">
            <div class="gallery-heading">
                <h2>Our Upcoming Events</h2>
            </div>
        </div>
    </section>

    <section>
        <div class="container-fluid">
            <div class="row container_padding">
                <div class="col-lg-4 col-md-6 col-sm-12 pad-left-right-15">
                    <div class="single-events-box-item">
                        <div class="event-image">
                            <a href="<?php echo base_url('/events_timeManagementWorkshop') ?>">
                                <img src="<?php echo base_url('/public/FrontEnd/Image/ist-event-750x500.png')?>" >
                            </a>
                            <span class="event-date">September 18, 2021</span>
                        </div>
                        <div class="event-content">
                            <h3>
                                <a href="<?php echo base_url('/events_timeManagementWorkshop') ?>">Time Management Workshop</a>
                            </h3>
                            <span class="event-location">
                                <i class="fas fa-map-marker-alt"></i>
                                Vancover, Canada
                            </span>
                        </div>
                    </div>
                    <?php
                        if (isset($events) && is_array($events)) {
                            
                            if (count($events) > 0) {
                                $i = 1;
                                foreach($events as $blog)
                                {
                                    ?>
                                    <div class="single-events-box-item">
                                        <div class="event-image">
                                            <a href="<?php echo base_url('/events_timeManagementWorkshop') ?>">
                                                <img src="<?php echo base_url($blog->image)?>" >
                                            </a>
                                            <span class="event-date"><?php echo $blog->date?></span>
                                        </div>
                                        <div class="event-content">
                                            <h3>
                                                <a href="<?php echo base_url('/events_timeManagementWorkshop') ?>"><?php echo $blog->title ?></a>
                                            </h3>
                                            <span class="event-location">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <?php echo $blog->place ?>
                                            </span>
                                        </div>
                                    </div>
                                    
                                    <?php $i++;
                                }
                                
                            }
                        }
                    
                    ?>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="subscribe-area pad-top-bottom-70 bg-f9f9f9">
          <div class="container">
                <div class="subscribe-content gallery-subscribe-content ">
                  <span class="sub-title">Go At Your Own Pace</span>
                  <h2 class="font-weight-black">Subscribe to Our Newsletter</h2>
                  <p>Enter your email address to get the lates update and all other information.</p>
                  <form action="#" class="newsletter-form">
                    <input type="email" class="input-newsletter" placeholder="Enter your email address">
                    <button class="button">
                      <i class="far fa-user"></i> Subscribe Now
                    </button>
                  </form>
                </div>
          </div>

          <div class="gallery-shape4">
              <img src="<?php echo base_url('/public/FrontEnd/Image/shape4.png')?>" alt="Shape Image">
          </div>
          <div class="shape13">
              <img src="<?php echo base_url('/public/FrontEnd/Image/shape12.png')?>" alt="Shape Image">
          </div>
          <div class="shape14">
              <img src="<?php echo base_url('/public/FrontEnd/Image/shape13.png')?>" alt="Shape Image">
          </div>
          <div class="shape15">
              <img src="<?php echo base_url('/public/FrontEnd/Image/shape14.png')?>" alt="Shape Image">
          </div>
          
  
        </div>
      </section>


      <div class="go-top ">
        <i class="fas fa-chevron-up"></i>
    </div>

    <div class="container">

      <div class="cursor1"></div>
      <div class="cursor2"></div>
    </div>
  
<?php include('public/FrontEnd/inc/footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js">
</script>
  
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
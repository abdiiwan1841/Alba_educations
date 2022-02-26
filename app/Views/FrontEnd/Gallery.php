<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gallery - Alba Eduacations</title>
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/aboutUs_albaEducations.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/utility.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/style.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/aboutUs-facilitators.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/aboutUs_contact.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/gallery.css'); ?>" />
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
    <?php include('public/FrontEnd/inc/header.php'); ?>

    <section class="marginTop-7">
      <div class="container ">
        <div class="gallery-header p-10">
            <div class="gallery-wrapper">

                <div class="gallery-button-wrapper">
                  <a href="<?php  echo base_url('gallery_videos'); ?>" class="gallery-button">
                    <span>
                      <span class="gallery-button-text"
                        >Click here to watch videos </span
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

    <section>
        <div class="container">
            <div class="gallery-heading p-10">
                <h2>Images</h2>
            </div>
        </div>
    </section>

    <section class="pt-100 pt-70">
        
        <div class="container">
            <div class="row">
              <?php 
              if(isset($gallery)){
                if($gallery == '0'){
                    echo 'No Images Available !';
                }else {           
                  foreach($gallery as $images){  ?>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="gallery gallery-item">
                        <div class="gallery__thumb  pos-rel">
                          <img  src="<?php echo $images->gallery_img;?>" alt="" />
                        </div>
                        <div class="gallery__content">
                          <a href="#" class="popup-image" >
                            <i class="fas fa-plus" onclick="openModal(); currentSlide(<?php echo $images->gallery_id;?>)"></i>
                          </a>
                          
                        </div>
                      </div>
                    </div> 
                  <?php
                  };
                };
              };
                ?>
            </div>
        </div>
    </section>

<div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content">

      <div class="row">
              <?php 
              if(isset($gallery)){
                if($gallery == '0'){
                    echo 'No Images Available !';
                }else {           
                  foreach($gallery as $images){  ?>
                    <div class="mySlides">
                      <img src="<?php echo $images->gallery_img;?>" style="width:100%">
                    </div> 
                  <?php
                  };
                };
              };
                ?>
            </div>  
   
    
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>


  </div>
</div>
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
                      <span></span>
                    </button>
                  </form>
                </div>
          </div>

          <div class="gallery-shape4">
              <img src="<?php echo base_url('/public/FrontEnd/Image/shape4.png') ?>" alt="Shape Image">
          </div>
          <div class="shape13">
              <img src="<?php echo base_url('/public/FrontEnd/Image/shape12.png') ?>" alt="Shape Image">
          </div>
          <div class="shape14">
              <img src="<?php echo base_url('/public/FrontEnd/Image/shape13.png') ?>" alt="Shape Image">
          </div>
          <div class="shape15">
              <img src="<?php echo base_url('/public/FrontEnd/Image/shape14.png') ?>" alt="Shape Image">
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
        $(document).on("click", '[data-toggle="lightbox"]', function(event) {
          event.preventDefault();
          $(this).ekkoLightbox();
        });
    </script>


    <script>
      function openModal() {
        document.getElementById("myModal").style.display = "block";
      }
      
      function closeModal() {
        document.getElementById("myModal").style.display = "none";
      }
      
      var slideIndex = 1;
      showSlides(slideIndex);
      
      function plusSlides(n) {
        showSlides(slideIndex += n);
      }
      
      function currentSlide(n) {
        showSlides(slideIndex = n);
      }
      
      function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        captionText.innerHTML = dots[slideIndex-1].alt;
      }
      </script>
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Your Demo - Alba Educations</title>
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/aboutUs_albaEducations.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/utility.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/style.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/aboutUs-facilitators.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/aboutUs_contact.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/studyMaterial_courses.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/studyMaterial_customizedWorkBook.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/studyMaterial_bookYourDemo.css'); ?>">
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
  
    <section class="bg-feeded margin-top-5">
        <div class="workbook-banner-section pad-top-bottom-60">
          <div class="container-fluid mar-left-right pad-left-right-15">
            <div class="row align-items-center">
              <div class="col-lg-5 col-md-12 p-15">
                <div class="workbook-banner-content">
                  <h1>Book Your Free 30 Minute Demo Here!</h1>
                  <p>
                    We provide the facility to book 30 minutes free demo. We at Alba educations aim to provide the best to every child. Our love for children is reflected in the entire model of Alba education. We want it to be a place of learning and development for each child.
                  </p>
                </div>
              </div>
              <div class="col-lg-7 col-md-12 p-15">
                <div class="workbook-banner-image">
                  <img src="<?php echo base_url('/public/FrontEnd/Image/kids1.png') ?>"
                    alt="Get Customized Fun WorkBook for your Child"
                  />
                  <div class="demo-banner-shape4">
                    <img src="<?php echo base_url('/public/FrontEnd/Image/k-shape7.png') ?>" alt="Shape Image" />
                  </div>
                  <div class="demo-banner-shape5">
                    <img src="<?php echo base_url('/public/FrontEnd/Image/k-shape9.png') ?>" alt="Shape Image" />
                  </div>
                  <div class="demo-banner-shape6">
                      <img src="<?php echo base_url('/public/FrontEnd/Image/kids-with-kite.png') ?>" alt="Shape Image">
                  </div>
                  <div class="demo-banner-shape7">
                    <img src="<?php echo base_url('/public/FrontEnd/Image/k-shape17.png') ?>" alt="Shape Image" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>

    <section>
        <div class="container">
          <div class="container-img">
            <img src="<?php echo base_url('/public/FrontEnd/Image/PngItem_2954854-150x150.png') ?>" alt="" />
          </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="demo-area p-10">
                <div class="demo-bookNow-wrapper">
                    <div class="demo-bookNow-area p-10">
                        <div class="demo-bookNow-area-row1">
                            <div class="demo-bookNow-row1-heading text-center">
                                <div class="row1-heading-title">
                                    <div class="row1-head-text">
                                        <strong>Book Your 30 Minute Demo For Free</strong>
                                    </div>
                                </div>
                                <div class="row1-sub-heading">
                                    <div class="row1-sub-heading-text">
                                        Enter the details here to book your demo session
                                    </div>
                                </div>
                            </div>
                            <div class="row1-image-section">
                                <img src="<?php echo base_url('/public/FrontEnd/Image/image.png') ?>" alt="Book your 30 minute free demo">
                            </div>
                        </div>
                        <div class="demo-bookNow-area-row2 pad-left-right-60">
                        <form class="form-layout" action="<?php echo base_url('book_your_demo'); ?>" method="post">
                                <?php
                                if (isset($reg_error)) {
                                ?>
                                    <div class="form-group text-light"><?php print_r($reg_error); ?></div>
                                    <br>
                                <?php
                                };
                                if (isset($message)) {
                                ?>
                                    <div class="form-group text-light mb-5"><?php print_r($message); ?></div>
                                    <br>
                                <?php
                                };
                              ?>
                              <div class="row main-form_main">
                                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xm-12 pe-sm-0">
                                    <input type="text" class="form-control" placeholder="Your Name">
                                  </div>
                                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xm-12">
                                    <input type="email" class="form-control" placeholder="Your Email">
                                  </div>
                                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xm-12 pe-sm-0">
                                    <input type="number" class="form-control" placeholder="Your Phone Number Here">
                                  </div>
                                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xm-12">
                                    <input type="text" class="form-control" placeholder="Grade">
                                    <datalist id="options">
                                      <option value="Pre K - K Grade">
                                      <option value="First Grade">
                                      <option value= "Second Grade" >
                                      <option value= "Third Grade" >
                                      <option value= "Fourth Grade" >
                                      <option value= "Fifth Grade" >
                                      <option value= "Sixth Grade" >
                                      <option value= "Seventh Grade" >
                                      <option value= "Eighth Grade" >
                                      <option value= " Ninth Grade" >
                                      <option value= "Tenth Grade" >
                                      <option value= "Eleventh Grade" >
                                      <option value= "Twelfth Grade" >
                                    </datalist>
                                  </div>
                                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xm-12 pe-sm-0">
                                    <input type="text" class="form-control" placeholder="Subject">
                                  </div>
                                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xm-12">
                                    <input type="text" class="form-control" placeholder="Your Topic">
                                  </div>
                                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xm-12 pe-sm-0">
                                    <input type="date" class="form-control"  name="date" placeholder="yyyy-mm-dd" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" onchange="this.setAttribute('empty', !this.value)">
                                  </div>
                                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xm-12">
                                    <input type="time" class="form-control" placeholder="Preferred Timing">
                                  </div>
                                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xm-12">
                                    <input type="text" class="form-control" placeholder="Your Time Zone">
                                  </div>
                                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xm-12 text-center my-sm-5">
                                  <input type="submit" class="form-button" value="Book Now">
                                </div>
                                </div>
                                
                           
                        </form>
                              </div>

                    </div>


                </div>
            
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
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Assignment/Homework Help - Alba Educations</title>
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/blog.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/aboutUs_albaEducations.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/utility.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/style.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/aboutUs-facilitators.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/aboutUs_contact.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/studyMaterial_courses.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/studyMaterial_customizedWorkBook.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/studyMaterial_studentRegistration.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/studyMaterial_tutorHiringProcess.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/parentSupport_parentCounselling.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/blog_isEduactionEverGoingToBeTheSameOnceThePandemicEnds.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/assignmentHelp.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/animations.css'); ?>" />
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
    <section>
        <div class="registration-title-area  pad-top-bottom-40 margin-top-5">
            <div class="container text-center">
                <div class="registration-title-content">
                    <h2 class="font-weight-black">
                        Assignment/Homework Help
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <section>
        <form action="<?php echo base_url('assignment_help_submittion'); ?>" method="post" enctype="multipart/form-data">
            <div class="container d-flex justify-content-center">
                <div class="row tutor-form bg-fe4a55  ">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                      <?php
                      if (isset($reg_error)) {
                      ?>
                          <div class="form-group text-light"><?php print_r($reg_error); ?></div>
                      <?php
                      };
                      if (isset($message)) {
                      ?>
                          <div class="form-group text-light"><?php print_r($message); ?></div>
                      <?php
                      };
                      ?>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="mb-3">
                                <label  class="form-label input-label">First Name</label>
                                <span class="astrick-required">*</span>
                                <input type="text" class="form-control input-input" name="first_name" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="mb-3">
                                <label  class="form-label input-label">Last Name</label>
                                <span class="astrick-required">*</span>
                                <input type="text" class="form-control input-input" name="last_name"  placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="mb-3">
                                <label  class="form-label input-label">Email </label>
                                <span class="astrick-required">*</span>
                                <input type="email" class="form-control input-input" name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="mb-3">
                                <label  class="form-label input-label">Phone </label>
                                <span class="astrick-required">*</span>
                                <input type="number" class="form-control input-input" name="phone" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="mb-3">
                                <label  class="form-label input-label">Enter Your Subject</label>
                                <span class="astrick-required">*</span>
                                <input type="text" class="form-control input-input"  name="subject" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="mb-3">
                                <label  class="form-label input-label">Enter Your Grade</label>
                                <span class="astrick-required">*</span>
                                <input type="text" class="form-control input-input" name="grade" placeholder=" Grade">
                                </div>
                            </div>
                            <div class="colcol-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="mb-3">
                                <label for="" class="form-label input-label">Select Your Assignment Type</label>
                                <ul class="radio-label ">
                                    <li>
                                      <input type="radio" name="assignment_type" value="1" class="form-radio-input " >
                                      <label for="" class="form-label">Projects</label>
                                    </li>
                                    <li>
                                    <input type="radio" class="form-radio-input" value="2" name="assignment_type">
                                    <label for="" class="form-label">Thesis</label>

                                    </li>
                                    <li>
                                    <input type="radio" class="form-radio-input" value="3" name="assignment_type">
                                    <label for="" class="form-label">Dissertation</label>

                                    </li>
                                    <li>
                                      <input type="radio" class="form-radio-input" value="4" name="assignment_type">
                                      <label for="" class="form-label">Essays</label>
                                    </li>
                                    <li>
                                    <input type="radio" class="form-radio-input " value="5" name="assignment_type">
                                    <label for="" class="form-label">Homeworks</label>
                                    </li>
                                </ul>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="mb-3">
                                <label  class="form-label input-label">Date</label>
                                <span class="astrick-required">*</span>
                                <input type="date" name="due_date" class="form-control input-input" >
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="mb-3">
                                <label  class="form-label input-label">Time</label>
                                <span class="astrick-required">*</span>
                                <input type="time" name="due_time" class="form-control input-input" >
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="mb-3">
                                <label  class="form-label input-label">Enter Your Budget Here</label>
                                <span class="astrick-required">*</span>
                                <input type="text" name="budget" class="form-control input-input" placeholder="Min amount - Max amount" >
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="mb-3">
                                <label  class="form-label input-label">Time Zone</label>
                                <span class="astrick-required">*</span>
                                <input type="text" name="time_zone" class="form-control input-input" >
                              </div>
                                </div>
                            <div class="colcol-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="mb-3">
                                <label for="" class="form-label input-label">Select Your Currency Type</label>
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <ul class="radio-label mb-0">
                                        <li>
                                        <input type="radio" name="currency_type" value="1" class="form-radio-input " >
                                        <label for="" class="form-label">US</label>
                    
                                        </li>
                                        <li>
                                        <input type="radio" name="currency_type" value="2" class="form-radio-input " >
                                        <label for="" class="form-label">GBP</label>
                    
                                        </li>
                                        <li>
                                        <input type="radio" name="currency_type" value="3" class="form-radio-input " >
                                        <label for="" class="form-label">SGD</label>
                    
                                        </li>
                                    </ul>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <ul class="radio-label mb-0">
                                        <li>
                                        <input type="radio" name="currency_type" value="4" class="form-radio-input " >
                                        <label for="" class="form-label">AUD</label>
                    
                                        </li>
                                        <li>
                                        <input type="radio" name="currency_type" value="5" class="form-radio-input " >
                                        <label for="" class="form-label">C / CAD</label>
                    
                                        </li>
                                        <li>
                                        <input type="radio" name="currency_type" value="6" class="form-radio-input " >
                                        <label for="" class="form-label">INR</label>
                    
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                                
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="mb-3">
                                <label  class="form-label input-label">File Upload</label>
                                <span class="astrick-required">*</span>
                                <input type="file" name="attached_file" class="form-control input-input"  >
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="mb-3">
                                <label  class="form-label input-label">Description about Assignment</label>
                                <textarea name="asignment_description" class="form-control input-input" id="" cols="30" rows="5" placeholder="Description about Assignment"></textarea>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pt-3 text-center">
                                <div class="mb-3">
                                <button type="submit" name="submit" class="button2">Submit</button>
                                </div>
                            </div>
                        
                    </div>
                </div>

                </div>
            </div>
        </form>
    </section>
      <section class="bg-FFE7E7" >            
        <div class="premium-access-area pad-top-bottom-100">
          <div class="container">
            <div class="premium-access-content">
              <span class="sub-title">Education for everyone</span>
              <h2>To Get Connect With Us!</h2>
              <p>Click Below Button to Get Connect with Alba Educations</p>
              <a href="<?php  echo base_url('assignmentHelp'); ?>" class="button"><i class="fas fa-book"></i>
                Click Here to Connect with us
              </a>
            </div>              
          </div>

          <div class="hiring-shape1">
            <img src="<?php echo base_url('/public/FrontEnd/Image/k-shape7.png') ?>" alt="Shape Image">
          </div>
          <div class="hiring-shape2">
            <img src="<?php echo base_url('/public/FrontEnd/Image/kids4.png') ?>" alt="Shape Image">
          </div>
          <div class="hiring-shape3">
            <img src="<?php echo base_url('/public/FrontEnd/Image/k-shape8.png') ?>" alt="Shape Image">
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

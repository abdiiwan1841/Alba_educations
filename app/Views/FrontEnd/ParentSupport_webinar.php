<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webinar - Alba Educations</title>
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/aboutUs_albaEducations.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/utility.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/style.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/aboutUs-facilitators.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/aboutUs_contact.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/studyMaterial_courses.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/studyMaterial_customizedWorkBook.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/parentSupport_webinar.css'); ?>">
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
    
    <section class="margin-top-5">
        <div class="registration-title-area  pad-top-bottom-40">
            <div class="container text-center">
                <div class="registration-title-content">
                    <h2 class="font-weight-black">
                        Webinar
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="webinar-content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 p-40">
                        <div class="mb-20">
                            <h2 class="font-weight-black">Join Our Webinar</h2>
                        </div>
                        <div class="mb-20">
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam sunt esse, minus quam velit recusandae libero voluptate quod voluptatibus. Vero accusamus possimus corrupti esse ad at aperiam quo sapiente non. Provident dolores nemo magnam obcaecati!
                            </p>
                        </div>
                        <button class="webinar-button">
                            Join Us on 14 July, 2021
                        </button>

                    </div>
                    <div class="col-lg-6 col-md-6 p-40">

                      <div class="webinar-content-right">
                        <p>Meeting does not exist: 77319164501.</p>
                      </div>



                    </div>
                </div>
            </div>

        </div>
    </section>

    
    <section >            
        <div class="premium-access-area pad-top-bottom-100">
          <div class="container">
            <div class="premium-access-content">
              <span class="sub-title">Education for everyone</span>
              <h2>Online Coaching Lessons For Remote Learning</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <a href="<?php  echo base_url('parentSupport_webinar'); ?>" class="button"><i class="fas fa-book"></i>
                Start for Free
              </a>
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
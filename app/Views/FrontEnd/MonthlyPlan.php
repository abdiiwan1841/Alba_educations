<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly-Plan - Alba Educations</title>
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/utility.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/responsive.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/studyMaterial_regularPlan.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/animations.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/studyMaterial_studentRegistration.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/assignmentHelp.css'); ?>">

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
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>
<body>
    <?php  include('public/FrontEnd/inc/header.php'); ?>
      <section class="section-top">
          <div class="container text-center">
              <div class="section-main-heading">
                  <h2>Monthly Plan</h2>
              </div>
              <div class="section-sub-heading">
                  <h5>
                      <strong>Enter Your Details to Buy Monthly Plan</strong>
                  </h5>
              </div>
              
          </div>
      </section>

      

      <section>
        <div class="container mt-5  d-flex justify-content-center">
          <div class="row plan-form bg-fe4a55  ">
              <form action="<?php echo base_url('/monthly_plan') ?>" method="post">
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
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="mb-3">
                                <label  class="form-label input-label">Child Name</label>
                                <span class="astrick-required">*</span>
                                <input type="text" class="form-control input-input" name="name" placeholder="Child Name">
                            </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="mb-3">
                                <label  class="form-label input-label">Parent Name</label>
                                <span class="astrick-required">*</span>
                                <input type="text" class="form-control input-input"  name="parentName" placeholder="Parent Name">
                            </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="mb-3">
                                <label  class="form-label input-label">Enter Your Email</label>
                                <span class="astrick-required">*</span>
                                <input type="email" class="form-control input-input" name="email"  placeholder="Email">
                            </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="mb-3">
                                <label  class="form-label input-label">Enter Your Phone Number</label>
                                <span class="astrick-required">*</span>
                                <input type="number" class="form-control input-input" name="phone" placeholder="Phone Number">
                            </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="mb-3">
                                <label  class="form-label input-label">Enter Your Grade</label>
                                <span class="astrick-required">*</span>
                                <input type="text" class="form-control input-input" name="grade"  placeholder="Grade">
                            </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="mb-3">
                                <label  class="form-label input-label">Enter Your Subject</label>
                                <span class="astrick-required">*</span>
                                <input type="text" class="form-control input-input" name="subject" placeholder="Subject">
                            </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="mb-3">
                                <label  class="form-label input-label">Enter Your Topic </label>
                                <span class="astrick-required">*</span>
                                <input type="text" class="form-control input-input" name="topic" placeholder="Topic">
                            </div>
                            </div>
                            <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="mb-3">
                                <label  class="form-label input-label">Enter the number of Workbooks </label>
                                <span class="astrick-required">*</span>
                                <input type="number" class="form-control input-input" id="amount1" name="num_workbooks" placeholder="Number Of Workbooks">
                            </div>
                            </div> -->
                            <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="mb-3">
                                <label  class="form-label input-label">Payable Amount (in RS)</label>
                                <span class="astrick-required">*</span>
                                <input type="number" class="form-control input-input" onclick="amtCal()" name="amount" readonly id="amount2" >
                            </div>
                            </div> -->
                            
                            
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pt-3 text-center">
                            <div class="mb-3">
                                <button type="submit" class="button2">Buy Now</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </form>
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
      <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN"
        crossorigin="anonymous"
      ></script>
      <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
        integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/"
        crossorigin="anonymous"
      ></script>
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
        <script>
          function amtCal() {
          var totalAmt = document.getElementById("amount2");
          var inputAmt = parseInt(document.getElementById("amount1").value, 10);
          document.getElementById("amount1").value = inputAmt;
          document.getElementById("amount2").value = inputAmt * 20;
        }
        </script>
</body>
</html>
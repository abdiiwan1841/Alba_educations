<!-- forms responses -->
<?php
  if (isset($reg_error)) {
  ?>
      <div class="form-group text-danger"><?php print_r($reg_error); ?></div>
  <?php
  exit();
  };
  if (isset($message)) {
  ?>
      <div class="form-group text-success"><?php print_r($message); ?></div>
  <?php
  exit();
  };
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alba Education - Online Tutorials</title>
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/style.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/utility.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/responsive.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/animations.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('/public/FrontEnd/Css/odometer-theme-minimal.css') ?>">
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
    <?php include('public/FrontEnd/inc/header.php'); ?>


<!--Subcription Pop Up-->
    <div id="popUpBox" class="popUp_Box ">
      <div class="popUp_wrap">
        <div class="container ">
          <section class="popUp_wrapper animate__animated animate__zoomIn">
            <div class="row align-items-center bg-ffa3a8 position-relative rounded">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="popUp_crossBtn text-white" onclick="popCut()">
                  <i class="fas fa-times"></i>
                </div>
              </div>
              <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 p-0">
                <div class="popUp_left rounded-left">
                  <div class="popUp_image">
                    <img src="<?php echo base_url('/public/FrontEnd/Image/image.png')?>" class="img-fluid" alt="Subscribe to our Letter">
                  </div>
                  <div class="popUp_content">
                    <h1>Get Upcoming Events Details</h1>
                    <p>Want to get details of Upcoming Events ? <br> Click Here to Subscribe</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 p-0">
                <div class="popUp_right">
                  <form action="<?php echo base_url('/subscribe_updates') ?>" method="post">
                    <div class="row">
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Enter your name">
                      </div>
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Enter your Email" required>
                      </div>
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                        <input type="number" class="form-control" name="number" placeholder="Enter your number" required>
                      </div>
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3 text-white">
                        <label><input type="checkbox" class="me-1" name="terms" value="value">I accept <a href="#">the terms</a>  and <a href="#">the privacy policy</a></label>
                      </div>
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <input type="submit" class="popUp_btn" value="Subscibe Now">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
    
    
    <section>
      <div class="widget-container">
        <div class="main-banner">
          <div class="container-fluid pad-left-right-40">
            <div class="row">
              <div class="col-lg-6 col-md-12">
                <div class="banner-content">
                  <div class="image">
                    <img
                      src="<?php echo base_url('/public/FrontEnd/Image/bird1.png') ?>"
                      alt="Bringing Acadamy to your Home"
                    />
                  </div>
                  <h1>
                    Bringing Acadamy <br/> to Your Home
                    <br />
                  </h1>
                  <p>
                    Welcome to digital learning online classes for students. We
                    are providing classes for grade Pre K-12, College &
                    University level Exam preparations. To connect with us and
                    book your demo session click on below link.
                  </p>
                  <a href="<?php echo base_url('/studyMaterial_bookYourDemo') ?>" class="button-two">
                    <i class="far fa-calendar"></i>Book Your Demo Now
                    <span></span>
                  </a>

                  <div class="circle-shape">
                    <img src="<?php echo base_url('/public/FrontEnd/Image/circle.png')?>" alt="Shape Image" />
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-12">
                <div class="banner-image">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <div class="image bannerImage1">
                        <img src="<?php echo base_url('/public/FrontEnd/Image/kids1.png') ?>"
                          alt="Bringing Acadamy to Your Home"
                        />
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <div class="image bannerImage2">
                        <img
                          src="<?php echo base_url('/public/FrontEnd/Image/PngItem_503107.png') ?>"
                          alt="Bringing Acadamy to Your Home"
                        />
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <div class="image bannerImage3">
                        <img
                          src="<?php echo base_url('/public/FrontEnd/Image/kids3.png') ?>"
                          alt="Bringing Acadamy to Your Home"
                        />
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <div class="image bannerImage4">
                        <img
                          class="mt-4"
                          src="<?php echo base_url('/public/FrontEnd/Image/kids4.png') ?>"
                          alt="Bringing Acadamy to Your Home"
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="shape1">
            <img src="<?php echo base_url('/public/FrontEnd/Image/k-shape1.png')?>" alt="Shape Image" />
          </div>
          <div class="shape2">
            <img src="<?php echo base_url('/public/FrontEnd/Image/k-shape2.png')?>" alt="Shape Image" />
          </div>
          <div class="shape3 animate__animated ">
            <img src="<?php echo base_url('/public/FrontEnd/Image/k-shape3.png')?>" alt="Shape Image" />
          </div>
          <div class="shape4">
            <img src="<?php echo base_url('/public/FrontEnd/Image/k-shape4.png')?>" alt="Shape Image" />
          </div>
          <div class="shape5">
            <img src="<?php echo base_url('/public/FrontEnd/Image/k-shape5.png')?>" alt="Shape Image" />
          </div>
          <div class="shape1">
            <img src="<?php echo base_url('/public/FrontEnd/Image/k-shape6.png')?>" alt="Shape Image" />
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="about-area pad-top-bottom-100">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
              <div class="about-image">
                <div class="main-image">
                  <img
                    src="<?php echo base_url('/public/FrontEnd/Image/kindergarten-about-img1.png') ?>"
                    alt="About Us"
                  />
                  <img
                    src="<?php echo base_url('/public/FrontEnd/Image/kindergarten-about-img2.png') ?>"
                    alt="About Us"
                  />
                </div>
                <div class="shape">
                  <img src="<?php echo base_url('/public/FrontEnd/Image/kite1.png')?>" alt="About Us" />
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="about-content">
                <span class="sub-title">ABOUT US</span>
                <h2 class="font-weight-black">
                  We Are AlbaEducations and we bring an Academy to your Home
                </h2>
                <div>
                  <p>
                    Alba Educations was created with one critical aim to add
                    value to the existing education system &amp; become the
                    world's most trusted online education brand. Alba
                    consolidates to the point that,<b>
                      ” We will do all we can to ensure you and your child get
                      the education that leads to success in school and in
                      life!”</b
                    >Our approach enables us to recognize the unique learning
                    style of the student as well as skill sets ( Cognitive,
                    Physical &amp; Emotional ) or lack of them which are needed
                    by the child to learn anything..
                  </p>
                </div>
                <ul class="about-list">
                  <li>
                    <span>
                      <i class="fas fa-phone"></i>
                      24*7
                    </span>
                  </li>
                  <li>
                    <span>
                      <i class="fas fa-gift"></i>
                      30 minute Free Demo
                    </span>
                  </li>
                  <li>
                    <span>
                      <i class="fas fa-users"></i>
                      Best Faculty
                    </span>
                  </li>
                  <li>
                    <span>
                      <i class="fas fa-cogs"></i>
                      Monitoring, Auditing and Recording of all sessions
                    </span>
                  </li>
                </ul>
                <a href="<?php echo base_url('/aboutUs_albaEducations') ?>" class="button-two"
                  ><i class="far fa-user"></i>More About Us <span></span
                ></a>
              </div>
            </div>
          </div>
        </div>
        <div class="shape7">
          <img src="<?php echo base_url('/public/FrontEnd/Image/k-shape7.png')?>" alt="Shape Image" />
        </div>
        <div class="about-area-shape8">
          <img src="<?php echo base_url('/public/FrontEnd/Image/k-shape8.png')?>" alt="Shape Image" />
        </div>
      </div>
    </section>

    <section>
      <div id="odometer_section" class="funfacts-area">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6">
              <div class="funfacts-item">
                <h3>
                  <span id="odometer1" class="odometer">0</span>
                  <p>1 ON 1 Online tutoring</p>
                </h3>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
              <div class="funfacts-item">
                <h3>
                  <span id="odometer2" class="odometer">0</span>
                  <p>Present in countries</p>
                </h3>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
              <div class="funfacts-item">
                <h3>
                  <span id="odometer3" class="odometer">0</span>
                  <p>topic covered</p>
                </h3>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
              <div class="funfacts-item">
                <h3>
                  <span id="odometer4" class="odometer">0</span>
                  <p>Live sessions delivered</p>
                </h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="course-area pt-100 pb-70">
        <div class="overlay">
          <div class="container">
            <div class="widget-wrap">
              <div class="widget-container">
                <div class="section-title">
                  <span class="sub-title">Learn At Your Own Pace</span>
                  <h2>Our Popular Courses</h2>
                  <p>
                    Explore all of our courses and pick your suitable ones to
                    enroll and start learning with us! We ensure that you will
                    never regret it!
                  </p>
                </div>
              </div>
            </div>
            <section class="resp-center">
              <div class="row">
                <div class="col-lg-2 p-15">
                  <div class="feature-card">
                    <div class="single-box first-box-bg">
                      <div class="content first-box">
                        <h3>U.S.A Curriculum</h3>
                        <p>
                          Pre k - 12
                          <br />
                          College
                          <br />
                          University
                          <br />
                          Text Prep
                          <br />
                        </p>
                      </div>
                    </div>
                  </div>
                  <a href="https://api.whatsapp.com/send?phone=918360806559&amp;text=Hi there! I have a question :)" class="box-button" role="button">
                    Click here to Get Curriculum</a
                  >
                </div>
                <div class="col-lg-2 p-15">
                  <div class="feature-card">
                    <div class="single-box second-box-bg">
                      <div class="content second-box">
                        <h3>Canada Curriculum</h3>
                        <p>
                          Pre k - 12
                          <br />
                          College
                          <br />
                          University
                          <br />
                          Text Prep
                          <br />
                        </p>
                      </div>
                    </div>
                  </div>
                  <a href="https://api.whatsapp.com/send?phone=918360806559&amp;text=Hi there! I have a question :)" class="box-button" role="button">
                    Click here to Get Curriculum</a
                  >
                </div>
                <div class="col-lg-2 p-15">
                  <div class="feature-card">
                    <div class="single-box third-box-bg">
                      <div class="content third-box">
                        <h3>U.K Curriculum</h3>
                        <p>
                          Pre k - 12
                          <br />
                          College
                          <br />
                          University
                          <br />
                          Text Prep
                          <br />
                        </p>
                      </div>
                    </div>
                  </div>
                  <a href="https://api.whatsapp.com/send?phone=918360806559&amp;text=Hi there! I have a question :)" class="box-button" role="button">
                    Click here to Get Curriculum</a
                  >
                </div>
                <div class="col-lg-2 p-15">
                  <div class="feature-card">
                    <div class="single-box forth-box-bg">
                      <div class="content forth-box">
                        <h3>Australia Curriculum</h3>
                        <p>
                          Pre k - 12
                          <br />
                          College
                          <br />
                          University
                          <br />
                          Text Prep
                          <br />
                        </p>
                      </div>
                    </div>
                  </div>
                  <a href="https://api.whatsapp.com/send?phone=918360806559&amp;text=Hi there! I have a question :)" class="box-button" role="button">
                    Click here to Get Curriculum</a
                  >
                </div>
                <div class="col-lg-2 p-15">
                  <div class="feature-card">
                    <div class="single-box fifth-box-bg">
                      <div class="content fifth-box">
                        <h3>Singapore Curriculum</h3>
                        <p>
                          Pre k - 12
                          <br />
                          College
                          <br />
                          University
                          <br />
                          Text Prep
                          <br />
                        </p>
                      </div>
                    </div>
                  </div>
                  <a href="https://api.whatsapp.com/send?phone=918360806559&amp;text=Hi there! I have a question :)" class="box-button" role="button">
                    Click here to Get Curriculum</a
                  >
                </div>
                <div class="col-lg-2 p-15">
                  <div class="feature-card">
                    <div class="single-box sixth-box-bg">
                      <div class="content sixth-box">
                        <h3>India Curriculum</h3>
                        <p>
                          Pre k - 12
                          <br />
                          College
                          <br />
                          University
                          <br />
                          Text Prep
                          <br />
                        </p>
                      </div>
                    </div>
                  </div>
                  <a href="https://api.whatsapp.com/send?phone=918360806559&amp;text=Hi there! I have a question :)" class="box-button" role="button">
                    Click here to Get Curriculum</a
                  >
                </div>
              </div>
            </section>
            <div class="section-button">
              <a href="<?php echo base_url('/studyMaterial_courses') ?>" class="box-button2" role="button">
                Click here to Know More about Courses</a
              >
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="bg-eee8df bg-overlay">
      <div class="event-area bg-shape ">
        
          <div class="container">
            <div class="heading-wrapper">
              <div class="section-title">
                <span class="sub-title">How it Works</span>
                <h2>Get Your Lesson</h2>
                <p>Follow the below steps</p>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-md-6">
                <div class="event-box">
                  <div class="event-content">
                    <h3>1. BOOK A DEMO CLASS</h3>
                    <P>
                      Simply book a demo class and we will reach out to our hundreds of talented educators by subject and grade level to find the perfect match for you to deliver a half an hour online class to you.
                    </P>
                    <a href="<?php echo base_url('/studyMaterial_bookYourDemo') ?>" class="button"> Book Now</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="event-box">
                  <div class="event-content">
                    <h3>2. PAY FEES</h3>
                    <P>
                     After demo class you can pay fees to book class.
                    </P>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="event-box">
                  <div class="event-content">
                    <h3>3. Enter The Classroom</h3>
                    <P>
                      Experience personalized education inside our innovative online classroom that is designed to facilitate learning for today’s digital generation.
                    </P>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="event-box">
                  <div class="event-content">
                    <h3>4. See Your Progress</h3>
                    <P>
                      Review personalized feedback and study tips after each session to see what areas you need to focus on.
                    </P>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="event-box">
                  <div class="event-content">
                    <h3>5. Succeed</h3>
                    <P>Watch your grades improve! There is no shortcut to academic success, but personalized learning with our professional teachers gives you the advantage to reach your learning goals.
                    </P>
                  </div>
                </div>
              </div>
            </div>

          </div>
        

      </div>
    </section>

    <section class="pt-100 pb-70 bg-overlay2">
      <div class="education">
        <div class="container">
          <div class="widget-wrap">
            <div class="widget-container">
              <div class="section-title">
                <span class="sub-title">GO AT YOUR OWN PACE</span>
                <h2>We Provide Education</h2>
                <p>
                  Explore all of our courses and pick your suitable ones to enroll and start learning with us! We ensure that you will never regret it!
                </p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-3 p-15">
              <div class="feature-card">
                <div class="single-box">
                  <div class="image">
                    <img src="<?php echo base_url('/public/FrontEnd/Image/kf-img1.png')?>" alt="">
                  </div>
                  <div class="content first-box">
                    <h3>Elementary School</h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 p-15">
              <div class="feature-card">
                <div class="single-box">
                  <div class="image">
                    <img src="<?php echo base_url('/public/FrontEnd/Image/kf-img2.png')?>" alt="">
                  </div>
                  <div class="content third-box">
                    <h3>Primary School</h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 p-15">
              <div class="feature-card">
                <div class="single-box">
                  <div class="image">
                    <img src="<?php echo base_url('/public/FrontEnd/Image/about-img2.png')?>" alt="">
                  </div>
                  <div class="content fifth-box">
                    <h3>High School</h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 p-15">
              <div class="feature-card">
                <div class="single-box">
                  <div class="image">
                    <img src="<?php echo base_url('/public/FrontEnd/Image/about-img4.png')?>" alt="">
                  </div>
                  <div class="content sixth-box">
                    <h3>College and University</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>


    <section class="bg-feeded">
      <div class="workshop-area">
        <div class="premium-access-area pad-top-bottom-100">
          <div class="container">
            <div class="premium-access-content">
              <span class="sub-title">Education for everyone</span>
              <h2>Get your Customized Workbook</h2>
              <p>Click here and fill the form to get your customized workbook</p>
              <a href="<?php  echo base_url('studyMaterial_customizedWorkBook'); ?>" class="button"><i class="fas fa-book"></i>
                Click Here to Get Your Customized Workbook
              </a>
            </div>
            <div class="shape3">
              <img src="<?php echo base_url('/public/FrontEnd/Image/k-shape8.png')?>" alt="Shape Image">
            </div>
            <div class="shape4">
              <img src="<?php echo base_url('/public/FrontEnd/Image/kids-with-kite.png')?>" alt="Shape Image">
            </div>
            <div class="shape8">
              <img src="<?php echo base_url('/public/FrontEnd/Image/k-shape10.png')?>" alt="Shape Image">
            </div>
          </div>
        </div>

      </div>
    </div>
    </section>

    <section>
      <div class="blog-area pt-100 pb-70">
        <div class="container">
          <div class="section-title">
            <span class="sub-title">Our News</span>
            <h2>Check Out Our Latest Blog</h2>
            <p>We always give extra care to our student's skills improvements and feel excited to share our latest research and leanings!</p>
          </div>
        </div>

      </div>
    </section>

    <section>
      <div class="subscribe-area pad-top-bottom-70 bg-eee8df">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 pad-left-right-15">
              <div class="subscribe-image">
                <img src="<?php echo base_url('/public/FrontEnd/Image/subscribe-img3.png')?>" alt="Subscribe to our Letter">
              </div>

            </div>
            <div class="col-lg-6 col-md-12 pad-left-right-15">
              <div class="subscribe-content text-left">
                <span class="sub-title"></span>
                <h2 class="font-weight-black">Subscribe to Our Newsletter</h2>
                <p>Enter your email address to get the lates update and all other information.</p>
                <form action="<?php echo base_url('subscribe_newsletter'); ?>" class="newsletter-form" method="post">
                  <input type="email" class="input-newsletter" placeholder="Enter your email address" name="user_email" autocomplete="off">
                  <button class="button">
                    <i class="far fa-user"></i> Subscribe Now
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="shape19">
          <img src="<?php echo base_url('/public/FrontEnd/Image/k-shape19.png')?>" alt="Shape Image">
        </div>
        <div class="shape20">
          <img src="<?php echo base_url('/public/FrontEnd/Image/k-shape20.png')?>" alt="Shape Image">
        </div>

      </div>
    </section>


    <div class="go-top ">
      <i class="fas fa-chevron-up"></i>
  </div>
  

    <div class="social-link-list-box-container " >
      <ul class="social-link-list-box">
        <li class="link-btn1">
          <p>
            <a href="tel:+918360806559" target="_blank"><span class="fas fa-phone-square"></span> Call Now</a>
          </p>
        </li>
        <li  class="link-btn2">
          <p>
            <a href=""><span class="fab fa-twitter-square"></span> Twitter</a>
          </p>
        </li>
        <li class="link-btn3" >
          <p>
            <a href="https://www.instagram.com/invites/contact/?i=1axphmlss4ant&utm_content=13tpxto" target="_blank"><span class="fab fa-instagram"></span> Instagram</a>
          </p>
        </li>
        <li class="link-btn4" >
          <p>
            <a href="https://www.facebook.com/albaeducations00/" target="_blank"><span class="fab fa-facebook"></span> Facebook</a>
          </p>
        </li>
        <li  class="link-btn5">
          <p>
            <a href=" https://wa.me/+918360806559"><span class="fab fa-whatsapp"></span> Whatapp</a>
          </p>
        </li>
      </ul>
    </div>

    <div class="container">

      <div class="cursor1"></div>
      <div class="cursor2"></div>
    </div>
<?php  include('public/FrontEnd/inc/footer.php'); ?>
    
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
    ></script>
    <script src="<?php echo base_url('/public/FrontEnd/Js/odometer.min.js') ?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
      const button = document.querySelector(".button");
      button.onmousemove = function (e) {
        const x = e.pageX - button.offsetLeft;
        const y = e.pageY - button.offsetTop;
        button.style.setProperty("--x", x + "px");
        button.style.setProperty("--y", y + "px");
      };
    // subscription
    $(document).ready(function(){
        setTimeout(function(){
          var popUP = document.getElementById('popUpBox')
          popUP.style.display = "block"
        },1300);  
      });
      function popCut(){
        var popUpBox = document.getElementById('popUpBox');
        popUpBox.style.display='none'
      }
    

    </script>
     <script>
     
        var $findme = $('#odometer_section');
        var exec = false;
        function Scrolled() {
          $findme.each(function() {
            var $section = $(this),
              findmeOffset = $section.offset(),
              findmeTop = findmeOffset.top,
              findmeBottom = $section.height() + findmeTop,
              scrollTop = $(document).scrollTop(),
              visibleBottom = window.innerHeight,
              prevVisible = $section.prop('_visible');
        
            if ((findmeTop > scrollTop + visibleBottom) ||
              findmeBottom < scrollTop) {
              visible = false;
            } else visible = true;
        
            if (!prevVisible && visible) {
            	if(!exec){
                //   $('#odometer1').html(1)
                //   $('#odometer2').html(25)
                //   $('#odometer3').html(340)
                //   $('#odometer4').html(8000)
                //   setTimeout(function(){
                    odometer1.innerHTML = 1;
                    odometer2.innerHTML = 25;
                    odometer3.innerHTML = 340;
                    odometer4.innerHTML = 8000;
                //   })
              }
            }
            $section.prop('_visible', visible);
          });
        
        }
        
        function Setup() {
          var $top = $('#top'),
            $bottom = $('#bottom');
        
          $top.height(500);
          $bottom.height(500);
        
          $(window).scroll(function() {
            Scrolled();
          });
        }
        $(document).ready(function() {
          Setup();
        });

     
     
     
     
     
    //   const targetElement = document.querySelector('#odometer_section');
    //   let isCounting = false;
    //   let inv;

    //   const isVisible = function (elem) {
    //       var bounding = elem.getBoundingClientRect();
    //       return (
    //           bounding.top >= 0 &&
    //           bounding.left >= 0 &&
    //           bounding.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
    //           bounding.right <= (window.innerWidth || document.documentElement.clientWidth)
    //       );
    //   };

    //   function startCounter(){
    //       $('#odometer1').html(0)
    //       $('#odometer2').html(0)
    //       $('#odometer3').html(0)
    //       $('#odometer4').html(0)
    //       setTimeout(function(){
    //         odometer1.innerHTML = 10;
    //         odometer2.innerHTML = 25;
    //         odometer3.innerHTML = 250;
    //         odometer4.innerHTML = 2000;
    //       })

    //   }

    //   function stopCounter(){

    //       clearInterval(inv);
    //       isCounting = false;
          
    //   }

    //   document.addEventListener('scroll', function(e) {
    //       const visible = isVisible( targetElement );
    //       if( visible && !isCounting ){
    //           startCounter();
    //       }else if( !visible && isCounting ){
    //           stopCounter();
    //       }
    //   });
    
    
    
    
    
    // $('#odometer2').html(1)
    //   $('#odometer3').html(1)
    //   $('#odometer4').html(1)
    //   setTimeout(function(){
    //     odometer1.innerHTML = 10;
    //     odometer2.innerHTML = 25;
    //     odometer3.innerHTML = 250;
    //     odometer4.innerHTML = 2000;
    //   })
    
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

    //   $(document).ready(function() {
    //     var counters = $(".count");
    //     var countersQuantity = counters.length;
    //     var counter = [];
    //     for (i = 0; i < countersQuantity; i++) {
    //       counter[i] = parseInt(counters[i].innerHTML);
    //     }
        
    //     var count = function(start, value, id) {
    //       var localStart = start;
    //       setInterval(function() {
    //         if (localStart < value) {
    //           localStart++;
    //           counters[id].innerHTML = localStart;
    //         }
    //       }, 20);
    //     }
        
    //     for (j = 0; j < countersQuantity; j++) {
    //       count(0, counter[j], j);
    //     }
    //     });

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
  
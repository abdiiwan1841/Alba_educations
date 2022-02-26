<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Attendence - Alba Education</title>
    <link rel="stylesheet" href="<?php echo base_url('/public/Admin/css/style.css')?>" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
  </head>
  <body>
    <?php include('public/Students/inc/topbar.php') ?>  
    <main>
      <div class="container-fluid mt-5">
        <div class="row">
         <?php include('public/Students/inc/nav.php') ?>   

          <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12">
            <section class="mainContent mt-5">
              <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                  <div class="contentHeading mt-5">
                    <h2>Hi, <?php if (session()->has('STUDENT')) {
                      echo session('STUDENT_NAME');
                    };  ?></h2>
                    <p>Ready to start your day with Alba Educations?</p>

                    <div class="headerImage">
                      <img src="<?php echo base_url('/public/Admin//images/image5.png') ?>" class="img-fluid" alt="" />
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12"></div>
              </div>
              <div class="row m-5">
                <div class="col-xl-11 col-lg-11 col-md-11 col-sm-12 pe-5">
                  <div class="contentHeading2">
                    <h2>Attendence</h2>
                  </div>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col"></th>                         
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Topic covered (this session)</th>
                        <th scope="col">Topic to be covered (Next session)</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      
                          <?php
                            echo '<pre>'; $i = 1;
                            foreach ($sessions_history as $session_history) {
                                ?>
                                <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $session_history->for_date; ?></td>
                                <td>
                                  <?php  
                                  if ($session_history->sessionStatus == '1') {
                                    echo 'Present';
                                  }elseif ($session_history->sessionStatus == '2') {
                                    echo 'Absent';
                                  }elseif ($session_history->sessionStatus == '2') {
                                    echo 'NULL & VOID';
                                  }else{
                                    echo 'NA';
                                  }
                                  ?>
                                </td>
                                <td><?php echo $session_history->title; ?></td>
                                <td class="removeBtn" > 
                                  <a href="#" >
                                    <span class="badge bg-danger"><i class="fas fa-times"></i></span>
                                  </a>
                                </td>
                                </tr>
                                <?php 
                                $i++;
                            }
                            echo '</pre>';
                          
                          ?>
                        
                      
                    </tbody>
                  </table>

                  <div class="dash-shapeBox3">
                    <div class="dash-shape3">
                      <img src="<?php echo base_url('/public/Admin/images/k-shape20.png') ?>" alt="Shape Image">
                    </div>
                    <div class="dash-shape4">
                      <img src="<?php echo base_url('/public/Admin/images/k-shape19.png') ?>" alt="Shape Image">
                    </div>
                  </div>
                </div>
                <!--<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">-->
                <!--  <h4 class="mt-3 mb-4">Today, 03 November</h4>-->
                <!--  <ul class="nav flex-nowrap overflow-auto nav-pills mb-3" id="pills-tab" role="tablist">-->
                <!--    <li class="nav-item" role="presentation">-->
                <!--      <div class="nav-link active color-Main"-->
                <!--        id="pills-home-tab"-->
                <!--        data-bs-toggle="pill"-->
                <!--        data-bs-target="#pills-home"-->
                <!--        type="button"-->
                <!--        role="tab"-->
                <!--        aria-controls="pills-home"-->
                <!--        aria-selected="true">-->
                <!--        <h4>03</h4>-->
                <!--        <span>Mon</span>-->
                <!--      </div>-->
                <!--    </li>-->
                <!--    <li class="nav-item" role="presentation">-->
                <!--      <div-->
                <!--        class="nav-link color-Main"-->
                <!--        id="pills-profile-tab"-->
                <!--        data-bs-toggle="pill"-->
                <!--        data-bs-target="#pills-profile"-->
                <!--        type="button"-->
                <!--        role="tab"-->
                <!--        aria-controls="pills-profile"-->
                <!--        aria-selected="false"-->
                <!--      >-->
                <!--        <h4>03</h4>-->
                <!--        <span>Mon</span>-->
                <!--      </div>-->
                <!--    </li>-->
                <!--    <li class="nav-item" role="presentation">-->
                <!--      <div-->
                <!--        class="nav-link color-Main"-->
                <!--        id="pills-contact-tab"-->
                <!--        data-bs-toggle="pill"-->
                <!--        data-bs-target="#pills-contact"-->
                <!--        type="button"-->
                <!--        role="tab"-->
                <!--        aria-controls="pills-contact"-->
                <!--        aria-selected="false"-->
                <!--      >-->
                <!--        <h4>03</h4>-->
                <!--        <span>Mon</span>-->
                <!--      </div>-->
                <!--    </li>-->
                <!--    <li class="nav-item" role="presentation">-->
                <!--      <div-->
                <!--        class="nav-link color-Main"-->
                <!--        id="pills-contact-tab"-->
                <!--        data-bs-toggle="pill"-->
                <!--        data-bs-target="#pills-contact"-->
                <!--        type="button"-->
                <!--        role="tab"-->
                <!--        aria-controls="pills-contact"-->
                <!--        aria-selected="false"-->
                <!--      >-->
                <!--        <h4>03</h4>-->
                <!--        <span>Mon</span>-->
                <!--      </div>-->
                <!--    </li>-->
                <!--    <li class="nav-item" role="presentation">-->
                <!--      <div-->
                <!--        class="nav-link color-Main"-->
                <!--        id="pills-contact-tab"-->
                <!--        data-bs-toggle="pill"-->
                <!--        data-bs-target="#pills-contact"-->
                <!--        type="button"-->
                <!--        role="tab"-->
                <!--        aria-controls="pills-contact"-->
                <!--        aria-selected="false"-->
                <!--      >-->
                <!--        <h4>03</h4>-->
                <!--        <span>Mon</span>-->
                <!--      </div>-->
                <!--    </li>-->
                <!--    <li class="nav-item" role="presentation">-->
                <!--      <div-->
                <!--        class="nav-link color-Main"-->
                <!--        id="pills-contact-tab"-->
                <!--        data-bs-toggle="pill"-->
                <!--        data-bs-target="#pills-contact"-->
                <!--        type="button"-->
                <!--        role="tab"-->
                <!--        aria-controls="pills-contact"-->
                <!--        aria-selected="false"-->
                <!--      >-->
                <!--        <h4>03</h4>-->
                <!--        <span>Mon</span>-->
                <!--      </div>-->
                <!--    </li>-->

                <!--  </ul>-->
                <!--  <div class="tab-content" id="pills-tabContent">-->
                <!--    <div-->
                <!--      class="tab-pane fade show active"-->
                <!--      id="pills-home"-->
                <!--      role="tabpanel"-->
                <!--      aria-labelledby="pills-home-tab"-->
                <!--    >-->
                <!--      <div class="row overflow-auto" style="height: 23rem">-->
                <!--        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">-->
                <!--          <div class="row">-->
                <!--            <div-->
                <!--              class="-->
                <!--                col-xl-3 col-lg-3 col-md-3 col-sm-12-->
                <!--                d-flex-->
                <!--                align-items-center-->
                <!--                justify-content-center-->
                <!--              "-->
                <!--            >-->
                <!--              <span>09 AM</span>-->
                <!--            </div>-->
                <!--            <div-->
                <!--              class="-->
                <!--                col-xl-9 col-lg-9 col-md-9 col-sm-12-->
                <!--                p-0-->
                <!--                calenderList-->
                <!--              "-->
                <!--            >-->
                <!--              <ul class="p-0">-->
                <!--                <li>-->
                <!--                  <div-->
                <!--                    class="-->
                <!--                      d-flex-->
                <!--                      align-items-center-->
                <!--                      p-2-->
                <!--                      calenderTimeContent-->
                <!--                    "-->
                <!--                  >-->
                <!--                    <a href="#" class="me-3">-->
                <!--                      <i class="fas fa-video"></i>-->
                <!--                    </a>-->
                <!--                    <div class="p-0">-->
                <!--                      <strong> Client Meeting</strong>-->
                <!--                      <div class="pe-3">-->
                <!--                        Design club client meeting review the-->
                <!--                        final design-->
                <!--                      </div>-->
                <!--                    </div>-->
                <!--                  </div>-->
                <!--                </li>-->
                <!--              </ul>-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="row">-->
                <!--            <div-->
                <!--              class="-->
                <!--                col-xl-3 col-lg-3 col-md-3 col-sm-12-->
                <!--                d-flex-->
                <!--                align-items-center-->
                <!--                justify-content-center-->
                <!--              "-->
                <!--            >-->
                <!--              <span>09 AM</span>-->
                <!--            </div>-->
                <!--            <div-->
                <!--              class="-->
                <!--                col-xl-9 col-lg-9 col-md-9 col-sm-12-->
                <!--                p-0-->
                <!--                calenderList-->
                <!--              "-->
                <!--            >-->
                <!--              <ul class="p-0">-->
                <!--                <li>-->
                <!--                  <div-->
                <!--                    class="-->
                <!--                      d-flex-->
                <!--                      align-items-center-->
                <!--                      p-2-->
                <!--                      calenderTimeContent-->
                <!--                    "-->
                <!--                  >-->
                <!--                    <a href="#" class="me-3">-->
                <!--                      <i class="fas fa-video"></i>-->
                <!--                    </a>-->
                <!--                    <div class="p-0">-->
                <!--                      <strong> Client Meeting</strong>-->
                <!--                      <div class="pe-3">-->
                <!--                        Design club client meeting review the-->
                <!--                        final design-->
                <!--                      </div>-->
                <!--                    </div>-->
                <!--                  </div>-->
                <!--                </li>-->
                <!--              </ul>-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="row">-->
                <!--            <div-->
                <!--              class="-->
                <!--                col-xl-3 col-lg-3 col-md-3 col-sm-12-->
                <!--                d-flex-->
                <!--                align-items-center-->
                <!--                justify-content-center-->
                <!--              "-->
                <!--            >-->
                <!--              <span>09 AM</span>-->
                <!--            </div>-->
                <!--            <div-->
                <!--              class="-->
                <!--                col-xl-9 col-lg-9 col-md-9 col-sm-12-->
                <!--                p-0-->
                <!--                calenderList-->
                <!--              "-->
                <!--            >-->
                <!--              <ul class="p-0">-->
                <!--                <li>-->
                <!--                  <div-->
                <!--                    class="-->
                <!--                      d-flex-->
                <!--                      align-items-center-->
                <!--                      p-2-->
                <!--                      calenderTimeContent-->
                <!--                    "-->
                <!--                  >-->
                <!--                    <a href="#" class="me-3">-->
                <!--                      <i class="fas fa-video"></i>-->
                <!--                    </a>-->
                <!--                    <div class="p-0">-->
                <!--                      <strong> Client Meeting</strong>-->
                <!--                      <div class="pe-3">-->
                <!--                        Design club client meeting review the-->
                <!--                        final design-->
                <!--                      </div>-->
                <!--                    </div>-->
                <!--                  </div>-->
                <!--                </li>-->
                <!--              </ul>-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="row">-->
                <!--            <div-->
                <!--              class="-->
                <!--                col-xl-3 col-lg-3 col-md-3 col-sm-12-->
                <!--                d-flex-->
                <!--                align-items-center-->
                <!--                justify-content-center-->
                <!--              "-->
                <!--            >-->
                <!--              <span>09 AM</span>-->
                <!--            </div>-->
                <!--            <div-->
                <!--              class="-->
                <!--                col-xl-9 col-lg-9 col-md-9 col-sm-12-->
                <!--                p-0-->
                <!--                calenderList-->
                <!--              "-->
                <!--            >-->
                <!--              <ul class="p-0">-->
                <!--                <li>-->
                <!--                  <div-->
                <!--                    class="-->
                <!--                      d-flex-->
                <!--                      align-items-center-->
                <!--                      p-2-->
                <!--                      calenderTimeContent-->
                <!--                    "-->
                <!--                  >-->
                <!--                    <a href="#" class="me-3">-->
                <!--                      <i class="fas fa-video"></i>-->
                <!--                    </a>-->
                <!--                    <div class="p-0">-->
                <!--                      <strong> Client Meeting</strong>-->
                <!--                      <div class="pe-3">-->
                <!--                        Design club client meeting review the-->
                <!--                        final design-->
                <!--                      </div>-->
                <!--                    </div>-->
                <!--                  </div>-->
                <!--                </li>-->
                <!--              </ul>-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="row">-->
                <!--            <div-->
                <!--              class="-->
                <!--                col-xl-3 col-lg-3 col-md-3 col-sm-12-->
                <!--                d-flex-->
                <!--                align-items-center-->
                <!--                justify-content-center-->
                <!--              "-->
                <!--            >-->
                <!--              <span>09 AM</span>-->
                <!--            </div>-->
                <!--            <div-->
                <!--              class="-->
                <!--                col-xl-9 col-lg-9 col-md-9 col-sm-12-->
                <!--                p-0-->
                <!--                calenderList-->
                <!--              "-->
                <!--            >-->
                <!--              <ul class="p-0">-->
                <!--                <li>-->
                <!--                  <div-->
                <!--                    class="-->
                <!--                      d-flex-->
                <!--                      align-items-center-->
                <!--                      p-2-->
                <!--                      calenderTimeContent-->
                <!--                    "-->
                <!--                  >-->
                <!--                    <a href="#" class="me-3">-->
                <!--                      <i class="fas fa-video"></i>-->
                <!--                    </a>-->
                <!--                    <div class="p-0">-->
                <!--                      <strong> Client Meeting</strong>-->
                <!--                      <div class="pe-3">-->
                <!--                        Design club client meeting review the-->
                <!--                        final design-->
                <!--                      </div>-->
                <!--                    </div>-->
                <!--                  </div>-->
                <!--                </li>-->
                <!--              </ul>-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="row">-->
                <!--            <div-->
                <!--              class="-->
                <!--                col-xl-3 col-lg-3 col-md-3 col-sm-12-->
                <!--                d-flex-->
                <!--                align-items-center-->
                <!--                justify-content-center-->
                <!--              "-->
                <!--            >-->
                <!--              <span>09 AM</span>-->
                <!--            </div>-->
                <!--            <div-->
                <!--              class="-->
                <!--                col-xl-9 col-lg-9 col-md-9 col-sm-12-->
                <!--                p-0-->
                <!--                calenderList-->
                <!--              "-->
                <!--            >-->
                <!--              <ul class="p-0">-->
                <!--                <li>-->
                <!--                  <div-->
                <!--                    class="-->
                <!--                      d-flex-->
                <!--                      align-items-center-->
                <!--                      p-2-->
                <!--                      calenderTimeContent-->
                <!--                    "-->
                <!--                  >-->
                <!--                    <a href="#" class="me-3">-->
                <!--                      <i class="fas fa-video"></i>-->
                <!--                    </a>-->
                <!--                    <div class="p-0">-->
                <!--                      <strong> Client Meeting</strong>-->
                <!--                      <div class="pe-3">-->
                <!--                        Design club client meeting review the-->
                <!--                        final design-->
                <!--                      </div>-->
                <!--                    </div>-->
                <!--                  </div>-->
                <!--                </li>-->
                <!--              </ul>-->
                <!--            </div>-->
                <!--          </div>-->
                <!--        </div>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--    <div-->
                <!--      class="tab-pane fade"-->
                <!--      id="pills-profile"-->
                <!--      role="tabpanel"-->
                <!--      aria-labelledby="pills-profile-tab"-->
                <!--    >-->
                <!--      ...-->
                <!--    </div>-->
                <!--    <div-->
                <!--      class="tab-pane fade"-->
                <!--      id="pills-contact"-->
                <!--      role="tabpanel"-->
                <!--      aria-labelledby="pills-contact-tab"-->
                <!--    >-->
                <!--      ...-->
                <!--    </div>-->
                <!--  </div>-->
                <!--</div>-->
              </div>
            </section>
          </div>
        </div>
      </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
      // for table row
      $(".removeBtn").click(function(){
        var verify = confirm("Are you sure ?");
        if (verify == true) {
          this.parentElement.style.display = "none"
          
        } else {}
      })
    </script>
  </body>
</html>

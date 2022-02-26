<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Dashboard - Alba Education</title>
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

          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 bg-PureWhite">
            <section class=" mt-5">
              <div class="section-heading">
                
                <h1 class="color-Main ">Hi, <?php if (session()->has('STUDENT')) {
                      echo session('STUDENT_NAME'); 
                    };  ?> </h1>
                    <?php
                      if (isset($users_students) && is_array($users_students)) {
                        if (count($users_students) > 0) {
                          foreach($users_students as $users_student ){
                          ?>
                        <p class="mt-3"><strong>Grade : </strong>
                              <?php echo $users_student->grade; ?>
                    <br> <strong>
                      Subject : </strong>

                      <?php  
                      if (isset($subjects) && $subjects != 0){
                                foreach ($subjects as $subject) {
                                    if($subject->subject_id == $users_student->subject)
                                    {
                                        echo $subject->subject_name;
                                        break;
                                    } 
                                }
                            } 
                          }
                      }
              }
            ?>
                </p>
              </div>

              <section class="mt-5">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <!--<li class="nav-item " role="presentation">-->
                  <!--  <button class="nav-link active text-dark" id="pills-homeWork-tab" data-bs-toggle="pill" data-bs-target="#pills-homeWork" type="button" role="tab" aria-controls="pills-home" aria-selected="true">HomeWork</button>-->
                  <!--</li>-->
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active text-dark id="pills-class-tab data-bs-toggle="pill" data-bs-target="#pills-class" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Today's Classes</button>
                  </li>

                </ul>
                <div class="tab-content" id="pills-tabContent">
                 
                  <div class="tab-pane fade scrollbar_none table-responsive show active" id="pills-class" role="tabpanel" aria-labelledby="pills-class-tab">
                    <table class="table">
                    <thead>
                      <tr>
                        
                        <th scope="col"></th>
                        <th scope="col">Subject</th>
                        <th scope="col">Session</th>
                        <th scope="col">Time</th>
                        <th scope="col">Duration (Min)</th>
                        <th scope="col">Teacher</th>
                        <th scope="col">Link</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                    if (isset($class_sessions)) {
                        if ($class_sessions != 0) {
                            $i = 1;
                            foreach($class_sessions as $class_session)
                            { ?>
                            <tr>
                                <td>
                                  <?php echo $i; ?>
                                </td>
                                <td>
                                    <?php 
                                        if (isset($subjects) && $subjects != 0){
                                            foreach ($subjects as $subject) {
                                                if($subject->subject_id == $class_session->subject)
                                                {
                                                    echo $subject->subject_name;
                                                    break;
                                                } 
                                            }
                                        }
                                    ?>    
                                </td>
                                <td><?php echo $class_session->for_date; ?></td>
                                <td><?php echo $class_session->strt_time; ?></td>
                                <td><?php echo $class_session->timing; ?></td>
                                <td>
                                    <?php 
                                    if (isset($users_teachers) && $users_teachers != 0){
                                        foreach ($users_teachers as $users_teacher) {
                                            if($users_teacher->user_teacher_id == $class_session->teacher)
                                            {
                                                echo $users_teacher->aliaName;
                                                break;
                                            } 
                                        }
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="<?php echo $class_session->zoom_link; ?>" target="_blank">
                                        <span class="badge bg-warning text-dark">Link</span>
                                    </a>
                                </td>
                            
                                 <td class="removeBtn" > 
                                    <a href="#"></a>
                                    <span class="badge bg-danger">Delete</span>
                                    </a>
                                </td>
                            </tr>
                            <?php $i++; }
                        }
                    }
                    ?>
                    </tbody>
                  </table>
                  </div>
                  <div class="tab-pane table-responsive fade" id="pills-results" role="tabpanel" aria-labelledby="pills-results-tab">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col"></th>
                          <th scope="col">Subject </th>
                          <th scope="col">View</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Physics</td>
                          <td>
                          <a href="#">
                            <span class="badge bg-danger">Download</span>
                          </a>
                        </td>
                        <td class="removeBtn" > 
                                  <a href="#" >
                                    <span class="badge bg-danger"><i class="fas fa-times"></i></span>
                                  </a>
                                </td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Physics</td>
                          <td>
                          <a href="#">
                            <span class="badge bg-danger">Download</span>
                          </a>
                        </td>
                        <td class="removeBtn" > 
                                  <a href="#" >
                                    <span class="badge bg-danger"><i class="fas fa-times"></i></span>
                                  </a>
                                </td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Physics</td>
                          <td>
                          <a href="#">
                            <span class="badge bg-danger">Download</span>
                          </a>
                        </td>
                        <td class="removeBtn" > 
                                  <a href="#" >
                                    <span class="badge bg-danger"><i class="fas fa-times"></i></span>
                                  </a>
                                </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </section>
              <div class="dash-shapeBox">
                <div class="dash-shape1">
                  <img src="<?php echo base_url('/public/Admin/images/kids-with-kite.png') ?>" alt="Shape Image">
                </div>
              </div>
            </section>
          </div>

          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
            <div class="row mt-5">
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="sectionpart-noticeBoard">
                      <img src="<?php echo base_url('/public/Admin/images/image9.png') ?>" alt="">
                      <h6 class="text-center fw-bold text-danger fs-3">Notice Board</h6>
                      <marquee width="100%" direction="up" height="200px" scrollamount="3" onMouseOver="this.stop()" onMouseOut="this.start()">
                        <ul class="p-0 m-0">
                          <?php 
                          if (isset($notifications) && is_array($notifications)) {
                            if (count($notifications)> 0) {
                              foreach ($notifications as $notification) {
                                ?>
                                <li>
                                  <a href="#">
                                   <?php echo $notification->message; ?> 

                                  </a>
                                </li>
                                <?php 
                              }
                            }
                          }else {
                            echo '<li><a href="#">No Notification right now !</a></li>';
                          }
                          ?>

                        </ul>
                      </marquee>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="sectionpart-info mt-5">
                      <h1 class="text-center">Performance</h1>
                      <div class="canvas-wrap">
                        <canvas id="canvas" width="250" height="250"></canvas>
                        <span id="procent"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="sectionpart-upComingEvents mt-5">
                      <h2 class="text-center">Upcoming Events</h2>
                      <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                          <div class="upcomingEventsBox">
                            <ul class="p-0 m-0">
                              <li class="m-2">
                                <h1>2</h1>
                              </li>
                              <li>
                                <i class="far fa-calendar-alt"></i>
                                <a href="#">Events</a> 
                              </li>
                            </ul>
                            <a href="#">
                              <span class="badge bg-warning text-dark">Click Here to Join</span>
                            </a>
                          </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                          <div class="upcomingEventsBox">
                            <ul class="p-0 m-0">
                              <li class="m-2">
                                <h1>2</h1>
                              </li>
                              <li>
                                <i class="far fa-calendar-alt"></i>
                                <a href="#">Events</a> 
                              </li>
                            </ul>
                            <a href="#">
                              <span class="badge bg-warning text-dark">Click Here to Join</span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pe-5">
                <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" >
                    <div class="calender ">
                      <ul class="month p-0 m-0">
                        <li>
                          <h1>January</h1>
                          <h2>2016</h2>
                        </li>
                        <span class="prev">&#10094;</span>
                        <span class="next">&#10095;</span>
                      </ul>
                      <ul class="weeks p-0 m-0">
                        <li>Sa</li>
                        <li>Su</li>
                        <li>Mo</li>
                        <li>Tu</li>
                        <li>We</li>
                        <li>Th</li>
                        <li>Fr</li>
                      </ul>
                      <ul class="days m-0 p-0"></ul>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" >
                    <div class="sectionPart-goals  mt-5">
                      <div class="sectionPart-goalsImage d-flex align-items-center">
                        <img src="<?php echo base_url('/public/Admin/images/image3.png') ?>" class="img-fluid" alt="">
                        <h4 class="fw-bold fs-2 text-info">Achiements</h4>
                      </div>
                      <div class="achivementStar mt-3">
                        <ul class="p-0 m-0 d-flex justify-content-around ">
                          <li class="color-Main">
                            <i class="fas fa-star active"></i>
                          </li>
                          <li class="color-Main">
                            <i class="fas fa-star active"></i>
                          </li>
                          <li class="color-Main">
                            <i class="fas fa-star active"></i>
                          </li>
                          <li class="color-Main">
                            <i class="fas fa-star"></i>
                          </li>
                          <li class="color-Main">
                            <i class="fas fa-star"></i>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" >
                    <div class="sectionPart2-info mt-5">
                      <div class="sectionPart2-infoBox">
                        <h3 class="mb-4" >Reschedule your Class</h3>
                        <button class="dashboardBtn" data-bs-toggle="modal" href="#rescheduleClass" role="button">Reschedule</button>
                      </div>
                      <div class="sectionPart2-infoBox mt-5">
                        <h3 class="mb-4" >Teacher Feedback</h3>
                        <button class="dashboardBtn" data-bs-target="#teacherFeedback" data-bs-toggle="modal">Click Here</button>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="rescheduleClass" aria-hidden="true" aria-labelledby="rescheduleClass" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalToggleLabel">Reschedule your Class</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body rounded">
                          <form action="<?php echo base_url('student/reschedule_class'); ?>" method="post">
                            <div class="row g-3 mb-3">
                              <div class="col">
                                <label for="" class="form-label fw-bold">Email</label>
                                <span class="required">*</span>
                                <input type="email" name="email" class="form-control" placeholder="Email" aria-label="email" required>
                              </div>
                              <div class="col">
                                <label class="form-label fw-bold">Phone </label>
                                <span class="required">*</span>
                                <input type="number" name="phone" class="form-control" placeholder="Mobile Number" aria-label="Phone number" required>
                              </div>
                            </div>
                            <div class="row g-3 mb-3">
                              <div class="col">
                                <label  class="form-label fw-bold">Date (to Reschedule)</label>
                                <span class="required">*</span>
                                <input type="date" class="form-control" name="date" placeholder="First name" aria-label="Date" required>
                              </div>
                              <div class="col">
                                <label class="form-label fw-bold">Time (to Reschedule)</label>
                                <span class="required">*</span>
                                <input type="time" class="form-control" name="time" placeholder="Last name" aria-label="Time" required>
                              </div>
                            </div>
                            <div class="row g-3 mb-3">
                              <div class="col">
                                <label  class="form-label fw-bold">Message (description about class/sessions)</label>
                                <textarea  class="form-control" name="message"></textarea>
                              </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="teacherFeedback" aria-hidden="true" aria-labelledby="teacherFeedback" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalToggleLabel2">Teacher Feedback</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="<?php echo base_url('student/teacher_feedback'); ?>" method="post">
                            <div class="row g-3 mb-3">
                              <div class="col">
                                <label  class="form-label fw-bold">Teacher Name</label>
                                <span class="required">*</span>
                                <input type="text" class="form-control" name="teacher" placeholder="Your Teacher Name" aria-label="Teacher" required>
                              </div>
                            </div>
                            <div class="row g-3 mb-3">
                              <div class="col">
                                <label  class="form-label fw-bold">Feedback</label>
                                <span class="required">*</span>
                                <textarea  class="form-control" name="feedback" placeholder="Write Feedback Message"></textarea>
                              </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                        </div>
                        <!-- <div class="modal-footer">
                          <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
                        </div> -->
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    

    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
       window.onload = function() {
      var can = document.getElementById('canvas'),
          spanProcent = document.getElementById('procent'),
            c = can.getContext('2d');
      
      var posX = can.width / 2,
          posY = can.height / 2,
          fps = 1000 / 200,
          procent = 0,
          oneProcent = 360 / 100,
          result = oneProcent * 70;
      
      c.lineCap = 'round';
      arcMove();
      
      function arcMove(){
        var deegres = 0;
        var acrInterval = setInterval (function() {
          deegres += 1;
          c.clearRect( 0, 0, can.width, can.height );
          procent = deegres / oneProcent;
      
          spanProcent.innerHTML = procent.toFixed();
      
          c.beginPath();
          c.arc( posX, posY, 70, (Math.PI/180) * 270, (Math.PI/180) * (270 + 360) );
          c.strokeStyle = 'transparent';
          c.lineWidth = '10';
          c.stroke();
      
          c.beginPath();
          c.strokeStyle = '#e3424c';
          c.lineWidth = '10';
          c.arc( posX, posY, 70, (Math.PI/180) * 270, (Math.PI/180) * (270 + deegres) );
          c.stroke();
          if( deegres >= result ) clearInterval(acrInterval);
        }, fps);
        
      }
      }
      /*global console*/
      //calender
      //month
      //prev
      //next
      //weeks
      //days

      //punblic variables
      var calender = document.querySelector(".calender"), //container of calender
        topDiv = document.querySelector(".month"),
        monthDiv = calender.querySelector("h1"), //h1 of monthes
        yearDiv = calender.querySelector("h2"), //h2 for years
        weekDiv = calender.querySelector(".weeks"), //week container
        dayNames = weekDiv.querySelectorAll("li"), //dayes name
        dayItems = calender.querySelector(".days"), //date of day container
        prev = calender.querySelector(".prev"),
        next = calender.querySelector(".next"),
        // date variables
        years = new Date().getFullYear(),
        monthes = new Date(new Date().setFullYear(years)).getMonth(),
        lastDayOfMonth = new Date(
          new Date(new Date().setMonth(monthes + 1)).setDate(0)
        ).getDate(),
        dayOfFirstDateOfMonth = new Date(
          new Date(new Date().setMonth(monthes)).setDate(1)
        ).getDay(),
        // array to define name of monthes
        monthNames = [
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July",
          "August",
          "September",
          "October",
          "November",
          "December"
        ],
        colors = [
          "#FFdac1",
          "#e2f0cb",
          "#b5ead7",
          "#c7ceea",
          "#6eb5ff",
          "#ffffd1",
          "#ffabab",
          "#aff8d8",
          "#ffc9de",
          "#ffbebc",
          "#ff9aa2",
          "#ffb7b2"
        ],
        i, //counter for day before month first day in week
        x, //counter for prev , next
        counter; //counter for day of month  days;

      //display dayes of month in items
      function days(x) {
        "use strict";
        dayItems.innerHTML = "";
        monthes = monthes + x;

        /////////////////////////////////////////////////
        //test for last month useful while prev ,max prevent go over array
        if (monthes > 11) {
          years = years + 1;
          monthes = new Date(
            new Date(new Date().setFullYear(years)).setMonth(0)
          ).getMonth(); 
        }
        if (monthes < 0) {
          years = years - 1;
          monthes = new Date(
            new Date(new Date().setFullYear(years)).setMonth(11)
          ).getMonth(); 
        }
        lastDayOfMonth = new Date(
          new Date(
            new Date(new Date().setFullYear(years)).setMonth(monthes + 1)
          ).setDate(0)
        ).getDate();
        dayOfFirstDateOfMonth = new Date(
          new Date(new Date(new Date().setFullYear(years)).setMonth(monthes)).setDate(
            1
          )
        ).getDay(); 
        /////////////////////////////////////////////////
        yearDiv.innerHTML = years;
        monthDiv.innerHTML = monthNames[monthes];
        for (i = 0; i <= dayOfFirstDateOfMonth; i = i + 1) {
          if (dayOfFirstDateOfMonth === 6) {
            break;
          }
          dayItems.innerHTML += "<li> - </li>";
        }
        for (counter = 1; counter <= lastDayOfMonth; counter = counter + 1) {
          dayItems.innerHTML += "<li>" + counter + "</li>";
        }
        topDiv.style.background = colors[monthes];
        dayItems.style.background = colors[monthes];
        if (monthes === new Date().getMonth() && years === new Date().getFullYear()) {
          dayItems.children[
            new Date().getDate() + dayOfFirstDateOfMonth
          ].style.background = "transparent";
        }
      }
      prev.onclick = function () {
        "use strict";
        days(-1); //decrement monthes
      };
      next.onclick = function () {
        "use strict";
        days(1); //increment monthes
      };
      days(0);

      //end


      // notification
      $(".notificationBell").click(function(){
        $(".dropdownMenu").toggleClass("show");
        
      });
      $(".headerTopContent").click(function(){
        $(".dropdownMenu2").toggleClass("show");
      });
      
      
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

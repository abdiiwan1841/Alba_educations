<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Teacher Dashboard - Alba Education</title>
    <link rel="stylesheet" href="<?php echo base_url('/public/Admin/css/style.css') ?>" />
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
    <main>
      <div class="container-fluid ">
        <div class="row">
          <?php include('public/Teachers/inc/nav.php'); ?>

          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 bg-PureWhite">
            <div class="row mt-5">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="teacherSection">
                  <h1 class="color-Main">Today's Class</h1>
                  <div class="tableWrapper">
                    <table class="table">
                    <thead>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col">Subject</th>
                        <th scope="col">Student</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Duration (min)</th>
                        <th scope="col">Link</th>
                        <th scope="col">Attendance</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        if (isset($class_sessions)) {
                        if(is_array($class_sessions)) {
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
                                <td>
                                    <?php 
                                    if (isset($users_students) && $users_students != 0){
                                        foreach ($users_students as $users_student) {
                                            if($users_student->user_student_id == $class_session->student)
                                            {
                                                echo $users_student->name;
                                                break;
                                            } 
                                        }
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        if (isset($grades) && $grades != 0){
                                            foreach ($grades as $grade) {
                                                if($grade->grade_id == $class_session->grade)
                                                {
                                                    echo $grade->grade_name;
                                                    break;
                                                } 
                                            }
                                        }
                                    ?>    
                                </td>
                                <td><?php echo date('d-m-y',strtotime($class_session->for_date)) ; ?></td>
                                <td><?php echo $class_session->strt_time; ?></td>
                                <td ><?php echo $class_session->timing; ?></td>
                                <td >
                                    <a href="<?php echo $class_session->zoom_link; ?>" target="_blank">
                                        <span class="badge bg-warning text-dark">Link</span>
                                    </a>
                                </td>
                                <td>
                                    <button class="badge bg-success text-light border" data-bs-toggle="modal" href="#presentAttendance" role="button" onclick="presentStd(<?php echo $class_session->session_id; ?>, '1')">Present</button>
                                    <button class="badge bg-danger text-light border" data-bs-toggle="modal" role="button" onclick="presentStd(<?php echo $class_session->session_id; ?>, '2')">Absent</button>
                                    <button class="badge bg-secondary text-light border" data-bs-toggle="modal" role="button" onclick="presentStd(<?php echo $class_session->session_id; ?>, '3')">NA</button>
                                </td>
                                <td class="removeBtn" > 
                                  <a href="#" >
                                    <span class="badge bg-danger"><i class="fas fa-times"></i></span>
                                  </a>
                                </td>
                                
                            </tr>
                            <?php $i++; }
                        }else{
                          echo '<div class="mt-5 mb-5 text-danger">No session right now !</div>';
                        }
                      }
                      ?>
                      <div class="modal fade" id="presentAttendance" aria-hidden="true" aria-labelledby="presentAttendance" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalToggleLabel">Remarks</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body rounded">
                              <form action="<?php echo base_url('teacher/remarks_afterSession'); ?>" method="post">
                                <div class="mb-3">
                                  <label for="" class="form-label">Topic covered in this session</label>
                                  <textarea class="form-control" id="" name="topic_covered" required></textarea>
                                </div>
                                <div class="mb-3">
                                  <label for="" class="form-label">Student homework status</label>
                                  <select class="form-control" name="homework_status" id="">
                                    <option value="1" class="form-control">Done</option>
                                    <option value="2" class="form-control">Not done</option>
                                  </select>
                                </div>
                                
                                <div class="mb-3">
                                  <label for="" class="form-label">Topic for the next session</label>
                                  <textarea class="form-control" id="" name="next_topic" required></textarea>
                                </div>
                                <div class="mb-3">
                                  <label for="inputStudentAchievement" class="form-label">Teacher Remark</label>
                                  <textarea class="form-control" id="inputStudentAchievement" name="remarks" required></textarea>
                                </div>
                                <input type="text" id="mySession" name="mySession" value="" style="display: none;">
                                <input type="text" id="sessionStatus" name="sessionStatus" value="" style="display: none;">
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </form>

                            </div>
                          </div>
                        </div>
                      </div>
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
            
          </div>

          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="row mt-5">
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="teacherSection3">
                        
                      <h1 class="text-center color-Main">Attend Class</h1>
                      <div class="canvas-wrap">
                        <canvas id="canvas" width="250" height="250"></canvas>
                        <span id="procent"></span>
                      </div>
                      <div class="canvasDesc">
                        <span class="attendClass"><i class="fas fa-circle"></i>Attend</span>
                        <span class="missedClass"><i class="fas fa-circle"></i>Missed/Not attended yet</span>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-5">
                    <div class="teacherSection5">
                      <h1 class="text-center color-Main">Payment Status</h1>
                      <div class="canvas-wrap">
                        <canvas id="canvas1" width="250" height="250"></canvas>
                        <span id="procent1"></span>
                      </div>
                      <div class="canvasDesc">
                        <span class="attendClass"><i class="fas fa-circle"></i>Paid</span>
                        <span class="missedClass"><i class="fas fa-circle"></i>Balance</span>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 ">
                <div class="row">
                </div>
                <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 " >
                    <div class="sectionpart-noticeBoard">
                      <img src="<?php echo base_url('/public/Admin/images/image9.png') ?>" alt="">
                      <h6 class="text-center fw-bold text-danger fs-3">Warning</h6>
                      <marquee width="100%" direction="up" height="200px" scrollamount="3" onMouseOver="this.stop()" onMouseOut="this.start()">
                        <ul class="p-0 m-0">
                          <li>
                            <a href="#">
                              Abc 28-07-2021
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              Check your upcoming classes by clicking here 21-07-2021
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              To check your upcoming events, Please click on event 21-07-2021
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              Hi, we are orgranizing next event on July 25, 2021 21-07-2021
                            </a>
                          </li>
                        </ul>
                      </marquee>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-5 " >
                    <div class="teacherSection6">
                      <div class="sectionPart2-info">
                        <div class="sectionPart2-infoBox">
                          <h3 class="mb-4" >Whistle Blower</h3>
                          <button class="dashboardBtn" data-bs-toggle="modal" href="#whistleBlower" role="button">Click Here</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="whistleBlower" aria-hidden="true" aria-labelledby="whistleBlower" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalToggleLabel">Whistle Blower</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body rounded">
                          <form>
                            <div class="mb-3">
                              <label for="inputWhistleBlower" class="form-label">Write Here</label>
                              <textarea class="form-control" id="inputWhistleBlower"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>

                        </div>
                      </div>
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
    <?php include('public/Teachers/inc/foot.php') ?>
  </body>
</html>

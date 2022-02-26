<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Today Sessions - Alba Education</title>
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
      <div class="container-fluid mt-5">
        <div class="row">
          <?php include('public/Teachers/inc/nav.php'); ?>

          <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12">
            <section class="mainContent">
              <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                  <div class="contentHeading mt-5">
                    <h2>Hi, <?php if (session('TEACHER')) {
                        echo session()->get('TEACHER_NAME');
                    } ?></h2>
                    <p>Ready to start your day with Alba Educations?</p>

                    <div class="headerImage">
                      <img src="<?php echo base_url('/public/Admin/images/image5.png') ?>" class="img-fluid" alt="" />
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12"></div>
              </div>
              <div class="row m-5">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pe-5">
                  <div class="contentHeading2">
                    <h2>Current Session's</h2>
                  </div>
                  <?php
                    if (isset($reg_error)) {
                    ?>
                    <div class="form-group text-danger text-center mb-4 mt-4 reg_error"><?php print_r($reg_error); ?></div>
                    <script>
                        setTimeout(function() {
                            $('.reg_error').fadeOut('fast');
                        }, 3000);
                    </script>
                    <?php
                    };
                    if (isset($message)) {
                    ?>
                        <div class="form-group text-success text-center mb-4 mt-4 reg_success"><?php print_r($message); ?></div>
                        <script>
                            setTimeout(function() {
                                $('.reg_success').fadeOut('fast');
                            }, 3000);
                        </script>
                    <?php
                    };
                    ?>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col">Subject</th>
                        <th scope="col">Student</th>
                        <th scope="col">Grade</th>
                        <th scope="col">DATE</th>
                        <th scope="col">Time</th>
                        <th scope="col" >Duration (min)</th>
                        <th scope="col" >Zoom Link</th>
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
                  <div class="dash-shapeBox3">
                    <div class="dash-shape3">
                      <img src="<?php echo base_url('/public/Admin/images/k-shape20.png') ?>" alt="Shape Image">
                    </div>
                    <div class="dash-shape4">
                      <img src="<?php echo base_url('/public/Admin/images/k-shape19.png') ?>" alt="Shape Image">
                    </div>
                  </div>
                </div>
               
              </div>
            </section>
          </div>
        </div>
      </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
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

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Alba Educations | Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
        <?php include('public/Admin/inc/head.php'); ?>
</head>

<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper bg-ash">
       <!-- Header Menu Area Start Here -->
        <?php include ('public/Admin/inc/topbar.php'); ?>
        <!-- Header Menu Area End Here -->
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
            <!-- Sidebar Area Start Here -->
            <?php include ('public/Admin/inc/sidebar.php'); ?>            
            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Report card</h3>
                    <ul>
                        <li>
                            <a href="<?php echo base_url('admin') ?>">Home</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/adminViewRequest');?>">Requests</a>
                        </li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Dashboard summery Start Here -->
                <!-- Dashboard summery End Here -->
                <!--  Start Here -->
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                        <div class="card height-auto">
                            <div class="card-body-new">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Send Report Card</h3>
                                    </div>
                                </div>
                                <form class="mg-b-20" method="POST" action="<?php echo base_url('admin/add_report_card'); ?>">
                                    <div class="row">
                                      <?php
                                        if (isset($reg_error)) {
                                        ?>
                                        <div class="form-group text-danger mb-4 mt-4 reg_error"><?php print_r($reg_error); ?></div>
                                        <script>
                                            setTimeout(function() {
                                                $('.reg_error').fadeOut('fast');
                                            }, 3000);
                                        </script>
                                        <?php
                                        };
                                        if (isset($message)) {
                                        ?>
                                            <div class="form-group text-success mb-4 mt-4 reg_success"><?php print_r($message); ?></div>
                                            <script>
                                                setTimeout(function() {
                                                    $('.reg_success').fadeOut('fast');
                                                }, 3000);
                                            </script>
                                        <?php
                                        };
                                        ?>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="mb-3">
                                              <label class="form-label">Grade</label>
                                              <select class="selectedClass form-select" onchange="AssignSubjectsFunctions()" name="grade" aria-label="">
                                                    <option value="">Select here..</option>
                                                    <option value="1">1st</option>
                                                    <option value="2">2nd</option>
                                                    <option value="3">3rd</option>
                                                    <option value="4">4th</option>
                                                    <option value="5">5th</option>
                                                    <option value="6">6th</option>
                                                    <option value="7">7th</option>
                                                    <option value="8">8th</option>
                                                    <option value="9">9th</option>
                                                    <option value="10">10th</option>
                                                    <option value="11">11th</option>
                                                    <option value="12">12th</option>
                                                    <option value="13">UG</option>
                                                    <option value="14">PG</option>
                                                    <option value="15">Diploma / certification</option>
                                                    <option value="16">Others</option>
                                                </select>
                                            </div>
                                          </div>
                                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="mb-3">
                                              <label class="form-label">Student Name</label>
                                              <select class="fillStudents form-select" onchange="getAsignSubjects()" name="student" aria-label="">
                                                    <option value="">Select grade first..</option>
                                                    
                                                </select>
                                            </div>
                                          </div>
                                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="mb-3">
                                              <label class="form-label">Subject</label>
                                              <select class="fillSubjects form-select" name="subject" aria-label="">
                                                    <option value="">Select grade first..</option>
                                                </select>
                                            </div>
                                          </div>
                                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="mb-3">
                                              <label class="form-label">Topic</label>
                                              <textarea class="form-control" name="topic"></textarea>
                                            </div>
                                          </div>
                                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="mb-3">
                                              <label class="form-label">Strength</label>
                                              <textarea class="form-control" name="strength"></textarea>
                                            </div>
                                          </div>
                                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="mb-3">
                                              <label class="form-label">Weakness</label>
                                              <textarea class="form-control" name="weekness"></textarea>
                                            </div>
                                          </div>
                                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="mb-3">
                                              <label class="form-label">Suggestions</label>
                                              <textarea class="form-control" name="suggestions"></textarea>
                                            </div>
                                          </div>
                                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="mb-3">
                                              <label class="form-label">Upcoming Events</label>
                                              <textarea class="form-control" name="upcoming_events"></textarea>
                                            </div>
                                          </div>
                                        <div class="col-12 form-group mg-t-8">
                                            <button type="submit" class="btn-fill-lg btn-gradient-main btn-hover-bluedark">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                        <div class="card height-auto">
                            <div class="card-body-new">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Report Card</h3>
                                    </div>
                                </div>
                           
                                <div class="table-responsive">
                                    <table class="table display data-table fold-table text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="form-check">
                                                        <label class="form-check-label"></label>
                                                    </div>
                                                </th>
                                                <th>Grade</th>
                                                <th>Student name</th>
                                                <th>Subject</th>
                                                <th>Remove</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                        if (isset($report_cards) && is_array($report_cards)) {
                                          if (count($report_cards) > 0) {
                                            $i = 1;
                                            foreach($report_cards as $report_card)
                                            {
                                              ?>
                                               <tr class="view">
                                                <td>
                                                    <div class="form-check">
                                                        <label class="form-check-label"><?php echo $i; ?></label>
                                                    </div>
                                                </td>
                                                <td><?php   
                                                  if (isset($grades) && $grades != 0){
                                                      foreach ($grades as $grade) {
                                                          if($grade->grade_id == $report_card->grade)
                                                          {
                                                              echo $grade->grade_name;
                                                              break;
                                                          } 
                                                      }
                                                  }
                                                ?></td>
                                                <td><?php  
                                                    if (isset($users_students) && $users_students != 0){
                                                      foreach ($users_students as $users_student) {
                                                          if($users_student->user_student_id == $report_card->student)
                                                          {
                                                              echo $users_student->name;
                                                              break;
                                                          } 
                                                      }
                                                  }
                                                ?></td>
                                                <td>
                                                  <?php 
                                                   if (isset($subjects) && $subjects != 0){
                                                      foreach ($subjects as $subject) {
                                                          if($subject->subject_id == $report_card->subject)
                                                          {
                                                              echo $subject->subject_name;
                                                              break;
                                                          } 
                                                      }
                                                  }
                                                ?>
                                                </td>
                                                <td  class="removeReportCard" id="<?php echo $report_card->report_card_id; ?>"> 
                                                    <a href="#" >
                                                      <span class="badge bg-danger">Delete</span>
                                                    </a>
                                                </td>
                                                <td class="statusIcon">
                                                    <a href="#" >
                                                        <span class="badge bg-success">View</span>
                                                      </a>
                                                </td>
                                            </tr>
                                            <tr class="fold">
                                                <td colspan="7">
                                                  <div class="container">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <strong>Topic</strong>
                                                            <br>
                                                            <p><?php echo $report_card->topic;  ?>
                                                            <br>
                                                            <strong>Strength</strong>
                                                            <br>
                                                            <p><?php echo $report_card->strength;  ?>
                                                            <br>
                                                            <strong>Weakness</strong>
                                                            <br>
                                                            <p><?php echo $report_card->weekness;  ?>
                                                            <br>
                                                            <strong>Suggestions</strong>
                                                            <br>
                                                            <p><?php echo $report_card->suggestions;  ?>
                                                            <br>
                                                            <strong>Upcoming Events</strong>
                                                            <br>
                                                            <p><?php echo $report_card->upcoming_events;  ?>
                                                        </div>
                                                    </div>
                                                  </div>
                                                </td>
                                            </tr>  
                                              <?php 
                                              $i++;
                                            }
                                          }
                                        };
                                        ?>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Here -->
            </div>
        </div>
        <!-- Page Area End Here -->
    </div>
    <?php include('public/Admin/inc/foot.php'); ?>
</body>
<script>
      $(".removeReportCard").click(function(){
      var verify = confirm("Are you sure you want to delete this?  Once deleted would not be recreated ?");
      if (verify == true) {
        var id = $(this).attr('id');
        window.location.href = "<?php echo base_url().'/admin/delete_ReportCard/'?>"+id;
      } else {}
    })

    function AssignSubjectsFunctions(){
        getAsignStudents()
        getAsignSubjects()
    }
    function getAsignStudents()
    {
        var selectedClass = $('.selectedClass').find(':selected').val();
        $.ajax({
              type:'post',
              url:"<?php echo base_url('admin/getMyStudents');?>",
              data:{
                id:selectedClass
              },
              dataType:'json',
              cache:false,
              success: function(data){
                if(data == '1'){
                    $('.fillStudents').text("")
                    alert('No Students in this grade !')
                  }else{
                  
                    $('.fillStudents').text("")
                    $('.fillStudents').append('<Option value="">Select Students here.. </Option>')
                    
                  //   var myKeys = Object.keys(data)
                    var totalKeys = Object.keys(data).length
                    var myValues = Object.values(data)
                    // console.log(data)
                    for (let i = 0; i < totalKeys; i++) {
                      var values = myValues[i]
                      // var keys = myValues[i]
                      console.log(values)
                      $('.fillStudents').append('<Option value="'+values[1]+'">'+values[0]+'</Option>');
                    };
              };
              },
              error:function(e){
                alert('ajax error');
              }
            })
            
    }

    function getAsignSubjects()
    {
        var selectedClass = $('.selectedClass').find(':selected').val();
        $.ajax({
              type:'post',
              url:"<?php echo base_url('admin/getMySubjects');?>",
              data:{
                id:selectedClass
              },
              dataType:'json',
              cache:false,
              success: function(data){
                if(data == '1'){
                    $('.fillSubjects').text("")
                    alert('No subjects with this student !')
                  }else{
                    $('.fillSubjects').text("")
                    $('.fillSubjects').append('<Option value="">Select Subjects here.. </Option>')
                    
                  //   var myKeys = Object.keys(data)
                    var totalKeys = Object.keys(data).length
                    var myValues = Object.values(data)
                    // console.log(data)
                    for (let i = 0; i < totalKeys; i++) {
                      var values = myValues[i]
                      // var keys = myValues[i]
                      console.log(values)
                      $('.fillSubjects').append('<Option value="'+values[1]+'">'+values[0]+'</Option>');
                    };
              };
              },
              error:function(e){
                alert('ajax error');
              }
            })
            
    }
</script>
</html>
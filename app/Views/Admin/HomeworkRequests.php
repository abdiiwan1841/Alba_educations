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
        <?php include('public/Admin/inc/topbar.php'); ?>
        <!-- Header Menu Area End Here -->
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
            <!-- Sidebar Area Start Here -->
            <?php include('public/Admin/inc/sidebar.php'); ?>
            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Homework</h3>
                    <ul>
                        <li>
                            <a href="<?php echo base_url('admin/dashboard');?>">Home</a>
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
                               <div class="contentHeading2 mb-3">
                        <h2>Send Homework</h2>
                        </div>
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
                      <form action="<?php echo base_url('admin/upload_homework'); ?>" method="post" enctype="multipart/form-data">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                          <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" >
                          </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                          <div class="mb-3">
                            <label class="form-label">Grade</label>
                            <select class="form-select slectedOption" name="grade" aria-label="" onchange="fetchDropdowns()">
                                <option>Select Grade</option>
                                <?php 
                                if (isset($grades) && $grades != 0){
                                    foreach ($grades as $grade) {
                                        ?>
                                        <option value="<?php echo $grade->grade_name; ?>"><?php echo $grade->grade_name; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                          </select>
                          </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                          <div class="mb-3">
                            <label class="form-label">Student</label>
                            <select class="fillStudents stdSelected form-select" onchange="getSubjectsHomework()"   name="student" aria-label="">
                                <option value="">Select Grade first</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                          <div class="mb-3">
                            <label class="form-label">Subject</label>
                            <select class="fillsubjectsHere form-select"  name="subject" aria-label="">
                                <option value="">Select Grade first</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                          <div class="mb-3">
                            <label for="lastDateOfSubimition" class="form-label">Last Date of Submission</label>
                            <input type="date" class="form-control" name="lastDateOfSubimition">
                          </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                          <div class="mb-3">
                            <label for="inputUploadDocument" class="form-label">Upload Homework</label>
                            <input type="file" class="form-control" name="h_file">
                          </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="mb-3">
                              <button type="submit" class="btn btn-primary">Submit</button>
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
                                        <h3>Homeworks requests</h3>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table display data-table text-nowrap text-center">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input checkAll">
                                                        <label class="form-check-label"></label>
                                                    </div>
                                                </th>
                                                <th>Homework Title</th>
                                                <th>Student Name</th>
                                                <th>Student Grade</th>
                                                <th>Teacher Name</th>
                                                <th>Subject</th>
                                                <th>Last date submission</th>
                                                <th>Homework</th>
                                                <th>Verify</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($homeworks)) {
                                                if ($homeworks != 0) {
                                                    $i = 1;
                                                    foreach($homeworks as $homework)
                                                    { ?>
                                                    
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input">
                                                                <label class="form-check-label"><?php echo $i; ?></label>
                                                            </div>
                                                        </td>
                                                        <td><?php echo $homework->h_title; ?></td>
                                                        <td>
                                                          <?php 
                                                                if (isset($users_students) && $users_students != 0){
                                                                    foreach ($users_students as $student) {
                                                                        if($student->user_student_id == $homework->student)
                                                                        {
                                                                            echo $student->name;
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
                                                                        if($grade->grade_id == $homework->grade)
                                                                        {
                                                                            echo $grade->grade_name;
                                                                            break;
                                                                        } 
                                                                    }
                                                                }
                                                            ?>    
                                                        </td>
                                                        <td>
                                                            <?php 
                                                            if (isset($users_teachers) && $users_teachers != 0){
                                                                foreach ($users_teachers as $users_teacher) {
                                                                    if($users_teacher->user_teacher_id == $homework->teacher)
                                                                    {
                                                                        echo $users_teacher->name;
                                                                        break;
                                                                    } 
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php 
                                                            if (isset($subjects) && $subjects != 0){
                                                                foreach ($subjects as $subject) {
                                                                    if($subject->subject_id == $homework->subject)
                                                                    {
                                                                        echo $subject->subject_name;
                                                                        break;
                                                                    } 
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php echo $homework->last_date_submission; ?></td>
                                                        <td>
                                                              <a href="<?php echo base_url($homework->h_file); ?>" download>
                                                                <span class="badge bg-danger">Download</span>
                                                              </a>
                                                          </td>
                                                          <td>
                                                            <a class="approvehomeworkBtn" id="<?php echo $homework->homework_id; ?>" href="#">
                                                              <span class="badge bg-success">Approve</span>
                                                            </a>
                                                              <a class="declinehomeworkBtn" id="<?php echo $homework->homework_id; ?>" href="#">
                                                                <span class="badge bg-danger">Decline</span>
                                                              </a>
                                                          </td>
                                                          <td class="removehomeworkBtn" id="<?php echo $homework->homework_id; ?>"> 
                                                              <a href="#">
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
                            </div>
                        </div>
                        <div class="card height-auto mt-4">
                            <div class="card-body-new">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Homeworks submitted (admin sent to the students)</h3>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table display data-table text-nowrap text-center">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input checkAll">
                                                        <label class="form-check-label"></label>
                                                    </div>
                                                </th>
                                                <th>Homework Title</th>
                                                <th>Student Name</th>
                                                <th>Student Grade</th>
                                                <th>Subject</th>
                                                <th>Last date submission</th>
                                                <th>Student submitted at</th>
                                                <th>Admin Uploaded</th>
                                                <th>Download</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($submitted_homeworks)) {
                                                if ($submitted_homeworks != 0) {
                                                    $i = 1;
                                                    foreach($submitted_homeworks as $homework)
                                                    { ?>
                                                    
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input">
                                                                <label class="form-check-label"><?php echo $i; ?></label>
                                                            </div>
                                                        </td>
                                                        <td><?php echo $homework->h_title; ?></td>
                                                        <td>
                                                          <?php 
                                                                if (isset($users_students) && $users_students != 0){
                                                                    foreach ($users_students as $student) {
                                                                        if($student->user_student_id == $homework->student)
                                                                        {
                                                                            echo $student->name;
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
                                                                        if($grade->grade_id == $homework->grade)
                                                                        {
                                                                            echo $grade->grade_name;
                                                                            break;
                                                                        } 
                                                                    }
                                                                }
                                                            ?>    
                                                        </td>
                                                        <td>
                                                            <?php 
                                                            if (isset($subjects) && $subjects != 0){
                                                                foreach ($subjects as $subject) {
                                                                    if($subject->subject_id == $homework->subject)
                                                                    {
                                                                        echo $subject->subject_name;
                                                                        break;
                                                                    } 
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php echo $homework->last_date_submission; ?></td>
                                                        <td><?php echo $homework->student_submitted_at; ?></td>
                                                        
                                                        <td>
                                                              <a href="<?php echo base_url($homework->h_file); ?>" download>
                                                                <span class="badge bg-danger">Download</span>
                                                              </a>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url($homework->student_submitted_file); ?>" download>
                                                            <span class="badge bg-danger">Download</span>
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
   $(".removehomeworkBtn").click(function(){
      var verify = confirm("Are you sure you want to delete this?  Once deleted would not be recreated ?");
      if (verify == true) {
        var id = $(this).attr('id');
        window.location.href = "<?php echo base_url().'/admin/delete_homework/'?>"+id;
      } else {}
    })

    $(".approvehomeworkBtn").click(function(){
      var verify = confirm("Approve this homework?");
      if (verify == true) {
        var id = $(this).attr('id');
        window.location.href = "<?php echo base_url().'/admin/approve_homework/'?>"+id;
      } else {
      }
    })
      
    $(".declinehomeworkBtn").click(function(){
      var verify = confirm("Decline this homework?");
      if (verify == true) {
        var id = $(this).attr('id');
        window.location.href = "<?php echo base_url().'/admin/decline_homework/'?>"+id;
      } else {
      }
    })
    
    function getSubjectsHomework()
    {
        var conceptName = $('.stdSelected').find(":selected").val();
        // alert(conceptName)
        $.ajax({
              type:'post',
              url:"<?php echo base_url('admin/getSubjects');?>",
              data:{
                id:conceptName
              },
              dataType:'json',
              cache:false,
              success: function(data){
                  if(data == '1'){
                    $('.fillsubjectsHere').text("")
                    alert('No subjects with this student !')
                  }else{
                    $('.fillsubjectsHere').text("")
                    $('.fillsubjectsHere').append('<Option value="">Select Subjects here.. </Option>')
                    
                  //   var myKeys = Object.keys(data)
                    var totalKeys = Object.keys(data).length
                    var myValues = Object.values(data)
                    // console.log(data)
                    for (let i = 0; i < totalKeys; i++) {
                      var values = myValues[i]
                      // var keys = myValues[i]
                      console.log(values)
                      $('.fillsubjectsHere').append('<Option value="'+values[1]+'">'+values[0]+'</Option>');
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
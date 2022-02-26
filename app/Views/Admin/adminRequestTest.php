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
                    <h3>Test </h3>
                    <ul>
                        <li>
                            <a href="index4.html">Home</a>
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
                                        <h3>Send Test</h3>
                                    </div>
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
                                <form action="<?php echo base_url('admin/upload_tests'); ?>" method="post" class="border border-soild p-3" enctype="multipart/form-data">
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
                                        <select class="fillStudents form-select stdSelected"  name="student" aria-label="" onchange="fetchStudentsSubjects()">
                                            <option value="">Select Grade first</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="mb-3">
                                        <label class="form-label">Subject</label>
                                        <select class="fillSubjects form-select" name="subject" aria-label="">
                                            <option value="">Select Grade first</option>
                                        </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="mb-3">
                                        <label for="inputUploadDocument" class="form-label">Upload test document</label>
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
                                        <h3>Test</h3>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table display data-table text-nowrap">
                                        <thead>
                                            <?php if (isset($test_approved_status) && $test_approved_status == '1') {
                                                echo '<div>Test approved and sent to the student !</div>';
                                            } ?>
                                            <tr class="text-center">
                                                <th>
                                                </th>
                                                <th>Date</th>
                                                <th>Student Name</th>
                                                <th>Teacher Name</th>
                                                <th>Test</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                if (isset($tests_results)&& is_array($tests_results)) {
                                                    if (count($tests_results)> 0) {
                                                        foreach($tests_results as $tests_result){
                                                            ?>
                                                            <tr class="text-center">
                                                                <td>
                                                                    <div class="form-check">
                                                                    </div>
                                                                </td>
                                                                <td><?php echo $tests_result->created_at; ?></td>
                                                                <td><?php 
                                                                     if (isset($users_students) && $users_students != 0){
                                                                    foreach ($users_students as $student) {
                                                                        if($student->user_student_id == $tests_result->student)
                                                                        {
                                                                            echo $student->name;
                                                                            break;
                                                                        } 
                                                                    }
                                                                }
                                                                ?></td>
                                                                <td><?php  
                                                                    if (isset($users_teachers) && $users_teachers != 0){
                                                                        foreach ($users_teachers as $users_teacher) {
                                                                            if($users_teacher->user_teacher_id == $tests_result->teacher)
                                                                            {
                                                                                echo $users_teacher->name;
                                                                                break;
                                                                            } 
                                                                        }
                                                                    }
                                                                ?></td>
                                                                <td>
                                                                    <a href="<?php echo base_url($tests_result->h_file) ?>" download>
                                                                    <span class="badge bg-warning">Download</span>
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <a class="approveTestBtn" id="<?php echo $tests_result->test_id; ?>" href="#">
                                                                    <span class="badge bg-success">Approve</span>
                                                                    </a>
                                                                    <a href="#" >
                                                                    <span class="badge bg-danger">Delete</span>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <?php 
                                                            
                                                        }
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
     $(".approveTestBtn").click(function(){
      var verify = confirm("Approve this Test?");
      if (verify == true) {
        var id = $(this).attr('id');
        window.location.href = "<?php echo base_url().'/admin/approve_test/'?>"+id;
      } else {
      }
    })
      
</script>
</html>
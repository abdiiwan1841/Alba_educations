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
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
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
                    <h3>Student Attendence</h3>
                    <ul>
                        <li>
                            <a href="<?php echo base_url('admin/dashboard') ?>">Home</a>
                        </li>
                        <li>Student Attendence</li>
                    </ul>
                </div> 
               
                <div class="card height-auto mt-3">
                    <div class="card-body-new">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Student Attendence</h3>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap text-center">
                                <thead>
                                    <tr>
                                        <th>
                                            
                                        </th>
                                        <th>Name</th>
                                        <th>Subject</th>
                                        <th>Grade</th>
                                        <th>Attend Class</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        if (isset($stdAttendance)) {
                                        if ($stdAttendance != 0) {
                                            $i = 1;
                                            foreach($stdAttendance as $class_session)
                                            { ?>
                                            <tr>
                                                <td>
                                                    <?php echo $i; ?>
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
                                               <td><?php echo $class_session->totalAttendance;?></td>
                                                
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
                <!--  End Here -->

            </div>
        </div>
        <!-- Page Area End Here -->
    </div>
      <?php include('public/Admin/inc/foot.php'); ?>

</body>

</html>
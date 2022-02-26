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
                    <h3>Session History</h3>
                    <ul>
                        <li>
                            <a href="index4.html">Home</a>
                        </li>
                        <li>Session History</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- All Student Data Start Here -->
                <div class="card height-auto">
                    <div class="card-body-new">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Session History</h3>
                            </div>
                            
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap text-center">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Date</th>
                                        <th>Teacher Name</th>
                                        <th>Student Name</th>
                                        <th>started at</th>
                                        <th>Duration (in minutes)</th>
                                        <th>Subject</th>
                                        <th>Teacher remark</th>
                                        <th>Session status</th>
                                        <th>Topic covered</th>
                                        <th>Next topic</th>
                                        <th>Homework status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                            $i = 1;
                            foreach ($all_sessions as $all_session) {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $all_session->for_date; ?></td>
                                    <td>
                                        <?php 
                                            if (isset($users_teachers) && $users_teachers != 0){
                                                foreach ($users_teachers as $user_teacher) {
                                                    if($user_teacher->user_teacher_id == $all_session->teacher)
                                                    {
                                                        echo $user_teacher->name;
                                                        break;
                                                    } 
                                                }
                                            };
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            if (isset($users_students) && $users_students != 0){
                                                foreach ($users_students as $users_student) {
                                                    if($users_student->user_student_id == $all_session->student)
                                                    {
                                                        echo $users_student->name;
                                                        break;
                                                    } 
                                                }
                                            };
                                        ?>
                                    </td>
                                    <td><?php echo $all_session->strt_time; ?></td>
                                    <td><?php echo $all_session->timing; ?></td>
                                    <td>
                                        <?php 
                                            if (isset($subjects) && $subjects != 0){
                                                foreach ($subjects as $subject) {
                                                    if($subject->subject_id == $all_session->subject)
                                                    {
                                                        echo $subject->subject_name;
                                                        break;
                                                    } 
                                                }
                                            };
                                        ?>
                                    </td>
                                    <td><?php echo $all_session->remarks; ?></td>
                                    <td>
                                        <?php  
                                        if ($all_session->sessionStatus == '1') {
                                            echo 'Present';
                                        }elseif ($all_session->sessionStatus == '2') {
                                            echo 'Absent';
                                        }elseif ($all_session->sessionStatus == '2') {
                                            echo 'NULL & VOID';
                                        }else{
                                            echo 'NA';
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $all_session->topic_covered; ?></td>
                                    <td><?php echo $all_session->next_topic; ?></td>
                                    <td> 
                                        <?php  
                                        if ($all_session->homework_status == '1') {
                                            echo 'Done';
                                        }elseif ($all_session->homework_status == '2') {
                                            echo 'Not done';
                                        }
                                        ?>
                                    </td>
                                    
                                </tr>
                                <?php 
                                $i++;
                              }
                            
                          ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- All Student Data End Here -->

            </div>
        </div>
        <!-- Page Area End Here -->
    </div>
<?php include('public/Admin/inc/foot.php'); ?>
</body>

</html>


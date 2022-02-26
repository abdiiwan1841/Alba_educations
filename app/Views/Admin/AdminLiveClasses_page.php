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
                    <h3>Live Classes</h3>
                    <ul>
                        <li>
                            <a href="<?php echo base_url(); ?>">Home</a>
                        </li>
                        <li>Classes</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!--  Start Here -->
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                        <div class="card height-auto">
                            <div class="card-body-new">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Add Live Class</h3>
                                    </div>
                                   
                                </div>
                                <form class="mg-b-20" method="post" action="<?php echo base_url('admin/add_LiveClasses'); ?>">
                                    <?php
                                    if (isset($reg_error)) {
                                    ?>
                                        <div class="form-group text-danger"><?php print_r($reg_error); ?></div>
                                    <?php
                                    };
                                    if (isset($message)) {
                                    ?>
                                        <div class="form-group text-success"><?php print_r($message); ?></div>
                                    <?php
                                    };
                                    ?>
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Title</label>
                                                <span class="required">*</span>
                                                <input type="text" name="title" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Date</label>
                                                <span class="required">*</span>
                                                <input type="date" name="for_date" class="form-control" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Grade</label>
                                                <span class="required">*</span>
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
                                                <label for="" class="form-label">Student Name</label>
                                                <span class="required">*</span>
                                                <select class="fillStudents stdSelected form-select" onchange="fetchStudentsSubjects()" name="student" aria-label="">
                                                    <option value="">Select Grade first</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Subject</label>
                                                <span class="required">*</span>
                                                <select class="fillSubjects form-select selectedSubject" onchange="getTeachers()" name="subject" aria-label="">
                                                    <option value="">Select student first</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Teacher Name</label>
                                                <span class="required">*</span>
                                                <select class="form-select fillTeachers" name="teacher" aria-label="">
                                                    <option selected>Select Subject Name</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Start Time</label>
                                                <span class="required">*</span>
                                                <input type="time" name="strt_time" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Duration (in minutes)</label>
                                                <span class="required">*</span>
                                                <input type="number" name="time" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 form-group mg-t-8">
                                            <button type="submit" class="btn-fill-lg btn-gradient-main btn-hover-bluedark">Submit</button>
                                            <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-main">Reset</button>
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
                                        <h3>Live Classes</h3>
                                    </div>
                                   
                                </div>
                               
                                <div class="table-responsive">
                                    <table class="table display data-table text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input checkAll">
                                                        <label class="form-check-label"></label>
                                                    </div>
                                                </th>
                                                <th>Title</th>
                                                <th>Teacher Name</th>
                                                <th>Subject Name</th>
                                                <th>Student Name</th>
                                                <th>Grade</th> 
                                                <th>Date</th>
                                                <th>Start Time</th>
                                                <th>Duration</th>
                                                <th>Created at</th>
                                                <th>Zoom Link</th>
                                                <th></th>
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
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input">
                                                        <label class="form-check-label"><?php echo $i; ?></label>
                                                    </div>
                                                </td>
                                                <td><?php echo $class_session->title;?></td>
                                                <td>
                                                    <?php 
                                                    if (isset($users_teachers) && $users_teachers != 0){
                                                        foreach ($users_teachers as $users_teacher) {
                                                            if($users_teacher->user_teacher_id == $class_session->teacher)
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
                                                <td><?php echo $class_session->for_date;?></td>
                                                <td><?php echo $class_session->strt_time;?></td>
                                                <td><?php echo $class_session->timing;?>Min</td>
                                                <td><?php echo date('d-M-y', strtotime($class_session->created_at));?></td>
                                                <td>
                                                    <a href="<?php echo $class_session->zoom_link;?>" target="_blank">
                                                        <span class="badge bg-warning text-dark">Link</span>
                                                    </a>
                                                </td>
                                                <td class="removeBtn" > 
                                                    <a href="#" >
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
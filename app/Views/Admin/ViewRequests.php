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
                    <h3>Requests</h3>
                    <ul>
                        <li>
                            <a href="index4.html">Home</a>
                        </li>
                        <li>Requests</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Dashboard summery Start Here -->
                <div class="row ">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-green d-flex align-items-center justify-content-center ">
                                        <i class="fas fa-book-open text-green"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Homework</div>
                                        <div class="item-number"><span class="counter" data-num="5">5</span></div>
                                        <a href="<?php echo base_url('admin/adminRequestHomework') ?>">
                                            <span class="badge bg-success">View</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-blue d-flex align-items-center justify-content-center ">
                                        <i class="fas fa-book-reader text-blue"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Test Results</div>
                                        <div class="item-number"><span class="counter" data-num="2250">2,250</span></div>
                                        <a href="<?php echo base_url('admin/adminRequestTestresults') ?>">
                                            <span class="badge bg-success">View</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-yellow d-flex align-items-center justify-content-center">
                                        <i class="fas fa-file-alt text-orange"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Test</div>
                                        <div class="item-number"><span class="counter" data-num="5690">5,690</span></div>
                                        <a href="<?php echo base_url('admin/adminRequestTest') ?>">
                                            <span class="badge bg-success">View</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-red d-flex align-items-center justify-content-center">
                                        <i class="far fa-list-alt text-red"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Quiz</div>
                                        <div class="item-number"><span></span><span class="counter" data-num="1930">1,930</span></div>
                                        <a href="<?php echo base_url('admin/adminRequestQuiz') ?>">
                                            <span class="badge bg-success">View</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-green d-flex align-items-center justify-content-center ">
                                        <i class="fas fa-book-open text-green"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Report Card</div>
                                        <div class="item-number"><span class="counter" data-num="5">5</span></div>
                                        <a href="<?php echo base_url('admin/adminRequestReportCard') ?>">
                                            <span class="badge bg-success">View</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-red d-flex align-items-center justify-content-center ">
                                        <i class="fas fa-book text-red"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Study Material</div>
                                        <div class="item-number"><span class="counter" data-num="2250">2,250</span></div>
                                        <a href="<?php echo base_url('admin/adminRequestStudyMaterial') ?>">
                                            <span class="badge bg-success">View</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-blue d-flex align-items-center justify-content-center ">
                                        <i class="far fa-edit text-blue"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Performance</div>
                                        <div class="item-number"><span class="counter" data-num="2250">2,250</span></div>
                                        <a href="<?php echo base_url('admin/adminRequestPerformance') ?>">
                                            <span class="badge bg-success">View</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-yellow d-flex align-items-center justify-content-center">
                                        <i class="far fa-comment-dots text-orange"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Teacher Feedback</div>
                                        <div class="item-number"><span class="counter" data-num="5690">5,690</span></div>
                                        <a href="<?php echo base_url('admin/adminRequestTeacherFeedback') ?>">
                                            <span class="badge bg-success">View</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-magenta d-flex align-items-center justify-content-center">
                                        <i class="fas fa-book-reader text-magenta"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Class Schedule </div>
                                        <div class="item-number"><span></span><span class="counter" data-num="193000">1,93,000</span></div>
                                        <a href="<?php echo base_url('admin/adminRequestRescheduleClass') ?>">
                                            <span class="badge bg-success">View</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-blue d-flex align-items-center justify-content-center">
                                        <i class="far fa-list-alt text-blue"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Teacher Curriculum</div>
                                        <div class="item-number"><span></span><span class="counter" data-num="1930">3,930</span></div>
                                        <a href="#">
                                            <span class="badge bg-success">View</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Page Content End Here -->
            </div>
        </div>
        <!-- Page Area End Here -->
    </div>
    <?php include('public/Admin/inc/foot.php'); ?>
</body>

</html>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Alba Educations | Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                    <h3>Admin Dashboard</h3>
                    <ul>
                        <li>
                            <a href="<?php echo base_url(); ?>">Home</a>
                        </li>
                        <li>Admin</li>
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
                                        <a href="<?php echo base_url('admin/adminAllStudents') ?>" class="d-flex align-items-center justify-content-center"><i class="far fa-user text-green"></i></a> 
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <a href="<?php echo base_url('admin/adminAllStudents') ?>" class="item-title">Students</a>
                                        <div class="item-number"><span class="counter" data-num="<?php if (isset($total_std)) { echo $total_std; } ?>"><?php if (isset($total_std)) { echo $total_std; } ?></span></div>
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
                                    <a href="<?php echo base_url('admin/adminAllTeacher'); ?>" class="d-flex align-items-center justify-content-center"><i class="fas fa-users text-blue"></i></a>
                                        
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <a href="<?php echo base_url('admin/adminAllTeacher'); ?>" class="item-title">Teachers</a>
                                        <div class="item-number"><span class="counter" data-num="<?php if (isset($total_tchrs)) { echo $total_tchrs; } ?>"><?php if (isset($total_tchrs)) { echo $total_tchrs; } ?></span></div>
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
                                    <a href="<?php echo base_url('admin/adminViewRequest') ?>" class="d-flex align-items-center justify-content-center"><i class="fas fa-file-alt text-orange"></i></a>
                                        
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <a href="<?php echo base_url('admin/adminViewRequest') ?>" class="item-title">Request Review</a>
                                        <div class="item-number"><span class="counter" data-num="<?php if (isset($total_std)) { echo $total_std; } ?>"><?php if (isset($total_std)) { echo $total_std; } ?></span></div>
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
                                    <a href="#" class="d-flex align-items-center justify-content-center"><i class="far fa-list-alt text-red"></i></a>
                                        
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <a href="<?php echo base_url('admin/adminStudentBilling') ?>" class="item-title">Billing</a>
                                        <div class="item-number"><span></span><span class="counter" data-num="<?php if (isset($total_std)) { echo $total_std; } ?>"><?php if (isset($total_std)) { echo $total_std; } ?></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Dashboard summery End Here -->
                <!-- Dashboard Content Start Here -->
                <div class="row ">
                    <div class="col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12 ">
                    <div class="card card-new dashboard-card-four pd-b-20">
                            <div class="card-body-new">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Event Calender</h3>
                                    </div>
                                </div>
                                <div class="calender-wrap">
                                    <div id="fc-calender" class="fc-calender"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-3 col-lg-3 col-md-3 col-sm-12 ">
                        <div class="card card-new dashboard-card-six pd-b-20">
                            <div class="card-body-new sectionpart-noticeBoard m-0">
                                <div class="heading-layout1 ">
                                    <div class="item-title">
                                        <h3>Notice Board</h3>
                                    </div>
                                </div>
                                <img src="<?php echo base_url('/public/Admin/images/image9.png') ?>" alt="">
                                <marquee width="100%" direction="up" height="200px" scrollamount="3" onMouseOver="this.stop()" onMouseOut="this.start()">
                                    <ul class="p-0 m-0">
                                    <li>
                                        <a href="#">
                                        
                                        </a>
                                    </li>
                                    
                                    </ul>
                                </marquee>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-3 col-lg-3 col-md-3 col-sm-12 ">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-green d-flex align-items-center justify-content-center">
                                    <a href="#" class="d-flex align-items-center justify-content-center"><i class="fas fa-certificate text-green"></i></a>
                                        
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <a href="<?php echo base_url('admin/adminStudentCertification') ?>" class="item-title">Certificates</a>
                                        <div class="item-number"><span></span><span class="counter" data-num="<?php if (isset($total_std)) { echo $total_std; } ?>"><?php if (isset($total_std)) { echo $total_std; } ?></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="card card-new dashboard-card-three pd-b-20">-->
                        <!--    <div class="card-body-new">-->
                        <!--        <div class="heading-layout1">-->
                        <!--            <div class="item-title">-->
                        <!--                <h3>Certificates</h3>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--        <div class="doughnut-chart-wrap">-->
                        <!--            <canvas id="student-doughnut-chart" width="100" height="300"></canvas>-->
                        <!--        </div>-->
                        <!--        <div class="student-report">-->
                        <!--            <div class="student-count pseudo-bg-blue">-->
                        <!--                <h4 class="item-title">Female Students</h4>-->
                        <!--                <div class="item-number">45,000</div>-->
                        <!--            </div>-->
                        <!--            <div class="student-count pseudo-bg-yellow">-->
                        <!--                <h4 class="item-title">Male Students</h4>-->
                        <!--                <div class="item-number">1,05,000</div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>

                </div>
                <!-- Dashboard Content End Here -->
            </div>
        </div>
        <!-- Page Area End Here -->
    </div>
    <?php include('public/Admin/inc/foot.php'); ?>
</body>

</html>
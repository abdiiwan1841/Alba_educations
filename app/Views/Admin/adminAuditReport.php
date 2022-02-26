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
                    <h3>Audit Report</h3>
                    <ul>
                        <li>
                            <a href="<?php echo base_url('admin') ?>">Home</a>
                        </li>
                        <li>Audit Report</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- All Student Data Start Here -->
                <div class="card height-auto">
                    <div class="card-body-new">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Audit Report</h3>
                            </div>
                            
                        </div>
                       
                        <div class="table-responsive">
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
                                <form class="mg-b-20" method="POST" action="<?php echo base_url('admin/audit_report');?> " enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Teacher</label>
                                                <span class="required">*</span>
                                                <select class="fillStudents stdSelected form-select" name="teacher" aria-label="">
                                                    <option value="">Select here..</option>
                                                    <?php 
                                                        if (isset($users_teachers)) {
                                                            foreach($users_teachers as $users_teacher){
                                                                ?>
                                                                <option value="<?php echo $users_teacher->user_teacher_id; ?>"><?php echo $users_teacher->name; ?></option>
                                                                <?php 
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </div> 
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                          <div class="mb-3">
                                            <label for="postTitle" class="form-label">Comment</label>
                                            <span class="required">*</span>
                                            <input type="text" class="form-control" name="comment" >
                                          </div>
                                        </div>
                                        <div class="col-12 form-group mg-t-8">
                                            <button type="submit" class="btn-fill-lg btn-gradient-main btn-hover-bluedark">Save</button>
                                            <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-main">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            <table class="table display data-table text-center text-nowrap">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check">
                                            </div>
                                        </th>
                                        <th>Teacher Name</th>
                                        <th>Comment</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                      
                        if (isset($admin_audit_report) && is_array($admin_audit_report)) {
                          if (count($admin_audit_report) > 0) {
                           
                          foreach($admin_audit_report as $report){
                          ?>
                          <tr>
                            <td>
                                <div class="form-check">
                                </div>
                            </td>
                            <td>
                                <?php  
                                if (isset($users_teachers)) {
                                    foreach($users_teachers as $users_teacher){
                                        if ($users_teacher->user_teacher_id == $report->teacher) {
                                            echo $users_teacher->name;
                                            break;
                                        }
                                    }
                                }
                                ?>
                            </td>
                            <td><?php echo $report->teacher_reply; ?></td>
                            <td class="removeBtn" > 
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
                <!-- All Student Data End Here -->
            </div>
        </div>
        <!-- Page Area End Here -->
    </div>
      <?php include('public/Admin/inc/foot.php'); ?>
</body>

</html>


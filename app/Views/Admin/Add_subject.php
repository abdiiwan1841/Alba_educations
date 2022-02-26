<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Alba Educations | Subjects</title>
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
                    <h3>Add Subjects</h3>
                    <ul>
                        <li>
                            <a href="<?php echo base_url('admin'); ?>">Home</a>
                        </li>
                        <li>Add subjects</li>
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
                                        <h3>Add Subject</h3>
                                        <span>(To all classes/categories)</span>
                                    </div>
                                    
                                </div>
                                <?php
                                if (isset($reg_error_g)) {
                                ?>
                                    <div class="form-group text-danger"><?php print_r($reg_error_g); ?></div>
                                <?php
                                };
                                if (isset($message_g)) {
                                ?>
                                    <div class="form-group text-success"><?php print_r($message_g); ?></div>
                                <?php
                                };
                                ?>
                                <form class="mg-b-20" method="POST" action="<?php echo base_url('admin/add_new_subject_globaly');?> " enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                          <div class="mb-3">
                                            <label for="postTitle" class="form-label">Subject name</label>
                                            <span class="required">*</span>
                                            <input type="text" class="form-control" name="subject" >
                                          </div>
                                        </div>
                                        <div class="col-12 form-group mg-t-8">
                                            <button type="submit" class="btn-fill-lg btn-gradient-main btn-hover-bluedark">Save</button>
                                            <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-main">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body-new mt-3">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Add New Subject</h3>
                                    </div>
                                    
                                </div>
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
                                <form class="mg-b-20" method="POST" action="<?php echo base_url('admin/add_new_subject');?> " enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Grade (Category)</label>
                                                <span class="required">*</span>
                                                <select class="fillStudents stdSelected form-select" name="grade" aria-label="">
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
                                            <label for="postTitle" class="form-label">Subject name</label>
                                            <span class="required">*</span>
                                            <input type="text" class="form-control" name="subject" >
                                          </div>
                                        </div>
                                        <div class="col-12 form-group mg-t-8">
                                            <button type="submit" class="btn-fill-lg btn-gradient-main btn-hover-bluedark">Save</button>
                                            <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-main">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 " style="height: 75vh; overflow:scroll;">
                        <div class="card height-auto">
                            <div class="card-body-new">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>All Subjects</h3>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table display data-table text-center text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="form-check">
                                                        <label class="form-check-label"></label>
                                                    </div>
                                                </th>
                                                <th>Grade (Category)</th>
                                                <th>Subject name</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($grades_subjects)) {
                                                if ($grades_subjects != 0) {
                                                    $i = 1;
                                                    foreach($grades_subjects as $grades_subject)
                                                    { ?>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <label class="form-check-label"><?php echo $i; ?></label>
                                                            </div>
                                                        </td>
                                                         <td>
                                                            <?php 
                                                                if (isset($grades) && $grades != 0){
                                                                    foreach ($grades as $grade) {
                                                                        if($grade->grade_id == $grades_subject->grade_id)
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
                                                                    if($subject->subject_id == $grades_subject->subject_id)
                                                                    {
                                                                        echo $subject->subject_name;
                                                                        break;
                                                                    } 
                                                                }
                                                            }
                                                            ?>
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
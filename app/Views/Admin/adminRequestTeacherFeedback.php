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
                    <h3>Teacher Feedback</h3>
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
                    <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12">
                        <div class="card height-auto">
                            <div class="card-body-new">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>All Data</h3>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table display data-table text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="form-check">
                                                    </div>
                                                </th>
                                                <th>Date</th>
                                                <th>Student Name</th>
                                                <th>Teacher Name</th>
                                                <th>FeedBack</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if (isset($teacher_feedback)&& is_array($teacher_feedback)) {
                                                if (count($teacher_feedback) > 0) {
                                                    foreach($teacher_feedback as $feedback)
                                                    {?>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    </div>
                                                            </td>
                                                            <td>12-12-2021</td>
                                                            <td><?php  
                                                             if (isset($users_students) && $users_students != 0){
                                                                    foreach ($users_students as $student) {
                                                                        if($student->user_student_id == $feedback->student)
                                                                        {
                                                                            echo $student->name;
                                                                            break;
                                                                        } 
                                                                    }
                                                                }
                                                            ?></td>
                                                            <td><?php echo $feedback->teacher; ?></td>
                                                            <td><?php echo $feedback->feedback; ?></td>
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
                    </div>
                </div>
                <!-- End Here -->
            </div>
        </div>
        <!-- Page Area End Here -->
    </div>
        <?php include('public/Admin/inc/foot.php'); ?>

</body>

</html>
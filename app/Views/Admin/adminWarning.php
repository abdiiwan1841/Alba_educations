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
        <?php  include('public/Admin/inc/head.php') ?>
</head>

<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper bg-ash">
       <!-- Header Menu Area Start Here -->
        <?php  include('public/Admin/inc/topbar.php') ?>
        
        <!-- Header Menu Area End Here -->
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
            <!-- Sidebar Area Start Here -->
            <?php  include('public/Admin/inc/sidebar.php')?>
            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Warning</h3>
                    <ul>
                        <li>
                            <a href="index4.html">Home</a>
                        </li>
                        <li>Warning</li>
                    </ul>
                </div>  

                <h3>This will be done after smtp setup as the mail will be sent to the teacher .......</h3>
                <!-- Breadcubs Area End Here -->
                <!--  Start Here -->
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                        <div class="card height-auto">
                            <div class="card-body-new">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Give Warning</h3>
                                    </div>
                                </div>
                                <form class="mg-b-20" action="<?php echo base_url('admin/send_warning_to_teacher'); ?>" method="POST">
                                    <?php 
                                    if(isset($email_res)){
                                        echo '<div>'.$email_res.'</div>';
                                    }
                                    if(isset($formError)){
                                        echo '<div class="text-danger">'.$formError.'</div>';
                                    }
                                    
                                    
                                    ?>
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Teacher Name</label>
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
                                                <label for="" class="form-label">Email</label>
                                                <span class="required">*</span>
                                                <input type="email" class="form-control" name="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Message</label>
                                                <span class="required">*</span>
                                                <textarea class="form-control" name="message" placeholder="Message"></textarea>

                                            </div>
                                        </div>
                                        <div class="col-12 form-group mg-t-8">
                                            <button type="submit" class="btn-fill-lg btn-gradient-main btn-hover-bluedark">Send</button>
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
                                        <h3>All Warnings</h3>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table display data-table text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="form-check">
                                                        <!--<input type="checkbox" class="form-check-input checkAll">-->
                                                        <!--<label class="form-check-label">#</label>-->
                                                    </div>
                                                </th>
                                                <th>Teacher Name</th>
                                                <th>Email</th>
                                                <th>Message</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input">
                                                        <label class="form-check-label">1</label>
                                                    </div>
                                                </td>
                                                <td>Teacher Name</td>
                                                <td>Email</td>
                                                <td>Messages...</td>
                                                <td class="removeBtn" > 
                                                    <a href="#" >
                                                      <span class="badge bg-danger">Delete</span>
                                                    </a>
                                                </td>
                                            </tr>
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
   <?php  include('public/Admin/inc/foot.php') ?>


</body>

</html>
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
                    <h3>Workbook Subscription</h3>
                    <ul>
                        <li>
                            <a href="<?php echo base_url('admin/') ?>">Home</a>
                        </li>
                        <li>Regular Plan</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- All Student Data Start Here -->
                <div class="card height-auto">
                    <div class="card-body-new">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Regular Plan</h3>
                            </div>
                         
                        </div>
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check">
                                                <label class="form-check-label">#</label>
                                            </div>
                                        </th>
                                        <th>Child Name</th>
                                        <th>Parent Name</th>
                                        <th>Email Address</th>
                                        <th>Phone</th>
                                        <th>Grade</th>
                                        <th>Subject</th>
                                        <th>Topic</th>
                                        <th>Subscribed at</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php
                                        if (isset($regular_plan) && is_array($regular_plan)) {
                                            if (count($regular_plan) > 0) {
                                                $i = 1;
                                                foreach($regular_plan as $regular)
                                                {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                
                                                                <label class="form-check-label"><?php echo $i; ?></label>
                                                            </div>
                                                        </td>
                                                        <td><?php echo $regular->name; ?></td>
                                                        <td><?php echo $regular->parentName; ?></td>
                                                        <td><?php echo $regular->email; ?></td>
                                                        <td><?php echo $regular->phone; ?></td>
                                                        <td><?php echo $regular->grade; ?></td>
                                                        <td><?php echo $regular->subject; ?></td>
                                                        <td><?php echo $regular->topic; ?></td>
                                                        <td><?php echo $regular->created_at; ?></td>
                                                        
                                                        <td class="removeBtn" > 
                                                            <a href="#" >
                                                            <span class="badge bg-danger">Delete</span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php $i++;
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


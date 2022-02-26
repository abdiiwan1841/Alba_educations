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
                    <h3>Assignments</h3>
                    <ul>
                        <li>
                            <a href="<?php echo base_url(); ?>">Home</a>
                        </li>
                        <li>Assignment Help</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- All Student Data Start Here -->
                <div class="card height-auto">
                    <div class="card-body-new">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Assignment Help</h3>
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
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email </th>
                                        <th>Phone</th>
                                        <th>Subject</th>
                                        <th>Grade</th>
                                        <th>Assignment Type</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Time Zone</th>
                                        <th>Budget</th>
                                        <th>Currency</th>
                                        <th>File</th>
                                        <th>Description</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if (isset($assignment_helps)) {
                                        if ($assignment_helps != 0) { $i=1;
                                            foreach($assignment_helps as $assignment_help)
                                            {
                                            ?>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input">
                                                        <label class="form-check-label"><?php echo $i; ?></label>
                                                    </div>
                                                </td>
                                                <td><?php echo $assignment_help->first_name; ?></td>
                                                <td><?php echo $assignment_help->last_name; ?></td>
                                                <td><?php echo $assignment_help->email; ?></td>
                                                <td><?php echo $assignment_help->phone; ?></td>
                                                <td><?php echo $assignment_help->subject; ?></td>
                                                <td><?php echo $assignment_help->grade; ?></td>
                                                <td><?php 
                                                if ($assignment_help->assignment_type == 1) {
                                                    echo 'Projects';
                                                }elseif ($assignment_help->assignment_type == 2) {
                                                    echo 'Thesis'; 
                                                }elseif ($assignment_help->assignment_type == 3) {
                                                    echo 'Dissertation'; 
                                                }elseif ($assignment_help->assignment_type == 4) {
                                                    echo 'Essays'; 
                                                }elseif ($assignment_help->assignment_type == 5) {
                                                    echo 'Homeworks'; 
                                                }
                                                
                                                ?></td>
                                                <td><?php echo $assignment_help->due_date; ?></td>
                                                <td><?php echo $assignment_help->due_time; ?></td>
                                                <td><?php echo $assignment_help->time_zone; ?></td>
                                                <td><?php echo $assignment_help->budget; ?></td>
                                                <td><?php  
                                                if ($assignment_help->currency_type == 1) {
                                                    echo 'US';
                                                }elseif ($assignment_help->currency_type == 2) {
                                                    echo 'GBP'; 
                                                }elseif ($assignment_help->currency_type == 3) {
                                                    echo 'SGD'; 
                                                }elseif ($assignment_help->currency_type == 4) {
                                                    echo 'AUD'; 
                                                }elseif ($assignment_help->currency_type == 5) {
                                                    echo 'C / CAD'; 
                                                }elseif ($assignment_help->currency_type == 6) {
                                                    echo 'INR'; 
                                                }
                                                ?></td>
                                                <td>
                                                    <a href="<?php echo $assignment_help->attached_file; ?>">
                                                        <span class="badge bg-danger">Download</span>
                                                    </a>
                                                </td>
                                                <td><?php echo $assignment_help->asignment_description; ?></td>
                                                <td class="removeBtn" > 
                                                    <a href="<?php echo $assignment_help->id; ?>" >
                                                    <span class="badge bg-danger">Delete</span>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php $i++;
                                            }
                                        }else {
                                            echo 'No data available !';
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


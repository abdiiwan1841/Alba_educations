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
                    <h3>Billing</h3>
                    <ul>
                        <li>
                            <a href="index4.html">Home</a>
                        </li>
                        <li>Students</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- All Student Data Start Here -->
                <div class="card height-auto">
                    <div class="card-body-new">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>All Students Data</h3>
                            </div>
                          
                        </div>
                        
                        <div class="table-responsive">
                            
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check">
                                                <label class="form-check-label"></label>
                                            </div>
                                        </th>
                                        <th>Name</th>
                                        <th>Grade</th>
                                        <th>Subject</th>
                                        <th>Attend Class</th>
                                        <th>Amount per Class</th>
                                        <th>Total</th>
                                        <th>Payment Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                
                                if (isset($respo)) {
                                    if ($respo != 0) {
                                        $i = 1;
                                        foreach($respo as $respo)
                                        { 
                                           
                                            ?>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label"><?php echo $i; ?></label>
                                                </div>
                                            </td>
                                            <td><?php echo $respo->name; ?></td>
                                            <td>
                                                <?php 
                                                    if (isset($grades) && $grades != 0){
                                                        foreach ($grades as $grade) {
                                                            if($grade->grade_id == $respo->grade)
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
                                                        if($subject->subject_id == $respo->subject)
                                                        {
                                                            echo $subject->subject_name;
                                                            break;
                                                        } 
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $respo->totalAttendance; ?></td>
                                            <td><?php echo $respo->feePerSession; ?></td>
                                            <td><?php echo $respo->feePerSession*$respo->totalAttendance; ?></td>
                                            <td>
                                                <!--<input type="text" class="btn bg-success text-light" value="Paid">    -->
                                                 <a class="badge bg-success text-light" value="Paid">Paid</a>
                                            
                                            </td>
                                            <!-- <form action="<?php echo base_url('admin/finalStdBill');?>" method="POST">
                                            <td>
                                                
                                                <input class="form-control" type="number" name="Amount">
                                                <input class="form-control" type="hidden" name="student_id" value="<?php echo $respo->student; ?>">
                                            </td>   
                                            <td> 
                                                <input type="submit" class="btn bg-success text-light" value="Proceed">    
                                            </td>
                                            </form> -->
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
                <!-- All Student Data End Here -->

            </div>
        </div>
        <!-- Page Area End Here -->
    </div>
     <?php  include('public/Admin/inc/foot.php') ?>

</body>

</html>


<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Alba Educations | Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <?php include('public/Admin/inc/head.php');?>
</head>
<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper bg-ash">
       <!-- Header Menu Area Start Here -->
        <?php include('public/Admin/inc/topbar.php');?>
        <!-- Header Menu Area End Here -->
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
            <!-- Sidebar Area Start Here -->
            <?php include('public/Admin/inc/sidebar.php');?>
            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Teachers</h3>
                    <ul>
                        <li>
                            <a href="<?php echo base_url('/admin') ?>">Home</a>
                        </li>
                        <li>Teacher Registration</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!--  Start Here -->
                <div class="card height-auto">
                    <div class="card-body-new">
                        <form action="<?php echo base_url('admin/adminAddTeacher'); ?>" method="post" enctype="multipart/form-data">
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
                            <div class="heading-layout1">
                                <div class="item-title">
                                    <h3>Personal Details</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Teacher Name</label>
                                        <span class="required">*</span>
                                        <input type="text" class="form-control" name="name" id="" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Alias Name</label>
                                        <span class="required">*</span>
                                        <input type="text" class="form-control" name="aliasName" id="" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <div class="">
                                        <label for="" class="form-label">Gender</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" value="1" type="radio" name="gender" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="2" name="gender" id="flexRadioDefault2" >
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Female
                                    </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="3" name="gender" id="flexRadioDefault3"  >
                                    <label class="form-check-label" for="flexRadioDefault3">
                                        Other
                                    </label>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Email</label>
                                        <span class="required">*</span>
                                        <input type="email" name="email_main" class="form-control" id="" placeholder="Enter your email">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Address</label>
                                        <span class="required">*</span>
                                        <textarea class="form-control" id="" name="address" placeholder="Address"></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Phone Number</label>
                                        <span class="required">*</span>
                                        <input type="number" name="phone" class="form-control" id="" placeholder="Enter your Phone Number">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Date Of Birth</label>
                                        <span class="required">*</span>
                                        <input type="date" name="dob" class="form-control" id="" placeholder="Enter your Phone Number">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">City</label>
                                        <span class="required">*</span>
                                        <input type="text" name="city" class="form-control" id="" placeholder="Enter your City">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">State</label>
                                        <span class="required">*</span>
                                        <input type="text" name="state" class="form-control" id="" placeholder="Enter your State">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Country</label>
                                        <span class="required">*</span>
                                        <input type="text" name="country" class="form-control" id="" placeholder="Enter your Country">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Time Zone</label>
                                        <span class="required">*</span>
                                        <input type="text" name="timeZone" class="form-control" id="" placeholder="Enter your Time Zone">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Upload ID Proof</label>
                                        <span class="required">*</span>
                                        <input type="file" name="idProof" class="form-control" id="" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="heading-layout1">
                                <div class="item-title">
                                    <h3>Enrollment Details</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Registration Date</label>
                                        <span class="required">*</span>
                                        <input type="date" name="addmissiomDate" class="form-control" id="" placeholder="">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Current Session</label>
                                        <span class="required">*</span>
                                        <select class="form-select" name="currentSession"  aria-label="">
                                            <option selected>Select Current Session</option>
                                            <option value="1">2021-2020</option>
                                            <option value="2">2021-2022</option>
                                          </select>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Grade</label>
                                        <span class="required">*</span>
                                        <select class="form-select slectedOption" name="grade" aria-label="" onchange="getGradeSubjects()">
                                            <option>Select Grade</option>
                                            <?php 
                                            if (isset($grades) && $grades != 0){
                                                foreach ($grades as $grade) {
                                                    ?>
                                                    <option value="<?php echo $grade->grade_id; ?>"><?php echo $grade->grade_name; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                          </select>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="heading-layout1">
                                <div class="item-title">
                                    <h3>Assign Subjects Details / Fee</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Subjects</label>
                                        <span class="required">*</span>
                                        <div class=""></div>
                                        <select class="fillFormData fillGradeSubjects form-select" name="subject" aria-label="">
                                            <option value="">Select Grade first</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Fee Per session</label>
                                        <span class="required">*</span>
                                        <input type="text" class="form-control" name="feePerSession" id="" placeholder="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="heading-layout1">
                                <div class="item-title">
                                    <h3>Parent Details</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Father Name</label>
                                        <span class="required">*</span>
                                        <input type="text" class="form-control" name="fatherName" id="" placeholder="Enter Father Name" required>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label"> Father Phone Number</label>
                                        <span class="required">*</span>
                                        <input type="number" class="form-control" name="fatherPhone" id="" placeholder="Enter Father Phone Number">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Mother Name</label>
                                        <span class="required">*</span>
                                        <input type="text" class="form-control" name="motherName" id="" placeholder="Enter Mother Name" required>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label"> Mother Phone Number</label>
                                        <span class="required">*</span>
                                        <input type="number" class="form-control" name="motherPhone" id="" placeholder="Enter Mother Phone Number">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Upload Parent ID Proof</label>
                                        <span class="required">*</span>
                                        <input type="file" name="idProofParent" class="form-control" id="" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="heading-layout1">
                                <div class="item-title">
                                    <h3>Login Details</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">UserName</label>
                                        <span class="required">*</span>
                                        <input type="text" class="form-control" name="username" id="" placeholder="Enter UserName" required>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Login Email</label>
                                        <span class="required">*</span>
                                        <input type="email" class="form-control" name="email" id="" placeholder="Enter your Login Email">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Password</label>
                                        <span class="required">*</span>
                                        <input type="password" class="form-control" name="password" id="" placeholder="Enter Password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 form-group mg-t-8">
                                <button type="submit" name="submit" class="btn-fill-lg btn-gradient-main btn-hover-bluedark">Save</button>
                                <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-main">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--  End Here -->        
            </div>
        </div>
        <!-- Page Area End Here -->
    </div>
    <?php include('public/Admin/inc/foot.php');?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script>
    
    function getSubjects()
    {
        var conceptName = $('.slectedOption').find(":selected").val();
        // alert(conceptName)
        $.ajax({
              type:'post',
              url:"<?php echo base_url('admin/getSubjects');?>",
              data:{
                id:conceptName
              },
              dataType:'json',
              cache:false,
              success: function(data){
                  $('.fillFormData').text("")
                //   var myKeys = Object.keys(data)
                  var totalKeys = Object.keys(data).length
                  var myValues = Object.values(data)
                  for (let i = 0; i < totalKeys; i++) {
                      var myOptionVal = myValues[i]
                      if (myValues[i]== 1 || myValues[i]== 4 || myValues[i]== 3) {
                          myValues[i] = 'English'
                      }else if (myValues[i]== 2 || myValues[i]== 6) {
                          myValues[i] = 'Hindi'
                      }else if (myValues[i]== 5) {
                          myValues[i] = 'Mathematics'
                      }else if (myValues[i]== 7) {
                          myValues[i] = 'Science'
                      }else if (myValues[i]== 8) {
                          myValues[i] = 'Physics'
                      }else if (myValues[i]== 9) {
                          myValues[i] = 'History'
                      }
                    $('.fillFormData').append('<Option value="'+myOptionVal+'">'+myValues[i]+'</Option>');
                }
              },
              error:function(e){
                alert('ajax error');
              }
            })
    }
</script>
</body>

</html>
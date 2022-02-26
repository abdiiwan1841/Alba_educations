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
                    <h3>Quiz</h3>
                    <ul>
                        <li>
                            <a href="<?php echo base_url('/admin') ?>">Home</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/adminViewRequest') ?>">Requests</a>
                        </li>
                    </ul>
                </div>
                
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                        <div class="card height-auto">
                            <div class="card-body-new">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Add Quiz</h3>
                                    </div>
                                </div>
                                <form class="mg-b-20" method="post" action="<?php echo base_url('admin/create_quiz'); ?>">
                                    <div class="row">
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
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                          <div class="mb-3">
                                            <label class="form-label">Title</label>
                                            <input type="text" class="form-control" name="title">
                                          </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                          <div class="mb-3">
                                            <label class="form-label">Grade</label>
                                            <select class="form-select selectedClass" aria-label="" onchange="getAsignSubjects()" name="grade">
                                              <option selected>Select Grade</option>
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
                                            <label class="form-label">Subject</label>
                                            <select class="fillSubjects form-select" name="subject" aria-label="">
                                                <option value="">Select grade first..</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                          <div class="mb-3">
                                            <label class="form-label">Total marks</label>
                                            <input type="number" class="form-control" name="total_marks" >
                                          </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="mb-3">
                                            <input type="submit" value="Proceed" class="btn btn-danger">
                                              <!-- <a type="submit" href="<?php echo base_url('admin/adminAddQuiz') ?>" class="btn btn-danger">Proceed</a> -->
                                            </div>
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
                                      <h3>Admin created pending Quiz</h3>
                                  </div>
                              </div>
                              <div class="table-responsive">
                                  <table class="table display data-table text-nowrap">
                                      <thead class="text-center">
                                          <tr>
                                              <th>
                                                  <div class="form-check">
                                                   </div>
                                              </th>
                                              <th>Quiz title</th>
                                              <th>Grade</th>
                                              <th>Subject</th>
                                              <th>Total questions</th>
                                              <th>Total marks</th>
                                              <th>Date</th>
                                              <th>Verify</th>
                                          </tr>
                                      </thead>
                                      <tbody class="text-center">
                                        <?php 
                                        if (isset($pending_quizs) && is_array($pending_quizs)) {
                                          if (count($pending_quizs) > 0) {
                                            $i = 1;
                                            foreach($pending_quizs as $pending_quiz)
                                            {
                                              ?>
                                              <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <label class="form-check-label"><?php echo $i; ?></label>
                                                    </div>
                                                </td>
                                                <td><?php echo $pending_quiz->title; ?></td>
                                                <td><?php echo $pending_quiz->grade; ?></td>
                                                <td>
                                                  <?php  
                                                  if (isset($subjects) && $subjects != 0){
                                                      foreach ($subjects as $subject) {
                                                          if($subject->subject_id == $pending_quiz->subject)
                                                          {
                                                              echo $subject->subject_name;
                                                              break;
                                                          } 
                                                      }
                                                  }
                                                  ?>
                                                </td>
                                                <td><?php echo $pending_quiz->total_questions; ?></td>
                                                <td><?php echo $pending_quiz->total_marks; ?></td>
                                                <td><?php  
                                                  $update_date = $time=strtotime($pending_quiz->created_at) ; 
                                                          echo $month =date('M', $update_date).' ';
                                                          echo $date =date('d', $update_date).', ';
                                                          echo $year =date('Y', $update_date);
                                                ?></td>
                                                <td>
                                                  <a href="#" class='proceedToLive' id="<?php echo $pending_quiz->quiz_id; ?>">
                                                    <span class="badge bg-success">Proceed to live</span>
                                                  </a>
                                                  
                                                </td>
                                                <td > 
                                                    <a class="deleteAdminCreatedQuiz" href="#" id="<?php echo $pending_quiz->quiz_id; ?>" >
                                                      <span class="badge bg-danger">Delete</span>
                                                    </a>
                                                </td>
                                            </tr>    
                                              <?php 
                                              $i++;
                                            }
                                          }
                                        };
                                        ?>
                                          

                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                      <div class="card height-auto">
                          <div class="card-body-new">
                              <div class="heading-layout1">
                                  <div class="item-title">
                                      <h3>Pending Quiz</h3>
                                  </div>
                              </div>
                              <div class="table-responsive">
                                  <table class="table display data-table text-nowrap">
                                      <thead class="text-center">
                                          <tr>
                                              <th>
                                                  <div class="form-check">
                                                      <label class="form-check-label"></label>
                                                  </div>
                                              </th>
                                              <th>Quiz title</th>
                                              <th>Grade</th>
                                              <th>Subject</th>
                                              <th>Total questions</th>
                                              <th>Total marks</th>
                                              <th>Date</th>
                                              <th>Verify</th>
                                          </tr>
                                      </thead>
                                      <tbody class="text-center">
                                        <?php 
                                        if (isset($pending_approvals) && is_array($pending_approvals)) {
                                          if (count($pending_approvals) > 0) {
                                            $i = 1;
                                            foreach($pending_approvals as $pending_approval)
                                            {
                                              ?>
                                              <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <label class="form-check-label"><?php echo $i; ?></label>
                                                    </div>
                                                </td>
                                                <td><?php echo $pending_approval->title; ?></td>
                                                <td><?php echo $pending_approval->grade; ?></td>
                                                <td>
                                                  <?php  
                                                  if (isset($subjects) && $subjects != 0){
                                                      foreach ($subjects as $subject) {
                                                          if($subject->subject_id == $pending_approval->subject)
                                                          {
                                                              echo $subject->subject_name;
                                                              break;
                                                          } 
                                                      }
                                                  }
                                                  ?>
                                                </td>
                                                <td><?php echo $pending_approval->total_questions; ?></td>
                                                <td><?php echo $pending_approval->total_marks; ?></td>
                                                <td><?php  
                                                  $update_date = $time=strtotime($pending_approval->created_at) ; 
                                                          echo $month =date('M', $update_date).' ';
                                                          echo $date =date('d', $update_date).', ';
                                                          echo $year =date('Y', $update_date);
                                                          
                                                ?></td>
                                                <td>
                                                  <a href="#" class='proceedToLiveadmin' id="<?php echo $pending_approval->quiz_id; ?>">
                                                    <span class="badge bg-success">Approve</span>
                                                  </a>
                                                  
                                                </td>
                                                <td class="removeBtn" > 
                                                    <a href="#" >
                                                      <span class="badge bg-danger">Delete</span>
                                                    </a>
                                                </td>
                                            </tr>    
                                              <?php 
                                              $i++;
                                            }
                                          }
                                        };
                                        ?>
                                          

                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>                        
                      <div class="card height-auto mt-3">
                              <div class="card-body-new">
                                  <div class="heading-layout1">
                                      <div class="item-title">
                                          <h3>Acitve Quiz</h3>
                                      </div>
                                  </div>
                                  <div class="table-responsive">
                                      <table class="table display data-table text-nowrap">
                                          <thead class="text-center">
                                              <tr>
                                                  <th>
                                                      <div class="form-check">
                                                          <label class="form-check-label"></label>
                                                      </div>
                                                  </th>
                                                  <th>Quiz title</th>
                                                  <th>Grade</th>
                                                  <th>Subject</th>
                                                  <th>Total questions</th>
                                                  <th>Total marks</th>
                                                  <th>Date</th>
                                                  <th></th>
                                              </tr>
                                          </thead>
                                          <tbody class="text-center">
                                            <?php 
                                            if (isset($all_quizs) && is_array($all_quizs)) {
                                              if (count($all_quizs) > 0) {
                                                $i = 1;
                                                foreach($all_quizs as $all_quiz)
                                                {
                                                  ?>
                                                  <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label"><?php echo $i; ?></label>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $all_quiz->title; ?></td>
                                                    <td><?php echo $all_quiz->grade; ?></td>
                                                    <td>
                                                      <?php  
                                                      if (isset($subjects) && $subjects != 0){
                                                          foreach ($subjects as $subject) {
                                                              if($subject->subject_id == $all_quiz->subject)
                                                              {
                                                                  echo $subject->subject_name;
                                                                  break;
                                                              } 
                                                          }
                                                      }
                                                      ?>
                                                    </td>
                                                    <td><?php echo $all_quiz->total_questions; ?></td>
                                                    <td><?php echo $all_quiz->total_marks; ?></td>
                                                    <td><?php  
                                                      $update_date = $time=strtotime($all_quiz->created_at) ; 
                                                              echo $month =date('M', $update_date).' ';
                                                              echo $date =date('d', $update_date).', ';
                                                              echo $year =date('Y', $update_date);
                                                              
                                                    ?></td>
                                                </tr>    
                                                  <?php 
                                                  $i++;
                                                }
                                              }
                                            };
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

<script>
     function getAsignSubjects()
    {
        var selectedClass = $('.selectedClass').find(':selected').val();
        $.ajax({
              type:'post',
              url:"<?php echo base_url('admin/getMySubjects');?>",
              data:{
                id:selectedClass
              },
              dataType:'json',
              cache:false,
              success: function(data){
                if(data == '1'){
                    $('.fillSubjects').text("")
                    alert('No subjects with this student !')
                  }else{
                    $('.fillSubjects').text("")
                    $('.fillSubjects').append('<Option value="">Select Subjects here.. </Option>')
                    
                  //   var myKeys = Object.keys(data)
                    var totalKeys = Object.keys(data).length
                    var myValues = Object.values(data)
                    // console.log(data)
                    for (let i = 0; i < totalKeys; i++) {
                      var values = myValues[i]
                      // var keys = myValues[i]
                      console.log(values)
                      $('.fillSubjects').append('<Option value="'+values[1]+'">'+values[0]+'</Option>');
                    };
              };
              },
              error:function(e){
                alert('ajax error');
              }
            })
            
    }
</script>

<script>
  $(".proceedToLive").click(function(){
      var verify = confirm("Approve this quiz and make this live?");
      if (verify == true) {
        var id = $(this).attr('id');
        window.location.href = "<?php echo base_url().'/admin/quiz_make_live/'?>"+id;
      } else {
      }
    })
      $(".proceedToLiveadmin").click(function(){
      var verify = confirm("Approve this quiz and make this live?");
      if (verify == true) {
        var id = $(this).attr('id');
        window.location.href = "<?php echo base_url().'/admin/pending_quiz_make_live/'?>"+id;
      } else {
      }
    })
    
    $(".deleteAdminCreatedQuiz").click(function(){
      var verify = confirm("Are you sure to delete this quiz ?");
      if (verify == true) {
        var id = $(this).attr('id');
        window.location.href = "<?php echo base_url().'/admin/quiz_delete/'?>"+id;
      } else {
      }
    })
</script>
</html>
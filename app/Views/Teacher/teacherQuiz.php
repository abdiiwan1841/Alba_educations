<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quiz - Alba Education</title>
    <link rel="stylesheet" href="<?php echo base_url('/public/Admin/css/style.css') ?>" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
  </head>
  <body>

    <main>
      <div class="container-fluid mt-5">
        <div class="row">
          <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
            <?php include('public/Teachers/inc/nav.php'); ?>

          </div>
          <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12">
            <section class="mainContent">
              
              <div class="row">
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                  <div class="contentHeading mt-5">
                    <h2>Hi, <?php echo session()->get('TEACHER_NAME'); ?></h2>
                    <p>Ready to start your day with Alba Educations?</p>

                    <div class="headerImage">
                      <img src="<?php echo base_url('/public/Admin/images/image5.png'); ?>" class="img-fluid" alt="" />
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12"></div>
              </div>
                <div class="row mt-5 p-3">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                        <div class="card height-auto p-3">
                            <div class="card-body-new">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Add Quiz</h3>
                                    </div>
                                </div>
                                <form class="mg-b-20" method="post" action="<?php echo base_url('teacher/create_quiz'); ?>">
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
                      <div class="card height-auto" style="border:none;">
                          <div class="card-body-new">
                              <div class="heading-layout1">
                                  <div class="item-title">
                                      <h3>On progress Quiz</h3>
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
                                              <th></th>
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
                                                    <span class="badge bg-success">Proceed to request admin</span>
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
                      <div class="card height-auto mt-4" style="border:none;">
                          <div class="card-body-new">
                              <div class="heading-layout1">
                                  <div class="item-title">
                                      <h3>Pending admin approvals Quiz</h3>
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
                      <div class="card height-auto mt-4" style="border:none;">
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
                
            </section>
          </div>
        </div>
      </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
      // for table row
      $(".removeBtn").click(function(){
        var verify = confirm("Are you sure ?");
        if (verify == true) {
          this.parentElement.style.display = "none"
          
        } else {}
      })
    </script>
    <?php include('public/Teachers/inc/foot.php') ?>
  </body>
</html>


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
        window.location.href = "<?php echo base_url().'/teacher/quiz_make_live/'?>"+id;
      } else {
      }
    })
    $(".deleteAdminCreatedQuiz").click(function(){
      var verify = confirm("Are you sure to delete this quiz ?");
      if (verify == true) {
        var id = $(this).attr('id');
        window.location.href = "<?php echo base_url().'/teacher/quiz_delete/'?>"+id;
      } else {
      }
    })
</script>
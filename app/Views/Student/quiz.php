<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfomance - Alba Education</title>
    <link rel="stylesheet" href="<?php echo base_url('/public/Admin/css/style.css')?>" />
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
    <?php include('public/Students/inc/topbar.php') ?>
    <main>
      <div class="container-fluid mt-5">
        <div class="row">
          <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
            <?php include('public/Students/inc/nav.php') ?>

          </div>

          <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12">
            <section class="mainContent mt-5">
                <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                  <div class="contentHeading mt-5">
                    <h2>Hi, <?php if (session()->has('STUDENT')) {
                      echo session('STUDENT_NAME');
                    };  ?></h2>
                    <p>Ready to start your day with Alba Educations?</p>

                    <div class="headerImage">
                      <img src="<?php echo base_url('/public/Admin//images/image5.png') ?>" class="img-fluid" alt="" />
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                </div>
              </div>
              <div class="row m-5">
                <div class="col-xl-11 col-lg-11 col-md-11 col-sm-12 pe-5">
                  <div class="contentHeading2">
                    <h2>My Quiz</h2>
                  </div>
                   <?php
                      if (isset($reg_error)) {
                      ?>
                          <div class="form-group text-danger"><?php print_r($reg_error); ?></div>
                      <?php
                      };
                      if (isset($message)) {
                      ?>
                          <h2 class="form-group text-success m-3 text-center"><?php print_r($message);' : '.print_r(round($score/$total_questions*100)) ?>%</h2>
                      <?php
                      };
                  ?>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col">Date</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Quiz</th>
                        <th scope="col">Marks</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php 
                      
                      if (isset($all_quizs) && is_array($all_quizs)) {
                        if (count($all_quizs) > 0) {
                          $i = 1;
                          foreach($all_quizs as $all_quiz)
                          {
                          ?>
                          <tr>
                        <th scope="row">
                          <!-- <?php echo $i; ?> -->
                        </th>
                        <td><?php $update_date = $time=strtotime($all_quiz->created_at) ; 
                                echo $month =date('M', $update_date).' ';
                                echo $date =date('d', $update_date).', ';
                                echo $year =date('Y', $update_date); ?>
                        </td>
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
                        <td>
                            <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $i; ?>" >
                              <span class="badge bg-danger text-light" >Take Quiz</span>
                            </a>
                             
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Quiz</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body modalHeight">
                                    <form action="<?php echo base_url('student/submit_quiz'); ?>" method="POST">
                                        <?php
                                          if (isset($quizs) && $quizs != 0){
                                            $i = 1;
                                              foreach ($quizs as $quiz) {
                                                  if($quiz->quiz_id == $all_quiz->quiz_id)
                                                  {
                                                  ?>
                                                  <input type="hidden" class="form-radio-input me-3" name="quiz_id" value="<?php echo $quiz->quiz_id ?>">
                                                              
                                                  <div class="questions">
                                                    <div class="row m-0">
                                                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                          <div class="mb-3">
                                                                <div class="d-flex align-items-center justify-content-between">
                                                                  <label for="" class="form-label"> <span>Question (<?php echo $i; ?>) : </span> 
                                                                    <?php echo $quiz->title ?>
                                                                  </label>
                                                                </div>
                                                          </div>
                                                      </div>
                                                      <?php 
                                                        if ($quiz->file != "") {
                                                          ?>
                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                            <div class="questionImageBox">
                                                            <img src="<?php echo base_url($quiz->file); ?>" width="100%">
                                                                
                                                            </div>
                                                        </div>
                                                          <?php
                                                        }
                                                      ?>
                                                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                          <div class="mb-3 form-radio d-flex align-items-center">
                                                              <input type="radio" class="form-radio-input me-3" value="1" name="answer<?php echo $i ?>">
                                                              <label class="form-radio-label"><?php echo $quiz->option1 ?></label>
                                                          </div>
                                                      </div>
                                                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                          <div class="mb-3 form-radio d-flex align-items-center">
                                                              <input type="radio" class="form-radio-input me-3" value="2" name="answer<?php echo $i ?>">
                                                              <label class="form-radio-label"><?php echo $quiz->option2 ?></label>
                                                          </div>
                                                      </div>
                                                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                          <div class="mb-3 form-radio d-flex align-items-center">
                                                              <input type="radio" class="form-radio-input me-3" value="3" name="answer<?php echo $i ?>">
                                                              <label class="form-radio-label"><?php echo $quiz->option3 ?></label>
                                                          </div>
                                                      </div>
                                                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                          <div class="mb-3 form-radio d-flex align-items-center">
                                                              <input type="radio" class="form-radio-input me-3" value="4" name="answer<?php echo $i ?>">
                                                              <label class="form-radio-label"><?php echo $quiz->option4 ?></label>
                                                          </div>
                                                      </div>
                                                    </div> 
                                                  </div>
                                                  
                                                  <input type="hidden" class="form-radio-input me-3" name="total_questions" value="<?php echo $i; ?>">
                                                  <?php 
                                                              
                                                     
                                                  }
                                                  $i++; 
                                              }
                                          }
                                          ?>
                                    
                                      
                                      
                                      <div class="text-center">
                                        <input type="submit" class="btn btn-danger" value="Submit">

                                      </div>
                                  </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </td>
                        <td>Marks</td>
                        
                        <td class="removeBtn" > 
                          <a href="#" >
                            <span class="badge bg-danger"><i class="fas fa-times"></i></span>
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

                  <div class="dash-shapeBox3">
                    <div class="dash-shape3">
                      <img src="<?php echo base_url('/public/Admin/images/k-shape20.png') ?>" alt="Shape Image">
                    </div>
                    <div class="dash-shape4">
                      <img src="<?php echo base_url('/public/Admin/images/k-shape19.png') ?>" alt="Shape Image">
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
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Certification - Alba Education</title>
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
          <?php include('public/Teachers/inc/nav.php'); ?>
          <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12">
            <section class="mainContent">
              <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                  <div class="contentHeading mt-5">
                    <h2>Hi, <?php echo session()->get('TEACHER_NAME'); ?></h2>
                    <p>Ready to start your day with some pitch decks?</p>

                    <div class="headerImage">
                      <img src="<?php echo base_url('/public/Admin/images/image5.png'); ?>" class="img-fluid" alt="" />
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12"></div>
              </div>
              <div class="row m-5">
                <div class="col-xl-11 col-lg-11 col-md-11 col-sm-12 pe-5">
                  <div class="contentHeading2">
                    <h2></h2>
                  </div>
                  <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                    <div class="contentHeading2 mb-3">
                      <h2>Send Study materials to students</h2>
                    </div>
                    <?php
                    if (isset($reg_error)) {
                    ?>
                    <div class="form-group text-danger mb-4 mt-4 reg_error"><?php print_r($reg_error); ?></div>
                    <script>
                        setTimeout(function() {
                            $('.reg_error').fadeOut('fast');
                        }, 3000);
                    </script>
                    <?php
                    };
                    if (isset($message)) {
                    ?>
                        <div class="form-group text-success mb-4 mt-4 reg_success"><?php print_r($message); ?></div>
                        <script>
                            setTimeout(function() {
                                $('.reg_success').fadeOut('fast');
                            }, 3000);
                        </script>
                    <?php
                    };
                    ?>
                    <form action="<?php echo base_url('teacher/upload_study_materials'); ?>" method="post" class="border border-soild p-3" enctype="multipart/form-data">
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="mb-3">
                          <label class="form-label">Title</label>
                          <input type="text" name="title" class="form-control" >
                        </div>
                      </div>
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="mb-3">
                          <label class="form-label">Grade</label>
                          <select class="form-select slectedOption" name="grade" aria-label="" onchange="fetchDropdowns()">
                              <option>Select Grade</option>
                              <?php 
                              if (isset($grades) && $grades != 0){
                                  foreach ($grades as $grade) {
                                      ?>
                                      <option value="<?php echo $grade->grade_name; ?>"><?php echo $grade->grade_name; ?></option>
                                      <?php
                                  }
                              }
                              ?>
                        </select>
                        </div>
                      </div>
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="mb-3">
                          <label class="form-label">Student</label>
                          <select class="fillStudents form-select stdSelected"  name="student" aria-label="" onchange="fetchStudentsSubjects()">
                              <option value="">Select Grade first</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="mb-3">
                          <label class="form-label">Subject</label>
                          <select class="fillSubjects form-select" name="subject" aria-label="">
                              <option value="">Select Grade first</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="mb-3">
                          <label for="inputUploadDocument" class="form-label">Upload test document</label>
                          <input type="file" class="form-control" name="h_file">
                        </div>
                      </div>
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                          <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                      </div>
                    </form>
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
    <?php include('public/Teachers/inc/foot.php') ?>
  </body>
</html>

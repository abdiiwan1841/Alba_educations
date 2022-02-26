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
                      <img src="<?php echo base_url('/public/Admin/images/image5.png') ?>" class="img-fluid" alt="" />
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12"></div>
              </div>
              <div class="row m-5">
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 pe-5">
                  <div class="contentHeading2">
                    <h2>Certifications</h2>
                  </div>
                  <form action="<?php echo base_url('/teacher/request_certificate') ?>" method="POST" class="border border-solid p-3">
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
                            <div class="mb-3">
                              <label for="inputStudentName" class="form-label">Student Name</label>
                              <input type="text" class="form-control" id="inputStudentName" name="student">
                            </div>
                            <div class="mb-3">
                              <label for="inputStudentGrade" class="form-label">Grade</label>
                              <input type="text" class="form-control" id="inputStudentGrade" name="grade">
                            </div>
                            <div class="mb-3">
                              <label for="inputStudentSubject" class="form-label">Subject</label>
                              <input type="text" class="form-control" id="inputStudentSubject" name="subject">
                            </div>
                            <div class="mb-3">
                              <label for="inputStudentAchievement" class="form-label">Achievements</label>
                              <textarea class="form-control" id="inputStudentAchievement" name="achievement"></textarea>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Submit">
                          </form>

                  <!-- <table class="table">
                    <thead>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Achievment</th>
                        <th scope="col">Status</th>
                        <th scope="col">Remove</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Emma Stone</td>
                        <td>12th</td>
                        <td>Hindi</td>
                        <td>
                          <a href="#">
                            <span class="badge bg-info text-dark" data-bs-toggle="modal" href="#inputRequest" role="button">Request</span>
                          </a>
                          <div class="modal fade" id="inputRequest" aria-hidden="true" aria-labelledby="inputRequest" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" >Change Request</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body rounded">
                                  <form>
                                    <div class="mb-3">
                                      <label for="inputChangeRequest" class="form-label">Write Here</label>
                                      <textarea class="form-control" id="inputChangeRequest"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td>
                          <a href="#">
                            <span class="badge bg-secondary">Verified</span>
                          </a>
                        </td>
                        <td class="removeBtn" > 
                          <a href="#" >
                            <span class="badge bg-danger">Delete</span>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">1</th>
                        <td>Emma Stone</td>
                        <td>12th</td>
                        <td>Hindi</td>
                        <td>
                          <a href="#">
                            <span class="badge bg-info text-dark" data-bs-toggle="modal" href="#inputRequest" role="button">Request</span>
                          </a>
                          <div class="modal fade" id="inputRequest" aria-hidden="true" aria-labelledby="inputRequest" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" >Change Request</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body rounded">
                                  <form>
                                    <div class="mb-3">
                                      <label for="inputChangeRequest" class="form-label">Write Here</label>
                                      <textarea class="form-control" id="inputChangeRequest"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td>
                          <a href="#">
                            <span class="badge bg-secondary">Verified</span>
                          </a>
                        </td>
                        <td class="removeBtn" > 
                          <a href="#" >
                            <span class="badge bg-danger">Delete</span>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">1</th>
                        <td>Emma Stone</td>
                        <td>12th</td>
                        <td>Hindi</td>
                        <td>
                          <a href="#">
                            <span class="badge bg-info text-dark" data-bs-toggle="modal" href="#inputRequest" role="button">Request</span>
                          </a>
                          <div class="modal fade" id="inputRequest" aria-hidden="true" aria-labelledby="inputRequest" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" >Change Request</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body rounded">
                                  <form>
                                    <div class="mb-3">
                                      <label for="inputChangeRequest" class="form-label">Write Here</label>
                                      <textarea class="form-control" id="inputChangeRequest"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td>
                          <a href="#">
                            <span class="badge bg-secondary">Verified</span>
                          </a>
                        </td>
                        <td class="removeBtn" > 
                          <a href="#" >
                            <span class="badge bg-danger">Delete</span>
                          </a>
                        </td>
                      </tr>
                    </tbody>
                  </table> -->

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
    <?php include('public/Teachers/inc/foot.php') ?>
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

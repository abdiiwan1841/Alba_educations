<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Curriculum - Alba Education</title>
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
  
    <main>
      <div class="container-fluid mt-5">
        <div class="row">
          <?php include('public/Teachers/inc/nav.php'); ?>

          <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12">
            <section class="mainContent mt-5">
              <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <div class="contentHeading mt-5">
                    <h2>Hi, Teacher Name</h2>
                    <p>Ready to start your day with Alba Educations?</p>

                    <div class="headerImage">
                      <img src="<?php echo base_url('/public/Admin/images/image5.png') ?>" class="img-fluid" alt="" />
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12"></div>
              </div>
              <div class="row m-5">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pe-5">
                  <div class="contentHeading2">
                    <h2>Curriculum</h2>
                  </div>
                  <?php
                    if (isset($reg_error)) {
                    ?>
                    <div class="form-group text-danger text-center mb-4 mt-4 reg_error"><?php print_r($reg_error); ?></div>
                    <script>
                        setTimeout(function() {
                            $('.reg_error').fadeOut('fast');
                        }, 3000);
                    </script>
                    <?php
                    };
                    if (isset($message)) {
                    ?>
                        <div class="form-group text-success text-center mb-4 mt-4 reg_success"><?php print_r($message); ?></div>
                        <script>
                            setTimeout(function() {
                                $('.reg_success').fadeOut('fast');
                            }, 3000);
                        </script>
                    <?php
                    };
                    ?>
                   <table class="table">
                    <thead>
                      <tr class="text-center">
                        <th scope="col">Download</th>
                        <!-- <th scope="col">Date</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Teacher</th> -->
                        <!-- <th scope="col">Timing</th> -->
                        <th scope="col">Uploaded at</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                     
                    <?php
                    if (isset($teachers_curriculums)) {
                        if ($teachers_curriculums != 0) {
                            $i = 1;
                            foreach($teachers_curriculums as $curriculum)
                            { ?>
                            <tr class="text-center">
                                <td>
                                    <a href="<?php echo base_url($curriculum->file) ?>" download>
                                      <span class="badge bg-success">Download</span>
                                    </a>
                                </td>
                                <td>
                                  <?php echo date('d-M-Y', strtotime($curriculum->created_at) ) ?>
                                </td>
                                <td class="removeBtn" > 
                                  <a href="#" >
                                    <span class="badge bg-danger"><i class="fas fa-times"></i></span>
                                  </a>
                                </td>
                                
                            </tr>
                            <?php $i++; }
                        }
                    }
                    ?>
                    </tbody>
                  </table>
                  <div class="dash-shapeBox2">
                    <div class="dash-shape2">
                    
                      <img src="<?php echo base_url('/public/Admin/images/kids-with-kite.png') ?>" alt="Shape Image">
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
    <?php include('public/Teachers/inc/foot.php') ?>
  </body>
</html>

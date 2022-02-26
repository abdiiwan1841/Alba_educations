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
                
                <!-- Breadcubs Area End Here -->
                <!-- Dashboard summery Start Here -->
                <!-- Dashboard summery End Here -->
                <!--  Start Here -->
                <div class="card height-auto">
                    <div class="card-body-new">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="container">
                                    <form method="post" action="<?php echo base_url('admin/add_new_question'); ?>" enctype="multipart/form-data">
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
                                        <!-- <a class="btn btn-danger text-light mb-3" id="addButton" onclick="addNewQuestion()">Add New Question</a> -->
                                        <div id="questionBox">
                                            <div class="mb-3">
                                                <input type="hidden" name="quiz_id" value="<?php if (isset($quiz_id)) {
                                                  echo $quiz_id;  
                                                }  ?>">
                                            <label for="" class="form-label"><span></span> Question</label>
                                            <input type="text" class="form-control mb-2" name="title"  placeholder="Question here..">
                                            <input type="file" class="form-control" name="file">
                                            </div>
                                            <div class="mb-3 form-radio d-flex align-items-center position-relative">
                                                <span class="me-3">A</span>
                                                <input type="text" class="form-control" name="option1">
                                                <span class="selectAnswer">
                                                    <input type="radio" class="form-radio-input" name="answer" value="1">
                                                </span>
                                            </div>
                                            <div class="mb-3 form-radio d-flex align-items-center position-relative">
                                                <span class="me-3">B</span>
                                                <input type="text" class="form-control" name="option2">
                                                <span class="selectAnswer">
                                                    <input type="radio" class="form-radio-input" name="answer" value="2">
                                                </span>
                                            </div>
                                            <div class="mb-3 form-radio d-flex align-items-center position-relative">
                                                <span class="me-3">C</span>
                                                <input type="text" class="form-control" name="option3">
                                                <span class="selectAnswer">
                                                    <input type="radio" class="form-radio-input" name="answer" value="3">
                                                </span>
                                            </div>
                                            <div class="mb-3 form-radio d-flex align-items-center position-relative">
                                                <span class="me-3">D</span>
                                                <input type="text" class="form-control" name="option4">
                                                <span class="selectAnswer">
                                                    <input type="radio" class="form-radio-input" name="answer" value="4">
                                                </span>
                                            </div>
                                        </div>
                                        <div id="newBox" class="mb-5">
                                        </div>
                                        <div class="d-flex justify-content-between">
                                        <input type="submit" class="btn btn-success text-light" value="Add this Question ">
                                         <a class="btn btn-danger text-light" herf="<?php echo base_url('admin/adminRequestQuiz'); ?>" type="button">Back to Quiz</a> 
                                            
                                        </div>
                                    </form>
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
         
         <script>
        let addBtn = document.getElementById('addButton')
        let newBox = document.getElementById('newBox')
        let AddQuestion = document.getElementById("AddQuestion");

        function addNewQuestion(){
            newBox.innerHTML += 
            `
            <div id="questionBox">
                <span class="deleteButton float-end me-3" >
                    <i class="fas fa-times"></i>
                </span>
                <div class="mb-3">
                    <label for="" class="form-label"><span>1.</span> Question</label>
                    <input type="text" class="form-control mb-2">
                    <input type="file" class="form-control">
                </div>
                <div class="mb-3 form-radio d-flex align-items-center position-relative">
                    <span class="me-3">A</span>
                    <input type="text" class="form-control">
                    <span class="selectAnswer">
                        <input type="checkbox" class="form-radio-input" name="question" >
                    </span>
                </div>
                <div class="mb-3 form-radio d-flex align-items-center position-relative">
                    <span class="me-3">B</span>
                    <input type="text" class="form-control">
                    <span class="selectAnswer">
                        <input type="checkbox" class="form-radio-input" name="question" >
                    </span>
                </div>
                <div class="mb-3 form-radio d-flex align-items-center position-relative">
                    <span class="me-3">C</span>
                    <input type="text" class="form-control">
                    <span class="selectAnswer">
                        <input type="checkbox" class="form-radio-input" name="question" >
                    </span>
                </div>
                <div class="mb-3 form-radio d-flex align-items-center position-relative">
                    <span class="me-3">D</span>
                    <input type="text" class="form-control">
                    <span class="selectAnswer">
                        <input type="checkbox" class="form-radio-input" name="question" >
                    </span>
                </div>
            </div>
            `
            ;
            $(".deleteButton").click(function(){
                this.parentElement.style.display = "none"
                
                })
        }
    </script>

</body>

</html>
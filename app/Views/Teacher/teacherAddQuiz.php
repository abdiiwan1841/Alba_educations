<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Quiz - Alba Education</title>
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
            <section class="mainContent mt-5">
              
              <div class="row mt-5 p-3">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="container">
                        <form method="post"  action="<?php echo base_url('teacher/add_new_question'); ?>" enctype="multipart/form-data">
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
                                            <!-- <label for="" class="form-label"><span></span> Question</label> -->
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
                                        <input type="submit" class="btn btn-success text-light" value="Add this Question ">
                                        <!-- <a class="btn btn-success text-light" type="submit" name="submit">Submit</a> -->
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
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    
    <script>
        let addBtn = document.getElementById('addButton')
        let newBox = document.getElementById('newBox')
        let AddQuestion = document.getElementById("AddQuestion");

        function addNewQuestion(){
            newBox.innerHTML += 
            `
            <div id="questionBox">
                                <span class="deleteButton float-end me-3" onclick="removeQuestion()">
                                    <i class="fas fa-times"></i>
                                </span>
                                <div class="mb-3">
                                  <label for="" class="form-label"><span>1.</span> Question</label>
                                  <input type="text" class="form-control">
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
        }
        // $(".removeBtn").click(function(){
        //     console.log("clicked")
        //     // this.parentElement.remove();
        // })
        
        function removeQuestion(){
        console.log("clicked")
        // $(.removeBtn).parent.remove()
        // $('#newBox').remove();
        }
    </script>
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

</html>
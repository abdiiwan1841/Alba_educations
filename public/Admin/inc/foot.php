    <!-- jquery-->
    <script src="<?php echo base_url('/public/Admin/js/jquery-3.3.1.min.js') ?>"></script>
    <!-- Plugins js -->
    <script src="<?php echo base_url('/public/Admin/js/plugins.js') ?>"></script>
    <!-- Popper js -->
    <script src="<?php echo base_url('/public/Admin/js/popper.min.js') ?>"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo base_url('/public/Admin/js/bootstrap.min.js') ?>"></script>
    <!-- Counterup Js -->
    <script src="<?php echo base_url('/public/Admin/js/jquery.counterup.min.js') ?>"></script>
    <!-- Moment Js -->
    <script src="<?php echo base_url('/public/Admin/js/moment.min.js') ?>"></script>
    <!-- Waypoints Js -->
    <script src="<?php echo base_url('/public/Admin/js/jquery.waypoints.min.js') ?>"></script>
    <!-- Scroll Up Js -->
    <script src="<?php echo base_url('/public/Admin/js/jquery.scrollUp.min.js') ?>"></script>
    <!-- Full Calender Js -->
    <script src="<?php echo base_url('/public/Admin/js/fullcalendar.min.js') ?>"></script>
    <!-- Chart Js -->
    <script src="<?php echo base_url('/public/Admin/js/Chart.min.js') ?>"></script>
    <!-- Custom Js -->
    <script src="<?php echo base_url('/public/Admin/js/main.js') ?>"></script>

<script>
    function fetchDropdowns()
    {
      getStudents();
      // getSubjects();
    }

    function fetchStudentsSubjects()
    {
      getSubjects()
      // getTeachers()
      
    }

    // function fetchTeacherForSubject()
    // {
    //   getTeachers()
    // }

    function getStudents()
    {
        var conceptName = $('.slectedOption').find(":selected").val();
        $.ajax({
              type:'post',
              url:"<?php echo base_url('admin/getStudents');?>",
              data:{
                id:conceptName
              },
              dataType:'json',
              cache:false,
              success: function(data){
                  $('.fillStudents').text("")
                  $('.fillStudents').append('<Option value="">Select students here.. </Option>')
                  if(data == 0){
                    alert('No Students in this grade !')
                  }else{
                    console.log(data)
                      var myKeys = Object.keys(data)
                      var totalKeys = Object.keys(data).length
                      var myValues = Object.values(data)
                      for (let i = 0; i < totalKeys; i++) {
                          var myOptionVal = myValues[i]
                          var myKeysVal = myKeys[i]
                        $('.fillStudents').append('<Option value="'+myKeysVal+'">'+myOptionVal+'</Option>');
                    }
                  }
              },
              error:function(e){
                alert('ajax error');
              }
            })
    }
    function getSubjects()
    {
        var conceptName = $('.stdSelected').find(":selected").val();
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

    function getTeachers()
    {
        var conceptName = $('.selectedSubject').find(":selected").val();
        // alert(conceptName)
        $.ajax({
              type:'post',
              url:"<?php echo base_url('admin/getTeachers');?>",
              data:{
                id:conceptName
              },
              dataType:'json',
              cache:false,
              success: function(data){
                  $('.fillTeachers').text("")
                  if(data == 0){
                    alert('No Teachers for this subject !')
                  }else{
                    console.log(data)
                      var myKeys = Object.keys(data)
                      var totalKeys = Object.keys(data).length
                      var myValues = Object.values(data)
                      for (let i = 0; i < totalKeys; i++) {
                          var myOptionVal = myValues[i]
                          var myKeysVal = myKeys[i]
                        $('.fillTeachers').append('<Option value="'+myKeysVal+'">'+myOptionVal+'</Option>');
                    }
                  }
              },
              error:function(e){
                alert('ajax error');
              }
            })
    }

    function getGradeSubjects()
    {
        var conceptName = $('.slectedOption').find(":selected").val();
        // alert(conceptName)
        $.ajax({
              type:'post',
              url:"<?php echo base_url('admin/getSubjectsGrade');?>",
              data:{
                id:conceptName
              },
              dataType:'json',
              cache:false,
              success: function(data){
                if(data == '1'){
                    alert('No Subjects in this grade !')
                  }else{
                  
                    $('.fillGradeSubjects').text("")
                    $('.fillGradeSubjects').append('<Option value="">Select subject here.. </Option>')
                    
                  //   var myKeys = Object.keys(data)
                    var totalKeys = Object.keys(data).length
                    var myValues = Object.values(data)
                    // console.log(data)
                    for (let i = 0; i < totalKeys; i++) {
                      var values = myValues[i]
                      // var keys = myValues[i]
                      console.log(values)
                      $('.fillGradeSubjects').append('<Option value="'+values[1]+'">'+values[0]+'</Option>');
                    };
              };
              },
              error:function(e){
                alert('ajax error');
              }
            })
            
    }
  

</script>
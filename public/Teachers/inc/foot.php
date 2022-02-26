<script>
      
     
      // notification
      $(".notificationBell").click(function(){
        $(".dropdown-menu").toggleClass("show");
      });

      // for main footer name teacher name button
      $(".footer-nav-title").click(function(){
        $(".footer-nav-ul").toggleClass("show");
      });

      // for reminder box
      $(".closeBtn").click(function(){
        this.parentElement.style.display = "none"
      })

       

      // progress bar

      window.onload = function() {
      var can1 = document.getElementById('canvas1'),
          spanProcent1 = document.getElementById('procent1'),
            c1 = can1.getContext('2d');
      
      var posX1 = can1.width / 2,
          posY1 = can1.height / 2,
          fps1 = 1000 / 200,
          procent1 = 0,
          oneProcent1 = 360 / 100,
          result1 = oneProcent1 * 100;
      
      c1.lineCap = 'round';
      arcMove1();
      
      function arcMove1(){
        var deegres1 = 0;
        var acrInterval1 = setInterval (function() {
          deegres1 += 1;
          c1.clearRect( 0, 0, can1.width, can1.height );
          procent1 = deegres1 / oneProcent1;
      
          spanProcent1.innerHTML = procent1.toFixed();
      
          c1.beginPath();
          c1.arc( posX1, posY1, 70, (Math.PI/180) * 270, (Math.PI/180) * (270 + 360) );
          c1.strokeStyle = 'transparent';
          c1.lineWidth = '10';
          c1.stroke();
      
          c1.beginPath();
          c1.strokeStyle = '#e3424c';
          c1.lineWidth = '10';
          c1.arc( posX1, posY1, 70, (Math.PI/180) * 270, (Math.PI/180) * (270 + deegres1) );
          c1.stroke();
          if( deegres1 >= result1 ) clearInterval(acrInterval1);
        }, fps1);
        
      }

      var can = document.getElementById('canvas'),
          spanProcent = document.getElementById('procent'),
            c = can.getContext('2d');
      
      var posX = can.width / 2,
          posY = can.height / 2,
          fps = 1000 / 200,
          procent = 0,
          oneProcent = 360 / 100,
          result = oneProcent * 70;
      
      c.lineCap = 'round';
      arcMove();
      
      function arcMove(){
        var deegres = 0;
        var acrInterval = setInterval (function() {
          deegres += 1;
          c.clearRect( 0, 0, can.width, can.height );
          procent = deegres / oneProcent;
      
          spanProcent.innerHTML = procent.toFixed();
      
          c.beginPath();
          c.arc( posX, posY, 70, (Math.PI/180) * 270, (Math.PI/180) * (270 + 360) );
          c.strokeStyle = '#fdef6e';
          c.lineWidth = '10';
          c.stroke();
      
          c.beginPath();
          c.strokeStyle = '#e3424c';
          c.lineWidth = '12';
          c.arc( posX, posY, 70, (Math.PI/180) * 270, (Math.PI/180) * (270 + deegres) );
          c.stroke();
          if( deegres >= result ) clearInterval(acrInterval);
        }, fps);
        
      }

      }
    </script>
     <script>
    function fetchDropdowns()
    {
      getStudents();
      getSubjects();
    }
    function getStudents()
    {
        var conceptName = $('.slectedOption').find(":selected").val();
        // alert(conceptName)
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
    <script>
    function presentStd(sessionID, classStatus)
    {
        var mySession = document.getElementById('mySession');
        mySession.setAttribute('value', sessionID);
        var sessionStatus = document.getElementById('sessionStatus');
        sessionStatus.setAttribute('value', classStatus);
    }
</script>
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
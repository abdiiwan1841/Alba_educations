<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Report Card</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
    />
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,600;1,700;1,800&display=swap");

      * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: "Nunito", sans-serif;
      }

      :root{
        --main_color : #ee2020;
        --second_color : #000;
        --third_color : #000;
      }
      #pdfDiv a{
        text-decoration: none;
      }
      #pdfDiv a:hover{
       color: var(--second_color);
      }
      .reportCard_img{
        max-width: 210mm;
        max-height: 296.9mm;
        position: relative;
      }
      .reportCard_img img{
        max-width: 100%;
        height: auto;
        object-fit: cover;
        opacity: 1;
      }
      .reportCardBox {
        position: absolute;
        top: 9rem;
        left: 0;
        width: 100%;
        padding: 20px 108px;
        /* position: relative; */
        z-index: 1;
        /* overflow: hidden; */
        /* max-width: 210mm;
        max-height: 297mm; */
        height: auto;

      }
      .reportCardHeading h1 {
        letter-spacing: 9px;
        color: var(--second_color);
        /* text-decoration: underline; */
        font-size: 50px;
        font-weight: 800;
        cursor: default;
        /* text-shadow: 3px -2px 11px var(--third_color); */
      }

      .reportCardInfo h2 {
        font-weight: 600;
        color: var(--second_color);
        cursor: default;
      }

      .reportCardInfo p {
        font-size: 20px;
        font-weight: 600;
        color: var(--second_color);
        cursor: default;
      }

      .reportCardSubHeading h4 {
        /* text-decoration: underline; */
        font-size: 30px;
        font-weight: 700;
        color: var(--third_color);
        cursor: default;
        /* text-shadow: 2px 2px 4px var(--second_color) */
      }
      .border_bottom{
        border-bottom: 3px solid #000;

      }

      .reportCardContent p {
        font-size: 20px;
        font-weight: 600;
        color: var(--second_color);
        cursor: default;
      }

      .reportCardContent ul li {
        font-size: 18px;
        color: var(--second_color);
        cursor: default;
      }
    </style>
  </head>
  <body>
    <div id="pdfDiv" >
        <div class="text-center">
      <a type="submit" class="badge bg-success " id="download">Download</a>
      </div>
      <?php 
      if (isset($report_card)) {
          foreach($report_card as $card){
              ?>
      <div id="content">
        <div class="reportCard_img">
          <img src="<?php echo base_url('/public/Admin/images/backgroundImg4.jpg') ?>" alt="">
          <div class="reportCardBox">
            <div class="row">
              <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4">
                <div class="reportCardLogo">
                </div>
              </div>
              <div class="col-xl-10 col-lg-10 col-md-8 col-sm-8"></div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="reportCardHeading text-center">
                  <h1><span class="border_bottom">Progress Report</span></h1>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="reportCardInfo mt-5">
                  <h2><?php echo session()->get('STUDENT_NAME') ?></h2>
                  <p>[<span>
                    <?php  
                  if (isset($subjects) && $subjects != 0){
                      foreach ($subjects as $subject) {
                          if($subject->subject_id == $card->subject)
                          {
                              echo $subject->subject_name;
                              break;
                          } 
                      }
                  }
                  ?>
                  </span></span>/<span>Grade -<?php echo $card->grade; ?></span>]</p>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="reportCardSubHeading text-center">
                  <h4><span class="border_bottom">Topics Covered</span></h4>
                </div>
                <div class="reportCardContent">
                  <ul>
                    <li><?php echo $card->topic; ?></li>
                  </ul>
                  
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="reportCardSubHeading text-center">
                  <h4><span class="border_bottom mb-2">Strength</span></h4>
                </div>
                <div class="reportCardContent ">
                  <ul>
                    <li><?php echo $card->strength; ?></li>
                  </ul>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="reportCardSubHeading text-center">
                  <h4><span class="border_bottom mb-2">Weekness</span></h4>
                </div>
                <div class="reportCardContent ">
                  <ul>
                    <li><?php echo $card->weekness; ?></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="reportCard_img">
          <img src="<?php echo base_url('/public/Admin/images/backgroundImg4.jpg') ?>" alt="">
          <div class="reportCardBox">
            <div class="row">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="reportCardSubHeading text-center">
                  <h4><span class="border_bottom mb-2">Suggestions</span></h4>
                </div>
                <div class="reportCardContent ">
                  <ul>
                    <li><?php echo $card->strength; ?></li>
                  </ul>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="reportCardSubHeading text-center">
                  <h4><span class="border_bottom mb-2">Upcoming events</span></h4>
                </div>
                <div class="reportCardContent ">
                  <ul>
                    <li><?php echo $card->upcoming_events; ?></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php 
          }
        }
      ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>

    <script>
      var element = document.getElementById("content");
      var opt = {
          margin: 0,
          filename: "alba.pdf",
          image: { type: "png", quality: 1 },
          html2canvas: { scale: 2 },
          jsPDF: { unit: "mm", format: "a4", orientation: "portrait" }
        };

      // New Promise-based usage:
      $("#download").click(function () {
        html2pdf().set(opt).from(element).save();

      });
    </script>
  </body>
</html>

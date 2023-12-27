<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Marksheet Result Page</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            *{
                background-color: white;
                transition: all .20s ease;
            }

            #content{
                width: auto;
                font-family:FontAwesome;
                margin-top:5%;
                margin-left: 5%;
                text-align: center;
                
            }

            #top-nav-bar{
                border-bottom:1px solid red;
                border-top:1px solid red;
                padding: 10px;
                text-align: center;
                font-family:FontAwesome;
                font-weight:400;
                font-size:12px;
                width: 80%;
                display: flex;
                height: auto;
                box-sizing: border-box;
                position: relative;
                margin: 0 auto;
                overflow: visible;
                justify-content: space-between;
                z-index: 10;
            }

            #web-name{
                float:left;
                padding-left: 5%;
                font-size:16px;
                display: block;
                font-family: Arial;
            }
            #main-menu{
                float: right;
                padding-left:5%;
                display: block;
                font-family: Arial;
            }
            #print, #reset{
                padding:0px;
            }
            a{
                padding-left: 25px;
                text-decoration: none;
                color: black;
                font-weight: bold;
            }
            a:hover{
                color: red;
            }
            li{
                display: inline-block;
            }
            #mob-nav-open, #mob-nav-close{
                top:20px;
                right: 10px;
                position: absolute;
                padding:0 0 0 20px;
                display: none;
                transition: 2s;
            }
            table{
                background-color: gainsboro;
                border: 0px;
                width: 60%;
                margin-left: 18%;
                margin-right: 25%;
                
            }
            table tr{
                color:black;
            }
            th{
                text-align: center;
                background-color:#DAA520;
            }
            td{
                
                background-color:#FFFACD
            }
            #m, #t{
                background-color: #EEE8AA;
            }
            span{
                margin-right: 0px;
                color:red;
                font-weight: bold;
                width:auto;
                height: auto;
                font-size: 1.3vw;
            }
            #search, input, button{
                font-size: 1.2vw;
                size: 1.5vw;
            }
            button{
                cursor:pointer;
            }

            @media  screen and (max-width:850px){

                #web-name{
                    padding-left: 0px;
                }
                #main-menu{
                    display:none;
                }
                #mob-nav-open{
                    display: block;
                }
                #top-nav-bar{
                    display: block;
                }
                #top-nav-bar{
                    flex-direction: column;
                    align-items: flex-start;
                    display: flex;

                }
                #main-menu{
                    width: 100%;
                    height: 100%;
                    transition: 1s ease;
                    z-index: 20;
                    text-align: left;
                }
                li{
                    display:block;
                    padding: 10px;
                    border-top: 1px solid red;
                    font-family: FontAwesome;
                    font-size: 12px;
                    font-weight: bold;
                }
                li > a{
                    display: inline-block;
                    width: 98%;
                }
            }

        </style>

        <script>
    function mobnav(){
        var a = document.getElementById("main-menu");
        var open = document.getElementById("mob-nav-open");
        var close = document.getElementById("mob-nav-close");
        open.style.display ="none";
        close.style.display ="block";
        if(a.style.display === "block"){
            a.style.display = "none";
        }
        else{
        a.style.display = 'block';
        }
    }
        // OPEN TOP MOBILE NAVIGATION TOGGLE
    function mobnavclose(){
        var a = document.getElementById("main-menu");
        var open = document.getElementById("mob-nav-open");
        var close = document.getElementById("mob-nav-close");
        open.style.display = "";
        close.style.display = "none";
        a.style.display = "";
    }
        </script>
    </head>
    <body >
    <div class="container" style=text-align: center;>
        <!-- TOP NAVIGATION BAR     -->
        
        <div class="top-nav-bar" id="top-nav-bar" style="padding-bottom: 180px; background-image: url('http://localhost/marksheet/themes/new_theme/student_dashboard/img/label.jpg');">


            <a href="javascript:void(0);" id="mob-nav-open" class="icon" onclick="mobnav()">
            <i class="fa fa-bars fa-lg"></i>
            </a>
            <a href="javascript:void(0);" id="mob-nav-close" class="icon" onclick="mobnavclose()">
                <i class="fas fa-times fa-lg"></i>
                </a>
        </div>
        <br><br>
<?php if($user_details[0]['df']==1){ ?>
<a target="_blank" href="<?=$this->config->item("base_url") ?>students/mark_sheet_pdf_export/"><button type="button" style="background-color:green; color: white; margin-left:1100px;" >Print</button></a>
<?php } ?>
        <!-- Main Content -->
        <div >
<div id="content" style=text-align: center;>
          <span style="color:red;"><?php echo $this->session->flashdata('msg'); ?></span>
          <h2 style="center;" class="head-background">Mother Teresa Women's University, Kodaikanal</h2>
          <h3 style="center;"> GRADE SHEET </h3>
          <div>
          <img style="margin-left: -750px; margin-top:-60px;" src="http://localhost/marksheet/themes/new_theme/student_dashboard/img/Mother_Teresa_Women_University_logo.jpg">
          <h4 style=" margin-top:-50px"> GOVERNMENT ARTS COLLEGE FOR WOMEN, NILAKKOTTAI </h4>
          </div>
          <div style="margin-top:35px">
          <span style=" color: black; font-size: 18px; margin-left: -50px; padding-bottom: -15px;">Degree Programme:   <?=$user_details[0]['degree']?></span>
          <span style="  color: black; font-size: 18px; margin-left: 10px; padding-bottom: -15px;"> Folio Number:  <?=$user_details[0]['certificate_no']?> </span>
          <?php if($user_details[0]['dept_id']==1){ ?>
          <span style="  color: black; font-size: 18px; margin-left: 10px; padding-bottom: -15px;">Subject:  Computer Science </span>
          <?php } elseif($val['dept_id']==2){ ?>
           <span style="  color: black; font-size: 14px; margin-left: -570px; padding-bottom: -15px;">Subject: Maths </span>
           <?php } elseif($val['dept_id']==3){ ?>
           <span style="  color: black; font-size: 14px; margin-left: -570px; padding-bottom: -15px;">Subject: Physics </span>
           <?php } elseif($val['dept_id']==4){ ?>
           <span style=" color: black; font-size: 14px; margin-left: -570px; padding-bottom: -15px;">Subject: Chemistry </span>
           <?php } elseif($val['dept_id']==5){ ?>
           <span style=" color: black;font-size: 14px; margin-left: -570px; padding-bottom: -15px;">Subject: Tamil </span>
           <?php } elseif($val['dept_id']==6){ ?>
           <span style=" color: black; font-size: 14px; margin-left: -570px; padding-bottom: -15px;">Subject: English </span>
          <?php } ?>

        </div>
      </div>
         <br><br>
            <table style="padding-right:-10px">
                <tr >
                    <th id="t"> Register Number </th>
                    <td> <?php echo($user_details[0]['reg_no'])?> </td>
                </tr>
                <tr>
                    <th id="t"> Name </th>
                    <td> <?php echo($user_details[0]['name'])?> </td>
                </tr>
                <tr>
                    <th id="t"> Date Of Birth </th>
                    <td><?php echo date("d-m-Y", strtotime($user_details[0]['dob'])); ?></td>
                </tr>
                <tr>
                    <th id="t"> Exam Year </th>
                    <td>May 2022</td>
                </tr>
               </table>
<br>
               <table>
                 <thead>
                <tr>
                    <th rowspan="3"> SEMESTER </th>
                    <th rowspan="3"> SUBJECT CODE </th>
                    <th rowspan="3"> SUBJECT </th>
                    <th rowspan="3"> CREDIT </th>
                    <th colspan="3">MAXIMUM</th>
                    <th colspan="3">MARKS SECURED </th>
                    <th rowspan="3"> GRADE </th>
                    <th rowspan="3"> RESULT </th>
                </tr>
                <tr>

                <th rowspan="1"> CIA </th>
                <th rowspan="1"> ESE </th>
                <th rowspan="1"> TOTAL </th>
                <th rowspan="1"> CIA </th>
                <th rowspan="1"> ESE </th>
                <th rowspan="1"> TOTAL </th>
              </tr>
              </thead>
              <tbody>
                <?php if(isset($marksheet_details) && !empty($marksheet_details)){

                  $i=1;
                  foreach($marksheet_details as $val){
                ?>
                <tr>
                    <td align="center"> <?php echo($val['sem'])?> </td>
                    <td align="center"> <?php echo($val['sub_code'])?> </td>
                    <td> <?php echo($val['subject'])?> </td>
                    <td align="center"> <?php echo($val['credit'])?> </td>
                    <td align="center"> 25 </td>
                    <td align="center"> 75 </td>
                    <td align="center"> 100</td>
                    <td align="center"> <?php echo($val['int_mark'])?> </td>
                    <td align="center"> <?php echo($val['ext_mark'])?> </td>
                    <td align="center"> <?php echo($val['total_mark'])?> </td>
                    <?php if($val['total_mark']>=90 && $val['total_mark']<=100){ ?>
                    <td align="center"> O </td>
                  <?php } elseif($val['total_mark']>=80 && $val['total_mark']<=89){ ?>
                     <td align="center"> D+ </td>
                     <?php } elseif($val['total_mark']>=75 && $val['total_mark']<=79){ ?>
                     <td align="center"> D </td>
                   <?php } elseif($val['total_mark']>=70 && $val['total_mark']<=74){ ?>
                     <td align="center"> A+ </td>
                   <?php } elseif($val['total_mark']>=60 && $val['total_mark']<=69){ ?>
                     <td align="center"> A </td>
                   <?php } elseif($val['total_mark']>=50 && $val['total_mark']<=59){ ?>
                     <td align="center"> B </td>
                   <?php } elseif($val['total_mark']>=40 && $val['total_mark']<=49){ ?>
                     <td align="center"> C </td>
                   <?php } elseif($val['total_mark']>=0 && $val['total_mark']<=39){ ?>
                     <td align="center"> U </td>
                    <?php } ?>
                    <?php if($val['total_mark']>39 ){ ?>
                    <td align="center"> P </td>
                  <?php } else { ?>
                    <td align="center"> RA </td>
                    <?php } ?>
                </tr>
              <?php  $i++; } } ?>
              </tbody>
               </table>
               <br><br>
               <div id="content" style=text-align: center;>
               <div>

               <span  style="color: black; margin-top:70px; margin-right: 10px; padding-bottom: -10px;">CGPA:  <?php echo($cgpa)?></span>
               </div>
               <br><br>
               <div>
               <span  style=" color: black; margin-left: -820px; padding-bottom: -15px;">Signature:</span>
               </div>
               <br>
               <div>
                 <span style="color: black; margin-left: -860px; padding-bottom: -15px;">Date:</span>
               </div>
               <br> <br>
             <div>
               <img style="margin-right: -550px; margin-top:-180px;" src="http://localhost/marksheet/themes/new_theme/student_dashboard/img/sign.png">
</div>
<div>
             <span style="color: black; margin-top:90px; margin-right: -550px; padding-bottom: -10px;">Controller of Examination</span>
           </div>
        </div>
    </div>
</div>
    </body>
    </html>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Dashboard</title>
<!--

Letter Template

https://templatemo.com/tm-510-letter



Template Re-distribution is NOT allowed.

-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">  <!-- Google web font "Open Sans" -->
  <link rel="stylesheet" href="<?=$this->config->item("base_url") ?>themes/new_theme/student_dashboard/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=$this->config->item("base_url") ?>themes/new_theme/student_dashboard/css/bootstrap.min.css">

  <link rel="stylesheet" href="<?=$this->config->item("base_url") ?>themes/new_theme/student_dashboard/css/demo.css" />
  <link rel="stylesheet" href="<?=$this->config->item("base_url") ?>themes/new_theme/student_dashboard/css/templatemo-style.css">

  <script type="text/javascript" src="<?=$this->config->item("base_url") ?>themes/new_theme/student_dashboard/js/modernizr.custom.86080.js"></script>

	</head>

	<body>

			<div id="particles-js"></div>

			<ul class="cb-slideshow">
	            <li></li>
	            <li></li>
	            <li></li>
	            <li></li>
	            <li></li>
	            <li></li>
	        </ul>

			<div class="container-fluid">
				<div class="row cb-slideshow-text-container ">
					<div class= "tm-content col-xl-6 col-sm-8 col-xs-8 ml-auto section">
            <div class="d-flex justify-content-end">
             <a href="<?=$this->config->item("base_url") ?>students/logout"><button style="margin-right: -10px; background-color:red;"> Logout</button></a>
        	</div>
					<header class="mb-5"><h1>Welcome <?=$user_details[0]['name']?> !</h1></header>
					<P class="mb-5">Enter Your Register Number And Date Of Birth To See Your Marksheet</P>

                    <form method="post" action="" class="subscribe-form">
               	    	<div class="row form-section">

							<div class="col-md-7 col-sm-7 col-xs-7">
                <label>Register No</label>
			                      <input name="reg_no" type="text" class="form-control" id="reg_no" placeholder="Your Register Number..." required/>
				  			</div>
                <br><br><br><br>

                <div class="col-md-7 col-sm-7 col-xs-7">
                    <label>Date Of Birth</label>
                              <input name="dob" type="date" class="form-control" id="dob" placeholder="Your Date Of Birth..." required/>
                  </div>
                  <br><br><br><br>
							<div class="col-md-7 col-sm-7 col-xs-7">
								<button type="submit" class="tm-btn-subscribe">Submit</button>
							</div>

						</div>
                    </form>

					<!-- <div class="tm-social-icons-container text-xs-center">
	                    <a href="#" class="tm-social-link"><i class="fa fa-facebook"></i></a>
	                    <a href="#" class="tm-social-link"><i class="fa fa-google-plus"></i></a>
	                    <a href="#" class="tm-social-link"><i class="fa fa-twitter"></i></a>
	                    <a href="#" class="tm-social-link"><i class="fa fa-linkedin"></i></a>
	                </div> -->

					</div>
				</div>

			</div>
	</body>

	<script type="text/javascript" src="<?=$this->config->item("base_url") ?>themes/new_theme/student_dashboard/js/particles.js"></script>
	<script type="text/javascript" src="<?=$this->config->item("base_url") ?>themes/new_theme/student_dashboard/js/app.js"></script>
</html>

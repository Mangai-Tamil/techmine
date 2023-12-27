<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Add Marks Form</title>

    <!-- Icons font CSS-->
    <link href="http://localhost/marksheet/themes/new_theme/reg_form/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="http://localhost/marksheet/themes/new_theme/reg_form/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="http://localhost/marksheet/themes/new_theme/reg_form/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="http://localhost/marksheet/themes/new_theme/reg_form/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="http://localhost/marksheet/themes/new_theme/reg_form/css/main.css" rel="stylesheet" media="all">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="themes/new_theme/login-page/style.css">

</head>

<body>
    <div class="page-wrapper  p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Add Subject Marks</h2>
                </div>
                <div class="card-body">
                    <form method="post" action="">
                      <?php	for ($i = 1; $i <= $subjectcount; $i++) { ?>
                        <div class="form-row">
                          <div class="form-row">
                              <div class="name">Subject <?=$i?> </div>
                              <div class="value">
                                  <div class="input-group">
                                      <div class="rs-select2 js-select-simple select--no-search">
                                          <select name="sub_id_<?=$i?>">
                                            <option value="">Choose option</option>
                                          <?php foreach ($subject_details as $val){ ?>
                                          <option value="<?=$val['id']?>"><?=$val['subject']?></option>
                                          <?php } ?>
                                          </select>
                                          <div class="select-dropdown"></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="form-row">
                            <div class="name">Intenal Mark</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="int_mark_<?=$i?>">
                                </div>
                            </div>
                          </div>
                          <div class="form-row">
                          <div class="name">External Mark</div>
                          <div class="value">
                              <div class="input-group">
                                  <input class="input--style-5" type="text" name="ext_mark_<?=$i?>">
                              </div>
                          </div>
                        </div>

                        </div>
                      <?php } ?>



                        <div>
                            <button class="btn btn--radius-2 btn--red" type="submit">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="http://localhost/marksheet/themes/new_theme/reg_form/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="http://localhost/marksheet/themes/new_theme/reg_form/vendor/select2/select2.min.js"></script>
    <script src="http://localhost/marksheet/themes/new_theme/reg_form/vendor/datepicker/moment.min.js"></script>
    <script src="http://localhost/marksheet/themes/new_theme/reg_form/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="http://localhost/marksheet/themes/new_theme/reg_form/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->


<!-- end document-->

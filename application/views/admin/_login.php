<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('/gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('/gentelella-master/vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('/gentelella-master/vendors/nprogress/nprogress.css'); ?>" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url('/gentelella-master/vendors/animate.css'); ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('/gentelella-master/build/css/custom.min.css'); ?>" rel="stylesheet">

  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">

        <div class="animate form login_form">
            <?php if ($this->session->flashdata('mesaj')){ ?>

            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong><?=$this->session->flashdata('mesaj')?></strong>
            </div>

            <?php } ?>

          <section class="login_content">
            <form action="<?=base_url()?>admin/login/login_ol" method="post">
              <h1>Admin Log-in Panel</h1>
              <div>
                <input type="email" name="email" class="form-control" placeholder="E-mail" required=""/>
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required=""/>
              </div>
              <div>
                <button type="submit" class="btn btn-default submit">Giriş</button>

              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Bloglight</h1>
                  <p></p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>

    <script src="<?php echo base_url('/gentelella-master/vendors/jquery/dist/jquery.min.js'); ?>"></script>

    <!-- Bootstrap -->
    <script src="<?php echo base_url('/gentelella-master/vendors/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>

    <!-- FastClick -->
    <script src="<?php echo base_url('/gentelella-master/vendors/fastclick/lib/fastclick.js'); ?>"></script>

    <!-- NProgress -->
    <script src="<?php echo base_url('/gentelella-master/vendors/nprogress/nprogress.js'); ?>"></script>


    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('/gentelella-master/build/js/custom.min.js'); ?>"></script>

    <script src="<?php echo base_url('/gentelella-master/src/js/fullscreen.js'); ?>"></script>

  </body>
</html>

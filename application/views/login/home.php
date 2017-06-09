<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>I'tikaf | Login</title>

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/style.css'); ?>" rel="stylesheet">

    <script src="<?php echo base_url('assets/modernizr.custom.63321.js'); ?>"></script>
</head>

<body>
    <div class="container">
        <!-- Codrops top bar -->
        <div class="codrops-top">
            <span class="right">
                <a href="<?php echo site_url('pendaftaran'); ?>">
                    <strong>Back to the Pendaftaran Form</strong>
                </a>
            </span>
        </div><!--/ Codrops top bar -->
        <header>
            <h1>Login Form <strong>CPanel</strong></h1>
            <h2>Masjid At Ta'awun</h2>
            <h2><?php echo $error; ?></h2>
            <div class="support-note">
                <span class="note-ie">Sorry, only modern browsers.</span>
            </div>
        </header>

        <section class="main">
            <?php
            $attributes = array('class' => 'form-5 clearfix', 'id' => 'form-signin');
            echo form_open('auth/validate_credential', $attributes);
            ?>
                <p>
                    <input type="text" id="txt_user_name" name="txt_user_name" placeholder="Username" required="required" autofocus="autofocus" autocomplete="off">
                    <input type="password" name="txt_user_password" id="txt_user_password" placeholder="Password" required="required">
                </p>
                <button type="submit" name="btn_login" value="btn_login">
                    <i class="icon-arrow-right"></i>
                    <span>Sign in</span>
                </button>
            <?php echo form_close(); ?>
        </section>
    </div>

    <!-- jQuery if needed -->
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/jQuery/jquery-3.1.1.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/jQuery/jquery.placeholder.min.js'); ?>"></script>
    <script type="text/javascript">
    $(function(){
        $('input, textarea').placeholder();
    });
    </script>
</body>
</html>

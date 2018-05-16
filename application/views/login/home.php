<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>M U T A N < Log in </title>
        <link href="<?php echo base_url('assets/login-style.css'); ?>" rel="stylesheet">
    </head>
    <body>

    <div class="container">
        <header>
            <br><br><br>
            <h1>AHLAN WA SAHLAN</h1>
            <h1>M U T A K I F I N A T T A A W U N</h1>
            <h2>Silahkan Login dengan informasi Login yang sudah Antum buat sebelumnya.<br>Jika belum memiliki Informasi Login, silahkan lakukan Pendaftaran terlebih dahulu.</h2>
            <h2><?php echo $error; ?></h2>
            <div class="support-note">
                <span class="note-ie">Sorry, only modern browsers.</span>
            </div>
        </header>
    </div>

    <div class="flex-wrap">
        <fieldset>
            <form method="post" action="<?php echo site_url("auth/validate_credential"); ?>">
                <input type="radio" name="rg" id="sign-in" checked/>
                <input type="radio" name="rg" id="sign-up" />
                <input type="radio" name="rg" id="reset" />

                <label for="sign-in">Sign in</label>
                <!-- <label for="sign-up">Sign up</label> -->
                <label for="reset">Reset</label>

                <input class="sign-in" type="text" placeholder="Username" name="txt_user_name" id="txt_user_name" autofocus="autofocus" autocomplete="off" />
                <input class="sign-in" type="password" placeholder ="Password"  name="txt_user_password" id="txt_user_password" />
                <input class="reset" type="email" placeholder="Email" name="txt_email" id="txt_email" autocomplete="off" />
                <!-- <input class="sign-up" type="password" placeholder ="Repeat Password" /> -->
                <button type="submit" name="btn_login" value="btn_login">Submit</button>

                <p>[ <a href="<?php echo site_url("pendaftaran"); ?>" target="_blank">PENDAFTARAN</a> ]</p>
            </form>
        </fieldset>
    </div>

    </body>
</html>

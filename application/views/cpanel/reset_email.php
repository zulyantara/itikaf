<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.min.css"); ?>">
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="row">
            <div class="col-md-12">
                <img src="<?php echo base_url("logo/logo.jpeg"); ?>" alt=""><br>
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <p>Assalamu'alaykum <?php echo $nama; ?></p>
                        <p>Anda telah berhasil melakukan reset password. Silahkan login dengan informasi berikut:</p><br>
                        <p>Username: <?php echo $username; ?></p>
                        <p>Password: <?php echo $password; ?></p>
                        <p>Login URL: https://www.mutan.or.id/auth</p><br>
                        <p>Jika masih ada kendala,</p>
                        <p>Hubungi Admin MUTAN di nomor WhatsApp berikut:</p>
                        <p>https://bit.ly/MutanSupport</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="<?php echo base_url("assets/plugins/jQuery/jquery-3.1.1.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/bootstrap/js/bootstrap.min.js"); ?>"></script>
</html>

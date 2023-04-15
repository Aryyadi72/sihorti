<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="assets/css/main/app.css" />
    <link rel="stylesheet" href="assets/css/pages/auth.css" />
    <link rel="shortcut icon" href="assets/images/logo/logo_holti.svg" type="image/x-icon" />
    <link rel="shortcut icon" href="assets/images/logo/logo_holti.png" type="image/png" />
    <!-- <link rel="stylesheet" type="text/css" href="https://csshake.surge.sh/csshake.min.css"> -->
    <link rel="stylesheet" href="<?php echo base_url() ?>./assets/hover/css/hover.css">
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <!-- <div class="auth-logo">
                        <a href="index.html"><img src="assets/images/logo/logo_holti.svg" alt="Logo" /></a>
                    </div> -->
                    <h1 style="margin-top:0px;" class="text-success"><img
                            src="<?php echo base_url(""); ?>assets/images/logo/logo_holti.svg"
                            style="float:left;margin-right:8px;margin-bottom:10px;margin-top:-5px;" height=60px
                            width=60px />SIHORTI
                    </h1>

                    <h1 class="auth-title text-warning" style="margin-top:100px;">Log in.</h1>
                    <p class="auth-subtitle mb-5">
                        Masukkan Username dan Password untuk Login SIHORTI.
                    </p>

                    <form class="form-login user" method="POST" action="<?php echo base_url('login/auth') ?> ">

                    <?php
                    if ($this->session->flashdata('gagal')) {
                    ?>
                    <div class="callout callout-danger">
                        <p style="font-size:15px">
                            <i class="fa fa-warning"></i> <?php echo $this->session->flashdata('gagal'); ?>
                        </p>
                    </div>
                    <?php
                    }
                    ?>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Username"
                                name="username" required />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password"
                                name="password" required />
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button type="submit" style="margin-top:10px;"
                            class="btn btn-lg btn-success btn-block shake-hard"
                            name="submit">Login</button>
                    </form>
                    <button style="margin-top:10px;" class="btn btn-lg btn-warning btn-block text-light shake-hard"
                        onclick="history.back()">Kembali</button>
                </div>
            </div>

            <style>
            div.bago {
                background-image: url("assets/images/kantor-1.png");
            }
            </style>
            <div class="col-lg-7 d-none d-lg-block bago">
                <!-- <div id="auth-right"> -->
                <div class="hvr-grow" style="margin-left:232px;margin-top:50px;margin-bottom:30px;">
                    <img height=500px width=500px src="<?php echo base_url(""); ?>assets/images/logo/logo_holti.svg" />

                </div>
                <div class="hvr-wobble-horizontal">
                    <h1
                        style="margin-left:200px;font-size:45px;color:white;background-color:green;display:inline-block;">
                        Sistem Informasi
                        Geografis
                        <br>
                        <h1
                            style="margin-left:50px;font-size:45px;text-align:center;color:white;background-color:green;display:inline-block;">
                            Produktivitas
                            Pertanian
                            dan Hortikultura</h1>
                        <br>
                        <h1
                            style="margin-left:300px;font-size:45px;text-align:center;color:white;background-color:green;display:inline-block;">
                            Kabupaten Tapin
                        </h1>
                    </h1>
                </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</body>

</html>
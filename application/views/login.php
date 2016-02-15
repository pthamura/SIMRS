<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>RSUD SERUI</title>
        <link rel="shortcut icon" href="<?php echo base_url('assets/favicon.png');?>" type="image/x-icon">
        <link rel="icon" href="<?php echo base_url('assets/favicon.png');?>" type="image/x-icon">
        <!-- Bootstrap -->
        <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css');?>">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>SIMRS</b> RSUD Serui</a>
            </div><!-- /.login-logo -->
            <?php if($this->session->flashdata('msg')=='failed-1'){ ?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Gagal masuk!</strong><br/>User tidak ada
                </div>
            <?php }elseif ($this->session->flashdata('msg')=='failed-2') { ?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Gagal masuk!</strong><br/>Username atau password salah
                </div>
            <?php }elseif ($this->session->flashdata('msg')=='failed-3') { ?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Gagal masuk!</strong><br/>User sedang tidak ditugaskan.
                </div>
            <?php }elseif ($this->session->flashdata('msg')=='error') { ?>
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Sesi berakhir!</strong><br/>Silahkan masuk kembali
                </div>
            <?php } ?>
            <div class="login-box-body">
                <p class="login-box-msg">Masukan username dan password Anda.</p>
                <?php echo form_open('login/cekLogin'); ?>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" autofocus name="username" placeholder="Username">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 col-xs-offset-8">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
                        </div><!-- /.col -->
                    </div>
                <?php echo form_close();?>
            </div><!-- /.login-box-body --><br/>
            <p class="footer text-center">&copy; <?php echo date('Y');?> Rumah Sakit Umum Daerah Serui</p>          
        </div><!-- /.login-box -->

        <script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js');?>"></script>
        <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>
    </body>
</html>
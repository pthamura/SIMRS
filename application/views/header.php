<?php
    if(!$this->session->userdata('id_user')){
        $this->session->set_flashdata('msg', 'error');
        header('location: '.base_url());
    }
?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>RSUD SERUI</title>
        <link rel="shortcut icon" href="<?php echo base_url('assets/favicon.png');?>" type="image/x-icon">
        <link rel="icon" href="<?php echo base_url('assets/favicon.png');?>" type="image/x-icon">
        <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/icon/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/icon/ionicons/css/ionicons.min.css');?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/skins/skin-blue.min.css');?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/plugins/select2/select2.min.css');?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.css');?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/plugins/datetimepicker/jquery.datetimepicker.css');?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/AdminLTE.min.css');?>" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini fixed">
        <div class="wrapper">
            <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>RS</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>RSUD</b> Serui</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-fixed-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php if($this->session->userdata('gender')=='L'){echo base_url('assets/img/avatar5.png');}else{echo base_url('assets/img/avatar3.png');}?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $this->session->userdata('fullname');?></strong></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php if($this->session->userdata('gender')=='L'){echo base_url('assets/img/avatar5.png');}else{echo base_url('assets/img/avatar3.png');}?>" class="img-circle" alt="User Image">
                            <p>
                                <?php echo $this->session->userdata('fullname');?><br/><span class="label label-default"><?php echo $this->session->userdata('level');?></span>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php echo base_url('user/profil/'.$this->session->userdata('id_user'));?>" class="btn btn-info btn-flat"><i class="fa fa-user"></i> Profil</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo base_url('login/logout');?>" class="btn btn-danger btn-flat"><i class="fa fa-power-off"></i> Keluar</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
          </div>
        </nav>
      </header>
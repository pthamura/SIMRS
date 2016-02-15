<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-archive"></i> Apotik
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('beranda'); ?>"><i class="fa fa-home"></i> Beranda</a></li>
            <li class="active">Obat Masuk</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Obat Masuk ke Apotik</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open('apotik/obatmasuk', array('class' => 'form-horizontal')); ?>
                    <div class="multi-field-wrapper">
                        <div class="multi-fields">
                            <div class="multi-field">
                                <div class="form-group">
                                    <div class="col-xs-3">
                                        <label for="kode_obat">Kode Obat <small class="text-danger">*</small></label>
                                        <input type="text" name="kode_obat[]" class="form-control" placeholder="Masukan kode obat" required>
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="nama_obat">Nama Obat <small class="text-danger">*</small></label>
                                        <input type="text" name="nama_obat[]" class="form-control" placeholder="Masukan nama obat" required>
                                    </div>
                                    <div class="col-xs-3">
                                        <label for="qty">Jumlah <small class="text-danger">*</small></label>
                                        <input type="text" name="qty[]" class="form-control" placeholder="Masukan jumlah obat" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12"><label class="text-danger"><small>* Wajib diisi</small></label></div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <input type="submit" class="btn btn-primary btn-flat" value="Submit">
                            </div>
                            <div class="col-xs-6 text-right">
                                <button type="button" id="tambahbaris" class="btn btn-info btn-flat">Tambah Baris</button>
                                <button type="button" onClick="window.location.reload();return false;" class="btn btn-danger btn-flat">Reset Baris</button>
                            </div>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </section>
</div>
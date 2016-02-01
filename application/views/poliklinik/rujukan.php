<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-medkit"></i> Poliklinik <?php echo ucwords($page);?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('beranda'); ?>"><i class="fa fa-home"></i> Beranda</a></li>
            <li><a href="<?php echo base_url('poliklinik/'.$page); ?>">Poliklinik <?php echo ucwords($page);?></a></li>
            <li class="active">Rujukan</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Data Pasien</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open('poliklinik/rujukan/'.$page.'/'.$id_pasien.'/'.$tujuan, array('class' => 'form-horizontal')); ?>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="pasien">Pasien</label>
                            <input type="text" name="pasien" class="form-control" value="<?php echo $pasien->nama_lengkap;?>" disabled>
                        </div>
                        <?php if ($tujuan == 'lab') { ?>
                        <div class="col-xs-6">
                            <label for="id_lab">Laboratorium <small class="text-danger">*</small></label>
                            <select name="id_lab" class="form-control select2" required>
                                <option value="">== Pilih Bagian ==</option>
                                <?php foreach ($lab as $dataLab) { ?>
                                <option value="<?php echo $dataLab->id_lab;?>"><?php echo $dataLab->nama_lab;?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <?php }elseif($tujuan == 'poli'){ ?>
                        <div class="col-xs-6">
                            <label for="id_poli">Poliklinik <small class="text-danger">*</small></label>
                            <select name="id_poli" class="form-control select2" required>
                                <option value="">== Pilih Poli ==</option>
                                <?php foreach ($poli as $dataPoli) { ?>
                                <option value="<?php echo $dataPoli->id_poli;?>"><?php echo $dataPoli->nama_poli;?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="periksa">Pemeriksaan <small class="text-danger">*</small></label>
                            <textarea name="periksa" class="form-control" rows="4" placeholder="Pemeriksaan yang dilakukan" required></textarea>
                        </div>
                        <div class="col-xs-6">
                            <label for="diagnosa">Diagnosa <small class="text-danger">*</small></label>
                            <textarea name="diagnosa" class="form-control" rows="4" placeholder="Diagnosa penyakit yang diderita pasien" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-3">
                            <label for="biaya">Biaya <small class="text-danger">*</small></label>
                            <input type="text" name="biaya" class="form-control" value="0" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="text-danger col-xs-12">* Wajib diisi</p>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="hidden" name="id_pendaftaran" value="<?php echo $pasien->id_pendaftaran;?>">
                            <input type="submit" class="btn btn-primary btn-flat" value="BUAT RUJUKAN">
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </section>
</div>
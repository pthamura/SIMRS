<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-flask"></i> Laboratorium Pemeriksaan Darah
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('beranda'); ?>"><i class="fa fa-home"></i> Beranda</a></li>
            <li>Laboratorium</li>
            <li><a href="<?php echo base_url('laboratorium/darah'); ?>">Lab Pemeriksaan Darah</a></li>
            <li class="active">Input Hasil Pemeriksaan</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Hasil Pemeriksaan</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open('laboratorium/darah/inputdata/'.$pasien->id_pasien, array('class' => 'form-horizontal')); ?>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="pasien">Pasien</label>
                            <input type="text" name="pasien" class="form-control" value="<?php echo $pasien->nama_lengkap;?>" disabled>
                        </div>
                        <div class="col-xs-6">
                            <label for="id_poli">Poliklinik <small class="text-danger">*</small></label>
                            <select name="id_poliklinik" class="form-control select2" required title="Wajib diisi">
                                <option value="">== Pilih Poli ==</option>
                                <?php foreach ($poli as $dataPoli) { ?>
                                <option value="<?php echo $dataPoli->id_poli;?>"><?php echo $dataPoli->nama_poli;?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-3">
                            <label for="haemoglobin">Haemoglobin</label>
                            <input type="text" name="haemoglobin" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <label for="leucocyt">Leucocyt</label>
                            <input type="text" name="leucocyt" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <label for="difrential_count">Difrential Count</label>
                            <input type="text" name="difrential_count" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <label for="laju_endap_darah">Laju Endap Darah</label>
                            <input type="text" name="laju_endap_darah" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-3">
                            <label for="malaria_ddr">Malaria (DDR)</label>
                            <input type="text" name="malaria_ddr" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <label for="masa_pendarahan">Masa Pendarahan</label>
                            <input type="text" name="masa_pendarahan" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <label for="masa_pembekuan">Masa Pembekuan</label>
                            <input type="text" name="masa_pembekuan" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <label for="golongan_darah">Golongan Darah</label>
                            <input type="text" name="golongan_darah" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-3">
                            <label for="thrombocyt">Thrombocyt</label>
                            <input type="text" name="thrombocyt" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <label for="haematocyt">Haematocyt</label>
                            <input type="text" name="haematocyt" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <label for="rumplead">Rumplead</label>
                            <input type="text" name="rumplead" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="text-danger col-xs-12">* Wajib diisi</p>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                        <input type="hidden" name="id_rujukan" value="<?php echo $pasien->id_rujukan;?>">
                        <input type="hidden" name="id_pendaftaran" value="<?php echo $pasien->id_pendaftaran;?>">
                            <input type="submit" class="btn btn-primary btn-flat" value="SIMPAN">
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </section>
</div>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-flask"></i> Laboratorium Pemeriksaan Klinis
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('beranda'); ?>"><i class="fa fa-home"></i> Beranda</a></li>
            <li>Laboratorium</li>
            <li><a href="<?php echo base_url('laboratorium/klinis'); ?>">Lab Pemeriksaan Klinis</a></li>
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
                <?php echo form_open('laboratorium/klinis/inputdata/'.$pasien->id_pasien, array('class' => 'form-horizontal')); ?>
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
                            <label for="protien_total">Protein Total</label>
                            <input type="text" name="protien_total" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <label for="albumin">Albumin</label>
                            <input type="text" name="albumin" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <label for="bilirubin_total">Bilirubin Total</label>
                            <input type="text" name="bilirubin_total" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <label for="bilirubin_direct">Bilirubin Direct</label>
                            <input type="text" name="bilirubin_direct" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-3">
                            <label for="silirubin_inderect">Silirubin Indirect</label>
                            <input type="text" name="silirubin_indirect" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <label for="sgot">SGOT</label>
                            <input type="text" name="sgot" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <label for="sgpt">SGPT</label>
                            <input type="text" name="sgpt" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <label for="ureum">Ureum</label>
                            <input type="text" name="ureum" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-3">
                            <label for="creatinin">Creatinin</label>
                            <input type="text" name="creatinin" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <label for="glukosa_puasa">Glukosa Puasa</label>
                            <input type="text" name="glukosa_puasa" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <label for="glukosa_2_jpp">Glukosa 2 JPP</label>
                            <input type="text" name="glukosa_2_jpp" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <label for="glukosa_sewaktu">Glukosa Sewaktu</label>
                            <input type="text" name="glukosa_sewaktu" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-3">
                            <label for="trigliseride">Trigliseride</label>
                            <input type="text" name="trigliseride" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <label for="cholestrol_total">Cholestrol Total</label>
                            <input type="text" name="cholestrol_total" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <label for="asam_urat">Asam Urat</label>
                            <input type="text" name="asam_urat" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <label for="rheumatoid_factor">Rheumatoid Factor</label>
                            <input type="text" name="rheumatoid_factor" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-3">
                            <label for="analisis_sperma">Analisis Sperma</label>
                            <input type="text" name="analisis_sperma" class="form-control">
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
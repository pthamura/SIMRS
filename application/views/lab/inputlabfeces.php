<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-flask"></i> Laboratorium Feces Rutin
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('beranda'); ?>"><i class="fa fa-home"></i> Beranda</a></li>
            <li>Laboratorium</li>
            <li><a href="<?php echo base_url('laboratorium/feces'); ?>">Lab Feces Rutin</a></li>
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
                <?php echo form_open('laboratorium/feces/inputdata/'.$pasien->id_pasien, array('class' => 'form-horizontal')); ?>
                    <div class="form-group">
                        <div class="col-xs-4">
                            <label for="pasien">Pasien</label>
                            <input type="text" name="pasien" class="form-control" value="<?php echo $pasien->nama_lengkap;?>" disabled>
                        </div>
                        <div class="col-xs-4">
                            <label for="id_poli">Poliklinik <small class="text-danger">*</small></label>
                            <select name="id_poliklinik" class="form-control select2" required title="Wajib diisi">
                                <option value="">== Pilih Poli ==</option>
                                <?php foreach ($poli as $dataPoli) { ?>
                                <option value="<?php echo $dataPoli->id_poli;?>"><?php echo $dataPoli->nama_poli;?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-xs-4">
                            <label for="poli_ruang">Poli / Ruang <small class="text-danger">*</small></label>
                            <input type="text" name="poli_ruang" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <h4><strong>Makroskopis</strong></h4>
                        </div>
                        <div class="col-xs-3">
                            <label for="warna">Warna</label>
                            <input type="text" name="warna" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <label for="konsistensi">Konsistensi</label>
                            <select name="konsistensi" class="form-control select2">
                                <option value="padat">Padat</option>
                                <option value="lembek">Lembek</option>
                                <option value="cair">Cair</option>
                            </select>
                        </div>
                        <div class="col-xs-3">
                            <label for="lendir">Lendir</label>
                            <input type="text" name="lendir" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <label for="darah">Darah</label>
                            <input type="text" name="darah" class="form-control">
                        </div>
                    </div><hr>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <h4><strong>Mikroskopis</strong></h4>
                        </div>
                        <div class="col-xs-12">
                            <h6><strong>I. Telur Cacing :</strong></h6>
                        </div>
                        <div class="col-xs-3">
                            <label for="tc_askaris_lumbricoides">Askaris Lumbricoides</label>
                            <input type="text" name="tc_askaris_lumbricoides" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <label for="tc_ankilostonum_duodenale">Ankilostonum Duodenale</label>
                            <input type="text" name="tc_ankilostonum_duodenale" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <label for="tc_trikuris">Trikuris</label>
                            <input type="text" name="tc_trikuris" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <label for="tc_stongiloides">Stongiloides</label>
                            <input type="text" name="tc_stongiloides" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <h6><strong>II. Sel :</strong></h6>
                        </div>
                        <div class="col-xs-4">
                            <label for="sel_eritrosit">Eritrosit</label>
                            <input type="text" name="sel_eritrosit" class="form-control">
                        </div>
                        <div class="col-xs-4">
                            <label for="sel_lekosit">Lekosit</label>
                            <input type="text" name="sel_lekosit" class="form-control">
                        </div>
                        <div class="col-xs-4">
                            <label for="sel_epitel">Epitel</label>
                            <input type="text" name="sel_epitel" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <h6><strong>III. Parasit :</strong></h6>
                        </div>
                        <div class="col-xs-4">
                            <label for="parasit_entamuba_histolitica">Entamuba Histolicia</label>
                            <input type="text" name="parasit_entamuba_histolitica" class="form-control">
                        </div>
                        <div class="col-xs-4">
                            <label for="parasit_entamuba_coli">Entamuba Coli</label>
                            <input type="text" name="parasit_entamuba_coli" class="form-control">
                        </div>
                        <div class="col-xs-4">
                            <label for="parasit_basil_coli">Bacil Coli</label>
                            <input type="text" name="parasit_basil_coli" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <h6><strong>IV. Sisa Makanan :</strong></h6>
                        </div>
                        <div class="col-xs-4">
                            <label for="sm_serat_daging">Serat Daging</label>
                            <input type="text" name="sm_serat_daging" class="form-control">
                        </div>
                        <div class="col-xs-4">
                            <label for="sm_sisa_tumbuhan">Sisa Tumbuh - tumbuhan</label>
                            <input type="text" name="sm_sisa_tumbuhan" class="form-control">
                        </div>
                        <div class="col-xs-4">
                            <label for="sm_globul_lemak">Globul Lemak</label>
                            <input type="text" name="sm_globul_lemak" class="form-control">
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
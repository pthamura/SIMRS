<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-flask"></i> Laboratorium Pemeriksaan Urine
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('beranda'); ?>"><i class="fa fa-home"></i> Beranda</a></li>
            <li>Laboratorium</li>
            <li><a href="<?php echo base_url('laboratorium/urine'); ?>">Lab Pemeriksaan Urine</a></li>
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
                <?php echo form_open('laboratorium/urine/inputdata/'.$pasien->id_pasien, array('class' => 'form-horizontal')); ?>
                    <div class="form-group">
                        <div class="col-xs-4">
                            <label for="pasien">Pasien</label>
                            <input type="text" name="pasien" class="form-control" value="<?php echo $pasien->nama_lengkap;?>" disabled>
                        </div>
                        <div class="col-xs-4">
                            <label for="id_poli">Poliklinik <small class="text-danger">*</small></label>
                            <select name="id_poliklinik" class="form-control select2" required>
                                <option value="">== Pilih Poli ==</option>
                                <?php foreach ($poli as $dataPoli) { ?>
                                <option value="<?php echo $dataPoli->id_poli;?>"><?php echo $dataPoli->nama_poli;?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-xs-4">
                            <label for="poli_bangsal">Poli / Bangsal <small class="text-danger">*</small></label>
                            <input type="text" name="poli_bangsal" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label for="diagnosa">Diagnosis <small class="text-danger">*</small></label>
                            <textarea name="diagnosa" class="form-control textarea" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <h4><strong>URINE CELUP / STICK</strong></h4>
                        </div>
                        <div class="col-xs-2">
                            <label for="warna">Warna</label>
                            <input type="text" name="warna" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <label for="bj">BJ</label>
                            <input type="text" name="bj" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <label for="ph">pH</label>
                            <input type="text" name="ph" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <label for="leukosit">Leukosit</label>
                            <input type="text" name="leukosit" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <label for="nitrite">Nitrite</label>
                            <input type="text" name="nitrite" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <label for="protein">Protein</label>
                            <input type="text" name="protein" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-2">
                            <label for="glucosa_reduksi">Glukosa / Reduksi</label>
                            <input type="text" name="glucosa_reduksi" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <label for="keton">Keton</label>
                            <input type="text" name="keton" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <label for="urobilinogen">Urobilinogen</label>
                            <input type="text" name="urobilinogen" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <label for="bilirubin">Bilirubin</label>
                            <input type="text" name="bilirubin" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <label for="eritrosit_blood">Eritrosit / Blood</label>
                            <input type="text" name="eritrosit_blood" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <label for="test_kehamilan">Tes Kehamilan</label>
                            <input type="text" name="tes_kehamilan" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label for="komentar">Komentar</label>
                            <textarea name="komentar" class="form-control textarea" rows="3"></textarea>
                        </div>
                    </div><hr>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <h4><strong>MIKROSKOPIS</strong></h4>
                        </div>
                        <div class="col-xs-12">
                            <h6><strong>I. Sedimen :</strong></h6>
                        </div>
                        <div class="col-xs-4">
                            <label for="sedimen_eritrosit">Eritrosit</label>
                            <input type="text" name="sedimen_eritrosit" class="form-control">
                        </div>
                        <div class="col-xs-4">
                            <label for="sedimen_lekosit">Lekosit</label>
                            <input type="text" name="sedimen_lekosit" class="form-control">
                        </div>
                        <div class="col-xs-4">
                            <label for="sedimen_epitel">Epitel</label>
                            <input type="text" name="sedimen_lekosit" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <h6><strong>II. Silinder :</strong></h6>
                        </div>
                        <div class="col-xs-3">
                            <label for="silinder_jenis">Jenis</label>
                            <input type="text" name="silinder_jenis" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <h6><strong>III. Kristal :</strong></h6>
                        </div>
                        <div class="col-xs-2">
                            <label for="kristal_asam_urat">Asam Urat</label>
                            <input type="text" name="glukosa_2_jpp" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <label for="kristal_triple_po4">PO4</label>
                            <input type="text" name="kristal_triple_po4" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <label for="kristal_ca_oksalat">Ca Oksalat</label>
                            <input type="text" name="kristal_ca_oksalat" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <label for="kristal_ca_co3">Ca CO3</label>
                            <input type="text" name="kristal_ca_co3" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <label for="kristal_ca_po4">Ca PO4</label>
                            <input type="text" name="kristal_ca_po4" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-3">
                            <label for="bakteri">Bakteri</label>
                            <input type="text" name="bakteri" class="form-control">
                        </div>
                        <div class="col-xs-3">
                            <label for="jamur">Jamur</label>
                            <input type="text" name="jamur" class="form-control">
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
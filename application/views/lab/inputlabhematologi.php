<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-flask"></i> Laboratorium Hematologi Manual
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('beranda'); ?>"><i class="fa fa-home"></i> Beranda</a></li>
            <li>Laboratorium</li>
            <li><a href="<?php echo base_url('laboratorium/hematologi'); ?>">Lab Hematologi Manual</a></li>
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
                <?php echo form_open('laboratorium/hematologi/inputdata/'.$pasien->id_pasien, array('class' => 'form-horizontal')); ?>
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
                            <label for="diagnosa">Diagnosis <small class="text-danger">*</small></label>
                            <textarea name="diagnosa" class="form-control textarea" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-4">
                            <label for="haemoglobin">Haemoglobin (Hb)</label>
                            <input type="text" name="haemoglobin" class="form-control">
                        </div>
                        <div class="col-xs-4">
                            <label for="lekosit">Lekosit</label>
                            <input type="text" name="lekosit" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <h6><strong>Hitung Jenis Lekosit :</strong></h6>
                        </div>
                        <div class="col-xs-2">
                            <label for="eosinofil">Eosinofil</label>
                            <input type="text" name="eosinofil" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <label for="basofil">Basofil</label>
                            <input type="text" name="basofil" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <label for="netrofil">Netrofil</label>
                            <input type="text" name="netrofil" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <label for="limfosit">Limfosit</label>
                            <input type="text" name="limfosit" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <label for="monosit">Monosit</label>
                            <input type="text" name="monosit" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-2">
                            <label for="trombosit">Trombosit</label>
                            <input type="text" name="trombosit" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <label for="led_jam">LED (jam)</label>
                            <input type="text" name="led_jam" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <label for="bleeding_time">Bleeding Time</label>
                            <input type="text" name="bleeding_time" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <label for="clotting_time">Clotting Time</label>
                            <input type="text" name="clotting_time" class="form-control">
                        </div>  
                        <div class="col-xs-2">
                            <label for="golongan_darah">Golongan Darah</label>
                            <input type="text" name="golongan_darah" class="form-control">
                        </div>  
                        <div class="col-xs-2">
                            <label for="rhesus">Rhesus (Rh)</label>
                            <input type="text" name="rhesus" class="form-control">
                        </div>  
                    </div>
                    <div class="form-group">
                        <div class="col-xs-4">
                            <label for="malaria_ddr">Malaria (DDR)</label>
                            <input type="text" name="malaria_ddr" class="form-control">
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
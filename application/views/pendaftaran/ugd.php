<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-edit"></i> Pendaftaran
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('beranda'); ?>"><i class="fa fa-home"></i> Beranda</a></li>
            <li>Pendaftaran</li>
            <li class="active">Pendaftaran Baru</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Pendaftaran Pasien UGD</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open_multipart('pendaftaran/ugd', array('class' => 'form-horizontal')); ?>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <?php 
                                $norm = $norm->norm+1;
                            ?>
                            <label for="norm">No. Rekam Medis <small class="text-danger">*</small></label>
                            <input type="text" id="norm" name="norm" class="form-control" value="<?php echo sprintf("%06d",$norm);?>" placeholder="Masukan nomor rekam medis" required/>
                        </div>
                        <div class="col-xs-2">
                            <label for="norm" class="col-xs-12">&nbsp;</label><br/>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalNORM" title="Cari No. Rekam Medis"><i class="fa fa-search"></i> Cari No. RM</button></i></small>
                        </div>
                        <!-- modal NORM -->
                        <div class="modal fade" id="modalNORM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Daftar No. Rekam Medis Pasien</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive">
                                            <table id="datatable" class="table table-bordered table-condensed table-hover">
                                                <thead>
                                                    <tr>
                                                        <th width="5%" class="text-center">#</th>
                                                        <th width="50%" class="text-center">NORM</th>
                                                        <th class="text-center">Nama</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($pasien as $dataPasien) { ?>
                                                    <tr>
                                                        <td width="5%">
                                                            <button data-dismiss="modal" type="button" class="btn btn-primary btn-xs btnnorm" value="<?php echo $dataPasien->norm.', '.$dataPasien->nama_lengkap.', '.$dataPasien->tpt_lahir.', '.$dataPasien->tgl_lahir.', '.$dataPasien->jenis_kelamin.', '.$dataPasien->jalan_1.', '.$dataPasien->jalan_2.', '.$dataPasien->kelurahan.', '.$dataPasien->kecamatan.', '.$dataPasien->kota.', '.$dataPasien->id_pasien;?>"><i class="fa fa-check"></i> Pilih</button>
                                                        </td>
                                                        <td width="30%"><?php echo $dataPasien->norm;?></td>
                                                        <td><?php echo $dataPasien->nama_lengkap;?></td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <?php 
                                $no_daftar = $nodaftar->no_daftar+1;
                            ?>
                            <label for="no_daftar">No. Pendaftaran <small class="text-danger">*</small></label>
                            <input type="text" name="no_daftar" class="form-control" value="<?php echo sprintf("%06d",$no_daftar)?>" placeholder="Masukan nomor pendaftaran" required/>
                        </div>
                        <div class="col-xs-6">
                            <label for="Pembayaran">Pembayaran <small class="text-danger">*</small></label>
                            <select name="pembayaran" class="form-control select2" required>
                                <option value="">== Pilih Cara Bayar ==</option>
                                <option value="Tunai">Tunai</option>
                                <option value="BPJS">BPJS</option>
                                <option value="Asuransi">Asuransi</option>
                            </select>    
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-4">
                            <label for="nama_lengkap">Nama Lengkap <small class="text-danger">*</small></label>
                            <input type="text" id="fullname" name="nama_lengkap" class="form-control" placeholder="Masukan nama lengkap pasien" required/>
                        </div>
                        <div class="col-xs-3">
                            <label for="tpt_lahir">Tempat Lahir <small class="text-danger">*</small></label>
                            <input type="text" id="place" name="tpt_lahir" class="form-control" placeholder="Masukan tempat lahir pasien" required/>
                        </div>
                        <div class="col-xs-2">
                            <label for="tgl_lahir">Tanggal Lahir <small class="text-danger">*</small></label>
                            <input type="text" id="datetimepicker" name="tgl_lahir" id="datetimepicker" class="form-control" placeholder="YYYY-MM-DD" required/>
                        </div>
                        <div class="col-xs-3">
                            <label for="jenis_kelamin">Jenis Kelamin <small class="text-danger">*</small></label><br/>
                            <label class="radio-inline">
                                <input type="radio" name="jenis_kelamin" id="L" value="L" required> Laki-laki
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="jenis_kelamin" id="P" value="P" required> Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label for="alamat">ALAMAT</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="jalan_1">Jalan 1 <small class="text-danger">*</small></label>
                            <input type="text" id="jalan_1" name="jalan_1" class="form-control" placeholder="Masukan nama jalan tempat tinggal" required >
                        </div>
                        <div class="col-xs-6">
                            <label for="jalan_2">Jalan 2</label>
                            <input type="text" id="jalan_2" name="jalan_2" class="form-control" placeholder="Diisi hanya jika alamat tidak cukup di Jalan 1" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-4">
                            <label for="kelurahan">Kelurahan</label>
                            <input type="text" id="kelurahan" name="kelurahan" class="form-control" placeholder="Masukan nama kelurahan tempat tinggal" >
                        </div>
                        <div class="col-xs-4">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="text" id="kecamatan" name="kecamatan" class="form-control" placeholder="Masukan nama kecamatan tempat tinggal" >
                        </div>
                        <div class="col-xs-4">
                            <label for="kota">Kota / Kabupaten</label>
                            <input type="text" id="kota" name="kota" class="form-control" placeholder="Masukan nama kota / kabupaten tempat tinggal" >
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="text-danger col-xs-12">* Wajib diisi</p>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="hidden" name="id_pasien" id="id_pasien">
                            <input type="hidden" name="tujuan" value="UGD">
                            <input type="submit" class="btn btn-primary btn-flat" value="TAMBAHKAN">
                        </div>
                    </div>
                <?php form_close(); ?>
            </div>
        </div>
    </section>
</div>
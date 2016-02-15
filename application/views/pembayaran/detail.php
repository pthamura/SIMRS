<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-money"></i> Loket Pembayaran    
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('beranda');?>"><i class="fa fa-home"></i> Beranda</a></li>
            <li>Loket Pembayaran</li>
            <li class="active">Detail</li>
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
                <?php echo form_open('pembayaran/bayar/'.$pasien->id_pasien.'/'.$pasien->id_pendaftaran, array('class' => 'form-horizontal')); ?>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="pasien">Pasien</label>
                            <input type="text" name="pasien" class="form-control" value="<?php echo $pasien->nama_lengkap;?>" disabled>
                        </div>
                        <div class="col-xs-3">
                            <label for="norm">NORM</label>
                            <input type="text" name="norm" class="form-control" value="<?php echo $pasien->norm;?>" disabled>
                        </div>
                        <div class="col-xs-3">
                            <label for="norm">No. Pendaftaran</label>
                            <input type="text" name="no_daftar" class="form-control" value="<?php echo $pasien->no_daftar;?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="detail">Tagihan Pemeriksaan</label>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered table-condensed">
                                    <thead>
                                        <tr>
                                            <th width="3%" class="text-center">No</th>
                                            <th class="text-center">Kegunaan</th>
                                            <th class="text-center">Biaya</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=0;foreach ($tagihan as $dt) {$no++; ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no;?></td>
                                            <td><?php echo $dt->guna;?></td>
                                            <td class="text-right">Rp. <?php echo rupiah($dt->biaya);?>,-</td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                            <th colspan="2" class="text-right">Sub Total</th>
                                            <th class="text-right">Rp. <?php echo rupiah($totg->biaya);?>,-</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <label for="detail">Tagihan Obat <a class="label label-info" data-toggle="modal" data-target="#tambahBaru"><i class="fa fa-plus"></i> Tambah Obat</a></label>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered table-condensed">
                                    <thead>
                                        <tr>
                                            <th width="3%" class="text-center">No</th>
                                            <th class="text-center">Nama Obat</th>
                                            <th class="text-center">Harga</th>
                                            <th width="5%" class="text-center">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=0;foreach ($resep as $dr) {$no++; ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no;?></td>
                                            <td><?php echo $dr->nama_obat;?></td>
                                            <td class="text-right">Rp. <?php echo rupiah($dr->harga);?>,-</td>
                                            <td class="text-center"><a href="<?php echo base_url('pembayaran/hapusobat/'.$dr->id_tagihan_resep);?>" data-toggle="tooltip" data-placement="bottom" title="Hapus" class="text-danger"><i class="fa fa-close"></i></a></td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                            <th colspan="2" class="text-right">Sub Total</th>
                                            <th class="text-right">Rp. <?php echo rupiah($tresep->harga);?>,-</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-3">
                            <label for="total">TOTAL = Rp. <?php echo rupiah($totg->biaya+$tresep->harga);?>,-</label>
                            <input type="hidden" name="total_tagihan" value="<?php echo $totg->biaya+$tresep->harga;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="text-danger col-xs-12">* Wajib diisi</p>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="hidden" name="id_pendaftaran" value="<?php echo $pasien->id_pendaftaran;?>">
                            <input type="submit" class="btn btn-primary btn-flat" value="SUBMIT">
                        </div>
                    </div>
                <?php echo form_close(); ?>
                <!-- Modal -->
                <div class="modal fade" id="tambahBaru" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <?php echo form_open('pembayaran/obat/'.$pasien->id_pasien.'/'.$pasien->id_pendaftaran, array('class' => 'form-inline')); ?>
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Tambah Tagihan Obat</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="text" name="nama_obat" class="form-control" placeholder="Nama Obat *" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="harga" class="form-control" placeholder="Harga Obat" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-home"></i> Beranda
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Halaman Utama</a></li>
            <li class="active">Beranda</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- jika login sebagai petugas front office -->
        <?php if($this->session->userdata('id_level') == 5){ ?>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-6 col-xs-12">
                <!-- small box -->
                <div class="small-box bg-light-blue-active">
                    <div class="inner">
                        <h3>ANTRIAN NO. <?php if(!$antrian->no_antri){echo '0';}else{echo $antrian->no_antri;} ?></h3>
                        <?php echo form_open('antrian/antrianDaftar'); ?>
                            <input type="hidden" value="Loket 1" name="loket">
                            <input type="hidden" value="<?php echo $antrian->no_antri+1;?>" name="no_antri">
                            <button type="submit" class="btn btn-default btn-flat">Panggil Antrian Berikutnya
                            </button>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="icon">
                        <i class="fa fa-list-ol"></i>
                    </div>
                    <?php echo form_open('antrian/resetantrianDaftar'); ?>
                        <button type="submit" class="btn btn-primary btn-flat btn-sm btn-block">RESET ANTRIAN</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('pendaftaran/poliklinik');?>">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>Poliklinik</h3>
                            <p>Pendaftaran</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-medkit"></i>
                        </div>
                        <span class="small-box-footer">PENDAFTARAN POLIKLINIK <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('pendaftaran/ugd');?>">
                    <div class="small-box bg-red-active">
                        <div class="inner">
                            <h3>UGD</h3>
                            <p>Pendaftaran</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-ambulance"></i>
                        </div>
                        <span class="small-box-footer">PENDAFTARAN UGD <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('pendaftaran/rawatinap');?>">
                    <div class="small-box bg-maroon">
                        <div class="inner">
                            <h3>Rawat Inap</h3>
                            <p>Informasi</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-bed"></i>
                        </div>
                        <span class="small-box-footer">INFO PASIEN RAWAT INAP <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div>
        </div><!-- /.row -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Daftar Pasien Baru</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="5%" class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th width="5%" class="text-center">L/P</th>
                                <th class="text-center">Tujuan</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=0; foreach ($pendaftaran as $dataPendaftaran) { $no++; ?>
                            <tr>
                                <td class="text-center"><?php echo $no;?></td>
                                <td>
                                    <?php echo $dataPendaftaran->nama_lengkap;?><br/>
                                    <small><strong>NORM : <?php echo $dataPendaftaran->norm;?></strong></small>
                                </td>
                                <td class="text-center"><?php echo $dataPendaftaran->jenis_kelamin;?></td>
                                <td>
                                    <?php 
                                        if($dataPendaftaran->id_poli==NULL){
                                            echo strtoupper($dataPendaftaran->tujuan);
                                        }else{
                                            echo ucwords($dataPendaftaran->tujuan) .' ('.$dataPendaftaran->nama_poli.')';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <small>
                                        <?php echo $dataPendaftaran->jalan_1;?>
                                        <?php if($dataPendaftaran->jalan_2){echo $dataPendaftaran->jalan_2;}?>
                                        <?php if($dataPendaftaran->kelurahan){echo '<br/>Kel. '.$dataPendaftaran->kelurahan;}?>
                                        <?php if($dataPendaftaran->kecamatan){echo 'Kec. '.$dataPendaftaran->kecamatan;}?>
                                        <?php if($dataPendaftaran->kota){echo '<br/>'.$dataPendaftaran->kota;}?>
                                    </small>
                                </td>
                                <td class="text-center">
                                    <a data-toggle="tooltip" data-placement="top" title="Print Kartu" href="<?php echo base_url('createpdf/pdfDaftar/'.$dataPendaftaran->id_pasien);?>" target="_blank" class="btn btn-info btn-sm btn-flat"><i class="fa fa-print"></i> PRINT KARTU</button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- jika login sebagai petugas front office -->
        <?php }elseif($this->session->userdata('id_level') == 7){ ?>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-6 col-xs-12">
                <!-- small box -->
                <div class="small-box bg-light-blue-active">
                    <div class="inner">
                        <h3>ANTRIAN NO. <?php if(!$antrian->no_antri){echo '0';}else{echo $antrian->no_antri;} ?></h3>
                        <?php echo form_open('antrian/antrianBayar'); ?>
                            <input type="hidden" value="Loket 1" name="loket">
                            <input type="hidden" value="<?php echo $antrian->no_antri+1;?>" name="no_antri">
                            <button type="submit" class="btn btn-default btn-flat">Panggil Antrian Berikutnya
                            </button>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="icon">
                        <i class="fa fa-list-ol"></i>
                    </div>
                    <?php echo form_open('antrian/resetantrianBayar'); ?>
                        <button type="submit" class="btn btn-primary btn-flat btn-sm btn-block">RESET ANTRIAN</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Daftar Pasien Bayar</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="5%" class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th width="5%" class="text-center">L/P</th>
                                <th width="5%" class="text-center">Umur</th>
                                <th class="text-center">Alamat</th>
                                <th width="5%" class="text-center">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=0; foreach ($pasien as $dataPasien) { $no++; ?>
                            <tr>
                                <td class="text-center"><?php echo $no;?></td>
                                <td>
                                    <?php echo $dataPasien->nama_lengkap;?><br/>
                                    <small><strong>NORM : <?php echo $dataPasien->norm;?></strong></small>
                                </td>
                                <td class="text-center"><?php echo $dataPasien->jenis_kelamin;?></td>
                                <td class="text-right"><?php echo umur($dataPasien->tgl_lahir);?> Thn</td>
                                <td>
                                    <small>
                                        <?php echo $dataPasien->jalan_1;?>
                                        <?php if($dataPasien->jalan_2){echo $dataPasien->jalan_2;}?>
                                        <?php if($dataPasien->kelurahan){echo '<br/>Kel. '.$dataPasien->kelurahan;}?>
                                        <?php if($dataPasien->kecamatan){echo 'Kec. '.$dataPasien->kecamatan;}?>
                                        <?php if($dataPasien->kota){echo '<br/>'.$dataPasien->kota;}?>
                                    </small>
                                </td>
                                <td class="text-center">
                                    <a data-toggle="tooltip" data-placement="top" title="Lihat Detail" href="<?php echo base_url('pembayaran/detail/'.$dataPasien->id_pasien.'/'.$dataPasien->id_pendaftaran);?>" class="btn btn-info btn-sm btn-flat"><i class="fa fa-eye"></i> LIHAT DETAIL</button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- jika login sebagai apoteker -->
        <?php }elseif($this->session->userdata('id_level') == 8){ ?>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('apotik/daftarobat');?>">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>Daftar Obat</h3>
                            <p>Daftar Obat di Apotik</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-list"></i>
                        </div>
                        <span class="small-box-footer">DAFTAR OBAT DI APOTIK <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('apotik/obatmasuk');?>">
                    <div class="small-box bg-maroon-active">
                        <div class="inner">
                            <h3>Obat Masuk</h3>
                            <p>Form Obat Masuk</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-sign-in"></i>
                        </div>
                        <span class="small-box-footer">OBAT MASUK KE APOTIK <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('apotik/obatkeluar');?>">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>Obat Keluar</h3>
                            <p>Form Obat Keluar</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-sign-out"></i>
                        </div>
                        <span class="small-box-footer">OBAT KELUAR DARI APOTIK <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('apotik/gudang');?>">
                    <div class="small-box bg-light-blue">
                        <div class="inner">
                            <h3>Obat Gudang</h3>
                            <p>Daftar Obat di Gudang</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-list"></i>
                        </div>
                        <span class="small-box-footer">DAFTAR OBAT DI GUDANG <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div><!-- ./col -->
        </div><!-- /.row -->
        <!-- jika login sebagai staff gudang -->
        <?php }elseif($this->session->userdata('id_level') == 9){ ?>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('gudang/daftarobat');?>">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>Daftar Obat</h3>
                            <p>Daftar Obat di Gudang</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-list"></i>
                        </div>
                        <span class="small-box-footer">DAFTAR OBAT DI GUDANG <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('gudang/obatmasuk');?>">
                    <div class="small-box bg-maroon-active">
                        <div class="inner">
                            <h3>Obat Masuk</h3>
                            <p>Form Obat Masuk</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-sign-in"></i>
                        </div>
                        <span class="small-box-footer">OBAT MASUK KE GUDANG <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('gudang/obatkeluar');?>">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>Obat Keluar</h3>
                            <p>Form Obat Keluar</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-sign-out"></i>
                        </div>
                        <span class="small-box-footer">OBAT KELUAR DARI GUDANG <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('gudang/alatkesehatan');?>">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>Alat Kesehatan</h3>
                            <p>Daftar Alat Kesehatan di Gudang</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-list"></i>
                        </div>
                        <span class="small-box-footer">DAFTAR ALAT KESEHATAN DI GUDANG <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('gudang/alatkesehatanmasuk');?>">
                    <div class="small-box bg-maroon-active">
                        <div class="inner">
                            <h3>Alat Kesehatan Masuk</h3>
                            <p>Form Alat Kesehatan Masuk</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-sign-in"></i>
                        </div>
                        <span class="small-box-footer">ALAT KESEHATAN MASUK KE GUDANG <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('gudang/alatkesehatankeluar');?>">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>Alat Kesehatan Keluar</h3>
                            <p>Form Alat Kesehatan Keluar</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-sign-out"></i>
                        </div>
                        <span class="small-box-footer">ALAT KESEHATAN KELUAR DARI GUDANG <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('gudang/oksigen');?>">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>Oksigen</h3>
                            <p>Daftar Oksigen di Gudang</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-list"></i>
                        </div>
                        <span class="small-box-footer">DAFTAR OKSIGEN DI GUDANG <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('gudang/alatkesehatanmasuk');?>">
                    <div class="small-box bg-maroon-active">
                        <div class="inner">
                            <h3>Oksigen Masuk</h3>
                            <p>Form Oksigen Masuk</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-sign-in"></i>
                        </div>
                        <span class="small-box-footer">OKSIGEN KE GUDANG <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('gudang/alatkesehatankeluar');?>">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>Oksigen Keluar</h3>
                            <p>Form Oksigen Keluar</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-sign-out"></i>
                        </div>
                        <span class="small-box-footer">OKSIGEN KELUAR DARI GUDANG <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div><!-- ./col -->
        </div><!-- /.row -->
        <!-- jika login sebagai dokter poli gigi -->
        <?php }elseif ($this->session->userdata('id_poli') == 1) { ?>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-6 col-xs-12">
                <!-- small box -->
                <div class="small-box bg-light-blue-active">
                    <div class="inner">
                        <h3>ANTRIAN NO. <?php if(!$antrian->no_antri){echo '0';}else{echo $antrian->no_antri;} ?></h3>
                        <?php echo form_open('antrian/antriangigi'); ?>
                            <input type="hidden" value="Loket 1" name="loket">
                            <input type="hidden" value="<?php echo $antrian->no_antri+1;?>" name="no_antri">
                            <button type="submit" class="btn btn-default btn-flat">Panggil Antrian Berikutnya
                            </button>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="icon">
                        <i class="fa fa-list-ol"></i>
                    </div>
                    <?php echo form_open('antrian/resetantriangigi'); ?>
                        <button type="submit" class="btn btn-primary btn-flat btn-sm btn-block">RESET ANTRIAN</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('poliklinik/gigi');?>">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>Poli Gigi</h3>
                            <p>Daftar Pasien</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-medkit"></i>
                        </div>
                        <span class="small-box-footer">PASIEN POLI GIGI <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('poliklinik/hasil-lab/gigi');?>">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>Laboratorium</h3>
                            <p>Hasil Pemeriksaan</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-flask"></i>
                        </div>
                        <span class="small-box-footer">HASIL PEMERIKSAAN LAB <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('createpdf/pdfrujukan');?>" target="_blank">
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3>Rujukan</h3>
                            <p>Print</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-print"></i>
                        </div>
                        <span class="small-box-footer">PRINT RUJUKAN <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div>
        </div><!-- /.row -->
        <!-- jika login sebagai dokter poli mata -->
        <?php }elseif ($this->session->userdata('id_poli') == 2) { ?>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-6 col-xs-12">
                <!-- small box -->
                <div class="small-box bg-light-blue-active">
                    <div class="inner">
                        <h3>ANTRIAN NO. <?php if(!$antrian->no_antri){echo '0';}else{echo $antrian->no_antri;} ?></h3>
                        <?php echo form_open('antrian/antrianmata'); ?>
                            <input type="hidden" value="Loket 1" name="loket">
                            <input type="hidden" value="<?php echo $antrian->no_antri+1;?>" name="no_antri">
                            <button type="submit" class="btn btn-default btn-flat">Panggil Antrian Berikutnya
                            </button>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="icon">
                        <i class="fa fa-list-ol"></i>
                    </div>
                    <?php echo form_open('antrian/resetantrianmata'); ?>
                        <button type="submit" class="btn btn-primary btn-flat btn-sm btn-block">RESET ANTRIAN</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('poliklinik/mata');?>">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>Poli Mata</h3>
                            <p>Daftar Pasien</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-medkit"></i>
                        </div>
                        <span class="small-box-footer">PASIEN POLI MATA <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('poliklinik/hasil-lab/mata');?>">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>Laboratorium</h3>
                            <p>Hasil Pemeriksaan</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-flask"></i>
                        </div>
                        <span class="small-box-footer">HASIL PEMERIKSAAN LAB <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('createpdf/pdfrujukan');?>" target="_blank">
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3>Rujukan</h3>
                            <p>Print</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-print"></i>
                        </div>
                        <span class="small-box-footer">PRINT RUJUKAN <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div>
        </div><!-- /.row -->
        <!-- jika login sebagai dokter poli kulit -->
        <?php }elseif ($this->session->userdata('id_poli') == 3) { ?>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-6 col-xs-12">
                <!-- small box -->
                <div class="small-box bg-light-blue-active">
                    <div class="inner">
                        <h3>ANTRIAN NO. <?php if(!$antrian->no_antri){echo '0';}else{echo $antrian->no_antri;} ?></h3>
                        <?php echo form_open('antrian/antriankulit'); ?>
                            <input type="hidden" value="Loket 1" name="loket">
                            <input type="hidden" value="<?php echo $antrian->no_antri+1;?>" name="no_antri">
                            <button type="submit" class="btn btn-default btn-flat">Panggil Antrian Berikutnya
                            </button>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="icon">
                        <i class="fa fa-list-ol"></i>
                    </div>
                    <?php echo form_open('antrian/resetantriankulit'); ?>
                        <button type="submit" class="btn btn-primary btn-flat btn-sm btn-block">RESET ANTRIAN</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('poliklinik/kulit');?>">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>Poli Kulit</h3>
                            <p>Daftar Pasien</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-medkit"></i>
                        </div>
                        <span class="small-box-footer">PASIEN POLI KULIT <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('poliklinik/hasil-lab/kulit');?>">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>Laboratorium</h3>
                            <p>Hasil Pemeriksaan</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-flask"></i>
                        </div>
                        <span class="small-box-footer">HASIL PEMERIKSAAN LAB <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('createpdf/pdfrujukan');?>" target="_blank">
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3>Rujukan</h3>
                            <p>Print</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-print"></i>
                        </div>
                        <span class="small-box-footer">PRINT RUJUKAN <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div>
        </div><!-- /.row -->
        <!-- jika login sebagai dokter poli bedah -->
        <?php }elseif ($this->session->userdata('id_poli') == 4) { ?>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-6 col-xs-12">
                <!-- small box -->
                <div class="small-box bg-light-blue-active">
                    <div class="inner">
                        <h3>ANTRIAN NO. <?php if(!$antrian->no_antri){echo '0';}else{echo $antrian->no_antri;} ?></h3>
                        <?php echo form_open('antrian/antrianbedah'); ?>
                            <input type="hidden" value="Loket 1" name="loket">
                            <input type="hidden" value="<?php echo $antrian->no_antri+1;?>" name="no_antri">
                            <button type="submit" class="btn btn-default btn-flat">Panggil Antrian Berikutnya
                            </button>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="icon">
                        <i class="fa fa-list-ol"></i>
                    </div>
                    <?php echo form_open('antrian/resetantrianbedah'); ?>
                        <button type="submit" class="btn btn-primary btn-flat btn-sm btn-block">RESET ANTRIAN</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('poliklinik/bedah');?>">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>Poli Bedah</h3>
                            <p>Daftar Pasien</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-medkit"></i>
                        </div>
                        <span class="small-box-footer">PASIEN POLI BEDAH <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('poliklinik/hasil-lab/bedah');?>">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>Laboratorium</h3>
                            <p>Hasil Pemeriksaan</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-flask"></i>
                        </div>
                        <span class="small-box-footer">HASIL PEMERIKSAAN LAB <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('createpdf/pdfrujukan');?>" target="_blank">
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3>Rujukan</h3>
                            <p>Print</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-print"></i>
                        </div>
                        <span class="small-box-footer">PRINT RUJUKAN <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div>
        </div><!-- /.row -->
        <!-- jika login sebagai dokter poli obgyn -->
        <?php }elseif ($this->session->userdata('id_poli') == 5) { ?>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-6 col-xs-12">
                <!-- small box -->
                <div class="small-box bg-light-blue-active">
                    <div class="inner">
                        <h3>ANTRIAN NO. <?php if(!$antrian->no_antri){echo '0';}else{echo $antrian->no_antri;} ?></h3>
                        <?php echo form_open('antrian/antrianobgyn'); ?>
                            <input type="hidden" value="Loket 1" name="loket">
                            <input type="hidden" value="<?php echo $antrian->no_antri+1;?>" name="no_antri">
                            <button type="submit" class="btn btn-default btn-flat">Panggil Antrian Berikutnya
                            </button>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="icon">
                        <i class="fa fa-list-ol"></i>
                    </div>
                    <?php echo form_open('antrian/resetantrianobgyn'); ?>
                        <button type="submit" class="btn btn-primary btn-flat btn-sm btn-block">RESET ANTRIAN</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('poliklinik/obgyn');?>">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>Poli Obgyn</h3>
                            <p>Daftar Pasien</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-medkit"></i>
                        </div>
                        <span class="small-box-footer">PASIEN POLI OBGYN <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('poliklinik/hasil-lab/obgyn');?>">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>Laboratorium</h3>
                            <p>Hasil Pemeriksaan</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-flask"></i>
                        </div>
                        <span class="small-box-footer">HASIL PEMERIKSAAN LAB <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('createpdf/pdfrujukan');?>" target="_blank">
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3>Rujukan</h3>
                            <p>Print</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-print"></i>
                        </div>
                        <span class="small-box-footer">PRINT RUJUKAN <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div>
        </div><!-- /.row -->
        <!-- jika login sebagai dokter poli anak -->
        <?php }elseif ($this->session->userdata('id_poli') == 6) { ?>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-6 col-xs-12">
                <!-- small box -->
                <div class="small-box bg-light-blue-active">
                    <div class="inner">
                        <h3>ANTRIAN NO. <?php if(!$antrian->no_antri){echo '0';}else{echo $antrian->no_antri;} ?></h3>
                        <?php echo form_open('antrian/antriananak'); ?>
                            <input type="hidden" value="Loket 1" name="loket">
                            <input type="hidden" value="<?php echo $antrian->no_antri+1;?>" name="no_antri">
                            <button type="submit" class="btn btn-default btn-flat">Panggil Antrian Berikutnya
                            </button>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="icon">
                        <i class="fa fa-list-ol"></i>
                    </div>
                    <?php echo form_open('antrian/resetantriananak'); ?>
                        <button type="submit" class="btn btn-primary btn-flat btn-sm btn-block">RESET ANTRIAN</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('poliklinik/anak');?>">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>Poli Anak</h3>
                            <p>Daftar Pasien</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-medkit"></i>
                        </div>
                        <span class="small-box-footer">PASIEN POLI ANAK <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('poliklinik/hasil-lab/anak');?>">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>Laboratorium</h3>
                            <p>Hasil Pemeriksaan</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-flask"></i>
                        </div>
                        <span class="small-box-footer">HASIL PEMERIKSAAN LAB <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('createpdf/pdfrujukan');?>" target="_blank">
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3>Rujukan</h3>
                            <p>Print</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-print"></i>
                        </div>
                        <span class="small-box-footer">PRINT RUJUKAN <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div>
        </div><!-- /.row -->
        <!-- jika login sebagai dokter poli interna -->
        <?php }elseif ($this->session->userdata('id_poli') == 7) { ?>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-6 col-xs-12">
                <!-- small box -->
                <div class="small-box bg-light-blue-active">
                    <div class="inner">
                        <h3>ANTRIAN NO. <?php if(!$antrian->no_antri){echo '0';}else{echo $antrian->no_antri;} ?></h3>
                        <?php echo form_open('antrian/antrianinterna'); ?>
                            <input type="hidden" value="Loket 1" name="loket">
                            <input type="hidden" value="<?php echo $antrian->no_antri+1;?>" name="no_antri">
                            <button type="submit" class="btn btn-default btn-flat">Panggil Antrian Berikutnya
                            </button>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="icon">
                        <i class="fa fa-list-ol"></i>
                    </div>
                    <?php echo form_open('antrian/resetantrianinterna'); ?>
                        <button type="submit" class="btn btn-primary btn-flat btn-sm btn-block">RESET ANTRIAN</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('poliklinik/interna');?>">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>Poli Interna</h3>
                            <p>Daftar Pasien</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-medkit"></i>
                        </div>
                        <span class="small-box-footer">PASIEN POLI INTERNA <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('poliklinik/hasil-lab/interna');?>">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>Laboratorium</h3>
                            <p>Hasil Pemeriksaan</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-flask"></i>
                        </div>
                        <span class="small-box-footer">HASIL PEMERIKSAAN LAB <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('createpdf/pdfrujukan');?>" target="_blank">
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3>Rujukan</h3>
                            <p>Print</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-print"></i>
                        </div>
                        <span class="small-box-footer">PRINT RUJUKAN <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div>
        </div><!-- /.row -->
        <!-- jika login sebagai dokter poli umum -->
        <?php }elseif ($this->session->userdata('id_poli') == 8) { ?>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-6 col-xs-12">
                <!-- small box -->
                <div class="small-box bg-light-blue-active">
                    <div class="inner">
                        <h3>ANTRIAN NO. <?php if(!$antrian->no_antri){echo '0';}else{echo $antrian->no_antri;} ?></h3>
                        <?php echo form_open('antrian/antrianumum'); ?>
                            <input type="hidden" value="Loket 1" name="loket">
                            <input type="hidden" value="<?php echo $antrian->no_antri+1;?>" name="no_antri">
                            <button type="submit" class="btn btn-default btn-flat">Panggil Antrian Berikutnya
                            </button>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="icon">
                        <i class="fa fa-list-ol"></i>
                    </div>
                    <?php echo form_open('antrian/resetantrianumum'); ?>
                        <button type="submit" class="btn btn-primary btn-flat btn-sm btn-block">RESET ANTRIAN</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('poliklinik/umum');?>">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>Poli Umum</h3>
                            <p>Daftar Pasien</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-medkit"></i>
                        </div>
                        <span class="small-box-footer">PASIEN POLI UMUM <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('poliklinik/hasil-lab/umum');?>">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>Laboratorium</h3>
                            <p>Hasil Pemeriksaan</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-flask"></i>
                        </div>
                        <span class="small-box-footer">HASIL PEMERIKSAAN LAB <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <a href="<?php echo base_url('createpdf/pdfrujukan');?>" target="_blank">
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3>Rujukan</h3>
                            <p>Print</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-print"></i>
                        </div>
                        <span class="small-box-footer">PRINT RUJUKAN <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div>
        </div><!-- /.row -->
        <!-- jika login sebagai staff lab -->
        <?php }elseif ($this->session->userdata('id_level') == 6) { ?>
        <div class="row">
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <a href="<?php echo base_url('laboratorium/darah');?>">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>Pemeriksaan Darah</h3>
                            <p>Laboratorium</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-flask"></i>
                        </div>
                        <span class="small-box-footer">LAB PEMERIKSAAN DARAH <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <a href="<?php echo base_url('laboratorium/klinis');?>">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>Klinis</h3>
                            <p>Laboratorium</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-flask"></i>
                        </div>
                        <span class="small-box-footer">LAB PEMERIKSAAN KLINIS <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <a href="<?php echo base_url('laboratorium/urine');?>">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>Pemeriksaan Urine</h3>
                            <p>Laboratorium</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-flask"></i>
                        </div>
                        <span class="small-box-footer">LAB PEMERIKSAAN URINE <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <a href="<?php echo base_url('laboratorium/feces');?>">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>Feces Rutin</h3>
                            <p>Laboratorium</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-flask"></i>
                        </div>
                        <span class="small-box-footer">LAB FECES RUTIN <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <a href="<?php echo base_url('laboratorium/hematologi');?>">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>Hematologi Manual</h3>
                            <p>Laboratorium</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-flask"></i>
                        </div>
                        <span class="small-box-footer">LAB HEMATOLOGI MANUAL <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
            </div>
        </div>
        <?php } ?>
    </section>
</div>
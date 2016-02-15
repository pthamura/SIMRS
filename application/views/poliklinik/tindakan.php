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
            <li class="active">Tindakan</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Tindakan</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-3 col-xs-12">
                        <!-- small box -->
                        <a href="<?php echo base_url('poliklinik/rujukan/'.$page.'/'.$pasien->id_pasien.'/lab');?>">
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h3>Laboratorium</h3>
                                    <p>&nbsp;</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-flask"></i>
                                </div>
                                <span class="small-box-footer">KE LABORATORIUM <i class="fa fa-arrow-circle-right"></i></span>
                            </div>
                        </a>
                    </div><!-- ./col -->
                    <div class="col-lg-3 col-xs-12">
                        <!-- small box -->
                        <a href="<?php echo base_url('poliklinik/rujukan/'.$page.'/'.$pasien->id_pasien.'/poli');?>">
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>Poliklinik</h3>
                                    <p>&nbsp;</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-medkit"></i>
                                </div>
                                <span class="small-box-footer">KE POLIKLINIK LAIN <i class="fa fa-arrow-circle-right"></i></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-xs-12">
                        <!-- small box -->
                        <a href="<?php echo base_url('poliklinik/rawatinap/'.$page);?>">
                            <div class="small-box bg-light-blue">
                                <div class="inner">
                                    <h3>Rawat Inap</h3>
                                    <p>&nbsp;</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-bed"></i>
                                </div>
                                <span class="small-box-footer">PASIEN HARUS RAWAT INAP <i class="fa fa-arrow-circle-right"></i></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-xs-12">
                        <!-- small box -->
                        <a href="<?php echo base_url('poliklinik/pulang/'.$page.'/'.$pasien->id_pasien);?>">
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>Pulang</h3>
                                    <p>&nbsp;</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-check"></i>
                                </div>
                                <span class="small-box-footer">PASIEN DIIZINKAN PULANG <i class="fa fa-arrow-circle-right"></i></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Data Pasien</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th width="17%">No. Rekam Medis</th>
                                <td width="1%">:</td>
                                <td><?php echo $pasien->norm;?></td>
                            </tr>
                            <tr>
                                <th width="17%">Nama Lengkap</th>
                                <td width="1%">:</td>
                                <td><?php echo $pasien->nama_lengkap;?> (<?php echo umur($pasien->tgl_lahir);?> Tahun)</td>
                            </tr>
                            <tr>
                                <th width="17%">Tempat, Tanggal Lahir</th>
                                <td width="1%">:</td>
                                <td><?php echo ucwords($pasien->tpt_lahir);?>, <?php echo tgl_indo($pasien->tgl_lahir);?></td>
                            </tr>
                            <tr>
                                <th width="17%">Alamat</th>
                                <td width="1%">:</td>
                                <td>
                                    <small>
                                        <?php echo $pasien->jalan_1;?>
                                        <?php if($pasien->jalan_2){echo $pasien->jalan_2;}?>
                                        <?php if($pasien->kelurahan){echo '<br/>Kel. '.$pasien->kelurahan;}?>
                                        <?php if($pasien->kecamatan){echo 'Kec. '.$pasien->kecamatan;}?>
                                        <?php if($pasien->kota){echo '<br/>'.$pasien->kota;}?>
                                    </small>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Riwayat Pemeriksaan</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <ul class="list-group">
                    <?php foreach ($rm as $dataRM) { ?>
                    <li class="list-group-item"><label class="label label-info"><?php echo indonesian_date($dataRM->tgl_input);?></label> - <?php echo $dataRM->pesan;?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </section>
</div>
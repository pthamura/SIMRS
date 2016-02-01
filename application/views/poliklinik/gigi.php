<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-medkit"></i> Poliklinik Gigi
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('beranda'); ?>"><i class="fa fa-home"></i> Beranda</a></li>
            <li class="active">Poliklinik Gigi</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Daftar Pasien Poliklinik Gigi</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="5%" class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th width="5%" class="text-center">L/P</th>
                                <th class="text-center">Umur</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">#</th>
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
                                    <div class="btn-group">
                                        <a class="btn btn-primary btn-sm btn-flat" data-toggle="tooltip" data-placement="top" title="Tindakan" href="<?php echo base_url('poliklinik/tindakan/gigi/'.$dataPasien->id_pasien);?>"><small><i class="fa fa-pencil"></i> TINDAKAN</small></a>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
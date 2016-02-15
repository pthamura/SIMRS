<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-flask"></i> Hasil Laboratorium
        </h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i> Beranda</li>
            <li><a href="<?php echo base_url('poliklinik/'.$page); ?>">Poliklinik <?php echo ucwords($page);?></a></li>
            <li class="active">Hasil Pemeriksaaan</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Daftar Hasil Pemeriksaan Laboratorium</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="5%" class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th width="5%" class="text-center">L/P</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">Laboratorium</th>
                                <th width="19%" class="text-center">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=0; foreach ($pasien as $dataPasien) { $no++; ?>
                            <tr>
                                <td class="text-center"><?php echo $no;?></td>
                                <td>
                                    <?php echo $dataPasien->nama_lengkap;?><br/>
                                    <strong>NORM : <?php echo $dataPasien->norm;?></strong>
                                </td>
                                <td class="text-center"><?php echo $dataPasien->jenis_kelamin;?></td>
                                <td>
                                    <small>
                                        <?php echo $dataPasien->jalan_1;?>
                                        <?php if($dataPasien->jalan_2){echo $dataPasien->jalan_2;}?>
                                        <?php if($dataPasien->kelurahan){echo '<br/>Kel. '.$dataPasien->kelurahan;}?>
                                        <?php if($dataPasien->kecamatan){echo 'Kec. '.$dataPasien->kecamatan;}?>
                                        <?php if($dataPasien->kota){echo '<br/>'.$dataPasien->kota;}?>
                                    </small>
                                </td>
                                <td><?php echo $dataPasien->nama_lab;?></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a class="btn btn-primary btn-sm btn-flat" data-toggle="tooltip" data-placement="top" title="Tindakan" href="<?php echo base_url('poliklinik/tindakan/'.$page.'/'.$dataPasien->id_pasien);?>"><small><i class="fa fa-pencil"></i> TINDAKAN </small></a>
                                        <a class="btn btn-info btn-sm btn-flat" target="_blank" data-toggle="tooltip" data-placement="top" title="Lihat Hasil Pemeriksaan" href="<?php echo base_url('createpdf/pdfdarah/'.$dataPasien->id_pasien);?>"><small><i class="fa fa-eye"></i> LIHAT HASIL </small></a>
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
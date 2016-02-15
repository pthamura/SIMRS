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
            <li class="active">Pemeriksaan Urine</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Daftar Pasien Lab Pemeriksaan Urine</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="5%" class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th width="5%" class="text-center">L/P</th>
                                <th class="text-center">Dari</th>
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
                                    <strong>NORM : <?php echo $dataPasien->norm;?></strong>
                                </td>
                                <td class="text-center"><?php echo $dataPasien->jenis_kelamin;?></td>
                                <td><?php echo $dataPasien->nama_poli;?></td>
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
                                    <?php if($dataPasien->dicek=='N'){ ?>
                                    <div class="btn-group">
                                        <a class="btn btn-primary btn-sm btn-flat" data-toggle="tooltip" data-placement="top" title="Input Hasil Pemeriksaan" href="<?php echo base_url('laboratorium/urine/inputdata/'.$dataPasien->id_pasien);?>"><small><i class="fa fa-pencil"></i> INPUT DATA </small></a>
                                    </div>
                                    <?php }else{ ?>
                                    <div class="btn-group">
                                        <a class="btn btn-primary btn-sm btn-flat" target="_blank" data-toggle="tooltip" data-placement="top" title="Print Hasil Pemeriksaan" href="<?php echo base_url('createpdf/pdfurine/'.$dataPasien->id_pasien);?>"><small><i class="fa fa-print"></i> PRINT HASIL </small></a>
                                    </div>
                                    <?php } ?>
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
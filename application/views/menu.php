<?php
    error_reporting(0);
    if($menu=='beranda'){
        $aktif_beranda = 'active';
    }elseif($menu=='pendaftaran-poli'){
        $aktif_daftar_poli = 'active';
    }elseif($menu=='pendaftaran-ugd'){
        $aktif_daftar_ugd = 'active';
    }elseif($menu=='info-rawat'){
        $aktif_info_rawat = 'active';
    }elseif($menu=='gigi'){
        $aktif_gigi = 'active';
    }elseif($menu=='mata'){
        $aktif_mata = 'active';
    }elseif($menu=='kulit'){
        $aktif_kulit = 'active';
    }elseif($menu=='bedah'){
        $aktif_bedah = 'active';
    }elseif($menu=='obgyn'){
        $aktif_obgyn = 'active';
    }elseif($menu=='anak'){
        $aktif_anak = 'active';
    }elseif($menu=='interna'){
        $aktif_interna = 'active';
    }elseif($menu=='umum'){
        $aktif_umum = 'active';
    }elseif($menu=='lab'){
        $aktif_lab = 'active';
    }elseif($menu=='labdarah'){
        $aktif_darah = 'active';
    }elseif($menu=='labklinis'){
        $aktif_klinis = 'active';
    }elseif($menu=='laburine'){
        $aktif_urine = 'active';
    }elseif($menu=='labfeces'){
        $aktif_feces = 'active';
    }elseif($menu=='labhematologi'){
        $aktif_hematologi = 'active';
    }elseif($menu=='hasillab'){
        $aktif_hasil = 'active';
    }elseif($menu=='bayar'){
        $aktif_bayar = 'active';
    }elseif($menu=='obatapotik'){
        $aktif_apotik = 'active';
        $aktif_daftarobat_apotik = 'active';
    }elseif($menu=='obatapotikmasuk'){
        $aktif_apotik = 'active';
        $aktif_obatapotik_masuk = 'active';
    }elseif($menu=='obatapotikkeluar'){
        $aktif_apotik = 'active';
        $aktif_obatapotik_keluar = 'active';
    }elseif($menu=='apotikgudang'){
        $aktif_apotik = 'active';
        $aktif_daftarobat_gudang = 'active';
    }elseif($menu=='gudangobat'){
        $aktif_gudangobat = 'active';
        $aktif_gudangobat_list = 'active';
    }elseif($menu=='gudangobatmasuk'){
        $aktif_gudangobat = 'active';
        $aktif_gudangobat_masuk = 'active';
    }elseif($menu=='gudangobatkeluar'){
        $aktif_gudangobat = 'active';
        $aktif_gudangobat_keluar = 'active';
    }elseif($menu=='gudangalkes'){
        $aktif_alatkesehatan = 'active';
        $aktif_alatkesehatan_list = 'active';
    }elseif($menu=='gudangalkesmasuk'){
        $aktif_alatkesehatan = 'active';
        $aktif_alatkesehatan_masuk = 'active';
    }elseif($menu=='gudangalkeskeluar'){
        $aktif_alatkesehatan = 'active';
        $aktif_alatkesehatan_keluar = 'active';
    }
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php if($this->session->userdata('gender')=='L'){echo base_url('assets/img/avatar5.png');}else{echo base_url('assets/img/avatar3.png');}?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $this->session->userdata('fullname'); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a> <a href="<?php echo base_url('login/logout');?>" class="label label-danger"><i class="fa fa-power-off"></i> Keluar</a>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header">MENU UTAMA</li>
            <?php
                // jika login sebagai admin
                if($this->session->userdata('id_role')==1){
            ?>
            <li class="<?php echo $aktif_beranda;?>">
                <a href="<?php echo base_url('beranda');?>"><i class="fa fa-home"></i> <span>Beranda</span></a>
            </li>
            <?php 
                // jika login sebagai frontoffice
                }elseif($this->session->userdata('id_level')==5){
            ?>
            <li class="<?php echo $aktif_beranda;?>">
                <a href="<?php echo base_url('beranda');?>"><i class="fa fa-home"></i> <span>Beranda</span></a>
            </li>
            <li class="<?php echo $aktif_daftar_poli;?>">
                <a href="<?php echo base_url('pendaftaran/poliklinik');?>"><i class="fa fa-medkit"></i> <span>Pendaftaran Poliklinik</span></a>
            </li>
            <li class="<?php echo $aktif_daftar_ugd;?>">
                <a href="<?php echo base_url('pendaftaran/ugd');?>"><i class="fa fa-ambulance"></i> <span>Pendaftaran UGD</span></a>
            </li>
            <li class="<?php echo $aktif_info_rawat;?>">
                <a href="<?php echo base_url('pendaftaran/rawatinap');?>"><i class="fa fa-bed"></i> <span>Pasien Rawat Inap</span></a>
            </li>
            <?php 
                // jika login sebagai loket pembayaran
                }elseif($this->session->userdata('id_level')==7){
            ?>
            <li class="<?php echo $aktif_beranda;?>">
                <a href="<?php echo base_url('beranda');?>"><i class="fa fa-home"></i> <span>Beranda</span></a>
            </li>
            <li class="<?php echo $aktif_bayar;?>">
                <a href="<?php echo base_url('pembayaran');?>"><i class="fa fa-money"></i> <span>Pembayaran</span></a>
            </li>
            <?php 
                // jika login sebagai apoteker
                }elseif($this->session->userdata('id_level')==8){
            ?>
            <li class="<?php echo $aktif_apotik;?> treeview">
                <a href="#"><i class="fa fa-stethoscope"></i> Obat <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu"> 
                    <li class="<?php echo $aktif_daftarobat_apotik;?>">
                        <a href="<?php echo base_url('apotik/daftarobat');?>"><i class="fa fa-circle-o"></i> <span>Daftar Obat - Apotik</span></a>
                    </li>
                    <li class="<?php echo $aktif_obatapotik_masuk;?>">
                        <a href="<?php echo base_url('apotik/obatmasuk');?>"><i class="fa fa-circle-o"></i> <span>Obat Masuk</span></a>
                    </li>
                    <li class="<?php echo $aktif_obatapotik_keluar;?>">
                        <a href="<?php echo base_url('apotik/obatkeluar');?>"><i class="fa fa-circle-o"></i> <span>Obat Keluar</span></a>
                    </li>
                    <li class="<?php echo $aktif_daftarobat_gudang;?>">
                        <a href="<?php echo base_url('apotik/gudang');?>"><i class="fa fa-circle-o"></i> <span>Daftar Obat - Gudang</span></a>
                    </li>
                </ul>
            </li>
            <?php 
                // jika login sebagai staff gudang
                }elseif($this->session->userdata('id_level')==9){
            ?>
            <li class="<?php echo $aktif_beranda;?>">
                <a href="<?php echo base_url('beranda');?>"><i class="fa fa-home"></i> <span>Beranda</span></a>
            </li>
            <li class="<?php echo $aktif_gudangobat;?> treeview">
                <a href="#"><i class="fa fa-stethoscope"></i> Obat <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu"> 
                    <li class="<?php echo $aktif_gudangobat_list;?>">
                        <a href="<?php echo base_url('gudang/daftarobat');?>"><i class="fa fa-circle-o"></i> <span>Daftar Obat</span></a>
                    </li>
                    <li class="<?php echo $aktif_gudangobat_masuk;?>">
                        <a href="<?php echo base_url('gudang/obatmasuk');?>"><i class="fa fa-circle-o"></i> <span>Obat Masuk</span></a>
                    </li>
                    <li class="<?php echo $aktif_gudangobat_keluar;?>">
                        <a href="<?php echo base_url('gudang/obatkeluar');?>"><i class="fa fa-circle-o"></i> <span>Obat Keluar</span></a>
                    </li>
                </ul>
            </li>
            <li class="<?php echo $aktif_alatkesehatan;?> treeview">
                <a href="#"><i class="fa fa-wheelchair"></i> Alat Kesehatan <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="<?php echo $aktif_alatkesehatan_list;?>">
                        <a href="<?php echo base_url('gudang/alatkesehatan');?>"><i class="fa fa-circle-o"></i> <span>Daftar Alat Kesehatan</span></a>
                    </li>
                    <li class="<?php echo $aktif_alatkesehatan_masuk;?>">
                        <a href="<?php echo base_url('gudang/alatkesehatanmasuk');?>"><i class="fa fa-circle-o"></i> <span>Alat Kesehatan Masuk</span></a>
                    </li>
                    <li class="<?php echo $aktif_alatkesehatan_keluar;?>">
                        <a href="<?php echo base_url('gudang/alatkesehatankeluar');?>"><i class="fa fa-circle-o"></i> <span>Alat Kesehatan Keluar</span></a>
                    </li>
                </ul>
            </li>
            <li class="<?php echo $aktif_oksigen;?> treeview">
                <a href="#"><i class="fa fa-heartbeat"></i> Oksigen <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="<?php echo $aktif_oksigen_list;?>">
                        <a href="<?php echo base_url('gudang/oksigen');?>"><i class="fa fa-circle-o"></i> <span>Daftar Oksigen</span></a>
                    </li>
                    <li class="<?php echo $aktif_oksigen_masuk;?>">
                        <a href="<?php echo base_url('gudang/oksigenmasuk');?>"><i class="fa fa-circle-o"></i> <span>Oksigen Masuk</span></a>
                    </li>
                    <li class="<?php echo $aktif_oksigen_keluar;?>">
                        <a href="<?php echo base_url('gudang/oksigenkeluar');?>"><i class="fa fa-circle-o"></i> <span>Oksigen Keluar</span></a>
                    </li>
                </ul>
            </li>
            <?php 
                // jika login sebagai poli gigi
                }elseif($this->session->userdata('id_poli')==1){
            ?>
            <li class="<?php echo $aktif_beranda;?>">
                <a href="<?php echo base_url('beranda');?>"><i class="fa fa-home"></i> <span>Beranda</span></a>
            </li>
            <li class="<?php echo $aktif_gigi;?>">
                <a href="<?php echo base_url('poliklinik/gigi');?>"><i class="fa fa-medkit"></i> <span>Poli Gigi</span></a>
            </li>
            <li class="<?php echo $aktif_hasil;?>">
                <a href="<?php echo base_url('poliklinik/hasil-lab/gigi');?>"><i class="fa fa-flask"></i> <span>Hasil Lab</span></a>
            </li>
            <?php 
                // jika login sebagai petugas poli mata
                }elseif($this->session->userdata('id_poli')==2){ 
            ?> 
            <li class="<?php echo $aktif_beranda;?>">
                <a href="<?php echo base_url('beranda');?>"><i class="fa fa-home"></i> <span>Beranda</span></a>
            </li>
            <li class="<?php echo $aktif_mata;?>">
                <a href="<?php echo base_url('poliklinik/mata');?>"><i class="fa fa-medkit"></i> <span>Poli Mata</span></a>
            </li>
            <li class="<?php echo $aktif_hasil;?>">
                <a href="<?php echo base_url('poliklinik/hasil-lab/mata');?>"><i class="fa fa-flask"></i> <span>Hasil Lab</span></a>
            </li>
            <?php 
                // jika login sebagai petugas poli kulit
                }elseif($this->session->userdata('id_poli')==3){ 
            ?> 
            <li class="<?php echo $aktif_beranda;?>">
                <a href="<?php echo base_url('beranda');?>"><i class="fa fa-home"></i> <span>Beranda</span></a>
            </li>
            <li class="<?php echo $aktif_kulit;?>">
                <a href="<?php echo base_url('poliklinik/kulit');?>"><i class="fa fa-medkit"></i> <span>Poli Kulit</span></a>
            </li>
            <li class="<?php echo $aktif_hasil;?>">
                <a href="<?php echo base_url('poliklinik/hasil-lab/kulit');?>"><i class="fa fa-flask"></i> <span>Hasil Lab</span></a>
            </li>
            <?php 
                // jika login sebagai petugas poli bedah
                }elseif($this->session->userdata('id_poli')==4){ 
            ?> 
            <li class="<?php echo $aktif_beranda;?>">
                <a href="<?php echo base_url('beranda');?>"><i class="fa fa-home"></i> <span>Beranda</span></a>
            </li>
            <li class="<?php echo $aktif_bedah;?>">
                <a href="<?php echo base_url('poliklinik/bedah');?>"><i class="fa fa-medkit"></i> <span>Poli Bedah</span></a>
            </li>
            <li class="<?php echo $aktif_hasil;?>">
                <a href="<?php echo base_url('poliklinik/hasil-lab/bedah');?>"><i class="fa fa-flask"></i> <span>Hasil Lab</span></a>
            </li>
            <?php 
                // jika login sebagai petugas polik obgyn
                }elseif($this->session->userdata('id_poli')==5){ 
            ?> 
            <li class="<?php echo $aktif_beranda;?>">
                <a href="<?php echo base_url('beranda');?>"><i class="fa fa-home"></i> <span>Beranda</span></a>
            </li>
            <li class="<?php echo $aktif_obgyn;?>">
                <a href="<?php echo base_url('poliklinik/obgyn');?>"><i class="fa fa-medkit"></i> <span>Poli Obgyn</span></a>
            </li>
            <li class="<?php echo $aktif_hasil;?>">
                <a href="<?php echo base_url('poliklinik/hasil-lab/obgyn');?>"><i class="fa fa-flask"></i> <span>Hasil Lab</span></a>
            </li>
            <?php 
                // jika login sebagai petugas poli anak
                }elseif($this->session->userdata('id_poli')==6){ 
            ?> 
            <li class="<?php echo $aktif_beranda;?>">
                <a href="<?php echo base_url('beranda');?>"><i class="fa fa-home"></i> <span>Beranda</span></a>
            </li>
            <li class="<?php echo $aktif_anak;?>">
                <a href="<?php echo base_url('poliklinik/anak');?>"><i class="fa fa-medkit"></i> <span>Poli Anak</span></a>
            </li>
            <li class="<?php echo $aktif_hasil;?>">
                <a href="<?php echo base_url('poliklinik/hasil-lab/anak');?>"><i class="fa fa-flask"></i> <span>Hasil Lab</span></a>
            </li>
            <?php 
                // jika login sebagai petugas poli interna
                }elseif($this->session->userdata('id_poli')==7){ 
            ?> 
            <li class="<?php echo $aktif_beranda;?>">
                <a href="<?php echo base_url('beranda');?>"><i class="fa fa-home"></i> <span>Beranda</span></a>
            </li>
            <li class="<?php echo $aktif_interna;?>">
                <a href="<?php echo base_url('poliklinik/interna');?>"><i class="fa fa-medkit"></i> <span>Poli Interna</span></a>
            </li>
            <li class="<?php echo $aktif_hasil;?>">
                <a href="<?php echo base_url('poliklinik/hasil-lab/interna');?>"><i class="fa fa-flask"></i> <span>Hasil Lab</span></a>
            </li>
            <?php 
                // jika login sebagai petugas poli umum
                }elseif($this->session->userdata('id_poli')==8){ 
            ?> 
            <li class="<?php echo $aktif_beranda;?>">
                <a href="<?php echo base_url('beranda');?>"><i class="fa fa-home"></i> <span>Beranda</span></a>
            </li>
            <li class="<?php echo $aktif_umum;?>">
                <a href="<?php echo base_url('poliklinik/umum');?>"><i class="fa fa-medkit"></i> <span>Poli Umum</span></a>
            </li>
            <li class="<?php echo $aktif_hasil;?>">
                <a href="<?php echo base_url('poliklinik/hasil-lab/umum');?>"><i class="fa fa-flask"></i> <span>Hasil Lab</span></a>
            </li>
            <?php 
                // jika login sebagai petugas laboratorium
                }elseif($this->session->userdata('id_level')==6){ 
            ?> 
            <li class="<?php echo $aktif_beranda;?>">
                <a href="<?php echo base_url('beranda');?>"><i class="fa fa-home"></i> <span>Beranda</span></a>
            </li>
            <li class="<?php echo $aktif_darah;?>">
                <a href="<?php echo base_url('laboratorium/darah');?>"><i class="fa fa-flask"></i> <span>Lab Pemeriksaan Darah</span></a>
            </li>
            <li class="<?php echo $aktif_klinis;?>">
                <a href="<?php echo base_url('laboratorium/klinis');?>"><i class="fa fa-flask"></i> <span>Lab Pemeriksaan Klinis</span></a>
            </li>
            <li class="<?php echo $aktif_urine;?>">
                <a href="<?php echo base_url('laboratorium/urine');?>"><i class="fa fa-flask"></i> <span>Lab Pemeriksaan Urine</span></a>
            </li>
            <li class="<?php echo $aktif_feces;?>">
                <a href="<?php echo base_url('laboratorium/feces');?>"><i class="fa fa-flask"></i> <span>Lab Feces Rutin</span></a>
            </li>
            <li class="<?php echo $aktif_hematologi;?>">
                <a href="<?php echo base_url('laboratorium/hematologi');?>"><i class="fa fa-flask"></i> <span>Lab Hematologi Manual</span></a>
            </li>
            <?php } ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
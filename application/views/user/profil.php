<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-user"></i> Profil Saya
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('beranda'); ?>"><i class="fa fa-home"></i> Beranda</a></li>
            <li class="active">Profil Saya</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Data User</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?php echo validation_errors(); ?>
                <?php if($this->session->userdata('id_role') == 1){$ro='';}else{$ro='readonly';}?>
                <?php echo form_open('user/profil/'.$user->id_user, array('class' => 'form-horizontal')); ?>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="pasien">Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $user->username;?>" disabled>
                        </div>
                        <div class="col-xs-6">
                            <label for="fullname">Nama Lengkap <small class="text-danger">*</small></label>
                            <input type="text" name="fullname" class="form-control" value="<?php echo $user->fullname;?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-3">
                            <label for="jenis_kelamin">Jenis Kelamin <small class="text-danger">*</small></label><br/>
                            <?php if($user->gender == 'L'){$ceL='checked';$ceP='';}else{$ceL='';$ceP='checked';} ?>
                            <label class="radio-inline">
                                <input type="radio" name="gender" id="L" value="L" <?php echo $ceL;?> required> Laki-laki
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="gender" id="P" value="P" <?php echo $ceP;?> required> Perempuan
                            </label>
                        </div>
                        <div class="col-xs-3">
                            <label for="fullname">No. HP / No. Telp</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo $user->phone;?>" placeholder="Masukan no. hp / no. tlp">
                        </div>
                        <div class="col-xs-3">
                            <label for="kode">Kode</label>
                            <input type="text" name="kode" class="form-control" value="<?php echo $user->kode;?>" placeholder="Masukan kode user" <?php echo $ro;?>>
                            <small class="text-danger"><em>Hanya bisa diisi oleh admin</em></small>
                        </div>
                        <div class="col-xs-3">
                            <label for="status">Status Akun</label>
                            <select name="status" class="form-control" <?php echo $ro;?> required>
                                <?php if($user->status == 'active'){$selA='selected';$selB='';}else{$selA='';$selB='selected';}?>
                                <option <?php echo $selA;?> value="active">Aktif</option>
                                <option <?php echo $selB;?> value="block">Di Blok</option>
                            </select>
                            <small class="text-danger"><em>Hanya bisa diisi oleh admin</em></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-3">
                            <label for="id_level">Level Akses</label>
                            <select name="id_level" class="form-control" <?php echo $ro;?> required>
                                <?php 
                                    foreach ($level as $dataLevel) {
                                    if($dataLevel->id_level == $user->id_level){$selL='selected';}else{$selL='';} 
                                ?>
                                <option <?php echo $selL;?> value="<?php echo $dataLevel->id_level;?>"><?php echo $dataLevel->nama_level;?></option>
                                <?php } ?>
                            </select>
                            <small class="text-danger"><em>Hanya bisa diisi oleh admin</em></small>
                        </div>
                        <div class="col-xs-3">
                            <label for="id_role">Hak Akses</label>
                            <select name="id_role" class="form-control" <?php echo $ro;?> required>
                                <?php 
                                    foreach ($role as $dataRole) {
                                    if($dataRole->id_role == $user->id_role){$selR='selected';}else{$selR='';} 
                                ?>
                                <option <?php echo $selR;?> value="<?php echo $dataRole->id_role;?>"><?php echo $dataRole->nama_role;?></option>
                                <?php } ?>
                            </select>
                            <small class="text-danger"><em>Hanya bisa diisi oleh admin</em></small>
                        </div>
                        <div class="col-xs-6">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
                            <small class="text-danger"><em>Biarkan kosong jika tidak ingin ganti password</em></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="text-danger col-xs-12">* Wajib diisi</p>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="hidden" name="id_pendaftaran" value="<?php echo $user->id_pendaftaran;?>">
                            <input type="submit" class="btn btn-primary btn-flat" value="UBAH PROFIL">
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </section>
</div>
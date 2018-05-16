<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Form User</h3>
                <div class="box-tools pull-right">
                    <div class="btn-group" role="group">
                        <?php
                        if ($this->session->userdata('urKet') === "administrator")
                        {
                            ?>
                            <a href="<?php echo site_url("cpanel_user"); ?>" class="btn btn-primary btn-flat btn-sm">List User</a>
                            <a href="<?php echo site_url('cpanel_user_role/tambah_data'); ?>" class="btn btn-primary btn-flat btn-sm">Tambah User Role</a>
                            <?php
                        }
                        else
                        {
                            ?>
                            <a href="<?php echo site_url("cpanel_profile"); ?>" class="btn btn-primary btn-flat btn-sm">Profile</a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <form class="form-horizontal" action="<?php echo site_url('auth/simpan'); ?>" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="password_old">Password Lama</label>
                        <div class="col-sm-10">
                            <input type="Password" name="password_old" id="password_old" placeholder="Password Lama" required="required" autofocus="autofocus" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="password_new">Password Baru</label>
                        <div class="col-sm-10">
                            <input type="Password" name="password_new" id="password_new" placeholder="Password Baru" required="required" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="simpan"></label>
                        <div class="col-sm-10">
                            <button type="submit" name="simpan" value="ubah_password" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

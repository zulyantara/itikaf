<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$user_id = isset($res_user) ? $res_user->user_id : "";
$user_username = isset($res_user) ? $res_user->user_username : "";
$user_ur = isset($res_user) ? $res_user->user_ur : "";
$user_active = isset($res_user) ? $res_user->user_active : "";
$btn = isset($res_user) ? "ubah" : "simpan";
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form User</h3>
                <div class="box-tools pull-right">
                    <div class="btn-group" role="group">
                        <a href="<?php echo site_url("cpanel_user"); ?>" class="btn btn-primary btn-flat btn-sm">List User</a>
                        <a href="<?php echo site_url('cpanel_user_role/tambah_data'); ?>" class="btn btn-primary btn-flat btn-sm">Tambah User Role</a>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <form class="form-horizontal" action="<?php echo site_url('cpanel_user/simpan'); ?>" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    <div class="form-group">
                        <label for="user_username" class="control-label col-sm-2">Username</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-4">
                                    <input type="text" name="user_username" id="user_username" value="<?php echo $user_username; ?>" placeholder="Username" class="form-control" autofocus="autofocus" required="required" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="user_password" class="control-label col-sm-2">Password</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-4">
                                    <input type="password" name="user_password" id="user_password" placeholder="Password" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    if ($this->session->userdata('urKet') === "administrator")
                    {
                        ?>
                        <div class="form-group">
                            <label for="user_ur" class="control-label col-sm-2">Role</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <select class="form-control" name="user_ur">
                                            <?php
                                            if ($res_ur !== FALSE)
                                            {
                                                foreach ($res_ur as $val_ur)
                                                {
                                                    $sel_ur = $val_ur->ur_id == $user_ur ? "selected=\"selected\"" : "";
                                                    ?>
                                                    <option value="<?php echo $val_ur->ur_id; ?>" <?php echo $sel_ur; ?>><?php echo ucwords($val_ur->ur_ket); ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                    <div class="form-group">
                        <label for="user_active" class="control-label col-sm-2">Status</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-4">
                                    <select class="form-control" name="user_active">
                                        <?php
                                        $arr_status = array(1=>"Aktif", 0=>"Tidak Aktif");
                                        foreach ($arr_status as $key_status => $val_status)
                                        {
                                            $sel_status = $key_status == $user_active ? "selected=\"selected\"" : "";
                                            ?>
                                            <option value="<?php echo $key_status; ?>" <?php echo $sel_status; ?>><?php echo $val_status; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-sm-2"></label>
                        <div class="col-sm-10">
                            <button type="submit" name="simpan" value="<?php echo $btn; ?>" class="btn btn-primary btn-flat">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

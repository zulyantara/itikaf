<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$ur_id = isset($res_user_role) ? $res_user_role->ur_id : "";
$ur_ket = isset($res_user_role) ? $res_user_role->ur_ket : "";
$btn = isset($res_user_role) ? "ubah" : "simpan";
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Form User Role</h3>
                <div class="box-tools pull-right">
                    <div class="btn-group" role="group">
                        <a href="<?php echo site_url("cpanel_user"); ?>" class="btn btn-primary btn-flat btn-sm">List User</a>
                        <a href="<?php echo site_url('cpanel_user_role/tambah_data'); ?>" class="btn btn-primary btn-flat btn-sm">Tambah User Role</a>
                        <a href="<?php echo site_url('cpanel_user/tambah_data'); ?>" class="btn btn-primary btn-flat btn-sm">Tambah User</a>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <form class="form-horizontal" action="<?php echo site_url('cpanel_user_role/simpan'); ?>" method="post">
                    <input type="hidden" name="ur_id" value="<?php echo $ur_id; ?>">
                    <div class="form-group">
                        <label for="ur_ket" class="control-label col-sm-2">User Role</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-4">
                                    <input type="text" name="ur_ket" id="ur_ket" value="<?php echo $ur_ket; ?>" placeholder="User Role" class="form-control" autofocus="autofocus" required="required">
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

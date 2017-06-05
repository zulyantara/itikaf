<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$ki_id = isset($res_ki) ? $res_ki->ki_id : "";
$ki_ket = isset($res_ki) ? $res_ki->ki_ket : "";
$btn = isset($res_ki) ? "ubah" : "simpan";
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Kartu Identitas</h3>
                <div class="box-tools pull-right">
                    <a href="<?php echo site_url('cpanel_kartu_identitas'); ?>" class="btn btn-primary btn-sm btn-flat">List Kartu Identitas</a>
                </div>
            </div>

            <div class="box-body">
                <form class="form-horizontal" action="<?php echo site_url('cpanel_kartu_identitas/simpan'); ?>" method="post">
                    <input type="hidden" name="ki_id" value="<?php echo $ki_id; ?>">
                    <div class="form-group">
                        <label for="ki_ket" class="control-label col-sm-2">Kartu Identitas</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-4">
                                    <input type="text" name="ki_ket" id="ki_ket" value="<?php echo $ki_ket; ?>" placeholder="Kartu Identitas" class="form-control" autofocus="autofocus" required="required">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-sm-2"></label>
                        <div class="col-sm-10">
                            <button type="submit" name="simpan" value="<?php echo $btn; ?>" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

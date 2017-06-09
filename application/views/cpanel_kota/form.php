<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$kota_id = isset($res_kota) ? $res_kota->kota_id : "";
$kota_ket = isset($res_kota) ? $res_kota->kota_ket : "";
$btn = isset($res_kota) ? "ubah" : "simpan";
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Form Kota</h3>
                <div class="box-tools pull-right">
                    <a href="<?php echo site_url('cpanel_kota'); ?>" class="btn btn-primary btn-sm btn-flat">List Kota</a>
                </div>
            </div>

            <div class="box-body">
                <form class="form-horizontal" action="<?php echo site_url('cpanel_kota/simpan'); ?>" method="post">
                    <input type="hidden" name="kota_id" value="<?php echo $kota_id; ?>">
                    <div class="form-group">
                        <label for="kota_ket" class="control-label col-sm-2">Kota</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-4">
                                    <input type="text" name="kota_ket" id="kota_ket" value="<?php echo $kota_ket; ?>" placeholder="Kota" class="form-control" autofocus="autofocus" required="required">
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

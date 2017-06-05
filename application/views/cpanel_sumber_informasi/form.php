<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$si_id = isset($res_si) ? $res_si->si_id : "";
$si_ket = isset($res_si) ? $res_si->si_ket : "";
$btn = isset($res_si) ? "ubah" : "simpan";
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Sumber Informasi</h3>
                <div class="box-tools pull-right">
                    <a href="<?php echo site_url("cpanel_sumber_informasi"); ?>" class="btn btn-primary btn-flat btn-sm">List Sumber Informasi</a>
                </div>
            </div>

            <div class="box-body">
                <form class="form-horizontal" action="<?php echo site_url('cpanel_sumber_informasi/simpan'); ?>" method="post">
                    <input type="hidden" name="si_id" value="<?php echo $si_id; ?>">
                    <div class="form-group">
                        <label for="si_ket" class="control-label col-sm-2">Sumber Informasi</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-4">
                                    <input type="text" name="si_ket" id="si_ket" value="<?php echo $si_ket; ?>" placeholder="Sumber Informasi" class="form-control" autofocus="autofocus" required="required">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-sm-2"></label>
                        <div class="col-sm-10">
                            <button type="submit" name="simpan" value="<?php echo $btn; ?>" class="btn btn-primary btn-primary btn-slat">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

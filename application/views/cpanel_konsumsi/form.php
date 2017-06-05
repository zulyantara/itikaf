<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$konsumsi_id = isset($res_konsumsi) ? $res_konsumsi->konsumsi_id : "";
$konsumsi_ket = isset($res_konsumsi) ? $res_konsumsi->konsumsi_ket : "";
$btn = isset($res_konsumsi) ? "ubah" : "simpan";
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Konsumsi</h3>
                <div class="box-tools pull-right">
                    <a href="<?php echo site_url('cpanel_konsumsi'); ?>" class="btn btn-primary btn-sm btn-flat">List Konsumsi</a>
                </div>
            </div>

            <div class="box-body">
                <form class="form-horizontal" action="<?php echo site_url('cpanel_konsumsi/simpan'); ?>" method="post">
                    <input type="hidden" name="konsumsi_id" value="<?php echo $konsumsi_id; ?>">
                    <div class="form-group">
                        <label for="konsumsi_ket" class="control-label col-sm-2">Konsumsi</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-4">
                                    <input type="text" name="konsumsi_ket" id="konsumsi_ket" value="<?php echo $konsumsi_ket; ?>" placeholder="Konsumsi" class="form-control" autofocus="autofocus" required="required">
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

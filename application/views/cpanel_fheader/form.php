<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$fhl_id = isset($res_fhl) ? $res_fhl->fhl_id : "";
$fhl_header = isset($res_fhl) ? $res_fhl->fhl_header : "";
$btn = isset($res_fhl) ? "ubah" : "simpan";
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Form Footer Header</h3>
                <div class="box-tools pull-right">
                    <div class="btn-group" role="group" aria-label="...">
                        <a href="<?php echo site_url('cpanel_fheader'); ?>" class="btn btn-primary btn-sm btn-flat">List Footer Header</a>
                        <a href="<?php echo site_url('cpanel_flink/tambah_data'); ?>" class="btn btn-primary btn-sm btn-flat">Tambah Footer Link</a>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <form class="form-horizontal" action="<?php echo site_url('cpanel_fheader/simpan'); ?>" method="post">
                    <input type="hidden" name="fhl_id" value="<?php echo $fhl_id; ?>">
                    <div class="form-group">
                        <label for="fhl_header" class="control-label col-sm-2">Header</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-5">
                                    <input type="text" name="fhl_header" id="fhl_header" value="<?php echo $fhl_header; ?>" placeholder="Header" class="form-control" autofocus="autofocus" required="required">
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

<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Form Upload Logo</h3>
                <div class="box-tools pull-right">
                    <a href="<?php echo site_url("cpanel_logo"); ?>" class="btn btn-primary btn-flat btn-sm">List Logo</a>
                </div>
            </div>

            <div class="box-body">
                <?php echo isset($error) ? $error : ""; ?>
                <?php echo form_open_multipart('cpanel_logo/do_upload');?>
                    <fieldset>
                        <legend>Upload Photo (Max Height = 130 px)</legend>
                        <input type="file" name="userFileLogo" size="20" />

                        <br /><br />

                        <input type="submit" name="simpan" value="upload" class="btn btn-primary btn-flat" />
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

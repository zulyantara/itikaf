<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Upload Slider</h3>
                <div class="box-tools pull-right">
                    <a href="<?php echo site_url("cpanel_slider"); ?>" class="btn btn-primary btn-flat btn-sm">List Slider</a>
                </div>
            </div>

            <div class="box-body">
                <?php echo isset($error) ? $error : ""; ?>
                <?php echo form_open_multipart('cpanel_slider/do_upload');?>
                    <fieldset>
                        <legend>Upload Photo (Max Size = 800 x 400)</legend>
                        <input type="file" name="userFileSlider" size="20" />
                        <br>Alt: <input type="text" name="alt">

                        <br /><br />

                        <input type="submit" name="simpan" value="upload" class="btn btn-primary btn-flat" />
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

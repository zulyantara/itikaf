<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success tara-no-radius">
            <div class="panel-heading panel-tara tara-no-radius">
                <h3 class="panel-title">Form Pendaftaran I'tikaf (Daftar Ulang)</h3>
            </div>
            <div class="panel-body">

                <form class="form-horizontal" method="post" action="<?php echo site_url('pendaftaran/proses_pendaftaran_aktif'); ?>">
                    <div class="panel panel-success">
                        <div class="panel-heading panel-heading-tara">
                            <h3 class="panel-title">Informasi I'itikaf</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="mulai_itikaf">Mulai I'itikaf pada Hari ke-</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <select class="form-control" name="mulai_itikaf" id="mulai_itikaf" required="required">
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="konsumsi">Pengaturan Konsumsi</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <select class="form-control" name="konsumsi" id="konsumsi" required="required">
                                                <option>Pilih Pengaturan Konsumsi</option>
                                                <?php
                                                if ($res_konsumsi !== FALSE)
                                                {
                                                    foreach ($res_konsumsi as $val_konsumsi)
                                                    {
                                                        ?>
                                                        <option value="<?php echo $val_konsumsi->konsumsi_id; ?>"><?php echo ucwords($val_konsumsi->konsumsi_ket); ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="sumber_informasi">Sumber Informasi</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <select class="form-control" name="sumber_informasi" id="sumber_informasi" required="required">
                                                <option>Pilih Sumber Informasi</option>
                                                <?php
                                                if ($res_si !== FALSE)
                                                {
                                                    foreach ($res_si as $val_si)
                                                    {
                                                        ?>
                                                        <option value="<?php echo $val_si->si_id; ?>"><?php echo ucwords($val_si->si_ket); ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label"></label>
                        <div class="col-sm-11">
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" name="simpan" value="simpan" class="btn btn-primary">Simpan</button>
                                </div>
                                <div class="col-sm-12">
                                    <div class="alert alert-warning tara-margin-top" role="alert">
                                        Dengan mengisi formulir ini, Anda menyatakan bahwa telah mengerti atas kepentingan seluruh informasi yang telah diberikan. <br>Dan setuju terhadap segala syarat dan ketentuan yang telah diberlakukan organisasi -MUTAN- selama menjalankan I’itikaf pada bulan Ramadhan.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

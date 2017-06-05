<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?php echo $total_peserta; ?></h3>

                <p>Total Peserta</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
        </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?php echo $total_peserta_aktif; ?></h3>

                <p>Total Peserta Aktif <?php echo date('Y'); ?></p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
        </div>

    </div>
    <!-- ./col -->

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?php echo $total_peserta_l; ?></h3>

                <p>Total Peserta Ikhwan</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
        </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?php echo $total_peserta_p; ?></h3>

                <p>Total Peserta Akhwat</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
        </div>
    </div>
    <!-- ./col -->
</div>

<div class="row">

    <div class="col-md-6">
        <!-- AREA CHART -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Jumlah Anggota Terdaftar</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body chart-responsive">
                <div class="chart" id="total-peserta" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

    <div class="col-md-6">
        <!-- AREA CHART -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Jumlah Anggota Aktif</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body chart-responsive">
                <div class="chart" id="peserta-aktiv" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<div class="row">

    <div class="col-md-6">
        <!-- AREA CHART -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Jumlah Anggota Ikhwan</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body chart-responsive">
                <div class="chart" id="peserta-aktiv-l" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

    <div class="col-md-6">
        <!-- AREA CHART -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Jumlah Anggota Akhwat</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body chart-responsive">
                <div class="chart" id="peserta-aktiv-p" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<script type="text/javascript">
/* Morris.js Charts */
var area = new Morris.Line({
    element   : 'total-peserta',
    resize    : true,
    data      : [
        <?php echo $chart_data_total; ?>
    ],
    xkey      : 'year',
    ykeys     : ['total'],
    labels    : ['Total Peserta'],
    lineColors: ['#a0d0e0'],
    hideHover : 'auto'
});

var area = new Morris.Line({
    element   : 'peserta-aktiv',
    resize    : true,
    data      : [
        <?php echo $chart_data_total_aktif; ?>
    ],
    xkey      : 'year',
    ykeys     : ['total'],
    labels    : ['Total Peserta'],
    lineColors: ['#a0d0e0'],
    hideHover : 'auto'
});

var area = new Morris.Line({
    element   : 'peserta-aktiv-p',
    resize    : true,
    data      : [
        <?php echo $chart_data_p; ?>
    ],
    xkey      : 'year',
    ykeys     : ['total'],
    labels    : ['Total Peserta'],
    lineColors: ['#a0d0e0'],
    hideHover : 'auto'
});

var area = new Morris.Line({
    element   : 'peserta-aktiv-l',
    resize    : true,
    data      : [
        <?php echo $chart_data_l; ?>
    ],
    xkey      : 'year',
    ykeys     : ['total'],
    labels    : ['Total Peserta'],
    lineColors: ['#a0d0e0'],
    hideHover : 'auto'
});
</script>

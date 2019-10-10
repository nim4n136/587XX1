<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <h3 style="margin-top:0px; padding-top:0px;"><i class="fa fa-dashboard"></i> Dashboard</h3>
            </div>

            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3> <?= $hasil_test ?></h3>

                        <p>Hasil TEST</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-edit"></i>
                    </div>
                    <a href="<?= site_url("admin/hasil") ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3> <?= $peserta ?></h3>

                        <p>Peserta</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="<?= site_url("admin/peserta") ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-orange">
                    <div class="inner">
                        <h3> <?= $kelas ?></h3>

                        <p>Kelas</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?= site_url("admin/kelas") ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </section>
</div>
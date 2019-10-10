<div class="content-wrapper">
    <section class="content">
        <?php if ($this->session->flashdata('message')) : ?>
            <div class="alert alert-success">
                <p><?= $this->session->flashdata('message') ?></p>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger">
                <p><?= $this->session->flashdata('error') ?></p>
            </div>
        <?php endif; ?>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">KELOLA CIRI CIRI GAYA BELAJAR </h3>
            </div>
            <div class="box-body">
                <a class="btn btn-primary btn-sm" href="<?= site_url('admin/cirigaya/create') ?>"><i class="fa fa-plus"></i> TAMBAH</a>
                <?php if (empty($ciri_gaya)) : ?>
                    <div class="list" style="color:#777;">
                        <h4> Data masih kosong silahkan di tambah</h4>
                    </div>
                <?php endif; ?>
                <?php foreach ($ciri_gaya as $ciri) : ?>
                    <div class="list" style="margin-top:1rem; border-bottom:1px solid #eee;font-size:16px;padding:1rem 0">
                        <h4 style="margin-top:2px"> <?= $ciri->nama ?></h4>
                        <ul style=" list-style-type: dot;">
                            <?php
                                $get_soal = $this->Soal_ciri_model->get_by_ciri($ciri->id_ciri);
                                ?>
                            <?php foreach ($get_soal as $soal) : ?>
                                <li> <b>[<?= $soal->kode ?>]</b> <?= $soal->soal ?>
                                    <br />
                                    <?php if ($soal->gambar != null) : ?>
                                        <img style="margin:1rem 0" src="<?= base_url('assets/upload/'.$soal->gambar) ?>" width="20%">
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="action">
                            <a href="<?= site_url("admin/cirigaya/edit/" . $ciri->id_ciri) ?>" class="btn btn-success btn-sm"> <i class="fa fa-edit"></i> Edit</a>
                            <a href="<?= site_url("admin/cirigaya/delete/" . $ciri->id_ciri) ?>" onclick="javasciprt: return confirm('Kamu yakin ?')" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> Hapus</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>
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
        <h4 style="margin-top:0px;padding-top:0px;margin-bottom:2rem;"><i class="fa fa-plus"></i> TAMBAH CIRI CIRI GAYA BELAJAR</h4>
        <form action="<?= $form_action ?>" method="post"  enctype="multipart/form-data">
            <div class="box box-success">
                <div class="box-body">
                    <div class="form-group">
                        <label style="font-weight:500" for="nama">NAMA/NOMOR CIRI CIRI GAYA BELAJAR </label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama atau urutan nomor">
                    </div>
                </div>
            </div>
            <?php foreach ($gaya_belajar as $gaya) : ?>
                <div class="box box-primary" style="margin-bottom:8px">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="font-weight:600"><?= strtoupper($gaya->nama) ?></h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label style="font-weight:500" for="kode_<?= $gaya->id_gaya ?>">KODE <i class="text-danger">*</i></label>
                            <input required type="text" class="form-control" name="kode[<?= $gaya->id_gaya ?>]" id="kode_<?= $gaya->id_gaya ?>" placeholder="Masukan kode">
                        </div>
                        <div class="form-group">
                            <label style="font-weight:500" for="ciri_<?= $gaya->id_gaya ?>">CIRI CIRI GAYA BELAJAR <i class="text-danger">*</i></label>
                            <textarea required name="ciriciri[<?= $gaya->id_gaya ?>]" id="ciri_<?= $gaya->id_gaya ?>" placeholder="Masukan ciri ciri" class="form-control" cols="30" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label style="font-weight:500" for="image_<?= $gaya->id_gaya ?>">Gambar</label>
                            <input type="file" id="image_<?= $gaya->id_gaya ?>" name="image[<?= $gaya->id_gaya ?>]">
                            <p class="help-block">Masukan gambar jika di perlukan.</p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="box box-success">
                <div class="box-body">
                    <button type='submit' class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <a href="<?= site_url('admin/cirigaya') ?>" class="btn btn-warning"><i class="fa  fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
        </form>
    </section>
</div>
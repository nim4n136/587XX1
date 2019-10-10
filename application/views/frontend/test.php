<div class="container">
    <div class="card mt-4">
        <form action="<?= site_url("test/save") ?>" method="post">
            <div class="card-header">
                Silahkan pilih ciri ciri gaya belajar kamu
            </div>
            <div class="card-body">
                <?php foreach ($ciri_gaya as $ciri) : ?>
                    <div class="list">
                        <h5 style="margin-top:2px"> <?= $ciri->nama ?></h5>
                        <ul style="list-style-type: none;" class="pl-3">
                            <?php
                                $get_soal = $this->Soal_ciri_model->get_by_ciri($ciri->id_ciri);
                                foreach ($get_soal as $soal) : ?>
                                <li>
                                    <div class="form-check">
                                        <input required class="form-check-input" type="radio" value="<?= $soal->id_gaya ?>" id="<?= $soal->id_ciri_soal ?>" name="<?= $ciri->id_ciri ?>">
                                        <label class="form-check-label" for="<?= $soal->id_ciri_soal ?>">
                                            <?= $soal->soal ?>

                                            <?php if ($soal->gambar != null) : ?>
                                                <img style="margin:1rem 0" src="<?= base_url('assets/upload/' . $soal->gambar) ?>" width="20%">
                                            <?php endif; ?>
                                        </label>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Selesai</button>
            </div>
        </div>
    </form>
</div>
<div class="container">

    <?php if ($this->session->userdata("is_login")) : ?>
        <div class="jumbotron mt-3 py-5 bg-white  rounded" style="border: 1px solid rgba(0,0,0,.125);">
            <h1 style="text-transform:capitalize">Hai, <?= $this->session->userdata("nama") ?></h1>
            <p class="lead text-muted">Aplikasi untuk mengetahui Gaya Belajar apa yang cocok untuk siswai/i.<br />
                 Silahkan klik tombol di bawah ini untuk memulai test.</p>
            <a class="btn btn-primary btn-lg" href="<?= site_url("test/test") ?>" role="button">Mulai Test</a>
        </div>
    <?php else : ?>
    <div class="jumbotron mt-3 py-5 bg-white  rounded" style="border: 1px solid rgba(0,0,0,.125);">
            <h1>Selamat datang ..</h1>
            <p class="lead text-muted">Aplikasi untuk mengetahui Gaya Belajar apa yang cocok untuk siswai/i.<br />
                Yuk cek apa gaya belajar kamu yang cocok silahkan.</p>
            <a class="btn btn-primary btn-lg" href="<?= site_url("home/login") ?>" role="button">Mulai Test</a>
        </div>
    <?php endif ?>

    <div class="card ">
        <div class="card-header bg-white " style="font-size:20px">
            <strong>Jenis jenis gaya belajar</strong>
        </div>
        <?php
        $no = 0;
        foreach ($gaya_belajar as $gaya) :  $no++; ?>
            <div class="card-body border-bottom">
                <h5 class="card-title"><?= $no ?>. <?= $gaya->nama ?></h5>
                <p class="card-text ml-4"><?= nl2br($gaya->keterangan) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>
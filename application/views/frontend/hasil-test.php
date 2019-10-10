<div class="container">
    <div class="card mt-2">
        <div class="card-header py-2">
            HASIL TEST
        </div>
        <div class="card-body pb-1 border-bottom">
            <h3><?= $this->session->userdata("nama") ?></h3>
            <p class="lead" style="color:#666">
                Hore, Kamu cocok dengan <strong style="color:#111"> "<?= $gaya_belajar->nama ?>"</strong>
            </p>
        </div>
        <div class="card-body pt-3 pb-1">
            <h5>Apa itu <?= $gaya_belajar->nama ?> ?</h5>
            <p style="color:#555"> <?= nl2br($gaya_belajar->keterangan) ?></p>
        </div>
        <div class="card-body pt-0">
            <h5>Saran </h5>
            <p style="color:#555"> <?= nl2br($gaya_belajar->saran) ?></p>
        </div>
        <div class="card-footer">
            <a href="<?= site_url("home/keluar") ?>" class="btn btn-danger">
                Logout
            </a>
        </div>
    </div>
</div>
<div class="container">
    <div class="card mt-2">
        <div class="card-header py-2 no-print">
            HASIL TEST
        </div>
        <div class="card-body pb-1 border-bottom printme">
            <h3 class="mb-1"><?= $this->session->userdata("nama") ?></h3>
            <p class="lead mb-3 mt-0" style="color:#666;">
                Hore, Kamu cocok dengan <strong style="color:#111;font-weight:600;">
                    <?php
                    $display = "";
                    foreach ($gaya_belajar as $nama) {
                        $display .= $nama->nama . ", ";
                    }
                    $display = rtrim($display, ", ");
                    ?>
                    <span><?= $display ?></span>
                </strong>
            </p>
            <h6 style="font-size:18px;font-weight:600;margin-top:1px">Persentasi %</h6>
            <ul style="margin-left:-5px">
                <?php foreach ($persent as $per) : ?>
                    <li><?= $per['gaya'] ?> <strong> <?= $per['persent'] ?>%</strong></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php foreach ($gaya_belajar as $gaya) : ?>
            <div class="card-body pt-3 pb-1">
                <h5>Apa itu <?= $gaya->nama ?> ?</h5>
                <p style="color:#555"> <?= nl2br($gaya->keterangan) ?></p>
            </div>
            <?php if ($gaya->metode_cocok != null) : ?>
                <div class="card-body pt-0">
                    <h5>Metode gaya belajar yang cocok untuk <?= $gaya->nama  ?></h5>
                    <p style="color:#555"> <?= nl2br($gaya->metode_cocok) ?></p>
                </div>
            <?php endif; ?>
            <?php if ($gaya->saran != null) : ?>
                <div class="card-body pt-0">
                    <h5>Saran untuk <?= $gaya->nama  ?></h5>
                    <p style="color:#555"> <?= nl2br($gaya->saran) ?></p>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        <div class="card-footer no-print">
            <a href="#" onclick="window.print()" class="btn btn-success">
                Print hasil
            </a>
        </div>
    </div>
</div>
<style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        -ms-flex-align: center;
        align-items: center;
        background-color: #f5f5f5;
    }

    .form-signin {
        width: 100%;
        max-width: 420px;
        padding: 15px;
        margin: auto;
    }

    .form-label-group {
        position: relative;
        margin-bottom: 1rem;
    }

    .form-label-group>input,
    .form-label-group>label {
        height: 3.125rem;
        padding: .75rem;
    }

    .form-label-group>label {
        position: absolute;
        top: 0;
        left: 0;
        display: block;
        width: 100%;
        margin-bottom: 0;
        /* Override default `<label>` margin */
        line-height: 1.5;
        color: #495057;
        pointer-events: none;
        cursor: text;
        /* Match the input under the label */
        border: 1px solid transparent;
        border-radius: .25rem;
        transition: all .1s ease-in-out;
    }

    .form-label-group input::-webkit-input-placeholder {
        color: transparent;
    }

    .form-label-group input:-ms-input-placeholder {
        color: transparent;
    }

    .form-label-group input::-ms-input-placeholder {
        color: transparent;
    }

    .form-label-group input::-moz-placeholder {
        color: transparent;
    }

    .form-label-group input::placeholder {
        color: transparent;
    }

    .form-label-group input:not(:placeholder-shown) {
        padding-top: 1.25rem;
        padding-bottom: .25rem;
    }

    .form-label-group input:not(:placeholder-shown)~label {
        padding-top: .25rem;
        padding-bottom: .25rem;
        font-size: 12px;
        color: #777;
    }

    /* Fallback for Edge
-------------------------------------------------- */
    @supports (-ms-ime-align: auto) {
        .form-label-group>label {
            display: none;
        }

        .form-label-group input::-ms-input-placeholder {
            color: #777;
        }
    }

    /* Fallback for IE
-------------------------------------------------- */
    @media all and (-ms-high-contrast: none),
    (-ms-high-contrast: active) {
        .form-label-group>label {
            display: none;
        }

        .form-label-group input:-ms-input-placeholder {
            color: #777;
        }
    }
</style>

<form class="form-signin mt-5" action="<?= site_url("home/proses_daftar")?>" method="POST">
    <div class="text-center mb-4">
        <h1 class="h3 mb-2 font-weight-normal">Mendaftar Akun</h1>
        <p class="text-muted">Silahkan untuk mendaftar akun terlebih dahulu untuk mengikuti test</a>
        </p>
    </div>
    <div class="form-label-group">
        <input type="text" name="nama" id="inputnama" class="form-control" required autofocus="" placeholder="Nama Lengkap">
        <label for="inputnama">Nama Lengkap</label>
        <?=form_error('nama') ?>
    </div>

    <div class="form-label-group">
        <input type="email" name="email" id="inputEmail" class="form-control" required autofocus placeholder="Alamat Email">
        <label for="inputEmail">Alamat Email</label>
        <?=form_error('email') ?>
    </div>

    <div class="form-group">
        <select name="id_kelas" id="kelas" class="form-control" required autofocus>
            <option value="" selected disabled>Pilih kelas</option>
            <?php foreach ($data_kelas  as $kelas) : ?>
            <option value="<?= $kelas->id_kelas ?>"><?= $kelas->nama ?></option>
            <?php endforeach; ?>
        </select>
        <?=form_error('id_kelas') ?>

    </div>

    <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" name="password" required placeholder="Password">
        <label for="inputPassword">Password</label>
        <?=form_error('password') ?>

    </div>
    <div class="form-label-group">
        <input type="password" id="inputPassword2" class="form-control" name="confirm_password" required placeholder="Konfirmasi Password">
        <label for="inputPassword2">Konfrimasi Password</label>
        <?=form_error('confirm_password') ?>
    </div>
    <button class="btn btn-lg btn-success btn-block" type="submit">DAFTAR</button>
</form>
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

<form class="form-signin mt-5" action="<?= site_url("home/proses_login") ?>" method="post">
    <div class="text-center mb-4">
        <h1 class="h3 mb-2 font-weight-normal">Halaman Login</h1>
        <p class="text-muted">Silahkan login sebagai peserta atau siswa/i, jika belum punya akun silahkan daftar di
            <a href="<?= site_url("daftar") ?>">sini</a>
        </p>
    </div>

    <?php if($this->session->flashdata('error_login')): ?>
        <div class="alert alert-danger">
            <p class="uppercase">
                <?= $this->session->flashdata('error_login') ?>
            </p>
        </div>
    <?php endif;?>

    <div class="form-label-group">
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Masukkan Alamat email" required autofocus>
        <label for="inputEmail">Alamat Email</label>
    </div>

    <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Masukkan Password" required>
        <label for="inputPassword">Password</label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
</form>
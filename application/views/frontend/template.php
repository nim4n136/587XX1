<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url("assets/frontend/css/bootstrap.min.css") ?>">

  <title><?= isset($title) ? $title : "" ?></title>
</head>
<style>
  body {
    background-color: #f5f5f5;

  }

  @media print {
    .no-print {
      display: none;
    }

    .printme {
      display: block;
    }
  }
</style>

<body>
  <nav class="navbar no-print navbar-expand-md navbar-light bg-white shadow-sm" style="border-top:6px solid #007bff!important">
    <div class="container">
      <a class="navbar-brand" href="<?= site_url() ?>">TEST GAYA BELAJAR</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
        </ul>
        <?php if ($this->session->userdata("is_login")) : ?>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a style=" text-transform: capitalize;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?= $this->session->userdata("nama") ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?= site_url("home/keluar") ?>">Keluar</a>
              </div>
            </li>
          </ul>
        <?php else : ?>
          <form class="form-inline my-2 my-lg-0">
            <a href="<?= site_url('home/daftar') ?>" class="btn btn-outline-success m-1 my-sm-0">Daftar</a>
            <a href="<?= site_url('home/login') ?>" class="btn btn-outline-primary m-1 my-sm-0">Login</a>
          </form>
        <?php endif; ?>
      </div>
    </div>
  </nav>
  <div class="mb-4">
    <?= $contents ?>
  </div>

  <footer class="footer mt-auto pb-2 pt-4 no-print">
    <div class="container">
      <p class="text-muted text-center">Copyright &copy; 2019</p>
    </div>
  </footer>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="<?= base_url('assets/frontend/js/jquery-3.3.1.slim.min.js') ?>"></script>
  <script src="<?= base_url('assets/frontend/js/popper.min.js') ?>"></script>
  <script src="<?= base_url('assets/frontend/js/bootstrap.min.js') ?>"></script>
</body>

</html>
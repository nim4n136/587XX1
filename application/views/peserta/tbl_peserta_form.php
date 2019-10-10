<div class="content-wrapper">

	<section class="content">
		<div class="box box-primary ">
			<div class="box-header ">
				<h3 class="box-title">INPUT DATA PESERTA</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">

				<table class='table table-bordered'>

					<tr>
						<td width='200'>Nama Lengkap <?php echo form_error('nama') ?></td>
						<td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Email <?php echo form_error('email') ?></td>
						<td><input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Kelas <?php echo form_error('id_kelas') ?></td>
						<td>
							<select name="id_kelas" class="form-control" placeholder="Kelas">
								<option value="" selected="" disabled> -- PILIH KELAS --</option>
								<?php foreach ($kelas as $data_kelas) : ?>
								<option value="<?= $data_kelas->id_kelas?>" <?= $id_kelas == $data_kelas->id_kelas ? "selected" : "" ?> >
									<?= $data_kelas->nama ?>
								</option>
								<?php endforeach; ?>
							</select>
						</td>
					</tr>
					<tr>
						<td width='200'>Password <?php echo form_error('password') ?></td>
						<td><input type="password" class="form-control" name="password" id="password" placeholder="Password" /></td>
					</tr>
					<tr>
						<td width='200'>Ulangi Password <?php echo form_error('ulangi_password') ?></td>
						<td><input type="password" class="form-control" name="ulangi_password" id="password" placeholder="Ulangi Password" /></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="hidden" name="id_peserta" value="<?php echo $id_peserta; ?>" />
							<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
							<a href="<?php echo site_url('admin/peserta') ?>" class="btn btn-warning"><i class="fa fa-sign-out"></i> Kembali</a></td>
					</tr>
				</table>
			</form>
		</div>
</div>
</div>
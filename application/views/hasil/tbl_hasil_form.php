<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA TBL_HASIL</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Id Peserta <?php echo form_error('id_peserta') ?></td><td><input type="text" class="form-control" name="id_peserta" id="id_peserta" placeholder="Id Peserta" value="<?php echo $id_peserta; ?>" /></td></tr>
	    <tr><td width='200'>Id Gaya <?php echo form_error('id_gaya') ?></td><td><input type="text" class="form-control" name="id_gaya" id="id_gaya" placeholder="Id Gaya" value="<?php echo $id_gaya; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_hasil" value="<?php echo $id_hasil; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('hasil') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>
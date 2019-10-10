<!doctype html>
<html>
    <head>
        <title>Hasil gaya belajar</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Hasil test</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Lengkap</th>
		<th>Alamat Email</th>
		<th>Kelas</th>
		<th>Gaya Belajar</th>
		
            </tr><?php
            foreach ($hasil_data as $hasil)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $hasil->nama ?></td>
		      <td><?php echo $hasil->email ?></td>	
		      <td><?php echo $hasil->kelas ?></td>	
		      <td><?php echo $hasil->gaya_belajar ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
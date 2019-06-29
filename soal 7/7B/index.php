<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ARKADEMY BOOTCAMP BATCH 11</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	
	<style>
		.content {
			margin-top: 80px;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand visible-xs-block visible-sm-block" href="index.php">Data Karyawan</a>
				<a class="navbar-brand hidden-xs hidden-sm" href="index.php">Data Karyawan</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php">Master Data</a></li>
					<li><a href="add.php">Tambah Data</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Halaman Utama</h2>
			<hr />
	
	<div class="table-responsive">
	<table class="table table-striped table-hover">
	<!-- <table cellpadding="5" cellspacing="0" border="1">
		<tr bgcolor="#CCCCCC"> -->
			<th>Name</th>
			<th>Hobby</th>
			<th>Category</th>
			<th>Tools</th>
		</tr>
		
		<?php
		//iclude file koneksi ke database
		include('koneksi.php');
		
		//query ke database dg SELECT table siswa diurutkan berdasarkan NIS paling besar
		$query = "SELECT nama.name AS Name , hobi.name AS Hobby, kategori.name AS Category from nama, hobi, kategori
		where nama.id_hobby=hobi.id and hobi.id_category= kategori.id";
     	 $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      		if(!$result){
       		 die ("Query Error: ".mysqli_errno($koneksi).
          		 " - ".mysqli_error($koneksi));
		
			//jika data kosong, maka akan menampilkan row kosong
			echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
			
        } else{	//else ini artinya jika data hasil query ada (data diu database tidak kosong)
			
			//jika data tidak kosong, maka akan melakukan perulangan while
			// $no = 1;	//membuat variabel $no untuk membuat nomor urut
			while($data = mysqli_fetch_assoc($result))
			{	//perulangan while dg membuat variabel $data yang akan mengambil data di database
				
				//menampilkan row dengan data di database
				echo '<tr>';
					echo '<td>'.$data['Name'].'</td>';	//menampilkan nomor urut
					echo '<td>'.$data['Hobby'].'</td>';	//menampilkan data nis dari database
					echo '<td>'.$data['Category'].'</td>';	//menampilkan data nama lengkap dari database

					echo '
							</td>
							<td>
								
								<a href="edit.php?name='.$data['Name'].'" title="Edit Data" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<a href="index.php?aksi=delete&name='.$data['Name'].'" title="Hapus Data" onclick="return confirm(\'Anda yakin akan menghapus data '.$data['Name'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
						</tr>
						';
						
					}
				}
				?>
			</table>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
include("koneksi.php");
?>
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
			<h2>Halaman Utama &raquo; Edit Data</h2>
			<hr />
			
			<?php
			$name = $_GET['name'];
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

				
				$update = mysqli_query($koneksi, "UPDATE nama.name AS Name , hobi.name AS Hobby, kategori.name AS Category from nama, hobi, kategori
				where nama.id_hobby=hobi.id and hobi.id_category= kategori.id SET ('$name','$hobi','$category')"  or die(mysqli_error()));
				if($update){
					header("Location: edit.php?Name=".$data."&pesan=sukses");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
			}
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">NAMA</label>
					<div class="col-sm-2">
						<input type="text" name="Name" value="<?php echo $data['Name']; ?>" class="form-control" placeholder="Name" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">HOBBY</label>
					<div class="col-sm-4">
						<input type="text" name="Hobby" value="<?php echo $data ['Hobby']; ?>" class="form-control" placeholder="Hobby" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">CATEGORY</label>
					<div class="col-sm-4">
						<input type="text" name="Category" value="<?php echo $data ['Category']; ?>" class="form-control" placeholder="Category" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan">
						<a href="index.php" class="btn btn-sm btn-danger">Batal</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
	$('.date').datepicker({
		format: 'yyyy-mm-dd',
	})

	</script>
</body>
</html>

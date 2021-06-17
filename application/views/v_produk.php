<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>
		Fast Print Data
	</title>
</head>

<body>
	<style>

		input[type="checkbox"],
		input[type="radio"] {
			position: absolute;
			right: 9000px;
		}

		/*Check box*/
		input[type="checkbox"]+.label-text:before {
			content: "\f096";
			font-family: "FontAwesome";
			speak: none;
			font-style: normal;
			font-weight: normal;
			font-variant: normal;
			text-transform: none;
			line-height: 1;
			-webkit-font-smoothing: antialiased;
			width: 1em;
			display: inline-block;
			margin-right: 5px;
		}

		input[type="checkbox"]:checked+.label-text:before {
			content: "\f14a";
			color: #2980b9;
			animation: effect 250ms ease-in;
		}

		input[type="checkbox"]:disabled+.label-text {
			color: #aaa;
		}

		input[type="checkbox"]:disabled+.label-text:before {
			content: "\f0c8";
			color: #ccc;
		}

		/*Radio box*/

		input[type="radio"]+.label-text:before {
			content: "\f10c";
			font-family: "FontAwesome";
			speak: none;
			font-style: normal;
			font-weight: normal;
			font-variant: normal;
			text-transform: none;
			line-height: 1;
			-webkit-font-smoothing: antialiased;
			width: 1em;
			display: inline-block;
			margin-right: 5px;
		}

		input[type="radio"]:checked+.label-text:before {
			content: "\f192";
			color: #8e44ad;
			animation: effect 250ms ease-in;
		}

		input[type="radio"]:disabled+.label-text {
			color: #aaa;
		}

		input[type="radio"]:disabled+.label-text:before {
			content: "\f111";
			color: #ccc;
		}

		/*Radio Toggle*/

		.toggle input[type="radio"]+.label-text:before {
			content: "\f204";
			font-family: "FontAwesome";
			speak: none;
			font-style: normal;
			font-weight: normal;
			font-variant: normal;
			text-transform: none;
			line-height: 1;
			-webkit-font-smoothing: antialiased;
			width: 1em;
			display: inline-block;
			margin-right: 10px;
		}

		.toggle input[type="radio"]:checked+.label-text:before {
			content: "\f205";
			color: #16a085;
			animation: effect 250ms ease-in;
		}

		.toggle input[type="radio"]:disabled+.label-text {
			color: #aaa;
		}

		.toggle input[type="radio"]:disabled+.label-text:before {
			content: "\f204";
			color: #ccc;
		}


		@keyframes effect {
			0% {
				transform: scale(0);
			}

			25% {
				transform: scale(1.3);
			}

			75% {
				transform: scale(1.4);
			}

			100% {
				transform: scale(1);
			}
		}
		#table-wrapper {
		  position:relative;
		}
		#table-scroll {
		  height:500px;
		  overflow:auto;  
		}
		#table-wrapper table {
		  width:100%;

		}
		#table-wrapper table thead th .text {
		  position:absolute;   
		  top:-20px;
		  z-index:2;
		  height:20px;
		  width:35%;
		  border:1px solid red;
		}
	</style>
	<div class="container-fluid">
		<h2>
			<center><strong>Halaman Data Produk</strong></center>
		</h2><br>
		<a data-toggle="modal" data-target="#tambah" class="btn btn-primary">+ Tambah Data Produk</a><br><br>

		<div class="box">
			<div class="box-header">
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<p>
				<?php if($this->session->flashdata('pesan_sukses')){?>
					<center>
						<font color="green" size="4px"><b><?= $this->session->flashdata('pesan_sukses'); ?></b></font>
					</center>
				<?php }else{ ?>
					<center>
						<font color="red" size="4px"><b><?= $this->session->flashdata('pesan_gagal'); ?></b></font>
					</center>
				<?php }?>
				</p>
				<div id="table-wrapper">
  				<div id="table-scroll">
				<table id="tableAdmin" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>ID Produk</th>
							<th>Nama Produk</th>
							<th>Kategori</th>
							<th>Harga</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody >

						<?php $no=1; foreach ($data_produk_bisa_dijual as $data) {  ?>
						<tr>
							<td>
								<?=$no++ ?>
							</td>
							<td>
								<?=$data->id_produk ?>
							</td>
							<td>
								<?=$data->nama_produk ?>
							</td>
							<td>
								<?=$data->kategori ?>
							</td>
							<td>
								<?=$data->harga?>
							</td>
							<td>
								<?=$data->status?>
							</td>
							<td>
								<div style="display: flex;">
									<a class="btn btn-primary" data-toggle="modal" data-target="#edit" href="#"
									onclick="edit('<?=$data->id_produk?>')"><i class="fa  fa-pencil"></i></a>
								<a class="btn btn-danger" data-toggle="modal" data-target="#hapus" href="#"
									onclick="edit('<?=$data->id_produk?>')"><i class="fa  fa-trash"></i></a>
								</div>
								

						</tr>
						<?php } ?>
					</tbody>
					<tfoot></tfoot>
				</table>
				</div>
				</div>
			</div>
		</div>

		<!-- Modal Tambah Produk-->
		<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4><strong>Tambah Data Admin</strong></h4>
					</div>
					<div class="modal-body">
						<br />

						<form action="<?=base_url('produk/add_produk')?>" method="post"
							class="form-horizontal form-label-left">

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Produk :
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" name="nama_produk" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori :
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" name="kategori" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Harga :
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="number" name="harga" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<div class="form-group">
								<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Status: </label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" name="status" required="required">
										<option value="" selected disabled>Pilih Status</option>
                        				<option value="bisa dijual">bisa dijual</option>
                        				<option value="tidak bisa dijual"> tidak bisa dijual</option>
									</select>
								</div>
							</div>

							

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<input type="submit" name="tambah" value="Simpan" class="btn btn-primary">
					</div>
				</div>
				</form>
			</div>
		</div>

		<!-- Modal Edit Data Produk-->
		<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4><strong>Edit Data Produk</strong></h4>
					</div>
					<div class="modal-body">
						<br />

						<form action="<?=base_url('produk/edit_produk')?>" method="post" class="form-horizontal form-label-left">

							<input type="hidden" id="id_produk" name="id_produk" required="required"
								class="form-control col-md-7 col-xs-12">

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Produk :
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="nama_produk" name="nama_produk" required="required"
										class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<div class="form-group">
								<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Kategori : </label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="kategori" name="kategori" required="required"
										class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="form-group">
								<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Harga : </label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="number" id="harga" name="harga" required="required"
										class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<div class="form-group">
								<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Status : </label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" id="status" name="status" required="required">
										<option value="" selected disabled>Pilih Status</option>
                        				<option value="bisa dijual">bisa dijual</option>
                        				<option value="tidak bisa dijual"> tidak bisa dijual</option>
									</select>
								</div>
							</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<input type="submit" name="tambah" value="Simpan" class="btn btn-primary">
					</div>
				</div>
				</form>
			</div>
		</div>

		<!--  Konfirmasi Hapus Produk -->
		<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h3><strong>Hapus Data Produk</strong></h3>
					</div>
					<div class="modal-body">
					<div class="row">
		                <p id="med" style="text-align:center;font-size: 20px;">PERINGATAN!</p>
		                <p style="text-align:center;font-size: 17px;">Apakah Anda Yakin Ingin Menghapus Produk  <input style='border-color: transparent;font-weight: bold;width: -moz-fit-content;width: fit-content;padding: 5px;margin-bottom: 1em;' type="text" id='nama_produk1'readonly> ?</p>
		            </div>
					</div>
					<form action="<?=base_url('produk/delete_produk')?>" method="post" class="form-horizontal form-label-left">

						<input type="hidden" id="id_produk1" name="id_produk" required="required"
							class="form-control col-md-7 col-xs-12">

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
							<input type="submit" value="Konfirmasi" class="btn btn-primary">
						</div>
				</div>
				</form>
			</div>
		</div>




	</div>
	<script type="text/javascript">
		function edit(a) {
			$.ajax({
				type: "post",
				url: "<?=base_url()?>produk/detail_produk/" + a,
				dataType: "json",
				success: function (data) {
					$("#id_produk1").val(data.id_produk);
					$("#id_produk").val(data.id_produk);
					$("#nama_produk").val(data.nama_produk);
					$("#nama_produk1").val(data.nama_produk);
					$("#kategori").val(data.kategori);
					$("#harga").val(data.harga);
					$("#status").val(data.status);
				}
			});
		}

	</script>
</body>

</html>

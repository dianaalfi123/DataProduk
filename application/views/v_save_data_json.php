<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>
		<?=$judul?>
	</title>
</head>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/easy-autocomplete/1.3.5/easy-autocomplete.css" media="all" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/easy-autocomplete/1.3.5/easy-autocomplete.themes.css" media="all" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.css" media="all" rel="stylesheet" type="text/css" />
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
	</style>
	<div class="container-fluid">
		<h2>
			<center><strong>Halaman Simpan Data Produk JSON</strong></center>
		</h2><br>
		<a  class="btn btn-primary" data-toggle="modal" data-target="#getdata" href="#" onclick="getdata()">Menyimpan Produk data JSON</a>
		<br><br>
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
				<table id="tableAdmin" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>ID Produk</th>
							<th>Nama Produk</th>
							<th>Kategori</th>
							<th>Harga</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>

						<?php $no=1; foreach ($data_produk as $data) {  ?>
						<tr>
							<td>
								<?=$no++ ?>
							</td>
							<td>
								<?=$data->id_produk?>
							</td>
							<td>
								<?=$data->nama_produk ?>
							</td>
							<td>
								<?=$data->kategori?>
							</td>
							<td>
								<?=$data->harga?>
							</td>
							<td>
								<?=$data->status?>
							</td>
							

						</tr>
						<?php } ?>
					</tbody>
					<tfoot>
						</tfoot>
				</table>
			</div>
		</div>

		
  		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script>
		    $(function() {
		        $.ajax({
		            url: 'https://gist.githubusercontent.com/FastPrintProg3/dec91c65f573d09a6e7836c65ae54e73/raw',
		            type: 'GET',
		            dataType: 'html',
		            success: function(data, status, xhr)
		            {
		            	$("#DETAIL").val(data);
		                $("#DETAILS").html(data);
		            },
		            error: function(xhr, status, error)
		            {
		                $("#DETAILS").html("Error: " + status + " " + error);
		            }
		        });
		    });
		</script>
		<input type="hidden" name="DETAIL" id="DETAIL" />
	
		<!-- <div id="DETAILS"></div> -->
	</div>
	<script type="text/javascript">
		function getdata(){
			var a = $("#DETAIL").val();
	        // console.log(a);
	        $("#save").click();
	        location.href = "<?php echo base_url("home/save_data_json"); ?>?DETAIL="+ $("#DETAIL").val();
		}
	
	</script>
</body>

</html>

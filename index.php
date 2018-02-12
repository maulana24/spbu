<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aplikasi SPBU</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    	.navbar-inverse{
    		border-radius: 0px;
    	}
    </style>
</head>

<body>
	<div class="container-fluid" style="padding: 0px">

		<img src="img/header.jpg">

    </div>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Aplikasi SPBU</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Selamat Datang Di Aplikasi SPBU</h1>
                <p class="lead"><i>"Moto Kami Melayani Dengan Sepenuh Hati"</i></p>
                <ul class="list-unstyled">
                	<li>Aplikasi Menggunakan :</li>
                    <li>Bootstrap v3.3.7</li>
                    <li>jQuery v1.11.1</li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="row">
			<div class="col-md-3 offset-md-3"></div>
            <div class="col-md-6 offset-md-3">
            	<?php
            		if (isset($_POST['btn'])) {
            			$bbm = $_POST['bbm'];
            			$metode = $_POST['metode'];
            			$inp = $_POST['inputan'];

            			switch ($bbm) {
            				case 'SOLAR':
            					$harga = 9000;
            					break;
            				case 'PREMIUM':
            					$harga = 6100;
            					break;
            				case 'PERTALITE':
            					$harga = 7600;
            					break;
            				case 'PERTAMAX':
            					$harga = 12000;
            					break;
            				default:
            					$harga = 0;
            					break;
            			}

            			if ($metode == "LITER") {
            				$prc = $inp * $harga;
            				$ket = "Rupiah";
            				$k = "Rp. ";
            			}else{
            				$prc = number_format($inp / $harga, 2);
            				$ket = "Liter";
            				$k = "";
            			}
            			echo "<div class='alert alert-success'>";
            			echo "<center><h1>Terimakasih Telah Melakukan Pengisian BBM</h1>";
            			echo "<h3>Total : </h3>";
            			echo "<h1><i><b>$k $prc $ket</b></i></h1></center>";
            			echo "</div>";
            			echo "<a href='index.php' class='btn btn-danger btn-block'><b>Kembali</b></a>";
            		}else{
            	?>
		                <form method="post" class="form">
		                	<div class="form-group">
		                		<select id="bbm" name="bbm" class="form-control" required="">
		                			<option value="">- PILIH BAHAN BAKAR-</option>
		                			<option value="SOLAR">SOLAR</option>
		                			<option value="PREMIUM">PREMIUM</option>
		                			<option value="PERTALITE">PERTALITE</option>
		                			<option value="PERTAMAX">PERTAMAX</option>
		                		</select>
		                	</div>
		                	<div class="form-group">
		                		<input type="text" id="harga" class="form-control" name="harga" value="0" readonly="">
		                	</div>
		                	<div class="form-group">
		                		<select class="form-control" id="metode" name="metode" required="">
		                			<option value="">- METODE PENGISIAN -</option>
		                			<option value="LITER">LITER</option>
		                			<option value="NOMINAL">NOMINAL</option>
		                		</select>
		                	</div>
		                	<div class="form-group">
		                		<input type="text" class="form-control" name="inputan" id="inputan" placeholder="Masukkan Liter" disabled="" required>
		                	</div>
		                	<button class="btn btn-block btn-primary" name="btn"><b>PROSES</b></button>
		                </form>
                <?php } ?>
            </div>
        </div>


    </div>

    <script src="js/jquery.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">
    	$(document).ready(function() {
    		$("#bbm").on('change', function() {
    			var harga = $("#bbm").val();
    			if (harga == "PERTALITE") {
    				$("#harga").val("7600");
    			}else if(harga == "PREMIUM"){
    				$("#harga").val("6100");
    			}else if(harga == "SOLAR"){
    				$("#harga").val("9000");
    			}else if(harga == "PERTAMAX"){
    				$("#harga").val("12000");
    			}else{
    				$("#harga").val("0");
    			}
    		});

    		$("#metode").on('change', function() {
    			var metode = $("#metode").val();
    			if (metode == "LITER") {
    				$("#inputan").attr("placeholder", "Masukkan Jumlah Liter");
    				$("#inputan").removeAttr("disabled");
    			}else if(metode == "NOMINAL"){
    				$("#inputan").attr("placeholder", "Masukkan Jumlah Nominal");
    				$("#inputan").removeAttr("disabled");
    			}else{
    				$("#inputan").attr("placeholder", "Pilih Metode");
    				$("#inputan").attr("disabled", "");
    			}
    		});
	    });
    </script>
</body>

</html>

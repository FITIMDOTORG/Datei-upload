<!DOCTYPE html>
<html>
<head>
	<title>File Upload</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- Custom CSS -->
	<style>
		body {
			background-color: #f8f9fa;
		}
		.container {
			margin-top: 50px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="card">
					<div class="card-header">
						<h3 class="text-center">File Upload</h3>
					</div>
					<div class="card-body">
						<form action="" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="datei">Datei auswählen:</label>
								<input type="file" class="form-control-file" name="datei" id="datei">
							</div>
							<button type="submit" name="submit" class="btn btn-primary">Hochladen</button>
						</form>
						<?php
						// Überprüfen, ob das Formular abgesendet wurde
						if(isset($_POST['submit'])){
							$upload_folder = 'Uploads/'; // Ordner, in dem die Datei gespeichert werden soll

							// Überprüfen, ob ein Fehler aufgetreten ist
							if($_FILES['datei']['error'] > 0){
								echo '<div class="alert alert-danger mt-3" role="alert">Fehler beim Hochladen der Datei.</div>';
							} else {
								// Datei in den Upload-Ordner verschieben
								if(move_uploaded_file($_FILES['datei']['tmp_name'], $upload_folder.$_FILES['datei']['name'])){
									echo '<div class="alert alert-success mt-3" role="alert">Die Datei wurde erfolgreich hochgeladen.</div>';
								} else {
									echo '<div class="alert alert-danger mt-3" role="alert">Fehler beim Hochladen der Datei.</div>';
								}
							}
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Bootstrap JavaScript -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpH

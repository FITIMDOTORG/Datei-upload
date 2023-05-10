<!DOCTYPE html>
<html>
<head>
	<title>Datei-Liste</title>
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
						<h3 class="text-center">Datei-Liste</h3>
					</div>
					<div class="card-body">
						<?php
						$password = 'fitim'; // Hier das gewünschte Passwort eintragen
						$enteredPassword = isset($_POST['password']) ? $_POST['password'] : '';

						// Überprüfen, ob das eingegebene Passwort korrekt ist
						if ($enteredPassword !== $password) {
							echo '
							<form method="post">
								<div class="form-group">
									<label for="password">Passwort:</label>
									<input type="password" class="form-control" name="password" id="password" required>
								</div>
								<button type="submit" class="btn btn-primary">Bestätigen</button>
							</form>
							';
						} else {
							$upload_folder = 'Uploads/'; // Ordner, in dem die Dateien gespeichert werden

							// Dateien im Upload-Ordner auflisten
							$files = scandir($upload_folder);

							// Nur die tatsächlichen Dateien anzeigen (keine Verzeichnisse)
							$files = array_filter($files, function($file) use ($upload_folder) {
								return is_file($upload_folder . $file);
							});

							// Keine Dateien im Ordner
							if (count($files) == 0) {
								echo '<div class="alert alert-info mt-3" role="alert">Es sind keine Dateien vorhanden.</div>';
							} else {
								// Liste der Dateien anzeigen
								echo '<ul class="list-group mt-3">';
								foreach ($files as $file) {
									echo '<li class="list-group-item d-flex justify-content-between align-items-center">' . 
										$file . 
										'<a href="' . $upload_folder . $file . '" download><span class="badge badge-primary badge-pill">Download</span></a>' .
										'</li>';
								}
								echo '</ul>';
							}
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Bootstrap JavaScript -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8

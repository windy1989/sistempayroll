<html>
	<title>
		<?=$judul?>
	</title>
	<body>
		<?php 
			$path = $isi;
			$type = pathinfo($path, PATHINFO_EXTENSION);
			$data = file_get_contents($path);
			$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
		?>
		<img src="<?=$base64?>">
	</body>
</html>
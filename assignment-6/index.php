<?php
	require "includes/header.php";
?>
<form action="api/insert_image.php" method="POST" id="imageUpload" enctype="multipart/form-data">
	<div class="form-group">
		<input type="file" name="image" id="imageFile">
	</div>
	<button type="submit">UPLOAD IMAGE</button>
</form>
<?php 
require "includes/footer.php";
?>
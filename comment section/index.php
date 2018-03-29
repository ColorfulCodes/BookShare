<?php
  date_default_timezone_set('Europe/Copenhagen');

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>First comment section</title>
  <link rel="stylesheet" type="text/text/css" href="style.css">
</head>

<body>
<video width="320" height="240" controls>
  <source src="movie.mp4" type="video/mp4">
  <source src="movie.ogg" type="video/ogg">
    Your browser does not support this video tag.
</video>

<?php
echo "
<form>
  <input type='hidden' name= 'uid' value='Anonymous'>
  <input type='hidden' name= 'date' value='".date('Y-m-d H:i:s')."'>
  <textarea name='mesage'>
  </textarea><br>
  <button type='submit' name='submit'>Comment Section</button>

</form>";
?>
</body>
</html>

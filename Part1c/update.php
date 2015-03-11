<!DOCTYPE html>
<html>

<head>
  <title>Upload a File</title>
</head>

<body>
  
  <form action="handle_upload.php" method="post">
    <label for="filename">Upload file:</label>
    <input type="file" name="filename"/><input type="sumbit"/>
  </form>
  
  <?php
  $required = 'filename';
  
  $error = false;
  
  if(empty($_POST[$required])) {
    $error = true;
  }
  
  if($error) {
    echo "You must choose a file to upload.";
  }
  ?>
  
</body>

</html>
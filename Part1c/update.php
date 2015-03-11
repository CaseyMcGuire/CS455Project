<!DOCTYPE html>
<html>

<head>
  <title>Upload a File</title>
</head>

<body>
  
  <form action="handle_upload.php" method="post">
    <label for="uploaded">Upload file:</label>
    <input type="file" name="uploaded"/>
  </form>
  
  <?php
  if (!isset($_GET["uploaded"])) {
    echo "Please select a file to upload.";
  }
  ?>
  
</body>

</html>
<?php
var_dump($_FILES);

$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mimetype = finfo_file($finfo, $_FILES["file-upload"]["tmp_name"]);
finfo_close($finfo);

if ($mimetype == "image/jpeg") {
  echo "mimetype: <b>OK</b>";
  if ($_FILES["file-input"]["error"] == 0) {
      echo " -- no error --";
      move_uploaded_file($_FILES["file-upload"]["tmp_name"], "img/photo.jpg");
  }
  else {
    echo "-- <b>there was an error.</b> -- ";
    $err = $_FILES["file-input"]["error"];
    switch ($err) {
      case UPLOAD_ERR_INI_SIZE:
        echo "file too big! (php.ini)";
        break;
      case UPLOAD_ERR_FORM_SIZE:
        echo "file too big! (html form)";
        break;
      case UPLOAD_ERR_PARTIAL:
        echo "file partially uploaded.";
        break;
      case UPLOAD_ERR_NO_FILE:
        echo "no file was uploaded";
        break;
      case UPLOAD_ERR_NO_TMP_DIR:
        echo "missing a temporary folder";
        break;
      case UPLOAD_ERR_CANT_WRITE:
        echo "failed to write file to disk";
        break;
      case UPLOAD_ERR_EXTENSION:
        echo "file upload stopped by extension";
        break;
      default:
        echo "unknown error";
        break;
    }
  }
}
else
  echo "mimtype: <b>KO</b>";
?>

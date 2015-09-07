<?php
  //If parameters are valid, show the directory, else show error page.
  include 'models/functions.php';
  if ( validate_access_dir( $_GET ) ) {
    include 'views/directory_view.php';
  }
  else {
    include 'views/error.php';
  }
?>

<?php
  include 'models/functions.php';
  if ( validate_download_dir( $_GET ) ) {
    dir_download( $_GET[ "year" ], $_GET[ "start" ], $_GET[ "end" ], $_GET[ "school" ] );
    echo 'SUCCES';
  }
  else {
    header( "Location: select_dir_download.php" );
  }
?>

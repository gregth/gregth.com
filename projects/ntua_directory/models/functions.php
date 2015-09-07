<?php
  //Prepare directory take as argument the school_id and returns an array of the entries.
  function prepare_directory( $school ) {
    $file = file_get_contents( __DIR__ . "/../data/$school.json" );
    return json_decode( $file, true );
  }

  //Gets the directory from NTUA.GR
  function dir_download( $year, $start, $end, $school ) {
    $list = prepare_directory( $school );
    $base = "http://www.ntua.gr/directory.html?group=ALL&dept=ALL&q=";
    for ( $i = $start; $i <= $end; $i++ ) {
      $id = $school . str_pad(  ( $year * 1000 + $i ), 5, "0", STR_PAD_LEFT );
      $url = $base . $id;
      $page = file_get_contents( $url );
      preg_match_all( '/<b>(.*?)<\/b>/si', $page, $matches );
      $counter = count( $matches[ 0 ] );
      if ( $counter == 3 ) {
        //Found name, student exists.
        $name = iconv( "ISO-8859-7", "UTF-8", $matches[ 1 ][ 2 ] );
        $list[ $year ][ $id ] = $name;
      }
      //Sleep, to prevent DDOS on NTUA Server
      sleep( 1 );
    }
    file_put_contents( __DIR__ . "/../data/$school.json", json_encode( $list ) );
  }

  //Return true id the school code exists.
  function school_exists( $school ) {
    return ( $school == "mc"
      || $school == "rs"
      || $school == "el"
      || $school == "ar"
      || $school == "ge"
    );
  }

  function validate_access_dir( $variable ) {
    return ( isset( $variable[ "school" ] )
      && school_exists( $variable[ "school" ] ) );
  }

  function validate_download_dir( $variable ) {
    return ( isset( $variable[ "school" ] )
      && school_exists( $variable[ "school" ] )
      && isset( $variable[ "year" ] )
      && isset( $variable[ "start" ] )
      && isset( $variable[ "end" ] )
      && is_numeric( $variable[ "year" ] )
      && is_numeric( $variable[ "start" ] )
      && is_numeric( $variable[ "end" ] )
      && $variable[ "start" ] < $variable[ "end" ]
    );
  }
?>

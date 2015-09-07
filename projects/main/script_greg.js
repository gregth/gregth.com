$(document).ready(function() {
  $( "#start" ).click( function() {
    $( "#start" ).attr( 'disabled','disabled' );
    if ( !validate_form() ) {
      return false;
    }
    get_directory(); 
 });
});

function validate_form() {
  var school = $( "select[ name='school' ]" ).val();
  var start = $( "select[ name='start_year' ]" ).val();
  var end = $( "select[ name='end_year' ]" ).val();
  var progress = $( "#progress" );
  if ( start > end ) {
    progress.text( "Start year should be less than end year!" );
    return false;
  } 
  return true;
}

function get_directory( ) {
  var school = $( "select[ name='school' ]" ).val();
  var start_year = $( "select[ name='start_year' ]" ).val();
  var end_year = $( "select[ name='end_year' ]" ).val();
  //TODO somehow, this shouldn't be absolute.
  var base = "http://gregth.com/projects/ntua_directory/";
  var amount = 10;
  var urls = [];
  var progress = $( "#progress" );
  for ( var year = start_year; year <= end_year; year++ ) {
    //Parse each year into batches. Each batch has a certain amount of entries.
    for ( var start_entry = 1; start_entry <= 50; start_entry += amount ) {
      end_entry = start_entry + amount - 1;
      var url = base + "download_directory.php?" + "school=" + school + "&year=" + year + "&start=" +  start_entry + "&end=" + end_entry;
      urls.push( url );
    }
  }
  var counter = 0;
  var total = urls.length;
  urls.forEach( function( url ) {
    $.get( url, function( ) {
      counter++;
      console.log( url );
      var percentage = Math.round( counter / total * 100 );
      progress.text( percentage + " %" );
      if ( percentage == 100 ) {
        progress.text( "Ready!" );
        $( "#start" ).removeAttr( 'disabled' );
      }
    });
  });
}

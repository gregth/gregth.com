<?php
  include 'header.php';
  $list = prepare_directory( $_GET[ "school" ] );
?>

  <h1>Results for school with id: <?php echo $school ?></h1>

<?php
  foreach ( $list as $year => $sublist ) {
?>
    <h2>Year: <?php echo 2000 + $year ?></h2>
    <table>
      <tbody>

<?php
    $counter = 0;
    foreach( $sublist as $id => $name ) {
      $counter++;
?>

      <tr><td><?php echo htmlspecialchars( $id ) ?></td>
          <td><?php echo htmlspecialchars( $name ) ?></td>
      </tr>

<?php
    }
?>

      </tbody>
    </table>
    <h3>Entries found: <?php echo $counter ?></h3>

<?php
  }
  include 'footer.php';
?>

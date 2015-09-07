<?php
  include 'header.php';
?>
      <h1>Select school, start and end year to start parsing it's directory:<h1>
      <form method="GET" action="download_directory.php">
        <label for="school">School:<label>
        <select name="school">
          <option value="el">Ηλεκτρολόγοι</option>
          <option value="mc">Μηχανολόγοι </option>
          <option value="rs">Τοπογράφοι</option>
          <option value="ar">Αρχιτέκτονες</option>
          <option value="ge">ΣΕΜΦΕ</option>
        </select>
        <br/>
        <label for="start_year">Start year:</label>
        <select name="start_year">
          <?php
            for ( $year = 0; $year <= 14; $year++ ) {
          ?>
          <option value="<?php echo $year ?>"><?php echo 2000 + $year ?></option>
          <?php
            }
          ?>
        </select>
        <br/>
        <label for="end_year">End year:</label>
        <select name="end_year">
          <?php
            for ( $year = 0; $year <= 14; $year++ ) {
          ?>
          <option value="<?php echo $year ?>"><?php echo 2000 + $year ?></option>
          <?php
            }
          ?>
        </select>
        </br>
        <button type='button' id="start">Start</button>
      </form>
      <div id="progress"></div>

<?php
  include 'footer.php';
?>

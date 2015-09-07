<?php
  include 'header.php';
?>
  <h1>Select school to access it's directory:</h1>
  <form method="GET" action="access_directory.php">
    <select name="school">
      <option value="el">Ηλεκτρολόγοι</option>
      <option value="mc">Μηχανολόγοι </option>
      <option value="rs">Τοπογράφοι</option>
      <option value="ar">Αρχιτέκτονες</option>
      <option value="ge">ΣΕΜΦΕ</option>
    </select>
    <input type="submit" value="Start" />
  </form>

  <p>Or you can download the directory <a href="select_dir_download.php">here</a></p>

<?php
  include 'footer.php';
?>

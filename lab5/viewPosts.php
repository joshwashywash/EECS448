<?php
  $DB = new mysqli('mysql.eecs.ku.edu', 'joertel', 'P@$$word123', 'joertel');
  if ($DB->connect_errno) {
      exit('Connect failed: ' . $DB->connect_error);
  }
  $result = $DB->query('SELECT ID FROM Users');
  echo "<select name='user'>";
  while ($row = $result->fetch_assoc()) {
      echo "<option value='{$row['ID']}'>{$row['ID']}</option>";
  }
  echo '</select>';
  $result->free();
  $DB->close();

<?php
  if (empty($_POST['username'])) {
      exit('Username can not be empty.');
  }
  $DB = new mysqli('mysql.eecs.ku.edu', 'joertel', 'P@$$word123', 'joertel');
  if ($DB->connect_errno) {
      exit('Connection failed: ' . $DB->connect_error);
  }
  if ($DB->query(sprintf("SELECT * FROM Users WHERE ID = '%s'", $DB->real_escape_string($_POST['username'])))->num_rows) {
      echo 'Username already exists in the database.';
  } else {
      $DB->query(sprintf("INSERT INTO Users (ID) VALUES ('%s')", $DB->real_escape_string($_POST['username'])));
      echo 'Username has been added to the database.';
  }
  $DB->close();
<?php

$myfile = './candidate.txt';
if (file_exists($myfile)) {
   echo "myfile exists!";
} else {
   echo "$myfile does not exist!";
}

echo 'Hello';
echo 'This is Krishna\'s Personal home page <br />';

//Test of Git
$servername = "localhost";
$username = "krishna";
$password = "test";
$dbname = "kmtestdb";

// Create connection
$mysqli  = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
    exit();
} 

printf("\nConnected to: %s <br/>",$servername);

$firstname = 'Krishna';

$query  = sprintf("SELECT * FROM student");
                          
// Perform Query
if ($result = $mysqli->query($query)) {
    printf("Select returned %d rows.<br/>", $result->num_rows);
    
    /* Get field information for all columns */
    while ($finfo = $result->fetch_field()) {

        printf("<br/>Name:     %s<br/>", $finfo->name);
        printf("Table:    %s<br/>", $finfo->table);
        printf("max. Len: %d<br/>", $finfo->max_length);
        printf("Flags:    %d<br/>", $finfo->flags);
        printf("Type:     %d<br/><br/>", $finfo->type);
    }
    
     /* determine number of fields in result set */
    $field_cnt = $result->field_count;
    printf("Result set has %d fields, their content is:<br/>", $field_cnt);
    
      while ($row = $result->fetch_row()) {
          printf("&nbsp &nbsp &nbsp");
          for ($i = 0; $i< $result->field_count; $i++) {
              printf(" %s ", $row[$i]);
          }
          printf("<br/>");
      }
    
    /* free result set */
    $result->close();
}
else
{
    printf("Query Failed<br/>");
}

$mysqli->close();

?> 
<?php
 $link = mysql_connect('mysql3.wsiph2.com', 'airtaxi_admincp', 'cl1psh6r3');
 if (!$link) {
 die('Could not connect: ' . mysql_error());
 }
 echo 'Connected successfully';
 mysql_close($link);
 ?>
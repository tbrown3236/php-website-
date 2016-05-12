<?php
  $page_title = "calendar";
  require "includes/header.php";
  require "includes/useful_functions.php";


  $month = $_GET['month'];
  $year = $_GET['year'];

  $date = new DateTime();
  if ( empty($month) ) {
    $month = $date->format("n");
  }
  if( empty($year) ) {
    $year = $date->format( "Y" );
  }

  $previous_year = $year;
  $next_year = $year;
  $previous_month = $month - 1;
  $next_month = $month + 1;

  $date->setDate($year, $month, 1);

  $first_day = $date->format("w");

  echo '<h2>' . $date->format("F") . " " . $year . '</h2><br/>';

  $table = "<table border='1'>\n<tr>\n";
  $count = 0;
    while( $count < $first_day){
      $table .= "\t<td>&nbsp;</td>\n";
      $count ++;

    }
  $day = 1;
  while( $day <= (7- $first_day) ){
    $table .= "\t<td>$day</td>\n" ;
    $day += 1;


  }



  $table .= "</tr>\n";
  $table .= "</table>\n";

  echo "<a href='/calendar.php?month=$previous_month&year=$next_year'>Previous Month</a>'";
  echo '<span>' . $date->format("F") . " " . $year . '</span>';
  echo "<a href='/calendar.php?month=$next_month&year=$next_year'>Next Month</a>'";

  echo $table;
  echo $table;
  echo $table;
  echo $table;

  echo miniCalendar($month,$year);

?>

<?php require "includes/footer.php" ?>




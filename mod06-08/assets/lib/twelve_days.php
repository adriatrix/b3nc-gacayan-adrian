<?php
  function getTitle() {
    return '12 Days of Christmas';
  }

  function getLyrics($day) {

    $days = array('first', 'second', 'third', 'fourth', 'fifth', 'sixth', 'seventh', 'eight', 'ninth', 'tenth', 'eleventh', 'twelfth');

    $gifts = array(
      'A partridge in a pear tree',
      'Two turtle doves',
      'Three French hens',
      'Four calling birds',
      'Five golden rings',
      'Six geese a-laying',
      'Seven swans a-swimming',
      'Eight maids a-milking',
      'Nine ladies dancing',
      'Ten lords a-leaping',
      'Eleven pipers piping',
      'Twelve drummers drumming'
    );

    // foreach ($days as $counter => $day) {
    //   $glyrics = $gifts[$counter];
    //   echo " " . $days[$counter] . " " . $glyrics . " <br>";
    // };
    return array($days[$day], $gifts[$day]);
  }

 ?>

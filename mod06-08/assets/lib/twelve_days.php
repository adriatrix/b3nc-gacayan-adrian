<?php
  function getTitle() {
    return '12 Days of Christmas';
  }

  function getLyrics($day) {

    $days = array('first', 'second', 'third', 'fourth', 'fifth', 'sixth', 'seventh', 'eight', 'ninth', 'tenth', 'eleventh', 'twelfth');

    $gifts = array(
      'a partridge in a pear tree',
      'two turtle doves',
      'three French hens',
      'four calling birds',
      'five golden rings',
      'six geese a-laying',
      'seven swans a-swimming',
      'eight maids a-milking',
      'nine ladies dancing',
      'ten lords a-leaping',
      'eleven pipers piping',
      'twelve drummers drumming'
    );

    // foreach ($days as $counter => $day) {
    //   $glyrics = $gifts[$counter];
    //   echo " " . $days[$counter] . " " . $glyrics . " <br>";
    // };
    return array($days[$day], $gifts[$day]);
  }

 ?>

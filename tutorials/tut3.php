<?php
//   string in php
$name = "Mohammad Asif";
  echo '<br>';
  echo $name;

  // string function

  //for length
  echo '<br>';
  echo strlen($name);

//   for counting words
  echo '<br>';
  echo str_word_count($name);
  
  // for reverse
  echo '<br>';
  echo strrev($name);
  
  
  //  for search string
  echo '<br>';
  echo strpos($name,'Asif');
  
  
  //   Replace Text Within a String
  echo '<br>';
  echo str_replace('Asif', 'Irshad' ,$name);

  echo '<br>';
  echo str_replace("world", "Dolly", "Hello world!");

//   for repeat any string 
  echo '<br>';
  echo str_repeat($name,10);
 




?>
<?php

echo "\nPHP Awesome Game\n\n";
echo "Guess number between 1 and 10!\n> ";
$random = rand(1, 10);
$line   = (int) trim(fgets(STDIN));
echo $random === $line
    ? "Yes, you are lucky one!"
    : sprintf("No, i guessed %d", $random);

echo "\n";

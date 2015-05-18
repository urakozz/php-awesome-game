<?php

namespace Kozz\Misc;

class Game {
  protected $boss;
  
  public function __construct(){
    $isBoss = !empty(getopt('', ['basePath::']));
    $this->setBoss($isBoss);
  }
  
  public function setBoss($boss){
    $this->boss = $boss;
  }

  public function play(){
    echo "\nPHP Awesome Game\n\n";
    echo "Guess number between 1 and 10!\n> ";
    $random = $this->getRandom();
    $line   = (int) trim(fgets(STDIN));
    echo $random === $line
        ? "Yes, you are lucky one!"
        : sprintf("No, i guessed %d", $random);
    echo "\n";
  }
  
  protected function getRandom(){
    $last = $this->boss ? 100 : 10;
    $random = rand(1, $last);
  }
}

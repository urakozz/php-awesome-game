<?php

namespace Kozz\Misc;

class Game
{
    protected $boss;

    public function __construct()
    {
        $opt    = getopt('', ['boss::']);
        $isBoss = !empty($opt);
        $this->setBoss($isBoss);
    }

    public function setBoss($boss)
    {
        $this->boss = $boss;
    }

    public function play()
    {
        $last = $this->getLast();
        echo "\nPHP Awesome Game\n\n";
        echo "Guess number between 1 and {$last}!\n> ";
        $random = rand(1, $last);
        $line   = (int) trim(fgets(STDIN));
        echo $random === $line
            ? "Yes, you are lucky one!"
            : sprintf("No, i guessed %d", $random);
        echo "\n";
    }

    protected function getLast()
    {
        return $this->boss ? 100 : 10;
    }
}

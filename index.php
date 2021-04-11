<!--DIを使用しない（GameConsoleがBioHazardに依存している）クラス-->

<?php
class GameConsole {
    protected $game;

    public function __construct()
    {
        $this->game = new BioHazard();
    }

    public function run()
    {
        print 'ゲーム起動';
    }
}

class BioHazard {
}

$gameConsole = new GameConsole();

$gameConsole->run();
<!--DIを使用し、GameConsole->BioHazardへの依存性を低くしたクラス-->

<?php
class GameConsole {
    protected $game;
    protected $name;

    // BioHazardクラスを継承するクラスであれば使える
    public function __construct(BioHazard $bioHazard)
    {
        $this->game = $bioHazard;
        $this->name = $this->game->displayName;
    }

    public function run()
    {
        print $this->name . '起動' . '<br>';
    }
}

class BioHazard {
    public $displayName = 'バイオハザード（無印）';
}

class BioHazardOutBreak extends BioHazard {
    public $displayName = 'バイオハザード アウトブレイク';
}

// ここでBioHazardクラスを注入
$gameConsole = new GameConsole(new BioHazard);
$gameConsole->run();

// ここでBioHazardOutBreakクラス(BioHazardを継承)を注入
$gameConsole = new GameConsole(new BioHazardOutBreak);
$gameConsole->run();
<!--GameCardインターフェースを使用することにより、さらに依存性を下げたクラス-->
<!--GameConsole → GameCard ← BioHazard という依存関係になっている-->

<?php
class GameConsole {
    protected GameCard $gameCard;

    // GameCardインターフェースに依存する
    public function __construct(GameCard $gameCard)
    {
        $this->gameCard = $gameCard;
    }

    public function run(): void
    {
        print $this->gameCard->displayName() . '起動' . '<br>';
    }
}

interface GameCard {
    public function displayName();
}

// GameCardインターフェースに属する
class BioHazard implements GameCard {
    public string $name = 'バイオハザード（無印）';

    public function displayName(): string
    {
        return $this->name;
    }
}

// GameCardインターフェースに属する
class BioHazardRE2 implements GameCard {
    public string $name = 'バイオハザード RE2';

    public function displayName(): string
    {
        return $this->name;
    }
}

// GameCardインターフェースに属したBioHazardクラスを注入
$gameConsole = new GameConsole(new BioHazard);
$gameConsole->run();

// GameCardインターフェースに属したBioHazardRE2クラスを注入
$gameConsole = new GameConsole(new BioHazardRE2);
$gameConsole->run();

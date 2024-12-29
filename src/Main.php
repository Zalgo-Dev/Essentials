<?php

declare(strict_types=1);

namespace ZalgoDev\Essentials;

use pocketmine\plugin\PluginBase;
use ZalgoDev\Essentials\commands\FlyCommand;
use ZalgoDev\Essentials\commands\GmCommand;
use ZalgoDev\Essentials\commands\VanishCommand;

class Main extends PluginBase {

    protected function onEnable(): void {
        $this->saveDefaultConfig();

        // Enregistrement des commandes
        $this->getServer()->getCommandMap()->registerAll("essentials", [
            new FlyCommand($this),
            new VanishCommand($this),
            new GmCommand($this),
        ]);
    }

}

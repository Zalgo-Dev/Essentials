<?php

declare(strict_types=1);

namespace ZalgoDev\Essentials;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\defaults\GamemodeCommand;
use pocketmine\utils\TextFormat;

class Main extends PluginBase {
    protected function onEnable(): void
    {
        $gamemodeCommand = new GamemodeCommand();
        $gamemodeCommand->setAliases(["gm"]);
        $this->getServer()->getCommandMap()->register("essentials", $gamemodeCommand);
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        if ($command->getName() === "fly") {
            if ($sender instanceof Player) {
                $flyStatus = $sender->getAllowFlight();
                if ($flyStatus === true) {
                    $sender->setAllowFlight(false);
                    $sender->sendMessage(TextFormat::DARK_PURPLE . "[Essentials] " . TextFormat::RED . "You can no longer fly.");
                } else {
                    $sender->setAllowFlight(true);
                    $sender->sendMessage(TextFormat::DARK_PURPLE . "[Essentials] " . TextFormat::GREEN . "You can now fly.");
                }
                return true;
            } else {
                $sender->sendMessage(TextFormat::RED . "This command can only be used by players.");
                return true;
            }
        }
        // Autres commandes ici
        return false;
    }
}

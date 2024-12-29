<?php

declare(strict_types=1);

namespace ZalgoDev\Essentials\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\GameMode;
use pocketmine\player\Player;
use pocketmine\plugin\Plugin;
use pocketmine\utils\TextFormat;

class GmCommand extends Command {
    private Plugin $plugin;

    public function __construct(Plugin $plugin) {
        parent::__construct("gm", "Change gamemode", "/gm <0|1|2> <pseudo: target>", []);
        $this->plugin = $plugin;
        $this->setPermission("essentials.gm");
    }

    public function execute(CommandSender $sender, string $label, array $args): bool {
        $mcPrefix = "&4[&eE&cs&ds&be&a&en&at&bi&da&cl&es&4] ";
        $essentialsPrefix = str_replace("&", "§", $mcPrefix);

        if (!$this->testPermission($sender)) {
            $sender->sendMessage($essentialsPrefix . TextFormat::RED . "You don't have permission to use this command.");
            return true;
        }
        if (count($args) < 1) {
            $sender->sendMessage($essentialsPrefix . TextFormat::RED . "Usage: /gm <0|1|2> [player]");
            return true;
        }
        $id = (int) $args[0];
        if ($id < 0 || $id > 3) {
            $sender->sendMessage($essentialsPrefix . TextFormat::RED . "Invalid gamemode. Choose 0, 1, or 2.");
            return true;
        }
        $gm = GameMode::fromString((string) $id);
        if (isset($args[1])) {
            if (!$this->testPermission($sender, "essentials.gm.others")) {
                $sender->sendMessage($essentialsPrefix . TextFormat::RED . "You don't have permission to use this command.");
                return true;
            }
            $target = $this->plugin->getServer()->getPlayerExact($args[1]);
            if ($target === null) {
                $sender->sendMessage($essentialsPrefix . TextFormat::RED . "Player not found.");
                return true;
            }
            $target->setGamemode($gm);
            $sender->sendMessage($essentialsPrefix . TextFormat::GREEN . "Gamemode changed for " . $target->getName() . ".");
            $target->sendMessage($essentialsPrefix . TextFormat::GREEN . "Your gamemode has been changed.");
        } else {
            if (!$sender instanceof Player) {
                $sender->sendMessage($essentialsPrefix . TextFormat::RED . "Usage: /gm <0|1|2> [player]");
                return true;
            }
            $sender->setGamemode($gm);
            $sender->sendMessage($essentialsPrefix . TextFormat::GREEN . "§aYour gamemode has been changed.");
        }
        return true;
    }
}

<?php

declare(strict_types=1);

namespace ZalgoDev\Essentials\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\plugin\Plugin;
use pocketmine\utils\TextFormat;

class HelloCommand extends Command {

    private Plugin $plugin;

    public function __construct(Plugin $plugin) {
        parent::__construct(
            "hello",
            "Say hello to the player",
        );

        $this->plugin = $plugin;
        $this->setPermission("essentials.hello");
        $this->setUsage("/hello <pseudo: target>");
    }

    public function execute(CommandSender $sender, string $label, array $args): bool {

        if (!$this->testPermission($sender)) {
            $sender->sendMessage("§cTu n'as pas la permission d'utiliser cette commande.");
            return true;
        }

        $mcPrefix = "&4[&eE&cs&ds&be&a&en&at&bi&da&cl&es&4] ";
        $essentialsPrefix = str_replace("&", "§", $mcPrefix);

        if (!$sender instanceof Player && count($args) === 0) {
            $sender->sendMessage($essentialsPrefix . TextFormat::RED . "Cette commande ne peut être utilisée par la console que si tu précises un joueur.");
            return true;
        }

        if (isset($args[0])) {
            if (!$this->testPermission($sender, "essentials.hello.others")) {
                $sender->sendMessage("§cTu n'as pas la permission d'utiliser cette commande.");
                return true;
            }
            $targetName = $args[0];
            $target = $this->plugin->getServer()->getPlayerExact($targetName);

            if ($target === null || !$target->isOnline()) {
                $sender->sendMessage($essentialsPrefix . TextFormat::RED . "Le joueur §f{$targetName} §cn'est pas en ligne.");
                return true;
            } else {
                $target->sendMessage($essentialsPrefix . TextFormat::GREEN . "Hello " . $sender->getName() . "!");
            }
        }

        else {
            $sender->sendMessage($essentialsPrefix . TextFormat::GREEN . "Hello " . $sender->getName() . "!");
            return true;
        }

        return true;
    }
}

<?php

declare(strict_types=1);

namespace ZalgoDev\Essentials\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase; // Changer Plugin en PluginBase
use pocketmine\utils\TextFormat;

class VanishCommand extends Command {

    private PluginBase $plugin; // Typage mis à jour

    public function __construct(PluginBase $plugin) { // Typage mis à jour
        parent::__construct(
            "vanish",
            "Allow player to use Vanish mode",
        );

        $this->plugin = $plugin;
        $this->setPermission("essentials.vanish");
        $this->setUsage("/vanish <pseudo: target>");
        $this->setAliases(["v"]);
    }

    public function execute(CommandSender $sender, string $label, array $args): bool {
        $mcPrefix = "&4[&eE&cs&ds&be&a&en&at&bi&da&cl&es&4] ";
        $essentialsPrefix = str_replace("&", "§", $mcPrefix);

        if (!$this->testPermission($sender)) {
            $sender->sendMessage($essentialsPrefix . TextFormat::RED . "§cYou don't have permission to use this command.");
            return true;
        }

        if (!$sender instanceof Player && count($args) === 0) {
            $sender->sendMessage($essentialsPrefix . TextFormat::RED . "This command can only be used by the console if you specify a player..");
            return true;
        }

        if (isset($args[0])) {
            if (!$this->testPermission($sender, "essentials.vanish.others")) {
                $sender->sendMessage($essentialsPrefix . TextFormat::RED . "§cYou don't have permission to use this command.");
                return true;
            }
            $targetName = $args[0];
            $target = $this->plugin->getServer()->getPlayerExact($targetName);

            if ($target === null || !$target->isOnline()) {
                $sender->sendMessage($essentialsPrefix . TextFormat::RED . "Player §f{$targetName} §cis not online");
                return true;
            }

            if ($target->isInvisible()) {
                $target->setInvisible(false);
                $target->sendMessage($essentialsPrefix . TextFormat::GREEN . "You're visible.");
                $sender->sendMessage($essentialsPrefix . TextFormat::GREEN . $targetName . " is visible.");
            } else {
                $target->setInvisible();
                $target->sendMessage($essentialsPrefix . TextFormat::GREEN . "You are invisible.");
                $sender->sendMessage($essentialsPrefix . TextFormat::GREEN . $targetName . " is invisible.");
            }
        }

        else {
            if (!$sender instanceof Player) {
                $sender->sendMessage($essentialsPrefix . TextFormat::RED . "The console must specify a nickname: /vanish <pseudo>.");
                return true;
            }

            if ($sender->isInvisible()) {
                $sender->setInvisible(false);
                $sender->sendMessage($essentialsPrefix . TextFormat::RED . "You're visible.");
            } else {
                $sender->setInvisible();
                $sender->sendMessage($essentialsPrefix . TextFormat::GREEN . "You are invisible.");
            }
        }

        return true;
    }
}

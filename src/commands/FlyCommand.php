<?php

declare(strict_types=1);

namespace ZalgoDev\Essentials\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\plugin\Plugin;
use pocketmine\utils\TextFormat;

class FlyCommand extends Command {

    private Plugin $plugin;

    public function __construct(Plugin $plugin) {
        parent::__construct(
            "fly",
            "Allow player to use Fly mode",
        );

        $this->plugin = $plugin;
        $this->setPermission("essentials.fly");
        $this->setUsage("/fly <pseudo: target>");
        $this->setAliases(["f"]);
    }

    public function execute(CommandSender $sender, string $label, array $args): bool {
        $mcPrefix = "&4[&eE&cs&ds&be&a&en&at&bi&da&cl&es&4] ";
        $essentialsPrefix = str_replace("&", "§", $mcPrefix);

        if (!$this->testPermission($sender)) {
            $sender->sendMessage($essentialsPrefix . TextFormat::RED . "§cYou don't have permission to use this command.");
            return true;
        }

        if (!$sender instanceof Player && count($args) === 0) {
            $sender->sendMessage($essentialsPrefix . TextFormat::RED . "This command can only be used by the console if you specify a player.");
            return true;
        }

        if (isset($args[0])) {
            if (!$this->testPermission($sender, "essentials.fly.others")) {
                $sender->sendMessage($essentialsPrefix . TextFormat::RED . "§cYou don't have permission to use this command.");
                return true;
            }
            $targetName = $args[0];
            $target = $this->plugin->getServer()->getPlayerExact($targetName);

            if ($target === null || !$target->isOnline()) {
                $sender->sendMessage($essentialsPrefix . TextFormat::RED . "Player §f{$targetName} §cis not online.");
                return true;
            }

            if (!$target->getAllowFlight()) {
                $target->setAllowFlight(true);
                $sender->sendMessage($essentialsPrefix . TextFormat::GREEN . "Flight is activated for §f{$target->getName()}§a.");
                $target->sendMessage($essentialsPrefix . TextFormat::GREEN . "Your flight has been activated by §f{$sender->getName()}§a.");
            } else {
                $target->setAllowFlight(false);
                $sender->sendMessage($essentialsPrefix . TextFormat::RED . "Flight is disabled for §f{$target->getName()}§c.");
                $target->sendMessage($essentialsPrefix . TextFormat::RED . "Your flight has been deactivated by §f{$sender->getName()}§c.");
            }
        }

        else {
            if (!$sender instanceof Player) {
                $sender->sendMessage($essentialsPrefix . TextFormat::RED . "The console must specify a nickname: /fly <pseudo>.");
                return true;
            }

            if ($sender->getAllowFlight()) {
                $sender->setAllowFlight(false);
                $sender->sendMessage($essentialsPrefix . TextFormat::RED . "You can't fly anymore.");
            } else {
                $sender->setAllowFlight(true);
                $sender->sendMessage($essentialsPrefix . TextFormat::GREEN . "Now you can fly.");
            }
        }

        return true;
    }
}

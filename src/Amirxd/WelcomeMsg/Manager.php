<?php

namespace Amirxd\WelcomeMsg;

use pocketmine\player\Player;
use pocketmine\world\particle\EndermanTeleportParticle;
use pocketmine\world\particle\FlameParticle;
use pocketmine\world\particle\HappyVillagerParticle;
use pocketmine\world\particle\HeartParticle;
use pocketmine\world\particle\LavaParticle;
use pocketmine\world\particle\PortalParticle;

class Manager
{
    public static function sendWelcomeMessage(Player $player): void
    {
        if (!WelcomeMessage::getInstance()->getConfig()->getNested("welcome-message.enabled", true)) {
            return;
        }

        $message = WelcomeMessage::getInstance()->getConfig()->getNested("welcome-message.message", "§6Welcome {player}!");
        $message = str_replace("{player}", $player->getName(), $message);

        if (WelcomeMessage::getInstance()->getConfig()->getNested("welcome-message.broadcast-to-all", true)) {
            WelcomeMessage::getInstance()->getServer()->broadcastMessage($message);
            return;
        }

        $player->sendMessage($message);
    }

    public static function sendWelcomeTitle(Player $player): void
    {
        if (!WelcomeMessage::getInstance()->getConfig()->getNested("title.enabled", true)) {
            return;
        }

        $title = str_replace(
            "{player}",
            $player->getName(),
            WelcomeMessage::getInstance()->getConfig()->getNested("title.title", "§bWelcome!")
        );
        $subtitle = WelcomeMessage::getInstance()->getConfig()->getNested("title.subtitle", "§7Enjoy your stay!");

        $player->sendTitle(
            $title,
            $subtitle,
            WelcomeMessage::getInstance()->getConfig()->getNested("title.fadein", 20),
            WelcomeMessage::getInstance()->getConfig()->getNested("title.stay", 60),
            WelcomeMessage::getInstance()->getConfig()->getNested("title.fadeout", 20)
        );
    }

    public static function applyParticles(Player $player): void
    {
        if (!WelcomeMessage::getInstance()->getConfig()->getNested("effects.particles", true)) {
            return;
        }

        $config = WelcomeMessage::getInstance()->getConfig();
        $particleType = $config->getNested("effects.particle-type", "HappyVillager");
        $count = $config->getNested("effects.particle-count", 10);

        $particles = [
            "HappyVillager" => new HappyVillagerParticle(),
            "Heart" => new HeartParticle(),
            "Flame" => new FlameParticle(),
            "Lava" => new LavaParticle(),
            "Portal" => new PortalParticle(),
            "Enderman" => new EndermanTeleportParticle()
        ];

        $particle = $particles[$particleType] ?? $particles["HappyVillager"];

        for ($i = 0; $i < $count; $i++) {
            $pos = $player->getPosition()->add(
                mt_rand(-2, 2),
                mt_rand(0, 3),
                mt_rand(-2, 2)
            );
            $player->getWorld()->addParticle($pos, $particle);
        }
    }
}

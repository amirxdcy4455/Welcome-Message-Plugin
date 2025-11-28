<?php

namespace Amirxd\WelcomeMsg;

use pocketmine\player\Player;
use pocketmine\world\particle\EndermanTeleportParticle;
use pocketmine\world\particle\FlameParticle;
use pocketmine\world\particle\HappyVillagerParticle;
use pocketmine\world\particle\HeartParticle;
use pocketmine\world\particle\LavaParticle;
use pocketmine\world\particle\PortalParticle;
use pocketmine\world\sound\PopSound;
use pocketmine\world\sound\PotionSplashSound;
use pocketmine\world\sound\ShulkerBoxOpenSound;
use pocketmine\world\sound\SmokerSound;
use pocketmine\world\sound\TotemUseSound;
use pocketmine\world\sound\XpLevelUpSound;

class Manager
{
    public static function sendWelcomeMessage(Player $player): void
    {
        $manager = WelcomeMessage::getInstance()->getDataManager();
        if (!$manager->getMessageStatus()) {
            return;
        }

        $message = $manager->getSenderTag() . $manager->getMessageText();
        $message = str_replace("{player.name}", $player->getName(), $message);
        $player->sendMessage($message);

        if ($manager->getBroadcastStatus()) {
            $b_msg = $manager->getSenderTag() . $manager->getBroadcastMessage();
            $b_msg = str_replace("{player.name}", $player->getName(), $b_msg);
            WelcomeMessage::getInstance()->getServer()->broadcastMessage($b_msg);
            return;
        }


    }

    public static function sendWelcomeTitle(Player $player): void
    {
        $manager = WelcomeMessage::getInstance()->getDataManager();

        if (!$manager->getTitleStatus()) {
            return;
        }

        $title = str_replace(
            "{player.name}",
            $player->getName(),
            $manager->getTitleText()
        );
        $subtitle = $manager->getSubTitleText();
        $title_data = $manager->getTitleData();
        $player->sendTitle(
            $title,
            $subtitle,
            $title_data["fadein"],
            $title_data["stay"],
            $title_data["fadeout"]
        );
    }

    public static function applyEffects(Player $player): void
    {
        $manager = WelcomeMessage::getInstance()->getDataManager();

        if (!$manager->getParticleStatus()) {
            return;
        }


        $particleType = $manager->getParticleType();
        $count = $manager->getParticleCount();

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

        if ($manager->getSoundStatus()){
            $sounds = [
                "Potion" => new PotionSplashSound(),
                "ShulkerBox" => new ShulkerBoxOpenSound(),
                "TotemUse" => new TotemUseSound(),
                "XP" => new XpLevelUpSound(10),
                "Smoker" => new SmokerSound(),
                "pop" => new PopSound()
            ];

            $sound_type = $manager->getSoundType();
            $sound = $sounds[$sound_type] ?? $sounds["XP"];


            $player->getWorld()->addSound($player->getPosition(), $sound);
        }
    }





}

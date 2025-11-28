<?php

namespace Amirxd\WelcomeMsg\events;

use Amirxd\WelcomeMsg\Manager;
use Amirxd\WelcomeMsg\WelcomeMessage;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\world\sound\PopSound;

class EventListener implements Listener
{
    public function onPlayerJoin(PlayerJoinEvent $event): void
    {
        $player = $event->getPlayer();

        Manager::sendWelcomeMessage($player);

        Manager::sendWelcomeTitle($player);

        Manager::applyEffects($player);

        if (WelcomeMessage::getInstance()->getConfig()->getNested("effects.sound")) {
            $player->getWorld()->addSound($player->getPosition(), new PopSound());
        }
    }
}

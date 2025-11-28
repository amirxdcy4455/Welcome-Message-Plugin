<?php

namespace Amirxd\WelcomeMsg;

use Amirxd\WelcomeMsg\events\EventListener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;
use pocketmine\utils\TextFormat as TF;

class WelcomeMessage extends PluginBase
{
    use SingletonTrait;

    private string $tag = TF::GRAY . "[" . TF::GREEN . "Welcome " . TF::YELLOW . "Message" . TF::GRAY . "] ";
    public DataManager $dataManager;

    public function onEnable(): void
    {
        $this->getLogger()->info($this->tag . "Enabled");
        self::$instance = $this;
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
        $this->dataManager = new DataManager();
        $this->dataManager->LoadAllData();
    }

    public function getDataManager(): DataManager{
        return $this->dataManager;
    }
}

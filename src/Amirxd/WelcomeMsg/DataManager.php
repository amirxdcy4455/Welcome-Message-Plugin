<?php

namespace Amirxd\WelcomeMsg;

class DataManager{

    private array $message_data;
    private array $broadcast_data;
    private array $title_data;
    private array $sound_data;
    private array $particle_data;

    private string $sender_tag;




    public function LoadAllData():void{
        $config = WelcomeMessage::getInstance()->getConfig();

        $this->broadcast_data = [
            "status" => (bool)$config->getNested("welcome-message.broadcast-to-all", true),
            "text" => (string)$config->getNested("welcome-message.broadcast-message", "§6Welcome §e{player.name} §6to the server!")
        ];

        $this->message_data = [
            "status" => (bool)$config->getNested("welcome-message.enabled", true),
            "text" => (string)$config->getNested("welcome-message.message", "§6Welcome {player.name}!")
        ];

        $this->particle_data = [
            "status" => (bool)$config->getNested("effects.particles", true),
            "type" => (string)$config->getNested("effects.particle-type", "HappyVillager"),
            "count" => (int)$config->getNested("effects.particle-count", 10)
        ];

        $this->sound_data = [
            "status" => (bool)$config->getNested("effects.sound", true),
            "type" => (string)$config->getNested("effects.sound-type", "XP")

        ];

        $this->title_data= [
            "status" => (bool)$config->getNested("title.enabled", true),
            "text" => (string)$config->getNested("title.title", "§bWelcome {player.name}!"),
            "sub" => (string)$config->getNested("title.subtitle", "§7Enjoy your stay!"),
            "fadein" => (int)WelcomeMessage::getInstance()->getConfig()->getNested("title.fadein", 20),
            "stay" => (int)WelcomeMessage::getInstance()->getConfig()->getNested("title.stay", 60),
            "fadeout" => (int)WelcomeMessage::getInstance()->getConfig()->getNested("title.fadeout", 20)
        ];

        $this->sender_tag = (string)$config->getNested("welcome-message.sender", "§7[§eWelcome §aMessage§7]");
    }

    public function getBroadcastStatus():bool
    {
        return $this->broadcast_data["status"];
    }

    public function getBroadcastMessage():string{
        return $this->broadcast_data["text"];
    }

    public function getMessageStatus():bool
    {
        return $this->message_data["status"];
    }

    public function getMessageText():string
    {
        return $this->message_data["text"];
    }

    public function getParticleStatus():bool
    {
        return $this->particle_data["status"];
    }

    public function getParticleType():string
    {
        return $this->particle_data["type"];
    }

    public function getSoundStatus():bool{
        return $this->sound_data["status"];
    }

    public function getSoundType():string{
        return $this->sound_data["type"];
    }


    public function getTitleStatus():bool{
        return $this->title_data["status"];
    }

    public function getTitleText():string
    {
        return $this->title_data["text"];
    }

    public function getSubTitleText():string
    {
        return $this->title_data["sub"];
    }

    public function getSenderTag():string{
        return $this->sender_tag;
    }

    public function getTitleData():array{
        return $this->title_data;
    }

    public function getParticleCount():int
    {
        return $this->particle_data["count"];
    }


}

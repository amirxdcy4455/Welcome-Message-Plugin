<h1>WelcomeMessage Plugin<img src="icon.png" height="64" width="64" align="left"></img></h1><br/>
A powerful and customizable welcome message plugin for PocketMine-MP with amazing particles and effects!

## ✨ Features

- **Custom Welcome Messages** - Send personalized messages to joining players
- **Beautiful Titles** - Display welcome titles with custom fade effects
- **Particle Effects** - 6 different particle types to choose from
- **Sound Effects** - 6 different sound types to choose from
- **Broadcast Options** - Send to all players or just the joining player
- **Highly Configurable** - Easy to customize through config.yml
- **Sender Tag Customization** - Customizable message sender prefix

## 🎯 Particle Types

- ❤️ Heart - Loving welcome
- 🔥 Flame - Fiery entrance  
- 🌋 Lava - Hot welcome
- 🔮 Portal - Magical appearance
- 👾 Enderman - Mysterious vibe
- 🎉 HappyVillager - Classic celebration

## 🎵 Sound Types

- ⚗️ Potion - Magical potion splash
- 📦 ShulkerBox - Mysterious shulker opening  
- 🪬 TotemUse - Powerful totem activation
- 💫 XP - Level up celebration
- 💨 Smoker - Smoke effect sound
- 🎪 Pop - Fun pop sound

## 📦 Installation

1. Download the latest release from [GitHub, Poggit]
2. Place the `WelcomeMessage.phar` file in your `plugins` folder
3. Restart your server
4. Configure to your liking in `plugin_data/WelcomeMessage/config.yml`

## ⚙️ Configuration

```yaml
# Welcome Message Settings
welcome-message:
  enabled: true
  message: "§6✨ Welcome §e{player.name} §6to the server!"
  broadcast-to-all: true
  broadcast-message: "§e✨ {player.name} §6Join to the server!"
  sender: "§7[§eWelcome§aMessage§7]"

# Title Settings  
title:
  enabled: true
  title: "§bWelcome {player.name}!"
  subtitle: "§7Enjoy your stay!"
  fadein: 20
  stay: 60
  fadeout: 20

# Effects
effects:
  sound: true
  particles: true
  sound_type: "XP" # Potion, ShulkerBox, TotemUse, XP, Smoker, pop
  particle-type: "Heart"  # HappyVillager, Heart, Flame, Lava, Portal, Enderman
  particle-count: 12
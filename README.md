# WelcomeMessage Plugin 🎉

A powerful and customizable welcome message plugin for PocketMine-MP with amazing particles and effects!

## ✨ Features

- **Custom Welcome Messages** - Send personalized messages to joining players
- **Beautiful Titles** - Display welcome titles with custom fade effects
- **Particle Effects** - 6 different particle types to choose from
- **Sound Effects** - Play sounds when players join
- **Broadcast Options** - Send to all players or just the joining player
- **Highly Configurable** - Easy to customize through config.yml

## 🎯 Particle Types

- ❤️ Heart - Loving welcome
- 🔥 Flame - Fiery entrance
- 🌋 Lava - Hot welcome
- 🔮 Portal - Magical appearance
- 👾 Enderman - Mysterious vibe
- 🎉 HappyVillager - Classic celebration

## 📦 Installation

1. Download the latest release from [GitHub , Poggit]
2. Place the `WelcomeMessage (folder)` in your `plugins` folder
3. Restart your server
4. Configure to your liking in `plugin_data\WelcomeMessage\config.yml`

## ⚙️ Configuration

```yaml
# Welcome Message Settings
welcome-message:
  enabled: true
  message: "§6✨ Welcome §e{player} §6to the server!"
  broadcast-to-all: true

# Title Settings  
title:
  enabled: true
  title: "§bWelcome {player}!"
  subtitle: "§7Enjoy your stay!"
  fadein: 20
  stay: 60
  fadeout: 20

# Effects
effects:
  sound: true
  particles: true
  particle-type: "Heart"  # HappyVillager, Heart, Flame, Lava, Portal, Enderman

  particle-count: 12

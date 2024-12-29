# ✨ Essentials Plugin for PocketMine-MP ✨

**Essentials** is a versatile plugin designed for PocketMine-MP servers, providing essential commands and features to enhance both gameplay and server administration.

## 🚀 Features

- 🕊️ **Flight Mode Toggle**: Enable or disable flight mode for yourself or other players.
- 🎮 **Quick Gamemode Access**: Use `/gm` to conveniently switch between Survival, Creative, and Adventure.
- 🕶️ **Vanish Mode**: Toggle invisibility for yourself or a target player.

## 📜 Commands

| Command                | Description                                             | Permission                   | Default |
|------------------------|---------------------------------------------------------|------------------------------|---------|
| `/fly`                 | Toggle flight mode                                      | `essentials.fly`             | OP      |
| `/fly {player}`        | Toggle flight mode for another player                   | `essentials.fly.other`       | OP      |
| `/gm 0 / 1 / 2`        | Switch your own gamemode (0=Survival, 1=Creative, 2=Adventure) | `essentials.gm`      | OP      |
| `/gm 0 / 1 / 2 {player}` | Switch another player's gamemode                     | `essentials.gm.other`     | OP      |
| `/vanish`              | Toggle vanish mode for yourself                         | `essentials.vanish`       | OP      |
| `/vanish {player}`     | Toggle vanish mode for another player                  | `essentials.vanish.other` | OP      |

## 🛡️ Permissions

| Permission                   | Description                                         | Default |
|-----------------------------|-----------------------------------------------------|---------|
| `essentials.fly`             | Allows toggling flight mode                        | OP      |
| `essentials.fly.other`       | Allows toggling flight mode for other players      | OP      |
| `essentials.gm`           | Allows changing your own gamemode                  | OP      |
| `essentials.gm.other`     | Allows changing gamemode of other players          | OP      |
| `essentials.vanish`       | Allows toggling vanish mode for yourself           | OP      |
| `essentials.vanish.other` | Allows toggling vanish mode for other players      | OP      |
| `minecraft.*`                | Permission for the default /gamemode command       | OP      |

## 🛠️ Installation

1. 📥 Download the `.phar` file from [Poggit](https://poggit.pmmp.io/p/Essentials/0.0.1).
2. 📂 Place the `.phar` file in your server's `plugins` directory.
3. 🔄 Restart your PocketMine-MP server.

## 🤝 Contributing

Contributions are welcome! Whether you're fixing bugs, adding features, or improving documentation, your help is appreciated. Follow these steps to contribute:

1. 🍴 Fork the repository.
2. 🌿 Create a new branch for your feature or fix.
3. 💾 Commit your changes and push them to your fork.
4. 📤 Submit a pull request for review.

## 📝 License

This project is licensed under the MIT License. See the `LICENSE` file for more details.

## 🌟 Future Plans

Essentials is under active development. Here’s what we plan to add in upcoming versions:

- ✈️ **Teleport Commands**: Easily teleport yourself or others.
- 🏠 **Home and Warp Systems**: Set, teleport to, and manage homes and warp points.
- 🎁 **Item Kits**: Provide predefined item kits to players.
- 💬 **Chat Formatting**: Customize player chat messages.

Stay tuned for updates! 🚧

<p align="center">
  <img src="https://img.shields.io/badge/Made%20with-%E2%9D%A4-red?style=flat-square" alt="Made with Love">
</p>

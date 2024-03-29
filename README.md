# libRanks

libRanks is a virion for easy support of multiple rank providers.
<br>
Take a look at <a href="https://github.com/ClickedTran/libRanks/wiki">the wiki</a> to learn more about how virions work.

## Supported Providers

- [PurePerms](https://poggit.pmmp.io/p/PurePerms) by #64FF00/poggit-orphanage
- [RankSystem](https://poggit.pmmp.io/p/RankSystem) by IvanCraft623

## Usage

### Setup

```php
libRanks::init()
```

### Using Ranks Providers

```php
libRanks::getProvider($providerInformation)
```

`$providerInformation` is an array with the key ```provider```.

### Give Rank To Player
```php
RankProvider::giveRank(Player|string $player, string $rank, ?callable $callback = null)
```

### Get Rank From Player
```php
RankProvider::getRank(Player|string $player, ?callable $callback = null)
```

### Remove Player's Rank
```php
RankProvider::removeRank(Player|string $player, string $rank, ?callable $callback = null)
```

### Get Rank In Data
```php
RankProvider::getRankData(string $rank, ?callable $callback = null)
```

### Get Player's Permission
```php
RankProvider::getPlayerPermission(Player|string $player, ?callable $callback = null)
```

### Set Permission For Player
```php
RankProvider::setPlayerPermission(Player|string $player, string $permission, ?callable $callback = null)
```

### Remove Permission From Player
```php
RankProvider::unsetPlayerPermission(Player|string $player, string $permission, ?callable $callback = null)
```

### Error Handling

There are several exceptions that can be thrown that you may want to handle in your plugin:

* MissingProviderDependencyException
* UnknownProviderException

## Examples

config.yml

```yaml
rank:
  provider: ranksystem
```

ExamplePlugin.php

```php
class ExamplePlugin extends PluginBase{
    public $rankProvider;
    
    public function onEnable(): void{
        $this->saveDefaultConfig();
        libRanks::init();
        $this->rankProvider = libRanks::getProvider($this->getConfig()->get("rank"));
    }
}
```

If you usage `poggit` to build your repo, you can add it to `.poggit.yml` file
```php
projects:
 YourPlugin:
  libs:
   - src: ClickedTran/libRanks/libRanks
     version: ^1.0.0
```
## Plugins used:
- [x] [RankShopGUI](https://poggit.pmmp.io/ci/ClickedTran/RankShopGUI/~)

## NOTE
- If you find this lib similar to a certain lib, then you are right, I made this lib based on <a href="https://github.com/DaPigGuy/libPiggyEconomy">DaPigGuy's libPiggyEconomy</a>
- Thank for you reading note
***

<div align="center">
<h2>CONTACT</h2>
<table width="30px" height="auto">
<tr>
<td><b>FACEBOOK</b></td>
<td><b>DISCORD</b></td>
</tr>
<tr>
<td>
<div align="center">
<a href="https://www.facebook.com/clicked.tran.01"><img src="https://i.ibb.co/JqVvkhk/facebook.png" width="40px" height="auto"></a>
</div>
</td>
<td>
<div align="center">
<a href="https://discord.com/invite/9XbBgyen"><img src="https://i.ibb.co/rm13YL6/discord.png" alt="discord" border="0" width="50px" height="auto"></a>
</div>
</td>
</tr>
</table>

***
</div>

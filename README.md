# libRanks

libRanks is a virion for easy support of multiple rank providers.

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

## Get Player's Permission
```php
RankProvider::getPlayerPermission(Player|string $player, ?callable $callback = null)
```

## Set Permission For Player
```php
RankProvider::setPlayerPermission(Player|string $player, string $permission, ?callable $callback = null)
```

## Remove Permission From Player
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

## NOTE
- If you find this lib similar to a certain lib, then you are right, I made this lib based on <a href="https://github.com/DaPigGuy/libPiggyEconomy">DaPigGuy's libPiggyEconomy</a>
- Thank for you reading note

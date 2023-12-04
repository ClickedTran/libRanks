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

#### Rank Provider Methods

| Method                                                                                            | Description                | Callback Signature                                   | Callback Description                                                      |
|---------------------------------------------------------------------------------------------------|----------------------------|------------------------------------------------------|---------------------------------------------------------------------------|
| ```RankProvider::getRank(Player $player, ?callable $callback = null)```                                                  | Returns symbol of currency | `none`                                               | `none`                                                                    |
| ```RankProvider::giveRank(Player $player, string $rank, ?callable $callback = null)``` | Give rank to a player     | `none`                    | Returns true if money was given successfully, otherwise false.            |
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

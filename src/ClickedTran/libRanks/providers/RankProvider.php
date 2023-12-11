<?php

namespace ClickedTran\libRanks\providers;

use pocketmine\player\Player;

abstract class RankProvider
{
    public static function checkDependencies(): bool
    {
        return true;
    }

    abstract function getRank(Player|string $player, ?callable $callback = null);

    abstract function giveRank(Player|string $player, string $rank, ?callable $callback = null);
    
    abstract function getRankData(string $rank, ?callable $callback = null);
    
    abstract function removeRank(Player|string $player, string $rank, ?callable $callback = null);
    
    abstract function getPlayerPermission(Player|string $player, ?callable $callback = null);
    
    abstract function setPlayerPermission(Player|string $player, string $permission, ?callable $callback = null);
    
    abstract function unsetPlayerPermission(Player|string $player, string $permission, ?callable $callback = null);
}

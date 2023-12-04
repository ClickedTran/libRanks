<?php

namespace ClickedTran\libRanks\providers;

use pocketmine\player\Player;

abstract class RankProvider
{
    public static function checkDependencies(): bool
    {
        return true;
    }


    abstract function getRank(Player $player, ?callable $callback = null);

    abstract function giveRank(Player $player, string $rank, ?callable $callback = null);
    
    abstract function getRankData(string $rank, ?callable $callback = null);
   
}

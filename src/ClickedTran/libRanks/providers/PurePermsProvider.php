<?php

declare(strict_types=1);

namespace ClickedTran\libRanks\providers;

use _64FF00\PurePerms\PurePerms;
use pocketmine\player\Player;
use pocketmine\Server;

class PurePermsProvider extends RankProvider
{
    private PurePerms $ranks;

    public static function checkDependencies(): bool
    {
        return Server::getInstance()->getPluginManager()->getPlugin("PurePerms") !== null;
    }

    public function __construct()
    {
        $this->ranks = PurePerms::getInstance();
    }

    public function getRank(Player |string $player, ?callable $callback = null)
    {
        return $this->ranks->getUserDataMgr()->getData($player)["group"];
    }

    public function giveRank(Player|string $player, string $rank, ?callable $callback = null)
    {
      return $this->ranks->setGroup($player, $this->ranks->getGroup($rank));
    }
    
    public function getRankData(string $rank, ?callable $callback = null)
    {   
      return $this->ranks->getGroup($rank);
    }
    
    public function removeRank(Player|string $player, string $rank, ?callable $callback = null)
    {
        return; //PUREPERMS NO REMOVE RANK OF PLAYER OR I DON'T KNOW :)
    }
    
    public function getPlayerPermission(Player|string $player, ?callable $callback = null)
    {
        return $this->ranks->getUserDataMgr()->getUserPermissions($player);
    }
    
    public function setPlayerPermission(Player|string $player, string $permission, ?callable $callback = null)
    {
        return $this->ranks->getUserDataMgr()->setPermission($player, $permission);
    }
    
    public function unsetPlayerPermission(Player|string $player, string $permission, ?callable $callback = null)
    {
       return $this->ranks->getUserDataMgr()->unsetPermission($player, $permission); 
    }
}

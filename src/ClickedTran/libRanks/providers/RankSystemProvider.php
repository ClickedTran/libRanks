<?php

declare(strict_types=1);

namespace ClickedTran\libRanks\providers;

use IvanCraft623\RankSystem\RankSystem;
use IvanCraft623\RankSystem\utils\Utils;

use pocketmine\player\Player;
use pocketmine\Server;

class RankSystemProvider extends RankProvider
{
    private RankSystem $ranks;

    public static function checkDependencies(): bool
    {
        return Server::getInstance()->getPluginManager()->getPlugin("RankSystem") !== null;
    }

    public function __construct()
    {
        $this->ranks = RankSystem::getInstance();
    }


    public function getRank(Player $player)
    {
      $session = $this->ranks->getSessionManager()->get($player);
      return Utils::ranks2string($session->getRanks());
    }

    public function giveRank(Player $player, string $rank, ?callable $callback = null)
    {
       $user = $this->ranks->getSessionManager()->get($player);
        $user->onInitialize(function() use ($user, $rank){
        return $user->setRank($this->ranks->getRankManager()->getRank($rank));
   
       });
 
    }
}
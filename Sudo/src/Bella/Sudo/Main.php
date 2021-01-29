<?php

declare(strict_types=1);

namespace Bella\Sudo;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\command\Command, pocketmine\command\CommandSender;

class Main extends PluginBase{
    public function onEnable(){
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{

        switch($cmd->getName()){
            case "sudo":
                if($sender instanceof Player){
                    $p = $this->getServer()->getPlayer($data[0])->getName();
                    $cmd = $data[1];
                    if($p instanceof Player){
                        $this->getServer()->dispatchCommand($p, $cmd);
                        $sender->sendMessage("You Sudoed " . $data[0 . " todo /" . $data[1]]);
                        if($sender->hasPermission("sudo.perm")) {
                            $this->sudo($sender);
                    }

                    }else{
                        $sender->sendMessage("You do have permission to use this command.");
                    }
                }
        }
        return true;
    }
}

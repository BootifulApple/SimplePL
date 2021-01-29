<?php

declare(strict_types=1);

namespace Bella\Sudo;

use jojoe77777\FormAPI\Form;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener{
    public function onEnable(){
    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool{

        switch($cmd->getName()){
            case "sudo":
                if($sender instanceof Player){
                        if($sender->hasPermission("sudo.perm")) {
                            $this->sudo($sender);

                    }else{
                        $sender->sendMessage("You do have permission to use this command.");
                    }
                }
        }
        return true;
    }

    public function sudo($player){
        $form = $this->getServer()->getPluginManager()->getPlugin("FormAPI")->createCustomForm(function (Player $player, array $data = null) {
            if($data === null) {
                return true;
            }
            $p = $this->getServer()->getPlayer($data[0]);
            $cmd = $data[1];
            if ($p instanceof Player) {
                $this->getServer()->dispatchCommand($p, $cmd);
                $player->sendMessage("You Sudoed " . $p->getName() . " todo /" . $data[1]);
            }
        });
        $form->setTitle("SudoUI");
        $form->addInput("Type a player's name");
        $form->addInput("Type a command without the /");
        $form->sendToPlayer($player);
        return $form;
    }
}

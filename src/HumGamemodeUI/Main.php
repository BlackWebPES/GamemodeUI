<?php

namespace HumGamemodeUI;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use jojoe77777\FormAPI;

Class Main extends PluginBase{
  
  public function onEnable(){
    $this->getLogger()->info("gamemode ui enabled");
  }
  
  public function onCommand(CommandSender $sender, Command $command, String $label, array $args) : bool {
    if($command->getName() === "gmui"){
      if($sender->hasPermission("gmui.cmd")){
        $formapi = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $formapi->createCustomForm(function(Player $sender, $data){
          $result = $data[0];
          if( !is_null($data)) {
            switch($result) {
            case 0:
              $sender->sendMessage("cretive mode change gamemode to gm 1");
              $sender->addTitle("creative mode", "creative mode is enabled");
              $sender->setGamemode(1);
              break;
            case 1:
              $sender->sendMessage("survival mode change gamemode to gm 0");
              $sender->addTitle("survival mode", "survival mode is enabled");
              $sender->setGamemode(0);
              break;
            case 2:
              $sender->sendMessage("adventure mode change gamemode to gm 2");
              $sender->addTitle("adventure mode", "adventure mode is enabled");
              $sender->setGamemode(2);
              break;
            case 3:
              $sender->sendMessage("spector mode change gamemode to gm 3");
              $sender->addTitle("spector mode", "spector mode is enabled");
              $sender->setGamemode(3);
              default:
                return;
                }
           }
          });
          $form->setTitle("§c§lBlackWebPE Gamemode-UI");
          $form->addDropdown("Gamemode", ["Creative", "Survival", "Adventure", "Spector"]);
          $form->sendToPlayer($sender);
      } else {
        $sender->sendMessage("Your Not Staff");
      }
    }
    return true;
  }
}

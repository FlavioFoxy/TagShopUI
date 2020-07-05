<?php


namespace FlavioFoxy\Tag;

use FlavioFoxy\Tag\commands\Add;
use FlavioFoxy\Tag\commands\Remove;
use FlavioFoxy\Tag\commands\Shop;
use FlavioFoxy\Tag\commands\tag;
use FlavioFoxy\Tag\utils\form\ModalForm;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\item\Item;
use pocketmine\math\Vector3;
use pocketmine\network\mcpe\protocol\AddActorPacket;
use pocketmine\network\mcpe\protocol\LoginPacket;
use pocketmine\Player;
use pocketmine\utils\TextFormat as C;
	use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use FlavioFoxy\Tag\events\PlayerChat;
use FlavioFoxy\Tag\data\Players;
use FlavioFoxy\Tag\utils\form\SimpleForm;
use pocketmine\network\mcpe\protocol\InventoryTransactionPacket;
use pocketmine\utils\TextFormat;
use FlavioFoxy\Tag\commands\Tags;
use pocketmine\entity\Entity;
use pocketmine\event\player\PlayerInteractEvent;

{
    private $commands = [];
    private $prefix = "Tag";
    public $tag;
    public $coins;
    public $tags;
    public $msg;

    public function onLoad()
    {
       
    {
        $this->coins = new \SQLite3($this->getDataFolder() . "coins.db");
        $this->coins->exec("CREATE TABLE IF NOT EXISTS coins (player TEXT PRIMARY KEY COLLATE NOCASE, coins INT);");

        $this->tag = new \SQLite3($this->getDataFolder() . "tags.db");
        $this->tag->exec("CREATE TABLE IF NOT EXISTS tags (player TEXT PRIMARY KEY COLLATE NOCASE, Test INT);");
        $this->tags = $this->tag;

       
   ($this->getDataFolder());
        $this->saveConfig();

            $this->getServer()->getCommandMap()->register("settag", $this->commands[] = new Tags($this));

        $this->getServer()->getCommandMap()->register("add", $this->commands[] = new Add($this));
        $this->getServer()->getCommandMap()->register("remove", $this->commands[] = new Remove($this));
        $this->getServer()->getCommandMap()->register("tag", $this->commands[] = new tag($this));
        $this->getServer()->getCommandMap()->register("shop", $this->commands[] = new Shop($this));
        $this->getServer()->getCommandMap()->unregister($this->getServer()->getCommandMap()->getCommand("me"));
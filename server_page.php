<?php
$playerOnlineArray = $serverObj->getAllPlayersOnline();
?>
<span id="infoLabel">Currently Online (<?php echo(count($playerOnlineArray)); ?>) :</span>
<?php
	foreach($playerOnlineArray as $player) {
	?>
	<span id="online"><a id="onlinePlayer" href="?view=player&uuid=<?php echo($player->getUUID()); ?>"><?php echo($player->getName()); ?></a></span>
	<?php
	}
?>
<br /><br />
<div id="subTitle">Server Statistics &nbsp; &nbsp; <a id="smallLink" href="?view=playerList">(View Player List)</a></div>
<div id="infoLine">
    <span id="infoLabel">Registered Players:</span><span id="info"><?php echo(count($serverObj->getAllPlayers())); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Lifetime Number of Logins:</span><span id="info"><?php echo($serverObj->getNumberOfLoginsTotal()); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Time Played Total:</span><span id="info"><?php echo(QueryUtils::formatSecs($serverObj->getNumberOfSecondsLoggedOnTotal())); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Server Current UpTime:</span><span id="info"><?php echo(QueryUtils::formatSecs($serverObj->getUptimeInSeconds())); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Server Last Startup:</span><span id="info"><?php echo(QueryUtils::formatDate($serverObj->getStartupTime())); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Server Last Shutdown:</span><span id="info"><?php echo(QueryUtils::formatDate($serverObj->getLastShutdownTime())); ?></span>
</div>
<div id="subCategory">Distances</div>
<div id="infoLine">
    <span id="infoLabel">Total Travel Distance:</span><span id="info"><?php echo(QueryUtils::formatDistance($serverObj->getDistanceTraveledTotal())); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Total Foot Travel Distance:</span><span id="info"><?php echo(QueryUtils::formatDistance($serverObj->getDistanceTraveledByFootTotal())); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Total Minecart Travel Distance:</span><span id="info"><?php echo(QueryUtils::formatDistance($serverObj->getDistanceTraveledByMinecartTotal())); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Total Boat Travel Distance:</span><span id="info"><?php echo(QueryUtils::formatDistance($serverObj->getDistanceTraveledByBoatTotal())); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Total Pig Travel Distance:</span><span id="info"><?php echo(QueryUtils::formatDistance($serverObj->getDistanceTraveledByPigTotal())); ?></span>
</div>
<div id="subCategory">Blocks &nbsp; &nbsp; <a href="?view=globalBlocks" id="smallLink">(View Detailed Global Block List)</a></div>
<div id="infoLine">
    <span id="infoLabel">Total Blocks Placed:</span><span id="info"><?php echo($serverObj->getBlocksPlacedTotal()); ?> blocks</span>
</div>
<div id="infoLine">
    <span id="infoLabel">Most Popular Block Placed:</span><span id="info"><?php echo(QueryUtils::getResourceNameById($serverObj->getBlocksMostPlaced())); ?>
     - (<?php echo($serverObj->getBlocksPlacedOfTypeTotal($serverObj->getBlocksMostPlaced())); ?> times)</span>
</div>
<div id="infoLine">
    <span id="infoLabel">Total Blocks Destroyed:</span><span id="info"><?php echo($serverObj->getBlocksDestroyedTotal()); ?> blocks</span>
</div>
<div id="infoLine">
    <span id="infoLabel">Most Popular Block Destroyed:</span><span id="info"><?php echo(QueryUtils::getResourceNameById($serverObj->getBlocksMostDestroyed())); ?>
     - (<?php echo($serverObj->getBlocksDestroyedOfTypeTotal($serverObj->getBlocksMostDestroyed())); ?> times)</span>
</div>
<div id="subCategory">Items &nbsp; &nbsp; <a href="?view=globalItems" id="smallLink">(View Detailed Global Items List)</a></div>
<div id="infoLine">
    <span id="infoLabel">Total Items Picked Up:</span><span id="info"><?php echo($serverObj->getPickedUpTotal()); ?> items</span>
</div>
<div id="infoLine">
    <span id="infoLabel">Most Popular Item Picked Up:</span><span id="info"><?php echo(QueryUtils::getResourceNameById($serverObj->getMostPickedUp())); ?>
     - (<?php echo($serverObj->getPickedUpOfTypeTotal($serverObj->getMostPickedUp())); ?> times)</span>
</div>
<div id="infoLine">
    <span id="infoLabel">Total Items Dropped:</span><span id="info"><?php echo($serverObj->getDroppedTotal()); ?> items</span>
</div>
<div id="infoLine">
    <span id="infoLabel">Most Popular Item Dropped:</span><span id="info"><?php echo(QueryUtils::getResourceNameById($serverObj->getMostDropped())); ?>
     - (<?php echo($serverObj->getDroppedOfTypeTotal($serverObj->getMostDropped())); ?> times)</span>
</div>
<div id="subCategory">Kills &nbsp; &nbsp; <a href="?view=globalKills" id="smallLink">(View Detailed Global Kill List)</a></div>
<div id="infoLine">
    <span id="infoLabel">Total Deaths:</span><span id="info"><?php echo(count($serverObj->getKillTable())); ?></span>
</div>
<br />
<div id="infoLine">
    <span id="infoLabel">Most Dangerous Weapon:</span><span id="info"><?php echo(QueryUtils::getResourceNameById($serverObj->getMostDangerousWeapon())); ?> 
    - (<?php echo (count($serverObj->getKillTableUsing($serverObj->getMostDangerousWeapon()))); ?> kills)</span>
</div>
<br />
<div id="infoLine">
    <span id="infoLabel">PVP Kills:</span><span id="info"><?php echo($serverObj->getKillTablePVP() ? count ($serverObj->getKillTablePVP()) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Most Dangerous Player:</span><span id="info"><?php 
    $player = $serverObj->getMostKillerPVP();
    if ($player) {
    	?>
    	<a id="onlinePlayer" href="?view=player&uuid=<?php echo($player->getUUID()); ?>"><?php echo($player->getName()); ?></a> - (<?php echo (count($player->getPlayerKillTableCreature(QueryUtils::getCreatureIdByName("Player")))); ?> pvp kills)
    	<?php
    } else {
    	?>
    	None
    	<?php
    }
    ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Most Squishy Player:</span><span id="info"><?php 
    $player = $serverObj->getMostKilledPVP();
    if ($player) {
    	?>
    	<a id="onlinePlayer" href="?view=player&uuid=<?php echo($player->getUUID()); ?>"><?php echo($player->getName()); ?></a> - (<?php echo (count($player->getPlayerDeathTableCreature(QueryUtils::getCreatureIdByName("Player")))); ?> pvp deaths)
    	<?php
    } else {
    	?>
    	None
    	<?php
    }
    ?></span>
</div>
<br />
<div id="infoLine">
    <span id="infoLabel">PVE Kills:</span><span id="info"><?php echo($serverObj->getKillTablePVE() ? count($serverObj->getKillTablePVE()) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Most Dangerous Creature:</span><span id="info"><?php echo(QueryUtils::getCreatureNameById($serverObj->getMostDangerousPVECreature())); ?>
    - (<?php echo($serverObj->getMostDangerousPVECreature() ? count($serverObj->getKillTableCreature($serverObj->getMostDangerousPVECreature())) : 0); ?> kills)</span>
</div>
<div id="infoLine">
    <span id="infoLabel">Most Killed Creature:</span><span id="info"><?php echo(QueryUtils::getCreatureNameById($serverObj->getMostKilledPVECreature())); ?>
    - (<?php echo($serverObj->getMostKilledPVECreature() ? count($serverObj->getDeathTableCreature($serverObj->getMostKilledPVECreature())) : 0); ?> deaths)</span>
</div>
<br />
<div id="infoLine">
    <span id="infoLabel">Other Type Deaths:</span><span id="info"><?php echo($serverObj->getKillTableOther() ? count($serverObj->getKillTableOther()) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Falling Deaths:</span><span id="info"><?php echo($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Fall")) ? count($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Fall"))) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Drowning Deaths:</span><span id="info"><?php echo($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Drowning")) ? count($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Drowning"))) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Suffocating Deaths:</span><span id="info"><?php echo($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Suffocation")) ? count($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Suffocation"))) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Lightening Deaths:</span><span id="info"><?php echo($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Lightening")) ? count($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Lightening"))) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Lava Deaths:</span><span id="info"><?php echo($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Lava")) ? count($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Lava"))) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Fire Deaths:</span><span id="info"><?php echo($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Fire")) ? count($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Fire"))) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Fire Tick Deaths:</span><span id="info"><?php echo($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Fire Tick")) ? count($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Fire Tick"))) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Explosion Deaths:</span><span id="info"><?php echo($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Entity Explosion")) ? count($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Entity Explosion"))) : 0); ?></span>
</div>
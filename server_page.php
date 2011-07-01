<?php
$playerOnlineArray = $serverObj->getAllPlayersOnline();
?>
<span id="infoLabel"><?php echo(STRING_SERVER_CURRENTLY_ONLINE); ?> (<?php echo(count($playerOnlineArray)); ?>) :</span>
<?php
	foreach($playerOnlineArray as $player) {
	?>
	<span id="online"><a id="onlinePlayer" href="?view=player&uuid=<?php echo($player->getUUID()); ?>"><?php echo($player->getName()); ?></a></span>
	<?php
	}
?>
<br /><br />
<div id="subTitle"><?php echo(STRING_SERVER_SERVER_STATISTICS); ?> &nbsp; &nbsp; <a id="smallLink" href="?view=playerList"><?php echo(STRING_SERVER_LINK_PLAYER_LIST); ?></a></div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_SERVER_REGISTERED_PLAYERS); ?>:</span><span id="info"><?php echo(count($serverObj->getAllPlayers())); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_SERVER_MAX_PLAYERS_ON); ?>:</span><span id="info"><?php echo($serverObj->getMaxPlayersEverOnline()); ?> <?php echo(STRING_SERVER_MAX_PLAYERS_NUMBER_TO_TIME_SEPERATOR); ?> <?php echo(QueryUtils::formatDate($serverObj->getMaxPlayersEverOnlineTimeWhenOccured())); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_SERVER_LIFETIME_LOGONS); ?>:</span><span id="info"><?php echo($serverObj->getNumberOfLoginsTotal()); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_SERVER_TIME_PLAYED_TOTAL); ?>:</span><span id="info"><?php echo(QueryUtils::formatSecs($serverObj->getNumberOfSecondsLoggedOnTotal())); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_SERVER_SERVER_CURRENT_UPTIME); ?>:</span><span id="info"><?php echo(QueryUtils::formatSecs($serverObj->getUptimeInSeconds())); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_SERVER_SERVER_LAST_STARTUP); ?>:</span><span id="info"><?php echo(QueryUtils::formatDate($serverObj->getStartupTime())); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_SERVER_SERVER_LAST_SHUTDOWN); ?>:</span><span id="info"><?php echo(QueryUtils::formatDate($serverObj->getLastShutdownTime())); ?></span>
</div>
<div id="subCategory"><?php echo(STRING_ALL_DISTANCES); ?></div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_TOTAL_TRAVEL_DISTANCE); ?>:</span><span id="info"><?php echo(QueryUtils::formatDistance($serverObj->getDistanceTraveledTotal())); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_TOTAL_FOOT_TRAVEL_DISTANCE); ?>:</span><span id="info"><?php echo(QueryUtils::formatDistance($serverObj->getDistanceTraveledByFootTotal())); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_TOTAL_MINECART_TRAVEL_DISTANCE); ?>:</span><span id="info"><?php echo(QueryUtils::formatDistance($serverObj->getDistanceTraveledByMinecartTotal())); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_TOTAL_BOAT_TRAVEL_DISTANCE); ?>:</span><span id="info"><?php echo(QueryUtils::formatDistance($serverObj->getDistanceTraveledByBoatTotal())); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_TOTAL_PIG_TRAVEL_DISTANCE); ?>:</span><span id="info"><?php echo(QueryUtils::formatDistance($serverObj->getDistanceTraveledByPigTotal())); ?></span>
</div>
<div id="subCategory"><?php echo(STRING_ALL_BLOCKS); ?> &nbsp; &nbsp; <a href="?view=globalBlocks" id="smallLink"><?php echo(STRING_SERVER_LINK_GLOBAL_BLOCK_LIST); ?></a></div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_TOTAL_BLOCKS_PLACED); ?>:</span><span id="info"><?php echo($serverObj->getBlocksPlacedTotal()); ?> <?php echo(STRING_ALL_BLOCKS); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_MOST_POPULAR_BLOCK_PLACED); ?>:</span><span id="info"><?php echo(QueryUtils::getResourceNameById($serverObj->getBlocksMostPlaced())); ?>
     - (<?php echo($serverObj->getBlocksPlacedOfTypeTotal($serverObj->getBlocksMostPlaced())); ?> <?php echo(STRING_ALL_TIMES); ?>)</span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_TOTAL_BLOCKS_DESTROYED); ?>:</span><span id="info"><?php echo($serverObj->getBlocksDestroyedTotal()); ?> <?php echo(STRING_ALL_BLOCKS); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_MOST_POPULAR_BLOCK_DESTROYED); ?>:</span><span id="info"><?php echo(QueryUtils::getResourceNameById($serverObj->getBlocksMostDestroyed())); ?>
     - (<?php echo($serverObj->getBlocksDestroyedOfTypeTotal($serverObj->getBlocksMostDestroyed())); ?> <?php echo(STRING_ALL_TIMES); ?>)</span>
</div>
<div id="subCategory"><?php echo(STRING_ALL_ITEMS); ?> &nbsp; &nbsp; <a href="?view=globalItems" id="smallLink"><?php echo(STRING_SERVER_LINK_GLOBAL_ITEMS_LIST); ?></a></div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_TOTAL_ITEMS_PICKEDUP); ?>:</span><span id="info"><?php echo($serverObj->getPickedUpTotal()); ?> <?php echo(STRING_ALL_ITEMS); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_MOST_POPULAR_ITEM_PICKEDUP); ?>:</span><span id="info"><?php echo(QueryUtils::getResourceNameById($serverObj->getMostPickedUp())); ?>
     - (<?php echo($serverObj->getPickedUpOfTypeTotal($serverObj->getMostPickedUp())); ?> <?php echo(STRING_ALL_TIMES); ?>)</span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_TOTAL_ITEMS_DROPPED); ?>:</span><span id="info"><?php echo($serverObj->getDroppedTotal()); ?> <?php echo(STRING_ALL_ITEMS); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_MOST_POPULAR_ITEM_DROPPED); ?>:</span><span id="info"><?php echo(QueryUtils::getResourceNameById($serverObj->getMostDropped())); ?>
     - (<?php echo($serverObj->getDroppedOfTypeTotal($serverObj->getMostDropped())); ?> <?php echo(STRING_ALL_TIMES); ?>)</span>
</div>
<div id="subCategory"><?php echo(STRING_ALL_KILLS); ?> &nbsp; &nbsp; <a href="?view=globalKills" id="smallLink"><?php echo(STRING_SERVER_LINK_GLOBAL_KILL_LIST); ?></a></div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_TOTAL_DEATHS); ?>:</span><span id="info"><?php echo($serverObj->getKillTable() ? count($serverObj->getKillTable()) : 0); ?></span>
</div>
<br />
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_SERVER_MOST_DANGEROUS_WEAPON); ?>:</span><span id="info"><?php echo(QueryUtils::getResourceNameById($serverObj->getMostDangerousWeapon())); ?>
    - (<?php echo ($serverObj->getKillTableUsing($serverObj->getMostDangerousWeapon()) ? count($serverObj->getKillTableUsing($serverObj->getMostDangerousWeapon())) : 0); ?> <?php echo(STRING_ALL_KILLS); ?>)</span>
</div>
<br />
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_PVP_KILLS); ?>:</span><span id="info"><?php echo($serverObj->getKillTablePVP() ? count ($serverObj->getKillTablePVP()) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_SERVER_MOST_DANGEROUS_PLAYER); ?>:</span><span id="info"><?php
    $player = $serverObj->getMostKillerPVP();
    if ($player) {
    	?>
    	<a id="onlinePlayer" href="?view=player&uuid=<?php echo($player->getUUID()); ?>"><?php echo($player->getName()); ?></a> - (<?php echo (count($player->getPlayerKillTableCreature(QueryUtils::getCreatureIdByName("Player")))); ?> <?php echo(STRING_ALL_PVP_KILLS); ?>)
    	<?php
    } else {
    	?>
    	<?php echo(STRING_ALL_NONE); ?>
    	<?php
    }
    ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_SERVER_MOST_SQUISHY_PLAYER); ?>:</span><span id="info"><?php
    $player = $serverObj->getMostKilledPVP();
    if ($player) {
    	?>
    	<a id="onlinePlayer" href="?view=player&uuid=<?php echo($player->getUUID()); ?>"><?php echo($player->getName()); ?></a> - (<?php echo (count($player->getPlayerDeathTableCreature(QueryUtils::getCreatureIdByName("Player")))); ?> <?php echo(STRING_ALL_PVP_DEATHS); ?>)
    	<?php
    } else {
    	?>
    	<?php echo(STRING_ALL_NONE); ?>
    	<?php
    }
    ?></span>
</div>
<br />
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_PVE_KILLS); ?>:</span><span id="info"><?php echo($serverObj->getKillTablePVE() ? count($serverObj->getKillTablePVE()) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_SERVER_MOST_DANGEROUS_CREATURE); ?>:</span><span id="info"><?php echo(QueryUtils::getCreatureNameById($serverObj->getMostDangerousPVECreature())); ?>
    - (<?php echo($serverObj->getMostDangerousPVECreature() ? count($serverObj->getKillTableCreature($serverObj->getMostDangerousPVECreature())) : 0); ?> <?php echo(STRING_ALL_KILLS); ?>)</span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_SERVER_MOST_KILLED_CREATURE); ?>:</span><span id="info"><?php echo(QueryUtils::getCreatureNameById($serverObj->getMostKilledPVECreature())); ?>
    - (<?php echo($serverObj->getMostKilledPVECreature() ? count($serverObj->getDeathTableCreature($serverObj->getMostKilledPVECreature())) : 0); ?> <?php echo(STRING_ALL_DEATHS); ?>)</span>
</div>
<br />
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_OTHER_TYPE_DEATHS); ?>:</span><span id="info"><?php echo($serverObj->getKillTableOther() ? count($serverObj->getKillTableOther()) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_FALLING_DEATHS); ?>:</span><span id="info"><?php echo($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Fall")) ? count($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Fall"))) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_DROWNING_DEATHS); ?>:</span><span id="info"><?php echo($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Drowning")) ? count($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Drowning"))) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_SUFFOCATING_DEATHS); ?>:</span><span id="info"><?php echo($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Suffocation")) ? count($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Suffocation"))) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_LIGHTENING_DEATHS); ?>:</span><span id="info"><?php echo($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Lightening")) ? count($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Lightening"))) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_LAVA_DEATHS); ?>:</span><span id="info"><?php echo($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Lava")) ? count($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Lava"))) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_FIRE_DEATHS); ?>:</span><span id="info"><?php echo($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Fire")) ? count($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Fire"))) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_FIRE_TICK_DEATHS); ?>:</span><span id="info"><?php echo($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Fire Tick")) ? count($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Fire Tick"))) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_EXPLOSION_DEATHS); ?>:</span><span id="info"><?php echo($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Entity Explosion")) ? count($serverObj->getKillTableType(QueryUtils::getKillTypeIdByName("Entity Explosion"))) : 0); ?></span>
</div>
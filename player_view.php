<?php
$_player = $serverObj->getPlayer($_GET['uuid']);
?>
<div id="subTitle"><?php echo($_player->getName()) ?> <?php echo(STRING_PLAYER_STATISTICS); ?></div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_PLAYER_JOIN_DATE); ?>:</span><span id="info"><?php echo(QueryUtils::formatDate($_player->getFirstLogin())); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_PLAYER_LAST_LOGON); ?>:</span><span id="info"><?php echo(QueryUtils::formatDate($_player->getLastLogin())); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_PLAYER_LIFETIME_LOGONS); ?>:</span><span id="info"><?php echo($_player->getNumberOfLogins()); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_PLAYER_TIME_PLAYED_TOTAL); ?>:</span><span id="info"><?php echo(QueryUtils::formatSecs($_player->getNumberOfSecondsLoggedOn())); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_PLAYER_CURRENTLY_ONLINE); ?> :</span><span id="info"><?php echo($_player->isOnline() ? STRING_ALL_YES : STRING_ALL_NO); ?></span>
</div>
<div id="subCategory"><?php echo(STRING_ALL_DISTANCES); ?></div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_TOTAL_TRAVEL_DISTANCE); ?>:</span><span id="info"><?php echo(QueryUtils::formatDistance($_player->getDistanceTraveledTotal())); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_TOTAL_FOOT_TRAVEL_DISTANCE); ?>:</span><span id="info"><?php echo(QueryUtils::formatDistance($_player->getDistanceTraveledByFoot())); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_TOTAL_MINECART_TRAVEL_DISTANCE); ?>:</span><span id="info"><?php echo(QueryUtils::formatDistance($_player->getDistanceTraveledByMinecart())); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_TOTAL_BOAT_TRAVEL_DISTANCE); ?>:</span><span id="info"><?php echo(QueryUtils::formatDistance($_player->getDistanceTraveledByBoat())); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_TOTAL_PIG_TRAVEL_DISTANCE); ?>:</span><span id="info"><?php echo(QueryUtils::formatDistance($_player->getDistanceTraveledByPig())); ?></span>
</div>
<div id="subCategory"><?php echo(STRING_ALL_BLOCKS); ?> &nbsp; &nbsp; <a href="?view=playerBlock&uuid=<?php echo($_player->getUUID()); ?>" id="smallLink"><?php echo(STRING_PLAYER_LINK_BLOCK_LIST); ?></a></div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_TOTAL_BLOCKS_PLACED); ?>:</span><span id="info"><?php echo($_player->getBlocksPlacedTotal()); ?> <?php echo(STRING_ALL_BLOCKS); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_MOST_POPULAR_BLOCK_PLACED); ?>:</span><span id="info"><?php echo(QueryUtils::getResourceNameById($_player->getBlocksMostPlaced())); ?>
     - (<?php echo($_player->getBlocksPlacedOfType($_player->getBlocksMostPlaced())); ?> <?php echo(STRING_ALL_TIMES); ?>)</span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_TOTAL_BLOCKS_DESTROYED); ?>:</span><span id="info"><?php echo($_player->getBlocksDestroyedTotal()); ?> <?php echo(STRING_ALL_BLOCKS); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_MOST_POPULAR_BLOCK_DESTROYED); ?>:</span><span id="info"><?php echo(QueryUtils::getResourceNameById($_player->getBlocksMostDestroyed())); ?>
     - (<?php echo($_player->getBlocksDestroyedOfType($_player->getBlocksMostDestroyed())); ?> <?php echo(STRING_ALL_TIMES); ?>)</span>
</div>
<div id="subCategory"><?php echo(STRING_ALL_ITEMS); ?> &nbsp; &nbsp; <a href="?view=playerItems&uuid=<?php echo($_player->getUUID()); ?>" id="smallLink"><?php echo(STRING_PLAYER_LINK_ITEMS_LIST); ?></a></div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_TOTAL_ITEMS_PICKEDUP); ?>:</span><span id="info"><?php echo($_player->getPickedUpTotal()); ?> <?php echo(STRING_ALL_ITEMS); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_MOST_POPULAR_ITEM_PICKEDUP); ?>:</span><span id="info"><?php echo(QueryUtils::getResourceNameById($_player->getMostPickedUp())); ?>
     - (<?php echo($_player->getPickedUpOfType($_player->getMostPickedUp())); ?> <?php echo(STRING_ALL_TIMES); ?>)</span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_TOTAL_ITEMS_DROPPED); ?>:</span><span id="info"><?php echo($_player->getDroppedTotal()); ?> <?php echo(STRING_ALL_ITEMS); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_MOST_POPULAR_ITEM_DROPPED); ?>:</span><span id="info"><?php echo(QueryUtils::getResourceNameById($_player->getMostDropped())); ?>
     - (<?php echo($_player->getDroppedOfType($_player->getMostDropped())); ?> <?php echo(STRING_ALL_TIMES); ?>)</span>
</div>
<div id="subCategory"><?php echo(STRING_ALL_KILLS); ?> &nbsp; &nbsp; <a href="?view=playerKills&uuid=<?php echo($_player->getUUID()); ?>" id="smallLink"><?php echo(STRING_PLAYER_LINK_KILL_DEATH_LIST); ?></a></div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_PLAYER_TOTAL_KILLS); ?>:</span><span id="info"><?php echo($_player->getPlayerKillTable() ? count($_player->getPlayerKillTable()) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_TOTAL_DEATHS); ?>:</span><span id="info"><?php echo($_player->getPlayerDeathTable() ? count($_player->getPlayerDeathTable()) : 0); ?></span>
</div>
<br />
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_PLAYER_MOST_DANGEROUS_WEAPON); ?>:</span><span id="info"><?php echo(QueryUtils::getResourceNameById($_player->getMostDangerousWeapon())); ?>
    - (<?php echo ($_player->getPlayerKillTableUsing($_player->getMostDangerousWeapon()) ? count($_player->getPlayerKillTableUsing($_player->getMostDangerousWeapon())) : 0); ?> <?php echo(STRING_ALL_KILLS); ?>)</span>
</div>
<br />
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_PVP_KILLS); ?>:</span><span id="info"><?php echo($_player->getPlayerKillTablePVP() ? count ($_player->getPlayerKillTablePVP()) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">P<?php echo(STRING_PLAYER_PVP_DEATHS); ?>:</span><span id="info"><?php echo($_player->getPlayerDeathTablePVP() ? count ($_player->getPlayerDeathTablePVP()) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_PLAYER_MOST_KILLED_PLAYER); ?>:</span><span id="info"><?php
    $player = $_player->getMostKilledPVP($serverObj);
    if ($player) {
    	?>
    	<a id="onlinePlayer" href="?view=player&uuid=<?php echo($player->getUUID()); ?>"><?php echo($player->getName()); ?></a> - (<?php echo (count($player->getPlayerDeathPVP($_player->getUUID()))); ?> <?php echo(STRING_ALL_KILLS); ?>)
    	<?php
    } else {
    	?>
    	<?php echo(STRING_ALL_NONE); ?>
    	<?php
    }
    ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_PLAYER_SWORN_ENEMY); ?>:</span><span id="info"><?php
    $player = $_player->getMostKilledByPVP($serverObj);
    if ($player) {
    	?>
    	<a id="onlinePlayer" href="?view=player&uuid=<?php echo($player->getUUID()); ?>"><?php echo($player->getName()); ?></a> - (<?php echo (count($player->getPlayerKillPVP($_player->getUUID()))); ?> <?php echo(STRING_PLAYER_DEATHS_BY); ?>)
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
    <span id="infoLabel"><?php echo(STRING_ALL_PVE_KILLS); ?>:</span><span id="info"><?php echo($_player->getPlayerKillTablePVE() ? count($_player->getPlayerKillTablePVE()) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_PLAYER_PVE_DEATHS); ?>:</span><span id="info"><?php echo($_player->getPlayerDeathTablePVE() ? count($_player->getPlayerDeathTablePVE()) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_PLAYER_MOST_KILLED_CREATURE); ?>:</span><span id="info"><?php echo(QueryUtils::getCreatureNameById($_player->getPlayerMostKilledPVECreature())); ?>
    - (<?php echo($_player->getPlayerMostKilledPVECreature() ? count($_player->getPlayerKillTableCreature($_player->getPlayerMostKilledPVECreature())) : 0); ?> <?php echo(STRING_ALL_KILLS); ?>)</span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_PLAYER_MOST_DANGEROUS_CREATURE); ?>:</span><span id="info"><?php echo(QueryUtils::getCreatureNameById($_player->getPlayerMostDangerousPVECreature())); ?>
    - (<?php echo($_player->getPlayerMostDangerousPVECreature() ? count($_player->getPlayerDeathTableCreature($_player->getPlayerMostDangerousPVECreature())) : 0); ?> <?php echo(STRING_PLAYER_DEATHS_BY); ?>)</span>
</div>
<br />
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_OTHER_TYPE_DEATHS); ?>:</span><span id="info"><?php echo($_player->getPlayerDeathTableOther() ? count($_player->getPlayerDeathTableOther()) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_FALLING_DEATHS); ?>:</span><span id="info"><?php echo($_player->getPlayerDeathTableType(QueryUtils::getKillTypeIdByName("Fall")) ? count($_player->getPlayerDeathTableType(QueryUtils::getKillTypeIdByName("Fall"))) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_DROWNING_DEATHS); ?>:</span><span id="info"><?php echo($_player->getPlayerDeathTableType(QueryUtils::getKillTypeIdByName("Drowning")) ? count($_player->getPlayerDeathTableType(QueryUtils::getKillTypeIdByName("Drowning"))) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_SUFFOCATING_DEATHS); ?>:</span><span id="info"><?php echo($_player->getPlayerDeathTableType(QueryUtils::getKillTypeIdByName("Suffocation")) ? count($_player->getPlayerDeathTableType(QueryUtils::getKillTypeIdByName("Suffocation"))) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_LIGHTENING_DEATHS); ?>:</span><span id="info"><?php echo($_player->getPlayerDeathTableType(QueryUtils::getKillTypeIdByName("Lightening")) ? count($_player->getPlayerDeathTableType(QueryUtils::getKillTypeIdByName("Lightening"))) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_LAVA_DEATHS); ?>:</span><span id="info"><?php echo($_player->getPlayerDeathTableType(QueryUtils::getKillTypeIdByName("Lava")) ? count($_player->getPlayerDeathTableType(QueryUtils::getKillTypeIdByName("Lava"))) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_FIRE_DEATHS); ?>:</span><span id="info"><?php echo($_player->getPlayerDeathTableType(QueryUtils::getKillTypeIdByName("Fire")) ? count($_player->getPlayerDeathTableType(QueryUtils::getKillTypeIdByName("Fire"))) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_FIRE_TICK_DEATHS); ?>:</span><span id="info"><?php echo($_player->getPlayerDeathTableType(QueryUtils::getKillTypeIdByName("Fire Tick")) ? count($_player->getPlayerDeathTableType(QueryUtils::getKillTypeIdByName("Fire Tick"))) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel"><?php echo(STRING_ALL_EXPLOSION_DEATHS); ?>:</span><span id="info"><?php echo($_player->getPlayerDeathTableType(QueryUtils::getKillTypeIdByName("Entity Explosion")) ? count($_player->getPlayerDeathTableType(QueryUtils::getKillTypeIdByName("Entity Explosion"))) : 0); ?></span>
</div>
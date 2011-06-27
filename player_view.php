<?php
$_player = $serverObj->getPlayer($_GET['uuid']);
?>
<div id="subTitle"><?php echo($_player->getName()) ?>'s Statistics</div>
<div id="infoLine">
    <span id="infoLabel">Join Date:</span><span id="info"><?php echo(QueryUtils::formatDate($_player->getFirstLogin())); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Last Logon:</span><span id="info"><?php echo(QueryUtils::formatDate($_player->getLastLogin())); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Lifetime Number of Logins:</span><span id="info"><?php echo($_player->getNumberOfLogins()); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Time Played Total:</span><span id="info"><?php echo(QueryUtils::formatSecs($_player->getNumberOfSecondsLoggedOn())); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Currently Logged In? :</span><span id="info"><?php echo($_player->isOnline() ? "Yes" : "No"); ?></span>
</div>
<div id="subCategory">Distances</div>
<div id="infoLine">
    <span id="infoLabel">Total Travel Distance:</span><span id="info"><?php echo($_player->getDistanceTraveledTotal()); ?> meters</span>
</div>
<div id="infoLine">
    <span id="infoLabel">Total Foot Travel Distance:</span><span id="info"><?php echo($_player->getDistanceTraveledByFoot()); ?> meters</span>
</div>
<div id="infoLine">
    <span id="infoLabel">Total Minecart Travel Distance:</span><span id="info"><?php echo($_player->getDistanceTraveledByMinecart()); ?> meters</span>
</div>
<div id="infoLine">
    <span id="infoLabel">Total Boat Travel Distance:</span><span id="info"><?php echo($_player->getDistanceTraveledByBoat()); ?> meters</span>
</div>
<div id="infoLine">
    <span id="infoLabel">Total Pig Travel Distance:</span><span id="info"><?php echo($_player->getDistanceTraveledByPig()); ?> meters</span>
</div>
<div id="subCategory">Blocks &nbsp; &nbsp; <a href="?view=playerBlock&uuid=<?php echo($_player->getUUID()); ?>" id="smallLink">(View Detailed Block List)</a></div>
<div id="infoLine">
    <span id="infoLabel">Total Blocks Placed:</span><span id="info"><?php echo($_player->getBlocksPlacedTotal()); ?> blocks</span>
</div>
<div id="infoLine">
    <span id="infoLabel">Most Popular Block Placed:</span><span id="info"><?php echo(QueryUtils::getResourceNameById($_player->getBlocksMostPlaced())); ?>
     - (<?php echo($_player->getBlocksPlacedOfType($_player->getBlocksMostPlaced())); ?> times)</span>
</div>
<div id="infoLine">
    <span id="infoLabel">Total Blocks Destroyed:</span><span id="info"><?php echo($_player->getBlocksDestroyedTotal()); ?> blocks</span>
</div>
<div id="infoLine">
    <span id="infoLabel">Most Popular Block Destroyed:</span><span id="info"><?php echo(QueryUtils::getResourceNameById($_player->getBlocksMostDestroyed())); ?>
     - (<?php echo($_player->getBlocksDestroyedOfType($_player->getBlocksMostDestroyed())); ?> times)</span>
</div>
<div id="subCategory">Items &nbsp; &nbsp; <a href="?view=playerItems&uuid=<?php echo($_player->getUUID()); ?>" id="smallLink">(View Detailed Items List)</a></div>
<div id="infoLine">
    <span id="infoLabel">Total Items Picked Up:</span><span id="info"><?php echo($_player->getPickedUpTotal()); ?> items</span>
</div>
<div id="infoLine">
    <span id="infoLabel">Most Popular Item Picked Up:</span><span id="info"><?php echo(QueryUtils::getResourceNameById($_player->getMostPickedUp())); ?>
     - (<?php echo($_player->getPickedUpOfType($_player->getMostPickedUp())); ?> times)</span>
</div>
<div id="infoLine">
    <span id="infoLabel">Total Items Dropped:</span><span id="info"><?php echo($_player->getDroppedTotal()); ?> items</span>
</div>
<div id="infoLine">
    <span id="infoLabel">Most Popular Item Dropped:</span><span id="info"><?php echo(QueryUtils::getResourceNameById($_player->getMostDropped())); ?>
     - (<?php echo($_player->getDroppedOfType($_player->getMostDropped())); ?> times)</span>
</div>
<div id="subCategory">Kills &nbsp; &nbsp; <a href="?view=playerKills&uuid=<?php echo($_player->getUUID()); ?>" id="smallLink">(View Detailed Kill/Death List)</a></div>
<div id="infoLine">
    <span id="infoLabel">Total Kills:</span><span id="info"><?php echo($_player->getPlayerKillTable() ? count($_player->getPlayerKillTable()) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Total Deaths:</span><span id="info"><?php echo($_player->getPlayerDeathTable() ? count($_player->getPlayerDeathTable()) : 0); ?></span>
</div>
<br />
<div id="infoLine">
    <span id="infoLabel">Most Dangerous Weapon:</span><span id="info"><?php echo(QueryUtils::getResourceNameById($_player->getMostDangerousWeapon())); ?> 
    - (<?php echo ($_player->getPlayerKillTableUsing($_player->getMostDangerousWeapon()) ? count($_player->getPlayerKillTableUsing($_player->getMostDangerousWeapon())) : 0); ?> kills)</span>
</div>
<br />
<div id="infoLine">
    <span id="infoLabel">PVP Kills:</span><span id="info"><?php echo($_player->getPlayerKillTablePVP() ? count ($_player->getPlayerKillTablePVP()) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">PVP Deaths:</span><span id="info"><?php echo($_player->getPlayerDeathTablePVP() ? count ($_player->getPlayerDeathTablePVP()) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Most Killed Player:</span><span id="info"><?php 
    $player = $_player->getMostKilledPVP($serverObj);
    if ($player) {
    	?>
    	<a id="onlinePlayer" href="?view=player&uuid=<?php echo($player->getUUID()); ?>"><?php echo($player->getName()); ?></a> - (<?php echo (count($player->getPlayerDeathPVP($_player->getUUID()))); ?> kills)
    	<?php
    } else {
    	?>
    	None
    	<?php
    }
    ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Sworn Enemy:</span><span id="info"><?php 
    $player = $_player->getMostKilledByPVP($serverObj);
    if ($player) {
    	?>
    	<a id="onlinePlayer" href="?view=player&uuid=<?php echo($player->getUUID()); ?>"><?php echo($player->getName()); ?></a> - (<?php echo (count($player->getPlayerKillPVP($_player->getUUID()))); ?> deaths by)
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
    <span id="infoLabel">PVE Kills:</span><span id="info"><?php echo($_player->getPlayerKillTablePVE() ? count($_player->getPlayerKillTablePVE()) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">PVE Deaths:</span><span id="info"><?php echo($_player->getPlayerDeathTablePVE() ? count($_player->getPlayerDeathTablePVE()) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Most Killed Creature:</span><span id="info"><?php echo(QueryUtils::getCreatureNameById($_player->getPlayerMostKilledPVECreature())); ?>
    - (<?php echo($_player->getPlayerMostKilledPVECreature() ? count($_player->getPlayerKillTableCreature($_player->getPlayerMostKilledPVECreature())) : 0); ?> kills)</span>
</div>
<div id="infoLine">
    <span id="infoLabel">Most Dangerous Creature:</span><span id="info"><?php echo(QueryUtils::getCreatureNameById($_player->getPlayerMostDangerousPVECreature())); ?>
    - (<?php echo($_player->getPlayerMostDangerousPVECreature() ? count($_player->getPlayerDeathTableCreature($_player->getPlayerMostDangerousPVECreature())) : 0); ?> deaths by)</span>
</div>
<br />
<div id="infoLine">
    <span id="infoLabel">Other Type Deaths:</span><span id="info"><?php echo($_player->getPlayerDeathTableOther() ? count($_player->getPlayerDeathTableOther()) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Falling Deaths:</span><span id="info"><?php echo($_player->getPlayerDeathTableType(QueryUtils::getKillTypeIdByName("Fall")) ? count($_player->getPlayerDeathTableType(QueryUtils::getKillTypeIdByName("Fall"))) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Drowning Deaths:</span><span id="info"><?php echo($_player->getPlayerDeathTableType(QueryUtils::getKillTypeIdByName("Drowning")) ? count($_player->getPlayerDeathTableType(QueryUtils::getKillTypeIdByName("Drowning"))) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Suffocating Deaths:</span><span id="info"><?php echo($_player->getPlayerDeathTableType(QueryUtils::getKillTypeIdByName("Suffocating")) ? count($_player->getPlayerDeathTableType(QueryUtils::getKillTypeIdByName("Suffocating"))) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Lightening Deaths:</span><span id="info"><?php echo($_player->getPlayerDeathTableType(QueryUtils::getKillTypeIdByName("Lightening")) ? count($_player->getPlayerDeathTableType(QueryUtils::getKillTypeIdByName("Lightening"))) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Lava Deaths:</span><span id="info"><?php echo($_player->getPlayerDeathTableType(QueryUtils::getKillTypeIdByName("Lava")) ? count($_player->getPlayerDeathTableType(QueryUtils::getKillTypeIdByName("Lava"))) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Fire Deaths:</span><span id="info"><?php echo($_player->getPlayerDeathTableType(QueryUtils::getKillTypeIdByName("Fire")) ? count($_player->getPlayerDeathTableType(QueryUtils::getKillTypeIdByName("Fire"))) : 0); ?></span>
</div>
<div id="infoLine">
    <span id="infoLabel">Fire Tick Deaths:</span><span id="info"><?php echo($_player->getPlayerDeathTableType(QueryUtils::getKillTypeIdByName("Fire Tick")) ? count($_player->getPlayerDeathTableType(QueryUtils::getKillTypeIdByName("Fire Tick"))) : 0); ?></span>
</div>
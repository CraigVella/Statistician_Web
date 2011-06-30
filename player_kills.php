<?php
$_player = $serverObj->getPlayer($_GET['uuid']);
?>
<div id="subTitle"><?php echo($_player->getName()); ?> <?php echo(STRING_ALL_KILLS); ?>/<?php echo(STRING_ALL_DEATHS); ?></div>
<a name="pvpKills">
	<div id="subCategory"><?php echo(STRING_ALL_PVP_KILLS); ?>/<?php echo(STRING_ALL_DEATHS); ?></div>
</a>
	<table>
		<tr>
		 <th></th></th><th><?php echo(STRING_ALL_KILLER); ?></th><th><?php echo(STRING_ALL_WEAPON); ?></th><th><?php echo(STRING_ALL_VICTIM); ?></th><th><?php echo(STRING_ALL_KILLTIME); ?></th>
		</tr>
		<?php
		
		$thisTablePNGet = 'pvpPN';
		$thisTablePNAN = 'pvpKills';
		
		$tableFull = $_player->getPlayerKillDeathTablePVP();
		
		$pageNumber = 1;
		if (isset($_GET[$thisTablePNGet])) {
			$pageNumber = $_GET[$thisTablePNGet];
		}
		
		$numPages = 1;
		$numPages = floor(count($tableFull) / 50);
		
		$rowNum = 50 * ($pageNumber - 1);
		
		$pvpTable = $_player->getPlayerKillDeathTablePVP(true,$rowNum,50);
		
		if ($pvpTable == null)
			$pvpTable = array();
		
		foreach ($pvpTable as $pvpRow) {
			$killer = $serverObj->getPlayer($pvpRow['killed_by_uuid']);
			$victim = $serverObj->getPlayer($pvpRow['killed_uuid']);
			
			$rowIDHash = "killRow";
			if ($killer->getUUID() == $_player->getUUID())
				$rowIDHash = "deathRow";
			
			$rowNum++;
			
			?>
			
			<tr id="<?php echo($rowIDHash); ?>">
			 <td><?php echo($rowNum); ?>.</td>
			 <td><a href="?view=player&uuid=<?php echo($killer->getUUID()); ?>"><?php echo($killer->getName()); ?></a></td>
			 <td><?php echo(QueryUtils::getResourceNameById($pvpRow['killed_using'])); ?></td>
			 <td><a href="?view=player&uuid=<?php echo($victim->getUUID()); ?>"><?php echo($victim->getName()); ?></a></td>
			 <td><?php echo(QueryUtils::formatDate($pvpRow['time'])); ?></td>
			</tr>
			
			<?php
		}
		?>
	</table>
	<?php
		if ($numPages > 1) {
		// Allow User to Go To Next Page
		?>
		<span id="pageSelector">
		<?php if ($pageNumber > 1) { ?> <a href="./?view=playerKills&uuid=<?php echo($_player->getUUID()); ?>&<?php echo($thisTablePNGet); ?>=<?php echo($pageNumber - 1); ?>#<?php echo($thisTablePNAN); ?>"><< <?php echo(STRING_ALL_PREVIOUS); ?></a> <?php } ?>
		<?php if ($pageNumber > 1) {
			for ($x = 3; $x >= 1; --$x) {
				$jumpToPage = $pageNumber - $x;
				if ($jumpToPage >= 1) {
				?>
					<a href="./?view=playerKills&uuid=<?php echo($_player->getUUID()); ?>&<?php echo($thisTablePNGet); ?>=<?php echo($jumpToPage); ?>#<?php echo($thisTablePNAN); ?>"><?php echo($jumpToPage); ?></a>
				<?php
				}
			}
		}
		?>
		<font id="pageSelector_CurrentPage"><?php echo($pageNumber); ?></font>
		<?php 
		if ($pageNumber < $numPages) {
			for ($x = 1; $x <= 3; ++$x) {
				$jumpToPage = $pageNumber + $x;
				if ($jumpToPage <= $numPages) {
				?>
					<a href="./?view=playerKills&uuid=<?php echo($_player->getUUID()); ?>&<?php echo($thisTablePNGet); ?>=<?php echo($jumpToPage); ?>#<?php echo($thisTablePNAN); ?>"><?php echo($jumpToPage); ?></a>
				<?php
				}
			}
		}
		if ($pageNumber != $numPages) {
		?>
		<a href="./?view=playerKills&uuid=<?php echo($_player->getUUID()); ?>&<?php echo($thisTablePNGet); ?>=<?php echo($pageNumber + 1); ?>#<?php echo($thisTablePNAN); ?>"><?php echo(STRING_ALL_NEXT); ?> >></a>
		<?php
		}
		?>
		</span>
		<?php
		} 
		?>

<a name="pveKills">
	<div id="subCategory"><?php echo(STRING_ALL_PVE_KILLS); ?>/<?php echo(STRING_ALL_DEATHS); ?></div>
</a>

	<table>
		<tr>
		 <th></th></th><th><?php echo(STRING_ALL_KILLER); ?></th><th><?php echo(STRING_ALL_WEAPON); ?></th><th><?php echo(STRING_ALL_VICTIM); ?></th><th><?php echo(STRING_ALL_KILLTIME); ?></th>
		</tr>
		<?php
		
		$tableFull = $_player->getPlayerKillDeathTablePVE();
		
		$thisTablePNGet = 'pvePN';
		$thisTablePNAN = 'pveKills';
		
		$pageNumber = 1;
		if (isset($_GET[$thisTablePNGet])) {
			$pageNumber = $_GET[$thisTablePNGet];
		}
		
		$numPages = 1;
		$numPages += floor(count($tableFull) / 50);
		
		$rowNum = 50 * ($pageNumber - 1);
		
		$table = $_player->getPlayerKillDeathTablePVE(true, $rowNum ,50);
		
		if ($table == null)
			$table = array();
		
		$playerID = QueryUtils::getCreatureIdByName("Player");
		
		foreach ($table as $row) {
		
			$rowIDHash = "killRow";
			
			if ($row['killed_by'] == $playerID) {
				$killer = $serverObj->getPlayer($row['killed_by_uuid']);
				if ($killer->getUUID() == $_player->getUUID())
					$rowIDHash = "deathRow";
			} else {
				$killer = QueryUtils::getCreatureNameById($row['killed_by']);
			}
			
			if ($row['killed'] == $playerID) {
				$victim = $serverObj->getPlayer($row['killed_uuid']);
			} else {
				$victim = QueryUtils::getCreatureNameById($row['killed']);
			}
			
			
			$rowNum++;
			
			?>
			
			<tr id="<?php echo($rowIDHash); ?>">
			 <td><?php echo($rowNum); ?>.</td>
			 <?php
			 if (@get_class($killer) == "PLAYER") {
			 ?>
			 <td><a href="?view=player&uuid=<?php echo($killer->getUUID()); ?>"><?php echo($killer->getName()); ?></a></td>
			 <?php
			 } else {
			 ?>
			 <td><?php echo($killer); ?></td>
			 <?php
			 }
			 ?>
			 <td><?php echo(QueryUtils::getResourceNameById($row['killed_using'])); ?></td>
			 <?php
			 if (@get_class($victim) == "PLAYER") {
			 ?>
			 <td><a href="?view=player&uuid=<?php echo($victim->getUUID()); ?>"><?php echo($victim->getName()); ?></a></td>
			 <?php
			 } else {
			 ?>
			 <td><?php echo($victim); ?></td>
			 <?php
			 }
			 ?>
			 <td><?php echo(QueryUtils::formatDate($row['time'])); ?></td>
			</tr>
			
			<?php
		}
		?>
	</table>
	
		<?php
		if ($numPages > 1) {
		// Allow User to Go To Next Page
		?>
		<span id="pageSelector">
		<?php if ($pageNumber > 1) { ?> <a href="./?view=playerKills&uuid=<?php echo($_player->getUUID()); ?>&<?php echo($thisTablePNGet); ?>=<?php echo($pageNumber - 1); ?>#<?php echo($thisTablePNAN); ?>"><< <?php echo(STRING_ALL_PREVIOUS); ?></a> <?php } ?>
		<?php if ($pageNumber > 1) {
			for ($x = 3; $x >= 1; --$x) {
				$jumpToPage = $pageNumber - $x;
				if ($jumpToPage >= 1) {
				?>
					<a href="./?view=playerKills&uuid=<?php echo($_player->getUUID()); ?>&<?php echo($thisTablePNGet); ?>=<?php echo($jumpToPage); ?>#<?php echo($thisTablePNAN); ?>"><?php echo($jumpToPage); ?></a>
				<?php
				}
			}
		}
		?>
		<font id="pageSelector_CurrentPage"><?php echo($pageNumber); ?></font>
		<?php 
		if ($pageNumber < $numPages) {
			for ($x = 1; $x <= 3; ++$x) {
				$jumpToPage = $pageNumber + $x;
				if ($jumpToPage <= $numPages) {
				?>
					<a href="./?view=playerKills&uuid=<?php echo($_player->getUUID()); ?>&<?php echo($thisTablePNGet); ?>=<?php echo($jumpToPage); ?>#<?php echo($thisTablePNAN); ?>"><?php echo($jumpToPage); ?></a>
				<?php
				}
			}
		}
		if ($pageNumber != $numPages) {
		?>
		<a href="./?view=playerKills&uuid=<?php echo($_player->getUUID()); ?>&<?php echo($thisTablePNGet); ?>=<?php echo($pageNumber + 1); ?>#<?php echo($thisTablePNAN); ?>"><?php echo(STRING_ALL_NEXT); ?> >></a>
		<?php
		}
		?>
		</span>
		<?php
		} 
		?>

<a name="otherDeaths">
	<div id="subCategory"><?php echo(STRING_ALL_OTHER_DEATHS); ?></div>
</a>

	<table>
		<tr>
		 <th></th></th><th><?php echo(STRING_ALL_VICTIM); ?></th><th><?php echo(STRING_ALL_REASON); ?></th><th><?php echo(STRING_ALL_KILLTIME); ?></th>
		</tr>
		<?php
		
		$thisTablePNGet = 'otherPN';
		$thisTablePNAN = 'otherDeaths';
		
		$tableFull = $_player->getPlayerDeathTableOther();
		
		$pageNumber = 1;
		if (isset($_GET[$thisTablePNGet])) {
			$pageNumber = $_GET[$thisTablePNGet];
		}
		
		$numPages = 1;
		$numPages = floor(count($tableFull) / 50);
		
		$rowNum = 50 * ($pageNumber - 1);
		
		$table = $_player->getPlayerDeathTableOther(true,$rowNum,50);
		
		if ($table == null)
			$table = array();
		
		foreach ($table as $row) {
			
			$victim = $serverObj->getPlayer($row['killed_uuid']);

			$deathType = QueryUtils::getKillTypeNameById($row['kill_type']);
			
			$rowNum++;
			
			?>
			
			<tr>
			 <td><?php echo($rowNum); ?>.</td>
			 <td><a href="?view=player&uuid=<?php echo($victim->getUUID()); ?>"><?php echo($victim->getName()); ?></a></td>
			 <td><?php echo($deathType); ?></td>
			 <td><?php echo(QueryUtils::formatDate($row['time'])); ?></td>
			</tr>
			
			<?php
		}
		?>
	</table>
	<?php
		if ($numPages > 1) {
		// Allow User to Go To Next Page
		?>
		<span id="pageSelector">
		<?php if ($pageNumber > 1) { ?> <a href="./?view=playerKills&uuid=<?php echo($_player->getUUID()); ?>&<?php echo($thisTablePNGet); ?>=<?php echo($pageNumber - 1); ?>#<?php echo($thisTablePNAN); ?>"><< <?php echo(STRING_ALL_PREVIOUS); ?></a> <?php } ?>
		<?php if ($pageNumber > 1) {
			for ($x = 3; $x >= 1; --$x) {
				$jumpToPage = $pageNumber - $x;
				if ($jumpToPage >= 1) {
				?>
					<a href="./?view=playerKills&uuid=<?php echo($_player->getUUID()); ?>&<?php echo($thisTablePNGet); ?>=<?php echo($jumpToPage); ?>#<?php echo($thisTablePNAN); ?>"><?php echo($jumpToPage); ?></a>
				<?php
				}
			}
		}
		?>
		<font id="pageSelector_CurrentPage"><?php echo($pageNumber); ?></font>
		<?php 
		if ($pageNumber < $numPages) {
			for ($x = 1; $x <= 3; ++$x) {
				$jumpToPage = $pageNumber + $x;
				if ($jumpToPage <= $numPages) {
				?>
					<a href="./?view=playerKills&uuid=<?php echo($_player->getUUID()); ?>&<?php echo($thisTablePNGet); ?>=<?php echo($jumpToPage); ?>#<?php echo($thisTablePNAN); ?>"><?php echo($jumpToPage); ?></a>
				<?php
				}
			}
		}
		if ($pageNumber != $numPages) {
		?>
		<a href="./?view=playerKills&uuid=<?php echo($_player->getUUID()); ?>&<?php echo($thisTablePNGet); ?>=<?php echo($pageNumber + 1); ?>#<?php echo($thisTablePNAN); ?>"><?php echo(STRING_ALL_NEXT); ?> >></a>
		<?php
		}
		?>
		</span>
		<?php
		} 
		?>
	
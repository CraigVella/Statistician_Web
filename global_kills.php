<div id="subTitle">Global Kills</div>
<a name="pvpKills">
	<div id="subCategory">PVP Kills</div>
</a>
	<table>
		<tr>
		 <th></th></th><th>Killer</th><th>Weapon</th><th>Victim</th><th>Kill Time</th>
		</tr>
		<?php
		
		$thisTablePNGet = 'pvpPN';
		$thisTablePNAN = 'pvpKills';
		
		$tableFull = $serverObj->getKillTablePVP();
		
		$pageNumber = 1;
		if (isset($_GET[$thisTablePNGet])) {
			$pageNumber = $_GET[$thisTablePNGet];
		}
		
		$numPages = 1;
		$numPages = floor(count($tableFull) / 50);
		
		$rowNum = 50 * ($pageNumber - 1);
		
		$pvpTable = $serverObj->getKillTablePVP(true,$rowNum,50);
		
		if ($pvpTable == null)
			$pvpTable = array();
		
		foreach ($pvpTable as $pvpRow) {
			$killer = $serverObj->getPlayer($pvpRow['killed_by_uuid']);
			$victim = $serverObj->getPlayer($pvpRow['killed_uuid']);
			
			$rowNum++;
			
			?>
			
			<tr>
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
		<?php if ($pageNumber > 1) { ?> <a href="./?view=globalKills&<?php echo($thisTablePNGet); ?>=<?php echo($pageNumber - 1); ?>#<?php echo($thisTablePNAN); ?>"><< Prev</a> <?php } ?>
		<?php if ($pageNumber > 1) {
			for ($x = 3; $x >= 1; --$x) {
				$jumpToPage = $pageNumber - $x;
				if ($jumpToPage >= 1) {
				?>
					<a href="./?view=globalKills&<?php echo($thisTablePNGet); ?>=<?php echo($jumpToPage); ?>#<?php echo($thisTablePNAN); ?>"><?php echo($jumpToPage); ?></a>
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
					<a href="./?view=globalKills&<?php echo($thisTablePNGet); ?>=<?php echo($jumpToPage); ?>#<?php echo($thisTablePNAN); ?>"><?php echo($jumpToPage); ?></a>
				<?php
				}
			}
		}
		if ($pageNumber != $numPages) {
		?>
		<a href="./?view=globalKills&<?php echo($thisTablePNGet); ?>=<?php echo($pageNumber + 1); ?>#<?php echo($thisTablePNAN); ?>">Next >></a>
		<?php
		}
		?>
		</span>
		<?php
		} 
		?>
	
<a name="pveKills">
	<div id="subCategory">PVE Kills</div>
</a>

	<table>
		<tr>
		 <th></th></th><th>Killer</th><th>Weapon</th><th>Victim</th><th>Kill Time</th>
		</tr>
		<?php
		
		$tableFull = $serverObj->getKillTablePVE();
		
		$thisTablePNGet = 'pvePN';
		$thisTablePNAN = 'pveKills';
		
		$pageNumber = 1;
		if (isset($_GET[$thisTablePNGet])) {
			$pageNumber = $_GET[$thisTablePNGet];
		}
		
		$numPages = 1;
		$numPages += floor(count($tableFull) / 50);
		
		$rowNum = 50 * ($pageNumber - 1);
		
		$table = $serverObj->getKillTablePVE(true, $rowNum ,50);
		
		if ($table == null)
			$table = array();
		
		$playerID = QueryUtils::getCreatureIdByName("Player");
		
		foreach ($table as $row) {
			
			if ($row['killed_by'] == $playerID) {
				$killer = $serverObj->getPlayer($row['killed_by_uuid']);
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
			
			<tr>
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
		<?php if ($pageNumber > 1) { ?> <a href="./?view=globalKills&<?php echo($thisTablePNGet); ?>=<?php echo($pageNumber - 1); ?>#<?php echo($thisTablePNAN); ?>"><< Prev</a> <?php } ?>
		<?php if ($pageNumber > 1) {
			for ($x = 3; $x >= 1; --$x) {
				$jumpToPage = $pageNumber - $x;
				if ($jumpToPage >= 1) {
				?>
					<a href="./?view=globalKills&<?php echo($thisTablePNGet); ?>=<?php echo($jumpToPage); ?>#<?php echo($thisTablePNAN); ?>"><?php echo($jumpToPage); ?></a>
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
					<a href="./?view=globalKills&<?php echo($thisTablePNGet); ?>=<?php echo($jumpToPage); ?>#<?php echo($thisTablePNAN); ?>"><?php echo($jumpToPage); ?></a>
				<?php
				}
			}
		}
		if ($pageNumber != $numPages) {
		?>
		<a href="./?view=globalKills&<?php echo($thisTablePNGet); ?>=<?php echo($pageNumber + 1); ?>#<?php echo($thisTablePNAN); ?>">Next >></a>
		<?php
		}
		?>
		</span>
		<?php
		} 
		?>

<a name="otherDeaths">
	<div id="subCategory">Other Deaths</div>
</a>

	<table>
		<tr>
		 <th></th></th><th>Victim</th><th>Reason</th><th>Kill Time</th>
		</tr>
		<?php
		
		$thisTablePNGet = 'otherPN';
		$thisTablePNAN = 'otherDeaths';
		
		$tableFull = $serverObj->getKillTableOther();
		
		$pageNumber = 1;
		if (isset($_GET[$thisTablePNGet])) {
			$pageNumber = $_GET[$thisTablePNGet];
		}
		
		$numPages = 1;
		$numPages = floor(count($tableFull) / 50);
		
		$rowNum = 50 * ($pageNumber - 1);
		
		$table = $serverObj->getKillTableOther(true,$rowNum,50);
		
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
		<?php if ($pageNumber > 1) { ?> <a href="./?view=globalKills&<?php echo($thisTablePNGet); ?>=<?php echo($pageNumber - 1); ?>#<?php echo($thisTablePNAN); ?>"><< Prev</a> <?php } ?>
		<?php if ($pageNumber > 1) {
			for ($x = 3; $x >= 1; --$x) {
				$jumpToPage = $pageNumber - $x;
				if ($jumpToPage >= 1) {
				?>
					<a href="./?view=globalKills&<?php echo($thisTablePNGet); ?>=<?php echo($jumpToPage); ?>#<?php echo($thisTablePNAN); ?>"><?php echo($jumpToPage); ?></a>
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
					<a href="./?view=globalKills&<?php echo($thisTablePNGet); ?>=<?php echo($jumpToPage); ?>#<?php echo($thisTablePNAN); ?>"><?php echo($jumpToPage); ?></a>
				<?php
				}
			}
		}
		if ($pageNumber != $numPages) {
		?>
		<a href="./?view=globalKills&<?php echo($thisTablePNGet); ?>=<?php echo($pageNumber + 1); ?>#<?php echo($thisTablePNAN); ?>">Next >></a>
		<?php
		}
		?>
		</span>
		<?php
		} 
		?>

	
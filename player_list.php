<a name="playerList">
	<div id="subTitle"><?php echo(STRING_SERVER_GLOBAL_ALL_REGISTERED_PLAYERS); ?></div>
</a>
<table>
 <th></th><th><?php echo(STRING_ALL_NAME); ?></th><th><?php echo(STRING_PLAYER_LAST_LOGON); ?></th><th><?php echo(STRING_PLAYER_JOIN_DATE); ?></th>
 <?php
 	$thisTablePNGet = 'playersPN';
	$thisTablePNAN = 'playerList';
	
	$tableFull = $serverObj->getPlayersTable();
	
	$pageNumber = 1;
	if (isset($_GET[$thisTablePNGet])) {
		$pageNumber = $_GET[$thisTablePNGet];
	}
	
	$numPages = 1;
	$numPages = count($tableFull) / 50;
	
	$rowNum = 50 * ($pageNumber - 1);
	
	$table = $serverObj->getPlayersTable(true,$rowNum,50);
	
	foreach ($table as $row) {
		
		$player = $serverObj->getPlayer($row['uuid']);
		$rowNum++;
 ?>
 <tr>
 	 <td><?php echo($rowNum); ?></td>
	 <td><a href="?view=player&uuid=<?php echo($player->getUUID()); ?>"><?php echo($player->getName()); ?></a></td>
	 <td><?php echo(QueryUtils::formatDate($player->getLastLogin())); ?></td>
	 <td><?php echo(QueryUtils::formatDate($player->getFirstLogin())); ?></td>
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
		<?php if ($pageNumber > 1) { ?> <a href="./?view=playerList&<?php echo($thisTablePNGet); ?>=<?php echo($pageNumber - 1); ?>#<?php echo($thisTablePNAN); ?>"><< <?php echo(STRING_ALL_PREVIOUS); ?></a> <?php } ?>
		<?php if ($pageNumber > 1) {
			for ($x = 3; $x >= 1; --$x) {
				$jumpToPage = $pageNumber - $x;
				if ($jumpToPage >= 1) {
				?>
					<a href="./?view=playerList&<?php echo($thisTablePNGet); ?>=<?php echo($jumpToPage); ?>#<?php echo($thisTablePNAN); ?>"><?php echo($jumpToPage); ?></a>
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
					<a href="./?view=playerList&<?php echo($thisTablePNGet); ?>=<?php echo($jumpToPage); ?>#<?php echo($thisTablePNAN); ?>"><?php echo($jumpToPage); ?></a>
				<?php
				}
			}
		}
		if ($pageNumber != $numPages) {
		?>
		<a href="./?view=playerList&<?php echo($thisTablePNGet); ?>=<?php echo($pageNumber + 1); ?>#<?php echo($thisTablePNAN); ?>"><?php echo(STRING_ALL_NEXT); ?> >></a>
		<?php
		}
		?>
		</span>
		<?php
		} 
		?>
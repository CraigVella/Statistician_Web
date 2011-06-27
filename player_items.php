<?php
$_player = $serverObj->getPlayer($_GET['uuid']);
?>
<div id="subTitle"><?php echo($_player->getName()); ?> Item Statistics</div>
<table>
	<th>Block Type</th><th>Picked Up</th><th>Dropped</th>
	<?php
	$allResource = QueryUtils::getResourceTable();
	foreach($allResource as $resource) {
		$puAmnt = $_player->getPickedUpOfType($resource['resource_id']);
		$dAmnt = $_player->getDroppedOfType($resource['resource_id']);
		if ($puAmnt == 0 && $dAmnt == 0) continue;
		?>
		<tr>
			<td><?php echo($resource['description']); ?></td>
			<td><?php echo($puAmnt); ?></td>
			<td><?php echo($dAmnt); ?></td>
		</tr>
		<?php
	}
	?>
</table>
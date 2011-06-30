<?php
$_player = $serverObj->getPlayer($_GET['uuid']);
?>
<div id="subTitle"><?php echo($_player->getName()); ?> <?php echo(STRING_PLAYER_BLOCK_STATISTICS); ?></div>
<table>
	<th><?php echo(STRING_ALL_BLOCK_TYPE); ?></th><th><?php echo(STRING_ALL_DESTROYED); ?></th><th><?php echo(STRING_ALL_PLACED); ?></th>
	<?php
	$allResource = QueryUtils::getResourceTable();
	foreach($allResource as $resource) {
		$placedAmnt = $_player->getBlocksPlacedOfType($resource['resource_id']);
		$destroyedAmnt = $_player->getBlocksDestroyedOfType($resource['resource_id']);
		if ($placedAmnt == 0 && $destroyedAmnt == 0) continue;
		?>
		<tr>
			<td><?php echo($resource['description']); ?></td>
			<td><?php echo($destroyedAmnt); ?></td>
			<td><?php echo($placedAmnt); ?></td>
		</tr>
		<?php
	}
	?>
</table>
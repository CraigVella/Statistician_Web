<div id="subTitle">Global Block Statistics</div>
<table>
	<th>Block Type</th><th>Destroyed</th><th>Placed</th>
	<?php
	$allResource = QueryUtils::getResourceTable();
	foreach($allResource as $resource) {
		$placedAmnt = $serverObj->getBlocksPlacedOfTypeTotal($resource['resource_id']);
		$destroyedAmnt = $serverObj->getBlocksDestroyedOfTypeTotal($resource['resource_id']);
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
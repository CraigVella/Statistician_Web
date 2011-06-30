<div id="subTitle"><?php echo(STRING_SERVER_GLOBAL_ITEM_STATISTICS); ?></div>
<table>
	<th><?php echo(STRING_ALL_BLOCK_TYPE); ?></th><th><?php echo(STRING_ALL_PICKEDUP); ?></th><th><?php echo(STRING_ALL_DROPPED); ?></th>
	<?php
	$allResource = QueryUtils::getResourceTable();
	foreach($allResource as $resource) {
		$puAmnt = $serverObj->getPickedUpOfTypeTotal($resource['resource_id']);
		$dAmnt = $serverObj->getDroppedOfTypeTotal($resource['resource_id']);
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
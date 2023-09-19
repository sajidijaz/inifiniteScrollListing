<?php
	if(!empty($records)) {
		foreach($records as $record) {
?>
	<tr>
		<td><?php echo $record['address']; ?></td>
		<td><?php echo "€" . number_format($record['price'], 2); ?></td>
		<td><?php echo $record['size']; ?></td>
	</tr>
<?php }
	}
	else {
?>
		<tr>
			<td class="text-center" colspan="3">No Record Found</td>
		</tr>
<?php } ?>

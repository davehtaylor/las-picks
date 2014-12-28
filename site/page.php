<?php $data = array_reverse($data); ?>
<table>
	<?php 
		foreach ($startdates as $startdate) {
			$pageyears = substr($startdate, 0, 4);
			if (in_array($pageyears, $pagetime)) {
	 ?>
				<tr id="<?php echo $pageyears; ?>">
					<th><?php echo $pageth; ?></th>
					<th>Episode</th>
					<th>Date <span>[<?php echo $pageyears; ?>]</span></th>
				</tr>
				<?php
					$num = count($data);
					$i = 0;
					while($i < $num) {
						if ($data[$i]['year'] == $pageyears) {
				?>
							<tr>
								<!-- app url/name -->
								<td>
									<?php 
										$picks_count = count($data[$i][$pageakey]['pick']);
										$iter = 0;
										while( $iter < $picks_count ) {
									?>
										<?php if(0!=$iter){ echo " | "; } ?>
										<?php if ($data[$i][$pageakey]['pick'][$iter]['url'] != "0") { ?>
											<a href="<?php echo $data[$i][$pageakey]['pick'][$iter]['url']; ?>"><?php echo $data[$i][$pageakey]['pick'][$iter]['name']; ?></a>
										<?php } else { ?>
											<?php echo $data[$i][$pageakey]['pick'][$iter]['name']; ?>
										<?php } ?>
									<?php
										$iter++;
										}//end pick loop
									?>
								</td>
								<!-- episode url/title -->
								<td><a href="<?php echo $data[$i]['url']; ?>"><?php echo $data[$i]['title']; ?></a></td>
								<!-- date -->
								<td><?php echo date("Y-m-d", strtotime($startdates[$data[$i]['year']].$data[$i]['week'])); ?></td>
							</tr>
						<?php } $i++; }/*end pick row loop */ ?>
			<?php }/*end if year */ ?>
		<?php }/*end year loop */ ?>
</table>
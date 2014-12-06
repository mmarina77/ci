<?php

//dump($result['users_list']);


$total = $result['total'];
$users_list = $result['users_list'];

$title = array('User ID');
$total_row = array(' ');
foreach($total as $key=>$val) {
	$title[] = $total[$key]['title'];
	//$title[] = $total[$key]['title'].'<br />('.$total[$key]['total'].')';
	//$total_row[] = $total[$key]['total'];
}

//

?>
<script src="<?php echo base_url()?>libs/jquery.tablesorter.min.js"></script>
<script src="<?php echo base_url()?>libs/jquery.tablesorter.widgets.min.js"></script>
<!-- div>&nbsp;<a href="<?=$export_file_url?>"><b>Export file</b></a></div -->
<table id="myTable" class="tablesorter tablesorter-blue">
<thead>
	<tr>
	<?php
		for($i=0; $i<count($title); $i++) {
			echo '<td>'.$title[$i].'</td>';
		}
	?>
   </tr>
   </thead>
   <tbody>
   	<?php
		for($i=0; $i<count($users_list); $i++) {
			$row = $users_list[$i];
			echo '<tr>';
			echo '<td>'.$row['user_id'].'</td>';
			foreach($row as $key=>$val) {
				echo '<td>'.$row[$key]['count'].'</td>';
			}
			echo '</tr>';
		}
	?>
	</tbody>
</table>

<script>
$(document).ready(function(){
	$(function(){
		$("#myTable").tablesorter({
			theme : 'blue',
			
			sortList : [[1,0],[2,0],[3,0]],

			// header layout template; {icon} needed for some themes
			headerTemplate : '{content}{icon}',

			// initialize column styling of the table
			widgets : ["columns"],
			widgetOptions : {
			  // change the default column class names
			  // primary is the first column sorted, secondary is the second, etc
			  //columns : [ "primary", "secondary", "tertiary" ]
			  columns : <?=json_encode($title)?>
			}
		});
	});
});
</script>

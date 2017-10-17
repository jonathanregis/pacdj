<?php include("includes/connection.php"); ?>

<html>
<head>
	<title>Displaying areas you requested !</title>
	<style type="text/css">
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
	</style>
</head>
<body>
		<table class="data-table">
		<caption class="title">BA ASSIGNED YA BOUALA</caption>

		<p style="margin-top: 30px;">

		<?php include('includes/menu.php'); ?>
		
			<thead>	
				<tr>
					<th>Visitor name</th>
					<th>Phone</th>
					<th>Address</th>
					<th>Leader name</th>
					<th>Cell name</th>
					<th>Cell area</th>
					<th>Status</th>
					<th></th>
				</tr>
			</thead>
		<tbody>

		<?php

		//OUFFF !!!

		$select = mysqli_query(conn(),"SELECT 
			v.name,v.phone,v.location,ass.assignId,
			v.area,u.firstname,u.lastname,
			c.cell_name,a.area_name,ass.status FROM assign ass  
			JOIN visitors v ON v.visitorId=ass.visitorId 
			JOIN users u ON u.userId=ass.userId 
			JOIN cells c ON u.cellId=c.cellId
			JOIN cell_areas a ON c.areaId=a.areaId
			WHERE ass.status != 'deleted' 
			and ass.status='assigned' ");

		
		if (!$select) {
			die ('Hugh, chaley this query wont work kueee !!! SQL Error na nko: ' . mysqli_error(conn()));
		}

		while ($row = mysqli_fetch_array($select))
		
		{

		?>
			
			<tr>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['phone']; ?></td>
				<td><?php echo $row['area']; ?>(<?php echo $row['location']; ?>)</td>
				<td><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
				<td><?php echo $row['cell_name']; ?></td>
				<td><?php echo $row['area_name']; ?></td>
				<td><?php echo $row['status']; ?></td>
				<td><a href="php/del_assign.php?assignId=<?php echo $row['assignId']; ?>">delete</a></td>

			</tr>

		<?php } ?>

		</tbody>
	</table>
</body>
</html>
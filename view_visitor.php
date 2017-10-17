<?php include("include/connection.php"); ?>

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
		<caption class="title">BA VISITEURS YA BOUALA</caption>

		<p style="margin-top: 30px;">

		<?php include('include/menu.php'); ?>
		
			<thead>	
				<tr>
					<th>Name</th>
					<th>Area</th>
					<th>location</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
		<tbody>

		<?php

		$select = mysqli_query($conn,"SELECT * from visitors where visitorId NOT IN (SELECT visitorId from assign) AND status != 'deleted' ORDER BY visitorId DESC ");
		
		if (!$select) {
			die ('Your database is crappy SQL Error: ' . mysqli_error($conn));
		}

		while ($row = mysqli_fetch_array($select))
		
		{

		?>
			
			<tr>

				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['area']; ?></td>
				<td><?php echo $row['location']; ?></td>
				<td><a href="add_assign.php?visitorId=<?php echo $row['visitorId']; ?>">Assign</a></td>
				<td><form method="post" action="php/op_visitors.php"><input type="hidden" name="op" value="delete"/><input type="hidden" name="visitorId" value="<?= $row['visitorId']; ?>"><input type="submit" name="submit" value="delete" /></form></td>

			</tr>

		<?php } ?>

		</tbody>
	</table>
</body>
</html>
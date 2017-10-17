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
		<caption class="title">BA AREAS YA BOUALA</caption> <p style="margin-top: 30px;">

		<?php include('includes/menu.php'); ?>

			<tr>
				<th>Area name</th>
				<th>City</th>
				<th>Description</th>
				<th>lastDate</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>

		<?php

		$select = mysql_query("SELECT * from cell_areas where status != 'deleted' ORDER BY areaId DESC ");
		
		if (!$select) {
			die ('Your database is crappy SQL Error: ' . mysql_error($conn));
		}

		
		while ($row = mysql_fetch_array($select))
		{

		?>
			
			<tr>
					<td><?php echo $row['area_name']; ?></td>
					<td><?php echo $row['area_city']; ?></td>
					<td><?php echo $row['area_desc']; ?></td>
					<td><a href="edit_area.php?areaId=<?php echo $row['areaId']; ?>">edit</a></td>
					<td><a href="php/del_area.php?areaId=<?php echo $row['areaId']; ?>">delete</a></td>

			</tr>

		<?php } ?>

		</tbody>
	</table>
</body>
</html>
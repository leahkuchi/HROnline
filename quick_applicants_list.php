<?php
	include('auth.php');/*session_start()*/
	$_SESSION['previous-page'] = 'google.php';
?>

<!DOCTYPE html>
<html>

<head>
	<title>Application List</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-material-design.css">
	<link rel="stylesheet" type="text/css" href="css/dataTables.material.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-clockpicker.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/sidenav.css">
	<link rel="stylesheet" type="text/css" href="css/datepicker3.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-timepicker.min.css">
	<link rel="stylesheet" type="text/css" href="css/dataTables.tableTools.min.css">
	<link rel="stylesheet" type="text/css" href="css/dataTables.tableTools.css">
	<link rel="stylesheet" type="text/css" href="css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="css/buttons.dataTables.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="custom_css/quick_apply_applicants.css">

</head>

<body style='background-color: white'>
	<?php  header('Content-Type: text/html; charset=ISO_8859-1'); ?>
	<style type="text/css">
		.sb-search {
			position: relative;
			margin-top: 10px;
			width: 0%;
			min-width: 60px;
			height: 60px;
			float: right;
			overflow: hidden;
			-webkit-transition: width 0.3s;
			-moz-transition: width 0.3s;
			transition: width 0.3s;
			-webkit-backface-visibility: hidden;
		}

		#myTable tr.selected {
			background-color: #83b4ef !important; //color when selected
		}

		.active {
			background-color: white;
		}

		ul {
			list-style-type: none;
		}

		#bgImg {
			position: absolute;
			top: 1%;
			left: 8%;
			right: 5%;
			z-index: 0;
			background-attachment: fixed;
			background-position: center;
		}

		#ulPrint div a,
		#ulSave div a {
			padding: 0;
			border: none;
			background: none;
		}

		#ulPrint div a span,
		#ulSave div span {
			float: left;
		}

		.deleteButton
		{
			border: solid 1px #ABB2B9;
			background-color: #f44336;
			color: #F7F9F9;
			padding-top:3px;
			padding-bottom:5px;
			padding-right: 20px;
			padding-left: 20px;
			text-transform: uppercase;
			font-weight: bold;
			text-align: center;
  			transition: 0.3s;

		}

		.deleteButton:hover
		{
			text-decoration: none;
			color: #f44336;
			background-color: #F7F9F9;
		}

		.noButton
		{
			border: solid 1px #ABB2B9;
			background-color: #2ECC71;
			color: #F7F9F9;
			padding-top:3px;
			padding-bottom:5px;
			padding-right: 20px;
			padding-left: 20px;
			text-transform: uppercase;
			font-weight: bold;
			text-align: center;
  			transition: 0.3s;

		}

		.noButton:hover
		{
			text-decoration: none;
			color: #2ECC71;
			background-color: #F7F9F9;
		}
		.getCSV, .getExcel, .getCSV:hover, .getExcel:hover {
			background-color: #208c82;
			padding: 10px;
			border-radius: .5rem;
			text-decoration: none;
			cursor: pointer;
			color: #ffffff;
			border: 1px solid #00887b;
			box-shadow: 0 5px 10px 0 #808080;
		}
		.getCSV:active, .getExcel:active, .getCSV:visited, .getExcel:visited {
			background-color: #196f67;
			border: 1px solid #025850;
			box-shadow: 0 5px 10px 0 #353535;
		}

			</style>
	<?php
		include('sidenavhtml.php');
	?>


	<div id="main">
		<nav style="width:103.25%; margin-top:-2%; margin-left:-2%; background-color:#F0F8FF;">
			<div class="container-fluid">
				<ul class="nav navbar-nav">
					<li data-toggle="dropdown-toggle"><a data-toggle='modal'>
							<h4 style="cursor:pointer; color:#00008B; font-family:'Trebuchet MS', Helvetica, sans-serif; padding-top:5px; padding-right:10px; padding-left: -10px"
							    onclick="openNav()"><i class="fa fa-bars"></i> Menu</h4>
						</a></li>
				</ul>
			</div>
		</nav>

		<div class="row">
			<!--Status Change-->
			<div class="col-md-12"><br><br>
				<div id='myData'>
					<center>
						<h3 style="font-weight: bold;margin-bottom: 2%;margin-top:-2%;">Quick Apply Applicant List</h3>
					</center>
					<table name="" id="myTable" class="table table-bordered table-hover table-responsive" style="width:100%; ">
						<thead>
							<col width="200">
							<tr>
								<th>ID</th>
								<th>Position Applying</th>
								<th>Name</th>
								<th>Mobile Number</th>
								<th>Graduate/Undergraduate</th>
								<th>Course</th>
								<th>Finished Year</th>
								<th>Recent Company</th>
								<th>Recent Position</th>
								<th>BPO Experience</th>
								<th>Related Experience in Position</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php
							include('connect.php');
							$sql = "SELECT * FROM tbl_quick_applications ORDER BY id";
							$result = $conn->query($sql);
							if ($result->num_rows > 0){
								while($row = $result->fetch_assoc()) {?>
								<tr>
									<td><?php echo $row['id'];?></td>
									<td><?php echo $row['position'];?></td>
									<td><?php echo $row['lastname'] . ', ' . $row['firstname'] ;?></td>
									<td><?php echo $row['mobile_number'];?></td>
									<td><?php echo $row['graduate_undergraduate'];?></td>
									<td><?php echo $row['course'];?></td>
									<td><?php echo $row['finished_year'];?></td>
									<td><?php echo $row['recent_company'];?></td>
									<td><?php echo $row['recent_position'];?></td>
									<td><?php echo $row['bpo_experience'];?></td>
									<td><?php echo $row['related_experience_in_position'];?></td>
									<td><?php echo '<a class="btn btn-danger btn-sm confirmDeleteModalClass" data-toggle="modal" data-target="#confirmModal"  data-quick-apply-id="' . $row['id'] . '" data-quick-apply-position="' . $row['position'] . '" data-quick-apply-name="' . $row['lastname'] . ', ' . $row['firstname'] . '" data-quick-apply-mobile_number="' . $row['mobile_number'] . '" data-quick-apply-graduate_undergraduate="' . $row['graduate_undergraduate'] . '" data-quick-apply-course="' . $row['course'] . '" data-quick-apply-finished_year="' . $row['finished_year'] . '" data-quick-apply-recent_company="' . $row['recent_company'] . '" data-quick-apply-recent_position="' . $row['recent_position'] . '" data-quick-apply-bpo_experience="' . $row['bpo_experience'] . '" data-quick-apply-related_experience_in_position="' . $row['related_experience_in_position'] . '" ><span class="fa fa-trash"></span></a>'; ?></td>
								</tr>
							<?php
								}
									}
								$conn->close();?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div style="position:fixed;bottom:25px;right:25px">
			<a class="getCSV" id="getCSV">Save as CSV</a>
			<a class="getExcel" onclick="window.open('data:application/vnd.ms-excel,' + document.getElementById('myTable').outerHTML.replace(/ /g, '%20'));">Save as Excel</a>
		</div>
	</div>

	<!-- The Modal -->
	<div class="modal" id="confirmModal">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">DELETE QUICK APPLY APPLICANT</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">

					<table class="table table-border table-condensed table-striped">
						<thead>
							<tr colspan="2"><h6 class="text-center">Are you sure you want to delete this applicant from the list?</h6></tr>
						</thead>
						<tbody>
						<tr>
							<td>ID: </td><td id="quick-apply-id"></td>
						</tr>
						<tr>
							<td>Position Applying: </td><td id="quick-apply-position"></td>
						</tr>
						<tr>
							<td>Name: </td><td id="quick-apply-name"></td>
						</tr>
						<tr>
							<td>Mobile Number: </td><td id="quick-apply-mobile_number"></td>
						</tr>
						<tr>
							<td>Graduate/Undergraduate: </td><td id="quick-apply-graduate_undergraduate"></td>
						</tr>
						<tr>
							<td>Course: </td><td id="quick-apply-course"></td>
						</tr>
						<tr>
							<td>Finished Year: </td><td id="quick-apply-finished_year"></td>
						</tr>
						<tr>
							<td>Recent Company: </td><td id="quick-apply-recent_company"></td>
						</tr>
						<tr>
							<td>Recent Position: </td><td id="quick-apply-recent_position"></td>
						</tr>
						<tr>
							<td>BPO Experience: </td><td id="quick-apply-bpo_experience"></td>
						</tr>
						<tr>
							<td>Related Experience in Position: </td><td id="quick-apply-related_experience_in_position"> </td>
						</tr>
						</tbody>
					</table>
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="noButton" data-dismiss="modal">No</button>
					<button type="button" class="deleteButton confirmDeleteButton" data-dismiss="modal">Yes</button>
				</div>

			</div>
		</div>
	</div>

	<footer class="panel-footer" style="background-color:#F0F8FF;">
		<center>
			<p style="color: black; font-size:90%">
				Private and Confidential. Anderson Group BPO Inc. &copy; 2017
			</p>
		</center>
	</footer>
	<!--END-->

	<script type="text/javascript" src="js/tether.js"></script>
	<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="js/buttons.Html5.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/material.js"></script>
	<script type="text/javascript" src="js/buttons.print.min.js"></script>
	<script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="js/dataTables.tableTools.min.js"></script>
	<script type="text/javascript" src="js/dataTables.material.js"></script>
	<script type="text/javascript" src="js/dataTables.select.min.js"></script>
	<script type="text/javascript" src="js/buttons.flash.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="js/bootstrap-clockpicker.js"></script>
	<script type="text/javascript" src="js/bootstrap-timepicker.min.js"></script>
	<script type="text/javascript">
		$('.clockpicker').clockpicker();
	</script>
	<script type="text/javascript" src="js/csv.js"></script>
	<script type="text/javascript">

		// For deleting the quick applicant
		$(document).ready(function(){
			console.log('Page is ready.');

			$('.confirmDeleteModalClass').click(function(){
				$('#quick-apply-id').html($(this).data('quick-apply-id'));
				$('#quick-apply-position').html($(this).data('quick-apply-position'));
				$('#quick-apply-name').html($(this).data('quick-apply-name'));
				$('#quick-apply-mobile_number').html($(this).data('quick-apply-mobile_number'));
				$('#quick-apply-graduate_undergraduate').html($(this).data('quick-apply-graduate_undergraduate'));
				$('#quick-apply-course').html($(this).data('quick-apply-course'));
				$('#quick-apply-finished_year').html($(this).data('quick-apply-finished_year'));
				$('#quick-apply-recent_company').html($(this).data('quick-apply-recent_company'));
				$('#quick-apply-recent_position').html($(this).data('quick-apply-recent_position'));
				$('#quick-apply-bpo_experience').html($(this).data('quick-apply-bpo_experience'));
				$('#quick-apply-related_experience_in_position').html($(this).data('quick-apply-related_experience_in_position'));
			});

			$('.confirmDeleteButton').click(function(){
				deleteQuickApplicant($('#quick-apply-id').html());
			})

		});
		function deleteQuickApplicant(id){
				$.ajax({

					// URL of the PHP file
					url: "quickapply/api/deleteQuickApplicant.php",

					// Request method
					type: "POST",

					// Parameters / Data to be passed
					data: {
						id: id
					},

					// Data type
					dataType: 'json',

					// If the URL is  successfully loaded.
					success: function (msg) {
						alert(msg.message);
						location.reload();
					},
					error: function (msg) {
						console.log(msg.responseText);
					}
				});
			}
	</script>
	<script type="text/javascript">
		$('.getCSV').click( function() {
			exportTableToCSV.apply(this, [$('#myTable'), 'quickApplyApplicants.csv']);
		});
	</script>

	<script type="text/javascript">
		function openNav() {
			document.getElementById("mySidenav").style.width = "300px";
			document.getElementById("main").style.marginLeft = "300px";
		}

		function closeNav() {
			document.getElementById("mySidenav").style.width = "0";
			document.getElementById("main").style.marginLeft = "0";
		}
		setTimeout(function () {
			$('#removeme').fadeOut();
			<?php unset($_SESSION['uploadnotice']);
		  		unset($_SESSION['queryerror']); ?>
		}, 5000);
	</script>

</body>

</html>
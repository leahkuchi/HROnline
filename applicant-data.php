<?php
	require_once('auth.php');
	require_once('connect.php');
	
	if(isset($_POST['aid'])) {
		$aid = $_POST['aid'];
		$query = "SELECT * FROM tbl_application WHERE ID = '$aid'";
		$result = $conn->query($query);
		$row = $result->fetch_assoc();
		
		echo '<div class="modal-body">';
		echo '<div class="row col-lg-12 col-md-12 col-sm-12" style="display:flex">';
		echo '<div class="col-lg-4"><b>Name</b></div>';
		echo '<div class="col-lg-8">'.$row['NAME'].'</div>';
		echo '</div>';
		echo '<div class="row col-lg-12 col-md-12 col-sm-12" style="display:flex">';
		echo '<div class="col-lg-4"><b>Age</b></div>';
		echo '<div class="col-lg-8">'.$row['AGE'].'</div>';
		echo '</div>';
		echo '<div class="row col-lg-12 col-md-12 col-sm-12" style="display:flex">';
		echo '<div class="col-lg-4"><b>Birthday</b></div>';
		echo '<div class="col-lg-8">'.$row['DATE OF BIRTH'].'</div>';
		echo '</div>';
		echo '<div class="row col-lg-12 col-md-12 col-sm-12" style="display:flex">';
		echo '<div class="col-lg-4"><b>Birth Place</b></div>';
		echo '<div class="col-lg-8">'.$row['PLACE OF BIRTH'].'</div>';
		echo '</div>';
		echo '<div class="row col-lg-12 col-md-12 col-sm-12" style="display:flex">';
		echo '<div class="col-lg-4"><b>Municipality</b></div>';
		echo '<div class="col-lg-8">'.$row['CURRENT_MUNICIPALITY'].'</div>';
		echo '</div>';
		echo '<div class="row col-lg-12 col-md-12 col-sm-12" style="display:flex">';
		echo '<div class="col-lg-4"><b>Province</b></div>';
		echo '<div class="col-lg-8">'.$row['CURRENT_PROVINCE'].'</div>';
		echo '</div>';
		echo '<div class="row col-lg-12 col-md-12 col-sm-12" style="display:flex">';
		echo '<div class="col-lg-4"><b>Region</b></div>';
		echo '<div class="col-lg-8">'.$row['CURRENT_REGION'].'</div>';
		echo '</div>';
		echo '<div class="row col-lg-12 col-md-12 col-sm-12" style="display:flex">';
		echo '<div class="col-lg-4"><b>Gender</b></div>';
		echo '<div class="col-lg-8">'.$row['GENDER'].'</div>';
		echo '</div>';
		echo '<div class="row col-lg-12 col-md-12 col-sm-12" style="display:flex">';
		echo '<div class="col-lg-4"><b>Civil Status</b></div>';
		echo '<div class="col-lg-8">'.$row['CIVIL STATUS'].'</div>';
		echo '</div>';
		echo '<div class="row col-lg-12 col-md-12 col-sm-12" style="display:flex">';
		echo '<div class="col-lg-4"><b>Address</b></div>';
		echo '<div class="col-lg-8">'.$row['CURRENT ADDRESS'].'</div>';
		echo '</div>';
		echo '<div class="row col-lg-12 col-md-12 col-sm-12" style="display:flex">';
		echo '<div class="col-lg-4"><b>Email Address</b></div>';
		echo '<div class="col-lg-8">'.$row['EMAIL ADDRESS'].'</div>';
		echo '</div>';
		echo '<div class="row col-lg-12 col-md-12 col-sm-12" style="display:flex">';
		echo '<div class="col-lg-4"><b>Mobile Number</b></div>';
		echo '<div class="col-lg-8">'.$row['MOBILE_NUMBER'].'</div>';
		echo '</div>';
		echo '<div class="row col-lg-12 col-md-12 col-sm-12" style="display:flex">';
		echo '<div class="col-lg-4"><b>Application Source</b></div>';
		echo '<div class="col-lg-8">'.$row['APPLICATION_SOURCE'].'</div>';
		echo '</div>';
		echo '<div class="row col-lg-12 col-md-12 col-sm-12" style="display:flex">';
		echo '<div class="col-lg-4"><b>Reference Number</b></div>';
		echo '<div class="col-lg-8">'.$row['REFERENCE_NO'].'</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
?>
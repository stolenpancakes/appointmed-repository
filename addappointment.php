<?php 
include 'connectdatabase.php';
if(isset($_POST['submit'])){
	$date = $_POST['date'];
	$patient_id = $_POST['patient_id'];
	$doctor_id = $_POST['doctor_id'];
	$clinic_id = $_POST['clinic_id'];
	$appointment_status="Inqueue";
	$remarks='';
	$message="A patient has requested an appointment.";
	$n_id="n1004";
	$indicator="patient";
	$date = date('m/d/Y', strtotime($date));
	$date_today = date('m/d/Y');
	
	if($date >= $date_today){
		$sql = "INSERT INTO appointment (doctor_id, patient_id, appoint_date, appointment_status, remarks, clinic_id) 
		VALUES('$doctor_id', '$patient_id', '$date', '$appointment_status', '$remarks','$clinic_id')";

		$notif = "INSERT INTO notification (indicator, doctor_id, patient_id, notif_id, notification) 
		VALUES('$indicator', '$doctor_id', '$patient_id', '$n_id', '$message')";

		if (!(mysqli_query($con, $sql)) & !(mysqli_query($con, $notif)) ) {
		  	die('Error: ' . mysqli_error($con));
		}
		header("location: appointment.php");
	}else{
		echo '<script>alert("Please change the date")</script>';
		echo "<script> location.replace('doctor.php?id=".$doctor_id."') </script>";
	}

}else
	echo "<script>alert('Error')</script>";
	mysqli_close($con);
?>
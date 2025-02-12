    <?php

    include("database.php");


        $patientId = $_POST['patient-id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $medicalCondition = $_POST['medical-condition'];
        $medication = $_POST['medication'];
        $appointmentDate = $_POST['appointment-date'];
        $doctorName = $_POST['doctor-name'];
        $notes = $_POST['notes'];

    $sql = "INSERT INTO patients (Firstname, Lastname, DOB, Gender, Medical_condition, Medication, Appointment_date, Doctor_name, Doctor_notes)
            VALUES ('$firstname', '$lastname', '$dob', '$gender', '$medicalCondition', '$medication', '$appointmentDate', '$doctorName', '$notes')";




    if (!mysqli_query($conn, $sql)) {
        echo "Error: " . mysqli_error($conn);
    } else {
        echo "New record created successfully";
    }


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    };

    $firstname = $_GET['firstname'];

$sql = "SELECT * FROM patients WHERE firstname = '$firstname'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $patients = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $patients[] = array(
            "patient_id" => $row["patient_id"],
            "firstname" => $row["firstname"],
            "lastname" => $row["lastname"],
            "dob" => $row["dob"],
            "gender" => $row["gender"],
            "medical_condition" => $row["medical_condition"],
            "medication" => $row["medication"],
            "appointment_date" => $row["appointment_date"],
            "doctor_name" => $row["doctor_name"],
            "notes" => $row["notes"]
        );
    }
    echo json_encode($patients);
} else {
    echo json_encode(array());
}
?>

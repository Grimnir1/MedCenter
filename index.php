<?php require 'navbar.php'?>
<?php
    include("database.php");
    
    $message = '';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $patientId = rand(0000, 9999);
        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $dob = mysqli_real_escape_string($conn, $_POST['dob']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $medicalCondition = mysqli_real_escape_string($conn, $_POST['medical-condition']);
        $medication = mysqli_real_escape_string($conn, $_POST['medication']);
        $appointmentDate = mysqli_real_escape_string($conn, $_POST['appointment-date']);
        $doctorName = mysqli_real_escape_string($conn, $_POST['doctor-name']);
        $notes = mysqli_real_escape_string($conn, $_POST['notes']);

        $sql = "INSERT INTO patients (PatientID, Firstname, Lastname, DOB, Gender, Medical_condition, 
                Medication, Appointment_date, Doctor_name, Doctor_notes)
                VALUES ('$patientId', '$firstname', '$lastname', '$dob', '$gender', '$medicalCondition', 
                '$medication', '$appointmentDate', '$doctorName', '$notes')";

        if (mysqli_query($conn, $sql)) {
            $message = '<div class="alert alert-success">Patient data saved successfully!</div>';
        } else {
            $message = '<div class="alert alert-danger">Error: ' . mysqli_error($conn) . '</div>';
        }
    }
?>

    <section class="container-fluid p-5 my-5">
        <div class="container p-5 my-5">
            <h2 style="padding: 20px; color: lightcoral;" class="text-center">
                Main Spring Health Medical Center
            </h2>
            <h4 class="text-center">Patient Details viewport</h4>
        </div>
    </section>


<?php require 'footer.php'?>
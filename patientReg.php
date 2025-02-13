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


    <div class="container shadow p-5 my-5">
        <h2 style="padding: 20px; color: lightcoral;" class="text-center">Main Spring Health Medical Center</h2>
        <h4 style="padding: 20px; color: lightcoral;" class="text-center">Patient Details Form</h4>

        <?php echo $message; ?>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" required>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" required>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="medical-condition">Medical Condition</label>
                <input type="text" class="form-control" id="medical-condition" name="medical-condition" required>
            </div>
            <div class="form-group">
                <label for="medication">Medication</label>
                <input type="text" class="form-control" id="medication" name="medication" required>
            </div>
            <div class="form-group">
                <label for="appointment-date">Appointment Date</label>
                <input type="date" class="form-control" id="appointment-date" name="appointment-date" required>
            </div>
            <div class="form-group">
                <label for="doctor-name">Doctor Name</label>
                <input type="text" class="form-control" id="doctor-name" name="doctor-name" required>
            </div>
            <div class="form-group">
                <label for="notes">Doctors Notes</label>
                <textarea class="form-control" id="notes" name="notes" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
<?php require 'footer.php'?>
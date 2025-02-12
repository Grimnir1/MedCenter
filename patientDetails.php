<?php require 'navbar.php'?>

    <div class="container shadow p-5 my-5 rounded form-floating"> 
        <form action="" method="post">

            <h2 style="padding: 20px; color: lightcoral;" class="text-center">Adeleke University Medical Center</h1>
            <div class="form-floating d-grid gap-2">
                <input autofocus type="number" class="form-control" id="patientid" placeholder="Enter patient ID" name="patientid">
                <label for="patient-id">Patient ID</label>
                <div class="errormessage animate__animated animate__shakeX" id="errorMessage">Invalid ID Number</div>
                <input type="submit" name="" style="border: none; border-radius:5px; padding:10px; background-color:wheat;"  id="submitButton">
            </div>
        </form>
    </div>
  <style>
        #show {
            display: flex;
            justify-content: center;
            padding: 40px;

        }
        .errormessage {
            display: none;
            text-align: center ;
            color: red;
            padding: 10px;
            background-color:wheat;
            border-radius: 6px;
            }
        table {
            width: 100%;
            table-layout: fixed; 
        }
  </style>

<?php
    include("database.php");

    $noPatientFound = "
    <div class='animate__animated animate__zoomIn animate__delay-.1s container rounded form-floating d-grid gap-2 p-5 justify-content-center align-items-center'>
        <div align='center' class=' justify-content-center align-items-center'>
            <h1 class=''>Invalid Patient ID</h1>
            <h6>Please enter a valid Patient ID</h6>
        </div>
    </div>
    ";

    $enterPatientId = "
    <div class='animate__headShake container rounded form-floating d-grid gap-2 p-5 justify-content-center align-items-center'>
        <div align='center' class=' justify-content-center align-items-center'>
            <h1 class=''>Enter Patient ID</h1>
            <h6>Please enter a valid Patient ID</h6>
        </div>
    </div>
    ";

    if(isset($_POST['patientid']) && !empty($_POST['patientid'])) {
        $patientId = mysqli_real_escape_string($conn, $_POST['patientid']); 
        $sql = "SELECT * FROM patients WHERE PatientID = '$patientId'";
        $result = mysqli_query($conn, $sql);


        if ($_POST['patientid'] == "") {
            echo "<div id='show'>$enterPatientId</div>";

        }else{        
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $patientData = "
                    <div class='shadow p-5 rounded form-floating form-floating d-grid gap-2 container animate__animated animate__zoomIn animate__delay-.1s justify-content-center'> 
                        <p>Patient ID: " . $row["PatientID"] . "</p>
                        <p>Name: " . $row["Firstname"] . " " . $row["Lastname"] . "</p>
                        <p>Date of Birth: " . $row["DOB"] . "</p>
                        <p>Gender: " . $row["Gender"] . "</p>
                        <p>Medical Condition: " . $row["Medical_condition"] . "</p>
                        <p>Medication: " . $row["Medication"] . "</p>
                        <p>Appointment Date: " . $row["Appointment_date"] . "</p>
                        <p>Doctor Name: " . $row["Doctor_name"] . "</p>
                        <p>Notes: " . $row["Doctor_notes"] . "</p>
                    </div>
                ";
                echo "<div id='show'>$patientData</div>";
            } else {
                
                echo "<div id='show' class='animate__jello'>$noPatientFound</div>";
            }
        }
    }
    mysqli_close($conn);
?>

<?php require 'footer.php'?>
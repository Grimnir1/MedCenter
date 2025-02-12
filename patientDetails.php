<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <div class="container">
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
            /* width: 70%; */
            display: flex;
            justify-content: center;
            padding: 40px;

        }
        .container {
            box-shadow: 0 0.5rem 1rem rgb(242, 243, 243);
            border: none;
            margin-top: 20px;
            padding: 20px;
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
</body>
</html>

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
                <div class='form-floating d-grid gap-2 container animate__animated animate__zoomIn animate__delay-.1s justify-content-center'> 
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
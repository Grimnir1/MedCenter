<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
    <h2 style="padding: 20px; color: lightcoral;" class="text-center">Adeleke University Medical Center</h2>
    <h4 style="padding: 20px; color: lightcoral;" class="text-center">Registration Form</h4>

        <form id="patient-form">
            <div class="form-group">
                <label for="patient-id">Patient ID</label>
                <input type="text" class="form-control" id="patient-id" name="patient-id" required>
            </div>
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
    $('#patient-form').submit(function(event) {
        event.preventDefault();

        const formData = {
            'patient-id': document.getElementById('patient-id').value,
            'firstname': $('#firstname').val(),
            'lastname': $('#lastname').val(),
            'dob': $('#dob').val(),
            'gender': $('#gender').val(),
            'medical-condition': $('#medical-condition').val(),
            'medication': $('#medication').val(),
            'appointment-date': $('#appointment-date').val(),
            'doctor-name': $('#doctor-name').val(),
            'notes': $('#notes').val()
        }; 

        $.ajax({
            type: 'POST',
            url: 'server.php', 
            data: formData,
            success: function(response) {
                alert('Patient data saved successfully!');
                $('#patient-form')[0].reset();
            },
            error: function(xhr, status, error) {
                alert('Error saving patient data: ' + error);
            }
        });
    });
});
    </script>
</body>
</html>




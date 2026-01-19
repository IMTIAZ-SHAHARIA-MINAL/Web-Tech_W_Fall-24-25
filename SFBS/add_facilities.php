<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Facility</title>
    <link rel="stylesheet" href="addfacility.css" />
</head>
<body>
    <div style="margin-bottom: 15px;">
        <a style="text-decoration: none;">
            <button type="button" onclick="window.history.back()" style="background-color: #2980b9; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                ⬅ Back to Dashboard
            </button>
        </a>
    </div>

    <h1>Add New Facility</h1>
    <form action="add_facility.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
        <div>
            <label for="ground_name">Ground Name:</label>
            <input type="text" id="ground_name" name="ground_name" required>
        </div>
        <div>
            <label for="ground_location">Ground Location:</label>
            <input type="text" id="ground_location" name="ground_location" required>
        </div>
        <div>
            <label for="facility_type">Facility Type:</label>
            <select id="facility_type" name="facility_type" required>
                <option value="">Select Facility Type</option>
                <option value="Football Ground">Football Ground</option>
                <option value="Cricket Ground">Cricket Ground</option>
                <option value="Badminton Court">Badminton Court</option>
                <option value="Basketball Court">Basketball Court</option>
                <option value="Tennis Court">Tennis Court</option>
            </select>
        </div>
        <div>
            <label for="available_duration">Available Duration:</label>
            <input type="text" id="available_duration" name="available_duration" placeholder="e.g., 8:00 AM - 10:00 PM" required>
        </div>
        <div>
            <label for="fees">Fees:</label>
            <input type="text" id="fees" name="fees" placeholder="Enter fees (e.g., 50.00)" required>  <!-- Updated placeholder for clarity -->
        </div>
        <div>
            <label for="ground_picture">Upload Ground Picture:</label>
            <input type="file" id="ground_picture" name="ground_picture" accept="image/*" required>
        </div>
        <button type="submit" name="submit">Add Facility</button>
    </form>

    <script>
        function validateForm(e) {
            // Flag to track overall form validity
            let isValid = true;
    
            // Get form fields
            const groundName = document.getElementById('ground_name').value.trim();
            const groundLocation = document.getElementById('ground_location').value.trim();
            const facilityType = document.getElementById('facility_type').value;
            const availableDuration = document.getElementById('available_duration').value.trim();
            const fees = document.getElementById('fees').value.trim();
            const groundPicture = document.getElementById('ground_picture').value;
    
            // Validate Ground Name
            if (!/^[a-zA-Z\s]+$/.test(groundName)) { // Allow letters and spaces only
                alert("Ground Name should only contain letters and must not be empty.");
                document.getElementById("ground_name").focus();
                isValid = false;
            }
    
            // Validate Ground Location
            if (!/^[a-zA-Z0-9\s,+\-]+$/.test(groundLocation)) { // Allow letters and spaces only
                alert("Ground Location must not be empty and contain valid locations.");
                document.getElementById("ground_location").focus();
                isValid = false;
            }
    
            // Validate Facility Type
            if (facilityType === '') {
                alert('Please select a Facility Type.');
                document.getElementById("facility_type").focus();
                isValid = false;
            }
    
            // Validate Available Duration
            const durationRegex = /^[0-9]{1,2}:[0-9]{2}\s*(AM|PM)\s*-\s*[0-9]{1,2}:[0-9]{2}\s*(AM|PM)$/i;
            if (!durationRegex.test(availableDuration)) {
                alert('Available Duration must be in the format "e.g., 8:00 AM - 10:00 PM".');
                document.getElementById("available_duration").focus();
                isValid = false;
            }
    
            // Validate Fees (already matches DECIMAL(10,2) format)
            const feesRegex = /^[0-9]+(\.[0-9]{1,2})?$/; // Accepts numeric values with optional decimals
            if (!feesRegex.test(fees)) {
                alert('Fees must be a valid number with up to 2 decimal places.');
                document.getElementById("fees").focus();
                isValid = false;
            }
    
            // Validate Ground Picture
            if (groundPicture === '') {
                alert('Please upload a Ground Picture.');
                document.getElementById("ground_picture").focus();
                isValid = false;
            }
    
            // Prevent form submission if validation fails
            if (!isValid) {
                e.preventDefault(); // Prevents form submission
                return false; // Explicitly return false to ensure the form doesn't submit
            }
    
            return true; // Form is valid and can be submitted
        }
    
        // Attach the validation function to the form's onsubmit event
        document.querySelector('form').addEventListener('submit', validateForm);
    </script>

</body>
</html>
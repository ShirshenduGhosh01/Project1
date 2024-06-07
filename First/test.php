<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hostel Complaints Page</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #222;
    color: #eee;
}

.container {
    width: 80%;
    margin: 50px auto;
    background-color: #333;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

h1 {
    text-align: center;
    margin-bottom: 30px;
}

#complaintForm {
    width: 70%;
    margin: 0 auto;
}

form {
    margin-top: 20px;
}

label {
    font-weight: bold;
}

input[type="text"],
select,
textarea {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #555;
    border-radius: 5px;
    transition: border-color 0.3s ease;
    background-color: #444;
    color: #eee;
}

input[type="text"]:focus,
select:focus,
textarea:focus {
    border-color: #007bff;
}

button {
    padding: 12px 24px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}

/* Custom select styles */
.custom-select {
    position: relative;
    width: 100%;
    margin-bottom: 20px;
}

.custom-select select {
    display: none;
}

.select-selected {
    background-color: #007bff;
    color: white;
    padding: 12px;
    border-radius: 5px;
    cursor: pointer;
}

.select-selected:hover {
    background-color: #0056b3;
}

.select-items {
    position: absolute;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    max-height: 200px;
    overflow-y: auto;
    z-index: 99;
}

.select-items div {
    padding: 12px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.select-items div:hover {
    background-color: #f1f1f1;
}

/* Add animation */
.fade-in {
    animation: fadeIn 0.5s ease forwards;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}
</style>
</head>
<body>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $registrationNumber = $_POST["registrationNumber"];
    $name = $_POST["name"];
    $roomNumber = $_POST["roomNumber"];
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
    $blockNumber = $_POST["blockNumber"];
    $issueType = $_POST["issueType"];
    $complaint = $_POST["complaint"];

    // Format the data
    $formData = "Registration Number: $registrationNumber\n";
    $formData .= "Name: $name\n";
    $formData .= "Room Number: $roomNumber\n";
    $formData .= "Gender: $gender\n";
    $formData .= "Block Number: $blockNumber\n";
    $formData .= "Complaint Type: $issueType\n";
    $formData .= "Complaint: $complaint\n\n";

    // Define the file path
    $filePath = "form_responses.txt";

    // Open the file in append mode
    $file = fopen($filePath, "a");

    // Write the form data to the file
    fwrite($file, $formData);

    // Close the file
    fclose($file);

    // Display a success message
    echo "<div class='container fade-in'>";
    echo "<h2>Complaint Submitted Successfully!</h2>";
    echo "</div>";
    exit(); // Add exit to stop further execution
}
?>

<div class="container fade-in">
    <h1>Hostel Complaints Form</h1>
    <div id="complaintForm">
        <form id="submitForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <!-- Specify action and method -->
            <!-- Your form fields -->
            <label for="registrationNumber">Registration Number:</label>
            <input type="text" id="registrationNumber" name="registrationNumber" pattern="[0-9]{2}[A-Z]{3}[0-9]{5}" title="Format: 21BAI10***" required><br>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>
            <label for="roomNumber">Room Number:</label>
            <input type="text" id="roomNumber" name="roomNumber" required><br>
            <label>Gender:</label><br>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label><br>
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label><br><br>
            <label for="blockNumber">Block Number:</label>
            <select id="blockNumber" name="blockNumber" required>
                <option value="" disabled selected>Select Block Number</option>
                <option value="1">Block 1 Boys</option>
                <option value="2">Block 2 Boys</option>
                <option value="3">Block 3 Boys</option>
                <option value="4">Block 4 Boys</option>
                <option value="5">Block 5 Boys</option>
                <option value="6">Block 6 Boys</option>
                <option value="7">Block 1 Girls</option>
                <option value="8">Block 2 Girls</option>
            </select><br>
            <label for="issueType">Complaint Type:</label>
            <select id="issueType" name="issueType" required>
                <option value="" disabled selected>Select Complaint Type</option>
                <option value="electrician">Electrician</option>
                <option value="plumber">Plumber</option>
                <option value="wifi">WiFi Issues</option>
                <option value="carpenter">Carpenter</option>
                <option value="cleaning">Cleaning</option>
                <option value="security">Security Guards</option>
            </select><br>
            <label for="complaint">Complaint:</label>
            <textarea id="complaint" name="complaint" rows="4" required></textarea><br>
            <button type="submit">Submit <i class="fas fa-paper-plane"></i></button>
        </form>
    </div>
</div>

<!-- Your JavaScript code here -->

</body>
</html>

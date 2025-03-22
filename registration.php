<?php 
function validatePhoneNumber($phone) { 
return preg_match("/^\d{10}$/", $phone); 
} 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
$name = trim($_POST['name']); 
$email = trim($_POST['email']); 
$phone = trim($_POST['phone']); 
$college = trim($_POST['college']); 
$department = trim($_POST['department']); 
$year = trim($_POST['year']); 
$event = trim($_POST['event']); 
$comments = trim($_POST['comments']); 
$errors = []; 
if (empty($name)) { 
$errors[] = "Name is a mandatory field."; 
} 
if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) { 
$errors[] = "Invalid Email Address."; 
} 
if (!empty($phone) && !validatePhoneNumber($phone)) { 
$errors[] = "Phone Number must be exactly 10 digits."; 
} 
if (empty($college)) { 
$errors[] = "City cannot be empty."; 
} 
if (empty($department)) { 
$errors[] = "Department cannot be empty."; 
83 
} 
if (empty($year)) { 
$errors[] = "Year cannot be empty."; 
} 
if (empty($event)) { 
$errors[] = "Event cannot be empty."; 
} 
// if (empty($comments)) { 
// 
// } 
    $errors[] = "Comments cannot be empty."; 
if (!empty($errors)) { 
echo "<h2>Validation Errors</h2>"; 
echo "<ul>"; 
foreach ($errors as $error) { 
echo "<li>$error</li>"; 
} 
echo "</ul>"; 
echo "<a href='index.html'>Go Back</a>"; 
} else { 
echo "<h2>Customer Details Submitted Successfully</h2>"; 
echo "<p>Name: $name</p>"; 
echo "<p>Email Address: $email</p>"; 
echo "<p>Phone Number: $phone</p>"; 
echo "<p>College: $college</p>"; 
echo "<p>Department: $department</p>"; 
echo "<p>Year: $year</p>"; 
echo "<p>Event: $event</p>"; 
echo "<p>Comments: $comments</p>";     
} 
} 
?>
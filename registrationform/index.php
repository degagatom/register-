<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registration Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f7f7f7;
      padding: 40px;
    }
    form {
      background: #fff;
      padding: 25px;
      max-width: 400px;
      margin: auto;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    input {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    button {
      background: #007bff;
      color: white;
      border: none;
      padding: 10px 15px;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background: #0056b3;
    }
  </style>
</head>
<body>
  <h2 style="text-align:center;">Registration Form</h2>
  <form action="sendmail.php" method="POST">
    <label for="name">Full Name</label>
    <input type="text" name="name" required />

    <label for="email">Email</label>
    <input type="email" name="email" required />

    <label for="phone">Phone</label>
    <input type="text" name="phone" required />

    <label for="password">Password</label>
    <input type="password" name="password" required />

    <button type="submit">Register</button>
  </form>
  <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $password = htmlspecialchars($_POST['password']);

    // Email details
    $to = "degagatom@gmail.com"; // CHANGE THIS
    $subject = "New Registration from Website";
    $message = "
    <html>
    <head><title>New Registration</title></head>
    <body>
      <h2>New Registration Details</h2>
      <p><strong>Name:</strong> $name</p>
      <p><strong>Email:</strong> $email</p>
      <p><strong>Phone:</strong> $phone</p>
      <p><strong>Password:</strong> $password</p>
    </body>
    </html>
    ";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: <$email>" . "\r\n";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "<h3>Thank you for registering, $name. Your details have been sent!</h3>";
    } else {
        echo "<h3>Sorry, there was a problem sending your registration.</h3>";
    }
} else {
    echo "Invalid request.";
}
?>

</body>
</html>

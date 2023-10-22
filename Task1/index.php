<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css"
        integrity="sha512-Z/def5z5u2aR89OuzYcxmDJ0Bnd5V1cKqBEbvLOiUNWdg9PQeXVvXLI90SE4QOHGlfLqUnDNVAYyZi8UwUTmWQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .form-container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f2f2f2;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-container h2 {
    margin-top: 0;
    margin-bottom: 20px;
    text-align: center;
    }

    .form-group {
    margin-bottom: 20px;
    }

    .form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    }

    .form-group input[type="text"],
    .form-group input[type="email"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }

    .form-group input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
    }

    .form-group input[type="submit"]:hover {
    background-color: #45a049;
    }
</style>
</head>

<body>
<div class="form-container">
    <h2>Login Page</h2>
    <form method="POST" action="">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : ''; ?>" >
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>" >
    </div>
    <div class="form-group">
        <input type="submit" value="Submit">
    </div>
    </form>
</div>

<?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Validate and sanitize inputs
            $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

            // Validate name
            if (empty($name)) {
            echo '<div class="alert alert-warning" role="alert">
                        Please Enter Your Name.
                    </div>';
            }

            // Validate email
            if (empty($email)) {
            echo '<div class="alert alert-warning" role="alert">
                        Please Enter Your Email.
                    </div>';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<div class="alert alert-warning" role="alert">
                        Please Enter A Valid Email Address.
                    </div>';
            }

            // If inputs are valid, display confirmation message
            if (!empty($name) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "
            <div class='alert alert-success' role='alert'>
                Thank you <strong>$name</strong> for submitting the form! We will contact you at <strong>$email</strong>.
            </div>
            ";
            }
            
        }
?>
</body>
</html>
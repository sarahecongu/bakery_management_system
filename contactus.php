
<!DOCTYPE html>
<html>
<head>
meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/index.css">
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
        }

        h1 {
            background-color: white;
            color:black;
            padding: 5px;
            text-align: center;
            font-size: 30px;
        }

        .container {
            max-width: 500px;
            margin: 20px auto;
            padding: 30px ;
            background-color: wheat;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            
        }

        .contact-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 10px;
            padding: 10px;
            background-color: white;
            
        }

        .contact-form {
            margin-top: 20px;
            margin-left: 30px;
        
        }

        label, input, textarea {
            display: block;
            margin-bottom: 10px;
        }

        label {
            font-weight: bold;
            
        }

        input, textarea {
            width: 400px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            background-color: black;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color:rgb(76, 9, 9) ;
        }

        .spaced{
            background: white;
            height: 15vh;
        }
    </style>
</head>
<body>
<?php
    include("navbar.php");
    ?>

<div class="spaced"></div>
    <h1>Contact Us</h1>

    <div class="container">
        <div class="contact-card">
            <h2>Contact Information</h2>
            <p><strong>Address:</strong> Bukoto Street, Kampala, Uganda</p>
            <p><strong>Email:</strong> bakepal@gmail.com</p>
            <p><strong>Phone:</strong> 0392596596</p>
        </div>

        <div class="contact-form">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST["name"];
                $email = $_POST["email"];
                $message = $_POST["message"];

                // You can add additional validation and processing here.
                // For simplicity, we'll just display the submitted data.
                echo "<p>Thank you for contacting us, $name!</p>";
                echo "<p>Your email address: $email</p>";
                echo "<p>Your message: $message</p>";
            }
            ?>

            <h2>Contact Form</h2>
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>

                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
    <?php
 include("footer.php");
 ?>
</body>
</html>

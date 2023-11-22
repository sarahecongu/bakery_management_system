<?php require_once('includes/core.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/index.css">
    <title>Contact Us</title>
    <style>
        .spac {
            min-height: 25vh;
        }

        .contact-section {
            background: wheat;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .contact-info {
            color: rgb(76, 9, 9);
            max-width: 500px;
            line-height: 65px;
            padding-left: 50px;
            font-size: 15px;
        }

        .contact-info i {
            margin-right: 20px;
            font-size: 15px;
        }

        .contact-form {
            max-width: 700px;
            margin-right: 50px;
        }

        .contact-form,
        .contact-info {
            flex: 1;
        }

        .contact-form h2 {
            color: black;
            text-align: center;
            font-size: 35px;
            text-transform: uppercase;
            margin-bottom: 30px;
        }

        .contact-form .text-box {
            color: rgb(76, 9, 9);
            border: none;
            width: calc(50% - 10px);
            height: 50px;
            padding: 12px;
            font-size: 15px;
            border-radius: 5px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
            opacity: 0.9;
            margin-bottom: 20px;
        }
       
        .contact-form input::placeholder,
        .contact-form textarea::placeholder {
            color: rgb(76, 9, 9); 
            font-style: italic;
        }

        .contact-form .text-box:first-child {
            margin-right: 15px;
        }

        .contact-form textarea {
            color: white;
            border: none;
            width: 100%;
            padding: 12px;
            font-size: 15px;
            min-height: 200px;
            max-height: 400px;
            resize: vertical;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
            opacity: 0.9;
            margin-bottom: 20px;
        }

        .contact-form .send-btn {
            float: right;
            background-color: rgb(76, 9, 9);
            color: white;
            border: none;
            width: 120px;
            height: 40px;
            font-size: 15px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .contact-form .send-btn:hover {
            color: wheat;
        }

        @media screen and (max-width: 950px) {
            .contact-section {
                flex-direction: column;
            }

            .contact-form .contact-info {
                margin: 30px 50px;
            }

            .contact-form h2 {
                font-size: 30px;
            }

            .contact-form .text-box {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <?php include("navbar.php"); ?>
    <div class="spac"></div>

    <div class="contact-section">
        <div class="contact-info">
            <div><i class="fas fa-map-marker-alt"></i> Address, City</div>
            <div><i class="fas fa-envelope"></i> sarahanita@gmail.com</div>
            <div><i class="fas fa-phone"></i> 0772979732</div>
            <div><i class="far fa-clock"></i> Mon - Fri 8:00AM-5:00PM</div>
        </div>
        <div class="contact-form">
            <h2>Contact Us</h2>
            <form action="" class="contact" method="POST">
                <input type="text" name="name" class="text-box" placeholder="Enter Username......">
                <input type="email" name="email" class="text-box" placeholder="Enter Email.......">
                <textarea name="message" rows="5" cols="80" placeholder="Your Message"></textarea>
                <input type="submit" name="submit" class="send-btn " value="Send">
            </form>
        </div>
    </div>
    <?php include("footer.php"); ?>
</body>

</html>

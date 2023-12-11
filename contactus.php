<?php require_once('includes/core.php'); 
$contactUs = new ContactUs();
?>
<?php

$errors = [];

if (!empty($_POST)) {
   $name = $_POST['name'];
   $email = $_POST['email'];
   $subject = $_POST['subject'];
   $message = $_POST['message'];

  
   if (empty($name)) {
       $errors[] = 'Name is empty';
   }

   if (empty($email)) {
       $errors[] = 'Email is empty';
   } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $errors[] = 'Email is invalid';
   }

   if (empty($message)) {
       $errors[] = 'Message is empty';
   }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/index.css">
    <title>Contact Us</title>
    <style>
        .contact-form input[type="email"] {
    text-transform: none;
}

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
            /* text-transform: uppercase; */
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
            color: inherit;
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
            /* text-transform: uppercase; */
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
            <div><i class="fas fa-map-marker-alt"></i> Najjera, Kampala</div>
            <div><i class="fas fa-envelope"></i> sarahanita@gmail.com</div>
            <div><i class="fas fa-phone"></i> 0772979732</div>
            <div><i class="far fa-clock"></i> Mon - Fri 8:00AM-5:00PM</div>
        </div>
        <div class="contact-form">
            <h2>Contact Us</h2>
            <form action="contactus.php" id="contact" method="POST">
            <?php
                if (!empty($errors)) {
                $allErrors = join('<br/>', $errors);
                $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
                }
                ?>
                <input type="text" name="name" id="userName" class="text-box " placeholder="Enter Username......">
                <input type="email" name="email" id="userEmail" class="text-box " placeholder="Enter Email.......">
                <input type="subject" name="subject" id="subject" class="text-box " placeholder="Enter Subject.......">
                <textarea name="message" id="message" rows="5" cols="80" class="" placeholder="Your Message"></textarea>
               
                <input type="submit" class="send-btn " value="Send">
            </form>
        </div>
    </div>
    
    <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
    <script>
   const constraints = {
       name: {
           presence: { allowEmpty: false }
       },
       email: {
           presence: { allowEmpty: false },
           email: true
       },
       message: {
           presence: { allowEmpty: false }
       }
       subject: {
           presence: { allowEmpty: false }
       }
   };

   const form = document.getElementById('contact');

   form.addEventListener('submit', function (event) {
     const formValues = {
         name: form.elements.name.value,
         email: form.elements.email.value,
         subject: form.elements.subject.value,
         message: form.elements.message.value
     };

     const errors = validate(formValues, constraints);

     if (errors) {
       event.preventDefault();
       const errorMessage = Object
           .values(errors)
           .map(function (fieldValues) { return fieldValues.join(', ')})
           .join("\n");

       alert(errorMessage);
     }
   }, false);
</script>














        


 <?php include("footer.php"); ?>
</body>

</html>

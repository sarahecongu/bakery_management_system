<?php
include("includes/core.php");
$user_details = new User;


if(isset($_GET['id']) && !empty($_GET['id'])) {
  $user_id = $_GET['id'];
  $user_detail = $user_details->find($user_id); 
 
}
if (isset($_POST['update_account'])) {
    $data = [
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'], 
        'email' => $_POST['email'], 
        'tel' => $_POST['tel'], 
        'address' => $_POST['address'], 

        
    ];
   

    if($user_details->update($_POST['id'], $data)){
    Helper::statusMessage('success','user_detail updated sucessfully');
    }
    else {
      Helper::statusMessage('success','user_detail failed to update');
        
      }
      header("Location: account.php");
      exit();
    };
  
    
  

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
  <title>Account Page</title>
  <style>
        .con {
            min-height: 20vh;
        }

        section.container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
            font-size: 1.5rem;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            margin-top: 5px;
        }
        fieldset {
      border: 1px solid gray;
      border-radius: 8px;
      padding: 20px;
      margin-bottom: 20px;
    }

    legend {
      font-weight: bold;
      font-size: 1.2rem;
      color: #4CAF50;
      padding: 0 10px;
    }
        button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            width: 100%;
        }

        .flex-row {
            display: flex;
            gap: 15px;
        }
    </style>
</head>

<body>
    <?php include("navbar.php"); ?>
    <div class="con"></div>

    <section class="container">
        <h2>My Account Details</h2>
        <form action="account.php" method="post">
        <input type="hidden" name="id" value="<?php echo $user_details->id?>">
        <fieldset>
        <legend>User Information:</legend>
    
        <div class="flex-row">
          <div>
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo $user_details->first_name; ?>"
              required>
          </div>

          <div>
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="<?php echo $user_details->last_name; ?>"
              required>
          </div>
        </div>
        <label for="text">Address:</label>
        <input type="text" name="address" value="<?php echo $user_details->address; ?>" required>
      </fieldset>

      <fieldset>
        <legend>Contact Information:</legend>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user_details->email; ?>" required>
        <label for="tel">Phone No:</label>
        <input type="tel"  name="tel" value="<?php echo $user_details->tel; ?>" required>
      </fieldset>


            <button type="submit" name="update_account">Update Account</button>
        </form>
    </section>
</body>

</html>
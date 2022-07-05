<?php

$success = false;
$set = false;

// database connection code
if (isset($_POST['fname'])) {
    $set = true;
    // $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
    $con = mysqli_connect('localhost', 'root', '', 'db_contact');

    // get the post records

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];

    // database insert SQL code
    $sql = "INSERT INTO `tbl_contact` (`first_name`, `last_name`, `email`, `message`) VALUES (?, ?, ?, ?)";

    $stmn = $con->prepare($sql);
    $stmn->bind_param("ssss", $fname, $lname, $email, $subject);
    $stmn->execute();
    
    if ($stmn->affected_rows > 0) {
        $success = true;
    }

    $stmn->close();
}

?>
<!DOCTYPE html>
<html>

<head>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <style>
        .dropbtn {
            background-color: white;
            color: white;
            padding: 5px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
    

    
    <style>
        * {
            box-sizing: border-box;
        }

        input[type=text],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        input[type=submit] {
            background-color: #353535;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        input[type=submit]:hover {
            background-color: #000000;
        }

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
        }

        .col-75 {
            float: left;
            width: 75%;
            margin-top: 6px;
        }

        /* Clear floats after the columns */

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */

        @media screen and (max-width: 600px) {

            .col-25,
            .col-75,
            input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
        }
    </style>

</head>

<body>
    <span>
        <div class="dropdown">
            <button class="dropbtn"><img src='navbar.png' width="30" height="30"></button>
            <div class="dropdown-content">
                <a style="font-family: Arial, Helvetica, sans-serif;" href="index.php">Home</a>
                <a style="font-family: Arial, Helvetica, sans-serif;" href="pasta.php">Pasta</a>
                <a style="font-family: Arial, Helvetica, sans-serif;" href="ingredients.php">Ingredients</a>
                <a style="font-family: Arial, Helvetica, sans-serif;" href="types.php">Types</a>
                <a style="font-family: Arial, Helvetica, sans-serif;" href="matchme.php">Match me!</a>
                <a style="font-family: Arial, Helvetica, sans-serif;" href="matchmypasta.php">Match my pasta!</a>
            </div>
        </div>
        <a href="index.php">
            <img src="logo.png" style="height:30px;">
        </a>
    </span>
    <div style="font-family: Arial, Helvetica, sans-serif;margin-top: 10px; margin-bottom: 25px; margin-right: 210px; margin-left: 210px;text-align: justify;">
        <img src="contacttxt.png" style="height:50px;">
    </div>



    <div style="font-family: Arial, Helvetica, sans-serif;margin-top: 10px; margin-bottom: 25px; margin-right: 210px; margin-left: 210px;text-align: left;">
        <div class="container" <?php if($set) echo("hidden");?> >
            <form action="contact form.php" method="POST">
                <div class="row">
                    <div class="col-25">
                        <label for="fname">First Name</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="fname" name="fname" placeholder="Your name.." required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="lname">Last Name</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="lname" name="lname" placeholder="Your last name.." required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="email">E-mail Address</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="email" name="email" placeholder="Your e-mail address.." pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="subject">Subject</label>
                    </div>
                    <div class="col-75">
                        <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px" required></textarea>
                    </div>
                </div>
                
                <div class="row">
                    <input type="submit" value="Submit">
                </div>
            </form>
        </div>
        <div  <?php if(!$set) echo("hidden");?>><div class="container">
            <?php
                if($success){
                    echo("<div>Thank you! Your message has been successfully registered!</div>");
                    echo("<div></div>");
                    echo("<div onclick='window.location.href = \"index.php\";' style='cursor: pointer;'>Click here to go back to our home page.</div>");
                } else {
                    echo("<div>Something went wrong</div>");
                }
            ?>
            </div>
            <pre>

















            




            </pre>
        </div>
        <div <?php if($set) ?>>
        <pre>
        </pre>
        </div>
    </div>

    <div style="background-color:black;color:white;padding:15px;margin-top:95px;">
        <a href="index.php">
            <img src="logoalb.png" style="height: 30px;margin-left:35px;"></a>
        <p style="margin-left:39px;"> Don't forget to check out our social media as well!</a>
        </p>
        <span style="margin-left:39px;"><a href="https://www.instagram.com/deni_neagu/?utm_medium=copy_link">
                <img src="data:image/png;base64,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" style="height: 30px;"></a>
            <a href="https://www.facebook.com/profile.php?id=100006322811238">
                <img src="fblogo.png" style="height: 30px;"></a>
            <a href="https://vm.tiktok.com/ZM8ES2GSQ/">
                <img src="tiktoklogo.png" style="height: 30px;"></a>
        </span>
    </div>
</body>

</html>
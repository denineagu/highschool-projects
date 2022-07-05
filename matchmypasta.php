<?php

$success = false;
$set = false;
$found = false;

// database connection code
if (isset($_POST['search'])) {
    $set = true;
    // $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
    $con = mysqli_connect('localhost', 'root', '', 'db_contact');

    // get the post records

    $search = $_POST['search'];

    // database insert SQL code
    $sql = "INSERT INTO `tbl_matchmypasta` (`search`) VALUES (?)";

    $stmn = $con->prepare($sql);
    $stmn->bind_param("s", $search);
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

        input[type=text] {
            width: 100%;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            background-image: url("https://cdn1.iconfinder.com/data/icons/hawcons/32/698956-icon-111-search-512.png");
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
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

        .col-65 {
            float: left;
            width: 65%;
            margin-top: 6px;
        }

        .col-10 {
            float: right;
            width: 10%;
            margin-top: 9px;
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
            .col-65,
            .col-10,
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
                <a style="font-family: Arial, Helvetica, sans-serif; background-color: rgb(224, 224, 224);" href="matchmypasta.php ">Match my pasta!</a>
            </div>
        </div>
        <a href="index.php">
            <img src="logo.png" style="height:30px;">
        </a>
    </span>
    <div style="font-family: Arial, Helvetica, sans-serif;margin-top: 10px; margin-bottom: 25px; margin-right: 210px; margin-left: 210px;text-align: justify;">
        <img src="matchmypastatxt.png" style="height:65px;">
    </div>

    <div style="margin-top: 10px; margin-bottom: 25px; margin-right: 217px; margin-left: 210px;text-align: justify;">
        <p>Ever wondered whether there's an exact science and logical explanation beneath the reason why some choose to match their pasta 
            shapes to their sauce? Are you worried that you've never enjoyed the famous Italian dish at its highest potential? There's
            absolutely no need to worry about that. We cannot state there's neither a correct nor a wrong way of eating pasta, regardless
            of the belief that certain shapes match certain types of sauces. However matter which theory we side with, one thing is certain: pasta is
            pasta, and it's absolutely delicious no matter how you choose to enjoy it!</p>

            <p>Whether you are curious to see which sauce best fits your pasta shape match, or you simply want to make a delicious dish out of
            the pasta that you already have in your kitchen cupboard and are eager to test the aforementioned theory, this search bar allows you to 
            insert a variety of pasta shapes and finds the best sauce to accompany them. You can also click on the name or the picture to find the recipe! </p>
        <p>What are you waiting for? Give it a try!</p>
    </div>

    <div style="font-family: Arial, Helvetica, sans-serif;margin-top: 10px; margin-bottom: 25px; margin-right: 210px; margin-left: 210px;text-align: left;">
        <div class="container">
            <form action="matchmypasta.php" method="POST">
                <div class="row">
                    <div class="col-25">
                        <label for="search">Type your desired pasta shape</label>
                    </div>
                    <div class="col-65">
                        <input type="text" name="search" id="search" placeholder="Search..">
                    </div>
                    <div class="col-10">
                        <input type="submit" value="Go!">
                    </div>
                </div>
            </form>
        </div>

    </div>

    <div style="text-align:center" <?php if (!$set) ?>>
        <?php
        if ($success) {

            if (
                $search == 'penne' or $search == 'Penne' or $search == 'PENNE'
                or $search == 'bucatini' or $search == 'Bucatini' or $search == 'BUCATINI'
                or $search == 'tubini' or $search == 'Tubini' or $search == 'TUBINI'
                or $search == 'tortiglioni' or $search == 'Tortiglioni' or $search == 'TORTIGLIONI'
                or $search == 'pipe' or $search == 'Pipe' or $search == 'PIPE'
            ) {
                $found = true;
                echo ("<div>Awesome choice! The match for this pasta shape is:</div>");
                echo ('<a href="https://www.bbcgoodfood.com/recipes/best-spaghetti-bolognese-recipe" target="_blank">><img src="bolognesetxt.png" style="height:120px;"></a>');
                echo ('<pre><a href="https://www.bbcgoodfood.com/recipes/best-spaghetti-bolognese-recipe" target="_blank"><img src="bolognese2.jpeg" style="width:1000px;"></a></pre>');
                echo (' <div style="margin-top: 10px; margin-bottom: 25px; margin-right: 217px; margin-left: 210px;text-align: center;">
                        <p>The meaty chunks in these sauces are easily mopped up by tube-shaped pastas like penne, bucatini, tubini, pipe, and tortiglioni. The meat can enter the tubes and the pasta acts as a great vehicle to carry the sauce.</p></div>');
            } else if (
                $search == 'fettuccine' or $search == 'Fettuccine' or $search == 'FETTUCCINE'
                or $search == 'tagliatelle' or $search == 'TAGLIATELE' or $search == 'Tagliatele'
                or $search == 'pappardelle' or $search == 'Pappardelle' or $search == 'PAPPARDELLE'
            ) {
                $found = true;
                echo ("<div>Awesome choice! The match for this pasta shape is:</div>");
                echo ('<a href="https://thesaltymarshmallow.com/best-homemade-alfredo-sauce/" target="_blank"><img src="loghttxt.png" style="height:120px;"></a>');
                echo ('<pre><a href="https://thesaltymarshmallow.com/best-homemade-alfredo-sauce/" target="_blank"><img src="alfredo.jpeg" style="width:1000px;"></a></pre>');
                echo (' <div style="margin-top: 10px; margin-bottom: 25px; margin-right: 217px; margin-left: 210px;text-align: center;">
                        <p>Lighter sauces are great with longer-style noodles like fettuccine. Tagliatelle and pappardelle are also good options. They carry the sauce well and add some good texture to counteract the thin and smooth sauce.</p></div>');
            } else if (
                $search == 'spaghetti' or $search == 'Spaghetti' or $search == 'SPAGHETTI'
                or $search == 'vermicelli' or $search == 'Vermicelli' or $search == 'VERMICELLI'
            ) {
                $found = true;
                echo ("<div>Awesome choice! The match for this pasta shape is:</div>");
                echo ('<a href="https://simply-delicious-food.com/creamy-garlic-seafood-pasta/" target="_blank"><img src="seafoodtxt.png" style="height:120px;"></a>');
                echo ('<pre><a href="https://simply-delicious-food.com/creamy-garlic-seafood-pasta/" target="_blank"><img src="seafood2.jpeg" style="width:1000px;"></a></pre>');
                echo (' <div style="margin-top: 10px; margin-bottom: 25px; margin-right: 217px; margin-left: 210px;text-align: center;">
                        <p>Seafood sauces tend to be lighter, which is why finer noodles are preferred (angel hair, vermicelli, and thin spaghetti noodles). Lighter-style noodles match the texture and lightness of the seafood.</p></div>');
            } else if (
                $search == 'linguine' or $search == 'Linguine' or $search == 'LINGUINE'
                or $search == 'paccheri' or $search == 'Paccheri' or $search == 'PACCHERI') {
                $found = true;
                echo ("<div>Awesome choice! The match for this pasta shape is:</div>");
                echo ('<a href="https://www.christinascucina.com/authentic-quick-italian-tomato-sauce/" target="_blank"><img src="tomatotxt.png" style="height:120px;"></a>');
                echo ('<pre><a href="https://www.christinascucina.com/authentic-quick-italian-tomato-sauce/" target="_blank"><img src="totato.jpeg" style="width:1000px;"></a></pre>');
                echo (' <div style="margin-top: 10px; margin-bottom: 25px; margin-right: 217px; margin-left: 210px;text-align: center;">
                        <p>Long, thin shapes are great here. The sauce pairs well with shapes such as spaghetti, linguine, or angel hair, and binds well with the thin noodle.</p></div>');
            } else if (
                $search == 'orecchiette' or $search == 'Orechiette' or $search == 'ORECCHIETTE'
                or $search == 'anelli' or $search == 'Anelli' or $search == 'ANELLI'
                or $search == 'foglie' or $search == 'Foglie' or $search == 'FOGLIE'
            ) {
                $found = true;
                echo ("<div>Awesome choice! The match for this pasta shape is:</div>");
                echo ('<a href="https://www.bbcgoodfood.com/recipes/pasta-tomato-hidden-veg-sauce" target="_blank"><img src="vegetabletxt.png" style="height:120px;"></a>');
                echo ('<pre><a href="https://www.bbcgoodfood.com/recipes/pasta-tomato-hidden-veg-sauce" target="_blank"><img src="vegetable.jpeg" style="width:1000px;"></a></pre>');
                echo (' <div style="margin-top: 10px; margin-bottom: 25px; margin-right: 217px; margin-left: 210px;text-align: center;">
                        <p>Anelli and orecchiette, both smaller and larger cup sizes, are good to use with this kind of sauce. They lend themselves to a good texture on the palate and hold the sauce well so you get a perfect bite on the spoon.</p></div>');
            } else if (
                $search == 'ravioli' or $search == 'Ravioli' or $search == 'RAVIOLI'
                or $search == 'tortellini' or $search == 'Tortellini' or $search == 'TORTELLINI'
                or $search == 'farfalle' or $search == 'Farfalle' or $search == 'FARFALLE'
                or $search == 'campanelle' or $search == 'Campanelle' or $search == 'CAMPANELLE'
            ) {
                $found = true;
                echo ("<div>Awesome choice! The match for this pasta shape is:</div>");
                echo ('<a href="https://happilyunprocessed.com/butter-garlic-cream-sauce/" target="_blank"><img src="oilbuttertxt.png" style="height:120px;"></a>');
                echo ('<pre><a href="https://happilyunprocessed.com/butter-garlic-cream-sauce/" target="_blank"><img src="oil.jpeg" style="width:1000px;"></a></pre>');
                echo (' <div style="margin-top: 10px; margin-bottom: 25px; margin-right: 217px; margin-left: 210px;text-align: center;">
                        <p>In this case, campanelle, farfalle and  especially stuffed pastas are the way to go. A filled pasta like ravioli or tortellini is like a present where all the good stuff is inside. With an oil- or butter-based sauce, you’re able to get a nice coating of flavor to glaze what’s inside the pasta.</p></div>');
            } else if (
                $search == 'fusilli' or $search == 'Fusilli' or $search == 'PENNE'
                or $search == 'cavatappi' or $search == 'Cavatappi' or $search == 'CAVATAPPI'
                or $search == 'rotini' or $search == 'Rotini' or $search == 'ROTINI'
                or $search == 'casarecce' or $search == 'Casarecce' or $search == 'CASARECCE'
                or $search == 'gemelli' or $search == 'Gemelli' or $search == 'GEMELLI'
            ) {
                $found = true;
                echo ("<div>Awesome choice! The match for this pasta shape is:</div>");
                echo ('<a href="https://shewearsmanyhats.com/creamy-pesto-pasta-oh-my/"><img src="pestotxt.png" style="height:120px;"></a>');
                echo ('<pre><a href="https://shewearsmanyhats.com/creamy-pesto-pasta-oh-my/"><img src="pesto.jpeg" style="width:1000px;"></a></pre>');
                echo (' <div style="margin-top: 10px; margin-bottom: 25px; margin-right: 217px; margin-left: 210px;text-align: center;">
                        <p>Fusilli, cavatappi, gemelli and rotini are good options. The curves and grooves in each hold pesto sauces well and allow for the herb-based oil to stick to the pasta.</p></div>');
            }
        }

        ?>
    </div>
        <pre>





        </pre>
       
    <div style="background-color:black;color:white;padding:15px;margin-top:95px;">
        <a href="index.php">
            <img src="logoalb.png" style="height: 30px;margin-left:35px;"></a>
            <p style="margin-left:39px;"> If you have any questions, please do not hesitate to contact us either on our social media below or via our <a href="contact form.php" style="color: white;">designated form.</a></p>
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
<!-- PHP CODE -->

<?php
$name = "";
$organization = "";
$email = "";
$contact_number = "";
$message = "";
$nameErr = "";
$organizationErr = "";
$emailErr = "";
$contact_numberErr = "";
$messageErr = "";
$successMessage = "";




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        header("refresh:4");
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {

            $nameErr = "Only letters and white space allowed";
            header("refresh:4");
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        header("refresh:4");
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            header("refresh:4");
        }
    }

    if (empty($_POST["organization"])) {
        $organizationErr = "Organization name is required";
        header("refresh:4");
    } else {
        $organization = test_input($_POST["organization"]);
    }

    if (empty($_POST["contact_number"])) {
        $contact_numberErr = "Contact number is required";
        header("refresh:4");
    } else {
        $contact_number = test_input($_POST["contact_number"]);
        if (!preg_match("/^\d{10}$/", $contact_number)) {
            $contact_numberErr = "Invalid contact number";
            header("refresh:4");
        }
    }

    if (empty($_POST["message"])) {
        $messageErr = "Message is required";
        header("refresh:4");
    } else {
        $message = test_input($_POST["message"]);
    }

    if (empty($nameErr) && empty($emailErr) && empty($organizationErr) && empty($contact_numberErr) && empty($messageErr)) {
        $successMessage = "Form submitted successfully!" ;
        $name = $email = $organization = $contact_number = $message = "";
        header("refresh:5");
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


<!-- HTML CODE -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="figma.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    

    <title>OneStop NDT - Figma</title>

    <!-- <style>
        .error { color: red; }
        .success { color: green; }
    </style> -->
</head>

<body>
    <section id="logo">

        <img src="./images/onestopndt.svg" alt="">
    </section>

    <section id="frm">

        <div id="text">
            <h1>Got any question?</h1>
            <h5>lets discuss it over a cup of cofee.</h5>
            <br>
            <div id="showmsg">
                <span style="color: aqua">
                    <?php echo $successMessage ?>
                </span><br>
                <span style="color: red">
                    <?php echo $nameErr ?>
                </span> <br>
                <span style="color: yellow">
                    <?php echo $emailErr ?>
                </span> <br>
                <span style="color: black">
                    <?php echo $organizationErr ?>
                </span> <br>
                <span style="color: green">
                    <?php echo $contact_numberErr ?>
                </span> <br>
                <span style="color: blue">
                    <?php echo $messageErr ?>
                </span>

            </div>

        </div>
        <form method="POST">
            <div>
                <input type="text" id="name" name="name" placeholder="name">
                <input type="text" id="organization" name="organization" placeholder="organization name">
                <br>
            </div>
            <div>
                <input type="text" id="email" name="email" placeholder="email id">
                <input type="text" id="contact_number" name="contact_number" placeholder="contact number">
            </div>
            <div>
                <input type="text" id="message" name="message" placeholder="messege">
                <button name="submit" type="submit">submit >></button>
            </div>


        </form>

    </section>

    <section id="map">
        <div id="ndt">
            <h1>OnestopNDT</h1>
            <p>PAP Rabale MIDC Near Dol Electric <br> Company Rabale MIDC, Navi Mumbai - 400701 </p>
            <p>Landline - 022 41310099</p>
            <div id="landline">
                <img src="./images/png google.png" alt="">
                <h5>Google map link</h5>
            </div>
        </div>
        <!-- <img src="./images/gps.avif" alt="" > -->

    </section>

    <section>
        <div id="ftrimg">
            <img src="./images/companies.webp" alt="">
            <img src="./images/jobs.jpg" alt="">
            <img src="./images/article.jpeg" alt="">
            <img src="./images/webinars.jpg" alt="">
            <img src="./images/forums.webp" alt="">
            <img src="./images/app notes.avif" alt="">
        </div>
    </section>

    <section id="footer">

        <img src="./images/onestopndt.svg" alt="">
        <hr>
        <p>What is One Stop NDT?</p>
    </section>
</body>

</html>
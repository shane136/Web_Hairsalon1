<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
$user_id = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>J.HairSalon|Confirmation</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main">
        <h1>J.HairSalon</h1>
        <div class="container">
            <div class="sign-up-content">
                <form method="POST" class="signup-form">                

                    <div class="form-textbox">
                            <label for="name">Confirmation Key:</label>
                            <input type="password" name="key" required style="padding: 16px 20px 16px 160px;"/>
                    </div>

                    <div class="form-group">
                        <input required type="checkbox" name="agree-term" id="agree-term" class="agree-term">
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                    </div>

                    <div class="form-textbox">
                        <input type="submit" name="submit" id="submit" class="submit" value="Finish" />
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

<?php
    if (isset($_POST['submit'])) {
        $key = 'JEREHARIS162K';
        $value = $_POST['key'];

        if ($key == $value) {
            mysqli_query($con, "UPDATE user_account SET status=1 WHERE user_id='$user_id';") or mysqli_error($con);
            header("Location: \\Web_HairSalon\\employee\\empProfile.php");
            ?><script>
                alert('Welcome Employee! Please enter youre details. CLICK Settings.')
            </script><?php
        }else
        {
            ?>
            <script>
                alert('Encorrect Key! Request key to owner if you are an employee here.')
                window.location.href = '/Web_HairSalon/login.php';
            </script>
            <?php
        }
    }
?>
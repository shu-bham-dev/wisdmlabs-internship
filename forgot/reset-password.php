
<html>
    <head>
        <title>Reset Password</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <?php
                    include('db.php');
                    if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"] == "reset") && !isset($_POST["action"])) {
                        $key = $_GET["key"];
                        $email = $_GET["email"];
                        $curDate = date("Y-m-d H:i:s");

                        $query2 = "SELECT * FROM `password_reset_temp` WHERE `key`='" . $key . "' and `email`='" . $email . "' ";
                        $res11 = $conn->prepare($query2);
                        $res11->execute();

                        $row = $res11->rowCount();
                        if ($row == "") {
                            $error .= '<h2>Invalid Link</h2>';
                        } else {
                            $row = $res11->fetchAll(PDO::FETCH_ASSOC);
                            // $expDate = $row['expDate'];
                            $expDate = '2022-01-19 08:20:27';
                            if ($expDate >= $curDate) {
                                ?>

                                <h2>Reset Password</h2>   
                                <form method="post" action="" name="update">

                                    <input type="hidden" name="action" value="update" class="form-control"/>


                                    <div class="form-groups">
                                        <label><strong>Enter New Password:</strong></label>
                                        <input type="password"  name="pass1" value="update" class="form-control"/>
                                    </div>

                                    <div class="form-groups">
                                        <label><strong>Re-Enter New Password:</strong></label>
                                        <input type="password"  name="pass2" value="update" class="form-control"/>
                                    </div>
                                    <input type="hidden" name="email" value="<?php echo $email; ?>"/>
                                    <div class="form-groups">
                                        <input type="submit" id="reset" value="Reset Password"  class="btn btn-primary"/>
                                    </div>

                                </form>


                                <?php
                            } else {
                                $error .= "<h2>Link Expired</h2>>";
                            }
                        }
                    }


                    if (isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"] == "update")) {
                        $error = "";
                        $pass1 = $_POST["pass1"];
                        $pass2 = $_POST["pass2"];
                        $email = $_POST["email"];
                        $curDate = date("Y-m-d H:i:s");
                        if ($pass1 != $pass2) {
                            $error .= "<p>Password do not match, both password should be same.<br /><br /></p>";
                        }
                        if ($error != "") {
                            echo $error;
                        } else {
                            $pass1 = md5($pass1);
                            $sql2 = "UPDATE `phptask` SET `password` = '". $pass1 ."' WHERE `email` = '" . $email . "'";
                            $res2 = $conn->query($sql2);
                            
                            $sql3 = "DELETE FROM `password_reset_temp` WHERE `email` = '$email'";
                            $res3 = $conn->query($sql3);

                            // $message = "Congratulations! Your password has been updated successfully.";
                            // echo "<script type='text/javascript'>alert('$message');</script>";
                            echo "<div class='error'><p>Congratulations! Your password has been updated successfully.</p><br>
                            <button id='home'><a href='../home'>Home</a></button> ";
                            // header("location: ../home");
                        }
                    }
                    ?>

                </div>
                <div class="col-md-4"></div>
            </div>
        </div>


    </body>
</html>
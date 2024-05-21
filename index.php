<?php
session_start();
error_reporting(0);
include ('includes/dbconnection.php');
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM tbladmin WHERE UserName=:username and Password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        foreach ($results as $result) {
            $_SESSION['odmsaid'] = $result->ID;
            $_SESSION['login'] = $result->username;
            $_SESSION['permission'] = $result->AdminName;
            $get = $result->Status;
        }
        $aa = $_SESSION['odmsaid'];
        $sql = "SELECT * from tbladmin  where ID=:aa";
        $query = $dbh->prepare($sql);
        $query->bindParam(':aa', $aa, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $cnt = 1;
        if ($query->rowCount() > 0) {
            foreach ($results as $row) {
                if ($row->Status == "1") {
                    echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";

                } else {
                    echo "<script>
                    alert('Your account was disabled Approach Admin');document.location ='index.php';
                    </script>";
                }
            }
        }
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php @include ("includes/head.php"); ?>

<body>

    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth p-0">
                <div class="row flex-grow">
                    <div class="col-md-4 p-0">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo" align="center">
                                <img class="img-avatar mb-3" src="assets/img/companyimages/logo.jpg" alt=""><br>
                                <h4 class="text-muted mt-4">
                                    Welcome Administrator !
                                </h4>
                            </div>
                            <form role="form" id="" method="post" enctype="multipart/form-data" class="">
                                <div class="form-group first">
                                    <input type="text" class="form-control form-control-lg" name="username"
                                        id="exampleInputEmail1" placeholder="Username" required>
                                </div>
                                <div class="form-group last">
                                    <input type="password" name="password" class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="Password" required>
                                </div>
                                <div class="mt-3">
                                    <button name="login"
                                        class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn">SIGN
                                        IN</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    <a href="forgot_password.php" class="text-secondary">
                                        Forgot Password
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-8 p-0">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="assets/img/companyimages/main_bg.jpg"
                                        alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100"
                                        src="https://hire4event.com/blogs/wp-content/uploads/2019/03/Type-of-events.jpg"
                                        alt="Second slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <?php @include ("includes/foot.php"); ?>


</body>

</html>
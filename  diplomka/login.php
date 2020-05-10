<?php  ?>
<?php
require_once "functions.php";
if (isset($_POST['login'])) {
 $errors = array();
 $data = $_POST;
 $admin = find_user($data['login']);

    if($admin){
        if ($data['password'] == $admin->password) {
            $_SESSION['logged_user'] = $admin;
            header('Location: /');
        } else {
            $errors[] = 'Пароль введен не верно!';
        }
    } else {
         $errors[] = 'Вы не зарегистрированы!';
    }
  }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Авторизация</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Styles -->
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body style="background-image: URL(assets/images/switzerland-shveycariya-pole-6034.jpg)">

    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="login-content">
                        <br><br><br>
                        <div class="login-form">
                            <h4>Авторизация</h4>
                            <form method="post">
                                <div class="form-group">
                                    <label>Логин</label>
                                    <input type="text" class="form-control" placeholder="example" name="login">
                                </div>
                                <div class="form-group">
                                    <label>Пароль</label>
                                    <input type="password" class="form-control" placeholder="***" name="password">
                                </div>

                                <button type="login" class="btn btn-primary btn-flat m-b-30 m-t-30">Вход</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

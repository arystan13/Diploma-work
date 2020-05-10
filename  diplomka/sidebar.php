<?php  ?>
<?php require_once "functions.php";
if (!$_SESSION['logged_user'])  {
    header('Location: /login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>АРМ</title>
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
    <link href="assets/css/lib/select2/select2.min.css" rel="stylesheet">
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/modal.css" rel="stylesheet">
    <script>
			function openDialog() {
				Avgrund.show( "#default-popup" );
			}
			function closeDialog() {
				Avgrund.hide();
			}
		</script>
</head>

<body>
<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
            <div class="nano">
                <div class="nano-content">
                    <div class="logo"><a href="index.php"> <img src="assets/images/logo.png" alt="" /> <span><br> Automated workplace</span></a></div>
                    <ul>
                        <li class="label">Functions</li>
                        <li class="<?= $index ?>"><a href="rup_list.php"><i class="ti-book"></i> Ведение учебного плана </a></li>
                        <li class="<?= $lecturers ?>"><a href="lecturers_view.php"><i class="fa fa-id-card-o" aria-hidden="true"></i>  ППС </a></li>
                        <li class="<?= $students ?>"><a href="students_view.php"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Студенты</a></li>
                        <li class="<?= $fond ?>"><a href="subjects_fond.php"><i class="fa fa-folder-o" aria-hidden="true"></i> Фонд дисциплин</a></li>
                        <li><a href="subjects_view.php"><i class="fa fa-bookmark" aria-hidden="true"></i> Дисциплины</a></li>
                        <li><a href="groups_view.php"><i class="fa fa-users" aria-hidden="true"></i> Группы</a></li>

                        </li>
                        <!-- <li><a href="../documentation/index.html"><i class="ti-file"></i> Документация</a></li> -->
                        <li><a href="logout.php"><i class="ti-close"></i> Выйти</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /# sidebar -->

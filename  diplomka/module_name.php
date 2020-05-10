  <?php require_once 'sidebar.php'; ?>
  <?php require_once 'header.php'; ?>


    <?php
    if (isset($_POST['val-username'])) {
    $success = add_module($_POST['val-username']);
        if($success == 'error') {
      echo 'Неизвестная ошибка';
        }
    }
    ?>

	<div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Модули </h1> <div class="card-content ">
							<?php if ($success == 'success' ) {
                                                            echo '<label class="btn btn-success btn sweet-success">Данные успешно сохранены!</label>	';
                                                        } elseif ($success == 'error') {
                                                            echo '<div class="alert alert-danger" style="text-align: center">   Произашла какая-то ошибка!</div>';
                                                    }
                                                        ?>
                                                    </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">База данных</a></li>
                                    <li class="breadcrumb-item active">Модули</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-validation">
                                        <form class="form-valide" method="post">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">Названия модуля <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="val-username" name="val-username" placeholder="Введи названия модуля">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-8 ml-auto">
                                                    <button type="submit" class="btn btn-success">Отправить</button>
                                                </div>
                                            </div>

                                        </form>
                                        <div class="col-lg-8 ml-auto">
                                            <a href="/"><button type="submit" name="back" class="btn btn-danger">Назад</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p>2018 © Admin Board. - <a href="#">by Timabay Zhandos with Free Template XD from themewagon.com </a></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div id="search">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
    <!-- jquery vendor -->
    <script src="assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->

    <!-- bootstrap -->
    <!-- Select2 -->
    <script src="assets/js/lib/select2/select2.full.min.js"></script>
    <!-- Form validation -->
    <script src="assets/js/lib/form-validation/jquery.validate.min.js"></script>
    <script src="assets/js/lib/form-validation/jquery.validate-init.js"></script>
    <script src="assets/js/scripts.js"></script>
    <!-- scripit init-->
</body>

</html>

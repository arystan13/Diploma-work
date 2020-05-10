<?php $lecturers = "active"; require_once 'sidebar.php'; ?>
<?php require_once 'header.php'; ?>

<?php $data = $_POST;
if (isset($_POST['submit'])) {
  //if($_POST['head']==true) $head = 1; else $head = 0;
  //if($_POST['pps']==true) $pps = 1; else $pps = 0;
$success = add_lecturers($_POST);
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
                            <h1>Добавить преподавателя </h1> <div class="card-content ">
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
                                    <form class="form-valide" action="#" method="post">

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="full_name">Ф.И.О <span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <input type="text" value="<?php echo @$data['full_name']; ?>" class="form-control" id="full_name" name="full_name" placeholder="Введите Ф.И.О преподавателя">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="stepen">Степень <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="stepen_id">
                                                    <option value="<?php echo @$data['stepen_id']; ?>"><?php if(isset($data['stepen_id'])) {$saved_data = get_sql('select title from stepen where id = '.$data['stepen_id']);  echo $saved_data[0]["title"];}  else echo 'Выберите степень'; ?></option>
                                                <?php $names = get_sql('select id, title from stepen'); ?>
                                                <?php foreach ($names as $name): ?>
                                                    <option value="<?= $name['id'] ?>"><?= $name['title'] ?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="full_name">Степень доп. <span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <input type="text" value="<?php echo @$data['stepen_plus']; ?>" class="form-control" id="full_name" name="stepen_plus" placeholder="Например: Кандидат... технических наук ">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="stepen">Должность <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="position_id">
                                                    <option value="<?php echo @$data['position_id']; ?>"><?php if(isset($data['position_id'])) {$saved_data = get_sql('select title from position where id = '.$data['position_id']);  echo $saved_data[0]["title"];}  else echo 'Выберите должность'; ?></option>
                                                <?php $names = get_sql('select id, title from position'); ?>
                                                <?php foreach ($names as $name): ?>
                                                    <option value="<?= $name['id'] ?>"><?= $name['title'] ?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="head">Зав. кафедры <span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <input type="checkbox" value="1" style="width: 20px; height: 40px;" class="" id="head" name="head" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="pps">ППС <span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <input type="checkbox" value="1" style="width: 20px; height: 40px;"  class="" id="pps" name="pps" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" name="submit" class="btn btn-success">Отправить</button>
                                            </div>
                                        </div>

                                    </form>
                                    <div class="form-group row">

                                        <div class="col-lg-8 ml-auto">
                                            <a href="/lecturers_view.php"><button type="submit" name="back" class="btn btn-danger">Назад</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer">

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

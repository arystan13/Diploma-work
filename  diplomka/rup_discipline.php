<?php $index = "active"; require_once 'sidebar.php'; ?>
<?php require_once 'header.php'; ?>

<?php $data = $_POST;
if($_GET['rup_id']) $rup_id = $_GET['rup_id']; else $rup_id = $_POST['rup_id'];
if (isset($_GET['submit'])) {
$success = add_rup_dsicipline($_GET, $rup_id);
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
                            <h1>Учебный план</h1> <div class="card-content ">
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
                              <?php $rups = get_sql('select * from rup'); ?>
                                <li class="breadcrumb-item"><a href="#">База данных</a></li>
                                <li class="breadcrumb-item active">Учебный план</li>
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
                                    <form class="form-valide" action="portal.php" method="get">
                                        <input type="text" class="hidden" name="rup_id" value="<?= $_GET['rup_id'] ?>">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Дисциплина<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="discipline_id">
                                                    <option value="<?php echo @$data['id']; ?>"><?php if(isset($data['id'])) {$saved_data = get_sql('select discipline_name from discipline where id = '.$data['id']);  echo @$saved_data[0]['title'];}  else echo 'Выберите дисциплину'; ?></option>
                                                <?php $names = get_sql('select id, discipline_name from discipline'); ?>
                                                <?php foreach ($names as $name): ?>
                                                    <option value="<?= $name['id'] ?>"><?= $name['discipline_name'] ?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" name="submit" class="btn btn-success">Добавить</button>
                                            </div>
                                        </div>

                                    </form>
                                    <div class="form-group row">
                                        <div class="col-lg-8 ml-auto">
                                            <a href="/rup_discipline_view.php?rup_id=<?= $_GET['rup_id'] ?>"><button type="submit" name="back" class="btn btn-danger">Назад</button></a>
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

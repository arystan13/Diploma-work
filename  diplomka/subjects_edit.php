<?php require_once 'sidebar.php'; ?>
<?php require_once 'header.php'; ?>
<?php $data = $_POST;
if (isset($_POST['submit'])) {
$success = update_subject($_POST, $_GET['subject_id']);
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
                            <h1>Дисциплины</h1> <div class="card-content ">
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
                                <li class="breadcrumb-item active">Дисциплины</li>
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
                                      <?php $subject = get_sql('select * from discipline where id = '.$_GET['subject_id']); ?>
                                      <div class="form-group row">
                                          <label class="col-lg-4 col-form-label" for="val-username"> Наименования дисциплины <span class="text-danger">*</span></label>
                                          <div class="col-lg-8">
                                              <input type="text" class="form-control" id="val-username" name="discipline_name" value="<?= $subject[0]['discipline_name']; ?>" placeholder="Введи наименования дисциплины" required>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-lg-4 col-form-label" for="val-username">Код дисциплины <span class="text-danger">*</span></label>
                                          <div class="col-lg-8">
                                              <input type="text" class="form-control" id="val-username" value="<?= $subject[0]['discipline_code']; ?>" name="discipline_code" placeholder="Введи код дисциплины" required>
                                          </div>
                                      </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Тип дисциплины<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="discipline_type_id" required>

                                                    <option value="<?= $subject[0]['discipline_type_id'] ?>"><?php if(isset($subject[0]['discipline_type_id'])) {$saved_data = get_sql('select discipline_type_title from disciplinetype where id = '.$subject[0]['discipline_type_id']);  echo @$saved_data[0]['discipline_type_title'];}  else echo 'Выберите вид дисциплины'; ?></option>
                                                <?php $modules = get_sql('select * from disciplinetype'); ?>
                                                <?php foreach ($modules as $module): ?>
                                                    <option value="<?= $module['id'] ?>"><?= $module['discipline_type_title'] ?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Тип компонента<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="component_type_id" required>

                                                    <option value="<?php echo @$data['component_type_id'] ?>"><?php if(isset($data['component_type_id'])) {$saved_data = get_sql('select component_type_title from componenttype where id = '.$data['component_type_id']);  echo @$saved_data[0]['component_type_title'];}  else echo 'Выберите вид компонента'; ?></option>
                                                <?php $modules = get_sql('select * from componenttype'); ?>
                                                <?php foreach ($modules as $module): ?>
                                                    <option value="<?= $module['id'] ?>"><?= $module['component_type_title'] ?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Язык обучения<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="language_id" required>
                                                    <option value="<?php echo @$data['language_id']; ?>"><?php if(isset($data['language_id'])) {$saved_data = get_sql('select title from language where id = '.$data['language_id']);  echo @$saved_data[0]['title'];}  else echo 'Выберите язык обучения'; ?></option>
                                                <?php $names = get_sql('select id, title from language'); ?>
                                                <?php foreach ($names as $name): ?>
                                                    <option value="<?= $name['id'] ?>"><?= $name['title'] ?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                     <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Названия модуля<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="module_name_id" required>

                                                    <option value="<?php echo @$data['module_name_id'] ?>"><?php if(isset($data['module_name_id'])) {$saved_data = get_sql('select module_name from modulename where id = '.$data['module_name_id']);  echo @$saved_data[0]['module_name'];}  else echo 'Выберите вид модуля'; ?></option>
                                                <?php $modules = get_sql('select id, module_name from modulename'); ?>
                                                <?php foreach ($modules as $module): ?>
                                                    <option value="<?= $module['id'] ?>"><?= $module['module_name'] ?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="module_number">Номер модуля <span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="module_number" value="<?php echo @$data['module_number']; ?>" name="module_number" placeholder="Введи номер модуля" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                           <label class="col-lg-4 col-form-label" for="val-username">Курсовая работа<span class="text-danger">*</span></label>
                                           <div class="col-lg-8">
                                               <input type="text" class="form-control" id="val-username" name="course_work" value="<?php echo @$data['course_work']; ?>" placeholder="Введите курсавую работу" required>
                                           </div>
                                       </div>
                                        <div class="form-group row">
                                           <label class="col-lg-4 col-form-label" for="val-username">Экзамены <span class="text-danger">*</span></label>
                                           <div class="col-lg-8">
                                               <input type="text" class="form-control" id="val-username" name="exam" value="<?php echo @$data['exam']; ?>" placeholder="Введите экзамен" required>
                                           </div>
                                       </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-success" name="submit">Отправить</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="form-group row">
                                        <div class="col-lg-8 ml-auto">
                                            <a href="subjects_view.php"><button type="submit" name="back" class="btn btn-danger">Назад</button></a>
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

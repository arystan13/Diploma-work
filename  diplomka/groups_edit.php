<?php $groups = "active"; require_once 'sidebar.php'; ?>
<?php require_once 'header.php'; ?>
<?php $data = $_POST;
if (isset($_POST['submit'])) {
$success = update_group($_POST, $_GET['group_id']);
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
                            <h1>Редактировать </h1> <div class="card-content ">
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
                                <li class="breadcrumb-item active">Студенты</li>
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
                                      <?php $group = get_sql("select * from groups where id = ".$_GET['group_id']); ?>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="group">Код группы <span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="group" name="group" value="<?= $group[0]['group_name']; ?>" placeholder="Введите код группы">
                                            </div>
                                        </div>
                                          <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Специальность<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="spec_id">
                                                    <option value="<?= $group[0]['spec_id']; ?>"><?php if(isset($group[0]['spec_id'])) {$saved_data = get_sql('select title from spec where id = '.$group[0]['spec_id']);  echo @$saved_data[0]['title'];}  else echo 'Выберите специальность'; ?></option>
                                                <?php $names = get_sql('select id, title from spec'); ?>
                                                <?php foreach ($names as $name): ?>
                                                    <option value="<?= $name['id'] ?>"><?= $name['title'] ?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                              <label class="col-lg-4 col-form-label" for="val-skill">Степень<span class="text-danger">*</span></label>
                                              <div class="col-lg-6">
                                                  <select class="form-control" id="val-skill" name="degree_id">
                                                      <option value="<?= $group[0]['degree_id']; ?>"><?php if(isset( $group[0]['degree_id'])) {$saved_data = get_sql('select title from degree where id = '.$group[0]['degree_id']); echo @$saved_data[0]['title']; }  else echo 'Выберите стпень группы'; ?></option>
                                                  <?php $names = get_sql('select id, title from degree'); ?>
                                                  <?php foreach ($names as $name): ?>
                                                      <option value="<?= $name['id'] ?>"><?= $name['title'] ?></option>
                                                  <?php endforeach; ?>
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label class="col-lg-4 col-form-label" for="mode_id">Форма обучения<span class="text-danger">*</span></label>
                                              <div class="col-lg-6">
                                                  <select class="form-control" id="mode_id" name="mode_id">
                                                      <option value="<?=  $group[0]['mode_id']; ?>"><?php if(isset($group[0]['mode_id'])) {$saved_data = get_sql('select title from mode where id = '. $group[0]['mode_id']);  echo @$saved_data[0]['title'];}  else echo 'Выберите форму обучения'; ?></option>
                                                  <?php $names = get_sql('select id, title from mode'); ?>
                                                  <?php foreach ($names as $name): ?>
                                                      <option value="<?= $name['id'] ?>"><?= $name['title'] ?></option>
                                                  <?php endforeach; ?>
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label class="col-lg-4 col-form-label" for="val-skill">Язык обучения<span class="text-danger">*</span></label>
                                              <div class="col-lg-6">
                                                  <select class="form-control" id="val-skill" name="language_id">
                                                      <option value="<?=  $group[0]['language_id']; ?>"><?php if(isset($group[0]['language_id'])) {$saved_data = get_sql('select title from language where id = '.$group[0]['language_id']);  echo @$saved_data[0]['title'];}  else echo 'Выберите язык обучения'; ?></option>
                                                  <?php $names = get_sql('select id, title from language'); ?>
                                                  <?php foreach ($names as $name): ?>
                                                      <option value="<?= $name['id'] ?>"><?= $name['title'] ?></option>
                                                  <?php endforeach; ?>
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label class="col-lg-4 col-form-label" for="enter_year">Начальный год<span class="text-danger">*</span></label>
                                              <div class="col-lg-8">
                                                  <input type="text" class="form-control" id="enter_year" name="enter_year" placeholder="Введи год начало" value="<?=  $group[0]['enter_year'] ?>">
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label class="col-lg-4 col-form-label" for="val-skill">РУП:<span class="text-danger">*</span></label>
                                              <div class="col-lg-6">
                                                  <select class="form-control" id="val-skill" name="rup_id" required>
                                                      <option value="<?=  $group[0]['rup_id']; ?>">
                                                      <?php if(isset($group[0]['rup_id'])) {
                                                        $saved_data = get_sql('select * from rup where id = '.$group[0]['rup_id']);
                                                        $spec = get_sql('select title from spec where id ='.$saved_data[0]["spec_id"]);
                                                        $degree = get_sql("select title from degree where id =".$saved_data[0]["degree_id"]);
                                                        $language = get_sql("select title from language where id =".$saved_data[0]["language_id"]);
                                                        echo '
                                                        <label id="grup">'.$spec[0]["title"].' | </label>
                                                        <label id="grup">'.$degree[0]["title"].'  | </label>
                                                        <label id="subj">'.$language[0]["title"].' </label>
                                                        ';}  else echo 'Выберите рабочий учебный план'; ?>
                                                      </option>
                                                      <?php $rups = get_sql('select * from rup'); ?>
                                                      <?php foreach ($rups as $rup): ?>
                                                      <option value="<?= $rup['id'] ?>">
                                                        <label id="grup"><?php $result = get_sql("select title from spec where id =".$rup["spec_id"]); echo $result[0]["title"]; ?> | </label>
                                                        <label id="grup"><?php $result = get_sql("select title from degree where id =".$rup["degree_id"]); echo $result[0]["title"]; ?> | </label>
                                                        <label id="subj"><?php $result = get_sql("select title from language where id =".$rup["language_id"]); echo $result[0]["title"]; ?></label>
                                                      </option>
                                                  <?php endforeach; ?>
                                                  </select>
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
                                            <a href="students_view.php"><button type="submit" name="back" class="btn btn-danger">Назад</button></a>
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
<script src="assets/js/lib/jquery.min.js"></script>
<script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
<script src="assets/js/lib/menubar/sidebar.js"></script>
<script src="assets/js/lib/preloader/pace.min.js"></script>
<script src="assets/js/lib/select2/select2.full.min.js"></script>
<script src="assets/js/lib/form-validation/jquery.validate.min.js"></script>
<script src="assets/js/lib/form-validation/jquery.validate-init.js"></script>
<script src="assets/js/scripts.js"></script>
</body>
</html>

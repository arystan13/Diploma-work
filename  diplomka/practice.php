<?php     error_reporting(0);
    ini_set('display_errors', 0); ?>
    <?php include_once 'sidebar.php';  $index ="active";  ?>
    <?php require_once 'header.php'; ?>
    <?php if($_GET['rup_id']) $rup_id = $_GET['rup_id']; ?>
    <?php if($_POST['rup_id']) $rup_id = $_POST['rup_id']; ?>
    <?php $data = $_POST;

    if (isset($_POST['submit'])) {

    $success = add_rups_practicecredits($_POST);
        if($success == 'error') {
      echo 'Неизвестная ошибка';
        }
    }
    ?>
<?php     ?>

	<div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                              <?php $rup_discipline = get_sql("select id from rupdiscipline order by id desc limit 1"); $rupa = $rup_discipline[0]["id"] ?>
                                <h1>Практика</h1> <div class="card-content ">
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
                                    <li class="breadcrumb-item active">Практика</li>
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
                                        <form class="form-valide" action="practice.php?go=yes" method="post">
                                          <?php $req = get_sql("select * from rup where id =".$rup_id);  ?>
                                          <?php $discipline_title_id = get_sql("select discipline_title_id from rupdiscipline where rup_id =".$rup_id." order by id desc limit 1");  ?>
                                          <?php $discipline_title = get_sql("select discipline_name from discipline where id =".$discipline_title_id[0]["discipline_title_id"]);  ?>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="grup">Учебный план:</label>
                                                <input type="text" name="rup_id" class="hidden" value="<?= $_GET['rup_id'] ?>">
                                                <input type="text" name="rup_discipline" class="hidden" value="<?= $rupa ?>">
                                                <div class="col-lg-6">
                                                    <label id="grup"><?php $result = get_sql("select title from spec where id =".$req[0]["spec_id"]); echo $result[0]["title"]; ?> | </label>
                                                    <label id="grup"><?php $result = get_sql("select title from degree where id =".$req[0]["degree_id"]); echo $result[0]["title"]; ?> | </label>
                                                    <label id="subj"><?php echo $discipline_title[0]["discipline_name"]; ?> | </label>
                                                    <label id="subj"><?php $result = get_sql("select title from language where id =".$req[0]["language_id"]); echo $result[0]["title"]; ?></label>
                                                </div>
                                            </div>
                                            <hr><br>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-skill">Форма контроля<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="val-skill" name="semester">
                                                        <option value="<?php echo @$data['semester']; ?>"><?php if(isset($data['semester'])) echo @$data['semester'];  else echo 'Please select'; ?></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-skill">Неделя<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="val-skill" name="week">
                                                        <option value="<?php echo @$data['semester']; ?>"><?php if(isset($data['semester'])) echo @$data['semester'];  else echo 'Please select'; ?></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-skill">Кол-во кредитов<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="val-skill" name="credits">
                                                      <option value="<?php echo @$data['credits']; ?>"><?php if(isset($data['credits'])) echo @$data['credits'];  else echo 'Please select'; ?></option>
                                                      <option value="0">0</option>
                                                      <option value="1">1</option>
                                                      <option value="2">2</option>
                                                      <option value="3">3</option>
                                                      <option value="4">4</option>
                                                      <option value="5">5</option>
                                                      <option value="6">6</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-skill">ECTS<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="val-skill" name="ects">
                                                        <option value="<?php echo @$data['ects']; ?>"><?php if(isset($data['ects'])) echo @$data['ects'];  else echo 'Please select'; ?></option>
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
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
                                                <a href="rup_discipline.php?rup_id=<?php $latest = get_sql("select id from rup order by id desc limit 1"); echo ($latest[0]["id"]); ?>"><button   id="addcredits" type="submit" name="addcredits" class="btn btn-primary hidden">Добавить кредиты</button></a>
                                                <a href="rup_discipline.php?rup_id=<?= $_GET['rup_id'] ?>"><button type="submit" name="back" class="btn btn-danger">Назад</button></a>
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
    <?php if($_GET["go"]=="yes"): ?>
      <script type="text/javascript">
        $("#addcredits").click();

      </script>
    <?php endif; ?>
</body>

</html>

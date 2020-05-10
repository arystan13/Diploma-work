<?php  ?>
<?php
  $students = "active";
  require_once 'sidebar.php';
?>
<?php require_once 'header.php'; ?>

<?php
if ($_GET['student_id']) {
    $result = get_sql("delete from students where id=".$_GET['student_id']);
    if ($result){
        echo "<script>alert('Запись успешно удалена')</script>";

    }
    else {
        echo "<script>alert('Произошла ошибка')</script>";
    }
}
 ?>
 <?php error_reporting(0);
 ini_set('display_errors', 0); ?>
<script language="JavaScript"  type='text/javascript'>

  function del(url)
  {
    if(confirm("Вы действительно хотите удалить?"))
    {
      location.href=url;
    }
    return false;
  }

</script>

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
                                                        echo '<div class="alert alert-danger" style="text-align: center">   Произошла какая-то ошибка!</div>';
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
                                              <div class="card-title">
                                                  <h4>Список всех студентов</h4>
                                              </div>
                                              <div class="card-body">
                                            <div class="inbox-head">

                            <form action="#" class="pull-left position" method="post">
                              <div class="input-append inner-append" >
                                <input type="text" class="sr-input" name="student_name" placeholder="Поиск студента" style="width: 440px;">
                                <button class="btn sr-btn append-btn" name="submit" type="submit"><i class="fa fa-search"></i></button>
                              </div>
                            </form>
                            <a href="students.php" class="btn btn-success pull-right">Добавить <em class="fa fa-plus"></em></a>
                          </div>
                                                  <ul class="list-group">
                                        <?php if($_POST['student_name']): ?>
                                                      <?php $students = get_sql("select * from students s join groups g on s.group_id = g.id where s.full_name like ('%".$_POST['student_name']."%') or g.group_name like ('%".$_POST['student_name']."%')");  ?>
                                                        <?php foreach ($students as $student) : ?>
                                                              <li class="list-group-item">
                                                                <div style="float:left;">
                                                                  <h5 class="list-group-item-heading"><?= $student["full_name"] ?></h5>
                                                                  <p class="list-group-item-text">
                                                                    <?php $group_code = get_sql("select group_name from groups where id = ". $student["group_id"]); echo ($group_code[0]["group_name"]); ?>
                                                                    <?php echo "/ Дата рождения: ".$student['tel']." / ИИН: ".$student['iin']; ?>
                                                                  </p>
                                                                </div>
                                                                  <a href="#" onclick="del('/students_view.php?student_id=<?= $student['id'] ?>')" class="btn btn-danger pull-right" style="10px; width:40px; height: 100%;"><em class="fa fa-trash" ></em></a>
                                                                  <a href="students_edit.php?student_id=<?= $student['id'] ?>" class="btn btn-primary pull-right" style="width:40px; height: 100%; margin-right: 6px; "><em class="fa fa-pencil" ></em></a>
                                                              </li>
                                                        <?php endforeach; ?>
                                                   <?php else: ?>
                                              <?php $students = get_sql("select * from students"); ?>
                                                <?php foreach ($students as $student) : ?>
                                                      <li class="list-group-item">
                                                        <div style="float:left;">
                                                          <h5 class="list-group-item-heading"><?= $student["full_name"] ?></h5>
                                                          <p class="list-group-item-text">
                                                            <?php $group_code = get_sql("select group_name from groups where id = ". $student["group_id"]); echo ($group_code[0]["group_name"]); ?>
                                                            <?php echo "/ Дата рождения: ".$student['tel']." / ИИН: ".$student['iin']; ?>
                                                          </p>
                                                        </div>
                                                          <a href="#" onclick="del('/students_view.php?student_id=<?= $student['id'] ?>')" class="btn btn-danger pull-right" style="10px; width:40px; height: 100%;"><em class="fa fa-trash" ></em></a>
                                                          <a href="students_edit.php?student_id=<?= $student['id'] ?>" class="btn btn-primary pull-right" style="width:40px; height: 100%; margin-right: 6px; "><em class="fa fa-pencil" ></em></a>
                                                      </li>
                                                <?php endforeach; ?>
                                                <?php endif; ?>
                                                  </ul>
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

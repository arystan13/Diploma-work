<?php  ?>
<?php require_once 'sidebar.php'; ?>
<?php require_once 'header.php'; ?>
<?php error_reporting(0);
ini_set('display_errors', 0);
if ($_GET['subject_id']) {
    $result = get_sql("delete from discipline where id=".$_GET['subject_id']);
    if ($result){
        echo "<script>alert('Запись успешно удалена')</script>";

    }
    else {
        echo "<script>alert('Произашло ошибка')</script>";
    }
}
 ?>
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
                                <h1>Дисциплины</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Главная</a></li>
                                    <li class="breadcrumb-item active">РУП</li>
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
                <h4>Список всех дисциплинов</h4>
                <a href="subjects.php" class="btn btn-success pull-right">Добавить <em class="fa fa-plus"></em></a>
            </div>
            <div class="card-body">
                <p class="text-muted m-b-15">Удаляйте или редактируйте предметы</p>


                    <ul class="list-group">
                  <?php $subjects = get_sql("select * from discipline"); ?>
                  <?php foreach ($subjects as $subject) : ?>

                      <li class="list-group-item">
                        <div style="float:left;">
                          <h5 class="list-group-item-heading" style="margin-left: 5px;"><?php echo $subject['discipline_name'] ?></h5>
                          <p class="list-group-item-text"><?= $subject['discipline_code'] ?></p>
                        </div>

                          <a href="#" onclick="del('subjects_view.php?subject_id=<?= $subject['id'] ?>')" class="btn btn-danger pull-right" style="10px; width:40px; "><em class="fa fa-trash" style="vartical-align: middle;" ></em></a>
                          <a href="subjects_edit.php?subject_id=<?= $subject['id'] ?>" class="btn btn-primary pull-right" style="width:40px; margin-right: 6px; "><em class="fa fa-pencil" style="vartical-align: middle;" ></em></a>

                      </li>


                  <?php endforeach; ?>
                  </ul>
            </div>
        </div>
    </div>
</div>


<?php require_once "footer.php" ?>

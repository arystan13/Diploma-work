<?php  ?>
<?php $index = "active"; require_once 'sidebar.php'; ?>
<?php require_once 'header.php'; ?>
<?php
if ($_GET['rup_discipline_id']) {
    $result = get_sql("delete from rupdiscipline where id=".$_GET['rup_discipline_id']);
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
                                <h1>Учебный план</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Главная</a></li>
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
                                              <div class="card-title">
                                                  <h4>Список всех учебных планов</h4>
                                                  <a href="rup_discipline.php?rup_id=<?= $_GET['rup_id'] ?>" class="btn btn-success pull-right">Добавить <em class="fa fa-plus"></em></a>
                                              </div>
                                              <div class="card-body">
                                                  <p class="text-muted m-b-15">Выберите из списка предметы или удаляите их нажав на красную кнопку</p>

                                                  <ul class="list-group">
                                                  <?php $rup_disciplines = get_sql('select * from rupdiscipline where rup_id = '.$_GET['rup_id']); ?>
                                                  <?php foreach ($rup_disciplines as $rup): ?>


                                                      <li href="" class="list-group-item">
                                                      <div style="float: left;">
                                                        <?php $result = get_sql("select discipline_name from discipline where id =".$rup["discipline_title_id"]); echo $result[0]["discipline_name"]; ?>
                                                      </div>


                                                        <a href="#" onclick="del('http://arm/rup_discipline_view.php?rup_id=<?= $_GET['rup_id'] ?>&rup_discipline_id=<?= $rup['id'] ?>')" class="btn btn-danger pull-right" style="width:40px; height: 100%;"><em class="fa fa-trash" style="vertical-align: middle;"></em></a>
                                                        <!-- <a href="#" class="btn btn-primary pull-right" style="width:40px; height: 100%; margin-right: 6px;"><em class="fa fa-pencil" style="vertical-align: middle;"></em></a>
                                                  -->    </li>



                                                  <?php endforeach; ?>
                                                </ul>
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

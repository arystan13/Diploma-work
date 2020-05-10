<?php  ?>
<?php require_once 'sidebar.php'; ?>
<?php require_once 'header.php'; ?>
<?php
if ($_GET['rup_id']) {
    $result = get_sql("delete from rup where id=".$_GET['rup_id']);
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
                                <h1></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Главная</a></li>
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

                          <h1>Automated workplace <br>of the head of the <br>department </h1>
                          <p>Автор: Арыстан Боранқұлов <br> Дипломный руководитель: Ардақ Шалқарбайұлы</p>
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
    <script src="assets/js/lib/weather/jquery.simpleWeather.min.js"></script>

    <!-- scripit init-->

</body>

</html>

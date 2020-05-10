<?php require_once 'sidebar.php'; ?>
<?php require_once 'header.php'; ?>

<?php
if ($_GET['group_id']) {
    $result = get_sql("delete from groups where id=".$_GET['group_id']);
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
                           <div class="card-content ">
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
                                <li class="breadcrumb-item active">Группы</li>
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
                                                  <h4>Список всех групп</h4>

                                              </div>
                                              <div class="card-body">
                                            <div class="inbox-head">

                            <form action="#" class="pull-left position" >
                              <div class="input-append inner-append" >
                                <input type="text" class="sr-input" placeholder="Поиск студента" style="width: 440px;">
                                <button class="btn sr-btn append-btn" type="button"><i class="fa fa-search"></i></button>
                              </div>
                            </form>
                            <a href="groups.php" class="btn btn-success pull-right">Добавить <em class="fa fa-plus"></em></a>
                          </div>
                                                  <ul class="list-group">
                                              <?php $groups = get_sql("select * from groups"); ?>
                                                <?php foreach ($groups as $group) : ?>
                                                      <li class="list-group-item">
                                                        <div style="float:left;">
                                                          <h5 class="list-group-item-heading"><?= $group["group_name"] ?></h5>
                                                          <p class="list-group-item-text"><?= $group["enter_year"] ?></p>
                                                        </div>


                                                          <a href="#" onclick="del('groups_view.php?group_id=<?= $group['id'] ?>')" class="btn btn-danger pull-right" style="10px; width:40px; height: 100%;"><em class="fa fa-trash" ></em></a>
                                                          <a href="groups_edit.php?group_id=<?= $group['id'] ?>" class="btn btn-primary pull-right" style="width:40px; height: 100%; margin-right: 6px; "><em class="fa fa-pencil" ></em></a>
                                                      </li>
                                                <?php endforeach; ?>
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

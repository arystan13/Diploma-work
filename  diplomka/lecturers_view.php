<?php $lecturers = "active"; require_once 'sidebar.php'; ?>
<?php require_once 'header.php'; ?>
<?php $data = $_POST;
if ($_GET['lecturer_id']) {
    $result = get_sql("delete from lecturers where id=".$_GET['lecturer_id']);
    if ($result){
        echo "<script>alert('Запись успешно удалена')</script>";

    }
    else {
        echo "<script>alert('Произашло ошибка')</script>";
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
                                <li class="breadcrumb-item active">Преподаватели</li>
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
                                                  <h4>Преподаватели</h4>

                                              </div>
                                              <div class="card-body">
                                            <div class="inbox-head">

                            <form action="#" class="pull-left position" method="post">
                              <div class="input-append inner-append" >
                                <input type="text" class="sr-input" name="lecturer_name" placeholder="Поиск преподавателя" style="width: 440px;">
                                <button class="btn sr-btn append-btn" name="submit" type="submit"><i class="fa fa-search"></i></button>
                              </div>
                            </form>

                              <a href="lecturers.php" class="btn btn-success pull-right">Добавить <em class="fa fa-plus"></em></a>
                          </div>

                          <ul class="list-group">

                      <?php if($_POST['lecturer_name']): ?>

                        <?php $lecturers = get_sql("select * from lecturers where full_name like '%".$_POST['lecturer_name']."%'");  ?>
                        <?php foreach ($lecturers as $lecturer) : ?>
                        <li class="list-group-item">
                          <div style="float:left;">
                            <h5 class="list-group-item-heading" style="margin-left: 5px;"><?= $lecturer["full_name"] ?></h5>
                            <p>
                              <?php if($lecturer['head']==1) echo "<b>Зав. кафедры</b>  /"; if($lecturer['pps']==1) echo "<b>ППС</b>  /"; $position = get_sql("select title from position where id = ".$lecturer['position_id']);  echo $position[0]['title'].' ';
                            $stepen = get_sql("select title from stepen where id = ".$lecturer['stepen_id']); echo $stepen[0]['title'].' '.$lecturer['stepen_plus'];
                            ?>
                          </p>
                          </div>

                            <a href="#" onclick="del('?lecturer_id=<?= $lecturer['id'] ?>')" class="btn btn-danger pull-right" style="10px; width:40px; "><em class="fa fa-trash" style="vartical-align: middle;" ></em></a>
                            <a href="lecturers_edit.php?lecturer_id=<?= $lecturer['id'] ?>" class="btn btn-primary pull-right" style="width:40px; margin-right: 6px; "><em class="fa fa-pencil" style="vartical-align: middle;" ></em></a>
                            <a href="#" data-modal="modal-name<?= $lecturer['id']?>"  class="btn modal-trigger btn-info pull-right" style="width:40px; margin-right: 6px; "><em class="fa fa-eye" style="vartical-align: middle;" ></em></a>

                            <!-- Modal -->
                             <div class="modal" id="modal-name<?= $lecturer['id']?>" style="text-align: left;">
                               <div class="modal-sandbox"></div>
                               <div class="modal-box">
                                 <div class="modal-header">
                                   <div class="close-modal">&#10006;</div>
                                   <h2>Пед. нагрузка</h2>
                                 </div>
                                 <form class="form-valide" action="ped_nagruzka_view.php" method="get">
                                 <div class="modal-body">
                                   <div class="form-group row">
                                       <label class="col-lg-4 col-form-label" for="val-skill">Год <span class="text-danger">*</span></label>
                                       <div class="col-lg-6">
                                         <select class="form-control" id="val-skill" name="years">
                                             <option value="2018">2018/2019</option>
                                             <option value="2019">2019/2020</option>
                                             <option value="2020">2020/2021</option>
                                             <option value="2021">2021/2022</option>
                                             <option value="2022">2022/2023</option>
                                             <option value="2023">2023/2024</option>
                                             <option value="2024">2024/2025</option>
                                             <option value="2025">2025/2026</option>
                                             <option value="2026">2026/2027</option>
                                             <option value="2027">2027/2028</option>
                                         </select>
                                       </div>
                                   </div>

                                   <input class="hidden" type="text" name="lecturer_id" value="<?= $lecturer['id'] ?>">
                                   <div class="form-group row">
                                       <div class="col-lg-8 ml-auto">
                                           <button type="submit"  class="btn btn-success">Назначить</button>
                                       </div>
                                   </div>
                                 </form>
                                 </div>
                               </div>
                             </div>
                             <!-- /Modal -->

                        </li>
                          <?php endforeach; ?>
                        <?php else: ?>
                            <?php $lecturers = get_sql("select * from lecturers"); ?>
                            <?php foreach ($lecturers as $lecturer) : ?>

                            <li class="list-group-item">
                              <div style="float:left;">
                                <h5 class="list-group-item-heading" style="margin-left: 5px;"><?= $lecturer["full_name"] ?></h5>
                                <p>
                                  <?php if($lecturer['head']==1) echo "<b>Зав. кафедры</b>  /"; if($lecturer['pps']==1) echo "<b>ППС</b>  /"; $position = get_sql("select title from position where id = ".$lecturer['position_id']);  echo $position[0]['title'].' ';
                                $stepen = get_sql("select title from stepen where id = ".$lecturer['stepen_id']); echo $stepen[0]['title'].' '.$lecturer['stepen_plus'];
                                ?>
                              </p>
                              </div>

                                <a href="#" onclick="del('?lecturer_id=<?= $lecturer['id'] ?>')" class="btn btn-danger pull-right" style="10px; width:40px; "><em class="fa fa-trash" style="vartical-align: middle;" ></em></a>
                                <a href="lecturers_edit.php?lecturer_id=<?= $lecturer['id'] ?>" class="btn btn-primary pull-right" style="width:40px; margin-right: 6px; "><em class="fa fa-pencil" style="vartical-align: middle;" ></em></a>
                                <a href="#" data-modal="modal-name<?= $lecturer['id']?>"  class="btn modal-trigger btn-info pull-right" style="width:40px; margin-right: 6px; "><em class="fa fa-eye" style="vartical-align: middle;" ></em></a>

                                <!-- Modal -->
                                 <div class="modal" id="modal-name<?= $lecturer['id']?>" style="text-align: left;">
                                   <div class="modal-sandbox"></div>
                                   <div class="modal-box">
                                     <div class="modal-header">
                                       <div class="close-modal">&#10006;</div>
                                       <h2>Пед. нагрузка</h2>
                                     </div>
                                     <form class="form-valide" action="ped_nagruzka_view.php" method="get">
                                     <div class="modal-body">
                                       <div class="form-group row">
                                           <label class="col-lg-4 col-form-label" for="val-skill">Год <span class="text-danger">*</span></label>
                                           <div class="col-lg-6">
                                             <select class="form-control" id="val-skill" name="years">
                                                 <option value="2018">2018/2019</option>
                                                 <option value="2019">2019/2020</option>
                                                 <option value="2020">2020/2021</option>
                                                 <option value="2021">2021/2022</option>
                                                 <option value="2022">2022/2023</option>
                                                 <option value="2023">2023/2024</option>
                                                 <option value="2024">2024/2025</option>
                                                 <option value="2025">2025/2026</option>
                                                 <option value="2026">2026/2027</option>
                                                 <option value="2027">2027/2028</option>
                                             </select>
                                           </div>
                                       </div>

                                       <input class="hidden" type="text" name="lecturer_id" value="<?= $lecturer['id'] ?>">
                                       <div class="form-group row">
                                           <div class="col-lg-8 ml-auto">
                                               <button type="submit"  class="btn btn-success">Назначить</button>
                                           </div>
                                       </div>
                                     </form>
                                     </div>
                                   </div>
                                 </div>
                                 <!-- /Modal -->

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
<script src="assets/js/modal.js"></script>
<!-- scripit init-->
</body>

</html>

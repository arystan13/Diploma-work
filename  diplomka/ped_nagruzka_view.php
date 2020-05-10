<?php  ?>
<?php $lecturers = "active";  require_once 'sidebar.php'; ?>
<?php require_once 'header.php'; ?>
<?php error_reporting(0);
ini_set('display_errors', 0);
$students_summ = 0; $lecture_summ = 0; $practice_summ = 0; $lab_summ = 0; $srsp_summ = 0;
$practice_work_summ = 0; $course_work_summ = 0; $exam_summ = 0; $tutor_connection_summ = 0;
$diploma_leader_summ = 0; $block_summ = 0; $total_summ = 0;

if (isset($_POST['submit'])) {
  //if($_POST['head']==true) $head = 1; else $head = 0;
  //if($_POST['pps']==true) $pps = 1; else $pps = 0;
$success = update_pednagruzka($_POST);
    if($success == 'error') {
  echo 'Неизвестная ошибка';
    }
}

if (isset($_POST['submit_state'])) {
  //if($_POST['head']==true) $head = 1; else $head = 0;
  //if($_POST['pps']==true) $pps = 1; else $pps = 0;
$success = update_lecturer_state($_POST);
    if($success == 'error') {
  echo 'Неизвестная ошибка';
    }
}
?>
<?php
if ($_GET['pednagruzka_id']) {
    $result = get_sql("delete from pednagruzka where id=".$_GET['pednagruzka_id']);
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
                              <h4 id="zag">Рабочий учебный план</h4>
                              <label for="zag">по модульной образовательной программе</label>
                            </div>

                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">База данных</a></li>
                                    <li class="breadcrumb-item active">РУП</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <div class="row">

                  <div class="col-lg-3">
                    <h6>Преподаватель: <?php $teacher = get_sql("select * from lecturers where id = ".$_GET['lecturer_id']); echo $teacher[0]['full_name'] ?></h6>

                    <h6>Год: <?php echo ($_GET['years']."-".($_GET['years']+1)) ?></h6>
                    <h6>Штатная единица: <?= $teacher[0]['state']  ?></h6><a class="btn btn-chain modal-trigger" data-modal="modal-name-state" href="#" style="width:40px; height: 100%;"><i class="fa fa-usd" aria-hidden="true"></i></a>

                    <!-- Modal -->
                     <div class="modal" id="modal-name-state" style="text-align: left;">
                       <div class="modal-sandbox"></div>
                       <div class="modal-box">
                         <div class="modal-header">
                           <div class="close-modal">&#10006;</div>
                           <h2>Изменить штатную единицу</h2>
                         </div>
                         <form class="form-valide" action="#" method="post">
                         <div class="modal-body">
                           <div class="form-group row">
                               <label class="col-lg-4 col-form-label" for="full_name">Штатная единица <span class="text-danger">*</span></label>
                               <div class="col-lg-8">
                                   <input type="text" class="form-control" id="full_name" name="state" placeholder="Введите $$$">
                               </div>
                           </div>


                           <input class="hidden" type="text" name="lecturer_id" value="<?= $teacher[0]['id'] ?>">

                           <div class="form-group row">
                               <div class="col-lg-8 ml-auto">
                                   <button type="submit" name="submit_state" class="btn btn-success">Сохранить</button>
                               </div>
                           </div>
                         </form>
                         </div>
                       </div>
                     </div>

                  </div>
                  <div class="col-lg-7">
                  </div>

                    <div class="col-lg-2" style="text-align: right;">


                    </div>
            </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-validation">
                                        <table style="width:100%; text-align:center !important; vertical-align: middle;" class="table table-bordered">


<tr>
<th >Наименования дисциплины</th>
<th style="width: 100px;" >Группа</th>
<th >Сем</th>
<th >Кол-во студентов</th>
<th>Лекция</th>
<th>Практическая занятия</th>
<th>Лаборатория</th>
<th>СРСП</th>
<th>Практическая работа</th>
<th>Курсовая работа</th>
<th>Экзамен</th>
<th>Блок</th>
<th>Тьютормен байланыс</th>
<th>Дипломная работа работа</th>
<th><b>Всего</b></th>
<th><b>Всего кредитов</b></th>
<th style="width: 100px;">#</th>


</tr>




            <?php
            $req = get_sql("select * from rupdiscipline r inner join pednagruzka p on r.id = p.rupdiscipline_id where (p.lecturer_id = ".$_GET['lecturer_id'].") and (p.year = ".$_GET['years'].")");
            ?>
            <?php foreach ($req as $re): ?>
              <?php $datas = get_sql("select * from discipline where (id = ".$re['discipline_title_id'].")" ); ?>
						<?php if(!empty($datas)): ?>
            	<?php foreach ($datas as $data): ?>
                <tr>
                    <td><?= $data['discipline_name'] ?></td>
                    <td><?php $group = get_sql("select * from groups where id = ".$re['group_id']); echo $group[0]['group_name']; ?></td>
                    <?php $semester = get_sql('select * from subjectscredits where rupdiscipline_id = '.$re['rupdiscipline_id']); ?>
                    <?php foreach ($semester as  $semester): ?>
                      <td><?= $semester['semester'] ?></td>
                    <?php endforeach; ?>
                    <td><?php $students = get_sql("select count(*) from students where group_id = ".$re['group_id']." group by group_id");  if($students[0]["count(*)"]!="e") {$students_summ += $students[0]["count(*)"];  echo $students[0]["count(*)"];} ?></td>



                    <td><?php if($re['lec']){ $summ = 0; $kz = get_sql('select lek_credits from subjectscredits where rupdiscipline_id = '.$re['rupdiscipline_id']); foreach ($kz as $k) { $summ += (int)$k['lek_credits']; $total_lec += ($summ*15); } echo $lecture = $summ*15; $lecture_summ += $lecture;} else {$lecture = 0;}  ?></td>
                    <td><?php if($re['prac']){ $summ = 0; $kz = get_sql('select pr_credits from subjectscredits where rupdiscipline_id = '.$re['rupdiscipline_id']); foreach ($kz as $k) { $summ += (int)$k['pr_credits']; $total_pr += $summ*15; } echo $practice = $summ*15; $practice_summ += $practice;} else {$practice = 0;} ?></td>
                    <td><?php if($re['lab']){ $summ = 0; $kz = get_sql('select lab_credits from subjectscredits where rupdiscipline_id = '.$re['rupdiscipline_id']); foreach ($kz as $k) { $summ += (int)$k['lab_credits']; $total_lab += $summ*15;} echo $lab = $summ*15; $lab_summ += $lab;} else {$lab = 0;} ?></td>
                    <td><?php $summ = 0; $kz = get_sql('select * from subjectscredits where rupdiscipline_id = '.$re['rupdiscipline_id']);  foreach ($kz as $k) { $summ += ($kz[0]['lek_credits']+$kz[0]['pr_credits']+$kz[0]['lab_credits'])*15; $total_srs += $summ; } echo ($srsp = $summ); $srsp_summ += $srsp;   ?></td>
                    <td><?php echo $re['practice']; $practice_work_summ += $re['practice']; ?></td>
                    <td><?php echo $re['course_work']; $course_work_summ += $re['course_work'];  ?></td>

                    <td><?php $exam += $data['exam']; echo $re['exam']; $exam_summ += $exam; ?></td>
                    <td><?php echo $re['block']; $block_summ += $re['block'];   ?></td>
                    <td><?php echo $re['tutor_connection']; $tutor_connection_summ += $re['tutor_connection']; ?></td>
                    <td><?php echo $re['diploma_leader']; $diploma_leader_summ += $re['diploma_leader']; ?></td>
                    <td><b><?php $summ = 0; echo $summ = $lecture + $practice + $lab + $srsp + $re['practice'] + $re['course_work'] + $re['exam'] + $re['block'] + $re['tutor_connection'] + $re['diploma_leader']; $total_summ += $summ; ?></b></td>
                    <td><b><?php echo number_format($summ/30, 2); ?></b></td>
                    <td colspan="2">
                      <a class="btn btn-chain modal-trigger float-left btn-primary" style="background: #5873fe !important;"  data-modal="modal-name<?= $re['id'] ?>" href="#" style="width:40px; height: 100%;"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                      <a href="#" onclick="del('http://arm/ped_nagruzka_view.php?years=<?= $_GET['years']  ?>&lecturer_id=<?= $_GET['lecturer_id']  ?>&pednagruzka_id=<?= $re['id'] ?>')" class="btn btn-danger pull-right" style="width:40px; height: 100%;"><em class="fa fa-trash" style="vertical-align: middle;"></em></a>

                    </td>


                    <!-- Modal -->
                     <div class="modal" id="modal-name<?= $re['id'] ?>" style="text-align: left;">
                       <div class="modal-sandbox"></div>
                       <div class="modal-box">
                         <div class="modal-header">
                           <div class="close-modal">&#10006;</div>
                           <h2>Изменить нагрузку</h2>
                         </div>
                         <form class="form-valide" action="#" method="post">
                         <div class="modal-body">
                           <div class="form-group row">
                               <label class="col-lg-4 col-form-label" for="full_name">Практика <span class="text-danger">*</span></label>
                               <div class="col-lg-8">
                                   <input type="text" class="form-control" id="full_name" name="practice" placeholder="Введите практику">
                               </div>
                           </div>
                           <div class="form-group row">
                               <label class="col-lg-4 col-form-label" for="full_name">Курсовая работа <span class="text-danger">*</span></label>
                               <div class="col-lg-8">
                                   <input type="text" class="form-control" id="full_name" name="course_work" placeholder="Введите курсавую работу">
                               </div>
                           </div>
                           <div class="form-group row">
                               <label class="col-lg-4 col-form-label" for="full_name">Экзамен <span class="text-danger">*</span></label>
                               <div class="col-lg-8">
                                   <input type="text" class="form-control" id="full_name" name="exam" placeholder="Введите курсавую работу">
                               </div>
                           </div>
                           <div class="form-group row">
                               <label class="col-lg-4 col-form-label" for="full_name">Блок <span class="text-danger">*</span></label>
                               <div class="col-lg-8">
                                   <input type="text" class="form-control" id="full_name" name="block" placeholder="Введите блок">
                               </div>
                           </div>
                           <div class="form-group row">
                               <label class="col-lg-4 col-form-label" for="full_name">Связь с тьютером <span class="text-danger">*</span></label>
                               <div class="col-lg-8">
                                   <input type="text" class="form-control" id="full_name" name="tutor_connection" placeholder="Введите связь">
                               </div>
                           </div>
                           <div class="form-group row">
                               <label class="col-lg-4 col-form-label" for="full_name">Руководитель по дипломной работе <span class="text-danger">*</span></label>
                               <div class="col-lg-8">
                                   <input type="text" class="form-control" id="full_name" name="diploma_leader" placeholder="Введите время для дипломной работы">
                               </div>
                           </div>

                           <input class="hidden" type="text" name="pednagruzka_id" value="<?= $re['id'] ?>">

                           <div class="form-group row">
                               <div class="col-lg-8 ml-auto">
                                   <button type="submit" name="submit" class="btn btn-success">Сохранить</button>
                               </div>
                           </div>
                         </form>
                         </div>
                       </div>
                     </div>


                </tr>
            	<?php endforeach; ?>

					<?php endif; ?>
<?php endforeach; ?>
            <tr>
                  <td colspan="3"><b>Всего</b></td>
                  <td><b><?= $students_summ ?></b></td>
                  <td><b><?= $lecture_summ ?></b></td>
                  <td><b><?= $practice_summ ?></td>
                  <td><b><?= $lab_summ ?></td>
                  <td><b><?= $srsp_summ ?></b></td>
                  <td><b><?= $practice_work_summ ?></b></td>
                  <td><b><?= $course_work_summ ?></b></td>
                  <td><b><?= $exam_summ ?></b></td>
                  <td><b><?= $block_summ ?></b></td>
                  <td><b><?= $tutor_connection_summ ?></b></td>
                  <td><b><?= $diploma_leader_summ ?></b></td>
                  <td><b><?= $total_summ  ?></b></td>
                  <td><b><?php echo number_format($total_summ/30,2)  ?></b></td>
                  <td></td>



            </tr>
            <?php
            $kz_summa = 0;
            $total_summ_hour = 0;
            $total_summ_audit_hour = 0;
            $total_lec = 0;
            $total_pr = 0;
            $total_lab = 0;
            $total_srs = 0;
            $total_srsp = 0;

            ?>



</table>


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
    <script src="assets/js/modal.js"></script>
    <!-- scripit init-->
</body>

</html>

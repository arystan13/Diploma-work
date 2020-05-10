<?php  ?>
<?php $fond= "active"; require_once 'sidebar.php'; ?>
<?php require_once 'header.php'; ?>
<?php error_reporting(0); ini_set('display_errors', 0); ?>
<?php $groups_filter = get_sql("select * from groups"); $sem = $_GET['course']*2-1; $filtered_groups = array(); $i = 0; ?>
<?php foreach ($groups_filter as $group_filter) {
      $temp = ($_GET['years'] - $group_filter['enter_year'])*2+1;
      if($temp == $sem) {
       $filtered_groups[$i] = $group_filter;
         $i++;
      }

}
if (isset($_POST['submit'])) {
  //if($_POST['head']==true) $head = 1; else $head = 0;
  //if($_POST['pps']==true) $pps = 1; else $pps = 0;
$success = add_ped_nagruzka($_POST);
    if($success == 'error') {
  echo 'Неизвестная ошибка';
    }
}
?>
<?php //$rup = get_sql("select * from rup where id = ".$_GET["rup_id"]); ?>
<?php //$spec = get_sql("select * from spec where id = ".$rup[0]['spec_id']); ?>
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                              <h4 id="zag">Фонд дисциплин</h4>
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
                                    <li class="breadcrumb-item active">Фонд дисциплин</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <div class="row">

                  <div class="col-lg-2">
                    <h6>Год: <?php echo ($_GET['years']." - "); echo ($_GET['years']+1); ?></h6><br>
                    <h6>Курс: <?php echo $_GET['course']; ?></h6>
                  </div>
                  <div class="col-lg-8">
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
<th style="width: 100px;">Группа</th>
<th rowspan="5">Навзвания модуля</th>
<th rowspan="5">№</th>
<th rowspan="5">Код дисциплины</th>
<th rowspan="5">Наименования дисциплины</th>
<th rowspan="4" colspan="2">Количество кредитов</th>
<th rowspan="5">Курсовая работа</th>
<th rowspan="4">Форма контроля</th>
<th rowspan="4" colspan="7">Бюджетное рабочее время в часах</th>
<th rowspan="2" colspan="2">Рассчетные кредиты в семестре </th>
<th colspan="2">#</th>


</tr>
<tr>



</tr>
<tr>


</tr>
<tr>



</tr>
  <tr>
    <th></th>
    <th>KZ</th>
    <th>ECTS</th>
    <th>Экзамен</th>
    <th>Всего часов</th>
    <th>Всего аудит часов</th>
    <th>Лекция (А)</th>
    <th>СП (В)</th>
    <th>ЛР (В)</th>
    <th>СРСП (С)</th>
    <th>СРС</th>
    <th>Сем</th>
    <th>Кредиты</th>
    <th></th>
  </tr>
<?php $disciplines = get_sql("select * from disciplinetype"); ?>
<?php foreach ($disciplines as $discipline): ?>

        <tr>
            <th class="table-stripped" colspan="19"><center><?= $discipline["discipline_type_title"] ?></center></th>
        </tr>

        <?php $components = get_sql("select * from componenttype"); ?>
        <?php foreach ($components as $component): ?>

                <tr>
                    <th colspan="19"><center><?= $component["component_type_title"] ?></center></th>
                </tr>
            <?php foreach ($filtered_groups as $filtered_group): ?>
            <?php  //var_dump($filtered_group);
            //$req = get_sql("select * from rupdiscipline where rup_id =".$filtered_group['rup_id']);
            $req = get_sql("select * from rupdiscipline r inner join subjectscredits s on r.id = s.rupdiscipline_id where r.rup_id =".$filtered_group['rup_id']." and ((s.semester = ".$sem.") or (s.semester = ".($sem+1)."))");
            ?>
            <?php foreach ($req as $re): ?>
              <?php //var_dump($re); ?>
              <?php $datas = get_sql("select * from discipline where (discipline_type_id=".$discipline['id'].") and (component_type_id=".$component['id'].") and (id = ".$re['discipline_title_id'].")" ); ?>
						<?php if(!empty($datas)): ?>
            	<?php foreach ($datas as $data): ?>
                <tr>
                    <td><?= $filtered_group['group_name'] ?></td>
                    <td><?php $dtype = get_sql('select module_name from modulename where id='.$data['module_id']); echo $dtype[0]['module_name'];  ?></td>
                    <td><?= $data['module_number'] ?></td>
                    <td><?= $data['discipline_code'] ?></td>
                    <td><?= $data['discipline_name'] ?></td>
                    <td><?php $summ = 0;$kz = get_sql('select * from subjectscredits where rupdiscipline_id = '.$re['rupdiscipline_id']);  foreach ($kz as $k) {$summ += (int)$kz[0]['lek_credits'] + (int)$kz[0]['pr_credits'] + (int)$kz[0]['lab_credits'];  $kz_summa += $summ; }    echo ($summ)            ; ?></td>
                    <td><?php $summ = 0; $kz = get_sql('select * from subjectscredits where rupdiscipline_id = '.$re['rupdiscipline_id']);  foreach ($kz as $k) {$summ += (int)$kz[0]['lek_credits'] + (int)$kz[0]['pr_credits'] + (int)$kz[0]['lab_credits']; }   echo round($summ*1.5); ?></td>
                    <td><?php $data['course_work'] ?></td>
                    <td><?php $exam += $data['exam']; echo $data['exam']; ?></td>
                    <td><?php $summ = 0; $kz = get_sql('select * from subjectscredits where rupdiscipline_id = '.$re['rupdiscipline_id']);  foreach ($kz as $k) { $summ += (int)$kz[0]['lek_credits']*15 + (int)$kz[0]['pr_credits']*15 + (int)$kz[0]['lab_credits']*15 + 2*($kz[0]['lek_credits']+$kz[0]['pr_credits']+$kz[0]['lab_credits'])*15; $total_summ_hour += $summ;}  echo ($summ) ; ?></td>
                    <td><?php $summ = 0; $kz = get_sql('select * from subjectscredits where rupdiscipline_id = '.$re['rupdiscipline_id']);  foreach ($kz as $k) { $summ += ($kz[0]['lek_credits']+$kz[0]['pr_credits']+$kz[0]['lab_credits'])*15; $total_summ_audit_hour += $summ; } echo ($summ);    ?></td>
                    <td><?php $summ = 0; $kz = get_sql('select lek_credits from subjectscredits where rupdiscipline_id = '.$re['rupdiscipline_id']); foreach ($kz as $k) { $summ += (int)$k['lek_credits']; $total_lec += ($summ*15); } echo $summ*15; ?></td>
                    <td><?php $summ = 0; $kz = get_sql('select pr_credits from subjectscredits where rupdiscipline_id = '.$re['rupdiscipline_id']); foreach ($kz as $k) { $summ += (int)$k['pr_credits']; $total_pr += $summ*15; } echo $summ*15; ?></td>
                    <td><?php $summ = 0; $kz = get_sql('select lab_credits from subjectscredits where rupdiscipline_id = '.$re['rupdiscipline_id']); foreach ($kz as $k) { $summ += (int)$k['lab_credits']; $total_lab += $summ*15;} echo $summ*15; ?></td>
                    <td><?php $summ = 0; $kz = get_sql('select * from subjectscredits where rupdiscipline_id = '.$re['rupdiscipline_id']);  foreach ($kz as $k) { $summ += ($kz[0]['lek_credits']+$kz[0]['pr_credits']+$kz[0]['lab_credits'])*15; $total_srs += $summ; } echo ($summ) ;   ?></td>
                    <td><?php $summ = 0; $kz = get_sql('select * from subjectscredits where rupdiscipline_id = '.$re['rupdiscipline_id']);  foreach ($kz as $k) { $summ += ($kz[0]['lek_credits']+$kz[0]['pr_credits']+$kz[0]['lab_credits'])*15; $total_srsp += $summ; } echo ($summ) ;   ?></td>
                    <?php $semester = get_sql('select * from subjectscredits where rupdiscipline_id = '.$re['rupdiscipline_id']); ?>
                    <?php foreach ($semester as  $semester): ?>
                    <td><?= $semester['semester'] ?></td>
                    <td>
										<?= $semester['lek_credits'],"/",$semester['pr_credits'],"/",$semester['lab_credits'] ?>
										</td>
                    <td colspan="2">
                    <?php
                      $chain_btn_check = get_sql("select * from pednagruzka where (group_id = ".$filtered_group['id'].") and (rupdiscipline_id = ".$re['rupdiscipline_id'].")");
                      if($chain_btn_check != 'empty') : ?>
                      <a  class="btn btn-chain" ><i class="fa fa-link" aria-hidden="true"></i></a>
                    <?php else : ?>
                      <a  class="btn btn-chain modal-trigger" data-modal="modal-name<?= $filtered_group['id'] ?><?= $re['rupdiscipline_id'] ?>" href="#"><i class="fa fa-chain-broken" aria-hidden="true"></i></a>
                    <?php endif; ?>
                    </td>
                                       <!-- Modal -->
                                        <div class="modal" id="modal-name<?= $filtered_group['id'] ?><?= $re['rupdiscipline_id'] ?>" style="text-align: left;">
                                          <div class="modal-sandbox"></div>
                                          <div class="modal-box">
                                            <div class="modal-header">
                                              <div class="close-modal">&#10006;</div>
                                              <h2>Назначить преподавателя</h2>
                                            </div>
                                            <form class="form-valide" action="#" method="post">
                                            <div class="modal-body">
                                              <div class="form-group row">
                                                  <label class="col-lg-4 col-form-label" for="stepen">Проеподаватель лекций <span class="text-danger">*</span></label>
                                                  <div class="col-lg-8">
                                                <select class="form-control" id="val-skill" name="lec_lecturer_id" required>
                                                  <?php $names = get_sql('select id, full_name from lecturers'); ?>
                                                  <?php foreach ($names as $name): ?>
                                                    <option value="<?= $name['id'] ?>"><?= $name['full_name'] ?></option>
                                                  <?php endforeach; ?>
                                                  </select>
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-lg-4 col-form-label" for="stepen">Проеподаватель практики <span class="text-danger">*</span></label>
                                                  <div class="col-lg-8">
                                                <select class="form-control" id="val-skill" name="prac_lecturer_id" required>
                                                  <?php $names = get_sql('select id, full_name from lecturers'); ?>
                                                  <?php foreach ($names as $name): ?>
                                                    <option value="<?= $name['id'] ?>"><?= $name['full_name'] ?></option>
                                                  <?php endforeach; ?>
                                                  </select>
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-lg-4 col-form-label" for="stepen">Проеподаватель лабораторной работы <span class="text-danger">*</span></label>
                                                  <div class="col-lg-8">
                                                <select class="form-control" id="val-skill" name="lab_lecturer_id" required>
                                                  <?php $names = get_sql('select id, full_name from lecturers'); ?>
                                                  <?php foreach ($names as $name): ?>
                                                    <option value="<?= $name['id'] ?>"><?= $name['full_name'] ?></option>
                                                  <?php endforeach; ?>
                                                  </select>
                                                </div>
                                              </div>
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
                                                      <input type="text" class="form-control" id="full_name" name="tutor_connection" placeholder="Введите блок">
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-lg-4 col-form-label" for="full_name">Руководитель по дипломной работе <span class="text-danger">*</span></label>
                                                  <div class="col-lg-8">
                                                      <input type="text" class="form-control" id="full_name" name="diploma_leader" placeholder="Введите блок">
                                                  </div>
                                              </div>

                                              <input class="hidden" type="text" name="rupdiscipline_id" value="<?= $re['rupdiscipline_id'] ?>">
                                              <input class="hidden" type="text" name="group_id" value="<?= $filtered_group['id'] ?>">
                                              <input class="hidden" type="text" name="year" value="<?= $_GET['years'] ?>">
                                              <div class="form-group row">
                                                  <div class="col-lg-8 ml-auto">
                                                      <button type="submit" name="submit" class="btn btn-success">Назначить</button>
                                                  </div>
                                              </div>
                                            </form>
                                            </div>
                                          </div>
                                        </div>

                    <?php endforeach; ?>
                </tr>
            	<?php endforeach; ?>

					<?php endif; ?>
<?php endforeach; ?>
<?php endforeach; ?>
            <tr>
                  <td colspan="5"><b>Всего</b></td>
                  <td><b><?= $kz_summa ?></b></td>
                  <td><b><?= round($kz_summa*1.5); ?></b></td>
                  <td></td>
                  <td></td>
                  <td><b><?= $total_summ_hour ?></b></td>
                  <td><b><?= $total_summ_audit_hour ?></b></td>
                  <td><b><?= $total_lec ?></b></td>
                  <td><b><?= $total_pr ?></b></td>
                  <td><b><?= $total_lab ?></b></td>
                  <td><b><?= $total_srs ?></b></td>
                  <td><b><?= $total_srsp ?></b></td>
                  <td></td>
                  <td></td>
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
			 <?php endforeach; ?>

	<?php endforeach; ?>
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

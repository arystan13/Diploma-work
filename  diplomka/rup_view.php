<?php  ?>
<?php $index = "active"; require_once 'sidebar.php'; ?>
<?php require_once 'header.php'; ?>
<?php error_reporting(0);
ini_set('display_errors', 0); ?>
<?php $rup = get_sql("select * from rup where id = ".$_GET["rup_id"]); ?>
<?php $spec = get_sql("select * from spec where id = ".$rup[0]['spec_id']); ?>
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                              <h4 id="zag">Учебный план</h4>
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
                                    <li class="breadcrumb-item active">Учебный план</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <div class="row">

                  <div class="col-lg-3">

                    <h6>Направление подготовки: <?php $direction = get_sql("select * from direction where id = ".$rup[0]["direction_id"]); echo $direction[0]['title']; ?></h6>
                      <h6>Уровень подготовки: <?php $level = get_sql("select * from ready where id = ".$rup[0]["ready_id"]); echo $level[0]['title']; ?></h6>
                        <h6>Специальность: <?php echo ($spec[0]["title"]); ?></h6>
                  </div>
                  <div class="col-lg-6">
                  </div>

                    <div class="col-lg-3" style="text-align: left;">

                      <h6>Призуждаемая степень:  <?php $spec_degree = get_sql("select title from degree where id = ".$rup[0]["degree_id"]); echo ($spec_degree[0]["title"]); ?> образования по специальности <?php echo ($spec[0]["title"]); ?> </h6>

                      <h6>Срок обучения: <?php if($rup[0]["degree_id"]=="1") echo "4 года"; ?></h6>
                      <h6>Начало обучения: <?php  echo ($rup[0]['year']." - "); echo ($rup[0]['year']+1);   ?></h6>
                      <!-- <h6>Язык обучения: <?php $spec_lang = get_sql("select title from language where id = ".$rup[0]["language_id"]); echo ($spec_lang[0]["title"]); ?></h6> -->
                      <h6>Форма обучения: <?php $spec_mode = get_sql("select title from mode where id = ".$rup[0]["mode_id"]); echo ($spec_mode[0]["title"]); ?></h6>

                    </div>
            </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-validation">
                                    	<div id="employee_table">
                                        <table style="width:100%; text-align:center !important; vertical-align: middle;" class="table table-bordered">


<tr>
<th rowspan="5">Навзвания модуля</th>
<th rowspan="5">№</th>
<th rowspan="5">Код дисциплины</th>
<th rowspan="5">Наименования дисциплины</th>
<th rowspan="4" colspan="2">Количество кредитов</th>
<th rowspan="5">Курсовая работа</th>
<th rowspan="4">Форма контроля</th>
<th rowspan="4" colspan="7">Бюджетное рабочее время в часах</th>
<th rowspan="2" colspan="2">Рассчетные кредиты в семестре </th>


</tr>
<tr>



</tr>
<tr>


</tr>
<tr>



</tr>
  <tr>
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
    <th>Кредиты <br> (Лек/Пр/Лаб)</th>

  </tr>
<?php $disciplines = get_sql("select * from disciplinetype where id < 4"); ?>
<?php foreach ($disciplines as $discipline): ?>

        <tr>
            <th class="table-stripped" colspan="17"><center><?= $discipline["discipline_type_title"] ?></center></th>
        </tr>

        <?php $course_work_count=0; $exam_count=0;  $components = get_sql("select * from componenttype"); ?>
        <?php foreach ($components as $component): ?>

                <tr>
                    <th colspan="17"><center><?= $component["component_type_title"] ?></center></th>
                </tr>

            <?php
            $req = get_sql("select * from rupdiscipline where rup_id =".$_GET['rup_id']);
            ?>
            <?php foreach ($req as $re): ?>
              <?php $datas = get_sql("select * from discipline where (discipline_type_id=".$discipline['id'].") and (component_type_id=".$component['id'].") and (id = ".$re['discipline_title_id'].")" ); ?>
						<?php if(!empty($datas)): ?>
            	<?php foreach ($datas as $data): ?>
                <tr>
                    <td><?php $dtype = get_sql('select module_name from modulename where id='.$data['module_id']); echo $dtype[0]['module_name'];  ?></td>
                    <td><?= $data['module_number'] ?></td>
                    <td><?= $data['discipline_code'] ?></td>
                    <td><?= $data['discipline_name'] ?></td>
                    <td><?php $summ = 0;$kz = get_sql('select * from subjectscredits where rupdiscipline_id = '.$re['id']);  foreach ($kz as $k) {$summ += (int)$kz[0]['lek_credits'] + (int)$kz[0]['pr_credits'] + (int)$kz[0]['lab_credits'];  $kz_summa += $summ; }    echo ($summ)            ; ?></td>
                    <td><?php $summ = 0; $kz = get_sql('select * from subjectscredits where rupdiscipline_id = '.$re['id']);  foreach ($kz as $k) {$summ += (int)$kz[0]['lek_credits'] + (int)$kz[0]['pr_credits'] + (int)$kz[0]['lab_credits']; }   echo round($summ*1.5); ?></td>
                    <td><?php $kz = get_sql('select * from subjectscredits where rupdiscipline_id = '.$re['id']); if($kz[0]['course_work']==1) { echo $kz[0]['semester']; $course_work_count++; } ?></td>
                    <td><?php $kz = get_sql('select * from subjectscredits where rupdiscipline_id = '.$re['id']); if($kz[0]['exam']==1) { echo $kz[0]['semester']; $exam_count++; } ?></td>
                    <td><?php $summ = 0; $kz = get_sql('select * from subjectscredits where rupdiscipline_id = '.$re['id']);  foreach ($kz as $k) { $summ += (int)$kz[0]['lek_credits']*15 + (int)$kz[0]['pr_credits']*15 + (int)$kz[0]['lab_credits']*15 + 2*($kz[0]['lek_credits']+$kz[0]['pr_credits']+$kz[0]['lab_credits'])*15; $total_summ_hour += $summ;}  echo ($summ) ; ?></td>
                    <td><?php $summ = 0; $kz = get_sql('select * from subjectscredits where rupdiscipline_id = '.$re['id']);  foreach ($kz as $k) { $summ += ($kz[0]['lek_credits']+$kz[0]['pr_credits']+$kz[0]['lab_credits'])*15; $total_summ_audit_hour += $summ; } echo ($summ);    ?></td>
                    <td><?php $summ = 0; $kz = get_sql('select lek_credits from subjectscredits where rupdiscipline_id = '.$re['id']); foreach ($kz as $k) { $summ += (int)$k['lek_credits']; $total_lec += ($summ*15); } echo $summ*15; ?></td>
                    <td><?php $summ = 0; $kz = get_sql('select pr_credits from subjectscredits where rupdiscipline_id = '.$re['id']); foreach ($kz as $k) { $summ += (int)$k['pr_credits']; $total_pr += $summ*15; } echo $summ*15; ?></td>
                    <td><?php $summ = 0; $kz = get_sql('select lab_credits from subjectscredits where rupdiscipline_id = '.$re['id']); foreach ($kz as $k) { $summ += (int)$k['lab_credits']; $total_lab += $summ*15;} echo $summ*15; ?></td>
                    <td><?php $summ = 0; $kz = get_sql('select * from subjectscredits where rupdiscipline_id = '.$re['id']);  foreach ($kz as $k) { $summ += ($kz[0]['lek_credits']+$kz[0]['pr_credits']+$kz[0]['lab_credits'])*15; $total_srs += $summ; } echo ($summ) ;   ?></td>
                    <td><?php $summ = 0; $kz = get_sql('select * from subjectscredits where rupdiscipline_id = '.$re['id']);  foreach ($kz as $k) { $summ += ($kz[0]['lek_credits']+$kz[0]['pr_credits']+$kz[0]['lab_credits'])*15; $total_srsp += $summ; } echo ($summ) ;   ?></td>
                    <?php $semester = get_sql('select * from subjectscredits where rupdiscipline_id = '.$re['id']); ?>
                    <?php foreach ($semester as  $semester): ?>
                    <td><?= $semester['semester'] ?></td>
                    <td>
										<?= $semester['lek_credits'],"/",$semester['pr_credits'],"/",$semester['lab_credits'] ?>
										</td>
                    <?php endforeach; ?>
                </tr>
            	<?php endforeach; ?>

					<?php endif; ?>
<?php endforeach; ?>
            <tr>
                  <td colspan="4"><b>Всего</b></td>
                  <td><b><?= $kz_summa ?></b></td>
                  <td><b><?= round($kz_summa*1.5); ?></b></td>
                  <td><b><?= $course_work_count  ?></b></td>
                  <td><b><?= $exam_count  ?></b></td>
                  <td><b><?= $total_summ_hour ?></b></td>
                  <td><b><?= $total_summ_audit_hour ?></b></td>
                  <td><b><?= $total_lec ?></b></td>
                  <td><b><?= $total_pr ?></b></td>
                  <td><b><?= $total_lab ?></b></td>
                  <td><b><?= $total_srs ?></b></td>
                  <td><b><?= $total_srsp ?></b></td>
                  <td><b></td>
                  <td><b></td>



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

<!-- Divider Addition -->

<?php $disciplines = get_sql("select * from disciplinetype where id = 4"); ?>
<?php foreach ($disciplines as $discipline): ?>

        <tr>
            <th class="table-stripped" colspan="17"><center><?= $discipline["discipline_type_title"] ?></center></th>
        </tr>


            <?php
            $req = get_sql("select * from rupdiscipline where rup_id =".$_GET['rup_id']);
            ?>
            <?php foreach ($req as $re): ?>

              <?php $datas = get_sql("select * from discipline where (discipline_type_id=".$discipline['id'].") and (id = ".$re['discipline_title_id'].")" ); ?>

						<?php if(!empty($datas)): ?>
            	<?php foreach ($datas as $data): ?>
                <tr>
                    <td><?php $dtype = get_sql('select module_name from modulename where id='.$data['module_id']); echo $dtype[0]['module_name'];  ?></td>
                    <td><?= $data['module_number'] ?></td>
                    <td><?= $data['discipline_code'] ?></td>
                    <td><?= $data['discipline_name'] ?></td>
                    <td><?php $summ = 0;$kz = get_sql('select * from subjectscredits where rupdiscipline_id = '.$re['id']);  foreach ($kz as $k) {$summ += (int)$kz[0]['lek_credits'] + (int)$kz[0]['pr_credits'] + (int)$kz[0]['lab_credits'];  $kz_summa += $summ; }    echo ($summ)            ; ?></td>
                    <td><?php $summ = 0; $kz = get_sql('select * from subjectscredits where rupdiscipline_id = '.$re['id']);  foreach ($kz as $k) {$summ += (int)$kz[0]['lek_credits'] + (int)$kz[0]['pr_credits'] + (int)$kz[0]['lab_credits']; }   echo round($summ*1.5); ?></td>
                    <td><?php $data['course_work'] ?></td>
                    <td><?php $kz = get_sql('select * from subjectscredits where rupdiscipline_id = '.$re['id']); if($kz[0]['exam']==1) echo $kz[0]['semester']; ?></td>
                    <td><?php $summ = 0; $kz = get_sql('select * from subjectscredits where rupdiscipline_id = '.$re['id']);  foreach ($kz as $k) { $summ += (int)$kz[0]['lek_credits']*15 + (int)$kz[0]['pr_credits']*15 + (int)$kz[0]['lab_credits']*15 + 2*($kz[0]['lek_credits']+$kz[0]['pr_credits']+$kz[0]['lab_credits'])*15; $total_summ_hour += $summ;}  echo ($summ) ; ?></td>
                    <td><?php $summ = 0; $kz = get_sql('select * from subjectscredits where rupdiscipline_id = '.$re['id']);  foreach ($kz as $k) { $summ += ($kz[0]['lek_credits']+$kz[0]['pr_credits']+$kz[0]['lab_credits'])*15; $total_summ_audit_hour += $summ; } echo ($summ);    ?></td>
                    <td><?php $summ = 0; $kz = get_sql('select lek_credits from subjectscredits where rupdiscipline_id = '.$re['id']); foreach ($kz as $k) { $summ += (int)$k['lek_credits']; $total_lec += ($summ*15); } echo $summ*15; ?></td>
                    <td><?php $summ = 0; $kz = get_sql('select pr_credits from subjectscredits where rupdiscipline_id = '.$re['id']); foreach ($kz as $k) { $summ += (int)$k['pr_credits']; $total_pr += $summ*15; } echo $summ*15; ?></td>
                    <td><?php $summ = 0; $kz = get_sql('select lab_credits from subjectscredits where rupdiscipline_id = '.$re['id']); foreach ($kz as $k) { $summ += (int)$k['lab_credits']; $total_lab += $summ*15;} echo $summ*15; ?></td>
                    <td><?php $summ = 0; $kz = get_sql('select * from subjectscredits where rupdiscipline_id = '.$re['id']);  foreach ($kz as $k) { $summ += ($kz[0]['lek_credits']+$kz[0]['pr_credits']+$kz[0]['lab_credits'])*15; $total_srs += $summ; } echo ($summ) ;   ?></td>
                    <td><?php $summ = 0; $kz = get_sql('select * from subjectscredits where rupdiscipline_id = '.$re['id']);  foreach ($kz as $k) { $summ += ($kz[0]['lek_credits']+$kz[0]['pr_credits']+$kz[0]['lab_credits'])*15; $total_srsp += $summ; } echo ($summ) ;   ?></td>
                    <?php $semester = get_sql('select * from subjectscredits where rupdiscipline_id = '.$re['id']); ?>
                    <?php foreach ($semester as  $semester): ?>
                    <td><?= $semester['semester'] ?></td>
                    <td>
										<?= $semester['lek_credits'],"/",$semester['pr_credits'],"/",$semester['lab_credits'] ?>
										</td>
                    <?php endforeach; ?>
                </tr>
            	<?php endforeach; ?>

					<?php endif; ?>
<?php endforeach; ?>
            <tr>
                  <td colspan="4"><b>Всего</b></td>
                  <td><b><?= $kz_summa ?></b></td>
                  <td><b><?= round($kz_summa*1.5); ?></b></td>
                  <td><b></td>
                  <td><b></td>
                  <td><b><?= $total_summ_hour ?></b></td>
                  <td><b><?= $total_summ_audit_hour ?></b></td>
                  <td><b><?= $total_lec ?></b></td>
                  <td><b><?= $total_pr ?></b></td>
                  <td><b><?= $total_lab ?></b></td>
                  <td><b><?= $total_srs ?></b></td>
                  <td><b><?= $total_srsp ?></b></td>
                  <td><b></td>
                  <td><b></td>



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




  <?php $disciplines = get_sql("select * from disciplinetype where id >= 5"); ?>
  <?php foreach ($disciplines as $discipline): ?>
    <!-- Divider Practice -->

          <tr>
              <th class="table-stripped" colspan="17"><center><?= $discipline["discipline_type_title"] ?></center></th>
          </tr>
          <tr>
            <th colspan="4"></th>

            <th>KZ</th>
            <th>ECTS</th>
            <th>Неделя</th>
            <th>Форма контроля</th>
            <th>Всего часов</th>

          </tr>

              <?php
              $req = get_sql("select * from rupdiscipline where rup_id =".$_GET['rup_id']);
              ?>
              <?php foreach ($req as $re): ?>

                <?php $datas = get_sql("select * from discipline where (discipline_type_id=".$discipline['id'].") and (id = ".$re['discipline_title_id'].")" ); ?>

  						<?php if(!empty($datas)): ?>
              	<?php foreach ($datas as $data): ?>
                  <tr>
                      <td><?php $dtype = get_sql('select module_name from modulename where id='.$data['module_id']); echo $dtype[0]['module_name'];  ?></td>
                      <td><?= $data['module_number'] ?></td>
                      <td><?= $data['discipline_code'] ?></td>
                      <td><?= $data['discipline_name'] ?></td>
                      <td><?php $summ = 0; $kz = get_sql('select * from practicecredits where rupdiscipline_id = '.$re['id']);  $kz_summa += $kz[0]["credits"];  echo ( $kz[0]["credits"]); ?></td>
                      <td><?php $summ = 0; $kz = get_sql('select * from practicecredits where rupdiscipline_id = '.$re['id']); $ects_summa += $kz[0]["ects"]; echo ( $kz[0]["ects"]); ?></td>
                      <td><?php  $kz = get_sql('select * from practicecredits where rupdiscipline_id = '.$re['id']);  echo ( $kz[0]["week"]); ?></td>
                      <td><?php  $kz = get_sql('select * from practicecredits where rupdiscipline_id = '.$re['id']);  echo ( $kz[0]["semester"]); ?></td>
                      <td><?php $kz = get_sql('select * from practicecredits where rupdiscipline_id = '.$re['id']); echo ($kz[0]["credits"]*15); $total_summ += $kz[0]["credits"]*15; ?></td>


                  </tr>
              	<?php endforeach; ?>

  					<?php endif; ?>
  <?php endforeach; ?>
              <tr>
                    <td colspan="4"><b>Всего</b></td>
                    <td><b><?= $kz_summa ?></b></td>
                    <td><b><?= $ects_summa ?></b></td>
                    <td></td>
                    <td></td>
                    <td><b><?= $total_summ ?></b></td>





              </tr>
              <?php
              $kz_summa = 0;
              $ects_summa = 0;
              $total_summ = 0;


              ?>


  	<?php endforeach; ?>
</table>
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

</body>

</html>

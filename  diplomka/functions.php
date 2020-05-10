<?php

require_once 'database.php';
function get_sql($sql)   {
   $result = R::getAll($sql);
   if (empty($result))
    return 'empty';
   else {
    return $result;
   }
}
function check_user($login) {
    $result = R::count('users', 'login = ?', array($login));
    //$result = $result->export();
    return $result;
}
function find_user($login){
    $result = R::findOne('users', 'login = ?', array($login));
    return $result;
}
function add_module($data) {
	$result = R::dispense('modulename');
	$result->module_name = $data;
        $result = R::store($result);
	if ($result) {
            return 'success';
        }
        else {
            return 'error';}
}
function add_students($data) {
	$result = R::dispense('students');
	$result->full_name = $data['full_name'];
  $result->group_id = $data['group_id'];
  $result->tel = $data['tel'];
  $result->iin = $data['iin'];
  $result->parents_tel = $data['parents_tel'];
  $result = R::store($result);
	if ($result) {
            return 'success';
        }
        else {
            return 'error';}
}
function update_student($data, $student_id) {
    $result = R::load(students, $student_id);
    $result->full_name = $data['full_name'];
    $result->group_id = $data['group_id'];
    $result->tel = $data['tel'];
    $result->iin = $data['iin'];
    $result->parents_tel = $data['parents_tel'];
    R::store($result);
      if ($result) {
            return 'success';
        }
        else {
            return 'error' ;
        }
}
function add_lecturers($data) {
	$result = R::dispense('lecturers');
	$result->full_name = $data['full_name'];
  $result->stepen_id = $data['stepen_id'];
  $result->stepen_plus = $data['stepen_plus'];
  $result->position_id = $data['position_id'];
  $result->head =  $data['head'];
  $result->pps = $data['pps'];
  $result = R::store($result);
	if ($result) {
            return 'success';
        }
        else {
            return 'error';}
}
function add_ped_nagruzka($data) {
  for($i=0;$i<=2; $i++){
  $result = R::dispense('pednagruzka');
  $result->group_id = $data['group_id'];
  if($i==0){$result->lecturer_id = $data['lec_lecturer_id']; $result->lec = 1;}
  if($i==1){$result->lecturer_id = $data['prac_lecturer_id']; $result->prac = 1;}
  if($i==2){$result->lecturer_id = $data['lab_lecturer_id']; $result->lab = 1;}
  $result->rupdiscipline_id = $data['rupdiscipline_id'];
  $result->practice = $data['practice'];
  $result->course_work = $data['course_work'];
  $result->exam = $data['exam'];
  $result->block = $data['block'];
  $result->year = $data['year'];
  $result->tutor_connection = $data['tutor_connection'];
  $result->diploma_leader = $data['diploma_leader'];
  R::store($result);
  }
    if ($result) {
          return 'success';
      }
      else {
          return 'error' ;
      }
}
function update_lecturer($data, $lecturer_id) {
    $result = R::load(lecturers, $lecturer_id);
    $result->full_name = $data['full_name'];
    $result->stepen_id = $data['stepen_id'];
    $result->stepen_plus = $data['stepen_plus'];
    $result->position_id = $data['position_id'];
    $result->head =  $data['head'];
    $result->pps = $data['pps'];
    R::store($result);
      if ($result) {
            return 'success';
        }
        else {
            return 'error' ;
        }
}
function update_lecturer_state($data) {
    $result = R::load(lecturers, $data['lecturer_id']);
    $result->state = $data['state'];
    R::store($result);
      if ($result) {
            return 'success';
        }
        else {
            return 'error' ;
        }
}
        function update_pednagruzka($data) {
            $result = R::load(pednagruzka, $data['pednagruzka_id']);
            $result->practice = $data['practice'];
            $result->course_work = $data['course_work'];
            $result->exam = $data['exam'];
            $result->block = $data['block'];
            $result->tutor_connection = $data['tutor_connection'];
            $result->diploma_leader = $data['diploma_leader'];
            R::store($result);
              if ($result) {
                    return 'success';
                }
                else {
                    return 'error' ;
                }
                }
function add_subject($data){
    $result = R::dispense('discipline');
    $result->discipline_type_id = $data['discipline_type_id'];
    $result->component_type_id = $data['component_type_id'];
    $result->module_id = $data['module_name_id'];
    $result->module_number = $data['module_number'];
    $result->discipline_code = $data['discipline_code'];
    $result->discipline_name = $data['discipline_name'];
    $result->language_id = $data['language_id'];
    $result->practice = $data['practice'];
    $result = R::store($result);
    if ($result) {
            return 'success';
        }
        else {
            return 'error';}
}
function add_rups_credits($data){
    $result = R::dispense('subjectscredits');
    $result->semester = $data['semester'];
    $result->lek_credits = $data['lek_credits'];
    $result->pr_credits = $data['pr_credits'];
    $result->lab_credits = $data['lab_credits'];
    $result->rupdiscipline_id = $data['rup_discipline'];
    $result->course_work = $data['course_work'];
    $result->gos = $data['gos'];
    $result->exam = $data['exam'];
    $result = R::store($result);
    if ($result) {
            return 'success';
        }
        else {
            return 'error';}
}
function add_rups_practicecredits($data){
    $result = R::dispense('practicecredits');
    $result->semester = $data['semester'];
    $result->credits = $data['credits'];
    $result->ects = $data['ects'];
    $result->week = $data['week'];
    $result->rupdiscipline_id = $data['rup_discipline'];
    $result = R::store($result);
    if ($result) {
            return 'success';
        }
        else {
            return 'error';}
}
function add_group($data){
  $result = R::dispense('groups');
  $result->degree_id = $data['degree_id'];
  $result->language_id = $data['language_id'];
  $result->spec_id = $data['spec_id'];
  $result->mode_id = $data['mode_id'];
  $result->enter_year = $data['enter_year'];
  $result->group_name = $data['group'];
  $result->rup_id = $data['rup_id'];
  $result = R::store($result);
  if ($result) {
          return 'success';
      }
      else {
          return 'error';}
}
function update_group($data, $group_id) {
    $result = R::load(groups, $group_id);
    $result->degree_id = $data['degree_id'];
    $result->language_id = $data['language_id'];
    $result->spec_id = $data['spec_id'];
    $result->mode_id = $data['mode_id'];
    $result->enter_year = $data['enter_year'];
    $result->group_name = $data['group'];
    $result->rup_id = $data['rup_id'];
    R::store($result);
      if ($result) {
            return 'success';
        }
        else {
            return 'error' ;
        }
}
function add_rup($data){
  $result = R::dispense('rup');
  $result->spec_id = $data['spec_id'];
  $result->degree_id = $data['degree_id'];
  $result->language_id = $data['language_id'];
  $result->year = $data['year'];
  $result->mode_id = $data['mode_id'];
  $result->direction_id = $data['direction_id'];
  $result->ready_id = $data['level_id'];
  $result = R::store($result);
  if ($result) {
          return 'success';
      }
      else {
          return 'error';}
}
function add_rup_dsicipline($data){
  $result = R::dispense('rupdiscipline');
  $result->rup_id = $data['rup_id'];
  $result->discipline_title_id = $data['discipline_id'];
  $result = R::store($result);
  if ($result) {
          return 'success';
      }
      else {
          return 'error';}
}
?>

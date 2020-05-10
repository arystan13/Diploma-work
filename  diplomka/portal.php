<?php require_once "functions.php" ?>
<?php if (isset($_GET['submit'])) {
$success = add_rup_dsicipline($_GET);
    if($success == 'error') {
  echo 'Неизвестная ошибка';
    }
}
$discipline = get_sql("select * from discipline where id = ".$_GET['discipline_id']);
if($discipline[0]['practice']==1)
  header('Location: practice.php?rup_id='.$_GET['rup_id'].'&discipline_id='.$_GET['discipline_id']);
else
  header('Location: subjects_credits.php?rup_id='.$_GET['rup_id'].'&discipline_id='.$_GET['discipline_id']);
 ?>

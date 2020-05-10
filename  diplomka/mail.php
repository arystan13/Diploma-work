
<?php $index = "active"; require_once 'sidebar.php'; ?>
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
                                <h1>Рабочий учебный план</h1>
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
                                <div class="card-body">
<h2>Write HTML Mail</h2>
      <p>Use this WYSIWYG HTML Editor to compose and send rich-text HTML emails with support for tables, special characters, images, hyperlinks and other formatting styles not available in your email program.</p>
      <p>Advanced users can switch to the HTML view (click the code icon) and directly edit the HTML source of the message or apply their own custom CSS styles to any of the blocks.</p>
      <p><b>Embed Images in Email</b></p>
      <p>If you would like to embed images in your email newsletters, you have two options</p>
      <ul>
        <li>For small images - Copy the image to the clipboard (like a logo) and press Ctrl-V / Cmd-V to paste her.</li>
        <li>For big images - Upload the image (like a screenshot) to <a href="https://ctrlq.org/images/" target="_blank">ctrlq.org/images</a> and paste the image URL in the editor.</li>
      </ul>



    </div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="footer">
    <p> 2018 © Admin Board. - <a href="#">by Timabay Zhandos with Free Template XD from themewagon.com </a></p>
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

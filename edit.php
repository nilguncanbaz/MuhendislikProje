<?php
include_once "ez_sql_core.php";
include_once "ez_sql_mysqli.php";
include_once "config.php";
$db = new ezSQL_mysqli($db_user, $db_password, $db_name, $db_host);
$db->query("SET NAMES utf8"); 
	
$contact = $db->get_row("SELECT * FROM $db_table WHERE id='$_GET[id]'");
?>

<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Düzenle</h3>
  </div>
  <div class="panel-body">
    <form name="editContactForm" id="editContactForm" method="post">
      <div class="input-group pull-left">
        <input type="text" name="bookName" class="form-control" placeholder="Book Name" value="<?php echo $contact->bookName; ?>">
      </div>
      <div class="input-group pull-left">
        <input type="text" name="author" class="form-control" placeholder="author" value="<?php echo $contact->author; ?>">
      </div>
      <div class="input-group pull-left">
        <input type="text" name="bDate" class="form-control" placeholder="bDate" value="<?php echo $contact->bDate; ?>">
      </div>
      <input type="hidden" name="id" value="<?php echo $contact->id; ?>"/>
      <button type="button" class="btn btn-sm btn-warning pull-left" id="updateButton">Güncelle</button>
  	</form>
  </div>
</div>
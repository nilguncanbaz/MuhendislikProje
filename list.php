<?php

include_once "ez_sql_core.php";
include_once "ez_sql_mysqli.php";
include_once "config.php";
$db = new ezSQL_mysqli($db_user, $db_password, $db_name, $db_host);
$db->query("SET NAMES utf8"); 

?>

<div id="loading"></div>
<table class="table" id="contactsTable">
    <thead>
      <tr>
        <th>#</th>
        <th>Kitap Adı</th>
        <th>Yazar</th>
        <th>Basım Yılı</th>
        <th>İşlem</th>
      </tr>
    </thead>
    <tbody id="result">

<?php

if (isset($_POST['search'])) {
	$kosul="WHERE bookName LIKE '%".$_POST['search']."%' 
	        OR author LIKE '%".$_POST['search']."%' 
	        OR bDate LIKE '%".$_POST['search']."%'";
} else {$kosul='';}

$sqlGet="SELECT * FROM $db_table $kosul ORDER BY id DESC";
$contacts = $db->get_results($sqlGet);

if ($contacts!='') {
    foreach ( $contacts as $contact )	{
?>
  	<tr id="<?php echo $contact->id; ?>">
  		<td><?php echo $contact->id; ?></td>
  		<td><?php echo $contact->bookName; ?></td>
  		<td><?php echo $contact->author; ?></td>
  		<td><?php echo $contact->bDate; ?></td>
  		<td>
		    <button type="submit" value="<?php echo $contact->id;?>" class="btn btn-sm btn-warning pull-left editButton">Düzenle</button> 
		    <button type="submit" value="<?php echo $contact->id;?>" class="btn btn-sm btn-danger pull-left delButton">Sil</button>
  		</td>
  	</tr>
<?php
  	}
  }
?>
	</tbody>
</table>
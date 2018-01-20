<!DOCTYPE html>
<html lang="tr-TR">

<head>

	<meta charset='UTF-8'/>
	<title>Kitap Kutusu</title>

	<!-- META -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="tr" />
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="description" content="Example PHP project using modern technologies Bootstrap, jQuery, AJAX and ezSQL" />
	<meta name="keywords" content="kitap,proje,Ajax,PHP,MySQL,ezSQL" />
	<meta name="robots" content="all" />
	<meta name="author" content="Nilgun Canbaz" />
	
	<!-- CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	
	<!-- JS -->
	<script src="js/jquery.min.js"></script>
	<script src="js/custom.js"></script>

</head>
<body>
	
<!-- DATABASE CONNECTION -->
<?php
	include_once "ez_sql_core.php";
	include_once "ez_sql_mysqli.php";
	include_once "config.php";
	$db = new ezSQL_mysqli($db_user, $db_password, $db_name, $db_host);
	$db->query("SET NAMES utf8"); 
?>
<!-- //DATABASE CONNECTION -->

<div class="container" role="main">
  <div class="row rc">
    <div class="col-md-7 cc">
      
      <div class="page-header">
        <h1>KitapKutusu</h1>
      </div>
      <div id="actions">
        <button type="button" class="btn btn-sm btn-primary" id="ListAll">Hepsini Listele</button>
        <button type="button" class="btn btn-sm btn-success" id="show_new_form">Yeni Ekleme</button>
        <button type="button" class="btn btn-sm btn-info" id="show_search_form">Arama</button>
      </div>
      
      <div id="new_contact" class="forms">
        <div class="panel panel-success">
          <div class="panel-heading">
            <h3 class="panel-title">Yeni Kitap</h3>
          </div>
          <div class="panel-body">
            <form name="newContactForm" id="newContactForm" method="post">
              <div class="input-group pull-left">
                <input type="text" name="bookName" class="form-control" placeholder="Kitabın adı">
              </div>
              <div class="input-group pull-left">
                <input type="text" name="author" class="form-control" placeholder="Yazar">
              </div>
              <div class="input-group pull-left">
                <input type="text" name="bDate" class="form-control" placeholder="Basım Yılı">
              </div>
              <button type="button" class="btn btn-sm btn-warning pull-left" id="addButton">Ekle</button>
			  
			  <input type="reset" name="temizle" value="Temizle">
          	</form>
          </div>
        </div>
      </div>
      
      <div id="searchBox" class="forms">
        <div class="panel panel-warning">
          <div class="panel-heading">
            <h3 class="panel-title">Arama</h3>
          </div>
          <div class="panel-body">
            <form name="searchForm" id="searchForm" method="post">
          		<div class="input-group pull-left">
                <input type="text" name="search" class="form-control" placeholder="Aranacak kitap..">
              </div>
          		<button type="button" class="btn btn-sm btn-warning pull-left" id="searchButton">Ara</button>
          	</form>
          </div>
        </div>
      </div>
      
      <div id="edit_contact" class="forms"></div>
      
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Kitaplar</h3>
        </div>
        <div class="panel-body" id="tableList">
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
            <tbody>
              <?php 
                if (!isset($_GET['b'])) { $b=0; } else { $b = $_GET['b']; } 
                if (isset($_POST['search'])) {$kosul=" WHERE bookName LIKE '%".$_POST['search']."%' OR author LIKE '%".$_POST['search']."%' OR year LIKE '%".$_POST['search']."%'";}
                else	{$kosul='';}
                
                $sql="SELECT * FROM $db_table $kosul ORDER BY id DESC";
                $contacts = $db->get_results($sql);

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
        </div>
      </div>
    
    </div>
  </div>
</div>

</body>
</html>
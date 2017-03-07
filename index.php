<!DOCTYPE html>
<html lang="tr-TR">

<head>

	<meta charset='UTF-8' />
	<title>yPhoneBook</title>

	<!-- META -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="tr" />
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="description" content="Bu betik pratik ve sade bir telefon defteridir." />
	<meta name="keywords" content="yakuter,telefon,defter,betik,php,js,css" />
	<meta name="robots" content="all" />
	<meta name="language" content="tr-TR" />
	<meta name="location" content="türkiye, tr, turkey" />
	<meta name="author" content="Erhan YAKUT - http://www.yakuter.com" />
	
	<!-- CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="assets/css/custom.css" rel="stylesheet">
	<!--<link href="assets/images/favicon.ico" rel="icon">-->
	
	<!-- JS -->
	<script src="assets/js/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
  <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>

</head>
<body>
	
<!-- DATABASE CONNECTION -->
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	include_once "includes/ez_sql_core.php";
	include_once "includes/ez_sql_mysqli.php";
	include_once "includes/config.php";
	$db = new ezSQL_mysqli($db_user, $db_password, $db_name, $db_host);
	$db->query("SET NAMES utf8"); 
	
?>
<!-- //DATABASE CONNECTION -->

<div class="container theme-showcase" role="main">
  <div class="row rc">
    <div class="col-md-6 cc">
      
      <div id="actions">
        <button type="button" class="btn btn-sm btn-primary">List All</button>
        <button type="button" class="btn btn-sm btn-success" id="show_new_form">New Contact</button>
        <button type="button" class="btn btn-sm btn-info" id="show_search_form">Search</button>
      </div>
      
      <div id="new_contact" class="forms">
        <div class="panel panel-success">
          <div class="panel-heading">
            <h3 class="panel-title">New Contact</h3>
          </div>
          <div class="panel-body">
            <form name="new-contact-form" method="post" action="index.php">
          		<input type="text" name="name" id="name" placeholder="Name Surname">
          		<input type="text" name="phone" id="phone" placeholder="Phone">
          		<input type="text" name="email" id="email" placeholder="Email">
          		<button type="submit" class="btn btn-sm btn-warning">Add</button>
          	</form>
          </div>
        </div>
      </div>
      
      <div id="search" class="forms">
        <div class="panel panel-warning">
          <div class="panel-heading">
            <h3 class="panel-title">Search</h3>
          </div>
          <div class="panel-body">
            <form name="new-contact-form" method="post" action="index.php">
          		<input type="text" name="name" id="name" placeholder="Search">
          		<button type="submit" class="btn btn-sm btn-warning">Search</button>
          	</form>
          </div>
        </div>
      </div>
      
      <div id="edit_contact" class="forms">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">Edit Contact</h3>
          </div>
          <div class="panel-body">
            <form name="new-contact-form" method="post" action="index.php">
          		<input type="text" name="name" id="name" placeholder="Name Surname">
          		<input type="text" name="phone" id="phone" placeholder="Phone">
          		<input type="text" name="email" id="email" placeholder="Email">
          		<button type="submit" class="btn btn-sm btn-warning">Update</button>
          	</form>
          </div>
        </div>
      </div>
      
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Contact List</h3>
        </div>
        <div class="panel-body">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                if (!isset($_GET['b'])) { $b=0; } else { $b = $_GET['b']; } 
                if (isset($_POST['veri'])) {$kosul=" WHERE name LIKE '%".$_POST['veri']."%' OR phone LIKE '%".$_POST['veri']."%' OR email LIKE '%".$_POST['veri']."%'";}
                else	{$kosul='';}
                
                $sql="SELECT * FROM $db_table $kosul ORDER BY name LIMIT $b, $limit";
                $contacts = $db->get_results($sql);

                if ($contacts!='') {
              	  foreach ( $contacts as $contact )	{
                ?>
              		<tr id="<?php echo $contact->id; ?>">
              			<td><?php echo $contact->id; ?></td>
              			<td><?php echo $contact->name; ?></td>
              			<td><?php echo $contact->phone; ?></td>
              			<td><?php echo $contact->email; ?></td>
              			<td>
              			<a title="Düzenle" href="duzenle.php?no=<?php echo $contact->id; ?>&height=200&width=280" class="thickbox">
              			<img src="assets/images/duzenle.gif" title="Düzenle"></a> 
              			<a href="#" onclick="sil(<?php echo $contact->id;?>)"><img src="assets/images/sil.png" title="Sil"></a></td>
              		</tr>
                <?php
              		}
              	}
              ?>		
            </tbody>
          </table>
        </div>
      </div>
    
      <!-- ALT KISIM -->
      <footer class="rc">
      	<a href="http://www.yakuter.com/yphonebook" title="yPhoneBook">yPhoneBook</a> &nbsp;|&nbsp;
      	<a href="https://github.com/yakuter/yPhoneBook" title="GitHub">Github</a> &nbsp;|&nbsp;
      	Telif Hakkı &copy; 2008 &nbsp;|&nbsp; 
      	<a href="http://www.yakuter.com/">Author's Website</a>
      </footer>
    </div>
  </div>
</div> <!-- /container -->



<!-- SAYFALAMA -->
<div style="padding:15px;">
<?php //sayfalama($site_url,$b,$limit,$db_table,$kosul); ?>
</div>
		
</body>
</html>
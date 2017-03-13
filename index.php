<!DOCTYPE html>
<html lang="tr-TR">

<head>

	<meta charset='UTF-8' />
	<title>yPhoneBook</title>

	<!-- META -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="tr" />
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="description" content="Example PHP project using modern technologies Bootstrap, jQuery, AJAX and ezSQL" />
	<meta name="keywords" content="yakuter,yPhoneBook,Ajax,PHP,MySQL,ezSQL" />
	<meta name="robots" content="all" />
	<meta name="author" content="Erhan YAKUT - http://www.yakuter.com" />
	
	<!-- CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="assets/css/custom.css" rel="stylesheet">
	
	<!-- JS -->
	<script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>

</head>
<body>
	
<!-- DATABASE CONNECTION -->
<?php
	include_once "includes/ez_sql_core.php";
	include_once "includes/ez_sql_mysqli.php";
	include_once "includes/config.php";
	$db = new ezSQL_mysqli($db_user, $db_password, $db_name, $db_host);
	$db->query("SET NAMES utf8"); 
?>
<!-- //DATABASE CONNECTION -->

<div class="container" role="main">
  <div class="row rc">
    <div class="col-md-8 cc">
      
      <div class="page-header">
        <h1>yPhoneBook</h1>
      </div>
      <div id="actions">
        <button type="button" class="btn btn-sm btn-primary" id="ListAll">List All</button>
        <button type="button" class="btn btn-sm btn-success" id="show_new_form">New Contact</button>
        <button type="button" class="btn btn-sm btn-info" id="show_search_form">Search</button>
      </div>
      
      <div id="new_contact" class="forms">
        <div class="panel panel-success">
          <div class="panel-heading">
            <h3 class="panel-title">New Contact</h3>
          </div>
          <div class="panel-body">
            <form name="newContactForm" id="newContactForm" method="post">
              <div class="input-group pull-left">
                <input type="text" name="name" class="form-control" placeholder="Name Surname">
              </div>
              <div class="input-group pull-left">
                <input type="text" name="phone" class="form-control" placeholder="Phone">
              </div>
              <div class="input-group pull-left">
                <input type="text" name="email" class="form-control" placeholder="Email">
              </div>
              <button type="button" class="btn btn-sm btn-warning pull-left" id="addButton">Add</button>
          	</form>
          </div>
        </div>
      </div>
      
      <div id="searchBox" class="forms">
        <div class="panel panel-warning">
          <div class="panel-heading">
            <h3 class="panel-title">Search</h3>
          </div>
          <div class="panel-body">
            <form name="searchForm" id="searchForm" method="post">
          		<div class="input-group pull-left">
                <input type="text" name="search" class="form-control" placeholder="Search">
              </div>
          		<button type="button" class="btn btn-sm btn-warning pull-left" id="searchButton">Search</button>
          	</form>
          </div>
        </div>
      </div>
      
      <div id="edit_contact" class="forms"></div>
      
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Contact List</h3>
        </div>
        <div class="panel-body" id="tableList">
          <div id="loading"></div>
          <table class="table" id="contactsTable">
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
                if (isset($_POST['search'])) {$kosul=" WHERE name LIKE '%".$_POST['search']."%' OR phone LIKE '%".$_POST['search']."%' OR email LIKE '%".$_POST['search']."%'";}
                else	{$kosul='';}
                
                $sql="SELECT * FROM $db_table $kosul ORDER BY id DESC";
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
            			    <button type="submit" value="<?php echo $contact->id;?>" class="btn btn-sm btn-warning pull-left editButton">Edit</button> 
            			    <button type="submit" value="<?php echo $contact->id;?>" class="btn btn-sm btn-danger pull-left delButton">Delete</button>
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
    
      <footer class="rc">
      	<a href="http://www.yakuter.com/yphonebook" title="yPhoneBook">yPhoneBook</a> &nbsp;|&nbsp;
      	<a href="https://github.com/yakuter/yPhoneBook" title="GitHub">Github</a> &nbsp;|&nbsp;
      	Copyright &copy; 2017 &nbsp;|&nbsp; 
      	<a href="http://www.yakuter.com/">Yakuter.com</a>
      </footer>
    </div>
  </div>
</div>

</body>
</html>
<?php
include_once "includes/ez_sql_core.php";
include_once "includes/ez_sql_mysqli.php";
include_once "includes/config.php";
$db = new ezSQL_mysqli($db_user, $db_password, $db_name, $db_host);
$db->query("SET NAMES utf8"); 
	
$contact = $db->get_row("SELECT * FROM $db_table WHERE id='$_GET[id]'");
?>

<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Edit Contact</h3>
  </div>
  <div class="panel-body">
    <form name="editContactForm" id="editContactForm" method="post">
      <div class="input-group pull-left">
        <input type="text" name="name" class="form-control" placeholder="Name Surname" value="<?php echo $contact->name; ?>">
      </div>
      <div class="input-group pull-left">
        <input type="text" name="phone" class="form-control" placeholder="Phone" value="<?php echo $contact->phone; ?>">
      </div>
      <div class="input-group pull-left">
        <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $contact->phone; ?>">
      </div>
      <input type="hidden" name="id" value="<?php echo $contact->id; ?>"/>
      <button type="button" class="btn btn-sm btn-warning pull-left" id="updateButton">Update</button>
  	</form>
  </div>
</div>
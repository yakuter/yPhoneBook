<?php

include_once "includes/ez_sql_core.php";
include_once "includes/ez_sql_mysqli.php";
include_once "includes/config.php";
$db = new ezSQL_mysqli($db_user, $db_password, $db_name, $db_host);
$db->query("SET NAMES utf8"); 

?>

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
    <tbody id="result">

<?php
if (isset($_POST['search'])) {
	$kosul="WHERE name LIKE '%".$_POST['search']."%' 
	        OR phone LIKE '%".$_POST['search']."%' 
	        OR email LIKE '%".$_POST['search']."%'";
} else {$kosul='';}

$sqlGet="SELECT * FROM $db_table $kosul ORDER BY id DESC";
$contacts = $db->get_results($sqlGet);

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
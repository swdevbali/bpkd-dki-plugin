<?php
function swdev_bendahara_create () {
$id = $_POST["id"];
$name = $_POST["name"];
//insert
if(isset($_POST['insert'])){
	global $wpdb;
	$wpdb->insert(
		'bendahara', //table
		array('id' => $id,'name' => $name), //data
		array('%s','%s') //data format			
	);
	$message.="Bendahara inserted";
}
?>
<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/bpkd/style-admin.css" rel="stylesheet" />
<div class="wrap">
<h2>Add New Bendahara</h2>
<?php if (isset($message)): ?><div class="updated"><p><?php echo $message;?></p></div><?php endif;?>
<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
<p>Three capital letters for the ID</p>
<table class='wp-list-table widefat fixed'>
<tr><th>ID</th><td><input type="text" name="id" value="<?php echo $id;?>"/></td></tr>
<tr><th>Nama</th><td><input type="text" name="name" value="<?php echo $name;?>"/></td></tr>
</table>
<input type='submit' name="insert" value='Save' class='button'>
</form>
</div>
<?php
}
<?php
function swdev_bendahara_list () {
?>
<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/bpkd/style-admin.css" rel="stylesheet" />
<div class="wrap">
<h2>Bendahara</h2>
<a href="<?php echo admin_url('admin.php?page=swdev_bendahara_create'); ?>">Add New</a>
<?php
global $wpdb;
$rows = $wpdb->get_results("SELECT id,name from bendahara");
echo "<table class='wp-list-table widefat fixed'>";
echo "<tr><th>ID</th><th>Name</th><th>&nbsp;</th></tr>";
foreach ($rows as $row ){
	echo "<tr>";
	echo "<td>$row->id</td>";
	echo "<td>$row->name</td>";	
	echo "<td><a href='".admin_url('admin.php?page=swdev_bendahara_update&id='.$row->id)."'>Update</a></td>";
	echo "</tr>";}
echo "</table>";
?>
</div>
<?php
}
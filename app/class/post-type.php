<?php	
class PostType
{
	public static function register_all_post_type()
	{
		register_post_type( 'Bendahara',
		array(
		'label' => 'Bendahara',
		'labels' => array(
		'add_new'
		=> 'Add New',
		'add_new_item'
		=> 'Add New Bendahara',
		'edit_item'
		=> 'Edit Bendahara',
		'new_item'
		=> 'New Bendahara',
		'view_item'
		=> 'View Bendahara',
		'search_items'
		=> 'Search Bendahara',
		'not_found'
		=> 'No Bendahara Found',
		'not_found_in_trash'=> 'Not Found in Trash',
		),
		'description' => 'Daftar Bendahara',
		'public' => false,
		'show_ui' => true,
		'menu_position' => 5,
		'supports' => array('title'),
		)
		);
	}
}

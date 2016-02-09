<?php
global $etheme_theme_data;
$etheme_theme_data = wp_get_theme( get_stylesheet_directory() . '/style.css' );
require_once( get_template_directory() . '/framework/init.php' );

global $current_user;
get_currentuserinfo();

/*add_action( 'admin_init', 'wpse_136058_debug_admin_menu' );
function wpse_136058_debug_admin_menu(){echo '<pre>' . print_r( $GLOBALS[ 'menu' ], TRUE) . '</pre>';}*/

function basicMenu(){
	$appName='ARweaber';
	$appID='AR';
	add_menu_page($appName,$appName,'administrator',$appID.'weaber','pluginAdminScreen','',2);
}


function arw_remove_normal_menus(){
	remove_menu_page('edit.php?post_type=testimonial');
	remove_menu_page('edit.php?post_type=staticblocks');
	remove_menu_page('edit-comments.php');
	remove_menu_page('edit.php?post_type=etheme_portfolio');
	remove_menu_page('edit.php?post_type=essential_grid');
	remove_menu_page('themes.php');
	remove_menu_page('plugins.php');
	remove_menu_page('users.php');
	remove_menu_page('tools.php');
	remove_menu_page('options-general.php');
}
function arw_remove_admin_menus(){
	remove_menu_page('themepunch-google-fonts');
	remove_menu_page('wpcf7');
	remove_menu_page('ot-theme-options');
	remove_menu_page('yith_wcwl_panel');
	remove_menu_page('vc-general');
	remove_menu_page('mailchimp-for-wp');
	remove_menu_page('revslider');
	remove_menu_page('yit_plugin_panel');
	remove_menu_page('about-ultimate');
	remove_menu_page('essential-grid');
}



if($current_user->ID == '21')
{
	add_action('admin_menu','basicMenu');
}
else
	{
	
		$location ='index.php';
		
		if ($current_user->ID != '2') 
		{
		wp_redirect( $location);
		}

		
	add_action('admin_menu','arw_remove_normal_menus');
	add_action('admin_init', 'arw_remove_admin_menus', 99);
	}





function pluginAdminScreen(){

	$iconos=array("fa-comment","fa-th-large","fa-comments-o","fa-code","fa-th","fa-envelope","fa fa-bolt",
		"fa-eye","fa-bug","fa-bullhorn","fa-users","fa-wrench","fa-cubes","fa-cog","fa-paper-plane","fa-object-ungroup",
		"fa-bars","fa-font","fa-shield"
	);

	$names=array("Testimonials","Static Blocks","Comments","Portfolio","Grid Posts","Contact",
		"Theme Options","Appearance","YIT Plugins","Plugins","Users","Tools","Visual Composer","Settings",
		"Mailchimp for WP","Slider Revolution","Ess Grid","Punch Fonts","Ultimate"
	);

	$links=array("edit.php?post_type=testimonial","edit.php?post_type=staticblocks","edit-comments.php",
		"edit.php?post_type=etheme_portfolio","edit.php?post_type=essential_grid","admin.php?page=wpcf7",
		"admin.php?page=ot-theme-options","themes.php","admin.php?page=yith_wcwl_panel","plugins.php",
		"users.php","tools.php","admin.php?page=vc-general","options-general.php","admin.php?page=mailchimp-for-wp",
		"admin.php?page=revslider","admin.php?page=essential-grid","admin.php?page=themepunch-google-fonts","admin.php?page=about-ultimate",);


	$output ='<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">';
	$output .='<link rel="stylesheet" id="bsf-core-admin-css" href="http://localhost/FreezeFrame/wp-content/plugins/Ultimate_VC_Addons/admin/bsf-core/assets/css/style.css" type="text/css" media="all">';
	$output .='<div class="wrap bsf-page-wrapper ultimate-about">
	<div class="wrap-container">
		<div class="heading-section">
			<div class="bsf-pr-header bsf-left-header" style="margin-bottom: 55px;">
				<h2>ARweaber - Menu</h2>
		    </div>
		</div>	<!--heading section-->

		<div class="inside bsf-wrap">
			<div class="container">';
							
		for ($i=0; $i < 20; $i++) { 
		$output .='
		<div class="col-sm-3 col-lg-3">
			<a class="resource-block-link" href="'.$links[$i].'">
				<div class="resource-block-icon">
					<span class="dashicons "><i class="fa '.$iconos[$i].'"></i></span>
					
				</div>
				<div class="resource-block-content">
					'.$i.' - '.$names[$i].'
				</div>
			</a>
		</div><!--col-sm-3-->';
		}
									
$output .='</div><!--container-->
		</div><!--bsf-wrap-->
	</div><!--wrap-container-->
</div>';

	echo $output;
	
}


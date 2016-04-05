<?php 

function wpbootstrap_scripts_with_jquery()
{
    // Register the script like this for a theme:
    wp_enqueue_script( 'bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) );
    wp_enqueue_script( 'bootstrap-css', get_stylesheet_directory_uri() . '/css/bootstrap.min.css' );
    
    wp_enqueue_script( 'bootstrap-js' );
    wp_enqueue_style( 'bootstrap-css' );
}

add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );





// MENU //

function seb_theme_register_theme_menu() {
    register_nav_menu( 'primary', 'Primary Menu' );
}
add_action( 'init', 'seb_theme_register_theme_menu' );


// PAGINATION //

if ( !function_exists( 'wpex_pagination' ) ) {
	
	function wpex_pagination() {
		
		$prev_arrow = is_rtl() ? '&rarr;' : '&larr;';
		$next_arrow = is_rtl() ? '&larr;' : '&rarr;';
		
		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			 if( !$current_page = get_query_var('paged') )
				 $current_page = 1;
			 if( get_option('permalink_structure') ) {
				 $format = 'page/%#%/';
			 } else {
				 $format = '&paged=%#%';
			 }
			echo paginate_links(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> $prev_arrow,
				'next_text'		=> $next_arrow,
			 ) );
		}
	}
}

// CUSTOMIZER CODE //

function seb_theme_customizer( $wp_customize ) {
    $wp_customize->add_section( 'seb_avatar_section' , array(
    'title'       => __( 'Avatar', 'seb' ),
    'priority'    => 30,
    'description' => 'Upload an avatar to replace the default avatar',
	));
	
	$wp_customize->add_setting( 'seb_avatar' );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'seb_avatar', array(
    'label'    => __( 'Avatar', 'seb' ),
    'section'  => 'seb_avatar_section',
    'settings' => 'seb_avatar',
	) ) );
}
add_action( 'customize_register', 'seb_theme_customizer' );

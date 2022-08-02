<?php
/**
* Plugin Name: NavBar
* Plugin URI: http://wp.com
* Description: test soal
* Version: 1.0
* Author: Rifai
* Author URI: http://wp.com
**/

//Add bar after the opening body
add_action('wp_body_open', 'tb_head');

function menu_static() {?>
    <div class="nav">
    <input type="checkbox" id="nav-check">
        <div class="nav-header">
            <div class="nav-title">
            Test Soal
            </div>
        </div>
        <div class="nav-btn">
            <label for="nav-check">
            <span></span>
            <span></span>
            <span></span>
            </label>
        </div>
        
        <div class="nav-links">
            <a class="active" href="#">Home</a>
            <a href="#">Education</a>
            <a href="#">Voting</a>
            <a href="#">African</a>
            <a href="#">All</a>
        </div>
        </div>
    <?php
}

function tb_head()
{
    echo menu_static();
}

//Top Bar Plugin Page

function nav_plugin_page() {
	$page_title = 'NavBar Options';
	$menu_title = 'NavBar';
	$capatibily = 'manage_options';
	$slug = 'nav-plugin';
	$callback = 'nav_page_html';
	$icon = 'dashicons-schedule';
	$position = 60;

	add_menu_page($page_title, $menu_title, $capatibily, $slug, $callback, $icon, $position);
}

add_action('admin_menu', 'nav_plugin_page');

function nav_register_settings() {
	register_setting('nav_option_group', 'nav_field');
}

add_action('admin_init', 'nav_register_settings');

function nav_page_html() { ?>
<div class="wrap top-bar-wrapper">
    <div>
        <p>NavBar Options</p>
    </div>
</div>

<?php }

add_action('admin_head', 'css_backand');


function css_backand() {
	echo 
    wp_enqueue_style('adcss', plugins_url('/css/admin-style.css', __FILE__));
    wp_enqueue_style('adjs', plugins_url('/js/admin-app.js', __FILE__));;
}

add_action('admin_init', 'css_backand');


function css_frontend(){
    wp_enqueue_style('fdcss', plugins_url('/css/style.css', __FILE__));
    wp_enqueue_style('fdjs', plugins_url('/js/app.js', __FILE__));
}

add_action('wp_enqueue_scripts', 'css_frontend');
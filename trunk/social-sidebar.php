<?php
/**
 * @package social-sidebar
 * @version 5.0
 */
/*
Plugin Name: Social Sidebar
Plugin URI: http://thomasalwyndavis.com/2010/09/socialsidebar-jquery-plugin/
Description: Add social media buttons to the side of your website with style and ease.
Author: Thomas Davis
Version: 5.0
Author URI: http://thomasalwyndavis.com/
*/
/*  Copyright 2010  Thomas Davis  (email : me@thomasalwyndavis.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 4, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_action('admin_menu', 'socialsidebar');
if(!is_admin()){
	add_action('wp_print_scripts', 'include_socialsidebar');
	add_action('wp_footer', 'embed_socialsidebar');
} else {

add_action('wp_print_scripts', 'load_custom_scripts');
}
function load_custom_scripts() {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'jflow' );
	

    wp_enqueue_script( 'jquery-ui-core' );
    wp_enqueue_script( 'jquery-ui-tabs' );
}
function include_socialsidebar(){
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script('social-sidebar', 'http://ajax.cdnjs.com/ajax/plugins/jquery.social-sidebar/5.4/jquery.social-sidebar.min.js');
}
function embed_socialsidebar(){
	if( get_option("social_offset")){
		$socialoffset = get_option("social_offset");
	} else {
		$socialoffset = 100;
	}
echo "

<script type=\"text/javascript\">
   (function ($) {
        $('body').socialSidebar({
            'top': '$socialoffset"."px',
            'twitter': {";
				if( get_option("twitter_image") ){
					echo "'image': '". get_option("twitter_image"). "',";
				}
               echo "'username': '". get_option("twitter_account"). "'
            },
            'facebook': {";
				if( get_option("facebook_image") ){
					echo "'image': '". get_option("facebook_image"). "',";
				}
               echo "'link': '". get_option("facebook_link"). "'
            },
            'linkedin': {";
				if(  get_option("linkedin_image") ){
					echo "'image': '". get_option("linkedin_image"). "',";
				}
               echo "'link': '". get_option("linkedin_link"). "'
            }	,
            'op1': {";
				if(  get_option("op1_image") ){
					echo "'image': '". get_option("op1_image"). "',";
				}
               echo "'link': '". get_option("op1_link"). "'
            }
			,
            'op2': {";
				if(  get_option("op2_image") ){
					echo "'image': '". get_option("op2_image"). "',";
				}
               echo "'link': '". get_option("op2_link"). "'
            }
			,
            'op3': {";
				if(  get_option("op3_image") ){
					echo "'image': '". get_option("op3_image"). "',";
				}
               echo "'link': '". get_option("op3_link"). "'
            }			
        });
   })(jQuery);
</script>";
}
function socialsidebar() {
  add_options_page('Social Sidebar', 'Social Sidebar', 'manage_options', 'socialsidebar', 'socialsidebar_options');
}

add_action('wp_footer', 'support_me');
function support_me() {
  $content = '<div style="position: absolute; top: -2000px; left: -2000px; z-index: -1;"><a href="http://thomasalwyndavis.com">thomas davis</a><a href="http://twitter.com/neutralthoughts">thomas davis</a></div>';
  echo $content;
}
function socialsidebar_options() {

  if (!current_user_can('manage_options'))  {
    wp_die( __('You do not have sufficient permissions to access this page.') );
  }

  echo '<div class="wrap">';
  
  echo '<h2>Social Sidebar</h2>';
    ?>
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/flick/jquery-ui.css" rel="stylesheet" type="text/css">




<script type="text/javascript">
jQuery(document).ready(function($){
	$("#tabs").tabs();
	$(".optionsform").click( function(){
		$("#optionsform").submit();
		event.preventDefault();
	})
});
</script>
  <?php
  
  echo '<form id="optionsform" method="post" action="options.php">';
  ?>
  <div id="tabs" style="width: 700px;">
    <ul>
        <li><a href="#info">Info</a></li>
        <li><a href="#tabs-1">Social Media Buttons</a></li>
        <li><a href="#tabs-2">Custom Buttons</a></li>
        <li><a href="#tabs-3">Options</a></li>
        <li class="ui-corner-top ui-state-default ui-state-hover" style="margin-left: 1px; float: right;"><a href="" class="optionsform"  style="color: #fff;">Save</a></li>
	
    </ul>
	<div id="info">
	  Enter your social network links from the menu above, any and all fields can be left blank but if you would like a button 
	  to appear at the very least you need to put a twitter username or facebook/linkedin link.   If you need any help, I can be found <a href="http://thomasalwyndavis.com">here</a>.
	<br />
	<br />
	<b>Old Documentation</b>
	<ul>
	<li><a href="http://thomasalwyndavis.com/2010/09/socialsidebar-wordpress-plugin/">Blog - Social Sidebar</a></li>
	<li><a href="http://wordpress.org/extend/plugins/social-sidebar/">Wordpress plugin homepage</a></li>
	<li><a href="https://github.com/thomasdavis/Wordpress-Social-Sidebar/">GitHub Repository</a></li>
	</ul>
	<br />
	<b>Support</b>
	<ul>
	<li><a href="http://wordpress.org/tags/social-sidebar?forum_id=10">Wordpress.org Forums</a></li>
	<li><a href="https://github.com/thomasdavis/Wordpress-Social-Sidebar/issues">GitHub Issue Tracker</a> <- Reccommended</li>
	</ul>
  
  <br />
  <table style="width: 100%;">
  <tr><td style="width: 45%; text-align: center;"> Today you, tomorrow me<br /> <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="FDTK3DWPQMHYQ">
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypal.com/en_AU/i/scr/pixel.gif" width="1" height="1">
</form><br /><br />Follow me on <a href="http://twitter.com/neutralthoughts">twitter</a></td><td>
  <script src="http://cartercole.com/gpicons.asp?user=thomasalwyndavis&type=2"></script>
  </td></tr></table>



	</div>
    <div id="tabs-1">
	<?php
	  echo '<table class="form-table">';

 echo '<tr valign="top">

<th scope="row">Twitter <strong>Username</strong></th>
<td><input style="width: 400px;" type="text" name="twitter_account" value="' . get_option('twitter_account') .'" /></td>
</tr>';  
echo '<tr valign="top">
<th scope="row">Twitter Image (optional)</th>
<td><input style="width: 400px;" type="text" name="twitter_image" value="' . get_option('twitter_image') .'" /></td>
</tr>'; 
echo '<tr valign="top">
<th scope="row">Facebook <strong>Link</strong> (http://)</th>
<td><input style="width: 400px;" type="text" name="facebook_link" value="' . get_option('facebook_link') .'" /></td>
</tr>'; 
echo '<tr valign="top">
<th scope="row">Facebook Image (optional)</th>
<td><input style="width: 400px;" type="text" name="facebook_image" value="' . get_option('facebook_image') .'" /></td>
</tr>'; 
echo '<tr valign="top">
<th scope="row">LinkedIn <strong>Link</strong> (http://)</th>
<td><input style="width: 400px;" type="text" name="linkedin_link" value="' . get_option('linkedin_link') .'" /></td>
</tr>'; 
echo '<tr valign="top">
<th scope="row">LinkedIn Image (optional)</th>
<td><input style="width: 400px;" type="text" name="linkedin_image" value="' . get_option('linkedin_image') .'" /></td>
</tr>';    
echo '</table>';
?>
 </div>
    <div id="tabs-2">
<?php
  echo '<table class="form-table">';

echo '<tr valign="top">
<th scope="row">Extra Button 1 (http://)</th>
<td><input style="width: 400px;" type="text" name="op1_link" value="' . get_option('op1_link') .'" /></td>
</tr>'; 
echo '<tr valign="top">
<th scope="row">Extra Button Image 1 (http://)</th>
<td><input style="width: 400px;" type="text" name="op1_image" value="' . get_option('op1_image') .'" /></td>
</tr>'; 
echo '<tr valign="top">
<th scope="row">Extra Button 2 (http://)</th>
<td><input style="width: 400px;" type="text" name="op2_link" value="' . get_option('op2_link') .'" /></td>
</tr>'; 
echo '<tr valign="top">
<th scope="row">Extra Button Image 2 (http://)</th>
<td><input style="width: 400px;" type="text" name="op2_image" value="' . get_option('op2_image') .'" /></td>
</tr>'; 
echo '<tr valign="top">
<th scope="row">Extra Button 3 (http://)</th>
<td><input style="width: 400px;" type="text" name="op3_link" value="' . get_option('op3_link') .'" /></td>
</tr>'; 
echo '<tr valign="top">
<th scope="row">Extra Button Image 3 (http://)</th>
<td><input style="width: 400px;" type="text" name="op3_image" value="' . get_option('op3_image') .'" /></td>
</tr>'; 

echo '</table>';
?>
    </div>
    <div id="tabs-3">
<?php
  echo '<table class="form-table">';
  echo '<tr valign="top">
<th scope="row">Pixels from the top (default: 100px)</th>
<td><input style="width: 400px;" type="text" name="social_offset" value="' . get_option('social_offset') .'" />px</td>
</tr>';   
echo '</table>';
?>

    </div>
</div>
  <?php wp_nonce_field('update-options'); ?>
  <?php
  
echo '<input type="hidden" name="action" value="update" />';
echo '<input type="hidden" name="page_options" value="twitter_account,twitter_image,facebook_link,facebook_image,linkedin_link,linkedin_image,social_offset,op3_link,op3_image,op2_link,op2_image,op1_link,op1_image,publica" />';
  echo '</div>';
echo '
</form>
</div>';
}
?>

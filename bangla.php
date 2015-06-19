<?php
/*
  Plugin Name: Bangla Comment
  Plugin URI:  http://mariumakter.site40.net/plugins/bangla-comment
  Description: Adds Bangla typing system in WordPress Post/Page and Comment section. 
  Author: Marium Akter
  Version: 1.0
  Author URI: http://mariumakter.site40.net/
 */
add_action('init', 'wp_banglakb_loadjs');

function wp_banglakb_loadjs() {

    wp_enqueue_script('jquery');
    wp_enqueue_script('banglakb-engine', plugin_dir_url(__FILE__) . 'js/engine.js', array('jquery'));
    wp_enqueue_script('banglakb-driver-phonetic', plugin_dir_url(__FILE__) . 'js/driver.phonetic.js', array('jquery', 'banglakb-engine'));
    wp_enqueue_script('banglakb-driver-probhat', plugin_dir_url(__FILE__) . 'js/driver.probhat.js', array('jquery', 'banglakb-engine'));
    wp_enqueue_script('banglakb', plugin_dir_url(__FILE__) . 'js/banglakb.js', array('jquery', 'banglakb-engine'));
}

add_action('admin_footer', 'wp_banglakb');

function wp_banglakb() {
    echo '<script>banglakb_addpostbuttons();</script>';
}


add_filter ( 'comment_form', 'wp_banglakb_comments' );


function wp_banglakb_comments(){
    $content = "
    <p class=\"comment-form-comment\"><input type='button' value='phonetic' onclick=\"banglakb_public_comment(phonetic);\"></input>
    <input type='button' value='probhat' onclick=\"banglakb_public_comment(probhat);\"></input>
    <input type='button' value='english' onclick='banglakb_toggle();'></input>
    </p>";
    echo $content;

}


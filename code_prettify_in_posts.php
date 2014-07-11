<?php

/*
  Plugin Name: code prettify in posts
  Plugin URI: http://amit.choukroune.info/blog/code-prettify
  Description: use shortcode in posts and pages to use code prettify
  Version: 0.1
  Author: Amit Choukroune
  Author URI: http://amit.choukroune.info
  License: GPLv2 or later
  Text Domain: codeprettify
  Domain Path: /languages
 */

function load_scripts() {
// footer
    wp_enqueue_script('other-script', 'https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js', array(), '0.1', true);
}

add_action('wp_enqueue_scripts', 'load_scripts');

function code_shortcode($atts, $content = null) {
    $a = shortcode_atts(array(
        'type' => '-1',
        'line' => 'linenums',
            ), $atts);
    if ($a['type'] == -1) {
        return '<code class="prettyprint'.$a['line'].'" dir="ltr">' . $content . '</code>';
    } else {
        return '<code class="prettyprint '.$a['line'].' lang-'.$a['type'].'" dir="ltr">' . $content . '</code>';
    }
}

add_shortcode('code', 'code_shortcode');

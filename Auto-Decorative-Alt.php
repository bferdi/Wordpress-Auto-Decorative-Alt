<?php
/**
 * Plugin Name: Auto Decorative Alt
 * Author: Ben Ferdinands
 * Version: 1.0
 * Description: This plugin automatically adds empty alt attributes to images with no alt text.
 */

 function add_empty_alt($content) {
    // Regex to match images without alt or with empty alt
    $pattern = '/<img((?![^>]*alt=[\'"][^\'"]*[\'"]).)*?>/i';
    $pattern_empty_alt = '/<img([^>]*alt=["\'][^\S]*["\'][^>]*)>/i';

    // Replacement pattern
    $replacement = '<img$1 alt="" role="presentation">';

    // Replace content
    $new_content = preg_replace($pattern, $replacement, $content);
    $new_content = preg_replace($pattern_empty_alt, $replacement, $new_content);

    return $new_content;
}

add_filter('the_content', 'add_empty_alt');

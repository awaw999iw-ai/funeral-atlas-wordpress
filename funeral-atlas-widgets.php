<?php
/**
 * Plugin Name: Funeral Atlas Widgets
 * Description: Embed Funeral Atlas Price Index, Market Counter and Funeral Cost Calculator.
 * Version: 1.0.0
 * Author: Funeral Atlas
 * Author URI: https://funeral-atlas.art/
 */

if (!defined("ABSPATH")) { exit; }

function funeral_atlas_widget_shortcode($atts) {
    $atts = shortcode_atts(["mode" => "index"], $atts);
    $mode = sanitize_key($atts["mode"]);
    $allowed = ["index" => 300, "counter" => 390, "calculator" => 520];
    if (!isset($allowed[$mode])) { $mode = "index"; }
    $height = $allowed[$mode];
    $src = "https://funeral-atlas.art/embed/" . $mode . ".html?utm_source=wordpress&utm_medium=plugin&utm_campaign=" . $mode;
    return "<iframe src=\"" . esc_url($src) . "\" title=\"Funeral Atlas Widget\" loading=\"lazy\" style=\"width:100%;max-width:680px;height:" . intval($height) . "px;border:0;border-radius:16px\"></iframe>";
}
add_shortcode("funeral_atlas_widget", "funeral_atlas_widget_shortcode");

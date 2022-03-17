<?php

/**

 * Plugin Name: Custom Copyright plugin

 * Plugin URI: http://www.cinema.theskate.com

 * Description: This plugin gives the option to display a self updating copyright date by using "echo comicpress_copyright();".

 * Version: 1.0

 * Author: Oltean alexandru Florin

 * Author URI: http://www.wp-oltean.com

 */


// Display copyright date

  function comicpress_copyright() {
    global $wpdb;
    $copyright_dates = $wpdb->get_results("
    SELECT
    YEAR(min(post_date_gmt)) AS firstdate,
    YEAR(max(post_date_gmt)) AS lastdate
    FROM
    $wpdb->posts
    WHERE
    post_status = 'publish'
    ");
    $output = '';
    if($copyright_dates) {
    $copyright = "&copy; " . $copyright_dates[0]->firstdate;
    if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
    $copyright .= '-' . $copyright_dates[0]->lastdate;
    }
    $output = $copyright;
    }
    return $output;
    }
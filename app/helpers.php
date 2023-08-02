<?php

/**
 * Theme helpers.
 */

function acf_link($link, $class = '', $default = 'Learn More', $echo = true)
{
    if (empty($link) && !is_array($link)) {
        return false;
    }

    $link_title = !empty($link['title']) ? $link['title'] : $default;

    $output = "<a ";
    $output .= !empty($class) ? "class='{$class}'" : null;
    $output .= "href='{$link['url']}'";
    $output .= !empty($link['target']) ? "target='_blank'" : null;
    $output .= ">{$link_title}</a>";

    if ($echo) {
        echo $output;
    } else {
        return $output;
    }
}

function admin_log($log, $name = '_')
{
    $date = new \DateTime();
    $date->setTimezone(new \DateTimeZone('Europe/Warsaw'));
    $log_time = $date->format('Y-m-d H:i:s');

    if (is_array($log)) {
        $log = http_build_query($log, '', ', ');
    }

    $log_msg =  $log_time . ' : ' . $log;
    $folder = dirname(__FILE__) . "/../../../logs/";

    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
    }

    $log_file_data = $folder . '/log' . $name . date('d-M-Y') . '_' . date('h') . '.log';
    file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
}

function placehold_img($size = '150x150', $format = 'png', $text_color = '#fff', $bg_color = '#6d6d6d', $text = false)
{
    $url = 'https://via.placeholder.com/' . $size . '.' . $format . '/' . $bg_color . '/' . $text_color ;
    if ($text) {
        $text = str_replace(' ', '+', $text);
        $url .= '?text=' . $text;
    }
    return $url;
}

function acf_group_has_value($group_field) {
    // Check if the group field exists and has subfields
    if (empty($group_field['sub_fields'])) {
        return false;
    }

    // Loop through the subfields and check if any of them have a value
    foreach ($group_field['sub_fields'] as $subfield) {
        $field_key = $subfield['key'];
        $field_value = get_field($field_key);

        if ($field_value !== false && $field_value !== '') {
            // If at least one subfield has a value, return true
            return true;
        }
    }

    // If none of the subfields have a value, return false
    return false;
}
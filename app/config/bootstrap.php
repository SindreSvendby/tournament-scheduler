<?php


add_action('mvc_admin_init', 'load_classes');
add_action('mvc_public_init', 'load_classes');


MvcConfiguration::set(array(
    'Debug' => false
));


MvcConfiguration::append(array(
    'AdminPages' => array(
        'tournaments' => array(
            'add' => array('capability' => 'delete_others_pages'),
            'edit' => array('capability' => 'delete_others_pages'),
            'delete' => array('capability' => 'delete_others_pages'),
            'results' => array('capability' => 'delete_others_pages'),
            'close_registration' => array('capability' => 'delete_others_pages', 'in_menu' => false),
            'open_registration' => array('capability' => 'delete_others_pages', 'in_menu' => false),
            'capability' => 'delete_others_pages'),
        'teams' => array('hide_menu' => true),
        'matches' => array('hide_menu' => true),
        'results' => array(
            'edit_result' => array('capability' => 'delete_others_pages',
                'in_menu' => false),
            'delete' => array('capability' => 'delete_others_pages',
                'in_menu' => false),
            'add_team' => array('capability' => 'delete_others_pages',
                'in_menu' => false),
            'save_results',
            'choose_tournament_to_edit',
            'capability' => 'delete_others_pages'
        )
    )
));

function load_classes() {
    include dirname(__FILE__) . "/../src/MyAutoloader.php";
    include dirname(__FILE__) . "/../src/function/util.php";
}

add_action('mvc_admin_init', 'tournament_scheduler_on_mvc_admin_init');
add_action('mvc_public_init', 'tournament_scheduler_on_mvc_public_init');

function tournament_scheduler_on_mvc_admin_init($options)
{
    wp_register_style('mvc-style_tournament-scheduler-admin', mvc_css_url('tournament-scheduler', 'admin'));
    wp_enqueue_style('mvc-style_tournament-scheduler-admin');
}

function tournament_scheduler_on_mvc_public_init($options)
{
    wp_register_style('mvc-style_tournament-scheduler-public', mvc_css_url('tournament-scheduler', 'tournament-scheduler'));
    wp_enqueue_style('mvc-style_tournament-scheduler-public');
}
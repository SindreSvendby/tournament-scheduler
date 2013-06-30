<?php


add_action('mvc_admin_init', 'load_classes');
add_action('mvc_public_init', 'load_classes');


MvcConfiguration::set(array(
    'Debug' => false
));

$TOURNAMENT_SCEHDURER_ADMIN_RIGHTS = 'delete_others_pages';

MvcConfiguration::append(array(
    'AdminPages' => array(
        'tournaments' => array(
            'add' => array('capability' => $TOURNAMENT_SCEHDURER_ADMIN_RIGHTS),
            'edit' => array('capability' => $TOURNAMENT_SCEHDURER_ADMIN_RIGHTS),
            'delete' => array('capability' => $TOURNAMENT_SCEHDURER_ADMIN_RIGHTS),
            'results' => array('capability' => $TOURNAMENT_SCEHDURER_ADMIN_RIGHTS),
            'close_registration' => array('capability' => $TOURNAMENT_SCEHDURER_ADMIN_RIGHTS, 'in_menu' => false),
            'open_registration' => array('capability' => $TOURNAMENT_SCEHDURER_ADMIN_RIGHTS, 'in_menu' => false),
            'capability' => $TOURNAMENT_SCEHDURER_ADMIN_RIGHTS),
        'teams' => array('hide_menu' => false),
        'matches' => array(
            'tournament' => array('capability' => $TOURNAMENT_SCEHDURER_ADMIN_RIGHTS, 'in_menu' => false),
            'capability' => $TOURNAMENT_SCEHDURER_ADMIN_RIGHTS),
        'results' => array(
            'edit_result' => array('capability' => $TOURNAMENT_SCEHDURER_ADMIN_RIGHTS,
                'in_menu' => false),
            'delete' => array('capability' => $TOURNAMENT_SCEHDURER_ADMIN_RIGHTS,
                'in_menu' => false),
            'add_team' => array('capability' => $TOURNAMENT_SCEHDURER_ADMIN_RIGHTS,
                'in_menu' => false),
            'save_results',
            'choose_tournament_to_edit',
            'capability' => $TOURNAMENT_SCEHDURER_ADMIN_RIGHTS
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
<?php


namespace ts\player;


class WPPlayerImpl implements Player {

    public function __construct($id) {
        $this->wp_user = get_userdata($id);
    }

    public function name()
    {
        return $this->wp_user->display_name;
    }

    public function id()
    {
        return $this->wp_user->ID;
    }

}
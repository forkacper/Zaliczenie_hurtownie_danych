<?php

require('config.php');
require('auth.php');

require_once(TEMPLATES . '/header.php');
require_once(TEMPLATES . '/navbar.php');
require_once(TEMPLATES . '/left-panel.php');
require_once(TEMPLATES . '/notifications.php');

$action = $page = '';

if (isset($_REQUEST['page'])) {
    $page = $_REQUEST['page'];
};
if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
};


switch ($page) {
    case 'players':
        if ($action == "add") {
            require_once('players_add.php');
        } else if ($action == "edit") {
            require_once('players_edit.php');
        } else if ($action == "delete") {
            require_once('players.php');
        } else {
            require_once('players.php');
        }
        break;
    case 'staff':
        if ($action == "add") {
            require_once('staff_add.php');
        } else if ($action == "edit") {
            require_once('staff_edit.php');
        } else if ($action == "delete") {
            require_once('staff.php');
        } else {
            require_once('staff.php');
        }
        break;
    default:
        require_once('home.php');
}

require_once(TEMPLATES . '/footer.php');

<?php

    require_once 'functions.php';
    require_once('helpers.php');
    $db = require_once 'db.php';

    $link = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);

    if (!$link) {
        $error = mysqli_connect_error();
        $content = include_template('error.php', ['error' => $error]);
    }

    mysqli_set_charset($link, 'utf8');

    $categories = [];
    $content = '';

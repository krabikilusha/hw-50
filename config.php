<?php
    define('DATABASE', 'sqlite:./data/data.db');
    define('UPLOAD_DIR', '/data/uploads');

    define('USERS_GET_LIST', 'SELECT * FROM users');
    define('USERS_GET_MAX_ID', 'SELECT MAX(id) FROM users');
    define('USERS_GET_ITEM', "SELECT * FROM users WHERE login = :login");
    define('USERS_GET_ITEM_ID', "SELECT * FROM users WHERE id = :id");
    define('USERS_ADD_ITEM', "INSERT INTO users (login, password, name, hash) VALUES (:login, :password, :name, :hash)");

    define('CARDS_GET_LIST', 'SELECT * FROM cards');
    define('CARDS_DELETE_ELEMENT', "DELETE FROM cards WHERE id = :id");
    define('CARDS_GET_MAX_ID', 'SELECT MAX(id) FROM cards');
    define('CARDS_GET_ITEM', "SELECT * FROM cards WHERE id = :id");
    define('CARDS_ADD_ITEM', "INSERT INTO cards (creator_id, name, path) VALUES (:userId, :name, :path)");

    define('COMMENTS_GET_LIST', 'SELECT * FROM comments ORDER BY create_dt DESC');
    define('COMMENTS_DELETE_ELEMENT', "DELETE FROM comments WHERE id = :id");
    define('COMMENTS_DELETE_CARDS_ELEMENTS', "DELETE FROM comments WHERE card_id = :card_id");
    define('COMMENTS_GET_LIST_FOR_CARD', 'SELECT * FROM comments WHERE card_id = :card_id ORDER BY create_dt DESC');
    define('COMMENTS_GET_MAX_ID', 'SELECT MAX(id) FROM comments');
    define('COMMENTS_GET_ITEM', "SELECT * FROM comments WHERE id = :id");
    define('COMMENTS_GET_ITEM_COUNT_COMMENTS', "SELECT COUNT(*) FROM comments WHERE card_id = :card_id");
    define('COMMENTS_ADD_ITEM', "INSERT INTO comments (card_id, data, create_dt, user_id) VALUES (:card_id, :data, :create_dt, :user_id)");
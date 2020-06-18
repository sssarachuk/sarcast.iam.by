<?php
return array(
    User::ROLE_GUEST => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Guest',
        'bizRule' => NULL,
        'data' => NULL
    ),
    User::ROLE_USER => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'User',
        'children' => array(
			User::ROLE_GUEST,
        ),
        'bizRule' => NULL,
        'data' => NULL
    ),
    User::ROLE_ADMIN => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Admin',
        'children' => array(
			User::ROLE_USER,
        ),
        'bizRule' => NULL,
        'data' => NULL
    ),
);
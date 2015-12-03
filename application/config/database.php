<?php defined('SYSPATH') OR die('No direct access allowed.');
$config['active'] = 'default';
$config['default'] = array
(
  'benchmark'     => TRUE,
  'persistent'    => FALSE,
  'connection'    => array
  (
    'database' => 'db_loop_stack',
    'host'     => 'localhost',
    'user'     => 'dev',
    'pass'     => 'dev',
    'port'     => FALSE,
    'socket'   => FALSE,
    'type'     => 'mysql'
  ),
  'character_set' => 'utf8',
  'table_prefix'  => '',
  'object'        => TRUE,
  'cache'         => FALSE,
  'escape'        => TRUE
);

$config['mock'] = array
(
  'benchmark'     => TRUE,
  'persistent'    => FALSE,
  'connection'    => array
  (
    'database' => 'db_loop_ol',
    'host'     => 'mes-server',
    'user'     => 'dev',
    'pass'     => 'dev',
    'port'     => 50001,
    'socket'   => FALSE,
    'type'     => 'mysql'
  ),
  'character_set' => 'utf8',
  'table_prefix'  => '',
  'object'        => TRUE,
  'cache'         => FALSE,
  'escape'        => TRUE
);
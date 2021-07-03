<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// smtp
$config['protocol'] = 'smtp';
$config['charset'] = 'utf-8';
$config['emailtype'] = 'html';
$config['wordwrap'] = TRUE;
$config['smtp_host'] = 'ssl://smtp.gmail.com';
$config['smtp_port'] = 465;
$config['smtp_user'] = '**********@gmail.com';
$config['smtp_pass'] = '**********';
$config['newline'] = "\r\n";
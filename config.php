<?php
# CMS Made Simple Configuration File
# Documentation: /doc/CMSMS_config_reference.pdf
#
//error_reporting( E_ALL );
//ini_set('display_errors', 1);
$config['dbms'] = 'mysql';
$config['db_hostname'] = 'mariadb55.websupport.sk';
$config['db_username'] = 'ciernybalogdev';
$config['db_password'] = 'ciernybalogdev12*';
$config['db_name'] = 'ciernybalogdev';
$config['db_port'] = 3310;
$config['db_prefix'] = 'cms_';
$config['timezone'] = 'Europe/Berlin';
$config['output_compression'] = true;

$config['url_rewriting'] = 'internal'; // this is new from 1.6
$config['page_extension'] = '.html';
$config['use_hierarchy'] = true; // no longer in the config file
$config['query_var'] = 'page';
?>

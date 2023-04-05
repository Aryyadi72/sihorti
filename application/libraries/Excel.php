<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

define('PHPEXCEL_ROOT', APPPATH . 'third_party/PHPExcel/');
require_once APPPATH . 'third_party/PHPExcel/Shared/String.php';
require_once APPPATH . 'third_party/PHPExcel/Autoloader.php';
require_once APPPATH . 'third_party/PHPExcel/PHPExcel.php';

class Excel extends PHPExcel {

   public function __construct() {
      parent::__construct();
   }
   
}

?>

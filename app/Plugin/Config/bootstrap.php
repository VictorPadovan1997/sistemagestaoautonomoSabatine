<?php
$root = dirname(dirname(__FILE__));
$ds = DIRECTORY_SEPARATOR;
$vendorRootPath = $root . $ds . 'Vendor' . $ds . 'make-pdf' . $ds . 'lib' . $ds;
App::build(array('Vendor' => array($vendorRootPath)));
unset($ds, $root, $vendorRootPath); 

App::import('Vendor', 'PdfDocument');
App::import('Vendor', 'PdfReport');

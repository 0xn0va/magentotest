<?php
set_time_limit(0);
ini_set('memory_limit', '1024M');
include_once "app/Mage.php";
include_once "downloader/Maged/Controller.php";

Mage::init();

$app = Mage::app('default');

$categories = array(
    'Category 1' => 3,
    'Category 2' => 4,
    'Category 3' =>5,
    'Category 4'=>6,


);
$row = 0;

if (($handle = fopen("account_managers.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        echo 'Importing product: '.$data[0].'<br />';
        foreach($data as $d)
        {
            echo $d.'<br />';
        }
        $num = count($data);
        $row++;

        if($row == 1) continue;

        $accmanagers = Mage::getModel('abdo_vaimo/accmanagers');

        $product->setSku($data[0]);
        $product->setName($data[3]);
        $product->setDescription($data[4]);
        $product->setShortDescription('');
        $product->setManufacturer($data[20]);
        $product->setPrice($data[9]);
        $product->setTypeId('simple');



        $accmanagers->save();


    }
    fclose($handle);

}


?>
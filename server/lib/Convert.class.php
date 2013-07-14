<?php

# class for converting uploaded pdf documents to some jpeg.

class Convert {

  public function __construct($pdf_location, $jpg_output_location){
    $Imagick = new Imagick();
    $pdf_handle = fopen($pdf_location, 'r'); #open pdf for r/w & create
    $jpg_handle = fopen($jpg_output_location, 'a+');
    $Imagick->readImageFile($pdf_handle);
    $Imagick->setFormat("jpg");
    $Imagick->setImageFormat("jpg");
    $Imagick->writeImageFile($jpg_handle);
    fclose($pdf_location);
    fclose($jpg_handle);
  }

}


?>

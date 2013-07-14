<?php

# class for converting uploaded pdf documents to some jpeg.

class Convert {

  public function __construct($pdf_location, $jpg_output_location){
    `convert $pdf_location $jpg_output_location/.jpg`;
  }


}


?>

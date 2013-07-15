<?php

# class for converting uploaded pdf documents to some jpeg.

class Convert {

  public function __construct($pdf_location, $jpg_output_location){
    `mkdir $jpg_output_location;`;
    # this runs faster, has higher dpi, and works better for now.
    `convert -density 400 $pdf_location -scale 1920x1080 $jpg_output_location;`;
  }

}


?>

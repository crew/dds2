5/24/13
  * Installed ImageMagick
  * ImageMagick will take a multi page PDF and convert it into 1 page per image. So we will not have any issues with needing to explode PDFs  
  * Two folders inside BackendInternals inputPDF and SlidesDump convert.py takes
    the name of a file in inputPDF converts it to a jpg and dumps it into SlidesDump  
  * Right now the web server (apache) is just pointed at /home/goodwin/dds2/
    should probably fix that  



6/15/13

  * Created front-end admin UI for dds


6/19/13

  * http://www.simonbattersby.com/blog/simple-jquery-image-crossfade/
  * This is the best cross fade solution I have seen so far, will require
    re-working how we handle images. will * NOT * work with HTML. If that is
    still in the works.

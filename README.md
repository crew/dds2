DDS 2.0
======


###Goals:  
1.  Use less technology  
2.  Keep good track of how we build things, how to *deploy* dds  


###Structure:  

Back end UI
  * Web page that uses: Html, css, Javascript  
  * handles uploading of new slides and assigning of slides to front end boxes  

Back end Internals  
  * Scripts that: Converts PDFs into slides (some image file), puts them into
    their appropriate places  
  * Can (maybe) accept 1 PDF explode it into slides, and then convert those  
  * Probably will use bash  
  * Using http://www.imagemagick.org for our image conversion  
  * Possibly using http://pdfkit.org for our PDF explosion  

Front End Internals  
  * File that accepts a request for slides, does a DNS lookup on the IP, assigns
    slides according to what name that box has.
  * Uses some sever magic 

Front End UI
  * Web page that DDS front end machine is pointed at (using chrome?)  
  * Page, then makes a second request (once loaded) for images to Front End Internals File & receives slides  

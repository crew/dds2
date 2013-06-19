DDS 2.0
======


###Goals:  
1.  Use less technology  
2.  Keep good track of how we build things, how to *deploy* dds  
3.  Use puppet


###Structure:  

Back end UI
  * Web page that uses: Html, css, Javascript  
  * handles uploading of new slides and assigning of slides to front end boxes  

Back end Internals  
  * Scripts that: Converts PDFs into slides (some image file), puts them into
    their appropriate places  
  * Using http://www.imagemagick.org for our image conversion  
  * Using puppet to assign slides etc.

Front End Internals (MOCK UP DONE)  
  * Thanks to using puppet we will be able to just give each machine the slides
    they need, which lets us change the way this works.
  * Index page looks at what slides have been given, and then will present
    those.

Front End UI (MOCK UP DONE)  
  * Can (maybe) accept 1 PDF explode it into slides, and then convert those  
  * Probably will use bash  
  * Using http://www.imagemagick.org for our image conversion  

Front End Internals  
  * File that accepts a request for slides, does a DNS lookup on the IP, assigns
    slides according to what name that box has.
  * Uses some sever magic 

Front End UI
  * Web page that DDS front end machine is pointed at (using chrome?)  

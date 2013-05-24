#!/usr/bin/python
import os
import sys

if(len(sys.argv) != 1):
  FILE= sys.argv[1]
  """We need the file without the extension so that we can name our images using ImageMagick"""
  FILENAME = FILE.split(".")[0]

  print "Converting inputPDF/"+FILE+" to SlidesDump/ouput/"+FILENAME+".jpg"
  result = os.popen("convert inputPDF/"+FILE+" SlidesDump/"+FILENAME+".jpg").read()

  print result

else:
  print "Bailing, not right number of args"

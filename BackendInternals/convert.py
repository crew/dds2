#!/usr/bin/python
import os
import sys

FILES="/Users/goodwin/Git/dds2/BackendInternals/upload/"

#change into our uploads
os.chdir(FILES)
for files in os.listdir("."):
  split = files.split(".")
  arrayfilename = split[0:len(split)-1]
  filename = "".join(arrayfilename)
  print "Converting: upload/"+files
  print "To:         processed/"+filename+".jpg"
  # create the directories
  result = os.popen("mkdir -p /Users/goodwin/Git/dds2/Frontend/slides/"+filename)
  # do the conversion, assuming our pdf 
  result = os.popen("convert upload/"+files+" SlidesDump/"+filename+".jpg").read()
  




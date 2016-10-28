# Copyright (c) 2012 Swaroop SM <swaroop.striker@gmail.com>
# This program is free: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.

# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.

# <http://www.gnu.org/licenses/>.


# These are the various modules you need to import
# Make sure you download the BeautifulSoup Library before importing that
# Visit: http://www.crummy.com/software/BeautifulSoup/

#!/usr/bin/python

import urllib
import urllib2
from bs4 import BeautifulSoup

#The VTU exam results website url
url = 'http://results.vtu.ac.in/vitavi.php'

#Input a valid VTU Universit Seat Number Eg.: 1CR08CS111
usn=raw_input("Enter your USN: ")

#Send data using POST Method
values =urllib.urlencode({'submit' : 'SUBMIT','rid' : usn})
print "Loading, Please wait!"
response = urllib2.urlopen(url,values)

#Store the html response
the_page = response.read()


#Here comes the BeautifulSoup Module
soup=BeautifulSoup(the_page)
try:
	name=soup.findAll('td')[54].b
	sem=soup.findAll('td')[56].b
	result=soup.findAll('td')[58].b
	total=soup.findAll('td')[90]
	print("\n-------------------------------------------------------------\n")
	print(" Name: \033[1;36m"+name.contents[0]+"\033[1;m")
	print(" Semester: "+sem.contents[0])
	print("\n\033[1;36m"+result.contents[0]+"\033[1;m")
	print("\n-------------------------------------------------------------\n")
	tot=0;
	try:
		#Starting of the td row in the above html(May change, will fix it ;))
		i=64

		#An arbitary ending value
		e=140
		while(i<e):
			t=soup.findAll('td')[i].i
			s=soup.findAll('td')[i+1]
			v=soup.findAll('td')[i+2]
			pf=soup.findAll('td')[i+4].b
			a=int(s.contents[0])
			b=int(v.contents[0])
			sum1=a+b
			tot=tot+sum1;
			pf1=pf.contents[0]
			if(pf1=='P'):
				#A colour code with respective pass/fail result
				my_r="\033[1;38m PASS\033[1;m"
			else:
				my_r="\033[1;31m FAIL\033[1;m"
			print('\033[1;36m'+t.contents[0]+'\033[1;m')
			print("---------------------------------------------------")
			print("External: "+s.contents[0])
			print("Internal: "+v.contents[0])
			print("Total: "+str(sum1)+" & "+my_r)
			print("===================================================")
			i=i+5
	except:
		print ""

	#Calculates the total Marks
	print("\033[1;33m TOTAL: "+str(tot)+"\033[1;m")
	print("===================================================")
except AttributeError:
	print "\033[1;31mError, may be results for that USN is unavailable or you typed in a Invalid USN!\033[1;m"
except IndexError:
	print "\033[1;31mError, may be results for that USN is unavailable or you typed in a Invalid USN!\033[1;m"

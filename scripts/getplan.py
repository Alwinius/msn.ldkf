#!/usr/bin/env python

import requests
username='06113938'
password='5885'
post_data={'kdnrv':username, 'geheim':password}
answer = requests.post(url='http://v1388.vcdns.de/termmsn/login.php', data=post_data, allow_redirects=False)
#response=unicodedata.normalize('NFKD', answer.text).encode('ascii','ignore')
cookie=answer.cookies["PHPSESSID"]
cookies=dict(PHPSESSID=cookie)
jan=''
for i in range(12):
	i+=1
	plan=requests.post(url='http://v1388.vcdns.de/termmsn/plan.php', cookies=cookies, data={'monat':i})
	#print(plan.text)
	if(not plan.text.find('<b>Preis</b></td></tr></table')>0):
		if(i==1):
			jan=plan.text[plan.text.find("<table>"):plan.text.find("</table>")+8];
		else:
			data=plan.text[plan.text.find("<table>"):plan.text.find("</table>")+8];
			if(jan!='' and i==12):
				data=jan
print(data)
	

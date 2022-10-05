import sys
import smtplib

x = sys.argv[1]
y = sys.argv[2]



fromaddr = 'atharvasarfare40@gmail.com'  
toaddrs  = 'gammingworld18@gmail.com'  
# subject = 'Issue in Lab No. '+ x  
msg = 'Query: '+ y

username = 'atharvasarfare40@gmail.com'  
password = 'xlzgfucisjhnwuyr'

server = smtplib.SMTP('smtp.gmail.com', 587)  
server.ehlo()
server.starttls()
server.login(username, password)  
server.sendmail(fromaddr, toaddrs, msg)  
server.quit()
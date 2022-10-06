import sys
import smtplib

a = sys.argv[1]
b = sys.argv[2]
c = sys.argv[3]

# print(x)
# print(y)

fromaddr = 'atharvasarfare40@gmail.com'  
toaddrs  = 'gammingworld18@gmail.com'  
# msg = 'Issue in Lab No. '+ x + ' Query: '+ y
# msg= a + b + c


msg=f'Subject: Issue In lab No.{a}\n\n body:{b}\n\n from:{c}'
# print(msg)

username = 'atharvasarfare40@gmail.com'  
password = 'ewjfwdvvlmhrodgq'

server = smtplib.SMTP('smtp.gmail.com', 587)  
server.ehlo()
server.starttls()
server.login(username, password)  
server.sendmail(fromaddr, toaddrs, msg)  
server.quit()
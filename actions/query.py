import sys
import smtplib
import mysql.connector as MC

a = sys.argv[1]
b = sys.argv[2]
c = sys.argv[3]
d=sys.argv[4]

try:
    Con_o = MC.connect(host="localhost",user="root",passwd="",database="stock")
    if Con_o.is_connected():
        print("Connection established successfully")
except Exception as E:
    print("Connection Failed !")
    print("ERROR : ",E)

Cur = Con_o.cursor()

sql="SELECT query FROM pc_lab{} WHERE pc_id={}".format(a,d)
Cur.execute(sql)

result = Cur.fetchall()
# print(result)

Con_o.close()

# print(x)
# print(y)

fromaddr = 'atharvasarfare40@gmail.com'  
toaddrs  = 'gammingworld18@gmail.com'  
# msg = 'Issue in Lab No. '+ x + ' Query: '+ y
# msg= a + b + c


msg=f'Subject: Issue In lab No.{a} Pc ID:{d}\n\n body:{result}\n\n from:{c}'
# print(msg)

username = 'atharvasarfare40@gmail.com'  
password = 'ewjfwdvvlmhrodgq'

server = smtplib.SMTP('smtp.gmail.com', 587)  
server.ehlo()
server.starttls()
server.login(username, password)  
server.sendmail(fromaddr, toaddrs, msg)  
server.quit()
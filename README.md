### Install
https://github.com/Akkadate/edocument/wiki/install

# ระบบงานสารบรรณอีเล็คทรอนิคส์ (E-Document)


## การกำหนดค่า SQL mode ใน MySQL บน Ubuntu 22.04 สามารถทำได้ตามขั้นตอนดังนี้:

1. แก้ไขไฟล์การตั้งค่าของ MySQL
คุณจะต้องแก้ไขไฟล์ my.cnf หรือ mysqld.cnf ขึ้นอยู่กับเวอร์ชันของ MySQL ที่คุณใช้

สำหรับ MySQL 8.0 โดยปกติไฟล์จะอยู่ที่ /etc/mysql/mysql.conf.d/mysqld.cnf
เปิดไฟล์เพื่อแก้ไขโดยใช้ nano หรือ vim (คุณสามารถเลือกตัวแก้ไขไฟล์ที่คุณถนัด):
``` 
sudo nano /etc/mysql/mysql.conf.d/mysqld.cnf
```
2. เพิ่มหรือแก้ไข SQL mode
ในไฟล์ mysqld.cnf ให้ค้นหาหรือเพิ่มส่วนที่เป็น [mysqld] จากนั้นเพิ่มหรือแก้ไขค่า sql_mode

[mysqld]
``` 
sql_mode = ""
```

```
systemctl restart mysql
``` 

## แก้ไขหน้า home 404 เวลา เอกสารใหม่ = 0
modules/edocument/controllers/home.php
``` 
if ($document_count > 0) {    แก้เป็น   if ($document_count >= 0) { 
``` 
##หน้าสร้างผู้ใช้ 
modules/indes/views/register.php


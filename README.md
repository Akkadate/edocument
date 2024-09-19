# ระบบงานสารบรรณอีเล็คทรอนิคส์ (E-Document)


#### การกำหนดค่า SQL mode ใน MySQL บน Ubuntu 22.04 สามารถทำได้ตามขั้นตอนดังนี้:

1. แก้ไขไฟล์การตั้งค่าของ MySQL
คุณจะต้องแก้ไขไฟล์ my.cnf หรือ mysqld.cnf ขึ้นอยู่กับเวอร์ชันของ MySQL ที่คุณใช้

สำหรับ MySQL 8.0 โดยปกติไฟล์จะอยู่ที่ /etc/mysql/mysql.conf.d/mysqld.cnf
เปิดไฟล์เพื่อแก้ไขโดยใช้ nano หรือ vim (คุณสามารถเลือกตัวแก้ไขไฟล์ที่คุณถนัด):

[mysqld]
``` 
```  sql_mode = ""  ```
``` 

#### แก้ไขหน้า home 404 เวลา เอกสารใหม่ = 0
modules/edocument/controllers/home.php
``` 
``` if ($document_count > 0) {    แก้เป็น   if ($document_count >= 0) { ```
``` 


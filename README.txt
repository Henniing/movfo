
Readme
_________________
1. Install php5
2. Install apache 2.2
3. Download MovFo`s source code from GitHub 
4. Configure apache to access localhost 127.0.0.1
5. Access the site from your localhost/folder
6. example: 127.0.0.1:8000/movfo/site or http://127.0.0.1:8000/movfo



You may need to config: httpd.conf
Here is an example of how it could look: 
______________________________
<Directory "C:\movfo\site\">
    Options Indexes MultiViews
    AllowOverride None
    Options None
    Order allow,deny
    Allow from all
</Directory>

Alias /movfo "C:\movfo\site\"
______________________________

url will then be: http://localhost:8000/movfo   <--- alias /movfo
or: http://127.0.0.1:8000/movfo

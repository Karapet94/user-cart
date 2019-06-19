Please do this changes.

C:\Windows\System32\drivers\etc\hosts
add

127.0.0.1       user-cart.local

&

C:\xampp\apache\conf\extra\httpd-vhosts.conf
add

<VirtualHost *:80>
    ServerAdmin webmaster@dummy-host2.example.com
    DocumentRoot "C:/xampp/htdocs/user-cart/"
    ServerName user-cart.local
    ErrorLog "logs/dummy-host2.example.com-error.log"
    CustomLog "logs/dummy-host2.example.com-access.log" common
</VirtualHost>
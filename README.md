# Web Dev Index

This is just a quick and very dirty index to my web development environment. I am using apache subdomains to host each folder.

Apache conf example:

    <VirtualHost *:80>
        ServerAdmin webmaster@dummy-host2.example.com
        DocumentRoot /Users/oliver/Code
        ServerAlias *.oliver.dev
        RewriteEngine on
        <Directory /Users/oliver/Code>
            Options Indexes FollowSymLinks MultiViews
            AllowOverride All
            Order allow,deny
            allow from all
        </Directory>

        # For a Symfony type project
        RewriteCond %{HTTP_HOST} !^www.* [NC]
        RewriteCond %{HTTP_HOST} ^([^\.]+)\.oliver.dev
        RewriteCond /Users/oliver/Code/%1/web -d
        RewriteRule ^(.*) /%1/web/$1 [L]

        # For a normal php project
        RewriteCond %{HTTP_HOST} !^www.* [NC]
        RewriteCond %{HTTP_HOST} ^([^\.]+)\.oliver.dev
        RewriteCond /Users/oliver/Code/%1 -d
        RewriteRule ^(.*) /%1/$1 [L]
    </VirtualHost>

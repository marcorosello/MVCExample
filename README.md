# MVCExample
Just a little example of a sales board with MCV architecture.

# Installation
Vagrant environment for php7.
```sh
    $ git clone https://github.com/rlerdorf/php7dev.git
```

Create a shared folder
```sh
    $ mkdir www
    $ vagrant ssh
    $ sudo ln -s /vagrant/www /var/www/default
```

Inside www
```sh
    $ git clone https://github.com/marcorosello/MVCExample.git
```

Autoload classes with composer
```sh
    $ composer dump-autoload -o
```
Add the database credentials to the config.php file in the base folder, by default sales adn vagrant user

add 192.168.7.7 php7dev to your hosts file and you should be able to see the app in

http://php7dev/www/


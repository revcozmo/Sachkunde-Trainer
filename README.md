Sachkunde-Trainer
=================

Online Trainingsprogramm für die in .de vorgeschriebene Waffensachkunde (Prüfung).

Installation
------------

* create database and database user
* import "install/sachkundetrainer.sql" to database
* copy or move "config/config.example.php" to "config/config.php"
* edit "config/config.php" and configure database connection
* call "install/import.php" (remove .htaccess before) in your browser or via shell with "php -f import.php"

That's it.

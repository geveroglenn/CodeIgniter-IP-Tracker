# CodeIgniter-IP-Tracker
CodeIgniter Library to track website visits

This is a simple CI script to track website visits.

This library will record IP address, web pages they opened and the time they visited your website.

You can extend the script to include tracking the User Agent of the user visiting your website. I did not include it in the code since I didn't find it useful for my purpose. The sole purpose why I wrote this script is for me to know how many site visits I am getting everyday and from what IP's they belong
to.

Kindly create a table in your database with the following columns:

`id` int(11) NOT NULL AUTO_INCREMENT,
 `ip` varchar(15) NOT NULL,
 `page_view` text,
 `date` int(11) NOT NULL,
 

Open iptracker.php and change at line 46 to your db table name.

How to use: Simply load the library in application/config/autoload.php
under autuload library line.

That's it no need to call the function in each of your controller file.


Thank you.

Visit my website at http://app-arsenal.com
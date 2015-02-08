# CodeIgniter-IP-Tracker
CodeIgniter Library to track website visits

This is a simple CI script to track website visits.

This library will record IP address, web pages they opened and the time they visited your website.

You can extend the script to include tracking the User Agent of the user visiting your website. I did not include it in the code since I didn't find it useful for my purpose. The sole purpose why I wrote this script is for me to know how many site visits I am getting everyday and from what IP's they belong
to.

Execute the sql script below in your MySQL Tool such as Workbench to create the needed table in your database to store the site visit records.
You can change the table name to your liking provided you also edit line 65 of the library class to match your provided table name.

CREATE TABLE `site_visits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) NOT NULL,
  `page_view` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=383 DEFAULT CHARSET=latin1;
 

Open iptracker.php and change at line 65 to your db table name.

How to use: Simply load the library in application/config/autoload.php
under autoload library line.

That's it no need to call the function in each of your controller file.

Visit my website at http://app-arsenal.com


Thank you.
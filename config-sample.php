<?php

/**
*  
* Hey! A simple config file to store your local dev root directory and some other things

* Change "/Applications/MAMP/htdocs" to the directory where you keep your sites. 

* Most of these defaults are set for macOS but you can easily switch them to 
* their Windows or Linux counterparts.

* Add multiple directories like this:
* $dir = array("/Applications/MAMP/htdocs","~/Local Sites/*");

* Default favicon courtesy of icons8.com 
*/

$debug = false;

// Local Dev Homepage root 
$local_root = './';

// directory name(s)
$dir = array("/Applications/MAMP/htdocs");
					
// Your local top level domain 
$local_tld = 'local';

// Are your sites using SSL? Default option is yes; change to http:// if no SSL
$protocol = 'https://';

// Display some quick links to sites you use often. An example is below.
$important_links = array(
	array( 'name' => 'Github', 'url' => 'https://github.com/macariojames' ),
	array( 'name' => 'Gist', 'url' => 'https://gist.github.com/macariojames')
	);

// Exclude directories from being listed, the default ones are the directories needed for this
$exclude_sites = array(
	'img', 
	'css', 
	'public',
	'local-dev-homepage'					
);

$default_icon = '/public/img/icons8-internet-40.png';
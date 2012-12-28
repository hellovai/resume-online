<?php
$config['db_name'] = 'resume-builder';
$config['db_hostname'] = 'localhost';
$config['db_username'] = 'root';
$config['db_password'] = '';

$config['mail_smtp'] = false;
$config['mail_username'] = 'example@example.com';
$config['mail_password'] = '';
$config['mail_smtp_host'] = '';
$config['mail_smtp_port'] = 465;

$config['site_name'] = "";
$config['organization_name'] = "";
$config['site_address'] = "http://localhost/resume-online/siteAPI"; //no trailing slash

//lock configuration
//the time in seconds a user must wait before trying again; otherwise they get locked out (count not increased)
$config['lock_time_initial'] = array('checkuser' => 5, 'checkadmin' => 5, 'register' => 20, 'root' => 10, 'peer' => 10, 'reset' => 60, 'reset_check' => 60);
//the time that overloads last
$config['lock_time_overload'] = array('checkuser' => 60*2, 'checkadmin' => 60*2, 'register' => 60*2, 'root' => 60*2, 'peer' => 60*2, 'reset' => 60*2, 'reset_check' => 60*2);
//the number of tries a user has (that passes the lock_time_initial test) before being locked by overload
$config['lock_count_overload'] = array('checkuser' => 12, 'checkadmin' => 12, 'register' => 12, 'root' => '12', 'peer' => 12, 'reset' => 12, 'reset_check' => 12);
//if a previous lock found less than this many seconds ago, count++; otherwise old entry is replaced
$config['lock_time_reset'] = 60;
//max time to store locks in the database; this way we can clear old locks with one function
$config['lock_time_max'] = 60*5;

//time it takes for reset to expire; users can only have one reset request at a time
$config['reset_time'] = 60*60*72;

//time before a user is deleted after registration if they do not access their account
$config['activation_time'] = 60*60*48;

$config['latex_path'] = "/usr/bin/pdflatex";

//enabling both of the options below is recommended to prevent cross-site request forgeries
$config['csrf_referer'] = true;
$config['csrf_token'] = false;

//if not blank, the fields below will be used for RSA encryption (modulus in hexadecimal)
// this ensures that passwords cannot be recovered even if an eavesdropper has full access to the server-client dialog
// to generate a key, see http://www-cs-students.stanford.edu/~tjw/jsbn/
// note: if you are using SSL, do NOT enable this - it'll waste resources on both client and server side
$config['rsa_modulus'] = '';
$config['rsa_exponent'] = '10001';
$config['rsa_key'] = '';
$config['rsa_passphrase'] = '';

//whether to enable the captcha system
// in order to use this, you must install Securimage 3.0 to the oneapp root directory
// this can be downloaded at http://www.phpcaptcha.org/download/
$config['captcha_enabled'] = false;
?>

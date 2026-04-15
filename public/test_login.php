<?php
$name = $_GET['username'];
$pwd = $_GET['password'];
if(!$name || !$pwd)
{
	die('username or password is required');
}
$ldap_host = "Cairo.TelecomEgypt.corp";
$ldap_binddn ="Cairo\\".$name;
$username=$name;
$ldap_bindpwd = $pwd;
$ldap_searchattr ="sAMAccountName";
$ldap_rootdn = "DC=Cairo,DC=TelecomEgypt,DC=corp";
$ldap_password = '';
$ldap_username = 'sAMAccountName';

$ldapconn = ldap_connect($ldap_host);
 
if (!$ldapconn) {
	echo "not connected";
	exit();
}
ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3) or die('Unable to set LDAP protocol version');
ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0); // We need this for doing an LDAP search.

if (TRUE !== ldap_bind($ldapconn, $ldap_username, $ldap_password)){
    die('<p>Failed to bind to LDAP server.</p>');
}

$searchFilter = '(sAMAccountName='.stripslashes(html_entity_decode($name,ENT_COMPAT,'UTF-8')).')';
$attributes = array();
$attributes[] = 'givenname';
$attributes[] = 'mail';
$attributes[] = 'samaccountname';
$attributes[] = 'sn';
$result = ldap_search($ldapconn, $ldap_rootdn, $searchFilter, $attributes);
print_r($result);
$entries = ldap_get_entries($ldapconn, $result);
print_r($entries);die;
$ldapbind = ldap_bind($ldapconn, $ldap_binddn, $ldap_bindpwd);
if (!$ldapbind) {
	ldap_close($ldapconn);
	print_r($ldapbind);
	echo "not connected2";
	exit();
}
print_r($ldapbind);
echo "<br />";
print_r($ldapconn);
echo "<br />";
print_r($ldap_binddn);
echo "<br />";
print_r($ldap_bindpwd);
echo "<br />";
echo "success";
die;
?>
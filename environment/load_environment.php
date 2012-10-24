<?php
$root_path = "/nfs/c10/h04/mnt/148974/domains/ccap.org";
if(file_exists(__DIR__ . "/production_env.php")) {
	require_once(__DIR__ . "/production_env.php");
} elseif(file_exists(__DIR__ . "/staging_env.php")) {
	require_once(__DIR__ . "/staging_env.php");
} elseif(is_file(__DIR__ . "/development_env.php")) {
	require_once(__DIR__ . "/development_env.php");
} elseif(is_file("$root_path/config/wordpress/production_env.php")) {
	require_once("$root_path/config/wordpress/production_env.php");
} elseif(is_file("$root_path/config/wordpress/staging_env.php")) {
	require_once("$root_path/config/wordpress/staging_env.php");
} elseif(is_file("$root_path/config/wordpress/development_env.php")) {
	require_once("$root_path/config/wordpress/development_env.php");
} else {
	require_once("$root_path/config/wordpress/development_env.php");
	die("Sorry! We're busy making this site better. We'll be back online shortly. (No environment could be loaded.)");
}	
?>
<?php
$project_root = dirname(__DIR__);
chdir($project_root);

if(!isset($_GET['route']) || trim((string)$_GET['route']) === '') {
	$_GET['route'] = 'admin';
}

require_once $project_root . '/index.php';

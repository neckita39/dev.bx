<?php

$config = [
	'menu' => [
		'index' => 'Главная',
		'favorite' => 'Избранное',
	],
];
$database=mysqli_init();
$host='localhost';
$username='student';
$password='student';
$dbName='dev';
$connectionResult=mysqli_real_connect(
	$database,
	$host,
	$username,
	$password,
	$dbName
);

if(!$connectionResult)
{
	$error=mysqli_connect_errno($database)." : ".mysqli_connect_error($database);
	trigger_error($error, E_USER_ERROR);
}
$result=mysqli_set_charset($database, 'utf8');
if (!$result)
{
	trigger_error(mysqli_error($database),E_USER_ERROR);
}

$query="SELECT * FROM director";
$result=mysqli_query($database, $query);
while ($row=mysqli_fetch_assoc($result))
{
	print_r($row);
}

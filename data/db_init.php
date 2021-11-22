<?php
function connectToDatabase(array $config): mysqli
{
	$database=mysqli_init();
	$connectionResult=mysqli_real_connect(
		$database,
		$config['db']['host'],
		$config['db']['username'],
		$config['db']['password'],
		$config['db']['dbName']
	);
	if(!$connectionResult)
	{
		$error=mysqli_connect_errno($database)." : ".mysqli_connect_error($database);
		return trigger_error($error, E_USER_ERROR);
	}
	$result=mysqli_set_charset($database, 'utf8');
	if (!$result)
	{
		return trigger_error(mysqli_error($database),E_USER_ERROR);
	}
	return $database;
}

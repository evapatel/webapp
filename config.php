<?php
$serverName = "tcp:wit-db-server.database.windows.net,1433";
$connectionOptions = array(
    "Database" => "WITRegistrationDB",
    "Uid" => "sqladmin",
    "PWD" => "P@ssw0rd"
);

//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

if (!$conn) {
    die("Connection failed: " . print_r(sqlsrv_errors(), true));
}
?>

<?php
require '../../connection/connection.php';

// Database credentials
$host = $servername ?? 'localhost';
$user = $username ?? 'root';
$pass = $password ?? '';
$db   = $dbname ?? '';

// dummy
$mysqldump = 'C:\\xampp\\mysql\\bin\\mysqldump.exe';

$backupFile = 'swabe_apparel_backup_' . date('Y-m-d_H-i-s') . '.sql';

// Command
$command = "\"$mysqldump\" --user={$user} --password={$pass} --host={$host} {$db} 2>&1";

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=' . $backupFile);
header('Pragma: no-cache');
header('Expires: 0');

$process = popen($command, 'r');
if ($process) {
    while (!feof($process)) {
        echo fread($process, 4096);
        flush();
    }
    pclose($process);
    exit;
} else {
    echo '-- Error: Could not initiate database backup.';
    exit;
}
?>

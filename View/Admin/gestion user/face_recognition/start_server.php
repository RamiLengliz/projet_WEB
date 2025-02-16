<?php
// Path to the batch file
$batchFile = "C:\\xampp\\htdocs\\Proschool\\view\\admin\\gestion user\\face_recognition\\run_server.bat";

// Log file to capture the output and errors
$logFile = "C:\\xampp\\htdocs\\Proschool\\view\\admin\\gestion user\\face_recognition\\run_server_php.log";

// Run the batch file asynchronously and log the output
$command = "start /B cmd /c \"$batchFile\" > \"$logFile\" 2>&1";
$output = shell_exec($command);

// Log the execution command for debugging
file_put_contents($logFile, "Command executed: $command\nOutput: $output\n", FILE_APPEND);

// Return a response
echo "Python server started";
?>

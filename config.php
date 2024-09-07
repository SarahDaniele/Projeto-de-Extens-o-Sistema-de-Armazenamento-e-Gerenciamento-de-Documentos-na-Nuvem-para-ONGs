<?php
require 'vendor/autoload.php';

use Google\Cloud\Storage\StorageClient;

$projectId = 'seu-projeto-id';
$bucketName = 'seu-nome-do-bucket';

$storage = new StorageClient([
    'projectId' => $projectId
]);

$bucket = $storage->bucket($bucketName);

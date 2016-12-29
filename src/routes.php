<?php
$routes = [
    'getModels',
    'getSingleModel',
    'recognizeAudio',
    'createSession',
    'getStatus',
    'getSessionOutput',
    'sessionBasedRecognizeAudio',
    'deleteSession',
    'registerCallback',
    'createJob',
    'checkJobs',
    'checkSingleJob',
    'deleteSingleJob',
    'createCustomModel',
    'getCustomModels',
    'metadata'
];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}


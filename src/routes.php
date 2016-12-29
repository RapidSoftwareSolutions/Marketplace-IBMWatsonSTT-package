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
    'getSingleCustomModel',
    'trainCustomModel',
    'resetCustomModel',
    'deleteCustomModel',
    'addCorpus',
    'getCorpora',
    'getSingleCorpus',
    'deleteSingleCorpus',
    'addWordsToCustomModel',
    'addSingleWordToCustomModel',
    'getWords',
    'getSingleWord',
    'deleteWordFromCustomModel',
    'metadata'
];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}


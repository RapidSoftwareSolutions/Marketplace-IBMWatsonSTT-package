<?php

namespace Test\Functional;

require_once(__DIR__ . '/../../src/Models/checkRequest.php');

class IBMWatsonSTTTest extends BaseTestCase {
    
    public function testPackage() {
        
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
            'deleteWordFromCustomModel'
        ];
        
        foreach($routes as $file) {
            $var = '{  
                        "args":{}
                    }';
            $post_data = json_decode($var, true);

            $response = $this->runApp('POST', '/api/IBMWatsonSTT/'.$file, $post_data);

            $this->assertEquals(200, $response->getStatusCode(), 'Error in '.$file.' method');
        }
    }
    
}

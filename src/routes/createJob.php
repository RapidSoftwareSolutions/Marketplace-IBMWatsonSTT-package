<?php

$app->post('/api/IBMWatsonSTT/createJob', function ($request, $response, $args) {
    
    $settings = $this->settings;
    
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['username','password','audioFile','audioType'], true);
    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    
    $auth = [$post_data['args']['username'], $post_data['args']['password']];
    
    $query_str = $settings['api_url'] . '/v1/recognitions';
    
    $headers['Content-Type'] = $post_data['args']['audioType'];
    
    $body = fopen($post_data['args']['audioFile'], 'r');
    
    $query = [];
    if(!empty($post_data['args']['callbackUrl'])) {
        $query['callback_url'] = $post_data['args']['callbackUrl'];
    }
    if(!empty($post_data['args']['events'])) {
        $query['events'] = $post_data['args']['events'];
    }
    if(!empty($post_data['args']['userToken'])) {
        $query['user_token'] = $post_data['args']['userToken'];
    }
    if(!empty($post_data['args']['resultsTtl'])) {
        $query['results_ttl'] = $post_data['args']['resultsTtl'];
    }
    if(!empty($post_data['args']['model'])) {
        $query['model'] = $post_data['args']['model'];
    }
    if(!empty($post_data['args']['customizationId'])) {
        $query['customization_id'] = $post_data['args']['customizationId'];
    }
    if(!empty($post_data['args']['continuous'])) {
        $query['continuous'] = $post_data['args']['continuous'];
    }
    if(!empty($post_data['args']['inactivityTimeout'])) {
        $query['inactivity_timeout'] = $post_data['args']['inactivityTimeout'];
    }
    if(!empty($post_data['args']['keywords'])) {
        $query['keywords'] = $post_data['args']['keywords'];
    }
    if(!empty($post_data['args']['keywordsThreshold'])) {
        $query['keywords_threshold'] = $post_data['args']['keywordsThreshold'];
    }
    if(!empty($post_data['args']['maxAlternatives'])) {
        $query['max_alternatives'] = $post_data['args']['maxAlternatives'];
    }
    if(!empty($post_data['args']['wordAlternativesThreshold'])) {
        $query['word_alternatives_threshold'] = $post_data['args']['wordAlternativesThreshold'];
    }
    if(!empty($post_data['args']['wordConfidence'])) {
        $query['word_confidence'] = $post_data['args']['wordConfidence'];
    }
    if(!empty($post_data['args']['timestamps'])) {
        $query['timestamps'] = $post_data['args']['timestamps'];
    }
    if(!empty($post_data['args']['profanityFilter'])) {
        $query['profanity_filter'] = $post_data['args']['profanityFilter'];
    }
    if(!empty($post_data['args']['smartFormatting'])) {
        $query['smart_formatting'] = $post_data['args']['smartFormatting'];
    }
    if(!empty($post_data['args']['speakerLabels'])) {
        $query['speaker_labels'] = $post_data['args']['speakerLabels'];
    }

    $client = $this->httpClient;
    
    try {

        $resp = $client->post( $query_str, 
            [
                'auth' => $auth,
                'headers' => $headers,
                'query' => $query,
                'body' => $body
            ]
        );
        $responseBody = $resp->getBody()->getContents();
  
        if(in_array($resp->getStatusCode(), ['200', '201', '202', '203', '204'])) {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
            if(empty($result['contextWrites']['to'])) {
                $result['contextWrites']['to']['status_msg'] = "Api return no results";
            }
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();        
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ConnectException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'INTERNAL_PACKAGE_ERROR';
        $result['contextWrites']['to']['status_msg'] = 'Something went wrong inside the package.';

    }
    
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    
});

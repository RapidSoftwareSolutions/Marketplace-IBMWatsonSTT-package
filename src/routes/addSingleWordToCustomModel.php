<?php

$app->post('/api/IBMWatsonSTT/addSingleWordToCustomModel', function ($request, $response, $args) {
    
    $settings = $this->settings;
    
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['username','password','customizationId','wordName']);
    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    
    $auth = [$post_data['args']['username'], $post_data['args']['password']];
    
    $headers['Content-Type'] = 'application/json';
    
    $body = [];
    if(!empty($post_data['args']['wordSoundsLike'])) {
        $body['sounds_like'] = $post_data['args']['wordSoundsLike'];
    }
    if(!empty($post_data['args']['wordDisplayAs'])) {
        $body['display_as'] = $post_data['args']['wordDisplayAs'];
    }
    
    $query_str = $settings['api_url'] . '/v1/customizations/'.$post_data['args']['customizationId'].'/words/'.$post_data['args']['wordName'];
    
    $client = $this->httpClient;
    
    try {

        $resp = $client->put( $query_str, 
            [
                'auth' => $auth,
                'headers' => $headers,
                'json'=> $body
            ]
        );
        $responseBody = $resp->getBody()->getContents();
  
        if(in_array($resp->getStatusCode(), ['200', '201', '202', '203', '204'])) {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = 'The custom word was successfully added to the custom model.';
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

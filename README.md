# IBMWatsonSTT Package
The IBM® Speech to Text service provides an API that enables you to add IBM's speech recognition capabilities to your applications.
* Domain: ibm.com
* Credentials: username, password

## How to get credentials: 
0. Register to [IBM Bluemix Console](https://console.ng.bluemix.net/registration/) 
1. After log in choose Speech To Text from [services](https://console.ng.bluemix.net/catalog/?category=watson)
2. Connect Speech To Text to your application at the left side, choose pricing plan and click on 'Create' button at the bottom of the page.
3. Click on 'Service Credentials' tab to see your username and password.
 
## IBMWatsonSTT.getModels
Retrieves a list of all voices available for use with the service. The information includes the voice's name, language, and gender, among other things.

| Field   | Type       | Description
|---------|------------|----------
| username| credentials| username obtained from IBM Bluemix.
| password| credentials| password obtained from IBM Bluemix.

## IBMWatsonSTT.getSingleModel
Retrieves information about a single specified model that is available for use with the service.

| Field   | Type       | Description
|---------|------------|----------
| username| credentials| username obtained from IBM Bluemix.
| password| credentials| password obtained from IBM Bluemix.
| modelId | String     | The identifier of the desired model. Possible values: ar-AR_BroadbandModel, en-UK_BroadbandModel, en-UK_NarrowbandModel, en-US_BroadbandModel, en-US_NarrowbandModel, es-ES_BroadbandModel, es-ES_NarrowbandModel, fr-FR_BroadbandModel, ja-JP_BroadbandModel, ja-JP_NarrowbandModel, pt-BR_BroadbandModel, pt-BR_NarrowbandModel, zh-CN_BroadbandModel, zh-CN_NarrowbandModel

## IBMWatsonSTT.recognizeAudio
Sends audio and returns transcription results for a sessionless recognition request.

| Field                    | Type       | Description
|--------------------------|------------|----------
| username                 | credentials| username obtained from IBM Bluemix.
| password                 | credentials| password obtained from IBM Bluemix.
| audioFile                | File       | The audio file.
| audioType                | String     | The MIME type of the audio. See README for more details.
| model                    | String     | The identifier of the model to be used for the recognition request. Possible values: ar-AR_BroadbandModel; en-UK_BroadbandModel; en-UK_NarrowbandModel; en-US_BroadbandModel (the default); en-US_NarrowbandModel; es-ES_BroadbandModel; es-ES_NarrowbandModel; fr-FR_BroadbandModel; ja-JP_BroadbandModel; ja-JP_NarrowbandModel; pt-BR_BroadbandModel; pt-BR_NarrowbandModel' zh-CN_BroadbandModel; zh-CN_NarrowbandModel
| customizationId          | String     | The GUID of a custom language model that is to be used with the request. The base language model of the specified custom language model must match the model specified with the model parameter. By default, no custom model is used.
| continuous               | String     | Indicates whether multiple final results that represent consecutive phrases separated by long pauses are returned. If true, such phrases are returned; if false (the default), recognition ends after the first end-of-speech (EOS) incident is detected.
| inactivityTimeout        | String     | The time in seconds after which, if only silence (no speech) is detected in submitted audio, the connection is closed with a 400 response code. The default is 30 seconds. Useful for stopping audio submission from a live microphone when a user simply walks away. Use -1 for infinity.
| keywords                 | String     | A list of keywords to spot in the audio. Each keyword string can include one or more tokens. Keywords are spotted only in the final hypothesis, not in interim results. Omit the parameter or specify an empty array if you do not need to spot keywords. Example: "colorado","tornado","tornadoes"
| keywordsThreshold        | String     | A confidence value that is the lower bound for spotting a keyword. A word is considered to match a keyword if its confidence is greater than or equal to the threshold. Specify a probability between 0 and 1 inclusive. No keyword spotting is performed if you omit the parameter. If you specify a threshold, you must also specify one or more keywords.
| maxAlternatives          | String     | The maximum number of alternative transcripts to be returned. By default, a single transcription is returned.
| wordAlternativesThreshold| String     | A confidence value that is the lower bound for identifying a hypothesis as a possible word alternative (also known as "Confusion Networks"). An alternative word is considered if its confidence is greater than or equal to the threshold. Specify a probability between 0 and 1 inclusive. No alternative words are computed if you omit the parameter.
| wordConfidence           | String     | Indicates whether a confidence measure in the range of 0 to 1 is returned for each word. The default is false.
| timestamps               | String     | Indicates whether time alignment is returned for each word. The default is false.
| profanityFilter          | String     | Indicates whether profanity filtering is performed on the transcript. If true (the default), the service filters profanity from all output except for keyword results by replacing inappropriate words with a series of asterisks. If false, the service returns results with no censoring. Applies to US English transcription only.
| smartFormatting          | String     | Indicates whether dates, times, series of digits and numbers, phone numbers, currency values, and Internet addresses are to be converted into more readable, conventional representations in the final transcript of a recognition request. If true, smart formatting is performed; if false (the default), no formatting is performed. Applies to US English transcription only.
| speakerLabels            | String     | Indicates whether labels that identify which words were spoken by which participants in a multi-person exchange are to be included in the response. If true, speaker labels are returned; if false (the default), they are not. Speaker labels can be returned only for the following language models: en-US_NarrowbandModel, es-ES_NarrowbandModel, ja-JP_NarrowbandModel. Setting speaker_labels to true forces the continuous and timestamps parameters to be true, as well, regardless of whether the user specifies false for the parameters.

## IBMWatsonSTT.createSession
Creates a session and locks recognition requests to that engine.

| Field          | Type       | Description
|----------------|------------|----------
| username       | credentials| username obtained from IBM Bluemix.
| password       | credentials| password obtained from IBM Bluemix.
| model          | String     | The identifier of the model to be used by the new session. Possible values: ar-AR_BroadbandModel; en-UK_BroadbandModel; en-UK_NarrowbandModel; en-US_BroadbandModel (the default); en-US_NarrowbandModel; es-ES_BroadbandModel; es-ES_NarrowbandModel; fr-FR_BroadbandModel; ja-JP_BroadbandModel; ja-JP_NarrowbandModel; pt-BR_BroadbandModel; pt-BR_NarrowbandModel' zh-CN_BroadbandModel; zh-CN_NarrowbandModel
| customizationId| String     | The GUID of a custom language model that is to be used with the new session. The base language model of the specified custom language model must match the model specified with the model parameter. By default, no custom model is used.

## IBMWatsonSTT.getStatus
Provides a way to check whether the specified session can accept another recognition request.

| Field    | Type       | Description
|----------|------------|----------
| username | credentials| username obtained from IBM Bluemix.
| password | credentials| password obtained from IBM Bluemix.
| sessionId| String     | The identifier of the session whose status is to be checked.
| cookies  | JSON       | Array of strings. The cookies to be set obtained from createSession method.

#### cookies format
```json

[
    "SESSIONID=130490780a355f0a091e367783ee559126833797; Secure; HttpOnly",
    "Watson-DPAT=9S1xTLwSTprnW0uZdHBS1qaavtJEPe5llT1tKrJhytyKLV1zpTQrfHV3HWEmVTM8xZAj5sCmTciD%2FwYZ8g%2FxqkAc2nUauw95n%2BuDUf56VHocNCOMoy%2BDx6iw0wPq1lT8dUpDl7QFJeOjmztVUdEgWNUR7v7vvczBVlHVA5JAWBztVmKxPe2aad5OLWieLuSk2eZzbzDBrL3HBvF9%2BZxUgL0TbeBz29oKEH%2BC40G0RCFy6xM6ZfbnOW4%2BgzWuQAEVM%2BGc8qB8DtZ5kU8PleVGARmTB8oOhQqMHn24XmU%2Bs7mJb8g8xUjyK8S0%2Fmm7p1xyjbfnBWPCUHbOjXWZKEhWenJ4ko1RJAge3BYe%2FluOgoGbSw3Oi%2FVUPhaVdZ6rysu0m6x1mtJxxiK86xrWSrnQBesEQLY8RU%2FB%2F3zneqDRZ2rLuPTbDZDbrqwzIq4dtdRf3ojVF6rnYbDjagxGwlCjorT6t0MqHyv7LlT1YymTRoVdacSJaKpxK4v2BfpClvTPi9Jicas9bkOrFwkkcMO6uCpvhowqS6jiBn6mFDandacjjFSPwuOMIKXabRZrQ5oHe2AZZKXYybIstBUtXueHmHoXANIMxTK3ysf0Kt5Ajrd19oQmTzD080zSD%2FAG%2FruAPnOnTtjyrYg9Fx9GIGFagGUx2%2BBNtJGcRo9M2oywIbyW78yBvUKA5yR2BSXDgAc4yFLLNkPreXttdcUDu5jcHp%2BMQTYArK46r%2B1HiHApfz%2BXz5aji6BuaTghqXXYilII5yoyrMok17tTgK8FCPgFieUiEQFhWprBofx4y9BjJd8za4yLheSs%2BF2t%2B9nLklrG3XsMjUwKyIZKirpI7vgVku7TKC2Dzlvr7wy1hChQY6Ld%2BxxehMWz%2B9rVzfYLtTpnQqmpho3qsWA%3D; path=/speech-to-text/api; secure; HttpOnly"
]
```

## IBMWatsonSTT.getSessionOutput
Requests results for a recognition task within a specified session.

| Field         | Type       | Description
|---------------|------------|----------
| username      | credentials| username obtained from IBM Bluemix.
| password      | credentials| password obtained from IBM Bluemix.
| sessionId     | String     | The identifier of the session whose results you want to observe.
| cookies       | JSON       | Array of strings. The cookies to be set obtained from createSession method.
| sequenceId    | String     | The sequence ID of the recognition task whose results you want to observe. Omit the parameter to obtain results either for an ongoing recognition, if any, or for the next recognition task regardless of whether it specifies a sequence ID.
| interimResults| String     | Indicates whether the service is to return interim results. If true, interim results are returned as a stream of JSON objects; each object represents a single SpeechRecognitionEvent. If false, the response is a single SpeechRecognitionEvent with final results only.

#### cookies format
```json

[
    "SESSIONID=130490780a355f0a091e367783ee559126833797; Secure; HttpOnly",
    "Watson-DPAT=9S1xTLwSTprnW0uZdHBS1qaavtJEPe5llT1tKrJhytyKLV1zpTQrfHV3HWEmVTM8xZAj5sCmTciD%2FwYZ8g%2FxqkAc2nUauw95n%2BuDUf56VHocNCOMoy%2BDx6iw0wPq1lT8dUpDl7QFJeOjmztVUdEgWNUR7v7vvczBVlHVA5JAWBztVmKxPe2aad5OLWieLuSk2eZzbzDBrL3HBvF9%2BZxUgL0TbeBz29oKEH%2BC40G0RCFy6xM6ZfbnOW4%2BgzWuQAEVM%2BGc8qB8DtZ5kU8PleVGARmTB8oOhQqMHn24XmU%2Bs7mJb8g8xUjyK8S0%2Fmm7p1xyjbfnBWPCUHbOjXWZKEhWenJ4ko1RJAge3BYe%2FluOgoGbSw3Oi%2FVUPhaVdZ6rysu0m6x1mtJxxiK86xrWSrnQBesEQLY8RU%2FB%2F3zneqDRZ2rLuPTbDZDbrqwzIq4dtdRf3ojVF6rnYbDjagxGwlCjorT6t0MqHyv7LlT1YymTRoVdacSJaKpxK4v2BfpClvTPi9Jicas9bkOrFwkkcMO6uCpvhowqS6jiBn6mFDandacjjFSPwuOMIKXabRZrQ5oHe2AZZKXYybIstBUtXueHmHoXANIMxTK3ysf0Kt5Ajrd19oQmTzD080zSD%2FAG%2FruAPnOnTtjyrYg9Fx9GIGFagGUx2%2BBNtJGcRo9M2oywIbyW78yBvUKA5yR2BSXDgAc4yFLLNkPreXttdcUDu5jcHp%2BMQTYArK46r%2B1HiHApfz%2BXz5aji6BuaTghqXXYilII5yoyrMok17tTgK8FCPgFieUiEQFhWprBofx4y9BjJd8za4yLheSs%2BF2t%2B9nLklrG3XsMjUwKyIZKirpI7vgVku7TKC2Dzlvr7wy1hChQY6Ld%2BxxehMWz%2B9rVzfYLtTpnQqmpho3qsWA%3D; path=/speech-to-text/api; secure; HttpOnly"
]
```

## IBMWatsonSTT.sessionBasedRecognizeAudio
Sends audio and returns transcription results for a session-based recognition request.

| Field                    | Type       | Description
|--------------------------|------------|----------
| username                 | credentials| username obtained from IBM Bluemix.
| password                 | credentials| password obtained from IBM Bluemix.
| sessionId                | String     | The identifier of the session to be used.
| cookies                  | JSON       | Array of strings. The cookies to be set obtained from createSession method.
| audioFile                | File       | The audio file.
| audioType                | String     | The MIME type of the audio. See README for more details.
| sequenceId               | String     | The sequence ID of this recognition task. If omitted, no sequence ID is associated with the request.
| continuous               | String     | Indicates whether multiple final results that represent consecutive phrases separated by long pauses are returned. If true, such phrases are returned; if false (the default), recognition ends after the first end-of-speech (EOS) incident is detected.
| inactivityTimeout        | String     | The time in seconds after which, if only silence (no speech) is detected in submitted audio, the connection is closed with a 400 response code. The default is 30 seconds. Useful for stopping audio submission from a live microphone when a user simply walks away. Use -1 for infinity.
| keywords                 | String     | A list of keywords to spot in the audio. Each keyword string can include one or more tokens. Keywords are spotted only in the final hypothesis, not in interim results. Omit the parameter or specify an empty array if you do not need to spot keywords. Example: "colorado","tornado","tornadoes"
| keywordsThreshold        | String     | A confidence value that is the lower bound for spotting a keyword. A word is considered to match a keyword if its confidence is greater than or equal to the threshold. Specify a probability between 0 and 1 inclusive. No keyword spotting is performed if you omit the parameter. If you specify a threshold, you must also specify one or more keywords.
| maxAlternatives          | String     | The maximum number of alternative transcripts to be returned. By default, a single transcription is returned.
| wordAlternativesThreshold| String     | A confidence value that is the lower bound for identifying a hypothesis as a possible word alternative (also known as "Confusion Networks"). An alternative word is considered if its confidence is greater than or equal to the threshold. Specify a probability between 0 and 1 inclusive. No alternative words are computed if you omit the parameter.
| wordConfidence           | String     | Indicates whether a confidence measure in the range of 0 to 1 is returned for each word. The default is false.
| timestamps               | String     | Indicates whether time alignment is returned for each word. The default is false.
| profanityFilter          | String     | Indicates whether profanity filtering is performed on the transcript. If true (the default), the service filters profanity from all output except for keyword results by replacing inappropriate words with a series of asterisks. If false, the service returns results with no censoring. Applies to US English transcription only.
| smartFormatting          | String     | Indicates whether dates, times, series of digits and numbers, phone numbers, currency values, and Internet addresses are to be converted into more readable, conventional representations in the final transcript of a recognition request. If true, smart formatting is performed; if false (the default), no formatting is performed. Applies to US English transcription only.
| speakerLabels            | String     | Indicates whether labels that identify which words were spoken by which participants in a multi-person exchange are to be included in the response. If true, speaker labels are returned; if false (the default), they are not. Speaker labels can be returned only for the following language models: en-US_NarrowbandModel, es-ES_NarrowbandModel, ja-JP_NarrowbandModel. Setting speaker_labels to true forces the continuous and timestamps parameters to be true, as well, regardless of whether the user specifies false for the parameters.

#### cookies format
```json

[
    "SESSIONID=130490780a355f0a091e367783ee559126833797; Secure; HttpOnly",
    "Watson-DPAT=9S1xTLwSTprnW0uZdHBS1qaavtJEPe5llT1tKrJhytyKLV1zpTQrfHV3HWEmVTM8xZAj5sCmTciD%2FwYZ8g%2FxqkAc2nUauw95n%2BuDUf56VHocNCOMoy%2BDx6iw0wPq1lT8dUpDl7QFJeOjmztVUdEgWNUR7v7vvczBVlHVA5JAWBztVmKxPe2aad5OLWieLuSk2eZzbzDBrL3HBvF9%2BZxUgL0TbeBz29oKEH%2BC40G0RCFy6xM6ZfbnOW4%2BgzWuQAEVM%2BGc8qB8DtZ5kU8PleVGARmTB8oOhQqMHn24XmU%2Bs7mJb8g8xUjyK8S0%2Fmm7p1xyjbfnBWPCUHbOjXWZKEhWenJ4ko1RJAge3BYe%2FluOgoGbSw3Oi%2FVUPhaVdZ6rysu0m6x1mtJxxiK86xrWSrnQBesEQLY8RU%2FB%2F3zneqDRZ2rLuPTbDZDbrqwzIq4dtdRf3ojVF6rnYbDjagxGwlCjorT6t0MqHyv7LlT1YymTRoVdacSJaKpxK4v2BfpClvTPi9Jicas9bkOrFwkkcMO6uCpvhowqS6jiBn6mFDandacjjFSPwuOMIKXabRZrQ5oHe2AZZKXYybIstBUtXueHmHoXANIMxTK3ysf0Kt5Ajrd19oQmTzD080zSD%2FAG%2FruAPnOnTtjyrYg9Fx9GIGFagGUx2%2BBNtJGcRo9M2oywIbyW78yBvUKA5yR2BSXDgAc4yFLLNkPreXttdcUDu5jcHp%2BMQTYArK46r%2B1HiHApfz%2BXz5aji6BuaTghqXXYilII5yoyrMok17tTgK8FCPgFieUiEQFhWprBofx4y9BjJd8za4yLheSs%2BF2t%2B9nLklrG3XsMjUwKyIZKirpI7vgVku7TKC2Dzlvr7wy1hChQY6Ld%2BxxehMWz%2B9rVzfYLtTpnQqmpho3qsWA%3D; path=/speech-to-text/api; secure; HttpOnly"
]
```

## IBMWatsonSTT.deleteSession
Deletes an existing session and its engine. You cannot send requests to a session after it is deleted.

| Field    | Type       | Description
|----------|------------|----------
| username | credentials| username obtained from IBM Bluemix.
| password | credentials| password obtained from IBM Bluemix.
| sessionId| String     | The identifier of the session whose results you want to observe.
| cookies  | JSON       | Array of strings. The cookies to be set obtained from createSession method.

#### cookies format
```json

[
    "SESSIONID=130490780a355f0a091e367783ee559126833797; Secure; HttpOnly",
    "Watson-DPAT=9S1xTLwSTprnW0uZdHBS1qaavtJEPe5llT1tKrJhytyKLV1zpTQrfHV3HWEmVTM8xZAj5sCmTciD%2FwYZ8g%2FxqkAc2nUauw95n%2BuDUf56VHocNCOMoy%2BDx6iw0wPq1lT8dUpDl7QFJeOjmztVUdEgWNUR7v7vvczBVlHVA5JAWBztVmKxPe2aad5OLWieLuSk2eZzbzDBrL3HBvF9%2BZxUgL0TbeBz29oKEH%2BC40G0RCFy6xM6ZfbnOW4%2BgzWuQAEVM%2BGc8qB8DtZ5kU8PleVGARmTB8oOhQqMHn24XmU%2Bs7mJb8g8xUjyK8S0%2Fmm7p1xyjbfnBWPCUHbOjXWZKEhWenJ4ko1RJAge3BYe%2FluOgoGbSw3Oi%2FVUPhaVdZ6rysu0m6x1mtJxxiK86xrWSrnQBesEQLY8RU%2FB%2F3zneqDRZ2rLuPTbDZDbrqwzIq4dtdRf3ojVF6rnYbDjagxGwlCjorT6t0MqHyv7LlT1YymTRoVdacSJaKpxK4v2BfpClvTPi9Jicas9bkOrFwkkcMO6uCpvhowqS6jiBn6mFDandacjjFSPwuOMIKXabRZrQ5oHe2AZZKXYybIstBUtXueHmHoXANIMxTK3ysf0Kt5Ajrd19oQmTzD080zSD%2FAG%2FruAPnOnTtjyrYg9Fx9GIGFagGUx2%2BBNtJGcRo9M2oywIbyW78yBvUKA5yR2BSXDgAc4yFLLNkPreXttdcUDu5jcHp%2BMQTYArK46r%2B1HiHApfz%2BXz5aji6BuaTghqXXYilII5yoyrMok17tTgK8FCPgFieUiEQFhWprBofx4y9BjJd8za4yLheSs%2BF2t%2B9nLklrG3XsMjUwKyIZKirpI7vgVku7TKC2Dzlvr7wy1hChQY6Ld%2BxxehMWz%2B9rVzfYLtTpnQqmpho3qsWA%3D; path=/speech-to-text/api; secure; HttpOnly"
]
```

## IBMWatsonSTT.registerCallback
Registers a callback URL with the service for use with subsequent asynchronous recognition requests. The service attempts to register, or white-list, the callback URL if it is not already registered by sending a GET request to the callback URL. The service passes a random alphanumeric challenge string via the challenge_string query parameter of the request.

| Field      | Type       | Description
|------------|------------|----------
| username   | credentials| username obtained from IBM Bluemix.
| password   | credentials| password obtained from IBM Bluemix.
| callbackUrl| String     | An HTTP or HTTPS URL to which callback notifications are to be sent. To be white-listed, the URL must successfully echo the challenge string during URL verification.
| userSecret | String     | A user-specified string that the service uses to generate the HMAC-SHA1 signature that it sends via the X-Callback-Signature header. The service includes the header during URL verification and with every notification sent to the callback URL. It calculates the signature over the payload of the notification. If you omit the parameter, the service does not send the header.

## IBMWatsonSTT.createJob
Creates a job for a new asynchronous recognition request. 

| Field                    | Type       | Description
|--------------------------|------------|----------
| username                 | credentials| username obtained from IBM Bluemix.
| password                 | credentials| password obtained from IBM Bluemix.
| audioFile                | File       | The audio file.
| audioType                | String     | The MIME type of the audio. See README for more details.
| callbackUrl              | String     | A URL to which callback notifications are to be sent. The URL must already be successfully white-listed by using the POST register_callback method. Omit the parameter to poll the service for job completion and results.
| events                   | String     | If the job includes a callback URL, a comma-separated list of notification events to which to subscribe. Valid events are: recognitions.started generates a callback notification when the service begins to process the job.; recognitions.completed generates a callback notification when the job is complete. You must use the GET recognitions/{id} method to retrieve the results before they time out or are deleted.; recognitions.completed_with_results generates a callback notification when the job is complete. The notification includes the results of the request.; recognitions.failed generates a callback notification if the service experiences an error while processing the job.
| userToken                | String     | If the job includes a callback URL, a user-specified string that the service is to include with each callback notification for the job. The token allows the user to maintain an internal mapping between jobs and notification events.
| resultsTtl               | String     | The number of minutes for which the results are to be available after the job has finished. If not delivered via a callback, the results must be retrieved within this time. Omit the parameter to use a time to live of one week. The parameter is valid with or without a callback URL.
| model                    | String     | The identifier of the model to be used for the recognition request. Possible values: ar-AR_BroadbandModel; en-UK_BroadbandModel; en-UK_NarrowbandModel; en-US_BroadbandModel (the default); en-US_NarrowbandModel; es-ES_BroadbandModel; es-ES_NarrowbandModel; fr-FR_BroadbandModel; ja-JP_BroadbandModel; ja-JP_NarrowbandModel; pt-BR_BroadbandModel; pt-BR_NarrowbandModel' zh-CN_BroadbandModel; zh-CN_NarrowbandModel
| customizationId          | String     | The GUID of a custom language model that is to be used with the request. The base language model of the specified custom language model must match the model specified with the model parameter. By default, no custom model is used.
| continuous               | String     | Indicates whether multiple final results that represent consecutive phrases separated by long pauses are returned. If true, such phrases are returned; if false (the default), recognition ends after the first end-of-speech (EOS) incident is detected.
| inactivityTimeout        | String     | The time in seconds after which, if only silence (no speech) is detected in submitted audio, the connection is closed with a 400 response code. The default is 30 seconds. Useful for stopping audio submission from a live microphone when a user simply walks away. Use -1 for infinity.
| keywords                 | String     | A list of keywords to spot in the audio. Each keyword string can include one or more tokens. Keywords are spotted only in the final hypothesis, not in interim results. Omit the parameter or specify an empty array if you do not need to spot keywords. Example: "colorado","tornado","tornadoes"
| keywordsThreshold        | String     | A confidence value that is the lower bound for spotting a keyword. A word is considered to match a keyword if its confidence is greater than or equal to the threshold. Specify a probability between 0 and 1 inclusive. No keyword spotting is performed if you omit the parameter. If you specify a threshold, you must also specify one or more keywords.
| maxAlternatives          | String     | The maximum number of alternative transcripts to be returned. By default, a single transcription is returned.
| wordAlternativesThreshold| String     | A confidence value that is the lower bound for identifying a hypothesis as a possible word alternative (also known as "Confusion Networks"). An alternative word is considered if its confidence is greater than or equal to the threshold. Specify a probability between 0 and 1 inclusive. No alternative words are computed if you omit the parameter.
| wordConfidence           | String     | Indicates whether a confidence measure in the range of 0 to 1 is returned for each word. The default is false.
| timestamps               | String     | Indicates whether time alignment is returned for each word. The default is false.
| profanityFilter          | String     | Indicates whether profanity filtering is performed on the transcript. If true (the default), the service filters profanity from all output except for keyword results by replacing inappropriate words with a series of asterisks. If false, the service returns results with no censoring. Applies to US English transcription only.
| smartFormatting          | String     | Indicates whether dates, times, series of digits and numbers, phone numbers, currency values, and Internet addresses are to be converted into more readable, conventional representations in the final transcript of a recognition request. If true, smart formatting is performed; if false (the default), no formatting is performed. Applies to US English transcription only.
| speakerLabels            | String     | Indicates whether labels that identify which words were spoken by which participants in a multi-person exchange are to be included in the response. If true, speaker labels are returned; if false (the default), they are not. Speaker labels can be returned only for the following language models: en-US_NarrowbandModel, es-ES_NarrowbandModel, ja-JP_NarrowbandModel. Setting speaker_labels to true forces the continuous and timestamps parameters to be true, as well, regardless of whether the user specifies false for the parameters.

## IBMWatsonSTT.checkJobs
Returns the status and ID of all outstanding jobs associated with the service credentials with which it is called.

| Field   | Type       | Description
|---------|------------|----------
| username| credentials| username obtained from IBM Bluemix.
| password| credentials| password obtained from IBM Bluemix.

## IBMWatsonSTT.checkSingleJob
Returns the status and ID of all outstanding jobs associated with the service credentials with which it is called.

| Field   | Type       | Description
|---------|------------|----------
| username| credentials| username obtained from IBM Bluemix.
| password| credentials| password obtained from IBM Bluemix.
| jobId   | String     | The ID of the job whose status is to be checked.

## IBMWatsonSTT.deleteSingleJob
Deletes the specified job.

| Field   | Type       | Description
|---------|------------|----------
| username| credentials| username obtained from IBM Bluemix.
| password| credentials| password obtained from IBM Bluemix.
| jobId   | String     | The ID of the job that is to be deleted.

## IBMWatsonSTT.createCustomModel
Creates a new custom language model for a specified base language model.

| Field        | Type       | Description
|--------------|------------|----------
| username     | credentials| username obtained from IBM Bluemix.
| password     | credentials| password obtained from IBM Bluemix.
| name         | String     | The name of the new custom model. Use a name that is unique among all custom models that are owned by the calling user. Use a localized name that matches the language of the custom model.
| baseModelName| String     | The name of the language model that is to be customized by the new model. You must use the name of one of the US English or Japanese models that is returned by the Get models method: en-US_BroadbandModel, en-US_NarrowbandModel, ja-JP_BroadbandModel, ja-JP_NarrowbandModel
| description  | String     | A description of the new custom model. Use a localized description that matches the language of the custom model.

## IBMWatsonSTT.getCustomModels
Lists information about all custom language models that are owned by the calling user.

| Field   | Type       | Description
|---------|------------|----------
| username| credentials| username obtained from IBM Bluemix.
| password| credentials| password obtained from IBM Bluemix.
| language| String     | The language for which custom models are to be returned: en-US (the default), ja-JP

## IBMWatsonSTT.getSingleCustomModel
Lists information about a custom language model. Only the owner of a custom model can use this method to query information about the model.

| Field          | Type       | Description
|----------------|------------|----------
| username       | credentials| username obtained from IBM Bluemix.
| password       | credentials| password obtained from IBM Bluemix.
| customizationId| String     | The GUID of the custom language model for which information is to be returned. You must make the request with the service credentials of the model's owner.

## IBMWatsonSTT.trainCustomModel
Initiates the training of a custom language model with new corpora, words, or both.

| Field          | Type       | Description
|----------------|------------|----------
| username       | credentials| username obtained from IBM Bluemix.
| password       | credentials| password obtained from IBM Bluemix.
| customizationId| String     | The GUID of the custom language model that is to be trained. You must make the request with the service credentials of the model's owner.
| wordTypeToAdd  | String     | The type of words from the custom model's words resource on which to train the model: - all (the default) trains the model on all new words, regardless of whether they were extracted from corpora or were added or modified by the user.; - user trains the model only on new words that were added or modified by the user; the model is not trained on new words extracted from corpora.

## IBMWatsonSTT.resetCustomModel
Resets a custom language model by removing all corpora and words from the model.

| Field          | Type       | Description
|----------------|------------|----------
| username       | credentials| username obtained from IBM Bluemix.
| password       | credentials| password obtained from IBM Bluemix.
| customizationId| String     | The GUID of the custom language model that is to be reset. You must make the request with the service credentials of the model's owner.

## IBMWatsonSTT.deleteCustomModel
Deletes an existing custom language model.

| Field          | Type       | Description
|----------------|------------|----------
| username       | credentials| username obtained from IBM Bluemix.
| password       | credentials| password obtained from IBM Bluemix.
| customizationId| String     | The GUID of the custom language model that is to be deleted. You must make the request with the service credentials of the model's owner.

## IBMWatsonSTT.addCorpus
Adds a single corpus text file of new training data to the custom language model.

| Field          | Type       | Description
|----------------|------------|----------
| username       | credentials| username obtained from IBM Bluemix.
| password       | credentials| password obtained from IBM Bluemix.
| customizationId| String     | The GUID of the custom language model to which a corpus is to be added. You must make the request with the service credentials of the model's owner.
| corpusName     | String     | The name of the corpus that is to be added. The name cannot contain spaces and cannot be the string user, which is reserved by the service to denote custom words added or modified by the user. Use a localized name that matches the language of the custom model.
| fileData       | File       | The corpus file.
| allowOverwrite | String     | Indicates whether the specified corpus is to overwrite an existing corpus with the same name. If a corpus with the same name already exists, the request fails unless allow_overwrite is set to true; by default, the parameter is false. The parameter has no effect if a corpus with the same name does not already exist.

## IBMWatsonSTT.getCorpora
Lists information about all corpora that have been added to the specified custom language model.

| Field          | Type       | Description
|----------------|------------|----------
| username       | credentials| username obtained from IBM Bluemix.
| password       | credentials| password obtained from IBM Bluemix.
| customizationId| String     | The GUID of the custom language model for which corpora are to be listed. You must make the request with the service credentials of the model's owner.

## IBMWatsonSTT.getSingleCorpus
Lists information about a single specified corpus.

| Field          | Type       | Description
|----------------|------------|----------
| username       | credentials| username obtained from IBM Bluemix.
| password       | credentials| password obtained from IBM Bluemix.
| customizationId| String     | The GUID of the custom language model for which a corpus is be listed. You must make the request with the service credentials of the model's owner.
| corpusName     | String     | The name of the corpus about which information is to be listed.

## IBMWatsonSTT.deleteSingleCorpus
Deletes an existing corpus from a custom language model.

| Field          | Type       | Description
|----------------|------------|----------
| username       | credentials| username obtained from IBM Bluemix.
| password       | credentials| password obtained from IBM Bluemix.
| customizationId| String     | The GUID of the custom language model from which a corpus is to be deleted. You must make the request with the service credentials of the model's owner.
| corpusName     | String     | The name of the corpus that is to be deleted.

## IBMWatsonSTT.addWordsToCustomModel
Adds one or more custom words to a custom language model.

| Field          | Type       | Description
|----------------|------------|----------
| username       | credentials| username obtained from IBM Bluemix.
| password       | credentials| password obtained from IBM Bluemix.
| customizationId| String     | The GUID of the custom language model to which words are to be added. You must make the request with the service credentials of the model's owner.
| words          | JSON       | An array of objects that provides information about each custom word that is to be added to the custom model. See README for more details.

#### words format
```json

[  
    {  
        "word":"HHonors",
        "sounds_like":[  
            "hilton honors",
            "h honors"
        ],
        "display_as":"HHonors"
    },
    {  
        "word":"IEEE",
        "sounds_like":[  
            "i triple e"
        ]
    }
]
```

## IBMWatsonSTT.addSingleWordToCustomModel
Adds a custom word to a custom language model.

| Field          | Type       | Description
|----------------|------------|----------
| username       | credentials| username obtained from IBM Bluemix.
| password       | credentials| password obtained from IBM Bluemix.
| customizationId| String     | The GUID of the custom language model to which a word is to be added. You must make the request with the service credentials of the model's owner.
| wordName       | String     | The custom word that is to be added to the custom model. Do not include spaces in the word. Use a - (dash) or _ (underscore) to connect the tokens of compound words.
| wordSoundsLike | JSON       | An array of sounds-like pronunciations for the custom word. Specify how words that are difficult to pronounce, foreign words, acronyms, and so on can be pronounced by users. See README for more details.
| wordDisplayAs  | String     | An alternative spelling for the custom word when it appears in a transcript. Use the parameter when you want the word to have a spelling that is different from its usual representation or from its spelling in corpora training data.

#### wordSoundsLike format
```json

["i triple e"]
```
## IBMWatsonSTT.getWords
Lists information about all custom words from a custom language model.

| Field          | Type       | Description
|----------------|------------|----------
| username       | credentials| username obtained from IBM Bluemix.
| password       | credentials| password obtained from IBM Bluemix.
| customizationId| String     | The GUID of the custom language model from which words are to be queried. You must make the request with the service credentials of the model's owner.
| wordType       | String     | The type of words to be listed from the custom language model's words resource: - "all" (the default) shows all words.; - "user" shows only custom words that were added or modified by the user.; - "corpora" shows only OOV that were extracted from corpora.
| sort           | String     | Indicates the order in which the words are to be listed. The parameter accepts one of two arguments, alphabetical or count, to indicate how the words are to be sorted. You can prepend an optional + or - to an argument to indicate whether the results are to be sorted in ascending or descending order. "alphabetical" and "+alphabetical" list the words in ascending alphabetical order; this is the default ordering if you omit the sort parameter. "-alphabetical" lists the words in descending alphabetical order. "count" and "-count" list the words in descending order by the values of their count fields. "+count" list the words in ascending order by the values of their count fields.

## IBMWatsonSTT.getSingleWord
Lists information about a custom word from a custom language model.

| Field          | Type       | Description
|----------------|------------|----------
| username       | credentials| username obtained from IBM Bluemix.
| password       | credentials| password obtained from IBM Bluemix.
| customizationId| String     | The GUID of the custom language model from which a word is to be queried. You must make the request with the service credentials of the model's owner.
| wordName       | String     | The custom word that is to be queried from the custom model.

## IBMWatsonSTT.deleteWordFromCustomModel
Deletes a custom word from a custom language model.

| Field          | Type       | Description
|----------------|------------|----------
| username       | credentials| username obtained from IBM Bluemix.
| password       | credentials| password obtained from IBM Bluemix.
| customizationId| String     | The GUID of the custom language model from which a word is to be deleted. You must make the request with the service credentials of the model's owner.
| wordName       | String     | The custom word that is to be deleted from the custom model.


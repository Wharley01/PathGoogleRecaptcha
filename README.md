# PathGoogleRecaptcha
A recaptcha verifier for path

### usage

```php
    public function auth(Request $request,Response $response){
//        validate recaptcha

        $captcha = new GCaptcha("recaptcha_secrete_key");
        $captcha_valid = $captcha->isValidResponse($request->getPost("g_recaptcha_token"));
        
        if($captcha_valid){
        //a valid captcha response from user
        }
        
        }
```

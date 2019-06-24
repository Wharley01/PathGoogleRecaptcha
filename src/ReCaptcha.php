<?php
/**
 * @Author by Sulaiman Adewale.
 * @Date 6/24/2019
 * @Time 6:11 PM
 * @Project trademint24
 */

namespace Path\Plugins\Google;


use Path\Core\Http\Request;

class ReCaptcha
{
    private $secrete_key;
    public function __construct($secrete_key)
    {
        $this->secrete_key = $secrete_key;
    }

    public function isValidResponse($response){
        $request = new Request();
        $request->setPostFields([
            "secret" => $this->secrete_key,
            "response" => $response,
            "remoteip" => $request->server->REMOTE_ADDR
        ]);
        $res = json_decode($request->post("https://www.google.com/recaptcha/api/siteverify")->content);
        return $res->success;
    }
}

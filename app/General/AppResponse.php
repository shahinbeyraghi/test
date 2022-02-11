<?php

namespace App\General;


use JsonSerializable;
use stdClass;

class AppResponse implements JsonSerializable
{

    private $successCodes = [200, 201, 202, 204];

    /**
     * @var stdClass
     */
    protected $response;

    /**
     * Response constructor.
     *
     * @param               $code
     * @param stdClass|null $data
     * @param string        $message
     * @param array         $errors
     */
    public function __construct($code, $data = null, $message = '', $errors = [])
    {
        $this->response = new stdClass();
        $this->response->code = $code ?? 200;
        $this->response->success = in_array($code, $this->successCodes) ? true : false;
        $this->response->data = $data ?? [];

        $this->setErrors($errors);
        $this->setMessage($message);
        return $this->response;
    }

    /**
     * set errors in response if exist
     * errors must be array, we check it and if not array we convert it
     *
     * @param array $errors
     */
    private function setErrors($errors = [])
    {
        if ($errors) {
            if (is_array($errors))
                $this->response->data['errors'] = $errors;
            else {
                $this->response->data['errors']['error'] = [$errors];
            }
        }
    }

    /**
     * set message if exist in response
     *
     * @param string $message
     */
    private function setMessage(string $message = '')
    {
        if ($message)
            $this->response->data['message'] = $message;
    }

    public function jsonSerialize()
    {
        return $this->response;
    }
}
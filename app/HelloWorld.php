<?php
class HelloWorld {
    /**
     * @WebMethod
     * @desc Hello Web-Service
     * @param string $name
     * @return string $helloMessage
     */
    public function hello($name) {
        return "hello {$name}";
    }
}
<?php

class eXist {
    var $url = "";
    var $user = "";
    var $password = "";

    function eXist($user, $pass) {
        $this->user = $user;
        $this->password = $pass;
        error_log("eXist --> $user");
    }

    function setURL($url) {
        $this->url = $url;
    }

    function save($data) {
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); 
        curl_setopt($ch, CURLOPT_HEADER, 1); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml','Content-Length: ' . strlen($data)));
        curl_setopt($ch, CURLOPT_INFILESIZE, strlen($data)); 
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_USERPWD, "$this->user:$this->password");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        error_log($response);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $http_code;
    }
}

?>

<?php
include APPPATH."third_party/Jwt.php";

class Token
{
    private $key = "datos0.1";
    public function generateToken($data)
    {
        return Jwt::encode($data, $this->key);
    }

    public function decodeToken($token)
    {
        $decode = Jwt::decode($token, $this->key, array('HS256'));
        $decodedData  = (array) $decode;
        return $decodedData;
    }
}
?>

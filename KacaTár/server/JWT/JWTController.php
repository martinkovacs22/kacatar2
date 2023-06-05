<?php

require_once '../vendor/autoload.php';
use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;


class JwtGenerator {
    private $secretKey;

    public function __construct($secretKey)
    {
        $this->secretKey = $secretKey;
    }

    public function generateToken($payload, $expiration = 3600)
    {
        $issuedAt = time();
        $expire = $issuedAt + $expiration;
        $payload["exp"] = $expire;
        $token = JWT::encode($payload, $this->secretKey,'HS256');
        return $token;
    }

    public function verifyToken($token)
    {
        try {
            $decoded = JWT::decode($token, new Key($this->secretKey,'HS256'));

            if ($decoded->exp > time()) {
                return $decoded;
            }else{
                return false;
            }
            return (array) $decoded;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    
}
?>
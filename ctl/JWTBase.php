<?php

namespace CTL;

use Lcobucci\JWT\Parser;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\ValidationData;
use Lcobucci\JWT\Signer\Hmac\Sha256;

class JWTBase {


    /**
     * Creates new tokens for returning users
     * @param  [type] $uid  [description]
     * @param  [type] $user [description]
     * @return [type]       [description]
     */
    public function buildJWTtoken($uid, $user){
    $signer = new Sha256();
    //Creating Token
    $token = (new Builder())->setIssuer('MobileAPI')
            ->setAudience('http://example.com')
            ->setId('auth'.$uid, true)
            ->setIssuedAt(time())
            ->setNotBefore(time() + 60)
            ->setExpiration(time() + 3600)
            ->set('uid', $uid)
            ->set('user', $user)
            ->sign($signer, 'MobileAPI')
            ->getToken();

        return $token;
    }

    /**
     * Validates Incoming tokens
     * @param  [type] $token [description]
     * @return [type]        [description]
     */
    public function validateJWTtoken($token){
        $parse = (new Parser())->parse((string) $token);

        if(empty($parse)){

            throw new Exception;
        }

        $data = new ValidationData();
        $data->setIssuer('MobileAPI');
        $data->setAudience('http://example.com');
        // $data->setId('auth');
        $data->setCurrentTime(time() + 60);

        return $parse->validate($data);

    }
}
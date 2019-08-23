<?php

namespace GeniusSystems\Paale;

use Illuminate\Http\Request;
use Lcobucci\JWT\Parser;
use Lcobucci\JWT\Signer;
use Lcobucci\JWT\Signer\Key;


class Main
{
    public function __construct(Request $request)
    {
        $this->request = $request;

    }

    public function isTokenValid(Signer $signer, Key $key)
    {
        $access_token = str_replace('Bearer ', '', $this->request->header("Authorization"));
        $token = (new Parser())->parse($access_token);
        return $token->verify($signer, $key);

    }
}
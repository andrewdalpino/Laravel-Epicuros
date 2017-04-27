<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Signing Key
    |--------------------------------------------------------------------------
    |
    | The key identifier is used to allow verification key lookup on
    | the receiving end.
    |
    | Possible values for algorithm are 'RS256' for asychnonous
    | (private/public) signing/verifying, or 'HS256', 'HS384', and
    | 'HS512' to use a shared secret.
    |
    | The key field  is either the path to the RSA private key or
    | a shared secret in a shared key configuration.
    |
    | Example: 'signing_key' => [
    |   'identifier' => 'foo',
    |   'algorithm' => 'RS256',
    |   'key' => storage_path('/certs/foo-private.key',
    | ],
    |
    | Example: 'signing_key' => [
    |   'identifier' => 'bar',
    |   'algorithm' => 'HS512',
    |   'key' => '6a628a71c4bc2c76048949a72ef9ac0d35d0dc5f3...',
    | ],
    */

    'signing_key' => [
        'identifier' => ''
        'algorithm' => 'HS384',
        'key' => '',
    ],


    /*
    |--------------------------------------------------------------------------
    | Verifying Key Mappings
    |--------------------------------------------------------------------------
    |
    | These are the mappings of key identifiers to their respective RSA
    | public keys or shared secrets. You can pass either the path to the
    | public key or the shared secret.
    |
    | Example: 'verifying_keys' => [
    |   'foo' => '/certs/foo-public.key',
    |   'bar' => '6a628a71c4bc2c76048949a72ef9ac0d35d0dc5f3...',
    | ],
    */

    'verifying_keys' => [
        //
    ],

    /*
    |--------------------------------------------------------------------------
    | Token Expiry
    |--------------------------------------------------------------------------
    |
    | The time in seconds that a signed token is valid for. It is
    | generally a best practice to keep the life of these tokens
    | to a minimum for security purposes.
    |
    | Default: 60,
    */

    'tokens_expire' => 60,

];

<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Token Signing Algrithm
    |--------------------------------------------------------------------------
    |
    | The algorithm to use when signing a token. Possible values are
    | 'RS256' for asychnonous (private/public) signing/verifying, or
    | 'HS256', 'HS384', and 'HS512' to use shared keys.
    |
    | Default: 'HS512'
    */

    'algorithm' => 'HS512',

    /*
    |--------------------------------------------------------------------------
    | Signing Keys
    |--------------------------------------------------------------------------
    |
    | This is either the path to the RSA private key (from the local
    | storage folder) or a shared secret in a shared key configuration.
    |
    | Default: none
    | Example: 'foo' => '/certs/foo-private.key',
    | Example: 'app_name' => '6a628a71c4bc2c76048949a72ef9ac0d35d0dc5f3...',
    | Example: 'YourKeyId' => 'YourKey!',
    */

    'signing_keys' => [
        //
    ],


    /*
    |--------------------------------------------------------------------------
    | Verifying Keys
    |--------------------------------------------------------------------------
    |
    | These are the mappings of token issuers to their respective RSA
    | public keys or shared secrets. The key is the name of the token
    | issuer, and the value is either the path to the public key (from
    | the local storage folder) or the shared secret.
    |
    | Default: none
    | Example: 'foo' => '/certs/foo-public.key',
    | Example: 'app_name' => '6a628a71c4bc2c76048949a72ef9ac0d35d0dc5f3...',
    | Example: 'TheirKeyId' => 'TheirKey!',
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

    'token_expire' => 60,

];

# Commissioner

Commissioner is a portfolio website that also handles the process of commissions programmed in PHP with the Laravel framework.

## Installation


```bash
yarn install
```

At the moment, we will have to make the following changes:
./vendor/wohali/oauth2-discord-new/src/Provider/Discord.php

Add:
```php
public function getInviteEndpoint($invite)
{
    return $this->apiDomain.'/invites/'.$invite;
}

public function request($method, $url, $token, array $options = [])
{
    $request = $this->getAuthenticatedRequest(
        $method, $url, $token, $options
    );
    return $this->getResponse($request);
}
```

Line 123:
```php
return new DiscordResourceOwner($response, $token);
```
Change to
```php
return new DiscordResourceOwner($this, $response, $token);
```

./vendor/wohali/oauth2-discord-new/src/Provider/DiscordResourceOwner.php
Change construct to
```php
public function __construct(Discord $discord, array $response = array(), AccessToken $token)
{
     $this->response = $response;
     $this->discord = $discord;
     $this->token = $token;
}
```

and add
```php
public function acceptInvite($invite)
{
    $response = $this->discord->request(
        'POST',
        $this->discord->getInviteEndpoint($invite),
        $this->token
    );

    return $response;
}
```


## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License
[MIT](https://choosealicense.com/licenses/mit/)

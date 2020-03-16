EverialBundle
=============


Installation
------------

With [composer](https://getcomposer.org), require:
`composer require kiora/everial-bundle`

Then enable it in your kernel (optional if you are using the Flex recipe with Symfony4) :

```php
// config/bundles.php
return [
    //...
    Kiora\EverialBundle\EverialBundle::class => ['all' => true],
    //...
];
```

Configuration
-------------

```yaml
kiora_everial:
    auth_base_path: "https://auth.doclab.everial.com/auth/realms/quota/protocol/openid-connect/token"
    base_path: "https://radial.my-company.com"
    username: "foo"
    password: "bar"
```


Usage
-----

```php
use Kiora\EverialClient;

class SomeController
{
    public function test(EverialClient $everailClient)
    {
        $file = new \SplFileObject('file.pdf');
    
        $reponse = $everailClient->serialize($file)->toArray();
        
        return $reponse;
    }
}

```
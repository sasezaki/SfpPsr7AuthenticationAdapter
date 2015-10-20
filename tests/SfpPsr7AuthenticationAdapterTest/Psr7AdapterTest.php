<?php
namespace SfpPsr7AuthenticationAdapterTest;

use PHPUnit_Framework_TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SfpPsr7AuthenticationAdapter\Psr7Adapter;

class Psr7AdapterTest extends PHPUnit_Framework_TestCase
{
    public function testAuthenticateSucsses()
    {
        $config = [
            'accept_schemes' => 'basic',
            'realm'          => 'testing',    
        ];

        $request = $this->getMock('Psr\\Http\\Message\\RequestInterface');
        $response = $this->getMock('Psr\\Http\\Message\\ResponseInterface');
        $response->method('withStatus')
            ->willReturn($response);
        $response->method('withHeader')
            ->willReturn($response);

        $adapter = new Psr7Adapter($config);
        $adapter->setRequest($request);
        $adapter->setResponse($response);
        $result = $adapter->authenticate();
    }

}

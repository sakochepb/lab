<?php
/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 23/10/17
 * Time: 15:28
 */

namespace Tests\AppBundle\Entity;

use PHPUnit\Framework\TestCase;

class MockTest  extends TestCase

{



    public function testDummy(){


        /**
         * dummy
         * ici $client est Dummy est objet qui rempli un contrat
         */
        $client = $this->getMockBuilder("GuzzleHttp\Client");
    }


    /**
     * Un stub est un dummy auquel on ajoute un comporteement (willReturn)
     * $client devient un stub
     */
    public function testStub(){

        $request = new Request();

        $client = $this->getMockBuilder("GuzzleHttp\Client");
        $client->method('get')->willReturn($request);

    }

    /**
     * un mock est un stub qui a des attentes (expectation)
     */
    public function testMock(){


        $request = new Request();
        $client = $this->getMockBuilder('GuzzleHttp\Client');
        $client->expects($this->once()) // cette attente /exception est considérer comme un eassertionsi la mthode n
        // 'eest pas appeler alors la suite de test échou
            ->method('get')
            ->willReturn($request);

    }



}
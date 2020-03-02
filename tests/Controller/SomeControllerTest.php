<?php

namespace App\Tests\Controller;

use App\Model\SomeActions;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SomeControllerTest extends WebTestCase
{
    public function testSomeAction()
    {
        $client = static::createClient();
//        $client->insulate();

        // gets the special container that allows fetching private services
        $container = self::$container;


        $someActions = $this->getMockBuilder(SomeActions::class)
            ->disableOriginalConstructor()
            ->getMock();

        //expect that sendEmail will be called
        $someActions->expects($this->once())
            ->method('sendEmail');

        //overwrite the default service: class: Mock_SomeActions_e68f817a
        $container->set('App\Model\SomeActions', $someActions);


        $crawler = $client->request('GET', '/en/some/action');

        //submit the form
        $form = $crawler->selectButton('submit')->form();

//        $client->getContainer()->set('App\Model\SomeActions', $someActions);
        $client->submit($form);
        //$container->set('App\Model\SomeActions', $someActions);

        //after submit the default class injected in the controller is "App\Model\SomeActions" and not the mocked service
        $response = $client->getResponse();

        $this->assertResponseIsSuccessful($response);

    }
}

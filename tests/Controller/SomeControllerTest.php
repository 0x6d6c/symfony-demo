<?php

namespace App\Tests\Controller;

use App\DataFixtures\UserFixtures;
use App\Model\SomeActions;
use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Doctrine\Common\Annotations\Annotation\IgnoreAnnotation;

/**
 * Class SomeControllerTest
 * @package App\Tests\Controller
 * @IgnoreAnnotation("covers")
 */
class SomeControllerTest extends WebTestCase
{

    use FixturesTrait;

    /**
     * @covers \App\Controller\SomeController::someAction
     */
    public function testSomeAction()
    {

        $this->loadFixtures([
            UserFixtures::class
        ]);

        $client = static::createClient();
        $client->disableReboot();

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

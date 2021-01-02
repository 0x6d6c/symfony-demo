<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use App\Model\SomeActions;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Controller used to send some emails.
 *
 * @Route("/some")
 */
class SomeController extends AbstractController
{
    private $someActions;

    public function __construct(SomeActions $someActions)
    {
        var_dump(\get_class($someActions));
        $this->someActions = $someActions;
    }

    /**
     * @Route("/action", methods="GET|POST", name="some_action")
     */
    public function someAction(Request $request): Response
    {
        $this->someActions->doSomething();

        if ($request->get('send')) {
            $this->someActions->sendEmail();
        }

        return $this->render('default/someAction.html.twig', [
        ]);
    }
}

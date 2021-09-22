<?php

namespace App\Controller;

use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestMailController extends AbstractController {
    /**
     * @Route("/test/mail", name="test_mail")
     */
    public function index(MailerInterface $kk): Response {
        $email = new Email;
        $email
            ->from('2alheure <test.symfony@2alheure.fr>')
            ->to('test_symfony@yopmail.fr')
            ->subject('Est-ce que ça fonctionne ?')
            ->text('Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae voluptates reprehenderit vel sed, mollitia fugit ipsam necessitatibus officiis similique voluptatibus quis, repellendus, exercitationem libero nam aliquam. Corrupti quasi enim culpa.');

        $kk->send($email);

        return $this->redirectToRoute('accueil');
    }
}

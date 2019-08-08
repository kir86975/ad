<?php


namespace App\Controller;


use App\Entity\Ad;
use App\Form\AdType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdController extends AbstractController {

    public function indexAction() {
        $em = $this->get('doctrine')->getManager();
        $adItems = $em->getRepository(Ad::class)->findAll();

        return $this->render('list_layout.html.twig', ['items' => $adItems]);
    }

    public function addAction(Request $request) {

        $em = $this->get('doctrine')->getManager();
        $ad = new Ad();

        $adForm = $this->createForm(AdType::class, $ad);

        $adForm->handleRequest($request);
        if ($adForm->isSubmitted() && $adForm->isValid()) {
            $em->persist($ad);
            $em->flush();
            return $this->redirectToRoute('index');
        }


        return $this->render('add_layout.html.twig', ['form' => $adForm->createView()]);
    }

    public function downloadAction() {
        $em = $this->get('doctrine')->getManager();
        $adItems = $em->getRepository(Ad::class)->findAll();

        $rows = ['id,Заголовок,Текст объявления'];
        foreach ($adItems as $item) {
            $data = [$item->getId(), $item->getTitle(), $item->getContent()];
            $rows[] = implode(',', $data);
        }

        $content = implode("\n", $rows);
        $response = new Response($content);
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="Ads list.csv"');

        return $response;
    }
}
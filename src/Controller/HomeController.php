<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */
    public function index(Request $request, EntityManagerInterface $manager, PostRepository $postRepo): Response
    {
        // $user = $this->getUser();

        if ($request->query->has('search')) {
            $search = $request->query->get('search');
            $items = $postRepo->search($search);
        } else {
            $items = $postRepo->findAll();
        }
        return $this->render('home/index.html.twig', [
            'items' => $items,
        ]);
    }

    /**
     * @Route("/display/{id}", name="content_from_id")
     */
    public function display(Post $post): Response
    {

        return $this->render('home/display.html.twig', [
            'post' => $post,
        ]);
    }
}

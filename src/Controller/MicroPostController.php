<?php

namespace App\Controller;

use App\Entity\MicroPost;
use App\Repository\MicroPostRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MicroPostController extends AbstractController
{
    #[Route('/micro-post', name: 'app_micro_post')]
    public function index(MicroPostRepository $postsRepository): Response
    {
        return $this->render('micro_post/index.html.twig', [
            'posts' => $postsRepository->findAll()
        ]);
    }


    #[Route('/micro-post/{post}', name: 'app_show_micro_post_one')]
    public function showOne(MicroPost $post): Response {
        return $this->render('micro_post/show.html.twig', [
            'post' => $post,
        ]);
    }
}

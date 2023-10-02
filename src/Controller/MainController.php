<?php

namespace App\Controller;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;



class MainController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/', name:'app_main', methods:["GET"])]
    public function main():Response {
        return new Response("Hello, World, Hello, my creator!", Response::HTTP_NOT_FOUND);

    }
    #[Route('/category', name:'category_main', methods: ["GET"])]
    public function show_index( CategoryRepository $categoryRepository): Response{
        $category = new Category;
        $category->setName('sport');
        $category->save($this->entityManager);
        return new Response ("Category added succesfully!");
        /*$category->setName('sport');
        $entityManager->persist($category);
        $entityManager->flush();
        return new Response ("New category added:  $category->getName()" ); */
    }
    public function list(): Response{
        

    }
    public function view(): Response{


    }
    public function create(): Response{


    }
    public function update(): Response{
        

    }
    public function delete(): Response{


    }
    
}


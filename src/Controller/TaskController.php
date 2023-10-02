<?php

namespace App\Controller;
use App\Entity\Task;
use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/task', name: 'app_task_controller')]
class TaskController extends AbstractController 
{ 
    #[Route('/create', name: 'app_task', methods:['GET'])] 
    public function index(EntityManagerInterface $entityManagerInterface): Response 
    { 
        $task=new Task; 
        $category=new Category; 
        $category->setName("life"); 
 
        $task->setName('HomeWork'); 
        $task->setDescription('Interest'); 
        $task->setResult(true); 
        $task->setDate(new \DateTime()); 
        $task->setCategory($category); 
 
        $entityManagerInterface->persist($category); 
        $entityManagerInterface->persist($task); 
        $entityManagerInterface->flush(); 
 
        return $this->render('task/index.html.twig', [ 
            'controller_name' => 'TaskController', 
        ]); 
    } 
}
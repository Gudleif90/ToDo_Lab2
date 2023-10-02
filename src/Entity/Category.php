<?php

namespace App\Entity;
use Doctrine\ORM\EntityManagerInterface; // Импортируйте EntityManagerInterface

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: TaskList::class, orphanRemoval: true)]
    private Collection $taskLists;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Taskv2::class)]
    private Collection $tasks;

    public function __construct()
    {
        $this->taskLists = new ArrayCollection();
        $this->tasks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, TaskList>
     */
    public function getTaskLists(): Collection
    {
        return $this->taskLists;
    }

    public function addTaskList(TaskList $taskList): static
    {
        if (!$this->taskLists->contains($taskList)) {
            $this->taskLists->add($taskList);
            $taskList->setCategory($this);
        }

        return $this;
    }

    public function removeTaskList(TaskList $taskList): static
    {
        if ($this->taskLists->removeElement($taskList)) {
            // set the owning side to null (unless already changed)
            if ($taskList->getCategory() === $this) {
                $taskList->setCategory(null);
            }
        }

        return $this;
    }
    public function save(EntityManagerInterface $entityManager, bool $flush = false): void
    {
        $entityManager->persist($this);
        if ($flush) {
            $entityManager->flush();
        }
    }

    /**
     * @return Collection<int, Taskv2>
     */
    public function getTasks(): Collection
    {
        return $this->tasks;
    }

    public function addTask(Taskv2 $task): static
    {
        if (!$this->tasks->contains($task)) {
            $this->tasks->add($task);
            $task->setCategory($this);
        }

        return $this;
    }

    public function removeTask(Taskv2 $task): static
    {
        if ($this->tasks->removeElement($task)) {
            // set the owning side to null (unless already changed)
            if ($task->getCategory() === $this) {
                $task->setCategory(null);
            }
        }

        return $this;
    }
    
}

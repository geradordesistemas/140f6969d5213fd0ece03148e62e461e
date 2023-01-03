<?php

namespace App\Application\Internit\TipoBundle\Controller;

use App\Application\Internit\TipoBundle\Entity\Tipo;
use App\Application\Internit\TipoBundle\Form\TipoType;

use App\Application\Project\ContentBundle\Controller\Base\BaseWebController;
use App\Application\Project\ContentBundle\Service\FilterDoctrine;
use App\Application\Project\ContentBundle\Attributes\Acl as ACL;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ObjectRepository;
use Doctrine\Persistence\ManagerRegistry;


#[Route('/web/tipo', name: 'web_tipo_', methods: ['GET'])]
#[ACL\Web(enable: true, title: 'Tipo', description: 'Permissões do modulo Tipo')]
class TipoWebController extends BaseWebController
{
    public function getBaseRouter(): string
    {
        return 'web_tipo_';
    }

    public function getClass(): string
    {
        return Tipo::class;
    }

    public function getRepository($doctrine): ObjectRepository
    {
        return $doctrine->getManager()->getRepository($this->getClass());
    }

    public function getBaseTemplate(): string
    {
        return "@ApplicationInternitTipo/tipo/";
    }

    #[Route('', name: 'list', methods: ['GET'])]
    #[ACL\Web(enable: true, title: 'Listar', description: 'Lista Tipo')]
    public function listAction(ManagerRegistry $doctrine, Request $request): Response
    {
        $this->validateAccess(actionName: 'listAction');

        $filter = new FilterDoctrine(
            repository:  $this->getRepository($doctrine),
            request: $request,
            attributesFilters: [
                'id', 'tipo', 'descricao', 'visivel', 
            ]
        );

        return $this->render($this->getBaseTemplate() . 'list.html.twig', [
            'title' => 'Listar Tipo',
            'objects' => $filter->getResult()->data,
        ]);
    }

    #[Route('/create', name: 'create', methods: ['GET', 'POST'])]
    #[ACL\Web(enable: true, title: 'Criar', description: 'Cria Tipo')]
    public function createAction(ManagerRegistry $doctrine, Request $request): Response
    {
        $this->validateAccess(actionName: 'createAction');

        $entityManager = $doctrine->getManager();

        $data = new Tipo();
        $form = $this->createForm(TipoType::class, $data);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();

            $entityManager->persist($data);
            $entityManager->flush();

            return $this->redirectToRoute($this->getBaseRouter() . 'list');
        }

        return $this->render($this->getBaseTemplate() . 'create.html.twig',[
            'title' => 'Criar Tipo',
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'show', methods: ['GET', 'POST'])]
    #[ACL\Web(enable: true, title: 'Visualizar', description: 'Visualiza Tipo')]
    public function showAction(ManagerRegistry $doctrine, Request $request, int $id): Response
    {
        $this->validateAccess(actionName: 'showAction');

        $data = $doctrine->getRepository($this->getClass())->find($id);
        if(!$data)
            return $this->redirectToRoute($this->getBaseRouter() . 'list');

        $form = $this->createForm(TipoType::class, $data);

        return $this->render($this->getBaseTemplate() . 'show.html.twig',[
            'title' => 'Visualizar Tipo',
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    #[ACL\Web(enable: true, title: 'Editar', description: 'Edita Tipo')]
    public function editAction(ManagerRegistry $doctrine, Request $request, int $id): Response
    {
        $this->validateAccess(actionName: 'editAction');
        $entityManager = $doctrine->getManager();

        $data = $doctrine->getRepository($this->getClass())->find($id);
        if(!$data)
            return $this->redirectToRoute($this->getBaseRouter() . 'list');

        $form = $this->createForm(TipoType::class, $data);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();

            $entityManager->persist($data);
            $entityManager->flush();

            return $this->redirectToRoute($this->getBaseRouter() . 'list');
        }

        return $this->render($this->getBaseTemplate() . 'edit.html.twig',[
            'title' => 'Editar Tipo',
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/delete', name: 'delete', methods: ['GET'])]
    #[ACL\Web(enable: true, title: 'Deletar', description: 'Deleta Tipo')]
    public function deleteAction(ManagerRegistry $doctrine, Request $request, int $id): Response
    {
        $this->validateAccess(actionName: 'deleteAction');

        $entityManager = $doctrine->getManager();

        $data = $entityManager->getRepository($this->getClass())->find($id);

        if (!$data)
            return $this->redirectToRoute($this->getBaseRouter() . 'list');

        $entityManager->remove($data);
        $entityManager->flush();

        return $this->redirectToRoute($this->getBaseRouter() . 'list');
    }

}
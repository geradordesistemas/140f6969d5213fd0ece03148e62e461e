<?php

namespace App\Application\Internit\EmpreendimentoBundle\Controller;

use App\Application\Internit\EmpreendimentoBundle\Repository\EmpreendimentoRepository;
use App\Application\Internit\EmpreendimentoBundle\Entity\Empreendimento;

use App\Application\Project\ContentBundle\Controller\Base\BaseApiController;
use App\Application\Project\ContentBundle\Service\FilterDoctrine;
use App\Application\Project\ContentBundle\Attributes\Acl as ACL;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ObjectRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\QueryException;
use OpenApi\Attributes as OA;

#[Route('/api/empreendimento', name: 'api_empreendimento_')]
#[OA\Tag(name: 'Empreendimento')]
#[ACL\Api(enable: true, title: 'Empreendimento', description: 'Permissões do modulo Empreendimento')]
class EmpreendimentoApiController extends BaseApiController
{

    public function getClass(): string
    {
        return Empreendimento::class;
    }

    public function getRepository(): ObjectRepository
    {
        return $this->doctrine->getManager()->getRepository($this->getClass());
    }

    /** ****************************************************************************************** */
    /**
     * Recupera a coleção de recursos — Empreendimento.
     * Recupera a coleção de recursos — Empreendimento.
     * @throws QueryException
     */
    #[OA\Parameter( name: 'pagina', description: 'O número da página da coleção', in: 'query', required: false, allowEmptyValue: true, example: 1)]
    #[OA\Parameter( name: 'paginaTamanho', description: 'O tamanho da página da coleção', in: 'query', required: false, example: 10)]
    #[OA\Response(
        response: 200,
        description: 'Retorna Coleção de recursos Empreendimento',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'id', type: 'integer'),
                new OA\Property(property: 'nome', type: 'string'),
                new OA\Property(property: 'nomeDestaque', type: 'string'),
                new OA\Property(property: 'url', type: 'string'),
                new OA\Property(property: 'valorVenda', type: 'string'),
                new OA\Property(property: 'visivel', type: 'boolean'),
                new OA\Property(property: 'fitness', type: 'string'),
                new OA\Property(property: 'destaqueHome', type: 'boolean'),
                new OA\Property(property: 'dataConclusao', type: 'string'),
                new OA\Property(property: 'breveDescricao', type: 'string'),
                new OA\Property(property: 'descricao', type: 'string'),
                new OA\Property(property: 'linkTourVirtual', type: 'string'),
                new OA\Property(property: 'linkHotsite', type: 'string'),
                new OA\Property(property: 'linkCorretor', type: 'string'),
                new OA\Property(property: 'linkAppIOS', type: 'string'),
                new OA\Property(property: 'linkAppAndroid', type: 'string'),
                new OA\Property(property: 'tipo', type: 'integer' ),
                new OA\Property(property: 'status', type: 'integer' ),
                new OA\Property(property: 'imagemDestaque', type: 'integer' ),
                new OA\Property(property: 'logoImagem', type: 'integer' ),
                new OA\Property(property: 'imagemObraEntregue', type: 'integer' ),
                new OA\Property(property: 'imagemFichaImovel', type: 'integer' ),
                new OA\Property(property: 'tags', type: 'array', items: new OA\Items(type: 'integer') ),
                new OA\Property(property: 'imagemTourVirtual', type: 'integer' ),
            ],
            type: 'object'
        )
    )]
    #[Route('', name: 'list', methods: ['GET'])]
    #[ACL\Api(enable: true, title: 'Listar', description: 'Listar Empreendimento')]
    public function listAction(Request $request): Response
    {
        $this->validateAccess(actionName: "listAction");

        $filter = new FilterDoctrine(
            repository:  $this->getRepository(),
            request: $request,
            attributesFilters: [
                'id', 'nome', 'nomeDestaque', 'url', 'valorVenda', 'visivel', 'fitness', 'destaqueHome', 'dataConclusao', 'breveDescricao', 'descricao', 'linkTourVirtual', 'linkHotsite', 'linkCorretor', 'linkAppIOS', 'linkAppAndroid', 'tipo', 'status', 'imagemDestaque', 'logoImagem', 'imagemObraEntregue', 'imagemFichaImovel', 'imagemTourVirtual', 
            ]
        );

        $response = $this->objectTransformer->ObjectToJson( $filter->getResult()->data, [
            'id', 'nome', 'nomeDestaque', 'url', 'valorVenda', 'visivel', 'fitness', 'destaqueHome', 'dataConclusao', 'breveDescricao', 'descricao', 'linkTourVirtual', 'linkHotsite', 'linkCorretor', 'linkAppIOS', 'linkAppAndroid', 'tipo', 'status', 'imagemDestaque', 'logoImagem', 'imagemObraEntregue', 'imagemFichaImovel', 'tags', 'imagemTourVirtual', 
        ]);

        return $this->json([
            'resultado' => $response,
            'paginacao' => $filter->getResult()->paginator,
        ]);
    }

    /** ****************************************************************************************** */
    /**
     * Cria o Recurso — Empreendimento.
     * Cria o Recurso — Empreendimento.
     */
    #[OA\Response(
        response: 201,
        description: 'Retorna novo recurso Empreendimento',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'id', type: 'integer'),
                new OA\Property(property: 'nome', type: 'string'),
                new OA\Property(property: 'nomeDestaque', type: 'string'),
                new OA\Property(property: 'url', type: 'string'),
                new OA\Property(property: 'valorVenda', type: 'string'),
                new OA\Property(property: 'visivel', type: 'boolean'),
                new OA\Property(property: 'fitness', type: 'string'),
                new OA\Property(property: 'destaqueHome', type: 'boolean'),
                new OA\Property(property: 'dataConclusao', type: 'string'),
                new OA\Property(property: 'breveDescricao', type: 'string'),
                new OA\Property(property: 'descricao', type: 'string'),
                new OA\Property(property: 'linkTourVirtual', type: 'string'),
                new OA\Property(property: 'linkHotsite', type: 'string'),
                new OA\Property(property: 'linkCorretor', type: 'string'),
                new OA\Property(property: 'linkAppIOS', type: 'string'),
                new OA\Property(property: 'linkAppAndroid', type: 'string'),
                new OA\Property(property: 'tipo', type: 'integer' ),
                new OA\Property(property: 'status', type: 'integer' ),
                new OA\Property(property: 'imagemDestaque', type: 'integer' ),
                new OA\Property(property: 'logoImagem', type: 'integer' ),
                new OA\Property(property: 'imagemObraEntregue', type: 'integer' ),
                new OA\Property(property: 'imagemFichaImovel', type: 'integer' ),
                new OA\Property(property: 'tags', type: 'array', items: new OA\Items(type: 'integer') ),
                new OA\Property(property: 'imagemTourVirtual', type: 'integer' ),
            ],
            type: 'object'
        )
    )]
    #[OA\Response(response: 400, description: 'Dados inválidos!')]
    #[OA\RequestBody(
        description: 'Json Payload',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'nome', type: 'string'),
                new OA\Property(property: 'nomeDestaque', type: 'string'),
                new OA\Property(property: 'url', type: 'string'),
                new OA\Property(property: 'valorVenda', type: 'string'),
                new OA\Property(property: 'visivel', type: 'boolean'),
                new OA\Property(property: 'fitness', type: 'string'),
                new OA\Property(property: 'destaqueHome', type: 'boolean'),
                new OA\Property(property: 'dataConclusao', type: 'string'),
                new OA\Property(property: 'breveDescricao', type: 'string'),
                new OA\Property(property: 'descricao', type: 'string'),
                new OA\Property(property: 'linkTourVirtual', type: 'string'),
                new OA\Property(property: 'linkHotsite', type: 'string'),
                new OA\Property(property: 'linkCorretor', type: 'string'),
                new OA\Property(property: 'linkAppIOS', type: 'string'),
                new OA\Property(property: 'linkAppAndroid', type: 'string'),
                new OA\Property(property: 'tipo', type: 'integer' ),
                new OA\Property(property: 'status', type: 'integer' ),
                new OA\Property(property: 'imagemDestaque', type: 'integer' ),
                new OA\Property(property: 'logoImagem', type: 'integer' ),
                new OA\Property(property: 'imagemObraEntregue', type: 'integer' ),
                new OA\Property(property: 'imagemFichaImovel', type: 'integer' ),
                new OA\Property(property: 'tags', type: 'array', items: new OA\Items(type: 'integer') ),
                new OA\Property(property: 'imagemTourVirtual', type: 'integer' ),
            ],
            type: 'object'
        )
    )]
    #[Route('', name: 'create', methods: ['POST'])]
    #[ACL\Api(enable: true, title: 'Criar', description: 'Criar Empreendimento')]
    public function createAction(Request $request): Response
    {
        $this->validateAccess("createAction");

        if(!$request->getContent())
            return $this->json(['status' => false, 'message' => 'Dados inválidos!'], 400);

        /** Tranforma Corpo da requisação em um objeto da classe. */
        $object = $this->objectTransformer->JsonToObject( $this->getClass(), $request , [
            'nome', 'nomeDestaque', 'url', 'valorVenda', 'visivel', 'fitness', 'destaqueHome', 'dataConclusao', 'breveDescricao', 'descricao', 'linkTourVirtual', 'linkHotsite', 'linkCorretor', 'linkAppIOS', 'linkAppAndroid', 'tipo', 'status', 'imagemDestaque', 'logoImagem', 'imagemObraEntregue', 'imagemFichaImovel', 'tags', 'imagemTourVirtual', 
        ]);

        /** Valida Restrições do objeto */
        $errors = $this->validateConstraintErros($object);
        if($errors)
            return $this->json($errors);

        $em = $this->doctrine->getManager();
        $em->persist($object);
        $em->flush();

        $response = $this->objectTransformer->ObjectToJson( $object, [
            'id', 'nome', 'nomeDestaque', 'url', 'valorVenda', 'visivel', 'fitness', 'destaqueHome', 'dataConclusao', 'breveDescricao', 'descricao', 'linkTourVirtual', 'linkHotsite', 'linkCorretor', 'linkAppIOS', 'linkAppAndroid', 'tipo', 'status', 'imagemDestaque', 'logoImagem', 'imagemObraEntregue', 'imagemFichaImovel', 'tags', 'imagemTourVirtual', 
        ]);

        return $this->json($response, 201);
    }

    /** ****************************************************************************************** */
    /**
     * Recupera o recurso — Empreendimento.
     * Recupera o recurso — Empreendimento.
     */
    #[OA\Parameter( name: 'id', description: 'Identificador do recurso', in: 'path')]
    #[OA\Response(
        response: 200,
        description: 'Retorna recurso Empreendimento',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'id', type: 'integer'),
                new OA\Property(property: 'nome', type: 'string'),
                new OA\Property(property: 'nomeDestaque', type: 'string'),
                new OA\Property(property: 'url', type: 'string'),
                new OA\Property(property: 'valorVenda', type: 'string'),
                new OA\Property(property: 'visivel', type: 'boolean'),
                new OA\Property(property: 'fitness', type: 'string'),
                new OA\Property(property: 'destaqueHome', type: 'boolean'),
                new OA\Property(property: 'dataConclusao', type: 'string'),
                new OA\Property(property: 'breveDescricao', type: 'string'),
                new OA\Property(property: 'descricao', type: 'string'),
                new OA\Property(property: 'linkTourVirtual', type: 'string'),
                new OA\Property(property: 'linkHotsite', type: 'string'),
                new OA\Property(property: 'linkCorretor', type: 'string'),
                new OA\Property(property: 'linkAppIOS', type: 'string'),
                new OA\Property(property: 'linkAppAndroid', type: 'string'),
                new OA\Property(property: 'tipo', type: 'integer' ),
                new OA\Property(property: 'status', type: 'integer' ),
                new OA\Property(property: 'imagemDestaque', type: 'integer' ),
                new OA\Property(property: 'logoImagem', type: 'integer' ),
                new OA\Property(property: 'imagemObraEntregue', type: 'integer' ),
                new OA\Property(property: 'imagemFichaImovel', type: 'integer' ),
                new OA\Property(property: 'tags', type: 'array', items: new OA\Items(type: 'integer') ),
                new OA\Property(property: 'imagemTourVirtual', type: 'integer' ),
            ],
            type: 'object'
        )
    )]
    #[OA\Response(response: 404, description: 'Recurso não encontrado')]
    #[Route('/{id}', name: 'show', methods: ['GET'])]
    #[ACL\Api(enable: true, title: 'Visualizar', description: 'Visualizar Empreendimento')]
    public function showAction(Request $request, mixed $id): Response
    {
        $this->validateAccess("showAction");

        $object = $this->getRepository()->find($id);
        if (!$object)
            return $this->json(['status' => false, 'message' => 'Empreendimento não encontrado!'], 404);

        $response = $this->objectTransformer->ObjectToJson( $object, [
            'id', 'nome', 'nomeDestaque', 'url', 'valorVenda', 'visivel', 'fitness', 'destaqueHome', 'dataConclusao', 'breveDescricao', 'descricao', 'linkTourVirtual', 'linkHotsite', 'linkCorretor', 'linkAppIOS', 'linkAppAndroid', 'tipo', 'status', 'imagemDestaque', 'logoImagem', 'imagemObraEntregue', 'imagemFichaImovel', 'tags', 'imagemTourVirtual', 
        ]);

        return $this->json($response);
    }

    /** ****************************************************************************************** */
    /**
     * Substitui o recurso — Empreendimento.
     * Substitui o recurso — Empreendimento.
     */
    #[OA\Parameter( name: 'id', description: 'Identificador do recurso', in: 'path')]
    #[OA\Response(
        response: 200,
        description: 'Retorna recurso Empreendimento',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'id', type: 'integer'),
                new OA\Property(property: 'nome', type: 'string'),
                new OA\Property(property: 'nomeDestaque', type: 'string'),
                new OA\Property(property: 'url', type: 'string'),
                new OA\Property(property: 'valorVenda', type: 'string'),
                new OA\Property(property: 'visivel', type: 'boolean'),
                new OA\Property(property: 'fitness', type: 'string'),
                new OA\Property(property: 'destaqueHome', type: 'boolean'),
                new OA\Property(property: 'dataConclusao', type: 'string'),
                new OA\Property(property: 'breveDescricao', type: 'string'),
                new OA\Property(property: 'descricao', type: 'string'),
                new OA\Property(property: 'linkTourVirtual', type: 'string'),
                new OA\Property(property: 'linkHotsite', type: 'string'),
                new OA\Property(property: 'linkCorretor', type: 'string'),
                new OA\Property(property: 'linkAppIOS', type: 'string'),
                new OA\Property(property: 'linkAppAndroid', type: 'string'),
                new OA\Property(property: 'tipo', type: 'integer' ),
                new OA\Property(property: 'status', type: 'integer' ),
                new OA\Property(property: 'imagemDestaque', type: 'integer' ),
                new OA\Property(property: 'logoImagem', type: 'integer' ),
                new OA\Property(property: 'imagemObraEntregue', type: 'integer' ),
                new OA\Property(property: 'imagemFichaImovel', type: 'integer' ),
                new OA\Property(property: 'tags', type: 'array', items: new OA\Items(type: 'integer') ),
                new OA\Property(property: 'imagemTourVirtual', type: 'integer' ),
            ],
            type: 'object'
        )
    )]
    #[OA\Response(response: 400, description: 'Dados inválidos!')]
    #[OA\Response(response: 404, description: 'Recurso não encontrado')]
    #[OA\RequestBody(
        description: 'Json Payload',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'nome', type: 'string'),
                new OA\Property(property: 'nomeDestaque', type: 'string'),
                new OA\Property(property: 'url', type: 'string'),
                new OA\Property(property: 'valorVenda', type: 'string'),
                new OA\Property(property: 'visivel', type: 'boolean'),
                new OA\Property(property: 'fitness', type: 'string'),
                new OA\Property(property: 'destaqueHome', type: 'boolean'),
                new OA\Property(property: 'dataConclusao', type: 'string'),
                new OA\Property(property: 'breveDescricao', type: 'string'),
                new OA\Property(property: 'descricao', type: 'string'),
                new OA\Property(property: 'linkTourVirtual', type: 'string'),
                new OA\Property(property: 'linkHotsite', type: 'string'),
                new OA\Property(property: 'linkCorretor', type: 'string'),
                new OA\Property(property: 'linkAppIOS', type: 'string'),
                new OA\Property(property: 'linkAppAndroid', type: 'string'),
                new OA\Property(property: 'tipo', type: 'integer' ),
                new OA\Property(property: 'status', type: 'integer' ),
                new OA\Property(property: 'imagemDestaque', type: 'integer' ),
                new OA\Property(property: 'logoImagem', type: 'integer' ),
                new OA\Property(property: 'imagemObraEntregue', type: 'integer' ),
                new OA\Property(property: 'imagemFichaImovel', type: 'integer' ),
                new OA\Property(property: 'tags', type: 'array', items: new OA\Items(type: 'integer') ),
                new OA\Property(property: 'imagemTourVirtual', type: 'integer' ),
            ],
            type: 'object'
        )
    )]
    #[Route('/{id}', name: 'edit', methods: ['PUT','PATCH'])]
    #[ACL\Api(enable: true, title: 'Editar', description: 'Editar Empreendimento')]
    public function editAction(Request $request, mixed $id): Response
    {
        $this->validateAccess("editAction");

        $object = $this->getRepository()->find($id);
        if(!$object)
            return $this->json(['status' => false, 'message' => 'Empreendimento não encontrado!'], 404);

        /** Transforma corpo da requisição em um objeto da classe. */
        $object = $this->objectTransformer->JsonToObject($object, $request, [
            'nome', 'nomeDestaque', 'url', 'valorVenda', 'visivel', 'fitness', 'destaqueHome', 'dataConclusao', 'breveDescricao', 'descricao', 'linkTourVirtual', 'linkHotsite', 'linkCorretor', 'linkAppIOS', 'linkAppAndroid', 'tipo', 'status', 'imagemDestaque', 'logoImagem', 'imagemObraEntregue', 'imagemFichaImovel', 'tags', 'imagemTourVirtual', 
        ]);

        /** Valida Restrições do objeto */
        $errors = $this->validateConstraintErros($object);
        if($errors)
            return $this->json($errors);

        /** Persiste o objeto */
        $em = $this->doctrine->getManager();
        $em->persist($object);
        $em->flush();

        $response = $this->objectTransformer->ObjectToJson( $object, [
            'id', 'nome', 'nomeDestaque', 'url', 'valorVenda', 'visivel', 'fitness', 'destaqueHome', 'dataConclusao', 'breveDescricao', 'descricao', 'linkTourVirtual', 'linkHotsite', 'linkCorretor', 'linkAppIOS', 'linkAppAndroid', 'tipo', 'status', 'imagemDestaque', 'logoImagem', 'imagemObraEntregue', 'imagemFichaImovel', 'tags', 'imagemTourVirtual', 
        ]);

        return $this->json($response);
    }

    /** ****************************************************************************************** */
    /**
    * Remove o recurso — Empreendimento.
    * Remove o recurso — Empreendimento.
    */
    #[OA\Parameter( name: 'id', description: 'Identificador do recurso', in: 'path')]
    #[OA\Response(response: 204, description: 'Recurso excluído')]
    #[OA\Response(response: 404, description: 'Recurso não encontrado')]
    #[Route('/{id}', name: 'delete', methods: ['DELETE'])]
    #[ACL\Api(enable: true, title: 'Deletar', description: 'Deletar Empreendimento')]
    public function deleteAction(mixed $id): Response
    {
        $this->validateAccess("deleteAction");

        $object = $this->getRepository()->find($id);
        if (!$object)
            return $this->json(['status' => false, 'message' => 'Empreendimento não encontrado.'], 404);

        $em = $this->doctrine->getManager();
        $em->remove($object);
        $em->flush();

        return $this->json(['status' => true, 'message' => 'Empreendimento removido com sucesso.'], 204);
    }

}
<?php
namespace App\Application\Internit\EmpreendimentoBundle\Admin;

use App\Application\Internit\EmpreendimentoBundle\Entity\Empreendimento;
use App\Application\Internit\TipoBundle\Entity\Tipo;
use App\Application\Internit\StatusBundle\Entity\Status;
use App\Application\Internit\SonataMediaMediaBundle\Entity\SonataMediaMedia;
use App\Application\Internit\TagBundle\Entity\Tag;

use App\Application\Project\ContentBundle\Admin\Base\BaseAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

/** Components Form */
use Sonata\DoctrineORMAdminBundle\Filter\ModelFilter;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;

final class EmpreendimentoAdmin extends BaseAdmin
{

    public function toString(object $object): string
    {
        return $object instanceof Empreendimento ? $object->getId().''
        
        : '';
    }



    protected function configureFormFields(FormMapper $form): void
    {
        $form->tab('Geral');
            $form->with('Informações Gerais');


                $form->add('nome',  TextType::class, [
                    'label' => 'Nome',
                    'required' =>  true ,
                    
                ]);

                $form->add('nomeDestaque',  TextType::class, [
                    'label' => 'Nomedestaque',
                    'required' =>  true ,
                    
                ]);

                $form->add('url',  TextType::class, [
                    'label' => 'Url',
                    'required' =>  true ,
                    
                ]);

                $form->add('valorVenda',  TextType::class, [
                    'label' => 'Valorvenda',
                    'required' =>  true ,
                    
                ]);

                $form->add('visivel',  CheckboxType::class, [
                    'label' => 'Visivel',
                    'required' =>  false ,
                    
                ]);

                $form->add('fitness',  TextType::class, [
                    'label' => 'Fitness',
                    'required' =>  false ,
                    
                ]);

                $form->add('destaqueHome',  CheckboxType::class, [
                    'label' => 'Destaquehome',
                    'required' =>  false ,
                    
                ]);

                $form->add('dataConclusao',  DateType::class, [
                    'label' => 'Dataconclusao',
                    'required' =>  false ,
                    'widget' => 'single_text',
                ]);

                $form->add('breveDescricao',  TextareaType::class, [
                    'label' => 'Brevedescricao',
                    'required' =>  true ,
                    
                ]);

                $form->add('descricao',  TextareaType::class, [
                    'label' => 'Descricao',
                    'required' =>  true ,
                    
                ]);

                $form->add('linkTourVirtual',  TextType::class, [
                    'label' => 'Linktourvirtual',
                    'required' =>  false ,
                    
                ]);

                $form->add('linkHotsite',  TextType::class, [
                    'label' => 'Linkhotsite',
                    'required' =>  false ,
                    
                ]);

                $form->add('linkCorretor',  TextType::class, [
                    'label' => 'Linkcorretor',
                    'required' =>  false ,
                    
                ]);

                $form->add('linkAppIOS',  TextType::class, [
                    'label' => 'Linkappios',
                    'required' =>  false ,
                    
                ]);

                $form->add('linkAppAndroid',  TextType::class, [
                    'label' => 'Linkappandroid',
                    'required' =>  false ,
                    
                ]);

                $form->add('tipo', ModelAutocompleteType::class, [
                    'property' => 'id',
                    'placeholder' => 'Escolha o Tipo',
                    'help' => 'Filtros para pesquisa: [ id, tipo, descricao, visivel,  ] - Exemplo de utilização: [ filtro=texto_pesquisa ]',
                    'minimum_input_length' => 0,
                    'items_per_page' => 10,
                    'quiet_millis' => 100,
                    'multiple' =>  false ,
                    'required' =>  false ,
                    'to_string_callback' => function($entity, $property) {
                        return $entity->getId() ;
                    },
                    'callback' => static function (AdminInterface $admin, string $property, string $value): void {
                        $property = strtolower($property);
                        $value = strtolower($value);
                        $datagrid = $admin->getDatagrid();
                        $valueParts = explode('=', $value);
                        if (count($valueParts) === 2 && in_array($valueParts[0], [ "id","tipo","descricao","visivel", ]))
                        [$property, $value] = $valueParts;

                        $datagrid->setValue($datagrid->getFilter($property)->getFormName(), null, $value);
                    },
                ]);

                $form->add('status', ModelAutocompleteType::class, [
                    'property' => 'id',
                    'placeholder' => 'Escolha o Status',
                    'help' => 'Filtros para pesquisa: [ id, nome, descricao, visivel,  ] - Exemplo de utilização: [ filtro=texto_pesquisa ]',
                    'minimum_input_length' => 0,
                    'items_per_page' => 10,
                    'quiet_millis' => 100,
                    'multiple' =>  false ,
                    'required' =>  false ,
                    'to_string_callback' => function($entity, $property) {
                        return $entity->getId() ;
                    },
                    'callback' => static function (AdminInterface $admin, string $property, string $value): void {
                        $property = strtolower($property);
                        $value = strtolower($value);
                        $datagrid = $admin->getDatagrid();
                        $valueParts = explode('=', $value);
                        if (count($valueParts) === 2 && in_array($valueParts[0], [ "id","nome","descricao","visivel", ]))
                        [$property, $value] = $valueParts;

                        $datagrid->setValue($datagrid->getFilter($property)->getFormName(), null, $value);
                    },
                ]);

                $form->add('imagemDestaque', ModelListType::class,[
                    'label' => 'Imagemdestaque: ',
                ]);

                $form->add('logoImagem', ModelListType::class,[
                    'label' => 'Logoimagem: ',
                ]);

                $form->add('imagemObraEntregue', ModelListType::class,[
                    'label' => 'Imagemobraentregue: ',
                ]);

                $form->add('imagemFichaImovel', ModelListType::class,[
                    'label' => 'Imagemfichaimovel: ',
                ]);

                $form->add('tags', ModelAutocompleteType::class, [
                    'property' => 'id',
                    'placeholder' => 'Escolha o Tags',
                    'help' => 'Filtros para pesquisa: [ id, nome, descricao, visivel,  ] - Exemplo de utilização: [ filtro=texto_pesquisa ]',
                    'minimum_input_length' => 0,
                    'items_per_page' => 10,
                    'quiet_millis' => 100,
                    'multiple' =>  true ,
                    'required' =>  false ,
                    'to_string_callback' => function($entity, $property) {
                        return $entity->getId() ;
                    },
                    'callback' => static function (AdminInterface $admin, string $property, string $value): void {
                        $property = strtolower($property);
                        $value = strtolower($value);
                        $datagrid = $admin->getDatagrid();
                        $valueParts = explode('=', $value);
                        if (count($valueParts) === 2 && in_array($valueParts[0], [ "id","nome","descricao","visivel", ]))
                        [$property, $value] = $valueParts;

                        $datagrid->setValue($datagrid->getFilter($property)->getFormName(), null, $value);
                    },
                ]);

                $form->add('imagemTourVirtual', ModelListType::class,[
                    'label' => 'Imagemtourvirtual: ',
                ]);

            $form->end();
        $form->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid): void
    {
        $datagrid->add('id', null, [
            'label' => 'Id',
        ]);

        $datagrid->add('nome', null, [
            'label' => 'Nome',
        ]);

        $datagrid->add('nomeDestaque', null, [
            'label' => 'Nomedestaque',
        ]);

        $datagrid->add('url', null, [
            'label' => 'Url',
        ]);

        $datagrid->add('valorVenda', null, [
            'label' => 'Valorvenda',
        ]);

        $datagrid->add('visivel', null, [
            'label' => 'Visivel',
        ]);

        $datagrid->add('fitness', null, [
            'label' => 'Fitness',
        ]);

        $datagrid->add('destaqueHome', null, [
            'label' => 'Destaquehome',
        ]);

        $datagrid->add('dataConclusao', null, [
            'label' => 'Dataconclusao',
            'field_options' => [
                'widget' => 'single_text',
            ],
        ]);

        $datagrid->add('breveDescricao', null, [
            'label' => 'Brevedescricao',
        ]);

        $datagrid->add('descricao', null, [
            'label' => 'Descricao',
        ]);

        $datagrid->add('linkTourVirtual', null, [
            'label' => 'Linktourvirtual',
        ]);

        $datagrid->add('linkHotsite', null, [
            'label' => 'Linkhotsite',
        ]);

        $datagrid->add('linkCorretor', null, [
            'label' => 'Linkcorretor',
        ]);

        $datagrid->add('linkAppIOS', null, [
            'label' => 'Linkappios',
        ]);

        $datagrid->add('linkAppAndroid', null, [
            'label' => 'Linkappandroid',
        ]);

        $datagrid->add('tipo', ModelFilter::class, [
            'label' => 'Tipo',
            'field_options' => [
                'multiple' => true,
                'choice_label'=> function (Tipo $tipo) {
                    return $tipo->getId()
                    ;
                },
            ],
        ]);

        $datagrid->add('status', ModelFilter::class, [
            'label' => 'Status',
            'field_options' => [
                'multiple' => true,
                'choice_label'=> function (Status $status) {
                    return $status->getId()
                    ;
                },
            ],
        ]);





        $datagrid->add('tags', ModelFilter::class, [
            'label' => 'Tags',
            'field_options' => [
                'multiple' => true,
                'choice_label'=> function (Tag $tags) {
                    return $tags->getId()
                    ;
                },
            ],
        ]);


    }

    protected function configureListFields(ListMapper $list): void
    {

        $list->addIdentifier('id', null, [
            'label' => 'Id',
                                                            
        ]);


        $list->addIdentifier('nome', null, [
            'label' => 'Nome',
                                                            
        ]);


        $list->addIdentifier('nomeDestaque', null, [
            'label' => 'Nomedestaque',
                                                            
        ]);


        $list->addIdentifier('url', null, [
            'label' => 'Url',
                                                            
        ]);


        $list->addIdentifier('valorVenda', null, [
            'label' => 'Valorvenda',
                                                            
        ]);


        $list->add('visivel', null, [
            'label' => 'Visivel',
                                                'editable' => true,            'inverse' => false,
        ]);


        $list->addIdentifier('fitness', null, [
            'label' => 'Fitness',
                                                            
        ]);


        $list->add('destaqueHome', null, [
            'label' => 'Destaquehome',
                                                'editable' => true,            'inverse' => false,
        ]);


        $list->addIdentifier('dataConclusao', null, [
            'label' => 'Dataconclusao',
            'format'=> 'd/m/Y',                                                
        ]);


        $list->addIdentifier('breveDescricao', null, [
            'label' => 'Brevedescricao',
                                                            
        ]);


        $list->addIdentifier('descricao', null, [
            'label' => 'Descricao',
                                                            
        ]);


        $list->addIdentifier('linkTourVirtual', null, [
            'label' => 'Linktourvirtual',
                                                            
        ]);


        $list->addIdentifier('linkHotsite', null, [
            'label' => 'Linkhotsite',
                                                            
        ]);


        $list->addIdentifier('linkCorretor', null, [
            'label' => 'Linkcorretor',
                                                            
        ]);


        $list->addIdentifier('linkAppIOS', null, [
            'label' => 'Linkappios',
                                                            
        ]);


        $list->addIdentifier('linkAppAndroid', null, [
            'label' => 'Linkappandroid',
                                                            
        ]);


        $list->add('tipo', null, [
            'label' => 'Tipo',
            'associated_property' => function (Tipo $tipo) {
                return $tipo->getId()
                ;
            },
        ]);


        $list->add('status', null, [
            'label' => 'Status',
            'associated_property' => function (Status $status) {
                return $status->getId()
                ;
            },
        ]);










        $list->add('tags', null, [
            'label' => 'Tags',
            'associated_property' => function (Tag $tags) {
                return $tags->getId()
                ;
            },
        ]);




        $list->add(ListMapper::NAME_ACTIONS, ListMapper::TYPE_ACTIONS, [
            'actions' => [
                'show'   => [],
                'edit'   => [],
                'delete' => [],
            ]
        ]);

    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show->tab('Geral');
            $show->with('Informações Gerais', [
                'class'       => 'col-md-12',
                'box_class'   => 'box box-solid box-primary',
                'description' => 'Informações Gerais',
            ]);

                $show->add('id', null, [
                    'label' => 'Id',
                                                            
                ]);

                $show->add('nome', null, [
                    'label' => 'Nome',
                                                            
                ]);

                $show->add('nomeDestaque', null, [
                    'label' => 'Nomedestaque',
                                                            
                ]);

                $show->add('url', null, [
                    'label' => 'Url',
                                                            
                ]);

                $show->add('valorVenda', null, [
                    'label' => 'Valorvenda',
                                                            
                ]);

                $show->add('visivel', null, [
                    'label' => 'Visivel',
                                                            
                ]);

                $show->add('fitness', null, [
                    'label' => 'Fitness',
                                                            
                ]);

                $show->add('destaqueHome', null, [
                    'label' => 'Destaquehome',
                                                            
                ]);

                $show->add('dataConclusao', null, [
                    'label' => 'Dataconclusao',
                    'format'=> 'd/m/Y',                                        
                ]);

                $show->add('breveDescricao', null, [
                    'label' => 'Brevedescricao',
                                                            
                ]);

                $show->add('descricao', null, [
                    'label' => 'Descricao',
                                                            
                ]);

                $show->add('linkTourVirtual', null, [
                    'label' => 'Linktourvirtual',
                                                            
                ]);

                $show->add('linkHotsite', null, [
                    'label' => 'Linkhotsite',
                                                            
                ]);

                $show->add('linkCorretor', null, [
                    'label' => 'Linkcorretor',
                                                            
                ]);

                $show->add('linkAppIOS', null, [
                    'label' => 'Linkappios',
                                                            
                ]);

                $show->add('linkAppAndroid', null, [
                    'label' => 'Linkappandroid',
                                                            
                ]);

                $show->add('tipo', null, [
                    'label' => 'Tipo',
                    'associated_property' => function (Tipo $tipo) {
                        return $tipo->getId()
                        ;
                    },
                ]);

                $show->add('status', null, [
                    'label' => 'Status',
                    'associated_property' => function (Status $status) {
                        return $status->getId()
                        ;
                    },
                ]);





                $show->add('tags', null, [
                    'label' => 'Tags',
                    'associated_property' => function (Tag $tags) {
                        return $tags->getId()
                        ;
                    },
                ]);



            $show->end();
        $show->end();
    }


}
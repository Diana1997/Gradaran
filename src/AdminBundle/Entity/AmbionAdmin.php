<?php
namespace AdminBundle\Entity;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use AdminBundle\Entity\Ambion;

class AmbionAdmin extends Admin{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Content')
            ->add('name', 'text')
            ->end()

            ->with('Meta data')
            ->add('fakultet', 'sonata_type_model', array(
                'class' => 'AdminBundle\Entity\Fakultet',
                'property' => 'name',
            ))
            ->end();
    }
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
                    //'show' => array(),
                )
            ));
    }
}
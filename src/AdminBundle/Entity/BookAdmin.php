<?php

namespace AdminBundle\Entity;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use AdminBundle\Entity\Book;
use Doctrine\Common\Collections\ArrayCollection;

class BookAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Content')
            ->add('bookTitle', 'text')
            ->add('author', 'text')
            ->add('ararka', 'text')
            ->add('kisamyak', 'text')
            ->add('file', 'file',array(
                'required' => false,
                //'data_class' => null,
            ))
            ->add('image', 'file', array(
                'required' => false,
            ))
            ->end()

       ->with('Meta data')
       ->add('masnagitutyun', 'sonata_type_model', array(
           'class' => 'AdminBundle\Entity\Masnagitutyun',
           'property' => 'name',
       ))
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('bookTitle')
            ->add('author')
            ->add('ararka')
            ->add('kisamyak');

    }

    protected function configureListFields(ListMapper $listMapper)
    {

        $listMapper->addIdentifier('bookTitle')
            ->add('ararka')
            ->add('kisamyak')
            ->add('author')
          //  ->add('quotation')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
                    //'show' => array(),
                    //'shortCat' => array('template' =>'AppBundle:CRUD:shortcut.html.twig')
                )
            ))
        ;
    }

    /**
     * @param mixed $object
     * @return mixed|void
     */
    public function prePersist($object)
    {
        $object->upload();
        $object->uploadImage();
    }

}

<?php

namespace Concrete\Package\C5EntitiesWithYamlMappingCustomLocation\Controller\SinglePage\Dashboard\Example;

/**
 * Slider overview Controller
 *
 * @author markus.liechti
 */
class Entity  extends \Concrete\Core\Page\Controller\DashboardPageController {

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    /**
     * @var \Kaapiii\Example\Repository\EntityRepository
     */
    protected $entityRepo;

    /**
     * Constructor
     *
     * @param \Concrete\Core\Page\Page $c
     */
    public function __construct(\Concrete\Core\Page\Page $c) {
        parent::__construct($c);
        $this->em = \ORM::entityManager();
        $this->entityRepo = $this->em->getRepository('Kaapiii\Example\Entity\Entity');
    }

    /**
     * View
     *
     * @param integer $currentPage
     */
    public function view(){
        
        $entities = $this->entityRepo->findAll();
        $this->set('entities',$entities);
        
        $page = \Page::getCurrentPage();
        $url = $page->getCollectionPath();
        $this->set('url', $url);
    }

    /**
     * Add slider
     */
    public function add(){
//        $form = \Core::make('helper/form');
//        $fileManager = \Core::make('helper/concrete/file_manager');

//        $this->set('form', $form);
//        $this->set('fileManager', $fileManager);
        $this->render('/dashboard/example/entity/add');
    }

    /**
     * Submit add
     */
    public function submitAdd(){
        $name = $this->get('name');
        $activeRaw = $this->get('active');
        $active = isset($activeRaw) ? true : false;

        $entity = new \Kaapiii\Example\Entity\Entity();
        $entity->setName($name);
        $entity->setActive($active);

        $this->em->persist($entity);

        try{
            $this->em->flush();
            // redirect to the list view
            $this->redirect('/dashboard/example/entity');
            // or redirect to the edit view
            //$this->redirect('/dashboard/example/entity/edit/'.$entity->getId());
        } catch (\Exception $e){

            $this->error->add('New Entity could not be safed: '.$e);
        }

        $this->redirect('/dashboard/example/entity/add');
    }

    /**
     * Edit
     *
     * @param integer $id
     */
    public function edit($id){

        $entity = $this->entityRepo->find($id);
        $form = \Core::make('helper/form');

        $this->set('form', $form);
        $this->set('entity', $entity);
        
        $this->render('/dashboard/example/entity/edit');
    }

    /**
     * Submit Edit
     */
    public function submitEdit(){
        $id = $this->get('id');
        $name = $this->get('name');
        $activeRaw = $this->get('active');
        $active = isset($activeRaw) ? true : false;

        $entity = $this->entityRepo->find($id);
        $entity->setName($name);
        $entity->setActive($active);
//        $this->em->persist($slider);
        try{
            $this->em->flush();
        } catch (\Exception $e){
            $this->error->add($e);
        }

        $this->redirect('/dashboard/example/entity');
    }

    /**
     * Delete
     */
    public function submitDelete(){
        $entityId = intval($this->get('entityId'));

        $entity = $this->em->getReference('Kaapiii\Example\Entity\Entity', $entityId);

        $this->em->remove($entity);

        try{
            $this->em->flush();
        }catch(\Exception $e){
            $this->error->add(t('Entry couldn\'t be deleted.').' '.$e);
        }
        $this->view();
    }

}

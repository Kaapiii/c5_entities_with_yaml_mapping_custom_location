<?php

namespace Concrete\Package\C5EntitiesWithYamlMappingCustomLocation\Controller\SinglePage\Dashboard;

/**
 * Slider overview Controller
 *
 * @author markus.liechti
 */
class Example  extends \Concrete\Core\Page\Controller\DashboardPageController {
       
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;
    
    /**
     * Constructor
     * 
     * @param \Concrete\Core\Page\Page $c
     */
    public function __construct(\Concrete\Core\Page\Page $c) {

        parent::__construct($c);
        $this->em = \ORM::entityManager();
    }
    
    /**
     * View
     * 
     * @param integer $currentPage
     */
    public function view(){

    }
}

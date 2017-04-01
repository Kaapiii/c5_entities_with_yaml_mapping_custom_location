<?php

namespace Kaapiii\Example\Json;

/**
 * EntityJson handles all json request (backend and frontend) concerning the example entity
 * 
 * !!! Attention !!!!
 * If you change some values, always clear the local storage in your browser
 * Typeahead prefetches the json and caches it in the local storage of your browser
 * for the specified amount  of time.
 *
 * @author Markus Liechti <markus@liechti.io>
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class EntityJson extends \Kaapiii\Example\Json\Json {
    
    /**
     * EntityManager
     * 
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;
    
    /**
     * @var \Kaapiii\Example\Repository\EntityRepository
     */
    protected $entityRepo;
    
    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
        $this->em = \ORM::entityManager();
        $this->entityRepo = $this->em->getRepository('Kaapiii\Example\Entity\Entity');
    }
    
    /**
     * Get all example entities for the entity search
     * 
     * @return json with all entities as result
     */
    public function getBackendEntitySearchResults(){
        
        // Optional security check 
        // The json feed is only accessible for logged in users
        $user = new \Concrete\Core\User\User();
        if(!$user->isRegistered()){
            $this->renderJsonNoCaching(array('error' => 'You must be logged in to be able to fetch this information.'));
        }
        
        $entities = $this->entityRepo->findAll();
        
        
        $results = array();
        if(count($entities) > 0){
            foreach($entities as $entity){
                
                // @todo = take the URL_REWRITING into account
                $link = BASE_URL.'/index.php/dashboard/example/entity/edit/'.$entity->getId();

                // The "label" will be shown in the typeahead
                // The "value" will be searched against
                // The "link" contains the url to the edit view in the backend
                $results[] = array(
                    'label' => $entity->getName(),
                    'value' => $entity->getName(),
                    'url' => $link
                );
            }
        }
        // output a cached json string
        // In most cases this is the best choice for the frontend implementations.
        //$this->renderJson($results);
        
        // output a not cached json string - desired for the most backend use cases
        $this->renderJsonNoCaching($results);
    }
}

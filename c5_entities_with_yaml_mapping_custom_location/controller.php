<?php
namespace Concrete\Package\C5EntitiesWithYamlMappingCustomLocation;

use Concrete\Core\Backup\ContentImporter;
use Concrete\Core\Database\EntityManager\Provider\YamlProvider;
use Concrete\Core\Database\EntityManager\Provider\ProviderInterface;
use Concrete\Core\Package\Package;

defined('C5_EXECUTE') or die(_("Access Denied."));

/**
 * Controller test addon - testing metadatadriver with legacy annotation driver
 *
 * @author Markus Liechti <markus@liechti.io>
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class Controller extends Package implements ProviderInterface{

    protected $pkgHandle = 'c5_entities_with_yaml_mapping_custom_location';
    protected $appVersionRequired = '8.0.0';
    protected $pkgVersion = '0.0.1';

    const CUSTOM_NAMESPACE = '\Kaapiii\Example';

    public function getPackageDescription() {
        return t("Example package registers entities in a custom namespace with yaml mapping information");
    }

    public function getPackageName(){
        return t("Example package registers entities in a custom namespace with yaml driver.");
    }
    
    /**
     * Register the custom namespace
     * 
     * @var array
     */
    protected $pkgAutoloaderRegistries = array(
        'src/Kaapiii/Example' => self::CUSTOM_NAMESPACE,
    );
    
    /**
     * Return customized metadata driver wrapped in a YamlProvider for doctrine orm
     * Example shows the registration of entities in a custom namespace
     * Path: {package}/config/yaml
     * 
     * @return YamlProvider
     */
    public function getDrivers(){
        
        // Entities in custom Namespace
        $customNamespace = 'Kaapiii\Example\Entity';
        
        // Mapping files location - here I've chosen the default location
        $mappingDataPath = $this->getPackagePath() . DIRECTORY_SEPARATOR 
                    . DIRNAME_CONFIG . DIRECTORY_SEPARATOR . DIRNAME_METADATA_YAML;
        
        // Create the Provider eather YamlProvider or XmlProvider
        $yamlProvider = new YamlProvider($this);
        
        // Add the Namespace and the location of the entity mapping information
        $yamlProvider->addDriver($customNamespace, $mappingDataPath);
        
        return $yamlProvider->getDrivers();
    }

    /**
     * Install
     */
    public function install(){
        $pkg = parent::install();

        // install dashboard pages
        $ci = new ContentImporter();
        $ci->importContentFile($pkg->getPackagePath() . '/install/dashboard-pages.xml');
    }
    
    /**
     * Register a custom route
     */
    public function on_start(){
        // Url exposes all entities
        \Route::register('/dashboard/api/example/entities', '\Kaapiii\Example\Json\EntityJson::getBackendEntitySearchResults');
    }
}
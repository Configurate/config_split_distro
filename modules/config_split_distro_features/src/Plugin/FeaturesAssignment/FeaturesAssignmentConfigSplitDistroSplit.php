<?php

namespace Drupal\config_split_distro_features\Plugin\FeaturesAssignment;

use Drupal\features\FeaturesAssignmentMethodBase;
use Drupal\config_split_distro_features\ConfigSplitDistroFeaturesInterface;

/**
 * Class for assigning existing modules to packages.
 *
 * @Plugin(
 *   id = "split",
 *   weight = 30,
 *   name = @Translation("Spit"),
 *   description = @Translation("Assign all configuration to the 'config/split' directory."),
 * )
 */
class FeaturesAssignmentConfigSplitDistroSplit extends FeaturesAssignmentMethodBase {
  /**
   * {@inheritdoc}
   */
  public function assignPackages($force = FALSE) {
    $subdirectory = ConfigSplitDistroFeaturesInterface::CONFIG_SPLIT_DIRECTORY;

    // Register our storage directory.
    $this->featuresManager->getExtensionStorages()->addStorage($subdirectory);

    $config_collection = $this->featuresManager->getConfigCollection();

    // Assign all configuration to our storage directory.
    foreach ($config_collection as &$item) {
      $item->setSubdirectory($subdirectory);
    }
    // Clean up the $item pass by reference.
    unset($item);

    $this->featuresManager->setConfigCollection($config_collection);
  }

}

<?php

namespace Drupal\config_split_distro_features;

use Drupal\Core\Database\Connection;
use Drupal\features\ConfigurationItem;

/**
 * Provides methods for integrating Features and Configuration Split.
 */
trait ConfigSplitDistroFeaturesTrait {

  /**
   * Ensures that splits exist for the set of packages.
   */
  protected function ensureSplits(array $packages) {
    $config_collection = $this->featuresManager->getConfigCollection();

    foreach ($packages as $package) {
      $config_item_name = 'config_split.' . $package->getMachineName();
      if (!isset($config_collection[$config_item_name])) {
        // @Todo: create config splits that don't already exist and add them to
        // the Features config collection.

      }
    }
  }

}

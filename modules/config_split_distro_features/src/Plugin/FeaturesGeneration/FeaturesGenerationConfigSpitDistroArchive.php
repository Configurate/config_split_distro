<?php

namespace Drupal\config_split_distro_features\Plugin\FeaturesGeneration;

use Drupal\features\FeaturesBundleInterface;
use Drupal\features\Plugin\FeaturesGeneration\FeaturesGenerationArchive;
use Drupal\config_split_distro_features\ConfigSplitDistroFeaturesTrait;

class FeaturesGenerationConfigSpitDistroArchive extends FeaturesGenerationArchive implements ContainerFactoryPluginInterface {

  use ConfigSplitDistroFeaturesTrait;

  /**
   * {@inheritdoc}
   */
  public function generate(array $packages = array(), FeaturesBundleInterface $bundle = NULL) {
    // If no packages were specified, get all packages.
    if (empty($packages)) {
      $packages = $this->featuresManager->getPackages();
    }

    $this->ensureSplits($packages);

    return parent::generate($packages, $bundle);
  }

}

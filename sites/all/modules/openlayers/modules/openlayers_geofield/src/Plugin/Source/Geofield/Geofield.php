<?php
/**
 * @file
 * Source: Geofield.
 */

namespace Drupal\openlayers_geofield\Plugin\Source\Geofield;
use Drupal\openlayers\Component\Annotation\OpenlayersPlugin;
use Drupal\openlayers\Plugin\Source\Vector\Vector;

/**
 * Class Geofield.
 *
 * @OpenlayersPlugin(
 *  id = "Geofield"
 * )
 *
 */
class Geofield extends Vector {

  /**
   * {@inheritdoc}
   */
  public function isCacheable() {
    // Since every instance can have other features this isn't cacheable.
    return FALSE;
  }
}

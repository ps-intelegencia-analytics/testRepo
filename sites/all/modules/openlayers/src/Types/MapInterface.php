<?php
/**
 * @file
 * Interface MapInterface.
 */

namespace Drupal\openlayers\Types;

/**
 * Interface MapInterface.
 */
interface MapInterface extends ObjectInterface {
  /**
   * Returns the id of this map.
   *
   * @return string
   *   The id of this map.
   */
  public function getId();

  /**
   * Build render array of a map.
   *
   * @return array
   *   The render array.
   */
  public function build(array $build = array());
}

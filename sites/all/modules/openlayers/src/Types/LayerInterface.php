<?php
/**
 * @file
 * Interface LayerInterface.
 */

namespace Drupal\openlayers\Types;

/**
 * Interface LayerInterface.
 */
interface LayerInterface extends ObjectInterface {
  /**
   * Returns the source of this layer.
   *
   * @return SourceInterface|FALSE
   *   The source of this layer.
   */
  public function getSource();

  /**
   * Set the source of this layer.
   */
  public function setSource(SourceInterface $source);

  /**
   * Returns the style of this layer.
   *
   * @return StyleInterface|FALSE
   *   The style of this layer.
   */
  public function getStyle();

  /**
   * Set the style of this layer.
   */
  public function setStyle(StyleInterface $style);
}

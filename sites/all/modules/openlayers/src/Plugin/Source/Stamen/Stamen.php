<?php
/**
 * @file
 * Source: Stamen.
 */

namespace Drupal\openlayers\Plugin\Source\Stamen;
use Drupal\openlayers\Component\Annotation\OpenlayersPlugin;
use Drupal\openlayers\Types\Source;

/**
 * Class Stamen
 *
 * @OpenlayersPlugin(
 *  id = "Stamen"
 * )
 *
 * @package Drupal\openlayers\Source
 */
class Stamen extends Source {

  /**
   * {@inheritdoc}
   */
  public function optionsForm(&$form, &$form_state) {
    $form['options']['layer'] = array(
      '#title' => t('Source type'),
      '#type' => 'select',
      '#default_value' => $this->getOption('layer', 'osm'),
      '#options' => array(
        'terrain-labels' => 'Terrain labels',
        'watercolor' => 'Watercolor',
      ),
    );
  }

}

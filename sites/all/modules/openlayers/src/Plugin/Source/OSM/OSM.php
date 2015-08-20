<?php
/**
 * @file
 * Source: OSM.
 */

namespace Drupal\openlayers\Plugin\Source\OSM;
use Drupal\openlayers\Component\Annotation\OpenlayersPlugin;
use Drupal\openlayers\Types\Source;

/**
 * Class OSM.
 *
 * @OpenlayersPlugin(
 *  id = "OSM"
 * )
 *
 */
class OSM extends Source {

  /**
   * {@inheritdoc}
   */
  public function optionsForm(&$form, &$form_state) {
    $form['options']['url'] = array(
      '#type' => 'textarea',
      '#title' => t('Base URL (template)'),
      '#default_value' => $this->getOption('url') ? implode("\n", (array) $this->getOption('url')) : 'http://a.tile.openstreetmap.org/${z}/${x}/${y}.png',
      '#maxlength' => 2083,
    );
  }

  /**
   * {@inheritdoc}
   */
  public function optionsFormSubmit($form, &$form_state) {
    if ($form_state['values']['options']['url'] == '') {
      unset($form_state['item']->options['url']);
    }
  }
}

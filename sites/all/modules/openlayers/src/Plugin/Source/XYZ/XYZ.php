<?php
/**
 * @file
 * Source: XYZ.
 */

namespace Drupal\openlayers\Plugin\Source\XYZ;
use Drupal\openlayers\Component\Annotation\OpenlayersPlugin;
use Drupal\openlayers\Types\Source;

/**
 * Class XYZ.
 *
 * @OpenlayersPlugin(
 *  id = "XYZ"
 * )
 *
 */
class XYZ extends Source {
  /**
   * {@inheritdoc}
   */
  public function optionsForm(&$form, &$form_state) {
    $form['options']['url'] = array(
      '#title' => t('URL(s)'),
      '#type' => 'textarea',
      '#default_value' => $this->getOption('url') ? $this->getOption('url') : '',
    );
  }
}

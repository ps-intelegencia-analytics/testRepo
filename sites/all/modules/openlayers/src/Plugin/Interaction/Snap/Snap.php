<?php

/**
 * @file
 * Interaction: Snap.
 */

namespace Drupal\openlayers\Plugin\Interaction\Snap;
use Drupal\openlayers\Component\Annotation\OpenlayersPlugin;
use Drupal\openlayers\Types\Interaction;

/**
 * Class Snap.
 *
 * @OpenlayersPlugin(
 *  id = "Snap"
 * )
 *
 */
class Snap extends Interaction {

  /**
   * {@inheritdoc}
   */
  public function optionsForm(&$form, &$form_state) {
    $form['options'] = array(
      '#tree' => TRUE,
    );

    $form['options']['source'] = array(
      '#type' => 'select',
      '#title' => t('Source'),
      '#empty_option' => t('- Select a Source -'),
      '#default_value' => isset($form_state['item']->options['source']) ? $form_state['item']->options['source'] : '',
      '#description' => t('Select the vector source.'),
      '#options' => \Drupal\openlayers\Openlayers::loadAllAsOptions('Source'),
      '#required' => TRUE,
    );
  }

}

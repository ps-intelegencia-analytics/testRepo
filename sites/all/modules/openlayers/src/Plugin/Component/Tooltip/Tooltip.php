<?php
/**
 * @file
 * Component: Tooltip.
 */

namespace Drupal\openlayers\Plugin\Component\Tooltip;
use Drupal\openlayers\Component\Annotation\OpenlayersPlugin;
use Drupal\openlayers\Types\Component;

/**
 * Class Tooltip.
 *
 * @OpenlayersPlugin(
 *  id = "Tooltip"
 * )
 */
class Tooltip extends Component {

  /**
   * {@inheritdoc}
   */
  public function optionsForm(&$form, &$form_state) {
    $form['options']['layer'] = array(
      '#type' => 'select',
      '#title' => t('Layer'),
      '#empty_option' => t('- Select a Layer -'),
      '#default_value' => isset($form_state['item']->options['layer']) ? $form_state['item']->options['layer'] : '',
      '#description' => t('Select the layer.'),
      '#options' => \Drupal\openlayers\Openlayers::loadAllAsOptions('Layer'),
      '#required' => TRUE,
    );

    $form['options']['positioning'] = array(
      '#type' => 'select',
      '#title' => t('Positioning'),
      '#default_value' => isset($form_state['item']->options['positioning']) ? $form_state['item']->options['positioning'] : 'top-left',
      '#description' => t('Defines how the overlay is actually positioned. Default is top-left.'),
      '#options' => openlayers_positioning_options(),
      '#required' => TRUE,
    );
  }
}

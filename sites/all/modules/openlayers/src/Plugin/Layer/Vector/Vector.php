<?php
/**
 * @file
 * Layer: Vector.
 */

namespace Drupal\openlayers\Plugin\Layer\Vector;
use Drupal\openlayers\Component\Annotation\OpenlayersPlugin;
use Drupal\openlayers\Types\Layer;
use Drupal\openlayers\Types\ObjectInterface;

/**
 * Class Vector.
 *
 * @OpenlayersPlugin(
 *  id = "Vector"
 * )
 *
 */
class Vector extends Layer {
  /**
   * {@inheritdoc}
   */
  public function optionsForm(&$form, &$form_state) {
    $form['options']['zoomActivity'] = array(
      '#title' => t('Show on certain zoom levels only'),
      '#description' => t('Define a zoom level per line, keep empty to show the layer always.'),
      '#type' => 'textarea',
      '#default_value' => $this->getOption('zoomActivity', ''),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getJS() {
    $js = parent::getJS();
    // Ensure we've sane zoom levels.
    if (!empty($js['opt']['zoomActivity'])) {
      $js['opt']['zoomActivity'] = array_map('intval', explode("\n", $js['opt']['zoomActivity']));
      // Ensure the zoom levels are also used as keys.
      $js['opt']['zoomActivity'] = array_combine($js['opt']['zoomActivity'], $js['opt']['zoomActivity']);
    }
    return $js;
  }

  /**
   * @inheritDoc
   */
  public function preBuild(array &$build, ObjectInterface $context = NULL) {
    $layers = $context->getObjects('layer');
    foreach($layers as $layer) {
      if (!in_array($layer->getFactoryService(), array('openlayers.Layer:Vector','openlayers.Layer:Heatmap'))) {
        $layer->setOption('type', 'base');
      }
    }
  }
}

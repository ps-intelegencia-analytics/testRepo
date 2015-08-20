<?php

/**
 * @file
 * Contains geofieldProximityCurrentUserGeolocate.
 */

class geofieldProximityCurrentUserGeolocate extends geofieldProximityBase implements geofieldProximityPluginInterface {

  private $lat;
  private $long;

  public function option_definition(&$options, $views_plugin) {
    $options['geofield_proximity_current_user_geolocate_field'] = array(
      'default' => '',
    );
    $options['geofield_proximity_current_user_geolocate_delta'] = array(
      'default' => 0,
    );
  }

  public function options_form(&$form, &$form_state, $views_plugin) {
    $geofields = _geofield_get_geofield_fields();
    $field_options = array();
    foreach ($geofields as $key => $field) {
      $field_options[$key] = $key;
    }

    $form['geofield_proximity_current_user_geolocate_field'] = array(
      '#type' => 'select',
      '#title' => t('Source Field'),
      '#default_value' => $views_plugin->options['geofield_proximity_current_user_geolocate_field'],
      '#options' => $field_options,
      '#dependency' => array(
        'edit-options-source' => array('current_user_geolocate'),  // @fixme
      ),
    );
  }

  private function geofield_geolocate_info() {    
    $this->lat = $_SESSION['geolocate']['lat'];
    $this->long = $_SESSION['geolocate']['long'];
  }

  public function getSourceValue($views_plugin) {

    $geofield_name = $views_plugin->options['geofield_proximity_current_user_geolocate_field'];
    $delta = $views_plugin->options['geofield_proximity_current_user_geolocate_delta'];        
    
    $this->geofield_geolocate_info();
    
    if (!empty($_SESSION['geolocate'])) {

      $lat = $_SESSION['geolocate']['lat'];
      $long = $_SESSION['geolocate']['long'];

      return array(
          'latitude' => $this->lat,
          'longitude' => $this->long,
        );
    }

    return FALSE;
  }
}

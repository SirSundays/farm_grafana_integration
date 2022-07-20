<?php

namespace Drupal\farm_grafana_integration\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * A grafana controller.
 */
class FarmGrafanaIntegrationController extends ControllerBase {

  /**
   * Returns a render-able array for a test page.
   */
  public function fullView() {
    $grafana_url = \Drupal::config('farm_grafana_integration.settings')->get('grafana_url');

    $build = [
      '#theme' => 'grafana_integration_full_view',
      '#url' => $grafana_url
    ];
    return $build;
  }

}

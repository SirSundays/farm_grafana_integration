<?php

namespace Drupal\farm_grafana_integration\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'grafana_integration_panel' formatter.
 *
 * @FieldFormatter(
 *   id = "grafana_integration_panel",
 *   module = "grafana_integration",
 *   label = @Translation("Displays Grafana Panel"),
 *   field_types = {
 *     "grafana_integration"
 *   }
 * )
 */
class GrafanaIntegrationPanelFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = array();

    foreach ($items as $delta => $item) {
        $elements[$delta] = array(
          '#theme' => 'grafana_integration_panel_formatter',
          '#url' => $item->value
        );

    }

    return $elements;
  }

}
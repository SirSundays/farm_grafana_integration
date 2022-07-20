<?php
 
namespace Drupal\farm_grafana_integration\Plugin\Field\FieldType;
 
use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;
 
/**
 * Plugin implementation of the 'grafana_integration' field type.
 *
 * @FieldType(
 *   id = "grafana_integration",
 *   label = @Translation("Embed Grafana Panel"),
 *   module = "grafana_integration",
 *   description = @Translation("Show a panel from a Grafana instance"),
 *   default_widget = "grafana_integration",
 *   default_formatter = "grafana_integration_panel"
 * )
 */
class GrafanaIntegrationItem extends FieldItemBase {
  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return array(
      'columns' => array(
        'value' => array(
          'type' => 'text',
          'size' => 'tiny',
          'not null' => FALSE,
        ),
      ),
    );
  }
 
  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $value = $this->get('value')->getValue();
    return $value === NULL || $value === '';
  }
 
  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['value'] = DataDefinition::create('string')
      ->setLabel(t('Grafana Panel URL'));
 
    return $properties;
  }
 
}
<?php
 
namespace Drupal\farm_grafana_integration\Plugin\Field\FieldWidget;
 
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
 
/**
 * Plugin implementation of the 'grafana_integration' widget.
 *
 * @FieldWidget(
 *   id = "grafana_integration",
 *   module = "grafana_integration",
 *   label = @Translation("Grafana Panel URL"),
 *   field_types = {
 *     "grafana_integration"
 *   }
 * )
 */
class GrafanaIntegrationWidget extends WidgetBase {
 
  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $value = isset($items[$delta]->value) ? $items[$delta]->value : '';
    $element += array(
      '#type' => 'textfield',
      '#default_value' => $value,
      '#size' => 32,
      '#maxlength' => 256,
      '#element_validate' => array(
        array($this, 'validate'),
      ),
    );
    return array('value' => $element);
  }
 
  /**
   * Validate the text field.
   */
  public function validate($element, FormStateInterface $form_state) {
    $value = $element['#value'];
    if (strlen($value) == 0) {
      $form_state->setValueForElement($element, '');
      return;
    }
  }
 
}
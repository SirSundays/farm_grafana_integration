<?php

namespace Drupal\farm_grafana_integration\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a farm_grafana_integration settings form.
 */
class GrafanaSettingsForm extends ConfigFormbase {

  /**
   * Config settings.
   *
   * @var string
   */
  const SETTINGS = 'farm_grafana_integration.settings';

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'farm_grafana_integration_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      static::SETTINGS,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateinterface $form_state) {
    $config = $this->config(static::SETTINGS);

    // Add the grafana_url option.
    $form['grafana_url'] = [
      '#type' => 'url',
      '#title' => $this->t('Grafana URL'),
      '#description' => $this->t('Used to show a instance of Grafana, when clicking the sidebar.'),
      '#default_value' => $config->get('grafana_url'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->configFactory->getEditable(static::SETTINGS)
      ->set('grafana_url', $form_state->getValue('grafana_url'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}

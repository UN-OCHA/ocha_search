<?php

namespace Drupal\ocha_search\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure search settings for this site.
 */
class OchaSearchSettingsForm extends ConfigFormBase {

  /**
   * Config settings.
   *
   * @var string
   */
  const SETTINGS = 'ocha_search.settings';

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'ocha_search_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function getEditableConfigNames() {
    return [
      static::SETTINGS,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config(static::SETTINGS);

    $form['site_results'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Site results'),
      '#collapsible' => FALSE,
    ];

    $form['site_results_page_path'] = [
      '#type' => 'textfield',
      '#group' => 'site_results',
      '#title' => $this->t('Site results page path'),
      '#description' => $this->t('The relative path for the site results page, without a leading slash.'),
      '#default_value' => $config->get('site_results_page_path'),
    ];

    $form['search_site_text'] = [
      '#type' => 'textarea',
      '#group' => 'site_results',
      '#title' => $this->t('Site search page text'),
      '#description' => $this->t('Optional text to add to the site search results page.'),
      '#default_value' => $config->get('search_site_text'),
    ];

    $form['site_gcse_id'] = [
      '#type' => 'textfield',
      '#group' => 'site_results',
      '#title' => $this->t('Site GCSE ID'),
      '#description' => $this->t('The id of the Google Custom Search Engine for this site only, to be found or configured at https://programmablesearchengine.google.com/'),
      '#default_value' => $config->get('site_gcse_id'),
    ];

    $form['enable_ocha_wide_results'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enable tab for OCHA-wide results'),
      '#default_value' => $config->get('enable_ocha_wide_results'),
    ];

    $form['ocha_wide_results'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('OCHA-wide results'),
      '#collapsible' => TRUE,
      '#states' => [
        'invisible' => [
          ':input[name="enable_ocha_wide_results"]' => ['checked' => FALSE],
        ],
      ],
    ];

    $form['ocha_wide_results_page_path'] = [
      '#type' => 'textfield',
      '#group' => 'ocha_wide_results',
      '#title' => $this->t('Ocha-wide results page path'),
      '#description' => $this->t('The relative path for the Ocha-wide results page, without a leading slash.'),
      '#default_value' => $config->get('ocha_wide_results_page_path'),
    ];

    $form['search_ocha_text'] = [
      '#type' => 'textarea',
      '#group' => 'ocha_wide_results',
      '#title' => $this->t('OCHA-wide search page text'),
      '#description' => $this->t('Optional text to add to the OCHA-wide search results page.'),
      '#default_value' => $config->get('search_ocha_text'),
    ];

    $form['ocha_wide_gcse_id'] = [
      '#type' => 'textfield',
      '#group' => 'ocha_wide_results',
      '#title' => $this->t('Ocha-wide GCSE ID'),
      '#description' => $this->t('The id of the Google Custom Search Enginefor this OCHA-wide searches. For consistency with other sites, this id should not be changed.'),
      '#default_value' => $config->get('ocha_wide_gcse_id'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config(static::SETTINGS)
      ->set('site_results_page_path', $form_state->getValue('site_results_page_path'))
      ->set('ocha_wide_results_page_path', $form_state->getValue('ocha_wide_results_page_path'))
      ->set('search_site_text', $form_state->getValue('search_site_text'))
      ->set('search_ocha_text', $form_state->getValue('search_ocha_text'))
      ->set('site_gcse_id', $form_state->getValue('site_gcse_id'))
      ->set('ocha_wide_gcse_id', $form_state->getValue('ocha_wide_gcse_id'))
      ->set('enable_ocha_wide_results', $form_state->getValue('enable_ocha_wide_results'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}

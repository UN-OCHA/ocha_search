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

    $form['site_results_page_path'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Site results page path'),
      '#description' => $this->t('The relative path for the site results page, without a leading slash.'),
      '#default_value' => $config->get('site_results_page_path'),
    ];

    $form['ocha_wide_results_page_path'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Ocha-wide results page path'),
      '#description' => $this->t('The relative path for the Ocha-wide results page, without a leading slash.'),
      '#default_value' => $config->get('ocha_wide_results_page_path'),
    ];

    $form['search_text'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Search page text'),
      '#description' => $this->t('Optional text to add to the search results page.'),
      '#default_value' => $config->get('search_text'),
    ];

    $form['site_gcse_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Site GCSE ID'),
      '#description' => $this->t('The id of the Google Custom Search Enginefor this site only, to be found at https://programmablesearchengine.google.com/'),
      '#default_value' => $config->get('site_gcse_id'),
    ];

    $form['ocha_wide_gcse_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Ocha-wide GCSE ID'),
      '#description' => $this->t('The id of the Google Custom Search Enginefor this site only, to be found at https://programmablesearchengine.google.com/'),
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
      ->set('search_text', $form_state->getValue('search_text'))
      ->set('site_gcse_id', $form_state->getValue('site_gcse_id'))
      ->set('ocha_wide_gcse_id', $form_state->getValue('ocha_wide_gcse_id'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}

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

    $form['results_page_path'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Results page path'),
      '#description' => $this->t('The relative path for the results page, without a leading slash.'),
      '#default_value' => $config->get('results_page_path'),
    ];

    $form['search_text'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Search page text'),
      '#description' => $this->t('Optional text to add to the search results page.'),
      '#default_value' => $config->get('search_text'),
    ];

    $form['gcse_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('GCSE ID'),
      '#description' => $this->t('The id of the Google Custom Search Engine, to be found at https://programmablesearchengine.google.com/'),
      '#default_value' => $config->get('gcse_id'),
    ];

    $form['default_refinement'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Default Refinement'),
      '#description' => $this->t('The name of the tab that will be selected by default, Refinements are defined in the Search Features section of the GCSE config panel - this name should match one of the refinements defined there.'),
      '#default_value' => $config->get('default_refinement'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config(static::SETTINGS)
      ->set('results_page_path', $form_state->getValue('results_page_path'))
      ->set('default_refinement', $form_state->getValue('default_refinement'))
      ->set('search_text', $form_state->getValue('search_text'))
      ->set('gcse_id', $form_state->getValue('gcse_id'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}

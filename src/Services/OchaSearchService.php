<?php

namespace Drupal\ocha_search\Services;

use Drupal\Core\Config\ConfigFactory;

/**
 * Class OchaSearchService.
 *
 * @package Drupal\ocha_search\Services
 */
class OchaSearchService {

  /**
   * Configuration Factory.
   *
   * @var \Drupal\Core\Config\ConfigFactory
   */
  protected $configFactory;

  /**
   * Constructor.
   */
  public function __construct(ConfigFactory $configFactory) {
    $this->configFactory = $configFactory;
  }

  /**
   * Get site results path.
   */
  public function getSitePath() {
    $config = $this->configFactory->get('ocha_search.settings');
    return $config->get('site_results_page_path');
  }

  /**
   * Get Ocha-wide results path.
   */
  public function getOchaWidePath() {
    $config = $this->configFactory->get('ocha_search.settings');
    return $config->get('ocha_wide_results_page_path');
  }

}

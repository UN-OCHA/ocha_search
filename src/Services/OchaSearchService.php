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
   * Get path.
   */
  public function getPath() {
    $config = $this->configFactory->get('ocha_search.settings');
    return $config->get('results_page_path');
  }

}

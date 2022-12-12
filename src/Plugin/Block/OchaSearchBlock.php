<?php

namespace Drupal\ocha_search\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a GCSE search block.
 *
 * @Block(
 * id = "ocha_search_block",
 * admin_label = @Translation("OCHA Search"),
 * )
 */
class OchaSearchBlock extends Blockbase implements ContainerFactoryPluginInterface {

  /**
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * {@inheritdoc}
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, ConfigFactoryInterface $config_factory) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->configFactory = $config_factory;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('config.factory')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $results_page_path = $this->configFactory->get('ocha_search.settings')->get('site_results_page_path') ?? 'results';

    return [
      '#theme' => 'ocha_search_block',
      '#results_page_path' => $results_page_path,
    ];
  }

}

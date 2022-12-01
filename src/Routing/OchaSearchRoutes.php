<?php

namespace Drupal\ocha_search\Routing;

use Symfony\Component\Routing\Route;

/**
 * Define a configurable route for search results.
 */
class OchaSearchRoutes {

  /**
   * {@inheritdoc}
   */
  public function routes() {
    $routes = [];
    $site_results_path = \Drupal::service('ocha_search.search_service')->getSitePath();
    $ocha_wide_results_path = \Drupal::service('ocha_search.search_service')->getOchaWidePath();
    $routes['ocha_search.site_search'] = new Route(
      '/' . $site_results_path,
      [
        '_controller' => '\Drupal\ocha_search\Controller\OchaSearchController::siteSearch',
        '_title' => 'Site search',
      ],
      [
        '_permission' => 'access content',
      ]
    );

    $routes['ocha_search.ocha_wide_search'] = new Route(
      '/' . $ocha_wide_results_path,
      [
        '_controller' => '\Drupal\ocha_search\Controller\OchaSearchController::ochaWideSearch',
        '_title' => 'OCHA-wide Search',
      ],
      [
        '_permission' => 'access content',
      ]
    );

    return $routes;
  }

}

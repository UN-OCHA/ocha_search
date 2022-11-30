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
    $results_path = \Drupal::service('ocha_search.search_service')->getPath();
    $routes['ocha_search.search'] = new Route(
      '/' . $results_path,
      [
        '_controller' => '\Drupal\ocha_search\Controller\OchaSearchController::search',
        '_title' => 'Search',
      ],
      [
        '_permission' => 'access content',
      ]
    );

    return $routes;
  }

}

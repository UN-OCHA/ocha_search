<?php

namespace Drupal\ocha_search\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Url;
use Symfony\Component\HttpFoundation\Request;

/**
 * Provides route responses for the Ocha Search module.
 */
class OchaSearchController extends ControllerBase {

  /**
   * Returns a page for site search results.
   *
   * @return array
   *   A renderable array.
   */
  public function siteSearch(Request $request) {
    $parameter = $request->query->get('gsc.q') ?? $request->query->get('q');
    $toggle_link_path = Url::fromRoute(
      'ocha_search.ocha_wide_search',
      [],
      ['query' => ['q' => $parameter]]
    )->toString();
    return [
      '#title' => $this->t('Site search'),
      '#gcse_id' => $this->config('ocha_search.settings')->get('site_gcse_id'),
      '#scope' => 'site',
      '#enable_ocha_wide_results' => $this->config('ocha_search.settings')->get('enable_ocha_wide_results'),
      '#toggle_link_site_text' => $this->t('Site-only search'),
      '#toggle_link_ocha_text' => $this->t('OCHA-wide search'),
      '#toggle_link_path' => $toggle_link_path,
      '#search_text' => $this->config('ocha_search.settings')->get('search_site_text'),
      '#theme' => 'ocha_search_results_page',
    ];
  }

  /**
   * Returns a page for Ocha-wide search results.
   *
   * @return array
   *   A renderable array.
   */
  public function ochaWideSearch(Request $request) {
    $parameter = $request->query->get('gsc.q') ?? $request->query->get('q');
    $toggle_link_path = Url::fromRoute(
      'ocha_search.site_search',
      [],
      ['query' => ['q' => $parameter]]
    )->toString();
    return [
      '#title' => $this->t('OCHA-wide search'),
      '#scope' => 'ocha-wide',
      '#enable_ocha_wide_results' => TRUE,
      '#toggle_link_site_text' => $this->t('Site-only search'),
      '#toggle_link_ocha_text' => $this->t('OCHA-wide search'),
      '#toggle_link_path' => $toggle_link_path,
      '#gcse_id' => $this->config('ocha_search.settings')->get('ocha_wide_gcse_id'),
      '#search_text' => $this->config('ocha_search.settings')->get('search_ocha_text'),
      '#theme' => 'ocha_search_results_page',
    ];
  }

}

# OCHA search module

This module provides basic configuration and one or two search results pages
for results from Google Custom Search Engine searches:
 * one, to be configured, for the site the module is installed on,
 * the other, optional, for OCHA-wide results.

## Google Indexing

To use GCSE effectively as an in-site search, the site’s content needs to be
indexed by Google.
We use Drupal xmlsitemap module to provide a sitemap and we can submit that to
Google for indexing. This requires access to Google Search console which can be
requested via digitalservices@humanitarianresponse.info

## Additional setup in the subtheme

The result page template can be overridden in the subtheme, and the
styling can be extended by a subtheme library.

`common_design_subtheme.info.yml`

```yaml
libraries-extend:
  ocha_search/google-cse:
    - common_design_subtheme/google-cse
```

This module also provides a Drupal block for the search form. Place this block
in the Header Search region. The markup of the search form currently relies on
the [Common Design][common-design] base theme for styles and javascript.

  [common-design]: https://github.com/UN-OCHA/common_design

## Configuration

There are two sets of configurations required:
'Google config', on the Google site at
https://programmablesearchengine.google.com/controlpanel/all
'Internal config', on the OCHA site at
/admin/config/search/gcse-config

Site search results will appear at `/results` unless set to another path in the
'internal config'. This is to avoid conflict with `/search` as that path may
already be defined by other modules.

OCHA-wide search results will by default appear at `/ocha-wide-results`.
They can be turned off via the 'Enable tab for OCHA-wide results' checkbox, and
the path can be configured. Both options are on the internal config page.

Site search requires a GCSE ID, which comes from the Google config page.
That ID must be added on the internal config page.

### Google config

The 'standard' configuration options are included in `example-context-cse.xml`
in the `gcse_config` directory. The file can be uploaded to a custom search
engine via the advanced tab in the setup. The name and description should be
edited accordingly.

All the color preferences and other styling choices are included in a css file
in the module, so configuration of those in the google interface can be ignored.

### Internal config

Site search:
  * The path for the results page for site-only search, if a different path than
  '/results'.
  * A descriptive text for the site search results page.
  * The GCSE ID for the current site search, found on the Google config page.
OCHA-wide search:
  * A checkbox to Enable OCHA-wide results - if unchecked, only the site search
  will be shown.
  * The path for the results page for OCHA-wide search, if a different path than
  '/ocha-wide-results'.
  * A descriptive text for the OCHA-wide search results pages.
  * The GCSE ID for the OCHA-wide search. Leave this as the default value for
  consistency with other sites.

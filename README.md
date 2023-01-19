# OCHA search module

This modules provides basic configuration and two search results pages for
results from Google Custom Search Engine searches - one, to be configured, for
the site the module is installed on, the other for OCHA-wide results.

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
the Common Design base theme for styles.

## Configuration

There are two sets of configurations required:
'Google config', on the Google site at
https://programmablesearchengine.google.com/controlpanel/all
'Internal config', on the OCHA site at
/admin/config/search/gcse-config

Search results will appear at `/results` unless set to another path in the
'internal config'. This is to avoid conflict with `/search` as that path may
already be defined by other modules.

It requires a GCSE ID, which comes from the Google config page.
That ID must be added on the module config page.

### Google config

The 'standard' configuration options are included in an xml file in the
gcse_config directory. It can be uploaded to a custom search engine via the
advanced tab in the setup, then the name and description edited accordingly.

All the color preferences and some other styling choices are included in a
css file in the module, so configuration of those in the settings can be
ignored.

### Internal config

* The path for the results page for site-only search, if a different path than
'/results'.
* The path for the results page for Ocha-wide search, if a different path than
'/ocha-wide-results'.
* A descriptive text for the site search results page.
* A descriptive text for the OCHA-wide search results pages.
* The GCSE ID for the current site search, found on the Google config page.
* The GCSE ID for the OCHA-wide search, normally 92f65997481234c49.

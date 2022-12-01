# OCHA search module
============================

This modules provides basic configuration and two search results pages for
results from Google Custom Search Engine searches - one, to be configured, for
the site the module is installed on, the other for OCHA-wide results.

## Additional setup
The search box and the styling should be added to the subtheme.
@TODO add a link to the CD PR where the search box is adapted for this.

## Configuration
There are two sets of configurations required:
'Google config', on the Google site at
https://programmablesearchengine.google.com/controlpanel/all
'Module config', on the OCHA site at
/admin/config/search/gcse-config

Search results will appear at `/results` unless set to another path in the 'internal config'. This is to avoid conflict with `/search` as that path may 
already be defined by other modules.

It requires a GCSE ID, which comes from the Google config page.
That ID must be added on the module config page.

### Google config
The 'standard' configuration options are included in an xml file in the
gcse_config directory. It can be uploaded to a custom search engine via the
advanced tab in the setup, then the name and description edited accordingly.

All the color preferences and some other styling choices are included in a
css file in the theme, so configuration of those in the can be ignored.

### Module config
The GCSE ID for the current site, found on the Google configuration page:
Optional local settings:
The path for the results page for site-only search, if a different path than
'/results'.
The path for the results page for Ocha-wide search, if a different path than
'/ocha-wide-results'.
A descriptive text for the search results pages.

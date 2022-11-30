# OCHA search module
============================

This modules provides basic configuration and a dedicated search page for
results from Google Custom Search Engine searches.

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
The 'standard' configuration options are included in the xml files in the
gcse_config directory. These can be uploaded to a custom search engine via the
advanced tab in the setup.

For context-cse.yml - change SITE NAME and site_name accordingly.
For annotations.yml - add a 'refinement' with only urls from the current site.

All the color preferences and some other styling choices are included in a
css file in the theme, so configuration of those in the can be ignored.

### Module config
Found on the Google configuration page:
The GCSE ID
The name of the 'refinement' for the site search.
Optional local settings:
The results page, if a different path than '/results' is required.
A descriptive text for the search results page.

# Article Summaries

A MediaWiki extension that runs an experiment that presents simple article summaries on mobile Wikipedia.

## Installation

For information on how to install and use this extension, please see:
    <https://www.mediawiki.org/wiki/Extension:ArticleSummaries>

## Public API

To show the CTA modal programmatically, use the `cta.open` hook:

```javascript
mw.hook('cta.open').fire();
```

This will load and display the CTA modal

To run Jest tests, run:
    `npm run test:jest`

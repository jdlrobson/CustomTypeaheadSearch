/** @module search */

const
        Vue = require( 'vue' ),
        App = require( './App.vue' );

/**
 * @param {Element} searchContainer
 * @return {void}
 */
function initApp( searchContainer ) {
        // @ts-ignore MediaWiki-specific function
        Vue.createMwApp(
                App,
                {}
        )
                .mount( searchContainer );
}
/**
 * @param {Document} document
 * @return {void}
 */
function main( document ) {
        document.querySelectorAll( '.vector-typeahead-search-container' )
                .forEach( initApp );
}
main( document );


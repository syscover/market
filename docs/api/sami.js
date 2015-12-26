
(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href=".html">Syscover</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Syscover_Market" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Syscover/Market.html">Market</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Syscover_Market_Controllers" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Syscover/Market/Controllers.html">Controllers</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Syscover_Market_Controllers_CategoryController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Market/Controllers/CategoryController.html">CategoryController</a>                    </div>                </li>                            <li data-name="class:Syscover_Market_Controllers_ProductController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Market/Controllers/ProductController.html">ProductController</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Syscover_Market_Models" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Syscover/Market/Models.html">Models</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Syscover_Market_Models_Category" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Market/Models/Category.html">Category</a>                    </div>                </li>                            <li data-name="class:Syscover_Market_Models_Product" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Market/Models/Product.html">Product</a>                    </div>                </li>                            <li data-name="class:Syscover_Market_Models_ProductLang" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Market/Models/ProductLang.html">ProductLang</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:Syscover_Market_MarketServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Syscover/Market/MarketServiceProvider.html">MarketServiceProvider</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "Syscover.html", "name": "Syscover", "doc": "Namespace Syscover"},{"type": "Namespace", "link": "Syscover/Market.html", "name": "Syscover\\Market", "doc": "Namespace Syscover\\Market"},{"type": "Namespace", "link": "Syscover/Market/Controllers.html", "name": "Syscover\\Market\\Controllers", "doc": "Namespace Syscover\\Market\\Controllers"},{"type": "Namespace", "link": "Syscover/Market/Models.html", "name": "Syscover\\Market\\Models", "doc": "Namespace Syscover\\Market\\Models"},
            
            {"type": "Class", "fromName": "Syscover\\Market\\Controllers", "fromLink": "Syscover/Market/Controllers.html", "link": "Syscover/Market/Controllers/CategoryController.html", "name": "Syscover\\Market\\Controllers\\CategoryController", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Market\\Controllers\\CategoryController", "fromLink": "Syscover/Market/Controllers/CategoryController.html", "link": "Syscover/Market/Controllers/CategoryController.html#method_indexCustom", "name": "Syscover\\Market\\Controllers\\CategoryController::indexCustom", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Market\\Controllers\\CategoryController", "fromLink": "Syscover/Market/Controllers/CategoryController.html", "link": "Syscover/Market/Controllers/CategoryController.html#method_createCustomRecord", "name": "Syscover\\Market\\Controllers\\CategoryController::createCustomRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Market\\Controllers\\CategoryController", "fromLink": "Syscover/Market/Controllers/CategoryController.html", "link": "Syscover/Market/Controllers/CategoryController.html#method_storeCustomRecord", "name": "Syscover\\Market\\Controllers\\CategoryController::storeCustomRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Market\\Controllers\\CategoryController", "fromLink": "Syscover/Market/Controllers/CategoryController.html", "link": "Syscover/Market/Controllers/CategoryController.html#method_editCustomRecord", "name": "Syscover\\Market\\Controllers\\CategoryController::editCustomRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Market\\Controllers\\CategoryController", "fromLink": "Syscover/Market/Controllers/CategoryController.html", "link": "Syscover/Market/Controllers/CategoryController.html#method_updateCustomRecord", "name": "Syscover\\Market\\Controllers\\CategoryController::updateCustomRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Market\\Controllers\\CategoryController", "fromLink": "Syscover/Market/Controllers/CategoryController.html", "link": "Syscover/Market/Controllers/CategoryController.html#method_apiCheckSlug", "name": "Syscover\\Market\\Controllers\\CategoryController::apiCheckSlug", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Market\\Controllers", "fromLink": "Syscover/Market/Controllers.html", "link": "Syscover/Market/Controllers/ProductController.html", "name": "Syscover\\Market\\Controllers\\ProductController", "doc": "&quot;Class ProductController&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Market\\Controllers\\ProductController", "fromLink": "Syscover/Market/Controllers/ProductController.html", "link": "Syscover/Market/Controllers/ProductController.html#method_indexCustom", "name": "Syscover\\Market\\Controllers\\ProductController::indexCustom", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Market\\Controllers\\ProductController", "fromLink": "Syscover/Market/Controllers/ProductController.html", "link": "Syscover/Market/Controllers/ProductController.html#method_customActionUrlParameters", "name": "Syscover\\Market\\Controllers\\ProductController::customActionUrlParameters", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Market\\Controllers\\ProductController", "fromLink": "Syscover/Market/Controllers/ProductController.html", "link": "Syscover/Market/Controllers/ProductController.html#method_createCustomRecord", "name": "Syscover\\Market\\Controllers\\ProductController::createCustomRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Market\\Controllers\\ProductController", "fromLink": "Syscover/Market/Controllers/ProductController.html", "link": "Syscover/Market/Controllers/ProductController.html#method_storeCustomRecord", "name": "Syscover\\Market\\Controllers\\ProductController::storeCustomRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Market\\Controllers\\ProductController", "fromLink": "Syscover/Market/Controllers/ProductController.html", "link": "Syscover/Market/Controllers/ProductController.html#method_editCustomRecord", "name": "Syscover\\Market\\Controllers\\ProductController::editCustomRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Market\\Controllers\\ProductController", "fromLink": "Syscover/Market/Controllers/ProductController.html", "link": "Syscover/Market/Controllers/ProductController.html#method_updateCustomRecord", "name": "Syscover\\Market\\Controllers\\ProductController::updateCustomRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Market\\Controllers\\ProductController", "fromLink": "Syscover/Market/Controllers/ProductController.html", "link": "Syscover/Market/Controllers/ProductController.html#method_addToDeleteRecord", "name": "Syscover\\Market\\Controllers\\ProductController::addToDeleteRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Market\\Controllers\\ProductController", "fromLink": "Syscover/Market/Controllers/ProductController.html", "link": "Syscover/Market/Controllers/ProductController.html#method_addToDeleteTranslationRecord", "name": "Syscover\\Market\\Controllers\\ProductController::addToDeleteTranslationRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Market\\Controllers\\ProductController", "fromLink": "Syscover/Market/Controllers/ProductController.html", "link": "Syscover/Market/Controllers/ProductController.html#method_addToDeleteRecordsSelect", "name": "Syscover\\Market\\Controllers\\ProductController::addToDeleteRecordsSelect", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Market\\Controllers\\ProductController", "fromLink": "Syscover/Market/Controllers/ProductController.html", "link": "Syscover/Market/Controllers/ProductController.html#method_apiCheckSlug", "name": "Syscover\\Market\\Controllers\\ProductController::apiCheckSlug", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Market", "fromLink": "Syscover/Market.html", "link": "Syscover/Market/MarketServiceProvider.html", "name": "Syscover\\Market\\MarketServiceProvider", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Market\\MarketServiceProvider", "fromLink": "Syscover/Market/MarketServiceProvider.html", "link": "Syscover/Market/MarketServiceProvider.html#method_boot", "name": "Syscover\\Market\\MarketServiceProvider::boot", "doc": "&quot;Bootstrap the application services.&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Market\\MarketServiceProvider", "fromLink": "Syscover/Market/MarketServiceProvider.html", "link": "Syscover/Market/MarketServiceProvider.html#method_register", "name": "Syscover\\Market\\MarketServiceProvider::register", "doc": "&quot;Register the application services.&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Market\\Models", "fromLink": "Syscover/Market/Models.html", "link": "Syscover/Market/Models/Category.html", "name": "Syscover\\Market\\Models\\Category", "doc": "&quot;Class Category&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Market\\Models\\Category", "fromLink": "Syscover/Market/Models/Category.html", "link": "Syscover/Market/Models/Category.html#method_validate", "name": "Syscover\\Market\\Models\\Category::validate", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Market\\Models\\Category", "fromLink": "Syscover/Market/Models/Category.html", "link": "Syscover/Market/Models/Category.html#method_scopeBuilder", "name": "Syscover\\Market\\Models\\Category::scopeBuilder", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Market\\Models\\Category", "fromLink": "Syscover/Market/Models/Category.html", "link": "Syscover/Market/Models/Category.html#method_getLang", "name": "Syscover\\Market\\Models\\Category::getLang", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Market\\Models\\Category", "fromLink": "Syscover/Market/Models/Category.html", "link": "Syscover/Market/Models/Category.html#method_addToGetIndexRecords", "name": "Syscover\\Market\\Models\\Category::addToGetIndexRecords", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Market\\Models\\Category", "fromLink": "Syscover/Market/Models/Category.html", "link": "Syscover/Market/Models/Category.html#method_getTranslationRecord", "name": "Syscover\\Market\\Models\\Category::getTranslationRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Market\\Models\\Category", "fromLink": "Syscover/Market/Models/Category.html", "link": "Syscover/Market/Models/Category.html#method_getRecords", "name": "Syscover\\Market\\Models\\Category::getRecords", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Market\\Models", "fromLink": "Syscover/Market/Models.html", "link": "Syscover/Market/Models/Product.html", "name": "Syscover\\Market\\Models\\Product", "doc": "&quot;Class Product&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Market\\Models\\Product", "fromLink": "Syscover/Market/Models/Product.html", "link": "Syscover/Market/Models/Product.html#method_validate", "name": "Syscover\\Market\\Models\\Product::validate", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Market\\Models\\Product", "fromLink": "Syscover/Market/Models/Product.html", "link": "Syscover/Market/Models/Product.html#method_scopeBuilder", "name": "Syscover\\Market\\Models\\Product::scopeBuilder", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Market\\Models\\Product", "fromLink": "Syscover/Market/Models/Product.html", "link": "Syscover/Market/Models/Product.html#method_getLang", "name": "Syscover\\Market\\Models\\Product::getLang", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Market\\Models\\Product", "fromLink": "Syscover/Market/Models/Product.html", "link": "Syscover/Market/Models/Product.html#method_getCategories", "name": "Syscover\\Market\\Models\\Product::getCategories", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Market\\Models\\Product", "fromLink": "Syscover/Market/Models/Product.html", "link": "Syscover/Market/Models/Product.html#method_addToGetIndexRecords", "name": "Syscover\\Market\\Models\\Product::addToGetIndexRecords", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Market\\Models\\Product", "fromLink": "Syscover/Market/Models/Product.html", "link": "Syscover/Market/Models/Product.html#method_getCustomReturnIndexRecords", "name": "Syscover\\Market\\Models\\Product::getCustomReturnIndexRecords", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Market\\Models\\Product", "fromLink": "Syscover/Market/Models/Product.html", "link": "Syscover/Market/Models/Product.html#method_getTranslationRecord", "name": "Syscover\\Market\\Models\\Product::getTranslationRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Market\\Models\\Product", "fromLink": "Syscover/Market/Models/Product.html", "link": "Syscover/Market/Models/Product.html#method_getRecords", "name": "Syscover\\Market\\Models\\Product::getRecords", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Market\\Models", "fromLink": "Syscover/Market/Models.html", "link": "Syscover/Market/Models/ProductLang.html", "name": "Syscover\\Market\\Models\\ProductLang", "doc": "&quot;Class Product&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Market\\Models\\ProductLang", "fromLink": "Syscover/Market/Models/ProductLang.html", "link": "Syscover/Market/Models/ProductLang.html#method_validate", "name": "Syscover\\Market\\Models\\ProductLang::validate", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Market\\Models\\ProductLang", "fromLink": "Syscover/Market/Models/ProductLang.html", "link": "Syscover/Market/Models/ProductLang.html#method_getLang", "name": "Syscover\\Market\\Models\\ProductLang::getLang", "doc": "&quot;\n&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});



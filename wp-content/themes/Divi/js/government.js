(function($, List, _, moment) {

  // List.js classes to use for search elements
  var listOptions = {
    valueNames: [
      'js-promise-text',
      'js-promise-category',
      'js-promise-status'
    ]
  };

  // tooltip
  $(function() {
    $('[data-toggle="tooltip"]').tooltip()
  });

  // tabs
  $('#myTabs a').click(function(e) {
    e.preventDefault()
    $(this).tab('show')
  });

  // Find any within a facet
  function foundAny(facets, compareItem) {
    // No facets selected, show all for this facet
    if (_.isEmpty(facets)) {
      return true;
    }
    // Otherwise, show this item if it contains any of the selected facets
    return facets.reduce(function(found, facet) {
      if (found) {
        return found;
      }
      return compareItem[facet['facet']] === facet['value'];
    }, false);
  }

  $(function() {

    // Dates
    var today = moment();
    var inauguration = moment(inaugration_date);
    $('#inauguration-days').html(inauguration.diff(today, 'days') > 0 ? inauguration.diff(today, 'days') : 'NA');

    $('#inauguration-time-container').hide(); //TEMP FIX 

    $('#days-in-office').html(today.diff(inauguration, 'days') > 0 ? today.diff(inauguration, 'days') : 0);

    // List.js object that we can filter upon
    var promiseList = new List('promises', listOptions).on('updated', function(list) {
      $('#count').html(list.visibleItems.length);
    });

    var $search = $('#search');
    var $facets = $('[data-list-facet]'); // All buttons that can filter

    // Clear all
    function resetFilter(e) {
      e.preventDefault();
      // Visually reset buttons
      $facets.removeClass('active');
      // Clear out text field
      $search.val('');
      // Wipe all filters
      promiseList.search();
      promiseList.filter();
    }

    function removeCategory(e) {
/* Function called on click of "All Categories button".
 * 'active' class is removed from the category tab. and then filter is applied.
 */
      for(var i = 1;i <= totalPromises; i++) {
        $('#mytab_' + i).removeClass('active');
      }
      // Array of active
      var facets = $facets.filter('.active').map(function() {
        // return object instead with facet/value
        return {
          facet: $(this).data('list-facet'),
          value: $(this).data('facet-value'),
          isSingle: !!$(this).data('select-single')
        };
      }).get();

      // When deselecting last, clear all filters
      if (facets.length === 0) {
        promiseList.filter();
        return; // Eject now
      }

      // Otherwise, filter on the array
      promiseList.filter(function(item) {

        var itemValues = item.values();

        // Single selects, eg "Not started"
        var single = _.filter(facets, { 'isSingle': true, 'facet': 'js-promise-status'});
        var statusMatch = foundAny(single, itemValues);
        // Single-selection items hide if false no matter what, so eject if not found here
        // if (!statusMatch) {
        //   return false;
        // }

        // Full categories can have multiples show, list out here
        var multis = _.filter(facets, { 'isSingle': true, 'facet': 'js-promise-category'});
        var categoryMatch=foundAny(multis,itemValues);

        if(statusMatch && categoryMatch){
          return true;
        }
        else return false;

      }); // promiseList.filter()
    }

    // Hard reset all the buttons
    $('.promises__category--reset').on('click', resetFilter);
    $('.promises__category--removeCategory').on('click', removeCategory);

    // Any facet filter button
    $facets.on('click', function(e) {

      var facet = $(this).data('list-facet'); // ie 'js-promise-category' //js-promise-status
      var value = $(this).data('facet-value'); // ie 'Culture' //Fulfilled
      var isSingle = !!$(this).data('select-single'); // ie true/false for if there can only be one of this filter
      //var promiseSingle = !!$(this).data('promise-single');
      // Single-select categories should have their active state wiped
      if (isSingle) {
        $facets
          .filter(function() {
            return $(this).data('list-facet') === facet;
          })
          .removeClass('active');
      }

      // if (promiseSingle) {
      //   $facets.filter(function() {
      //       return $(this).data('list-facet') === facet;
      //     })
      //     .removeClass('active');
      // }
      // Flag as active
      $(this).toggleClass('active');

      // Array of active
      var facets = $facets.filter('.active').map(function() {
        // return object instead with facet/value
        return {
          facet: $(this).data('list-facet'),
          value: $(this).data('facet-value'),
          isSingle: !!$(this).data('select-single')
        };
      }).get();

      // When deselecting last, clear all filters
      if (facets.length === 0) {
        promiseList.filter();
        return; // Eject now
      }

      // Otherwise, filter on the array
      promiseList.filter(function(item) {

        var itemValues = item.values();

        // Single selects, eg "Not started"
        var single = _.filter(facets, { 'isSingle': true, 'facet': 'js-promise-status'});
        var statusMatch = foundAny(single, itemValues);
        // Single-selection items hide if false no matter what, so eject if not found here
        // if (!statusMatch) {
        //   return false;
        // }

        // Full categories can have multiples show, list out here
        var multis = _.filter(facets, { 'isSingle': true, 'facet': 'js-promise-category'});
        var categoryMatch=foundAny(multis,itemValues);

        if(statusMatch && categoryMatch){
          return true;
        }
        else return false;

      }); // promiseList.filter()

    });


  });

})(jQuery, List, _, moment);
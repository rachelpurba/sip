/**
* Statuses DTO Collection
*/
QUnit.module('Unit Test: Statuses DTO Collection');

var statuses = [
{
	"action": "paging",
	"name": "paging",
	"type": "pagination",
	"data": {
		"number": "10",
		"currentPage": "0",
		"paging": {
			"itemsNumber": 6,
			"itemsOnPage": 10,
			"pagesNumber": 1,
			"currentPage": 0,
			"start": 0,
			"end": 6,
			"prevPage": 0,
			"nextPage": 0
		}
	},
	"inStorage": true,
	"inAnimation": true,
	"isAnimateToTop": true,
	"inDeepLinking": true
},
{
	"action": "sort",
	"name": "sort",
	"type": "sort-drop-down",
	"data": {
		"path": ".desc",
		"type": "text",
		"order": "asc",
		"dateTimeFormat": "{month}/{day}/{year}",
		"ignore": ""
	},
	"inStorage": true,
	"inAnimation": true,
	"isAnimateToTop": true,
	"inDeepLinking": true
},
{
	"action": "filter",
	"name": "title-filter",
	"type": "textbox",
	"data": {
		"path": ".title",
		"ignore": "[~!@#$%^&*()+=`'\"/\\_]+",
		"value": "",
		"filterType": "TextFilter"
	},
	"inStorage": true,
	"inAnimation": true,
	"isAnimateToTop": false,
	"inDeepLinking": true
},
{
	"action": "filter",
	"name": "desc-filter",
	"type": "textbox",
	"data": {
		"path": ".desc",
		"ignore": "[~!@#$%^&*()+=`'\"/\\_]+",
		"value": "",
		"filterType": "TextFilter"
	},
	"inStorage": true,
	"inAnimation": true,
	"isAnimateToTop": false,
	"inDeepLinking": true
},
{
	"action": "filter",
	"name": "architecture-btn",
	"type": "button-filter",
	"data": {
		"path": ".architecture",
		"filterType": "path",
		"selected": true
	},
	"inStorage": true,
	"inAnimation": true,
	"isAnimateToTop": false,
	"inDeepLinking": true
},
{
	"action": "filter",
	"name": "christmas-btn",
	"type": "button-filter",
	"data": {
		"path": ".christmas",
		"filterType": "",
		"selected": false
	},
	"inStorage": true,
	"inAnimation": true,
	"isAnimateToTop": false,
	"inDeepLinking": true
},
{
	"action": "filter",
	"name": "nature-btn",
	"type": "button-filter",
	"data": {
		"path": ".nature",
		"filterType": "",
		"selected": false
	},
	"inStorage": true,
	"inAnimation": true,
	"isAnimateToTop": false,
	"inDeepLinking": true
},
{
	"action": "filter",
	"name": "lifestyle-btn",
	"type": "button-filter",
	"data": {
		"path": ".lifestyle",
		"filterType": "",
		"selected": false
	},
	"inStorage": true,
	"inAnimation": true,
	"isAnimateToTop": false,
	"inDeepLinking": true
},
{
	"action": "filter",
	"name": "desc-filter",
	"type": "textbox",
	"data": {
		"path": ".desc",
		"ignore": "[~!@#$%^&*()+=`'\"/\\_]+",
		"value": "",
		"filterType": "TextFilter"
	},
	"inStorage": true,
	"inAnimation": true,
	"isAnimateToTop": false,
	"inDeepLinking": true
},
{
	"action": "filter",
	"name": "desc-filter",
	"type": "textbox",
	"data": {
		"path": ".desc1",
		"ignore": "",
		"value": "",
		"filterType": "TextFilter"
	},
	"inStorage": true,
	"inAnimation": true,
	"isAnimateToTop": false,
	"inDeepLinking": true
}
];

/**
* Get statuses by action
*/
QUnit.test('getStatusesByAction - test 1', function(assert){

	var options = {}, observer = {};
	
	var statusesOfAction = jQuery.fn.jplist.StatusesService.getStatusesByAction('filter', statuses);
	assert.ok(statusesOfAction.length === 8);
});

QUnit.test('getStatusesByAction - test 2', function(assert){

	var options = {}, observer = {};
	
	var statusesOfAction = jQuery.fn.jplist.StatusesService.getStatusesByAction('sort', statuses);
	assert.ok(statusesOfAction.length === 1);
});

/**
* add - the status has the same name and type, but different content
* in this case the first added status wins - is it right behavior??
*/
QUnit.test('add - if status has the same name and the same type -> ignore it', function(assert){

	var options = {}, observer = {};
	var collection = statuses.slice();

	var newStatus = {
		"action": "paging",
		"name": "paging",
		"type": "pagination",
		"data": {
			"number": "5",
			"currentPage": "0",
			"paging": {
				"itemsNumber": 6,
				"itemsOnPage": 10,
				"pagesNumber": 1,
				"currentPage": 0,
				"start": 0,
				"end": 6,
				"prevPage": 0,
				"nextPage": 0
			}
		},
		"inStorage": true,
		"inAnimation": true,
		"isAnimateToTop": true,
		"inDeepLinking": true
	};

    jQuery.fn.jplist.StatusesService.add(collection, newStatus, false);

	assert.ok(collection[0].data.number == 10);
});

/**
* add 
* the extend merges  data.paging objects too (because they are not arrays)

QUnit.test('add - check if currentPage and number are combined', function(assert){

	var options = {}, observer = {};	
	var statuses = [
		{
			"action": "paging",
			"name": "paging",
			"type": "pagination",
			"data": {
				"currentPage": "0",
				"paging": {
					"itemsNumber": 6,
					"itemsOnPage": 10,
					"pagesNumber": 1,
					"start": 0,
					"end": 6,
					"prevPage": 0,
					"nextPage": 0
				}
			},
			"inStorage": true,
			"inAnimation": true,
			"isAnimateToTop": true,
			"inDeepLinking": true
		}
	];
	var collection = statuses.slice();
	
	var newStatus = {
		"action": "paging",
		"name": "paging",
		"type": "items-per-page-drop-down",
		"data": {
			"number": "5",
			"paging": {
				"itemsNumber": 6,
				"itemsOnPage": 10,
				"pagesNumber": 1,
				"currentPage": 1,
				"start": 0,
				"end": 6,
				"prevPage": 0,
				"nextPage": 0
			}
		},
		"inStorage": true,
		"inAnimation": true,
		"isAnimateToTop": true,
		"inDeepLinking": true
	};

    jQuery.fn.jplist.StatusesService.add(collection, newStatus, false);
	assert.ok(collection[0].data.paging.currentPage === 1);
});
 */

/**
* add 

QUnit.test('add - check if currentPage and number are combined', function(assert){

	var options = {}, observer = {};	
	var statuses = [
		{
			"action": "paging",
			"name": "paging",
			"type": "pagination",
			"data": {
				"currentPage": "1"
			},
			"inStorage": true,
			"inAnimation": true,
			"isAnimateToTop": true,
			"inDeepLinking": true
		}
	];
	
	var newStatus = {
		"action": "paging",
		"name": "paging",
		"type": "items-per-page-drop-down",
		"data": {
			"number": "5"
		},
		"inStorage": true,
		"inAnimation": true,
		"isAnimateToTop": true,
		"inDeepLinking": true
	};

    jQuery.fn.jplist.StatusesService.add(statuses, newStatus, false);
	assert.ok(statuses[0].data.number === '5' && statuses[0].data.currentPage === '1');
});
 */

QUnit.test('add new textbox filter status (with force) to the existing statuses with sort and filter', function(assert){

    var options = {}, observer = {};

    var collection = [
        {
            "action": "sort",
            "name": "sort",
            "type": "sort-drop-down",
            "data": {
                "order": "desc",
                "ignore": "",
                "path": ".title",
                "type": "text",
                "dateTimeFormat": "{month}/{day}/{year}"
            },
            "inStorage": true,
            "inAnimation": true,
            "isAnimateToTop": false,
            "inDeepLinking": true
        },
        {
            "action": "filter",
            "name": "title-filter",
            "type": "textbox",
            "data": {
                "path": ".title",
                "ignore": "[~!@#$%^&*()+=`'\"/\\_]+",
                "value": "aaa",
                "filterType": "TextFilter"
            },
            "inStorage": true,
            "inAnimation": true,
            "isAnimateToTop": false,
            "inDeepLinking": true
        }
    ];

    var newStatus = {
        "action": "filter",
        "name": "title-filter",
        "type": "textbox",
        "data": {
            "path": ".title",
            "ignore": "[~!@#$%^&*()+=`'\"/\\_]+",
            "value": "bbb",
            "filterType": "TextFilter"
        },
        "inStorage": true,
        "inAnimation": true,
        "isAnimateToTop": false,
        "inDeepLinking": true
    };

    jQuery.fn.jplist.StatusesService.add(collection, newStatus, true);

    assert.ok(collection.length === 2 && collection[1].data.value === 'bbb');
});


QUnit.test('add new sort status (with force) to the existing statuses with sort and filter', function(assert){

    var options = {}, observer = {};

    var collection = [
        {
            "action": "sort",
            "name": "sort",
            "type": "sort-drop-down",
            "data": {
                "order": "desc",
                "ignore": "",
                "path": ".title",
                "type": "text",
                "dateTimeFormat": "{month}/{day}/{year}"
            },
            "inStorage": true,
            "inAnimation": true,
            "isAnimateToTop": false,
            "inDeepLinking": true
        },
        {
            "action": "filter",
            "name": "title-filter",
            "type": "textbox",
            "data": {
                "path": ".title",
                "ignore": "[~!@#$%^&*()+=`'\"/\\_]+",
                "value": "aaa",
                "filterType": "TextFilter"
            },
            "inStorage": true,
            "inAnimation": true,
            "isAnimateToTop": false,
            "inDeepLinking": true
        }
    ];

    var newStatus = {
        "action": "sort",
        "name": "sort",
        "type": "sort-drop-down",
        "data": {
            "order": "asc",
            "ignore": "",
            "path": ".title",
            "type": "text",
            "dateTimeFormat": "{month}/{day}/{year}"
        },
        "inStorage": true,
        "inAnimation": true,
        "isAnimateToTop": false,
        "inDeepLinking": true
    };

    jQuery.fn.jplist.StatusesService.add(collection, newStatus, true);

    assert.ok(collection.length === 2 && collection[0].data.order === 'asc');
});

/*
{
    "options": {
        "debug": true,
        "command": "init",
        "commandData": {},
        "itemsBox": ".list",
        "itemPath": ".list-item",
        "panelPath": ".jplist-panel",
        "noResults": ".jplist-no-results",
        "redrawCallback": "",
        "iosBtnPath": ".jplist-ios-button",
        "animateToTop": "html, body",
        "animateToTopDuration": 0,
        "effect": "",
        "duration": 300,
        "fps": 24,
        "storage": "",
        "storageName": "jplist",
        "cookiesExpiration": -1,
        "deepLinking": true,
        "hashStart": "#",
        "delimiter0": ":",
        "delimiter1": "|",
        "delimiter2": "~",
        "delimiter3": "!",
        "historyLength": 10,
        "dataSource": {
            "type": "html",
            "server": {
                "ajax": {
                    "url": "server.php",
                    "dataType": "html",
                    "type": "POST"
                },
                "serverOkCallback": null,
                "serverErrorCallback": null
            },
            "render": null
        }
    },
    "observer": {
        "0": {},
        "length": 1,
        "options": {
            "debug": true,
            "command": "init",
            "commandData": {},
            "itemsBox": ".list",
            "itemPath": ".list-item",
            "panelPath": ".jplist-panel",
            "noResults": ".jplist-no-results",
            "redrawCallback": "",
            "iosBtnPath": ".jplist-ios-button",
            "animateToTop": "html, body",
            "animateToTopDuration": 0,
            "effect": "",
            "duration": 300,
            "fps": 24,
            "storage": "",
            "storageName": "jplist",
            "cookiesExpiration": -1,
            "deepLinking": true,
            "hashStart": "#",
            "delimiter0": ":",
            "delimiter1": "|",
            "delimiter2": "~",
            "delimiter3": "!",
            "historyLength": 10,
            "dataSource": {
                "type": "html",
                "server": {
                    "ajax": {
                        "url": "server.php",
                        "dataType": "html",
                        "type": "POST"
                    },
                    "serverOkCallback": null,
                    "serverErrorCallback": null
                },
                "render": null
            }
        },
        "$root": {
            "0": {
                "jQuery11000976094182814394": 96
            },
            "context": {
                "jQuery11000976094182814394": 96
            },
            "length": 1
        },
        "events": {
            "init": "1",
            "unknownStatusesChanged": "2",
            "knownStatusesChanged": "3",
            "statusChanged": "4",
            "statusesChangedByDeepLinks": "5",
            "listSorted": "6",
            "listFiltered": "7",
            "listPaginated": "8",
            "dataItemAdded": "9",
            "dataItemRemoved": "10",
            "collectionReadyEvent": "11",
            "statusesAppliedToList": "12",
            "animationStartEvent": "13",
            "animationStepEvent": "14",
            "animationCompleteEvent": "15"
        }
    },
    "statuses": [
        {
            "action": "paging",
            "name": "paging",
            "type": "pagination",
            "data": {
                "number": "10",
                "currentPage": "0",
                "paging": {
                    "itemsNumber": 6,
                    "itemsOnPage": 10,
                    "pagesNumber": 1,
                    "currentPage": 0,
                    "start": 0,
                    "end": 6,
                    "prevPage": 0,
                    "nextPage": 0
                }
            },
            "inStorage": true,
            "inAnimation": true,
            "isAnimateToTop": true,
            "inDeepLinking": true
        },
        {
            "action": "sort",
            "name": "sort",
            "type": "sort-drop-down",
            "data": {
                "path": ".desc",
                "type": "text",
                "order": "asc",
                "dateTimeFormat": "{month}/{day}/{year}",
                "ignore": ""
            },
            "inStorage": true,
            "inAnimation": true,
            "isAnimateToTop": true,
            "inDeepLinking": true
        },
        {
            "action": "filter",
            "name": "title-filter",
            "type": "textbox",
            "data": {
                "path": ".title",
                "ignore": "[~!@#$%^&*()+=`'\"/\\_]+",
                "value": "",
                "filterType": "TextFilter"
            },
            "inStorage": true,
            "inAnimation": true,
            "isAnimateToTop": false,
            "inDeepLinking": true
        },
        {
            "action": "filter",
            "name": "desc-filter",
            "type": "textbox",
            "data": {
                "path": ".desc",
                "ignore": "[~!@#$%^&*()+=`'\"/\\_]+",
                "value": "",
                "filterType": "TextFilter"
            },
            "inStorage": true,
            "inAnimation": true,
            "isAnimateToTop": false,
            "inDeepLinking": true
        },
        {
            "action": "filter",
            "name": "architecture-btn",
            "type": "button-filter",
            "data": {
                "path": ".architecture",
                "filterType": "path",
                "selected": true
            },
            "inStorage": true,
            "inAnimation": true,
            "isAnimateToTop": false,
            "inDeepLinking": true
        },
        {
            "action": "filter",
            "name": "christmas-btn",
            "type": "button-filter",
            "data": {
                "path": ".christmas",
                "filterType": "",
                "selected": false
            },
            "inStorage": true,
            "inAnimation": true,
            "isAnimateToTop": false,
            "inDeepLinking": true
        },
        {
            "action": "filter",
            "name": "nature-btn",
            "type": "button-filter",
            "data": {
                "path": ".nature",
                "filterType": "",
                "selected": false
            },
            "inStorage": true,
            "inAnimation": true,
            "isAnimateToTop": false,
            "inDeepLinking": true
        },
        {
            "action": "filter",
            "name": "lifestyle-btn",
            "type": "button-filter",
            "data": {
                "path": ".lifestyle",
                "filterType": "",
                "selected": false
            },
            "inStorage": true,
            "inAnimation": true,
            "isAnimateToTop": false,
            "inDeepLinking": true
        }
    ]
}
*/
var customReporter = require('./custom-reporter.js');

exports.config = {
    
    //
    // ==================
    // Specify Test Files
    // ==================
    // Define which test specs should run. The pattern is relative to the directory
    // from which `wdio` was called. Notice that, if you are calling `wdio` from an
    // NPM script (see https://docs.npmjs.com/cli/run-script) then the current working
    // directory is where your package.json resides, so `wdio` will be called from there.
    //
    specs: [
        './test/selenium-tests/specs/**/*.js'
    ],

    suites: {

        //wdio ./test/selenium-tests/wdio.conf.js --suite=temp
        temp: [
            './test/selenium-tests/specs/4-pagination-items-per-page.js'
        ]

        //wdio ./test/selenium-tests/wdio.conf.js --suite=api
        ,api: [
            './test/selenium-tests/specs/8-api.js'
        ]

        //wdio ./test/selenium-tests/wdio.conf.js --suite=sort
        ,sort: [
            './test/selenium-tests/specs/1-hidden-sort.js'
            ,'./test/selenium-tests/specs/1-initial-sort-order.js'
            ,'./test/selenium-tests/specs/2-text-filter-with-sort-dd.js'
            ,'./test/selenium-tests/specs/3-sort-bootstrap.js'
            ,'./test/selenium-tests/specs/3-sort-dropdown.js'
            ,'./test/selenium-tests/specs/3-sort-select.js'
            ,'./test/selenium-tests/specs/3-sort-buttons.js'
        ]

        //wdio ./test/selenium-tests/wdio.conf.js --suite=bootpaging
        ,bootpaging: [
            './test/selenium-tests/specs/4-bootstrap-pagination.js'
            ,'./test/selenium-tests/specs/4-bootstrap-pagination-exclude-localstorage.js'
            ,'./test/selenium-tests/specs/4-bootstrap-pagination-exclude-localstorage-2.js'
            ,'./test/selenium-tests/specs/4-bootstrap-pagination-exclude-storage-php.js'
            ,'./test/selenium-tests/specs/4-bootstrap-pagination-exclude-storage-php-2.js'
            ,'./test/selenium-tests/specs/4-bootstrap-pagination-localstorage.js'
            ,'./test/selenium-tests/specs/4-bootstrap-pagination-php-mysql.js'
            ,'./test/selenium-tests/specs/4-bootstrap-pagination-storage-php-mysql.js'
        ]

        //wdio ./test/selenium-tests/wdio.conf.js --suite=paging
        ,paging: [
            './test/selenium-tests/specs/4-pagination.js'
            ,'./test/selenium-tests/specs/4-pagination-deep-links.js'
            ,'./test/selenium-tests/specs/4-pagination-deep-links-2.js'
            ,'./test/selenium-tests/specs/4-pagination-exclude-localstorage.js'
            ,'./test/selenium-tests/specs/4-pagination-exclude-localstorage-2.js'
            ,'./test/selenium-tests/specs/4-pagination-items-per-page.js'
            ,'./test/selenium-tests/specs/4-pagination-items-per-page-select.js'
            ,'./test/selenium-tests/specs/4-pagination-localstorage.js'
            ,'./test/selenium-tests/specs/4-pagination-with-sort.js'
        ]

        //wdio ./test/selenium-tests/wdio.conf.js --suite=ddfilter
        ,ddfilter: [
            './test/selenium-tests/specs/5-filter-dropdown-bootstrap.js',
            './test/selenium-tests/specs/5-filter-dropdown.js',
            './test/selenium-tests/specs/5-filter-select.js'
        ]
    },
    // Patterns to exclude.
    exclude: [
        // 'path/to/excluded/files'
    ],
    //
    // ============
    // Capabilities
    // ============
    // Define your capabilities here. WebdriverIO can run multiple capabilities at the same
    // time. Depending on the number of capabilities, WebdriverIO launches several test
    // sessions. Within your capabilities you can overwrite the spec and exclude options in
    // order to group specific specs to a specific capability.
    //
    // First, you can define how many instances should be started at the same time. Let's
    // say you have 3 different capabilities (Chrome, Firefox, and Safari) and you have
    // set maxInstances to 1; wdio will spawn 3 processes. Therefore, if you have 10 spec
    // files and you set maxInstances to 10, all spec files will get tested at the same time
    // and 30 processes will get spawned. The property handles how many capabilities
    // from the same test should run tests.
    //
    capabilities: [{
        browserName: 'firefox'
        //chromeOptions: {
        //    args: ['disable-web-security'],
        //    //'chrome.binary': '/Users/miriam/Documents/codelib/jplist/jplist/build/selenium/chromedriver',
        //    'binary': '/Users/miriam/Documents/codelib/jplist/jplist/build/selenium/chromedriver'
        //}

        //'chromeOptions.binary': '/Users/miriam/Documents/codelib/jplist/jplist/build/selenium/chromedriver',
        //'chrome.binary': '/Users/miriam/Documents/codelib/jplist/jplist/build/selenium/chromedriver'
    }],
    maxInstances: 3,
    //
    // ===================
    // Test Configurations
    // ===================
    // Define all options that are relevant for the WebdriverIO instance here
    //
    // By default WebdriverIO commands are executed in a synchronous way using
    // the wdio-sync package. If you still want to run your tests in an async way
    // e.g. using promises you can set the sync option to false.
    sync: true,
    //
    // Level of logging verbosity: silent | verbose | command | data | result | error
    logLevel: 'silent',
    //
    // Enables colors for log output.
    coloredLogs: true,
    //
    // Saves a screenshot to a given path if a command fails.
    screenshotPath: './errorShots/',
    //
    // Set a base URL in order to shorten url command calls. If your url parameter starts
    // with "/", then the base url gets prepended.
    baseUrl: 'http://jplist.local',
    //
    // Default timeout for all waitFor* commands.
    waitforTimeout: 90000,
    //
    // Default timeout in milliseconds for request
    // if Selenium Grid doesn't send response
    connectionRetryTimeout: 90000,
    //
    // Default request retries count
    connectionRetryCount: 3,
    //
    // Initialize the browser instance with a WebdriverIO plugin. The object should have the
    // plugin name as key and the desired plugin options as properties. Make sure you have
    // the plugin installed before running any tests. The following plugins are currently
    // available:
    // WebdriverCSS: https://github.com/webdriverio/webdrivercss
    // WebdriverRTC: https://github.com/webdriverio/webdriverrtc
    // Browserevent: https://github.com/webdriverio/browserevent
    // plugins: {
    //     webdrivercss: {
    //         screenshotRoot: 'my-shots',
    //         failedComparisonsRoot: 'diffs',
    //         misMatchTolerance: 0.05,
    //         screenWidth: [320,480,640,1024]
    //     },
    //     webdriverrtc: {},
    //     browserevent: {}
    // },
    //
    // Test runner services
    // Services take over a specific job you don't want to take care of. They enhance
    // your test setup with almost no effort. Unlike plugins, they don't add new
    // commands. Instead, they hook themselves up into the test process.
    // services: [],//
    // Framework you want to run your specs with.
    // The following are supported: Mocha, Jasmine, and Cucumber
    // see also: http://webdriver.io/guide/testrunner/frameworks.html
    //
    // Make sure you have the wdio adapter package for the specific framework installed
    // before running any tests.
    framework: 'jasmine',

    // Test reporter for stdout.
    // The following are supported: dot (default), spec, and xunit
    // see also: http://webdriver.io/guide/testrunner/reporters.html
    reporters: [customReporter],

    // Options to be passed to Jasmine.
    jasmineNodeOpts: {
        //
        // Jasmine default timeout
        defaultTimeoutInterval: 10000,
        //
        // The Jasmine framework allows interception of each assertion in order to log the state of the application
        // or website depending on the result. For example, it is pretty handy to take a screenshot every time
        // an assertion fails.
        expectationResultHandler: function(passed, assertion) {
            // do something
        }
    },
    
    //
    // =====
    // Hooks
    // =====
    // WedriverIO provides several hooks you can use to interfere with the test process in order to enhance
    // it and to build services around it. You can either apply a single function or an array of
    // methods to it. If one of them returns with a promise, WebdriverIO will wait until that promise got
    // resolved to continue.
    //
    // Gets executed once before all workers get launched.
    // onPrepare: function (config, capabilities) {
    // },
    //
    // Gets executed before test execution begins. At this point you can access all global
    // variables, such as `browser`. It is the perfect place to define custom commands.
    // before: function (capabilities, specs) {
    // },
    //
    // Hook that gets executed before the suite starts
    // beforeSuite: function (suite) {
    // },
    //
    // Hook that gets executed _before_ a hook within the suite starts (e.g. runs before calling
    // beforeEach in Mocha)
    // beforeHook: function () {
    // },
    //
    // Hook that gets executed _after_ a hook within the suite starts (e.g. runs after calling
    // afterEach in Mocha)
    // afterHook: function () {
    // },
    //
    // Function to be executed before a test (in Mocha/Jasmine) or a step (in Cucumber) starts.
    // beforeTest: function (test) {
    // },
    //
    // Runs before a WebdriverIO command gets executed.
    // beforeCommand: function (commandName, args) {
    // },
    //
    // Runs after a WebdriverIO command gets executed
    // afterCommand: function (commandName, args, result, error) {
    // },
    //
    // Function to be executed after a test (in Mocha/Jasmine) or a step (in Cucumber) starts.
    // afterTest: function (test) {
    // },
    //
    // Hook that gets executed after the suite has ended
    // afterSuite: function (suite) {
    // },
    //
    // Gets executed after all tests are done. You still have access to all global variables from
    // the test.
    // after: function (capabilities, specs) {
    // },
    //
    // Gets executed after all workers got shut down and the process is about to exit. It is not
    // possible to defer the end of the process using a promise.
    // onComplete: function(exitCode) {
    // }
}

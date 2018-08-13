var assert = require('assert');

describe('click on page #2 (top)', function() {

    beforeAll(function(done){

        browser.url('http://jplist.local/test/pages/4-bootstrap-pagination-storage-php-mysql.php')
            .click('(//li[@data-type="page"][@data-number="1"])[1]/a')
            .refresh()
            .pause(500)
            .call(done);
    });

    afterAll(function(done){

        browser.end(done);
    });

    it('top selected item should be #2', function(done){

        expect(browser.getText('(//li[@class="jplist-current active"])[1]/a')).toBe('2');
        browser.call(done);
    });

    it('bottom selected item should be #2', function(done){

        expect(browser.getText('(//li[@class="jplist-current active"])[2]/a')).toBe('2');
        browser.call(done);
    });

    it('item #1 should have title Calendar', function (done) {

        expect(browser.getText('(//div[@class="list-item"]//p[@class="title"])[1]')).toBe('Calendar');
        browser.call(done);
    });

    it('item #2 should have title Car', function (done) {

        expect(browser.getText('(//div[@class="list-item"]//p[@class="title"])[2]')).toBe('Car');
        browser.call(done);
    });

    it('item #3 should have title Christmas', function (done) {

        expect(browser.getText('(//div[@class="list-item"]//p[@class="title"])[3]')).toBe('Christmas');
        browser.call(done);
    });

    it('item #4 should have title Christmas Tree', function (done) {

        expect(browser.getText('(//div[@class="list-item"]//p[@class="title"])[4]')).toBe('Christmas Tree');
        browser.call(done);
    });

    it('item #5 should have title City', function (done) {

        expect(browser.getText('(//div[@class="list-item"]//p[@class="title"])[5]')).toBe('City');
        browser.call(done);
    });
});

describe('click on page #3 (bottom)', function() {

    beforeAll(function(done){

        browser.url('http://jplist.local/test/pages/4-bootstrap-pagination-storage-php-mysql.php')
            .click('(//li[@data-type="page"][@data-number="2"])[2]/a')
            .refresh()
            .pause(500)
            .call(done);
    });

    afterAll(function(done){

        browser.end(done);
    });

    it('top selected item should be #3', function(done){

        expect(browser.getText('(//li[@class="jplist-current active"])[1]')).toBe('3');
        browser.call(done);
    });

    it('bottom selected item should be #3', function(done){

        expect(browser.getText('(//li[@class="jplist-current active"])[2]')).toBe('3');
        browser.call(done);
    });

    it('item #1 should have title Capital City', function (done) {

        expect(browser.getText('(//div[@class="list-item"]//p[@class="title"])[1]')).toBe('Capital City');
        browser.call(done);
    });

    it('item #2 should have title Coffee', function (done) {

        expect(browser.getText('(//div[@class="list-item"]//p[@class="title"])[2]')).toBe('Coffee');
        browser.call(done);
    });

    it('item #3 should have title Coins', function (done) {

        expect(browser.getText('(//div[@class="list-item"]//p[@class="title"])[3]')).toBe('Coins');
        browser.call(done);
    });

    it('item #4 should have title Crayons', function (done) {

        expect(browser.getText('(//div[@class="list-item"]//p[@class="title"])[4]')).toBe('Crayons');
        browser.call(done);
    });

    it('item #5 should have title Cupcakes', function (done) {

        expect(browser.getText('(//div[@class="list-item"]//p[@class="title"])[5]')).toBe('Cupcakes');
        browser.call(done);
    });

});
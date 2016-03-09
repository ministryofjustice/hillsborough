var request = require('superagent');
var url = 'http://localhost';
var expect = require('chai').expect;

describe('Homepage', function () {
    it('should get root ok', function (done) {
        request.get(url).end(function(error, response){
            expect(response.status).to.equal(200);
            done();
        });
    });
});

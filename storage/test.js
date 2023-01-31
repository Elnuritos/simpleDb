const xml = require('xml-pdf');
var options = {};
//console.log('Current directory: ' + process.cwd());
xml.xmlpdf('/app/public/storage/test.xml', '/app/public/storage/test.pdf', '/app/public/storage/test.pdf', options, function (error, response) {
    if (error) {
      console.log(error);
    } else {
     return response;
    }

});

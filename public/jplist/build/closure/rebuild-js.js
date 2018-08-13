var compile = require('./compile.js');

if(!process.argv || process.argv.length < 3){
    console.log('ERROR: config.js file is not specified.');
    return;
}

var configPath = process.argv[2];
var additionalArgs = process.argv[3];
compile(configPath, additionalArgs);
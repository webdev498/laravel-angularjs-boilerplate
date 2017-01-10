'use strict';

require('./app/controller.js');
require('./app/service.js');

var passwordApp = angular.module('passwordApp', ['controller', 'service', 'ui.bootstrap']);

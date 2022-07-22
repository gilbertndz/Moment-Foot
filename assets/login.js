import './styles/login.scss';

// start the Stimulus application
import './bootstrap';

//import Bootstrap

import { Tooltip, Toast, Popover } from 'bootstrap';

const $ = require('jquery');

require('bootstrap');

$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});
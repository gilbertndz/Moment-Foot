/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';

// import Bootstrap

import { Tooltip, Toast, Popover } from 'bootstrap';

const $ = require('jquery');

require('bootstrap');

$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});

// home page cards

const elements = Array.from(document.querySelectorAll('.fill'));

function fill(item, index) {
  
  const bgColor = getComputedStyle(item).backgroundColor,
  fillLayer = document.createElement('div');
  fillLayer.classList.add('fill-layer');
  item.style.backgroundColor = 'transparent';
  item.style.position = 'relative';
  item.style.overflow = 'hidden';
  setTimeout(function() {
    fillLayer.style.backgroundColor = bgColor;  
    item.appendChild(fillLayer);
  }, index * 1000);
  
}

elements.forEach(fill);
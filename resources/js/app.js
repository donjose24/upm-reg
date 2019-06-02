/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
var $ = require('jquery');

$(document).ready(function () {
    checkSelectedOption();
    $('#is_student').change(function () {
        checkSelectedOption();
    })
})

function checkSelectedOption()
{
    if ($('#is_student').val() == 0) {
        $('#workingInfo').show();
        $('#studentInfo').hide();
    } else {
        $('#studentInfo').show();
        $('#workingInfo').hide();
    }
}

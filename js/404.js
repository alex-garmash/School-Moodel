$(function() {

    var i = 10;
    window.setInterval(function () {
      i--;
    $('h1 > span')[0].innerText ="in " + i + " seconds";
    },1000);
    window.setTimeout(function() {
        window.location.href = '/theschool/login';
    }, 10000);
});
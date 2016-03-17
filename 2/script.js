//
// разработать чат с Ботом. 
// Бот реализован в скрипте ajax.php
// (если у Вас есть опыт разработки на php, то можете модифицировать логику Бота)
// Вся переписка должна добавляться в окно. Реплики пользователя и Бота
// должны отличаться по оформлению, чтобы диалог было удобно читать.
// 
// можно использовать как непосредственно XMLHttpRequest, так и jQuery
//

function wrap (text, sender, time) {
    var date = new Date();
   // (date.getMinutes()<10?'0':'') + date.getMinutes();
    var minutes = date.getMinutes();
minutes = minutes > 9 ? minutes : '0' + minutes;
var seconds = date.getSeconds();
seconds = seconds > 9 ? seconds : '0' + seconds;
var hours = date.getHours();
hours = date.getHours() > 9 ? hours : '0' + hours;
    
var time = ' '+ hours +':'+minutes+':'+seconds;

    return $('<li>').text(sender + ': ' + text + time);
}
  
    
function aj () {
  var input = $('#inpText');
    var block = $('#divResult');
    var button = $('#btnRun');
 
 
    input.keydown (function (e) {
        if (e.keyCode > 47 && e.keyCode < 58 || e.keyCode > 95 && e.keyCode < 106 || e.keyCode === 86 && e.ctrlKey === true && e.altKey === false && e.shiftKey === false) {
            return false;
        }
    })
    
    
    
    if (input.val() == '') {
        alert ('enter text!');
      return false;
    }
    
    $.ajax (
    {
            url: 'ajax.php',
            data: {input: input.val()},
            beforeSend: function () {
                block.prepend(wrap(input.val(), 'you').addClass ('you'));
            },
            success: function (e) {
                block.prepend (wrap(e, 'bot').addClass ('bot').fadeIn(1000));
            },
            complete: function () {
                input.val('').focus();
            }
        });
}

function send () {
    var input = $('#inpText');
    var block = $('#divResult');
    var button = $('#btnRun');
    
    button.click (function() {
        aj();
    });
    
    input.keydown(function(e){
        if (e.keyCode == 13) {
            aj();
        }
    })
}
$(document).ready(send);
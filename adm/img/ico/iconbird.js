$(document).ready(function(){
$('#n24').click(function(){
$.cookie("num","0");
var el = document.getElementById("n24"); el.style.cssText="background-position: -4px -33px;"; 
var el = document.getElementById("n36"); el.style.cssText="background-position: -22px -3px;"; 
var el = document.getElementById("n48"); el.style.cssText="background-position: -40px -3px;"; 
});
$('#n36').click(function(){
$.cookie("num","1");
var el = document.getElementById("n24"); el.style.cssText="background-position: -4px -3px;"; 
var el = document.getElementById("n36"); el.style.cssText="background-position: -22px -33px;"; 
var el = document.getElementById("n48"); el.style.cssText="background-position: -40px -3px;"; 
});
$('#n48').click(function(){
$.cookie("num","2");
var el = document.getElementById("n24"); el.style.cssText="background-position: -4px -3px;"; 
var el = document.getElementById("n36"); el.style.cssText="background-position: -22px -3px;"; 
var el = document.getElementById("n48"); el.style.cssText="background-position: -40px -33px;"; 
});

$('#s4').click(function(){$.cookie("colora","0");});
$('#all').click(function(){$.cookie("size","0");document.getElementById("sizer").innerHTML='Все';});
$('#s2').click(function(){$.cookie("size","0");document.getElementById("sizer").innerHTML='Все';});
$('#s12').click(function(){$.cookie("size","12");document.getElementById("sizer").innerHTML='12px';});
$('#s16').click(function(){$.cookie("size","16");document.getElementById("sizer").innerHTML='16px';});
$('#s24').click(function(){$.cookie("size","24");document.getElementById("sizer").innerHTML='24px';});
$('#s32').click(function(){$.cookie("size","32");document.getElementById("sizer").innerHTML='32px';});
$('#s48').click(function(){$.cookie("size","48");document.getElementById("sizer").innerHTML='48px';});
$('#s64').click(function(){$.cookie("size","64");document.getElementById("sizer").innerHTML='64px';});
$('#s128').click(function(){$.cookie("size","128");document.getElementById("sizer").innerHTML='128px';});
$('#s256').click(function(){$.cookie("size","256");document.getElementById("sizer").innerHTML='256px';});
$('#s512').click(function(){$.cookie("size","512");document.getElementById("sizer").innerHTML='512px';});



$('#co0').click(function(){$.cookie("colora","0");});
$('#co1').click(function(){$.cookie("colora","1");});
$('#co2').click(function(){$.cookie("colora","2");});
$('#co3').click(function(){$.cookie("colora","3");});
$('#co4').click(function(){$.cookie("colora","4");});
$('#co5').click(function(){$.cookie("colora","5");});
$('#co6').click(function(){$.cookie("colora","6");});
$('#co7').click(function(){$.cookie("colora","7");});
$('#co8').click(function(){$.cookie("colora","8");});
$('#co9').click(function(){$.cookie("colora","9");});
$('#co10').click(function(){$.cookie("colora","10");});
$('#co11').click(function(){$.cookie("colora","11");});
$('#co12').click(function(){$.cookie("colora","12");});
$('#co13').click(function(){$.cookie("colora","13");});

$('#white').click(function(){
$.cookie("color","0");
$('div#fuck').removeClass('proz').addClass('white');
$('div#fuck').removeClass('black').addClass('white');
var el = document.getElementById("white"); el.style.cssText="background-position: -58px -33px;"; 
var el = document.getElementById("proz"); el.style.cssText="background-position: -76px -3px;"; 
var el = document.getElementById("black"); el.style.cssText="background-position: -94px -3px;"; 
});
$('#proz').click(function(){
$.cookie("color","1");
$('div#fuck').removeClass('whire').addClass('proz');
$('div#fuck').removeClass('black').addClass('proz');
var el = document.getElementById("white"); el.style.cssText="background-position: -58px -3px;"; 
var el = document.getElementById("proz"); el.style.cssText="background-position: -76px -33px;"; 
var el = document.getElementById("black"); el.style.cssText="background-position: -94px -3px;"; 
});
$('#black').click(function(){
$.cookie("color","2");
$('div#fuck').removeClass('whire').addClass('black');
$('div#fuck').removeClass('proz').addClass('black');
var el = document.getElementById("white"); el.style.cssText="background-position: -58px -3px;"; 
var el = document.getElementById("proz"); el.style.cssText="background-position: -76px -3px;"; 
var el = document.getElementById("black"); el.style.cssText="background-position: -94px -33px;"; 
});

var cooka = $.cookie('color');
if(cooka==1){ 
$('div#fuck').removeClass('whire').addClass('proz');
$('div#fuck').removeClass('black').addClass('proz');
}
if(cooka==2){
$('div#fuck').removeClass('whire').addClass('black');
$('div#fuck').removeClass('proz').addClass('black');
}

});

$(document).ready(function(){ 
$('.sBgbroswe').click(function(){ 
var clkid = this.id; 
$.ajax({ 
type: "POST",
url: "/my/savelike/",
data: "id="+clkid,
success: function(html){ 
$("#clean").empty();
$("#clean").append(html);
}
});
return false; 
});
});
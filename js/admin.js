function feedbackAjax(){
var formData = new FormData($('#dobbooks')[0]);
$.ajax({
      type: "POST",
      processData: false,
      contentType: false,
      url: "admin/dobtovar.php",
      data: formData 
      })
      .done(function(data) {
           if(data=='добавлен'){
         $('#status').html(data);
	document.forms['dob'].reset();}
  else{
      $('#status').html(data);}           
      });  
  }
  function dobnewsing(){
var formData = new FormData($('#dobnews')[0]);
$.ajax({
      type: "POST",
      processData: false,
      contentType: false,
      url: "admin/dobnews.php",
      data: formData 
      })
      .done(function(data) {
           if(data=='добавлен'){
        $('#status').html('Новость добавлена');
	document.forms['dobnews'].reset();}
  else{
      $('#status').html(data);}           
      });  
  }
 function soxtovar(){
var formData = new FormData($('#redactirovanietovara')[0]);
$.ajax({
      type: "POST",
      processData: false,
      contentType: false,
      url: "admin/redactovar.php",
      data: formData 
      })
      .done(function(data) {
      $('#status').html(data);           
      });  
  }
$(".otsuv").on("dblclick",function(){
    $.post("admin/redaccomment.php",
    {
        otzuv:$(this).prop("value"),
        idcom:$(this).attr("ih")
    },
   function(data) {
      $('#tyt').html(data);           
      });
     });
     
     $(".ydalcomm").on("click",function(){
    $.post("admin/ydalcomm.php",
    {
        idcom:$(this).attr("but")
    },
   function(data) {
      $('#tyt').html(data);           
      });
     });
$("#ydaltovat").on("click",function(){
    $.post("admin/ydaltovat.php",
    {
        id:$(this).attr("but")
    },
   function(data) {
      $('#status').html(data);           
      });
     });
$(".ydaladminmail").on("click",function(){
    $.post("admin/ydalmailadmin.php",
    {
        idadmin:$(this).attr("but")
    },
   function(data) {
      $('#status').html(data);           
      });
     });

$(".pot").on("dblclick",function(){
    $.post("admin/ypravleniazakaz.php",
    {
        nomer:$(this).prop("value"),
        c:$(this).attr("c")
    },
   function(data) {
       alert(data);          
      });
     });
$(".ydalkazak").on("click",function(){
    $.post("admin/ypravleniazakaz.php",
    {
        yop:$(this).attr("yop")
    },
   function(data) {
       alert(data);          
      });
     });
$(".sform").on("click",function(){
    $.post("admin/ypravleniazakaz.php",
    {
        rab:$(this).attr("rab")
    },
   function(data) {
       alert(data);          
      });
     });
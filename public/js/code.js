
$(document).ready(function(){

  /*$.getJSON( "q1.json", function( data ) {
    var items = [];
    $.each( data, function( key, val ) {
      items.push( "<li id='" + key + "'>" + val + "</li>" );
    });

    console.log(items);
  });*/

  $('.answer').click(function(){
    //var attr = $(this).attr('data');
    console.log($(this).parent().parent().find(".hidden-answer"));
    
    var item = $(this).parent().parent().find(".hidden-answer");
    $('.hidden-answer').not(item).hide();
    item.toggle();

  });
});

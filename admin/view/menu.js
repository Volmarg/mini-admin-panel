function switchMenu(target){

  //Menu switching
  $('#Panels li').removeClass('active');
  $(target).parent().addClass('active');
  var attr=target.innerHTML;

  //Tabs Switching
  $('[data-type="table-wrapper"]').css('display','none');
  $('[data-id="'+attr+'"]').css('display','block');


}

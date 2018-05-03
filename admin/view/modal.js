var url=window.location.search;
var searchParams = new URLSearchParams(url);
var status=searchParams.get('status');

if(status=='used' || status=='false' || status=='true'){
  showModal();
  setTimeout(removeLoader,3000);
  setTimeout(showText,3100);

}else if(status=='wrong' || status=='logout'){
  showModal();
  setTimeout(showText,0);
}

function showModal(){
  $('#callModal').click();
}

function removeLoader(){
  $('#loader').remove();
}

function showText(){
  $('#infoText').css('display','block');
}

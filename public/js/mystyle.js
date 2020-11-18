$(function(){

	// function autoRefreshPage(){
	// 	console.log('oke');
	// }

    // setInterval(autoRefreshPage, 3);
    
 $('.pass').change(function(){
      var password = $('.Ulangi').val();
      var fix_password = $(this).val();
      
      if(fix_password == password){
        $('#lakukan').removeAttr('disabled', ' ');
        $('.pass').css({'border-color': 'green'});
        $('.ulangi').css({'border-color': 'green'});
      }

      else{
        $('#lakukan').attr('disabled', ' ');
        $('.pass').css({'border-color': 'red'});
        $('.ulangi').css({'border-color': 'red'});
      }

   });
 
	// end jquery 
});
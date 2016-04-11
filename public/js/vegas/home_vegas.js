$(document).ready(function(){
	$.vegas('slideshow', {
	  delay:8000,  //tiempo que dura un background	
	  transition: 'fade2', //fade por default
	  shuffle: true,
	  transitionDuration: 2500, //1000 default	
	  backgrounds:[
	    { src:'img/img-intro/base/IMG_5070.JPG', fade:2000 },  
	    { src:'img/img-intro/base/IMG_2483.JPG', fade:2000 },
	    { src:'img/img-intro/base/IMG_4684.jpg', fade:2000 },
	    { src:'img/img-intro/base/IMG_4357.jpg', fade:2000 }
	  ],
	  //call back function. Se ejecuta después de cambiar de imagen
	  // walk:function(step) {
		 //    alert( 'N°' +step+ ' is now displayed' );
		 //  }
	})('overlay', {
	  src:'overlays/10.png', //hay 15 tramados diferentes del 01.png al 15.png
	  opacity: 1 //100% (0 = 0%)
	});
	//botones
	// $('img').click(function(event){ 
	// 	$.vegas('jump',event.target.id);
	// 	//console.log(event.target.id);
	// });
});
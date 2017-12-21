/**
 * ===============================
 * JS Tabx State
 * Author	: ptr.nov2gmail.com
 * Update	: 21/01/2017
 * Version	: 2.1
 * ===============================
*/

/* Triger Tabx State - Klick Set
* @author piter novian [ptr.nov@gmail.com] 
*/	
	$(document).ready(function() {
		$('#tab-index-formula').click(function(){
			setTimeout(function(){						
				//alert(window.location.href);
				var string_contain = ''; //Set this as your string
				var url = window.location.href.split('#')[1];//.split(location.hash||"#")[0];
				//if(url.indexOf('b')) { //If url contains then...
				// var x = document.getElementsByClassName("#a"); 
					
					//var x = document.getElementsByClassName("your_class"); //Create an array that contains your divs with your_class class
					// for(var a = 0;a<x.length;a++) { //Do some stuff for each value of the array
						// x[a].style.display = 'none';
					// };
					//if(url.indexOf(['a','b']) >= 0) {
						//var x = document.getElementsByClassName("your_class"); //Create an array that contains your divs with your_class class
						// for(var a = 0;a<x.length;a++) { //Do some stuff for each value of the array
							// x[a].style.display = 'none';
						// };
						// var newPathname = "";
						// for (i = 0; i < url.length; i++) {
						  // newPathname += "#";
						  // newPathname += url[i];
						// }
						alert(url);
					//}
					// else if(url.indexOf('#b') >= 0){
						// alert(url.indexOf('#b'));
					// }
				//}
			},100);
		});
	});

/* document.addEventListener('DOMContentLoaded', function(event) {
	$(document).ready(function() {
		$('#tab-index-formula').click(function(){	
			setTimeout(function(){					
				var idx = $('ul li.active').index();
				localStorage.setItem('formula_tab',idx);
				var nilaiValue = localStorage.getItem('formula_tab');
				//console.log(nilaiValue);
				//alert(nilaiValue);
			//	$('#tab-index-formula li').removeClass('active');
				$('#tab-index-formula li').eq(nilaiValue).removeClass('active');
			},1);
		});
	});
});   */


/* Triger Tabx State - Klick Get
* @author piter novian [ptr.nov@gmail.com] 
*/	

/* document.addEventListener('DOMContentLoaded', function(event) {
		//setTimeout(function(){
		var nilaiValue = localStorage.getItem('formula_tab');
		//console.log(nilaiValue);
		$('#tab-index-formula li').removeClass('active');
		//setTimeout(function(){						
			$('#tab-index-formula li').eq(nilaiValue).addClass('active');
		$("#tab-index-formula").tabsX({'enableCache': true});
		//},2);	
		//},2);
	
});  
 */

/*=========================================================================================*/
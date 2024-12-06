window.console = window.console || (function(){
	var c = {}; c.log = c.warn = c.debug = c.info = c.error = c.time = c.dir = c.profile = c.clear = c.exception = c.trace = c.assert = function(){};
	return c;
})();

jQuery(document).ready(function($) {
			
		$("#style-switcher h2 a").click(function(e){
			e.preventDefault();
			var div = $("#style-switcher");
			if (div.css("left") === "-206px") {
				$("#style-switcher").animate({
					left: "0px"
				}); 
			} else {
				$("#style-switcher").animate({
					left: "-206px"
				});
			}
		});
	    $(".btn_layout").click(function(e){
			$(".btn_layout").removeClass('active');
			$(this).addClass('active');
			$.jStorage.set("layout", "wide");
			if( $(this).attr('id') == 'wide'){
				$("body").removeClass("boxed"), 
				$(window).resize();
			} else{
				$.jStorage.set("layout", "boxed");
				$("body").addClass("boxed"),
				$(window).resize();
			}
		});

		$("#layout-switcher").on('change', function() {
			$('#layout').attr('href', $(this).val() + '.css');
		});

		$(".colors li a").click(function(e){
			e.preventDefault();
			/*$(this).parent().parent().find("a").removeClass("active");
			$(this).addClass("active");*/
			
			var colordiv = jQuery(this);
			var color = colordiv.data("color");
			jQuery.ajax({
				type: 'POST',
				url: hotelone_settings.homeUrl + "/wp-admin/admin-ajax.php",
				data: {
					action: 'color_action',
					color: color,
				},
				success: function( data ) {	
					jQuery('#hotelone-color').html(data);
				}
			});
		});
});


function changeCSS(cssFile, Index) {
	//document.getElementsByTagName("link")[Index].setAttribute("href", "css/"+cssFile);
	//return false;
}
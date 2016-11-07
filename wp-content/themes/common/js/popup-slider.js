$(document).ready(function() {
	var isFirst = true;
	var imageClass = 0;
	var active = '';
	var sliderSelector = $('#popup-carousel .carousel-inner');
	showSlider();	
	
	$('.tabs-left a').click(function() {
		clearSlider();
	});
	
	function clearSlider() {
		sliderSelector.empty();
		isFirst = true;
		imageClass = 0;
		removeImageClass();
	}

	function addImageClass() {
		$('.tab-pane.active img').each(function() {
			$(this).addClass('im-' + imageClass);
			imageClass++;
		});
		imageClass = 0;
	}

	function removeImageClass() {
		$('.tab-pane img').each(function() {
			$(this).removeClass();
		});
		imageClass = 0;		
	}

	function showSlider() {		
		$('.tab-pane img').click(function() {
			clearSlider();
			addImageClass();
			addImagesToSLider();			
			$('#slider-popup').modal();
			sliderSelector.find('.'+$(this).attr('class')).parent().siblings().removeClass('active');
			sliderSelector.find('.'+$(this).attr('class')).parent().addClass('active');			
		});
	}

	function addImagesToSLider() {
		$('.tab-pane.active img').each(function() {
			isFirst == true ? active = ' active' : active = '';
	    	isFirst = false;
			sliderSelector.append('<div class="item' + active + '">' + '<img src="' + $(this).attr('src') + '"' + 'class="im-' + imageClass + '"' + '>' + '</div>');
			imageClass++;
		});	
	}
});
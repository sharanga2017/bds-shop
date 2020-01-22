$.fn.pageMe = function(opts) {
	var $this = this,
		defaults = {
			perPage: 10,
			showPrevNext: false,
			hidePageNumbers: false
		},
		settings = $.extend(defaults, opts);

	var listElement = $this;
	var perPage = 6;
	var children = listElement.children();
	var pager = $('.pager');

	if (typeof settings.childSelector != "undefined") {
		children = listElement.find(settings.childSelector);
	}

	if (typeof settings.pagerSelector != "undefined") {
		pager = $(settings.pagerSelector);
	}

	var numItems = children.size();
	var numPages = Math.ceil(numItems / perPage);

	pager.data("curr", 0);

	if (settings.showPrevNext) {
		$('<li><a href="#" class="prev_link">«</a></li>').appendTo(pager);
	}

	var curr = 0;
	// Added class and id in li start
	while (numPages > curr && (settings.hidePageNumbers == false)) {
		$('<li id="pg' + (curr + 1) + '" class="pg"><a href="#" class="page_link">' + (curr + 1) + '</a></li>').appendTo(pager);
		curr++;
	}
	// Added class and id in li end

	if (settings.showPrevNext) {
		$('<li><a href="#" class="next_link">»</a></li>').appendTo(pager);
	}

	pager.find('.page_link:first').addClass('active');
	pager.find('.prev_link').hide();
	if (numPages <= 1) {
		pager.find('.next_link').hide();
	}
	pager.children().eq(1).addClass("active");

	children.hide();
	children.slice(0, perPage).show();
	if (numPages > 5) {
		$('.pg').hide();
		$('#pg1,#pg2,#pg3,#pg4,#pg5').show();
		$("#pg5").after($("<li class='ell'>").html("<span>...</span>"));
	}

	pager.find('li .page_link').click(function() {
		var clickedPage = $(this).html().valueOf() - 1;
		goTo(clickedPage, perPage);
		return false;
	});
	pager.find('li .prev_link').click(function() {
		previous();
		return false;
	});
	pager.find('li .next_link').click(function() {
		next();
		return false;
	});

	function previous() {
		var goToPage = parseInt(pager.data("curr")) - 1;
		goTo(goToPage);
	}

	function next() {
		goToPage = parseInt(pager.data("curr")) + 1;
		goTo(goToPage);
	}

	function goTo(page) {
		var startAt = page * perPage,
			endOn = startAt + perPage;

		// Added few lines from here start

		$('.pg').hide();
		$(".ell").remove();
		var prevpg = $("#pg" + page).show();
		var currpg = $("#pg" + (page + 1)).show();
		var nextpg = $("#pg" + (page + 2)).show();
		if (prevpg.length == 0) nextpg = $("#pg" + (page + 3)).show();
		if (prevpg.length == 1 && nextpg.length == 0) {
			prevpg = $("#pg" + (page - 1)).show();
		}
		if (curr > 5) {
			if (page > 1) prevpg.before($("<li class='ell'>").html("<span>...</span>"));
			if (page < curr - 2) nextpg.after($("<li class='ell'>").html("<span>...</span>"));
		}
		currpg.addClass("active").siblings().removeClass("active");
		// Added few lines till here end


		children.css('display', 'none').slice(startAt, endOn).show();

		if (page >= 1) {
			pager.find('.prev_link').show();
		} else {
			pager.find('.prev_link').hide();
		}

		if (page < (numPages - 1)) {
			pager.find('.next_link').show();
		} else {
			pager.find('.next_link').hide();
		}

		pager.data("curr", page);
		/*pager.children().removeClass("active");
		pager.children().eq(page + 1).addClass("active");*/

	}
};

$(document).ready(function(){

	$('#myTable').pageMe({pagerSelector:'#myPager',showPrevNext:true,hidePageNumbers:false,perPage:1});

});

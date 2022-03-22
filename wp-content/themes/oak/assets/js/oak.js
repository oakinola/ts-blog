
// Vanilla JavaScript
//jarallax(document.querySelectorAll('.jarallax'), {
	// options here
 // });
  

// $('#basicExampleModal').on('show.bs.modal', function (event) {
// 	var picture = $(event.relatedTarget) // Picture that triggered the modal
// 	var image = picture.data('image') // Extract info from data-* attributes
// 	// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
// 	// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
// 	var modal = $(this)
// 	modal.find('.img-fluid').attr("src", image)
// 	//modal.find('.modal-body input').val(recipient)
//   })

 

  window.addEventListener('scroll',  function () {
	var nav = document.getElementById("mainnav");

	var body = document.getElementsByTagName("body")[0];
	
	let value = body.getAttribute("data-pagename");
	if ("blog" !== value && "single-blog" !== value) {
	  return;
	}

	console.log("window.pageYOffset ==> " + window.pageYOffset);
	if(window.pageYOffset  > 100) {
		nav.classList.add("oak-header");
	} else {
		nav.classList.remove("oak-header");
	}
});

  //window.onscroll = onHeaderScroll();

// $(window).scroll(function() {
// 	/* affix after scrolling 100px */
// 	var pagename = $('body').data('pagename');
// 	if ('home' !== pagename) {
// 		return;
// 	}

// 	$('.navbar').removeClass('oak-header'); // first remove the header class
// 	if ($(document).scrollTop() > 100) {
// 		$('.navbar').addClass('oak-header');
// 	} 
// 	//else {
// 		//$('.navbar').removeClass('jad-header');
// 	//}
// });

// $(window).on('load', function() {
// 	var pagename = $('body').data('pagename');
// 	if ('blog' === pagename) {
// 		$('.navbar').removeClass('oak-header');
// 	}
// });

// $(function () {
// 	$("#mdb-lightbox-ui").load("/oak/assets/mdb/mdb-lightbox-ui.html");
// 	});
	
// $(document).ready(function() {
// 	$('.mdb-select').materialSelect();
// 	$('.datepicker').datepicker();
// });
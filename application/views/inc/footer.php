
</body>
<script src="<?php print(base_url()); ?>/assets/jquery/jquery-3.4.1.min.js"></script>
<script src="<?php print(base_url()); ?>/assets/popper/popper.min.js" ></script>
<script src="<?php print(base_url()); ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php print(base_url()); ?>/assets/MBD/js/mdb.min.js" ></script>
<script src="<?php print(base_url()); ?>/assets/MBD/js/addons/datatables.min.js "></script>
<script src="<?php print(base_url()); ?>/assets/MBD/js/addons/datatables-select.min.js "></script>
<script src="https://vjs.zencdn.net/7.7.5/video.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</script>
<script>




$(document).ready(function () {




$('#sendemailnow').submit(function (e) { 
e.preventDefault();





Swal.fire({
title: 'Email Sent!',
text: 'Thank you for writing to us.We will get back to you within 48 hours.',
icon: 'success',
confirmButtonText: 'Ok'
})

 $('#emailmodal').modal('hide')


});


});


// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 15 || document.documentElement.scrollTop > 15) {
    document.getElementById("navbar").style.padding = "0px 10px";
    document.getElementById("logo").style.fontSize = "25px";
  } else {
    document.getElementById("navbar").style.padding = "15px 5px";
    document.getElementById("logo").style.fontSize = "35px";
  }
}
// object-fit polyfill run
objectFitImages();

/* init Jarallax */
jarallax(document.querySelectorAll('.jarallax'));

jarallax(document.querySelectorAll('.jarallax-keep-img'), {
    keepImg: true,
});


function showdownloadmodal(){
$('#downloadsidemodal').modal('show')
}



function openemail(){
  $('#emailmodal').modal('show')
}


</script>

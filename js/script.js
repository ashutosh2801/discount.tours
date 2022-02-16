// JavaScript Document
$(document).click(function (event) {
    var clickover = $(event.target);
    var $navbar = $(".navbar-collapse");               
    var _opened = $navbar.hasClass("in");
    if (_opened === true && !clickover.hasClass("navbar-toggle")) {      
        $navbar.collapse('hide');
    }
});

function setCookie(cname, cvalue) {
  var d = new Date();
  d.setTime(d.getTime() + (30*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function checkCookie(cname) {
  var user = getCookie(cname);
  if (user != "") {
    return true;
  } else {
    return false;
  }
}

function delete_cookie(name) {
	document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
}

function mobilecheck() {
  var check = false;
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
  return check;
};

function open_link() {
	if( mobilecheck()==false )
	window.location = SITEURL+'niagara-falls-tours-canada';
}

function open_link2() {
	if( mobilecheck()==false )
	window.location = SITEURL+'niagara-falls-limo-tours';
}

function load_more_reviews(tour_id){
		var page = parseInt( $('#page2').val() );
		page = page+1;
		$('#page2').val( page );
		var href = '/ajax/reviews?page='+page;
		get_loadmore_data('#reviews_container', '#loader_container', href, tour_id);
		return false;
};

function get_loadmore_tours(container, form_id, url) {
	$('#load_more_products').html('<img src="/images/loader.gif"> Loading...');
	var page = parseInt( $('#page').val() ); page = page + 1; $('#page').val( page );
	var form_data = $(form_id).serialize()
	$.ajax({ url: url, type: 'POST', data: form_data, success:function(data){ if(data) { $(container).append(data); $('#load_more_products').html('Load More'); } else { $('#load_more_products').hide(); } } });
}

function get_loadmore_data(container, loader_container, url, tour_id) {
	$(loader_container).html('<img src="/images/loader.gif"> Loading...');
	$.ajax({ url: url, type: 'POST', data: 'tour_id='+tour_id, success:function(data){ $(loader_container).html('');$(container).append(data); } });
}

function get_data(container, url, tour_id) {
	$(container).html('<img src="/images/loader.gif"> Loading...');
	$.ajax({ url: url, type: 'POST', data: 'tour_id='+tour_id, success:function(data){ $(container).html(data); } });
}

(function($) {

	$.rating = {
		max_item: 0,
		currentRating: 0,
		init: function(onChange) {
			$(document).ready(function() {
				//console.log("rating..init...");
				max_item = $('.ratenode').length;
				//only one can use
				function reset() {
					for (var i = 1; i <= max_item; i++) {
						$("#" + i).removeClass('rating nomal');
					}
				}

				$('.ratenode').bind('mouseover', function(event) {
					reset();
					$.rating.currentRating = parseInt(event.currentTarget.id);
					for (var i = 1; i <= $.rating.currentRating; i++) {
						$("#" + i).addClass('rating');
					}
					for (var i = $.rating.currentRating + 1; i <= max_item; i++) {
						$("#" + i).addClass('nomal');
					}
					if (onChange && typeof onChange === 'function') {
						onChange($.rating.currentRating);
					}
				});
			});
		}
		,getCurrentRating: function() {
			return $.rating.currentRating;
		}
	}
})(jQuery);
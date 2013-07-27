$(document).ready(function($) {
  var $mainContent = $("#wrapper"),
    siteUrl = "http://" + top.location.host.toString(),
    url = ''; 
  // $(document).delegate("a[href^='"+siteUrl+"']:not([href*=/wp-admin/]):not([href*=/wp-login.php]):not([href$=/feed/])", "click", function() {
  //   location.hash = this.pathname;
  //   return false;
  // }); 
  $("#searchform").submit(function(e) {
    location.hash = '?s=' + $("#s").val();
    e.preventDefault();
  }); 
  $(window).bind('hashchange', function(){
    url = window.location.hash.substring(1); 
    if (!url) {
        return;
    } 
    url = url + " #content"; 
    $mainContent.animate({opacity: "0.1"}).html('&lt;p&gt;Please wait...&lt;/&gt;').load(url, function() {
        $mainContent.animate({opacity: "1"});
    });
  });
  $(window).trigger('hashchange');
});
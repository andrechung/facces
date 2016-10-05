
function createNav() {
  var navHtml = '';
  navHtml += '<div class="container">';
  //  <!-- Brand and toggle get grouped for better mobile display -->
  navHtml += '  <div class="navbar-header">';
  navHtml += '    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">';
  navHtml += '      <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>';
  navHtml += '      <span class="icon-bar"></span> <span class="icon-bar"></span> ';
  navHtml += '    </button>';
  navHtml += '    <a class="navbar-brand" href="index.html">歐鄰 FACCES</a>';
  navHtml += '  </div>';
  //  <!-- Collect the nav links, forms, and other content for toggling -->
  navHtml += '  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">';
  navHtml += '    <ul class="nav navbar-nav">';
  navHtml += '     <li> <a href="index.html#about">關於About</a> </li>';
  navHtml += '     <li> <a href="links.html">鏈接Links</a> </li>';
  navHtml += '      <li> <a href="index.html#contact">聯繫Contact</a> </li>';
  navHtml += '      <li> <a href="events.html">特会Events</a> </li>';
  navHtml += '    </ul>';
  navHtml += '  </div>';
  navHtml += '</div>';
  return navHtml;
}

document.getElementById('nav').innerHTML = createNav();

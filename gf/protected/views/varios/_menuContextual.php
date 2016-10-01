<style>
    a.dropdown { background: #88bbd4; padding: 4px 6px 6px; text-decoration: none; font-weight: bold; color: #fff; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; }
a.dropdown:hover { background: #59b; }
a.dropdown { position: relative; margin-left: 3px; }
a.dropdown span { background-image: url(toggle_down_light.png); background-repeat: no-repeat; background-position: 100% 50%; padding: 4px 16px 6px 0; }
a.dropdown.dropdown-active { color:#59b; background-color:#ddeef6; }
a.dropdown.dropdown-active span { background:url(toggle_up_dark.png) 100% 50% no-repeat; }
.dropdown-menu  { background:#ddeef6; padding:7px 12px; position:absolute; top:16px; right:0; display:none; z-index:5000; -moz-border-radius-topleft: 5px; -moz-border-radius-bottomleft: 5px; -moz-border-radius-bottomright: 5px; -webkit-border-top-left-radius: 5px; -webkit-border-bottom-left-radius: 5px; -webkit-border-bottom-right-radius: 5px; }
  .dropdown-menu p { font-size:11px; }
.dropdown-menu a:link, .dropdown-menu a:visited  { font-weight:bold; color:#59b; text-decoration:none; line-height:1.7em; }
.dropdown-menu a:active, .dropdown-menu a:hover { color:#555; }

      * html .dropdown-menu { top:28px; }
      *+ html .dropdown-menu { top:28px; }

/* dropdowns: specific */
#menu1      { float:left; margin-right:20px; }
  #dropdown1  { width:150px; }
  #dropdown1 a  { display:block; }
#menu2      { float:left; }
  #dropdown2  { width:150px; font-size:11px; }
.relative    { position:relative; }
</style>
<script>
$(document).ready(function() {
  /* for keeping track of what's "open" */
  var activeClass = 'dropdown-active', showingDropdown, showingMenu, showingParent;
  /* hides the current menu */
  var hideMenu = function() {
    if(showingDropdown) {
      showingDropdown.removeClass(activeClass);
      showingMenu.hide();
    }
  };
  
  /* recurse through dropdown menus */
  $('.dropdown').each(function() {
    /* track elements: menu, parent */
    var dropdown = $(this);
    var menu = dropdown.next('div.dropdown-menu'), parent = dropdown.parent();
    /* function that shows THIS menu */
    var showMenu = function() {
      hideMenu();
      showingDropdown = dropdown.addClass('dropdown-active');
      showingMenu = menu.show();
      showingParent = parent;
    };
    /* function to show menu when clicked */
    dropdown.bind('click',function(e) {
      if(e) e.stopPropagation();
      if(e) e.preventDefault();
      showMenu();
    });
    /* function to show menu when someone tabs to the box */
    dropdown.bind('focus',function() {
      showMenu();
    });
  });
  
  /* hide when clicked outside */
  $(document.body).bind('click',function(e) {
    if(showingParent) {
      var parentElement = showingParent[0];
      if(!$.contains(parentElement,e.target) || !parentElement == e.target) {
        hideMenu();
      }
    }
  });
});
</script>
<div id="menu1"><div class="relative">
  <a href="/demos" title="Popular MooTools Tutorials" id="dd1" class="dropdown" style="width:170px;text-decoration:none;"><span>Menu 1</span></a>
  <div id="dropdown1" class="dropdown-menu">
    <a href="/about-david-walsh" title="Learn a bit about me.">About Me</a>
    <a href="/page/1" title="The David Walsh Blog">Blog</a>
    <a href="/chat" title="#davidwalshblog IRC Chat">Chat</a>
    <a href="/contact" title="Contact David Walsh">Contact Me</a>
    <a href="/demos" title="CSS, PHP, jQuery, MooTools Demos">Demos &amp; Downloads</a>
    <a href="/js" title="ScrollSpy, Lazyload, Overlay, Context Menu">MooTools Plugins</a>
    <a href="/network" title="David Walsh Blog, Script &amp; Style, Band Website Template, Wynq">Network</a>
    <a href="/web-development-tools" title="JS, CSS Compression">Web Dev Tools</a>
  </div>
</div></div>

<div id="menu2"><div class="relative">
  <a href="/demos" title="Popular MooTools Tutorials" id="dd2" class="dropdown" rel="dropdown2" style="width:170px;text-decoration:none;"><span>Menu 2</span></a>
  <div id="dropdown2" class="dropdown-menu">
    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
  </div>
</div></div>
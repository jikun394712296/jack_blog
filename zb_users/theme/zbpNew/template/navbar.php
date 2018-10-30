<!--导航栏start-->
<div class="header" >
<div class="container clearfix">
      <div id="top-menu">
        <span class="nav-search"><i class="fa fa-search"></i></span>
        <span class="nav-toggle hide">
          <a href="#sidr-main"  id="navigation-toggle"><i class="fa fa-bars"></i></a>
        </span>
        <a href="{$host}" title="{$name}-{$title}" class="navimg clearfix">
          <img src="{$zbp->Config('zbpNew')->logo}" alt="{$name}-{$title}">
          <span class="nav-title hide">{$name}</span>
        </a> 
         <div id="site-nav-wrap" class="nav">
          <div id="sidr-close" class="hide"><a href="#sidr-close" class="toggle-sidr-close">X</a></div>
          <nav id="site-nav" class="main-nav"> 
            <div id="divNavBar-main" >
              <ul id="menu-nav">
                {module:navbar}
              </ul>
            </div> 
          </nav>
        </div><!-- #site-nav-wrap -->
      </div><!-- #top-menu -->
      <div class="searchs">
          <div class="search-bg"></div>
          <div class="search-form">
            <div class="search-close-bar">x</div>
          {module:searchpanel}
          {zbpNew_tagcloud()}
          </div>
      </div>
</div>
</div>
<!--导航栏end-->
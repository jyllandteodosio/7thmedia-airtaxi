<form role="search" method="get" id="searchform" action="<?php echo get_home_url();?>">
<!-- For a totally valid HTML5 Document, role for this form should be blanked or set to 'form' to just get warning and maintain validity-->
<div class="navbar-header-main-nav pull-right">
    <span class="mobile-search-trigger"></span>
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".main-nav-menu">                   
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar i-one"></span>
        <span class="icon-bar i-two"></span>
        <span class="icon-bar i-three"></span>
    </button>
</div>
<div class="pull-right fullwidth search-fields-wrap general-search">
	<input type="text" value="" name="s" id="s" placeholder="" class="fullwidth"/>
	<input type="hidden" value="1" name="sentence" />
	<input type="submit" id="searchsubmit" value=""/>
</div>

</form>
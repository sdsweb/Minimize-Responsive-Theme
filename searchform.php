<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <section>
        <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search..." />
        <input type="submit" id="searchsubmit" class="submit" value="Search" />
    </section>
</form>
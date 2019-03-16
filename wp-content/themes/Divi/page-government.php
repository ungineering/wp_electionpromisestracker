<?php
/*
  Template Name: government_template
 */
get_header();
?>

<script type="text/javascript">
    var inaugration_date = "<?php echo get_post_meta(get_the_ID(), 'inaugration_date', true) ?>"
</script>

<?php
$page_title = $wp_query->post->post_title;
$flag = get_post_meta(get_the_ID(), 'flag', true);
$categories = get_post_meta(get_the_ID(), 'categories', true);
//flag to disable/enable untested code changes; plz forgive me for this code
$activate_code = get_post_meta(get_the_ID(), 'activate_code', true);
$party_name = get_post_meta(get_the_ID(), 'party_name', true);
$twitter_template = get_post_meta(get_the_ID(), 'twitter_template', true);
$facebook_template = get_post_meta(get_the_ID(), 'facebook_template', true);

$icons = array("First 100 Days" => "clock-o",
    "Culture" => "music",
    "Economy" => "rupee",
    "Environment" => "leaf",
    "Governance" => "university",
    "Immigration" => "suitcase",
    "Indigenous" => "users",
    "Security" => "fighter-jet",
    "Health" => "heart",
    "Business and Industries" => "globe",
    "Agriculture" => "tree",
    "Education" => "graduation-cap",
    "School Education" => "graduation-cap",
    "Pre-Primary Education" => "graduation-cap",
    "College Education" => "graduation-cap",
    "Flagship Promises" => "star",
    "Water" => "bars"
);
$statuses = array(
    "Fulfilled" => array(
        "color" => "rgba(67, 207, 8, 0.23)",
        "color_bright" => "rgba(67, 207, 8, 0.62)",
        "icon" => "check-circle-o",
        "id" => "fulfilled",
        "old" => "success"
    ),
    "Adequate Progress" => array(
        "color" => "rgb(204, 221, 232)",
        "color_bright" => "rgb(153, 204, 237)",
        "icon" => "cogs",
        "id" => "aprogress",
        "old" => "warning"
    ),
    "Inadequate Progress" => array(
        "color" => "rgba(141, 153, 161, 0.56)",
        "color_bright" => "rgba(141, 153, 161, 0.63)",
        "icon" => "cog",
        "id" => "iprogress",
        "old" => "info"
    ),
    "Partially Broken" => array(
    "color" => "rgba(141, 153, 161, 0.56)",
    "color_bright" => "rgba(141, 153, 161, 0.63)",
    "icon" => "cog",
    "id" => "iprogress",
    "old" => "info"
    ),
    "Partially Fulfilled" => array(
    "color" => "rgb(204, 221, 232)",
    "color_bright" => "rgb(153, 204, 237)",
    "icon" => "cogs",
    "id" => "aprogress",
    "old" => "warning"
    ),
    "Yet to Start" => array(
        "color" => "rgba(182, 46, 194, 0.17)",
        "color_bright" => "rgba(182, 46, 194, 0.45)",
        "icon" => "hourglass-start",
        "id" => "ytstart",
        "old" => "compromised"
    ),
    "Stalled" => array(
        "color" => "rgba(246, 187, 55, 0.33)",
        "color_bright" => "rgba(246, 187, 55, 0.73)",
        "icon" => "handshake-o",
        "id" => "stalled",
        "old" => "danger"
    ),
    "Broken" => array(
        "color" => "rgba(217, 83, 79, 0.4)",
        "color_bright" => "rgba(219, 96, 93, 0.82)",
        "icon" => "ban",
        "id" => "broken",
        "old" => "danger"
    )
);

//$cats = explode(',', $categories);
//this explode function didnt work right, so hardcoding categories basis flag value
if ($flag) {
    $cats = array("Education", "Health", "Economy", "Business and Industries", "Governance", "Agriculture");
} else {
    $cats = array("Flagship Promises", "Education", "Health", "Water");
}


?>


<?php
$total_promises = 0;
$loop = new WP_Query(array('post_type' => 'promise', 'category_name' => $page_title, 'ignore_sticky_posts' => 1, 'posts_per_page' => -1, 'paged' => $paged));

while ($loop->have_posts()) :
    $loop->the_post();
    $status_promises_count[get_post_meta(get_the_ID(), 'status', true)] ++;
    $total_promises++;
endwhile;
wp_reset_postdata();
?>

<?php
if($activate_code){
foreach (array_keys($status_promises_count) as $key)
	if ($status_promises_count[$key] == 0) { unset($statuses[$key]); }
}
?>


<div class="container promises-header page-header" id="promises-header">
    <div class="row">
        <div class="col-md-6">
            <ul class="list-group">
                <!-- <li class="list-group-item list-group-item inauguration-time-container">
                    <i class="fa fa-home fa-fw"></i>
                    <b id="inauguration-time">Days Till Inauguration: <span id="inauguration-days"><i class='loading'>Loading...</i></span></b>
                </li> -->
                <li class="list-group-item list-group-item">
                    <i class="fa fa-calendar fa-fw"></i>
                    <b><?php echo $party_name ?>'s Days In <?php the_title() ?>: <span id="days-in-office"><i class='loading'>Loading...</i></span></b>
                </li>

                <?php foreach (array_keys($statuses) as $key): ?>
                    <?php
                    $status_name = $key;
                    $status_data = $statuses[$key];
                    ?>

                    <li class="list-group-item list-group-item-<?php echo $status_data['id'] ?>" data-list-facet="js-promise-status" data-facet-value="<?php echo $status_name ?>" data-select-single="true" style="background-color:<?php echo $status_data['color'] ?>; ">
                        <i class="fa fa-fw fa-<?php echo $status_data['icon'] ?> "></i>
                        <?php echo $status_name ?>:
                        <span class="active-points">
                            <?php
                            if ($status_promises_count[$status_name]) {
                                echo $status_promises_count[$status_name];
                            } else {
                                echo "0";
                            }
                            ?>
                        </span> of
                        <span class="total-points">
                            <?php echo $total_promises ?>
                        </span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="container-fluid">
            <?php echo $wp_query->post->post_content ?>
            <div id="share-buttons" class="text-center">
                <ul class="list-inline">
                    <li>
                        <a href="https://www.facebook.com/sharer.php?u=<?php the_permalink() ?>" target="_blank" style="color:#3b5998;" onclick="window.open(this.href, 'targetWindow', 'toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false">
                            <i class="fa fa-2x fa-facebook-square"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/share?url=<?php the_permalink() ?>;text=Track&nbsp;&commat;<?php echo $party_name ?>&apos;s&nbsp;Electoral&nbsp;Promises&nbsp;with&nbsp;Election&nbsp;Promises&nbsp;Tracker."
                           target="_blank" style="color:#1da1f2;" onclick="window.open(this.href, 'targetWindow', 'toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false">
                            <i class="fa fa-2x fa-twitter"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid promises" id="promises">
    <div class="row promises__search-row">
        <div class="col-md-4">
            <form action="#" class="form-inline">
                <input id="search" type="text" class="form-control search" placeholder="Search">
                <button class="promises__category--reset btn btn-default">
                    <i class="fa fa-fw fa-refresh"></i>  View All Promises
                    <i class="fa fa-fw fa-filter"></i><span id="count"><?php echo $total_promises ?></span>/<?php echo $total_promises ?>
                </button>
            </form>
            <br>
        </div>
        <div class="col-md-8" id="center-on-mobile">
            <div class="pull-right">
                <div class="promises__statuses">
                    <?php foreach (array_keys($statuses) as $key): ?>
                        <?php
                        $status_name = $key;
                        $status_data = $statuses[$key];
                        ?>
                        <button class="btn btn-<?php echo $status_data['id'] ?> " data-list-facet="js-promise-status" data-facet-value="<?php echo $status_name ?>" data-select-single="true" style="background-color: <?php echo $status_data['color_bright'] ?>;  border-color: #333;">
                            <i class="fa fa-<?php echo $status_data['icon'] ?> fa-fw" aria-hidden="true"></i>
                            <span> <?php echo $status_name ?></span>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <ul class="nav nav-tabs" id="myTabs" role="tablist" >
                <?php foreach ($cats as $cat): ?>
                    <li role="presentation" data-list-facet="js-promise-category" data-facet-value="<?php echo $cat ?>" class="<?php echo $cat ?>" data-select-single="true" >
                        <a href="#" role="tab" data-toggle="tab" class="text-muted">
                            <i class="fa fa-fw fa-<?php echo $icons[$cat] ?>"></i>&nbsp;
                            <span ><?php echo $cat; ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="row promises__table container-fluid">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th><!-- ID --></th>
                        <th class="hidden-sm hidden-md hidden-xs">Status</th>
                        <th >Category</th>
                        <!-- <th>Tags</th> -->
                        <th>Promise</th>
                        <!-- <th>Sources</th> -->
                        <th class=" hidden-sm hidden-md hidden-xs">Actions</th>
                    </tr>
                </thead>

                <tbody class="list">
                    <!-- add color to each policy -->
                    <?php
                    $index = 0;
                    $loop = new WP_Query(array('post_type' => 'promise', 'category_name' => $page_title, 'ignore_sticky_posts' => 1, 'posts_per_page' => -1, 'paged' => $paged));

                    while ($loop->have_posts()) :
                        $loop->the_post();

                        $status = get_post_meta(get_the_ID(), 'status', true);
                        $title = get_post_meta(get_the_ID(), 'title', true);
                        $category = get_post_meta(get_the_ID(), 'category', true);
                        $comment_count = $wp_query->post->comment_count;
                        ?>

                        <tr class="promise <?php echo $statuses[$status]['id'] ?> " style="background-color:<?php echo $statuses[$status]['color'] ?> ">

                            <td class="promise__id"><?php echo ++$index ?>.</td>

                            <td class="promise__status hidden-sm hidden-md hidden-xs" title="<?php echo $status ?>">
                                <i class="fa fa-fw fa-<?php echo $statuses[$status]['icon'] ?> text-<?php echo $statuses[$status]['id'] ?>" title="<?php echo $status; ?>"></i>
                                <span class="promise__status-text js-promise-status sr-only"><?php echo $status ?></span>
                            </td>
                            <td class="promise__category" style="white-space: nowrap;">
                                <i class="fa fa-fw fa-<?php echo $icons[$category] ?>"></i> <span class="js-promise-category" id="remove-on-mobile"><?php echo $category; ?></span>
                            </td>

                            <td class="promise__title js-promise-text">
                                <span class="promise__status-text js-promise-status sr-only"><?php echo $status; ?></span>
                                <b>
                                    <a href="<?php the_permalink(); ?>" target="_blank" style="color:#333; text-decoration: none;"><?php the_title() ?> </a>
                                </b>
                            </td>
                            <td class="promise__actions">
                                <div class="action">
                                    <ul class="list-inline">
                                        <li>
                                            <a href="<?php the_permalink(); ?>" class="btn btn-info btn-sm" role="button" target="_blank">
                                                <?php if ($comment_count): ?>
                                                    <i class="fa fa-x fa-comments-o" aria-hidden="true"> Discuss</i>
                                                <?php else : ?>
                                                    <i class="fa fa-x fa-comments-o" aria-hidden="true"> Discuss</i>
                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <?php
                    endwhile;
                    if ($loop->max_num_pages > 1):
                        ?>
                    <div id="nav-below" class="navigation">
                        <div class="nav-previous">
                            <?php next_posts_link(__('<span class="meta-nav">&larr;</span> Previous', 'domain')); ?>
                        </div>
                        <div class="nav-next">
                            <?php previous_posts_link(__('Next <span class="meta-nav">&rarr;</span>', 'domain')); ?>
                        </div>
                    </div>
                    <?php
                endif;

                wp_reset_postdata();
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /#promises -->

<?php echo do_shortcode('[wpdevart_facebook_comment curent_url="http://www.electionpromisestracker.in/' . $wp_query->query['pagename'] . '/" order_type="social" title_text="Facebook Comment" title_text_color="#000000" title_text_font_size="22" title_text_font_famely="monospace" title_text_position="left" width="100%" bg_color="#d4d4d4" animation_effect="random" count_of_comments="3" ]'); ?>

<?php get_footer(); ?>

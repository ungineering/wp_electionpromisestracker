    <?php
    /*
    Template Name: government_template
    */
    get_header('government'); ?>

 
    <script type="text/javascript"> var inaugration_date="<?php echo get_post_meta( get_the_ID(), 'inaugration_date' ,true)?>"</script>
    <?php

    $page_title = $wp_query->post->post_title;
    $categories= get_post_meta( get_the_ID(), 'categories' ,true);
    $party_name= get_post_meta( get_the_ID(), 'party_name' ,true);
    $twitter_template=get_post_meta( get_the_ID(), 'twitter_template' ,true);
    $facebook_template=get_post_meta( get_the_ID(), 'facebook_template' ,true);

     $icons=array("First 100 Days"=>"clock-o",
    "Culture"=> "music",
    "Economy"=>"dollar",
    "Environment"=> "leaf",
    "Government"=> "university",
    "Immigration"=> "suitcase",
    "Indigenous"=> "users",
    "Security"=>"fighter-jet",
    "Health"=> "heart",
    "World"=>"globe",
    "Education"=>"graduation-cap",
    "School Education"=>"graduation-cap",
    "Pre-Primary Education"=> "graduation-cap",
    "College Education"=> "graduation-cap"
);
   $statuses = array( 
            "Fulfilled" => array (
               "color" => "success",
               "icon" => "check-circle-o"
            ),         
            "Adequate Progress" => array (
               "color" => "warning",
               "icon" => "cogs"
            ),
            "Inadequate Progress"=>array(
                "color"=>"compromised",
                "icon"=>"cog"
            ),
            "Yet to Start"=>array(
                "color" => "info",
                "icon"=>"hourglass-start"
             ),
            "Stalled" => array (
               "color" => "compromised",
               "icon" => "handshake-o"
            ),
            "Broken" => array (
               "color" => "danger",
               "icon" => "ban"
            )
    ); 
    $cats = explode(',', $categories);      
?>


<?php 
$total=0; $loop = new WP_Query( array( 'post_type' => 'promise', 'category_name' => $page_title, 'ignore_sticky_posts' => 1, 'posts_per_page'=>-1,'paged' => $paged ) );
if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            <?php $status_count[get_post_meta( get_the_ID(), 'status' ,true)]++;
                            $total++;
                            ?>
<?php endwhile; endif; ?>

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
                    <b><?php echo $party_name?>'s Days In Office: <span id="days-in-office"><i class='loading'>Loading...</i></span></b>
                </li>

                    <?php foreach (array_keys($statuses) as $key): ?>
                     <?php $status_name=$key; $status_data=$statuses[$key];?>
              
                    <li class="list-group-item list-group-item-<?php echo $status_data['color']?>"  data-list-facet="js-promise-status" data-facet-value="<?php echo $status_name?>" data-select-single="true" >
                        <i class="fa fa-fw fa-<?php echo $status_data['icon']?> "></i>
                        <?php echo $status_name?>: <span class="active-points">
                            <?php if($status_count[$status_name])echo $status_count[$status_name];
                                else echo "0";?>
                        </span> of <span class="total-points"><?php echo $total ?></span>
                    </li>
                <?php endforeach;?>

            </ul>

        </div>

        <div class="container-fluid">
            <?php echo $wp_query->post->post_content     ?>
            <div id="share-buttons" class="text-center">
                <ul class="list-inline">
                    <li>
                        <a href="https://www.facebook.com/sharer.php?u=http://www.electionpromisestracker.in/" target="_blank"
                           style="color:#3b5998;">
                            <i class="fa fa-2x fa-facebook-square"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://plus.google.com/share?url=http://www.electionpromisestracker.in/" target="_blank"
                           style="color:#dd4b39;">
                            <i class="fa fa-2x fa-google-plus"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/share?url=http://www.electionpromisestracker.in/&amp;text=Track&nbsp;&commat;AamAadmiParty&apos;s&nbsp;Electoral&nbsp;Promises&nbsp;with&nbsp;Election&nbsp;Promises&nbsp;Tracker."
                           target="_blank" style="color:#1da1f2;">
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
        <div class="col-md-5">
            <form action="#" class="form-inline">
                <input id="search" type="text" class="form-control search" placeholder="Search">
                <button class="promises__category--reset btn btn-default">
                    <i class="fa fa-fw fa-refresh"></i> Clear
                    <i class="fa fa-fw fa-filter"></i><span id="count"><?php echo $total ?></span>/<?php echo $total?>
                </button>
            </form>
            <br>
        </div>
        <div class="col-md-7" id="center-on-mobile">
            <div class="pull-right">

                <div class="promises__statuses">

                    <?php foreach (array_keys($statuses) as $key): ?>
                     <?php $status_name=$key; $status_data=$statuses[$key];?>

                        <button class="btn btn-<?php echo $status_data['color'] ?>" data-list-facet="js-promise-status" data-facet-value="<?php echo $status_name ?>" data-select-single="true">
                          <i class="fa fa-<?php echo $status_data['icon'] ?> fa-fw" aria-hidden="true"></i>
                            <span id="remove-on-mobile"> <?php echo $status_name ?></span>
                        </button>
                    <?php endforeach;?>
                </div>

            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <ul class="nav nav-tabs" id="myTabs" role="tablist" >
                <?php foreach ($cats as $cat): ?>
                    <li role="presentation" data-list-facet="js-promise-category" data-facet-value="<?php echo $cat ?>" class="<?php echo $cat ?>" >
                        <a href="#" role="tab" data-toggle="tab" class="text-muted">
                            <i class="fa fa-fw fa-<?php echo $icons[$cat]?>"></i>&nbsp;
                            <span id="remove-on-mobile"><?php echo $cat; ?></span>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>

        <div class="row promises__table container-fluid">
                    <table class="table table-striped">

                        <thead>
                        <tr>
                            <th><!-- ID --></th>
                            <th class="hidden-sm hidden-md hidden-xs">Status</th>
                            <th class="hidden-sm hidden-md hidden-xs">Category</th>
                            <!-- <th>Tags</th> -->
                            <th>Promise</th>
                            <!-- <th>Sources</th> -->
                            <th class="hidden-sm hidden-md hidden-xs">Actions</th>
                        </tr>
                        </thead>

                        <tbody class="list">
                        <!-- add color to each policy -->
                    <?php $index=0; $loop = new WP_Query( array( 'post_type' => 'promise', 'category_name' => $page_title, 'ignore_sticky_posts' => 1,'posts_per_page'=>-1, 'paged' => $paged ) );
                            if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            <?php $status=get_post_meta( get_the_ID(), 'status' ,true); 
                                  $title=get_post_meta( get_the_ID(), 'title' ,true);
                                  $category=get_post_meta( get_the_ID(), 'category' ,true);
                                  $var;
                                  $comment_count = $wp_query->post->comment_count;
                                  if($status=='Under Progress')$var="warning";
                                  if($status=='Fulfilled')$var="success";
                                  if($status=='Broken')$var="danger";
                                  if($status=='Stalled')$var="compromised";
                            ?>
                
                                <tr class="promise <?php echo $var?>">

                            <td class="promise__id"><?php echo ++$index?>.</td>

                             <td class="promise__status hidden-sm hidden-md hidden-xs" title="<?php echo $status ?>">
                                <i class="fa fa-fw fa-<?php echo $statuses[$status]['icon']?> text-<?php echo $statuses[$status]['color']?>" title="<?php echo $status; ?>"></i>
                                <span class="promise__status-text js-promise-status sr-only"><?php echo $status?></span>
                            </td>
                            <td class="promise__category hidden-sm hidden-md hidden-xs" style="white-space: nowrap;">
                                <i class="fa fa-fw fa-<?php echo $icons[$category]?>"></i> <span class="js-promise-category"><?php echo $category;?></span>
                            </td>
                            <!-- <td class="promise__tags" style="text-align: center;">
                                {% for tag in promise.tags %}
                                <a class="label label-default">{{ tag }}</a>
                                {% endfor %}
                            </td> -->
                            <td class="promise__title js-promise-text">
                            <!--
                            <b><span class="js-promise-category">{{ promise.category }}</span>:</b>
                            -->
                            <span class="promise__status-text js-promise-status sr-only"><?php echo $status;?></span>
                            <b> 
                            <a href="<?php the_permalink(); ?>">
                            <?php the_title()?> </a>
                            </b>

<!--                                  <?php echo $statement;?>
                                 <br /> 
                                 <b>Status</b>: <?php echo $state;?> 
                                 <?php $mykey_values = get_post_custom_values( 'sources' );
                                    foreach ( $mykey_values as $key => $source ) { ?>
                                <sup><a href="<?php echo $source?>"> <?php echo $key?></a></sup>
                             <?php }?>
 
                             <br />  -->               
                           <!--  <b> <a href="<?php the_permalink(); ?>"> <?php echo $title?> </a></b>: 
                            <?php echo $statement;?>
                            <br /> -->
                            <!-- <b>Status</b>: <?php echo $state;?> -->
                            <!-- add superscript citations and sources -->
                            </td>
                            <!-- <td class="promise__sources" style="white-space: nowrap;">
                            </td> -->
                            <td class="promise__actions">
                                <!-- comment and twitter integration -->
                                <!--<a href="{{promise.comments}}" target="_blank" rel="nofollow">-->
                                <!--<i class="fa fa-fw fa-comments text-muted" aria-hidden="true"></i></a> -->
                                <?php 
                                $variables=array("*promise_status*","*promise_title*"); 
                                ob_start();
                                the_permalink();
                                $url = ob_get_clean();
                                $constants=array($status,$title);
                                $twitter_text=str_replace($variables,$constants,$twitter_template);
                                $facebook_text=str_replace($variables,$constants,$facebook_template);
                                ?>
                                <div class="action"> 
                                <ul class="list-inline">
                               <li> <a href="<?php the_permalink(); ?>" target="_blank"> <button >Comments<?php if($comment_count)echo ":".$comment_count?> </button>
                                </a>
                                </li>
                                <li>
                                <a href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php echo $url?>&p[title]=<?php echo $facebook_text?>&p[summary]=Description%20goes%20here!" target="_blank" onclick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false"><i class="fa fa-facebook-square" aria-hidden="true"></i> Share </a>
                                </li>
                                <li>
                                <a href="https://twitter.com/share?url=http://electionpromisestracker.in/&text=<?php echo $twitter_text ?> " target="_blank" onclick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false"><i class="fa fa-twitter-square" aria-hidden="true"></i>Tweet</a>
                                </li>
                               </ul>

                                </div>
                            </td>
                        </tr>
                                <?php endwhile;
                                    if (  $loop->max_num_pages > 1 ) : ?>
                                        <div id="nav-below" class="navigation">
                                        <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Previous', 'domain' ) ); ?></div>
                                        <div class="nav-next"><?php previous_posts_link( __( 'Next <span class="meta-nav">&rarr;</span>', 'domain' ) ); ?></div>
                                        </div>
                                        <?php endif;
                                        endif;
                                        wp_reset_postdata(); ?>                                                                      
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
    <!-- /#promises -->

    <?php get_footer('government'); ?>
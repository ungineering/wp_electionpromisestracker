<?php
    // WP Post Template: Promise
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<section id="promise">
    <?php
        get_header();
    ?>
    <div class="container" class="article_title">
        <div id="promise_category">
            <?php
                echo the_title();
            ?>
        </div>
        <h1 id="promise-description">
            <?php
                echo get_post_meta($post->ID, "title", true);
            ?>
        </h1>
    </div>
</section>

<section id="promise_status">
    <div class="container" class="article_title">
        <?php
                $status = get_post_meta($post->ID, "status", true);

                switch ($status) {
                    case 'Fulfilled':
                        $status_class   = "fa fa-check-circle-o fa-fw"; 
                        $status_content = '"\f05d"';
                        $status_color   = "#5cb85c";
                        break;
                    case 'Under Progress':
                        $status_class   = "fa fa-cogs fa-fw"; 
                        $status_content = '"\f085"';
                        $status_color   = "#ec971f";    
                        break;
                    case 'Stalled':
                        $status_class   = "fa fa-handshake-o fa-fw"; 
                        $status_content = '"\f2b5"';
                        $status_color   = "#a6b5bf";
                        break;
                    case 'Broken':
                        $status_class   = "fa fa-ban fa-fw"; 
                        $status_content = '"\f05e"';
                        $status_color   = "#d9534f";
                        break;
                    default :
                        $status_class   = "fa fa-hourglass-start fa-fw"; 
                        $status_content = '"\f251"';
                        $status_color   = "#5bc0de";
                        break;
                }
            ?>
        
        <h2 id="promise_status_value">
            <i aria-hidden="true" id="promise_status_symbol" class="<?php echo $status_class; ?>"></i>
            <?php
                echo $status;
            ?>
        </h2>
    </div>
</section>
<div class="container">
    <div id="content-area" class="clearfix">
            <div id="left-area">
                <?php
                    $content_post = get_post($post->ID);
                    $content = $content_post->post_content;
                    $content = apply_filters('the_content', $content);
                    $content = str_replace(']]>', ']]&gt;', $content);
                    echo $content;
                ?>
            </div>
    </div>
</div>

 <style>
    p {
        background-color: #f7f7f7;
        font-family: Lato, sans-serif;
        font-size: 1.05em;
        line-height: 1.5;
        margin-bottom: 1em;
        padding: .25em .5em;
    }

    #promise_status_symbol {
        content : <?php echo $status_content; ?>;
    }

    #promise {
        background-color: #e9ebee;
        background-image: radial-gradient(circle at top right, #e9ebee, white);
        background-attachment: fixed;
        border-bottom: .1rem solid #ddd;
    }

    #promise_status_value {
        color : #fff;
        padding-top: 10px;
    }

    #promise_status {
        background:  <?php echo $status_color; ?>;
        background-attachment: fixed;
        border-bottom: .1rem solid #ddd;
    }

    #promise_category{
        font-size: 2.5rem;
    }

    #promise-description {
        font-size: 2.5rem;
        margin: 1rem auto 1rem;
        text-shadow: 0.05em 0.05em rgba(0, 0, 0, 0.13);
    }

    .container {
        margin-left: auto;
        margin-right: auto;
        padding-left: 1.4rem;
        padding-right: 1.4rem;
    }

    .article_title {
        font-family: Lato, sans-serif;
        font-size: 2.5em;
    }
    #left-area{
        float: left;
        border-left: .3em solid;
        margin: 2rem 0 4rem;
        padding-left: .75em;
        padding-right: 5.5%;
        border-left-color: <?php echo $status_color; ?>;
    }
</style>

<?php get_footer(); ?>

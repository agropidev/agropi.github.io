<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=us-ascii; ?>" />

    <title><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php bloginfo('description'); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/screen.css" type="text/css" media="screen, projection" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/print.css" type="text/css" media="print" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" /><?php
        global $options;
        foreach ($options as $value) {
        if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
        }
        ?>
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feeds" href="<?php if ( ($cc_feedid) <> "" ) { echo ("http://feeds2.feedburner.com/$cc_feedid"); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
</head>

<body <?php body_class(); ?>>
    " /&gt;   " /&gt; <!--[if lt IE 8]>
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/ie.css" type="text/css" media="screen, projection">
        <![endif]-->
     <!--[if lt IE 8]>
        <style>
        input.email_field, input.field {padding:10px 0 0 40px;}
        </style>
        <![endif]-->
     <!-- load the jquery libraries from google -->
     <script type="text/javascript" src="http://www.google.com/jsapi">
    //<![CDATA[
    //]]>
    </script><script type="text/javascript">
    //<![CDATA[
          google.load("jquery", "1.3.2");
    //]]>
    </script><!-- countdown js --><script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.countdown.js">
    //<![CDATA[
    //]]>
    </script><!-- slidebox js --><script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/slidebox.js">
    //<![CDATA[
    //]]>
    </script><script type="text/javascript">
        //<![CDATA[
        var newYear = new Date(); 
    newYear = new Date(<?php echo $cc_year;?>, <?php echo $cc_month;?> - 1, <?php echo $cc_day;?>); 
    $('#countdown_wrapper').countdown({until: newYear}); 
        $(function () {
            $('#countdown_wrapper').countdown({
                until: newYear, 
                format: 'DHMS',
                layout: '<div id="t7_timer">'+
                            '<div class="countdown_numbers">'+
                                '<div id="days" class="span-3">{dnn}<\/div>'+
                                '<div id="hours" class="span-3">{hnn}<\/div>'+
                                '<div id="minutes" class="span-3">{mnn}<\/div>'+
                                '<div id="seconds" class="span-3 last">{snn}<\/div>'+
                            '<\/div>'+
                            '<div class="countdown_text span-12 last"><\/div>'+
                        '<\/div>'
                });
        });
          //]]>
    </script><!-- sidebox --><script type="text/javascript">
    //<![CDATA[
    $(document).ready(function(){
        $("#twit_container").slideBox({width: "20%", height: "110px", position: "top"});
    });
    //]]>
    </script><!-- twitter --><script type="text/javascript">
    //<![CDATA[
    $(document).ready(function(){
    var tweeturl = "http://twitter.com/status/user_timeline/<?php echo $cc_twitter;?>.json?count=1&callback=?";
    $.getJSON(tweeturl, function(data){
    $.each(data, function(i, item) {
      var txt = item.text
          .replace(/(https?:\/\/[-a-z0-9._~:\/?#@!$&\'()*+,;=%]+)/ig,'<a href="$1">$1<\/a>')
          .replace(/@+([_A-Za-z0-9-]+)/ig, '<a href="http://twitter.com/$1">@$1<\/a>')
          .replace(/#+([_A-Za-z0-9-]+)/ig, '<a href="http://search.twitter.com/search?q=$1">#$1<\/a>');
        $('.twit_img').append('<img src="'+ item.user.profile_image_url + '" alt="" >');
        $('<p><\/p>').html(txt).prependTo('.twit');
      });
    });
    });
    //]]>
    </script><?php wp_head(); ?>

    <div class="container">
        <div id="twit_iefix">
            <div id="twit_container">

            <div class="twit_img"></div>

            <div class="twit"></div>

            <div class="twit_misc">
                <a href="http://twitter.com/<?php echo $cc_twitter;?>" title="Follow <?php echo $cc_twitter;?> on Twitter">Follow me</a>
            </div>
            </div>
        </div>

        <div class="prepend-6 span-18">
            <h1 class="span-12" id="logo"><a title="Home" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
        </div>

        <div id="countdown_wrapper" class="prepend-6 span-18"></div>

        <div id="post" class="prepend-6 span-12">
            <p><?php echo $cc_welcome;?></p>
        </div>

        <div class="prepend-1 span-3 last">
            <p id="copy"><a title="Design by Eliseos.net" href="http://eliseos.net">eliseos</a></p>
        </div>
        <hr class="space" />

        <div id="feedburner" class="prepend-6 span-12">
            <form id="feedform" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=&lt;?php echo $cc_feedid;?&gt;', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
                <input class="email_field" type="text" name="email" value="Enter your email address" onclick="this.value=''" onfocus="if (this.value == 'Enter your email address') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Enter your email address';}" /> <input type="hidden" value="<?php echo $cc_feedid;?>" name="uri" /> <input type="hidden" name="loc" value="en_US" /> <input type="submit" class="feedb" value="Subscribe" />
            </form>
        </div>

        <div id="footer" class="prepend-6 span-12"></div>
    </div><!-- end container -->
    <?php wp_footer(); ?><?php echo $cc_fscripts;?>
</body>
</html>

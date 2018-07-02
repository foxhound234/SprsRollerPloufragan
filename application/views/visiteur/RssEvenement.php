<?php echo '<?xml version="1.0" encoding="' . $encoding . '"?>' . ""; ?>
<rss version="2.0"
   xmlns:dc="http://purl.org/dc/elements/1.1/"
   xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
   xmlns:admin="http://webns.net/mvcb/"
   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
   xmlns:content="http://purl.org/rss/1.0/modules/content/">

    <channel>

        <description><?php echo $site_description; ?></description>
        <link><?php echo $site_link; ?></link>
        <title><?php echo $site_name; ?></title>
        <dc:language><?php echo $page_language; ?></dc:language>
        <dc:rights>Copyright <?php echo gmdate("Y", time()); ?></dc:rights>

        <?php foreach($LesEvenements as $evenement): ?>
        <item>
            <title><?php echo xml_convert ($evenement->NOMEVENEMENT); ?></title>
            <link><?php echo site_url ('visiteur/DetailEvenement/' .$evenement->NOEVENEMENT); ?></link>
            <guid><?php echo site_url ('visiteur/DetailEvenement/' .$evenement->NOEVENEMENT); ?></guid>
            <?php $evenement->DETAILEVENEMENT  = strip_tags( $evenement->DETAILEVENEMENT ); ?>
            <description>
                <?php echo $evenement->DETAILEVENEMENT ; ?>
            </description>
            <?php $date = strtotime ($evenement->DATEEVENEMENT); // Conversion date to timestamp ?>
            <pubDate><?php echo date('r', $date);?></pubDate>
        </item>
        <?php endforeach; ?>

    </channel>

</rss>
<?php header('Content-type: text/xml'); ?>
<?xml version="1.0" encoding="UTF-8" ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"> 
    <url>
        <loc><?php echo base_url(); ?></loc> 
        <priority>1.0</priority>
    </url>

    <?php
    	foreach($get_sitemap_pages as $page):
    		echo '<url>';
    			echo '<loc>'.base_url('s/'.$page -> page_url).'</loc>';
    			echo '<priority>0.5</priority>';
    			echo '<changefreq>daily</changefreq>';
    		echo '</url>';
    	endforeach; 

        foreach($get_sitemap_services as $service):
            echo '<url>';
                echo '<loc>'.base_url('h/'.$service -> service_url).'</loc>';
                echo '<priority>0.5</priority>';
                echo '<changefreq>daily</changefreq>';
            echo '</url>';
        endforeach; 
        
        foreach($get_sitemap_products as $product):
            echo '<url>';
                echo '<loc>'.base_url('u/'.$product -> product_url).'</loc>';
                echo '<priority>0.5</priority>';
                echo '<changefreq>daily</changefreq>';
            echo '</url>';
        endforeach;  

        foreach($get_sitemap_categories as $category):
            echo '<url>';
                echo '<loc>'.base_url('k/'.$category -> category_url).'</loc>';
                echo '<priority>0.5</priority>';
                echo '<changefreq>daily</changefreq>';
            echo '</url>';
        endforeach;  


        foreach($get_sitemap_articles as $article):
            echo '<url>';
                echo '<loc>'.base_url('m/'.$article -> article_url).'</loc>';
                echo '<priority>0.5</priority>';
                echo '<changefreq>daily</changefreq>';
            echo '</url>';
        endforeach;  

         	
    ?>
</urlset>
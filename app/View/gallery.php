
            <h2>Related images on Flickr</h2>

            <ul>
                <?php
                foreach($images as $photo){
                    echo '<li><div class="photo">' .
                        '<a href="https://www.flickr.com/photos/' .$photo["owner"]. '/' .$photo["id"]. '" target="_blank"><figure><img src="' . 'http://farm' . $photo["farm"] . '.static.flickr.com/' . $photo["server"] . '/' . $photo["id"] . '_' . $photo["secret"] . '_t.jpg"></figure></a>'.
                        '</div></li>';
                }
                ?>

</ul>

<div class="page-container clearfix" id="content" role="main">

    <!-- =========== begin #begin ============= -->
    <div class="feature-section feature-odd make-page-height" id="begin">

        <div class="container project-content">
            <h1 class="project-name text-center">Exiftool Gallery</h1><br>
            <section class="row text-center project-logo">
                <div class="col-lg-4">
                    <div class="the-couple-image-holder">
                            <span class="logo-mask" aria-hidden="true">
                            </span>
                        <img class="image-project" src="assets/images/logo.jpg" alt="Exiftool Gallery"/>
                    </div>
                </div>
                <div class="col-lg-6 text-wrapper">
                    <h2 class="project-name">Images & Metadatas</h2>
                    <p class="text-uppercase date-statement">December 15, 2015</p>
                </div>
            </section>
        </div>
    </div>
    <div class="divider divider-even" aria-hidden="true">
    </div>

    <!-- =========== begin #about ============= -->
    <section class="feature-section make-page-height feature-even" id="about">
        <div class="container vertical-align-middle">
            <h2 class="theme-title">About Images</h2>

            <div class="row break-480px center-block">
                <ul class="row row-masonry simple-gallery pop-gallery photo-grid">
                    <?php
                    foreach($images as $image){
                        echo '<li class="col-xs-10 col-md-8">' .
                            '<a href="#"' .
                            'data-slide="slide"' .
                            'data-target="#details"'.
                            'class="color-inherit-link"' .
                            'role="button" aria-controls="#details"'.
                            'aria-expanded="false">' .
                            '<div class="center-block col-sm-12 clickedimage">
                                    <img id="'.json_decode($image,true)["filename"].'" style="width:400px;height:150px" src="' . json_decode($image,true)["url"] . '" alt=' . json_decode($image,true)["name"] . ' class="img-circle img-responsive">
                                    <figcaption><p>'.json_decode($image,true)["name"] .'<br>By '.json_decode($image,true)["creator"].'</p></figcaption>
                             </div>' .
                            '</a></li>';
                    }


                    ?>
                </ul>
            </div>
        </div>
    </section>
    <!-- =========== /end #about ============= -->

    <!-- ========== divider ODD ============== -->
    <div class="divider divider-odd">
        <!-- divider element ODD -->
    </div>

    <!-- =========== begin #upload ============= -->
    <section class="feature-section feature-odd" id="upload">
        <div class="container vertical-align-middle">
            <h2 class="theme-title">New Image</h2>
            <h5 class="text-center">Please select an image file</h5>
            <!--<form action="?a=upload" method="post" enctype="multipart/form-data">-->
                <input id="input-file" name="fileToUpload" type="file" class="file file-loading" accept="image/*" data-allowed-file-extensions='["jpg", "jpeg","png"]'>
            <!--</form>-->
            <div id="form"></div>
        </div>
    </section>
    <!-- ========== /end #upload ============== -->

    <!-- ========== divider EVEN ============== -->
    <div class="divider divider-even" aria-hidden="true">
        <!-- divider element EVEN -->
    </div>

    <!-- ========== begin #gallery ============== -->
    <section class="feature-section feature-even" id="gallery">
        <div class="container">
            <h2 class="theme-title">Photos Gallery</h2>
            <ul class="row row-masonry simple-gallery pop-gallery">
                <li class="grid-sizer"></li>
                <li class="gutter-sizer"></li>
                <?php
                foreach($images as $image){
                    echo '<li class="img-treatment">' .
                        '<a class="pop-gallery-img popup-indicator" href="' . json_decode($image,true)["url"] . '"' .
                        '><img src="' . json_decode($image,true)["url"] . '" alt=' . json_decode($image,true)["name"] . ' />' .
                        '</a> ' .
                        '</li>';
                }
                ?>
            </ul>
        </div>
    </section>
    <!-- ========== /end #gallery ============== -->

    <!-- ========== divider ODD ============== -->
    <div class="divider divider-odd" aria-hidden="true">
        <!-- divider element ODD -->
    </div>

    <!-- ========== begin #map-section ============== -->
    <section class="feature-section make-page-height feature-odd text-center" id="map-section">


        <div class="container vertical-align-middle">
            <h2 class="theme-title">Images Map</h2>

            <h5>Please click the image to view it in a better resolution.</h5>
            <div id="map"></div>
        </div>
    </section>
    <!-- ========== /end #map-section ============== -->

    <!-- ========== divider EVEN ============== -->
    <div class="divider divider-even" aria-hidden="true">
        <!-- divider element EVEN -->
    </div>

    <!-- ========== begin #rsvp ============== -->
    <section class="feature-section make-page-height feature-even" id="rsvp">
        <div class="container vertical-align-middle text-center">
            <h3 class="theme-title">Celebrate with Us</h3>

            <p class="feature-section-intro-text">
                Katherine and Christopher request the pleasure of your company at the celebration of our union,
                Saturday, the fourteenth of November, two thousand and sixteen at seven o’clock in the evening.
            </p>

            <div class="row ceremony-reception-row">
                <div class="col-sm-4 col-sm-push-4">
                    <p>
                        <a href="#"
                           data-slide="slide"
                           data-target="#rsvp-panel"
                           class="rsvp-button"
                           role="button"
                           aria-expanded="false"
                        >
                            <span></span>
                            <span></span>
                        </a>
                    </p>
                </div>
                <div class="col-sm-4 col-sm-pull-4 ceremony-col">
                    <h3 class="no-margin-bottom">
                        Ceremony
                    </h3>

                    <p>
                        <strong>Humanist Hall</strong><br>
                        2016 411 28th Street<br>
                        Oakland, CA 94609
                        <br>
                    </p>
                </div>
                <div class="col-sm-4 reception-col">
                    <h3 class="no-margin-bottom">
                        Reception
                    </h3>

                    <p>
                        <strong>Just Dance Ballroom</strong><br>
                        2500 Embarcadero<br>
                        Oakland, CA 94606
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- ========== /end #rsvp ============== -->

    <!-- ========== divider ODD ============== -->
    <div class="divider divider-odd" aria-hidden="true">
        <!-- divider element ODD -->
    </div>

    <!-- ========== begin #contact ============== -->
    <section class="feature-section feature-odd make-page-height" id="contact">
        <div class="container vertical-align-middle">
            <h3 class="theme-title">Get in Touch</h3>

            <p class="feature-section-intro-text">Please contact us at 727-555-3022 or email us at <a
                    href="mailto:emailgoeshere@domain.com" class="link-underline color-inherit-link">exiftool.gallery@gmail.com</a>
            </p>
            <ul class="list-inline text-center color-inherit-link social-contact-list">
                <li><a href="#" class="ti ti-twitter"><span class="sr-only">Follow Us on Twitter</span></a></li>
                <li><a href="#" class="ti ti-facebook"><span class="sr-only">Follow Us on Facebook</span></a></li>
            </ul>
        </div>
    </section>
    <!-- ========== end #contact ============== -->


    <!-- ========== divider-last-even LAST following a .feature-odd ============== -->
    <div class="divider divider-last-even" aria-hidden="true">
        <!-- divider element LAST -->
    </div>


</div>
<!-- =========================== /end .page-container =========================== -->


<!-- ================== begin slide-panels containing the content for about for each partner and the RSVP form  ================= -->

<div class="slide-panel-parent">
    <!-- .slide-panel-parent goes around all the panels -->

    <!-- ========== BEGIN MAP ONLY CONTENTS ============== -->
    <!-- ===================================================
        Enter the location in the div below exactly as formated
        =================================================== -->
    <div id="location" class="hide">411 28th Street, Oakland, CA 94609-3602</div>
    <!-- ===================================================
        Change the content in the Google Map Info Notice Box :: see below
        =================================================== -->
    <div class="hide">
        <div id="info-content">
            <div id="siteNotice"></div>
            <!-- ========== Change Title ============== -->
            <h3 id="firstHeading" class="theme-title">Ceremony</h3>

            <div id="bodyContent" class="text-center">
                <!-- ========== Change Paragraph content INCLUDING THE LINK map url ============== -->
                <p>
                    Saturday, November 14, 2016 at 7 pm at Humanist Hall 2016 411 28th Street, Oakland, CA 94609.
                </p>

                <p>
                    <a class="btn btn-sm btn-primary" href="https://goo.gl/maps/ZCV0P" target="_blank"
                       title="Google Maps opens in a new tab/window">Directions/Map</a>
                </p>
            </div>
            <!-- /end #bodyContent the id used by Google Maps -->
        </div>
        <!-- /end #info-content -->
    </div>
    <!-- /end .hide -->
    <!-- ========== /end #Info Notice box ============== -->
    <!-- ========== END MAP ONLY CONTENTS ============== -->


    <!-- ========== begin #rsvp-panel containing the form (contents for map in the html above) ============== -->
    <div class="slide-panel" id="rsvp-panel">
        <a href="#" class="close ti ti-close">
            <!--themify icon font for close icon -->
        </a>

        <div class="container">
            <h3 class="theme-title">Join Us...</h3>

            <div id="spinner">
                <!-- this loads when the form is validated and submitted -->
            </div>
            <div id="success">
                <!-- this content is written via the php script upon success -->
            </div>
            <div id="error">
                <!-- this content is written via the php script upon error -->
            </div>
            <form id="rsvpform" name="rsvpform" method="post" novalidate>
                <fieldset>
                    <legend class="sr-only">RSVP Form</legend>
                    <div class="row break-480px">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="name">Name
                                    <span class="required ti ti-shine ">
                                    </span>
                                </label>
                                <input type="text" name="name" class="form-control form-control-lg" id="name"
                                       placeholder="your first and last name" value="" required>
                            </div>
                            <!-- /end .form-group -->
                        </div>
                        <!-- /end .col-xs-6 nested -->
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="email">Email
                                    <span class="required ti ti-shine ">
                                    </span>
                                </label>
                                <input type="email" id="email" class="form-control form-control-lg" name="email"
                                       placeholder="enter your email" value="" required>
                            </div>
                            <!-- /end .form-group -->
                        </div>
                        <!-- /end .col-xs-6 nested -->
                    </div>
                    <!-- /end .row nested -->
                    <div class="row break-480px">
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="guests">Guests
                                    <span class="required ti ti-shine ">
                                    </span>
                                </label>
                                <input type="number" id="guests" class="form-control form-control-lg" name="guests"
                                       placeholder="how many guests?" value="" required>
                            </div>
                            <!-- /end .form-group -->
                        </div>
                        <!-- /end .col-xs-3 nested -->
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="attending">Attending <span class="required ti ti-shine "></span></label>
                                <select class="form-control form-control-lg" name="attending" id="attending"
                                        required="">
                                    <option value="">Event(s)</option>
                                    <option value="Both Ceremony & Reception">Wedding Ceremony & Reception</option>
                                    <option value="Wedding Ceremony only">Wedding Ceremony</option>
                                    <option value="Wedding Reception only">Wedding Reception</option>
                                </select>
                            </div>
                            <!-- /end .form-group -->
                        </div>
                        <!-- /end .col-xs-4 nested -->
                        <div class="col-xs-5">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control form-control-lg" name="phone" id="phone"
                                       placeholder="your phone number" value="">
                            </div>
                            <!-- /end .form-group -->
                        </div>
                        <!-- /end .col-xs-5 nested -->
                    </div>
                    <!-- /end .row nested -->
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" class="form-control form-control-lg"
                                  placeholder="Message goes here (optional)"></textarea>
                    </div>
                    <!-- /end .form-group -->
                    <div class="form-group">
                        <label for="answer">The color of the sky is... (lowercase answer)
                            <span class="required ti ti-shine ">
                            </span>
                        </label>
                        <input type="text" class="form-control form-control-lg" name="answer" id="answer"
                               placeholder="answer" value="" required>
                    </div>
                    <!-- /end .form-group -->
                    <button type="submit" class="btn btn-primary btn-lg btn-block">RSVP</button>
                </fieldset>
            </form>
        </div>
        <!--/ end .container -->
        <!-- MAP GOES HERE -->
        <div id="map-container">
            <!-- map goes here -->
        </div>
        <!-- slide back to the top of the panel  -->
        <a href="#" class="go-to-top scroll-panel-top"><span class="ti ti-arrow-up"></span></a>
    </div>
    <!-- ========== /end #rsvp-panel ============== -->

</div>
<!-- /end .slide-down-parent -->
<!-- =============================== /end all slide-panels  ================================== -->


<!-- =============================== responsive viewports  ================================== -->
<div class="iframe-wrapper" id="iframe-load">
    <a href="#" class="close ti ti-close">
        <!--themify icon font for close icon -->
    </a>

    <div id="iframe-content"></div>
</div>
<!-- /end .iframe-wrapper -->


<!-- .go-to-top  -->
<a href="#begin" class="go-to-top scroll" id="document-top">
    <span class="ti ti-arrow-up"></span>
</a>
<!-- /end .go-to-top -->
<div class="slide-panel" id="details">
</div>

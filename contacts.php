<?php
/**
 * The template for displaying contacts page.
 * Template Name: Contacts Page Layout
 *
 * @package Astron
 * @version 1.0.0
 */
?>

<?php get_header();

$options = get_option('contacts_options');
?>
<div id="map" class="map"></div>
<div class="site-spacer no-indents">
    <div class="container">
        <h1 style="margin-bottom: 1rem;">Contacts</h1>
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-5 col-xl-4">
                <div class="contacts">
                    <?php if (!empty($options['email']) or !empty($options['email_2'])): ?>
                        <dl class="contacts-item">
                            <dt>Email</dt>
                            <?php if (!empty($options['email'])): ?>
                                <dd><a href="mailto:<?php echo $options['email'] ?>"><?php echo $options['email'] ?></a>
                                </dd>
                            <?php endif; ?>
                            <?php if (!empty($options['email_2'])): ?>
                                <dd>
                                    <a href="mailto:<?php echo $options['email_2'] ?>"><?php echo $options['email_2'] ?></a>
                                </dd>
                            <?php endif; ?>
                        </dl>
                    <?php endif; ?>
                    <?php if (!empty($options['phone']) or !empty($options['phone_2'])): ?>
                        <dl class="contacts-item">
                            <dt>Number</dt>
                            <?php if (!empty($options['phone'])): ?>
                                <dd>
                                    <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $options['phone']) ?>"><?php echo $options['phone'] ?></a>
                                </dd>
                            <?php endif; ?>
                            <?php if (!empty($options['phone_2'])): ?>
                                <dd>
                                    <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $options['phone_2']) ?>"><?php echo $options['phone_2'] ?></a>
                                </dd>
                            <?php endif; ?>
                        </dl>
                    <?php endif; ?>
                    <?php if (!empty($options['address'])): ?>
                        <dl class="contacts-item">
                            <dt>Address</dt>
                            <?php if (!empty($options['address'])): ?>
                                <dd style="white-space: pre;"><?php echo $options['address'] ?></dd>
                            <?php endif; ?>
                        </dl>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (!empty($options['key']) and !empty($options['lat']) and !empty($options['lng'])):
    ?>
    <script>
        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: <?php echo $options['lat']; ?>, lng: <?php echo $options['lng']; ?>},
                zoom: 14,
                disableDefaultUI: true
            });

            <?php if(!empty($options['lat_picker']) and !empty($options['lng_picker'])): ?>
            var image = '<?php echo get_template_directory_uri() . '/images/pin.png'?>';
            var beachMarker = new google.maps.Marker({
                position: {lat: <?php echo $options['lat_picker']; ?>, lng: <?php echo $options['lng_picker']; ?>},
                map: map,
                icon: {
                    url: image
                },
                title: 'Astron'
            });
            <?php endif; ?>
        }


    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $options['key']; ?>&callback=initMap"
            async defer></script>
<?php endif; ?>
<?php get_footer(); ?>

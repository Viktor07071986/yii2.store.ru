<?php

use yii\helpers\Url;
use yii\helpers\Html;

?>

<!-- banner -->
<div class="banner">
    <?= $this->render('//layouts/inc/sidebar') ?>
    <div class="w3l_banner_nav_right">
        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <li>
                        <div class="w3l_banner_nav_right_banner">
                            <h3>Make your <span>food</span> with Spicy.</h3>
                        </div>
                    </li>
                    <li>
                        <div class="w3l_banner_nav_right_banner1">
                            <h3>Make your <span>food</span> with Spicy.</h3>
                        </div>
                    </li>
                    <li>
                        <div class="w3l_banner_nav_right_banner2">
                            <h3>upto <i>50%</i> off.</h3>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
    </div>
    <div class="clearfix"></div>
</div>
<!-- banner -->
<!-- top-brands -->
<?php if(!empty($offers)) { ?>
    <div class="top-brands">
        <div class="container">
            <h3>Hot Offers</h3>
            <div class="agile_top_brands_grids">
                <?php foreach($offers as $offer) { ?>
                    <div class="col-md-3 top_brand_left">
                        <div class="hover14 column">
                            <div class="agile_top_brand_left_grid">
                                <div class="agile_top_brand_left_grid_pos">
                                    <?= Html::img('@web/images/offer.png', ['alt' => 'offer', 'class' => 'img-responsive']) ?>
                                </div>
                                <div class="agile_top_brand_left_grid1">
                                    <figure>
                                        <div class="snipcart-item block" >
                                            <div class="snipcart-thumb">
                                                <a href="<?= Url::to(['product/view', 'id' => $offer->id]) ?>">
                                                    <?= Html::img("@web/{$offer->img}", ['alt' => $offer->title]) ?>
                                                </a>
                                                <p><?= $offer->title ?></p>
                                                <h4>
                                                    $<?= $offer->price ?>
                                                    <?php if((float)$offer->old_price) { ?>
                                                        <span>$<?= $offer->old_price ?></span>
                                                    <?php } ?>
                                                </h4>
                                            </div>
                                            <div class="snipcart-details top_brand_home_details">
                                                <a href="<?= Url::to(['cart/add', 'id' => $offer->id]) ?>" data-id="<?= $offer->id ?>" class="button add-to-cart">Add to cart</a>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- //top-brands -->
<?php

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <base href="/">
        <meta charset="<?= Yii::$app->charset ?>">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <!-- header -->
            <div class="agileits_header">
                <div class="w3l_search">
                    <form action="<?= Url::to(['product/search']) ?>" method="get">
                        <input type="text" name="q" value="Search a product..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search a product...';}" required="">
                        <input type="submit" value=" ">
                    </form>
                </div>
                <div class="product_list_header">
                    <button onclick="getCart()" type="button" class="button" data-toggle="modal" data-target="#modal-cart">
                        <span class="cart-sum">
                            $<?= $_SESSION['cart.sum'] ?? '0' ?>
                        </span>
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="modal-cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Корзина</h4>
                                </div>
                                <div class="modal-body"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
                                    <a href="<?= Url::to(['cart/checkout']) ?>" class="btn btn-success">Оформить заказ</a>
                                    <button onclick="clearCart()" type="button" class="btn btn-danger">Очистить корзину</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="logo_products">
                <div class="container">
                    <div class="w3ls_logo_products_left">
                        <h1><a href="<?= Url::home() ?>"><span>Grocery</span> Store</a></h1>
                    </div>
                    <div class="w3ls_logo_products_left1">
                        <ul class="phone_email">
                            <li><i class="fa fa-phone" aria-hidden="true"></i>(+0123) 234 567</li>
                            <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:store@grocery.com">store@grocery.com</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        <!-- //header -->
            <?= $content ?>
        <!-- footer -->
            <div class="footer">
                <div class="container">
                    <div class="wthree_footer_copy">
                        <p>&copy; <?= date('Y'); ?> Grocery Store. All rights reserved | Design by MY</p>
                    </div>
                </div>
            </div>
        <!-- //footer -->
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
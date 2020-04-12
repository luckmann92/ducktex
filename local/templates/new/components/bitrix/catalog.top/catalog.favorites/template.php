<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */
//dump($arResult);
?>
<div class="favorites-block">
    <?foreach ($arResult['ITEMS'] as $arItem) {
        $arDiscounts = CCatalogDiscount::GetDiscountByProduct($arItem['ID'], $USER->GetUserGroupArray(), "N", 1, SITE_ID);
        if ($arDiscounts) {
            $arDiscount = current($arDiscounts);
        }
        ?>
        <div class="product-card" data-id="<?=$arItem['ID']?>">
            <div class="favorites-header">
                <button class="btn simple gray add-to-cart">в корзину</button>
                <button class="favorites-delete"></button>
            </div>
            <div class="image" style="background-image: url('<?=$arItem['PICTURE']['SRC']?>');"></div>
            <?if ($arDiscount['VALUE']) {?>
                <div class="badge">
                    -<?=$arDiscount['VALUE']?>%
                </div>
            <?} ?>
            <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="title"><?=$arItem['NAME']?></a>
            <div class="price" data-ratio="<?=$arItem['CATALOG_MEASURE_RATIO']?>">
                <div class="new">от <?=$arItem['MIN_PRICE']['PRINT_VALUE_NOVAT']?> / <?=$arItem['CATALOG_MEASURE_NAME']?></div>
                <?if ($arItem['MIN_PRICE']['PRINT_VALUE_NOVAT'] > $arItem['PRICES']['BASE']['PRINT_DISCOUNT_VALUE_NOVAT']) {?>
                    <div class="last"><?=$arItem['PRICES']['BASE']['PRINT_DISCOUNT_VALUE_NOVAT']?></div>
                <?}?>
            </div>
        </div>
    <?}?>
</div>
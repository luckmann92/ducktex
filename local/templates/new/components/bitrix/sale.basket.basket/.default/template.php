<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Sale\DiscountCouponsManager,
    Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
?>
<table class="basket-table">
    <thead>
    <tr>
        <th></th>
        <th><?=Loc::getMessage('HEADER_NAME')?></th>
        <th><?=Loc::getMessage('HEADER_PRICE')?></th>
        <th><?=Loc::getMessage('HEADER_QUANTITY')?></th>
        <th><?=Loc::getMessage('HEADER_SUM')?></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?foreach ($arResult['GRID']["ROWS"] as $ROW) {?>
        <tr data-product-id="<?=$ROW['ID']?>" data-price="<?=$ROW['FULL_PRICE']?>">
            <td>
                <?if ($ROW['PREVIEW_PICTURE'] || $ROW['DETAIL_PICTURE']) {?>
                    <?$img = $ROW['PREVIEW_PICTURE'] ?: $ROW['DETAIL_PICTURE']?>
                    <a href="<?=$ROW['DETAIL_PAGE_URL']?>" class="product-image" style="background-image: url('<?=$img['SRC']?>');"></a>
                <?}?>
            </td>
            <td><a href="<?=$ROW['DETAIL_PAGE_URL']?>" class="product-name"><?=$ROW['NAME']?></a></td>
            <td>
                <div class="product-price">
                    <?if (floatval($ROW['DISCOUNT_PRICE']) > 0) {?>
                        <div class="last"><?=$ROW['FULL_PRICE'] - $ROW['DISCOUNT_PRICE']?> руб. / <?=$ROW['MEASURE_TEXT']?></div>
                    <?}?>
                    <div class="new"><?=$ROW['FULL_PRICE_FORMATED']?> / <?=$ROW['MEASURE_TEXT']?></div>
                </div>
            </td>
            <td>
                <?$ROW["MEASURE_RATIO"] = isset($ROW["MEASURE_RATIO"]) ? $ROW["MEASURE_RATIO"] : 1; ?>
                <div class="quantity-block">
                    <button class="quant-btn quantity-arrow-minus"> - </button>
                    <input class="quantity-num" disabled
                           data-min="<?=$ROW["MEASURE_RATIO"]?>"
                           data-max="<?=$ROW["AVAILABLE_QUANTITY"]?>"
                           data-step="<?=$ROW["MEASURE_RATIO"]?>"
                           data-unit="<?=$ROW['MEASURE_TEXT']?>"
                           type="text"
                           value="<?=$ROW['QUANTITY']?>" />
                    <button class="quant-btn quantity-arrow-plus"> + </button>
                </div>
            </td>
            <td>
                <div class="product-final-price">
                    <?if (floatval($ROW['DISCOUNT_PRICE_PERCENT']) > 0) {?>
                        <div class="last"><?=$ROW['SUM_VALUE'] - $ROW['SUM_DISCOUNT_PRICE']?> руб. / <?=$ROW['MEASURE_TEXT']?></div>
                    <?}?>
                    <div class="new"><?=$ROW['SUM_FULL_PRICE_FORMATED']?></div>
                </div>
            </td>
            <td>
                <button class="product-delete"></button>
            </td>
        </tr>
    <?}?>
    </tbody>
</table>
<div class="basket-footer">
    <div class="promocode">
        <input type="text" placeholder="Введите код купона для скидки">
        <input type="submit" value="применить" class="btn outline big">
    </div>
    <div class="bonus">
        Бонус за заказ: <span><?=$arParams['ALL_BONUS']?> руб</span>
    </div>
    <div class="final-price">
        ИТОГО: <span><?=$arResult['allSum_FORMATED']?></span>
    </div>
</div>
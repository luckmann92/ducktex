<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */
use Bitrix\Main\Page\Asset;

CJSCore::Init('jquery2');
//Asset::getInstance()->addJs('/local/front/files/js/map.js');

Asset::getInstance()->addJs($APPLICATION->GetTemplatePath('public/js/arcticmodal/jquery.arcticmodal-0.3.min.js'));
Asset::getInstance()->addJs('/local/front/files/slick/slick.min.js');
Asset::getInstance()->addJs('/local/front/files/fancybox/jquery.fancybox.min.js');
Asset::getInstance()->addJs('/local/front/files/js/main.js');
Asset::getInstance()->addJs('/local/front/files/js/api.js');
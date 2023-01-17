<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<?php if (!empty($arResult['ID'])) : ?>
    <div class="article-card">
        <?php if (!empty($arResult['PROPERTIES']['detail_title']['VALUE'])) : ?>
            <div class="article-card__title">
                <?= $arResult['PROPERTIES']['detail_title']['VALUE'] ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($arResult['PROPERTIES']['detail_date']['VALUE'])) : ?>
            <div class="article-card__date">
                <?= $arResult['PROPERTIES']['detail_date']['VALUE'] ?>
            </div>
        <?php endif; ?>
        <div class="article-card__content">
            <?php if (!empty($arResult['DISPLAY_PROPERTIES']['detail_picture']['FILE_VALUE']['SRC'])) : ?>
                <div class="article-card__image sticky">
                    <img src="<?= $arResult['DISPLAY_PROPERTIES']['detail_picture']['FILE_VALUE']['SRC'] ?>" alt="" data-object-fit="cover" />
                </div>
            <?php endif; ?>
            <div class="article-card__text">
                <?php if (!empty($arResult['PROPERTIES']['detail_description']['VALUE']['TEXT'])) : ?>
                    <div class="block-content" data-anim="anim-3">
                        <p><?= $arResult['PROPERTIES']['detail_description']['VALUE']['TEXT'] ?></p>
                    </div>
                <?php endif; ?>
                <a class="article-card__button" href="<?= $_SERVER['HTTP_REFERER'] ?>">Назад к новостям</a>
            </div>
        </div>
    </div>
<?php endif; ?>
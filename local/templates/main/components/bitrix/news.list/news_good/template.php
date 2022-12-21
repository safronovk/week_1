<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

<?php if (!empty($arResult['ITEMS'])): ?>
	<div id="barba-wrapper">
		<div class="article-list">
		<?php foreach ($arResult['ITEMS'] as $arItem): ?>
			<?php $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT")); ?>
    		<?php $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'))); ?>
			<?php if (!empty($arItem['PROPERTIES']['LINK']['VALUE'])) : ?>
				<a class="article-item article-list__item" href="<?=$arItem['PROPERTIES']['LINK']['VALUE']?>" data-anim="anim-3">
				<?php if (!empty($arItem['PREVIEW_PICTURE']['SRC'])): ?>
					<div class="article-item__background">
						<img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" data-src="<?=$arItem['PROPERTIES']['DATASRC']['VALUE']?>"alt="<?=$arItem['PREVIEW_PICTURE']['ALT']?>"/>
					</div>
				<?php endif; ?>
				<div class="article-item__wrapper">
					<div class="article-item__title">
						<?= isset($arItem['NAME']) ? $arItem['NAME'] : ''; ?>
					</div>
					<div class="article-item__content">
						<?= isset($arItem['PREVIEW_TEXT']) ? $arItem['PREVIEW_TEXT'] : ''; ?>
					</div>
				</div>
				</a>
			<?php endif; ?>
		<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>
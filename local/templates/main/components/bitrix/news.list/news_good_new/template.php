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

<?php foreach ($arResult["ITEMS"] as $arSecElItem) : ?>
	<?php if (!empty($arSecElItem['ELEMENTS'])) : ?>
		<div id="barba-wrapper">
			<div class="one">
				<h2><?= isset($arSecElItem['NAME']) ? $arSecElItem['NAME'] : ''; ?></h2>
			</div>
			<div class="article-list">
				<?php foreach ($arSecElItem['ELEMENTS'] as $arItem) : ?>
					<?php $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT")); ?>
					<?php $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'))); ?>
					<a class="article-item article-list__item" href="<?= $arItem['DETAIL_PAGE_URL'] ?>" data-anim="anim-3">
						<?php if (!empty($arItem['PREVIEW_PICTURE']['SRC'])) : ?>
							<div class="article-item__background">
								<img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" data-src="<?= $arItem['DETAIL_PAGE_URL'] ?>" alt="<?= $arItem['PREVIEW_PICTURE']['ALT'] ?>" />
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
				<?php endforeach; ?>
			</div>
		</div>
	<?php endif; ?>
<?php endforeach; ?>
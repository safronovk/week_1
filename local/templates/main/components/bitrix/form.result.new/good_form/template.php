<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>
<? if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif; ?>

<?if ($arResult["isFormNote"] != "Y") { ?>

<div class="contact-form">
    <div class="contact-form__head">
		<?if ($arResult["isFormTitle"]) { ?>
        	<div class="contact-form__head-title">
				<?=$arResult["FORM_TITLE"]?>
			</div>
		<? } ?>
		<?if ($arResult["isFormDescription"] == "Y") { ?>
			<div class="contact-form__head-text">
				<?=$arResult["FORM_DESCRIPTION"]?>
			</div>
		<? } ?>
    </div>
	<form name="<?=$arResult["arForm"]["SID"]?>" class="contact-form__form" action="" method="POST">
		<div class="contact-form__form-inputs">
			<? foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
				if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden') {
					echo $arQuestion["HTML_CODE"];
				}
				elseif ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'text'|| $arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'email') { ?>
					<div class="input contact-form__input">
						<label class="input__label" for="medicine_name">
							<div class="input__label-text">
								<?=$arQuestion["CAPTION"]?>
							</div>
							<?=$arQuestion["HTML_CODE"]?>
							<div class="input__notification">
								Поле должно содержать не менее 3-х символов
							</div>
						</label>
					</div>
				<? }
			} ?>
		</div>
		<? foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
			if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden') {
				echo $arQuestion["HTML_CODE"];
			}
			elseif ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'textarea') { ?>
				<div class="contact-form__form-message">
					<div class="input">
						<label class="input__label" for="medicine_message">
							<div class="input__label-text">
								<?=$arQuestion["CAPTION"]?>
							</div>
							<?=$arQuestion["HTML_CODE"]?>
							<div class="input__notification">
							</div>
						</label>
					</div>
				</div>
				<? }
		} ?>

		<div class="contact-form__bottom">
			<div class="contact-form__bottom-policy">Нажимая &laquo;Отправить&raquo;, Вы&nbsp;подтверждаете, что
				ознакомлены, полностью согласны и&nbsp;принимаете условия &laquo;Согласия на&nbsp;обработку персональных
				данных&raquo;.
			</div>
			<input class="form-button contact-form__bottom-button" data-success="Отправлено"
					data-error="Ошибка отправки" <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(trim($arResult["arForm"]["BUTTON"]) == '' ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" />
		</div>
	</form>
</div>

<? }

//echo '<pre>';
//print_r($arResult);
//echo '<pre>';

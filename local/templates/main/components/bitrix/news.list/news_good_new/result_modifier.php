<?

$dbResSect = CIBlockSection::GetList(
	array("SORT" => "ASC"),
	array("IBLOCK_ID" => $arParams['IBLOCK_ID'])
);

while ($sectRes = $dbResSect->GetNext()) {
	$arSections[] = $sectRes;
}

foreach ($arSections as $arSection) {
	foreach ($arResult["ITEMS"] as $key => $arItem) {
		if ($arItem['IBLOCK_SECTION_ID'] == $arSection['ID']) {
			$arSection['ELEMENTS'][] =  $arItem;
		}
	}
	$arElementGroups[] = $arSection;
}

$arResult["ITEMS"] = $arElementGroups;

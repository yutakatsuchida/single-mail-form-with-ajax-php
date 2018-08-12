<?php

function is_telephonenumber($value) {
	$value = str_replace(array('-', 'ー', '−', '―', '‐'), '', $value);
	$value = mb_convert_kana($value, "n", "utf-8");
	return preg_match("/^[0-9]+$/", $value);
}

function is_email($value) {
	return preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $value);
}

function h($value) {
	return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

?>
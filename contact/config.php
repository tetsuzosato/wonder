<?php
$unicode="UTF-8";
$language="Japanese";
$to = "info@wonderco.jp,tateyama@wonderco.jp";
//$to = "sato@re-ad.co.jp";
$from = "info@wonderco.jp";
$subject = "お問い合わせを受け付けました";

$auto_flag = true;
$auto_from = "info@wonderco.jp";
$auto_subject = "お問い合わせありがとうございました | 株式会社WONDER&CO";
$auto_body = <<<__EOD__
お問い合わせ、誠にありがとうございます。

このメールは、お問い合わせの受け付けをお知らせする自動返信メールです。
お問い合わせに対する返信ではありません。

お問い合わせ頂きました内容につきましては、後日担当者よりご連絡致します。

[auto_body]
-----------------------------------------------------------------
■お問い合わせ先

株式会社WONDER&CO
〒810-0001　福岡市中央区天神3-6-16 
オフィスニューガイアCLAIR天神7F
TEL	092-707-3171
FAX	092-707-3172
カスタマーセンター	0120-028-914
ホームページ	http://wonderco.jp
メールアドレス	info@wonderco.jp

-----------------------------------------------------------------
__EOD__;
?>
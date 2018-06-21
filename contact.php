<?php
include_once ('contact/functions.php');
define("FMAIL_FORM", 0);
define("FMAIL_PRIVE", 1);
define("FMAIL_THANK", 2);
$action=@$_POST['action'];
$page=FMAIL_FORM;
$error_msg=array();
$error_flag=false;
if($action==""){
    unset($_SESSION['form']);
	$page=FMAIL_FORM;
}elseif($action=="action"){
	$parm=@$_POST['parm'];
			
	if(@$parm['name']==""){
		$error_flag=true;
		$error_msg[]="※お名前を入力してください。";
	}
			
	if(@$parm['kana']==""){
		$error_flag=true;
		$error_msg[]="※フリガナを入力してください。";
	}elseif(!is_kkana($parm['kana'])){
		$error_flag=true;
		$error_msg[]="※フリガナは正しくありません。";
	}
	
	if((@$parm['zip1']=="") || (@$parm['zip2']=="") || (@$parm['area']=="") || (@$parm['address01']=="") || (@$parm['address02']=="")){
		$error_flag=true;
		$error_msg[]="※ご住所を入力してください。";
	}

	if(@$parm['input_main_em']==""){
		$error_flag=true;
		$error_msg[]="※メールアドレスを入力してください。";
	}elseif (!is_email(@$parm['input_main_em'])){
		$error_flag=true;
		$error_msg[]="※メールアドレスは正しくありません。";
	}
	
	if(@$parm['input_main_emc']==""){
		$error_flag=true;
		$error_msg[]="※メールアドレス(確認用)を入力してください。";
	}elseif (@$parm['input_main_em']!=@$parm['input_main_emc']){
		$error_flag=true;
		$error_msg[]="※メールアドレスは一致ではありません。";
	}
	
	if(@$parm['input_main_tp']==""){
		$error_flag=true;
		$error_msg[]="※お電話番号を入力してください。";
	}elseif(!is_tel($parm['input_main_tp'])){
		$error_flag=true;
		$error_msg[]="※お電話番号は正しくありません。";
	}

	if(@$parm['content']==""){
		$error_flag=true;
		$error_msg[]="※お問合わせ内容を入力してください。";
	}
	
	if($error_flag){
		$page=FMAIL_FORM;
	}else {
            $_SESSION['form']=$parm;
            header("Location:confirm.php");
            exit();
		//$page=FMAIL_PRIVE;
	}
}elseif($action == "edit"){
	$parm=@$_POST['parm'];
	$parm['input_main_emc'] = $parm['input_main_em'];
	$page=FMAIL_FORM;
}else{
	error_reporting(0);
	require_once 'contact/config.php';
	mb_language($language);
	mb_internal_encoding($unicode);

	if(!@$_POST) {
		header("location:index.php");
		exit();
	}

	$page=FMAIL_THANK;

	$parm=$_POST['parm'];

	$message=array();
	$message['お名前'] ='
	'.$parm['name'].'
	';
	$message['フリガナ'] = '
	'.$parm['kana'].'
	';
	$message['ご住所'] = '
	郵便番号'.$parm['zip1'].'-'.$parm['zip2'].'
	'.$parm['area'].'
	'.$parm['address01'].'
	'.$parm['address02'].'
	';
	$message['メールアドレス'] = '
	'.$parm['input_main_em'].'
	';
	$message['お電話番号'] = '
	'.$parm['input_main_tp'].'
	';
	$message['お問い合わせ内容'] = '
	'.$parm['content'].'
	';

	//print_r($message);
	$auto_mail =SBC_DBC(@$parm['input_main_em'],1);

	include("contact/sendmail.php");
}
?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="format-detection" content="telephone=no">
<meta name="description" content="化粧品メーカー「WONDER&CO(ワンダー)」のお客様から頂いた質問にお答えします。『ISIS(イシス)』の化粧品に関する疑問や『SAIVI(サイビ)』の導入に関する不明な点などありましたらお気軽にお問い合わせください。">
<meta name="keywords" content="WONDER&CO,ワンダー,ISIS,SAIVI,化粧品メーカー,エステティックサロン,">
<title>お問い合わせ | WONDER&amp;CO【エステ・化粧品】</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="js/jquery.js"></script>
<script src="js/common.js"></script>
<script src="js/jquery.matchHeight.js"></script>
<script language="javascript">
	$(document).ready(function(){
		$("#edit").click(function(){
			$("#action").val('edit');
                $('#form').submit();
		});
		$("#submit").click(function(){
			$("#action").val('submit');
                $('#form').submit();
		});
	});
</script>

</head>
<body>
<div id="container"><!-- #BeginLibraryItem "/Library/header.lbi" --><header id="gHeader">
		<div class="hBox clearfix">
			<h1><a href="./"><img src="img/common/logo.jpg" alt="WONDER &amp; CO"></a></h1>
			<ul class="hList pc clearfix">
				<li><span class="telSpan">TEL<a href="tel:0120028914"><span>0120-028-914</span></a></span>OPEN 10:00-19:00</li>
				<li class="list"><a href="contact.php"><img src="img/common/icon01.png" alt="">お問い合わせ</a></li>
                <li class="member list"><a href="http://member.wonderco.jp/wonderco/Login.aspx" target="_blank">会員ページ</a></li>
			</ul>
		</div>
		<div class="menu sp"><a href="#"><img src="img/common/menu.gif" class="open" alt="Menu"><img src="img/common/sp_close.gif" alt="CLOSE" class="close"></a></div>
		<nav id="gNavi">
			<ul class="clearfix">
				<li><a href="./"><span>TOP</span><span class="pcSpan pc">トップ</span></a></li>
				<li><a href="about.html"><span>ABOUT</span>ワンダーとは</a></li>
				<li><a href="commitment.html"><span>COMMITMENT</span>ISISのこだわり</a></li>
				<li class="navi"><a href="cosmetics.html"><span>COSMETICS</span>コスメライン ISIS</a><span class="iconImg sp"><img class="open" src="img/common/icon08.gif" alt=""><img class="close" src="img/common/icon11.gif" alt=""></span>
					<ul class="hUl">
						<li><a href="news.html">イシス シルクジェリー</a></li>
						<li><a href="news02.html">イシス シルクシャワー</a></li>
						<li><a href="news03.html">パーフェクトケア O2パック</a></li>
						<li><a href="news04.html">SCパーフェクトケアエキス</a></li>
						<li><a href="news05.html">イシス ライン</a></li>
						<li><a href="news06.html">イシス ダイヤモンドセルエッセンス</a></li>
						<li><a href="news07.html">UVセラム&amp;ベースクリーム</a></li>
					</ul>
				</li>
				<li><a href="franchise.html"><span>FRANCHISE</span>フランチャイズ SAIVI</a></li>
				<li class="pc"><a href="contact.php"><span>CONTACT</span>お問い合わせ</a></li>
				<li class="imgLi pc"><a href="https://www.instagram.com/wonder_co_/" target="_blank"><img src="img/common/h_img.gif" alt=""></a></li>
			</ul>
			<div class="btnLink sp"><a href="contact.php"><img src="img/common/icon09.gif" alt="">お問い合わせ</a></div>
			<div class="btnLink btnLink01 sp"><a href="http://member.wonderco.jp/wonderco/Login.aspx" target="_blank">会員ページ</a></div>
			<div class="telBox sp"><p>TEL<a href="tel:0120028914">0120-028-914 </a><span>OPEN 10:00-19:00</span></p></div>
			<div class="img sp"><a href="https://www.instagram.com/wonder_co_/" target="_blank"><img src="img/common/sp_h_img.png" alt=""></a></div>
		</nav>
	</header><!-- #EndLibraryItem --><section id="main">
		<div id="content">
        	<div class="mainBox mainBox01">
            	<h2 class="headLine01">お問い合わせ</h2>
                <div class="telBox pc">
                	<p class="txt">電話でのお問い合わせはこちら</p>
                    <p class="tel"><span>TEL</span><a href="tel:0120028914">0120-028-914</a></p>
                    <p class="date"><span>OPEN  10:00-19:00</span>（土日祝を除く）</p>
                </div>
				<div class="spBox sp"><img src="img/contact/sp_img03.gif" alt="" class="img01" width="8"><img src="img/contact/sp_img04.gif" alt="" class="img02" width="8"><img src="img/contact/sp_img05.gif" alt="" class="img03" width="8"><img src="img/contact/sp_img06.gif" alt="" class="img04" width="8">
					<p class="textP"><img src="img/contact/sp_img01.gif" alt="" width="15">電話でのお問い合わせ</p>
					<p class="tel"><a href="tel:0120-028-914"><img src="img/contact/sp_img02.jpg" alt="" width="27">0120-028-914</a></p>
					<p>（受付時間AM10:00～PM19:00）</p>
				</div>
                <div class="faxBox"><img src="img/contact/sp_img07.gif" alt="" class="img01 sp" width="8"><img src="img/contact/sp_img08.gif" alt="" class="img02 sp" width="8"><img src="img/contact/sp_img09.gif" alt="" class="img03 sp" width="8"><img src="img/contact/sp_img10.gif" alt="" class="img04 sp" width="8">
                	<p class="txt">FAXでのお問い合わせ<span class="pc">はこちら</span></p>
                    <p class="fax"><span>FAX</span>0570-011-006</p>
                </div>
                <p class="title" id="contact">メールでの<br class="sp">お問い合わせはこちら</p>
			<?php
				switch ($page) {
					case FMAIL_FORM:
				?>
			<?php if($error_flag){
				print "<ul class=\"errorMsg\">\n";
				foreach ($error_msg as $key=>$val) {
					print "<li>".$val."</li>";
				}
				print "</ul>\n";
			}
			?>
			<form method="post" action="#contact" class="mailForm">
				<input type="hidden" name="action" value="action">
                	<div class="tableBox">
                    	<table>
                        	<tbody>
                            	<tr>
                                	<th>お名前<span>※必須</span></th>
                                    <td><input type="text" name="parm[name]" value="<?php echo @$parm['name']; ?>" placeholder="例)山田花子"></td>
                                </tr>
                                <tr>
                                	<th>フリガナ<span>※必須</span></th>
                                    <td class="tdStyle01"><input type="text" name="parm[kana]" value="<?php echo @$parm['kana']; ?>" placeholder="例)ヤマダハナコ"></td>
                                </tr>
                                <tr>
                                	<th>ご住所<span>※必須</span></th>
                                    <td class="tdStyle01">
                                    	<ul class="addressList">
                                        	<li class="zip"><span class="txt">郵便番号</span><input type="text" name="parm[zip1]" value="<?php echo @$parm['zip1']; ?>"><span class="line">-</span><input type="text" name="parm[zip2]" value="<?php echo @$parm['zip2']; ?>"></li>
                                      		<li class="area">
								<select name="parm[area]" >
									<option value="">都道府県を選択</option>
									<option value="北海道" <?php if(@$parm['area']=="北海道"){?> selected <?php }?>>北海道</option>
									<option value="青森県" <?php if(@$parm['area']=="青森県"){?> selected <?php }?>>青森県</option>
									<option value="岩手県" <?php if(@$parm['area']=="岩手県"){?> selected <?php }?>>岩手県</option>
									<option value="宮城県" <?php if(@$parm['area']=="宮城県"){?> selected <?php }?>>宮城県</option>
									<option value="秋田県" <?php if(@$parm['area']=="秋田県"){?> selected <?php }?>>秋田県</option>
									<option value="山形県" <?php if(@$parm['area']=="山形県"){?> selected <?php }?>>山形県</option>
									<option value="福島県" <?php if(@$parm['area']=="福島県"){?> selected <?php }?>>福島県</option>
									<option value="茨城県" <?php if(@$parm['area']=="茨城県"){?> selected <?php }?>>茨城県</option>
									<option value="栃木県" <?php if(@$parm['area']=="栃木県"){?> selected <?php }?>>栃木県</option>
									<option value="群馬県" <?php if(@$parm['area']=="群馬県"){?> selected <?php }?>>群馬県</option>
									<option value="埼玉県" <?php if(@$parm['area']=="埼玉県"){?> selected <?php }?>>埼玉県</option>
									<option value="千葉県" <?php if(@$parm['area']=="千葉県"){?> selected <?php }?>>千葉県</option>
									<option value="東京都" <?php if(@$parm['area']=="東京都"){?> selected <?php }?>>東京都</option>
									<option value="神奈川県" <?php if(@$parm['area']=="神奈川県"){?> selected <?php }?>>神奈川県</option>
									<option value="山梨県" <?php if(@$parm['area']=="山梨県"){?> selected <?php }?>>山梨県</option>
									<option value="長野県" <?php if(@$parm['area']=="長野県"){?> selected <?php }?>>長野県</option>
									<option value="新潟県" <?php if(@$parm['area']=="新潟県"){?> selected <?php }?>>新潟県</option>
									<option value="富山県" <?php if(@$parm['area']=="富山県"){?> selected <?php }?>>富山県</option>
									<option value="石川県" <?php if(@$parm['area']=="石川県"){?> selected <?php }?>>石川県</option>
									<option value="福井県" <?php if(@$parm['area']=="福井県"){?> selected <?php }?>>福井県</option>
									<option value="岐阜県" <?php if(@$parm['area']=="岐阜県"){?> selected <?php }?>>岐阜県</option>
									<option value="静岡県" <?php if(@$parm['area']=="静岡県"){?> selected <?php }?>>静岡県</option>
									<option value="愛知県" <?php if(@$parm['area']=="愛知県"){?> selected <?php }?>>愛知県</option>
									<option value="三重県" <?php if(@$parm['area']=="三重県"){?> selected <?php }?>>三重県</option>
									<option value="滋賀県" <?php if(@$parm['area']=="滋賀県"){?> selected <?php }?>>滋賀県</option>
									<option value="京都府" <?php if(@$parm['area']=="京都府"){?> selected <?php }?>>京都府</option>
									<option value="大阪府" <?php if(@$parm['area']=="大阪府"){?> selected <?php }?>>大阪府</option>
									<option value="兵庫県" <?php if(@$parm['area']=="兵庫県"){?> selected <?php }?>>兵庫県</option>
									<option value="奈良県" <?php if(@$parm['area']=="奈良県"){?> selected <?php }?>>奈良県</option>
									<option value="和歌山県" <?php if(@$parm['area']=="和歌山県"){?> selected <?php }?>>和歌山県</option>
									<option value="鳥取県" <?php if(@$parm['area']=="鳥取県"){?> selected <?php }?>>鳥取県</option>
									<option value="島根県" <?php if(@$parm['area']=="島根県"){?> selected <?php }?>>島根県</option>
									<option value="岡山県" <?php if(@$parm['area']=="岡山県"){?> selected <?php }?>>岡山県</option>
									<option value="広島県" <?php if(@$parm['area']=="広島県"){?> selected <?php }?>>広島県</option>
									<option value="山口県" <?php if(@$parm['area']=="山口県"){?> selected <?php }?>>山口県</option>
									<option value="徳島県" <?php if(@$parm['area']=="徳島県"){?> selected <?php }?>>徳島県</option>
									<option value="香川県" <?php if(@$parm['area']=="香川県"){?> selected <?php }?>>香川県</option>
									<option value="愛媛県" <?php if(@$parm['area']=="愛媛県"){?> selected <?php }?>>愛媛県</option>
									<option value="高知県" <?php if(@$parm['area']=="高知県"){?> selected <?php }?>>高知県</option>
									<option value="福岡県" <?php if(@$parm['area']=="福岡県"){?> selected <?php }?>>福岡県</option>
									<option value="佐賀県" <?php if(@$parm['area']=="佐賀県"){?> selected <?php }?>>佐賀県</option>
									<option value="長崎県" <?php if(@$parm['area']=="長崎県"){?> selected <?php }?>>長崎県</option>
									<option value="熊本県" <?php if(@$parm['area']=="熊本県"){?> selected <?php }?>>熊本県</option>
									<option value="大分県" <?php if(@$parm['area']=="大分県"){?> selected <?php }?>>大分県</option>
									<option value="宮崎県" <?php if(@$parm['area']=="宮崎県"){?> selected <?php }?>>宮崎県</option>
									<option value="鹿児島県" <?php if(@$parm['area']=="鹿児島県"){?> selected <?php }?>>鹿児島県</option>
									<option value="沖縄県" <?php if(@$parm['area']=="沖縄県"){?> selected <?php }?>>沖縄県</option>
								</select>
                                            </li>
                                            <li class="address"><input type="text" name="parm[address01]" value="<?php echo @$parm['address01']; ?>" placeholder="例)〇〇区〇〇町"></li>
                                            <li class="address"><input type="text" name="parm[address02]" value="<?php echo @$parm['address02']; ?>" placeholder="例)○○-○○-○○  ○○マンション○○号"></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                	<th>メールアドレス<span>※必須</span></th>
                                    <td><input type="text" name="parm[input_main_em]" value="<?php echo @$parm['input_main_em']; ?>" placeholder="例)xxxxxxx@co.jp" class="style01"></td>
                                </tr>
                                <tr>
                                	<th>メールアドレス(確認用)<span>※必須</span></th>
                                    <td><input type="text" name="parm[input_main_emc]" value="<?php echo @$parm['input_main_emc']; ?>" placeholder="例)xxxxxxx@co.jp" class="style01"></td>
                                </tr>
                                <tr>
                                	<th>お電話番号<span>※必須</span></th>
                                    <td><input type="text" name="parm[input_main_tp]" value="<?php echo @$parm['input_main_tp']; ?>" placeholder="例)0000000"></td>
                                </tr>
                                <tr>
                                	<th class="thStyle01">お問合わせ内容<span>※必須</span></th>
                                    <td class="lastTd"><textarea name="parm[content]" cols="3" rows="3" placeholder="例)ご質問があればご記入ください。"><?php echo @$parm['content']; ?></textarea></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <ul class="redList">
                    	<li>＊土・日・祝日、年末年始、夏期休業日は営業時間外になりますので、お休み明けのお返事とさせていただきます。</li>
                        <li>＊お問い合せの内容により、お返事にお時間をいただく場合もございますので、あらかじめご了承くださいませ。</li>
                        <li>＊FAX・お問合せフォームからのご質問につきまして、万が一１週間経過しても返答がない場合は、<br class="pc">たいへんお手数ですがカスタマーサービスまでご連絡ください。</li>
                    </ul>
                    <ul class="submit">
                    	<li>
							<input id="confirmBtn" type="submit" value="上記の内容で確認する" name="__send__">
						</li>
                    </ul>
			</form>
			<?php
		 break;
			case FMAIL_PRIVE:
		?>
			<form method="post" action="#contact" class="mailForm" id="form">
			<input type="hidden" name="action" id="action" value="edit">
			<input type="hidden" name="parm[name]" value="<?php echo @$parm['name']; ?>">
			<input type="hidden" name="parm[kana]" value="<?php echo @$parm['kana']; ?>">
			<input type="hidden" name="parm[zip1]" value="<?php echo @$parm['zip1']; ?>">
			<input type="hidden" name="parm[zip2]" value="<?php echo @$parm['zip2']; ?>">
			<input type="hidden" name="parm[area]" value="<?php echo @$parm['area']; ?>">
			<input type="hidden" name="parm[address01]" value="<?php echo @$parm['address01']; ?>">
			<input type="hidden" name="parm[address02]" value="<?php echo @$parm['address02']; ?>">
			<input type="hidden" name="parm[input_main_em]" value="<?php echo @$parm['input_main_em']; ?>">
			<input type="hidden" name="parm[input_main_tp]" value="<?php echo @$parm['input_main_tp']; ?>">
			<input type="hidden" name="parm[content]" value="<?php echo @$parm['content']; ?>">
				<div class="tableBox tableBox02">
                    	<table>
                        	<tbody>
                            	<tr>
                                	<th>お名前<span>※必須</span></th>
                                    <td><?php echo @$parm['name']; ?></td>
                                </tr>
                                <tr>
                                	<th>フリガナ<span>※必須</span></th>
                                    <td class="tdStyle01"><?php echo @$parm['kana']; ?></td>
                                </tr>
                                <tr>
                                	<th>ご住所<span>※必須</span></th>
                                    <td class="tdStyle01">
                                    	<ul class="addressList">
                                        	<li class="zip"><?php echo @$parm['zip1']; ?>-<?php echo @$parm['zip2']; ?></li>
                                      		<li class="area"><?php echo @$parm['area']; ?></li>
                                            <li class="address"><?php echo @$parm['address01']; ?></li>
                                            <li class="address"><?php echo @$parm['address02']; ?></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                	<th>メールアドレス<span>※必須</span></th>
                                    <td><?php echo @$parm['input_main_em']; ?></td>
                                </tr>
                                <tr>
                                	<th>メールアドレス(確認用)<span>※必須</span></th>
                                    <td><?php echo @$parm['input_main_emc']; ?></td>
                                </tr>
                                <tr>
                                	<th>お電話番号<span>※必須</span></th>
                                    <td><?php echo @$parm['input_main_tp']; ?></td>
                                </tr>
                                <tr>
                                	<th class="thStyle01">お問合わせ内容<span>※必須</span></th>
                                    <td class="lastTd"><?php echo nl2br(@$parm['content']); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
			</form>
			<?php
				break;
					case FMAIL_THANK:
				?>
			<?php
					break;
				}
				?>

            </div>
			<div class="mainBox">
				<div class="pageTop"><a href="#gHeader"><img class="pc" src="img/common/page_top.gif" alt="pageTop"><img class="sp" src="img/common/sp_page_top.gif" alt="pageTop"></a></div>
			</div>
		</div>
	</section><!-- #BeginLibraryItem "/Library/footer.lbi" --><footer id="gFooter">
		<div class="fBox clearfix">
			<div class="lBox">
				<p><span class="txtSpan">電話でのお問い合わせはこちら</span><span class="telSpan">TEL<a href="tel:0120028914"><span>0120-028-914</span></a></span>OPEN 10:00-19:00 </p>
				<div class="fLogo"><a href="./"><img class="pc" src="img/common/f_logo.png" alt="暮らしに、未来に、ハッピーな驚きを。WONDER &amp; CO"><img class="sp" src="img/common/sp_f_logo.png" alt="暮らしに、未来に、ハッピーな驚きを。WONDER &amp; CO"></a></div>
			</div>
			<ul class="fNavi pc clearfix">
				<li>
					<ul class="navi">
						<li><a href="./">・ トップ</a></li>
						<li><a href="about.html">・ ワンダーとは</a></li>
						<li><a href="commitment.html">・ ISISのこだわり</a></li>
						<li><a href="franchise.html">・ フランチャイズ SAIVI</a></li>
						<li><a href="faq.html">・ よくあるご質問</a></li>
						<li><a href="contact.php">・ お問い合わせ</a></li>
					</ul>
				</li>
				<li>
					<ul class="navi">
						<li><a href="cosmetics.html">・ コスメライン ISIS</a></li>
						<li><a href="news.html"><span>イシス シルクジェリー</span></a></li>
						<li><a href="news02.html"><span>イシス シルクシャワー</span></a></li>
						<li><a href="news03.html"><span>パーフェクトケア O2パック</span></a></li>
					</ul>
				</li>
				<li>
					<ul class="navi">
						<li><a href="news04.html"><span>SCパーフェクトケアエキス</span></a></li>
						<li><a href="news05.html"><span>イシス ライン</span></a></li>
						<li><a href="news06.html"><span>イシス ダイヤモンドセルエッセンス</span></a></li>
						<li><a href="news07.html"><span>UVセラム&amp;ベースクリーム</span></a></li>
					</ul>
				</li>
				
			</ul>
		</div>
		<ul class="fNavi sp">
			<li><a href="./"><span>トップ</span></a></li>
			<li><a href="about.html"><span>ワンダーとは</span></a></li>
			<li><a href="commitment.html"><span>ISISのこだわり</span></a></li>
			<li class="fUl"><a href="cosmetics.html"><span>コスメライン ISIS</span></a><span class="iconImg sp"><img class="open" src="img/common/icon12.png" alt="+"><img class="close" src="img/common/icon13.png" alt="-"></span>
				<ul class="fList">
					<li><a href="news.html">イシス シルクジェリー</a></li>
					<li><a href="news02.html">イシス シルクシャワー</a></li>
					<li><a href="news03.html">パーフェクトケア O2パック</a></li>
					<li><a href="news04.html">SCパーフェクトケアエキス</a></li>
					<li><a href="news05.html">イシス ライン</a></li>
					<li><a href="news06.html">イシス ダイヤモンドセルエッセンス</a></li>
					<li><a href="news07.html">UVセラム&amp;ベースクリーム</a></li>
				</ul>
			</li>
			<li><a href="franchise.html"><span>フランチャイズ SAIVI</span></a></li>
			<li><a href="faq.html"><span>よくあるご質問</span></a></li>
			<li><a href="contact.php"><span>お問い合わせ</span></a></li>
		</ul>
		<div class="fLink"><a href="https://www.instagram.com/wonder_co_/" target="_blank"><img class="pc" src="img/common/f_img.png" alt="公式Instagram"><img class="sp" src="img/common/sp_f_img.png" alt="公式Instagram"></a></div>
        <!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120058027-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-120058027-1');
        </script>
		<div class="copyright"><p>Copyright &copy; WONDER & CO All rights reserved.</p></div>
	</footer><!-- #EndLibraryItem --></div>
</body>
</html>
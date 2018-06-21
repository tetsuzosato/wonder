<?php 
include_once ('contact/functions.php');
if(empty($_SESSION['form'])){
    header("Location:index.php");
    exit();
}else{
    $parm=$_SESSION['form'];
}
?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="format-detection" content="telephone=no">
<meta name="description" content="化粧品メーカー「WONDER&CO(ワンダー)」のお客様から頂いた質問にお答えします。『ISIS(イシス)』の化粧品に関する疑問や『SAIVI(サイビ)』の導入に関する不明な点などありましたらお気軽にお問い合わせください。">
<meta name="keywords" content="WONDER&CO,ワンダー,ISIS,SAIVI,化粧品メーカー,エステティックサロン,">
<title>確認画面 | WONDER&amp;CO【エステ・化粧品】</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="js/jquery.js"></script>
<script src="js/common.js"></script>
<script src="js/jquery.matchHeight.js"></script>
<script>
$(document).ready(function(){
	$("#editform").click(function(){
		$("#action").val('edit');
                $('#form').submit();
	});
	$("#submitform").click(function(){
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
			<form class="mailForm" method="post" action="contact.php#contact" id="form">
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
				<div class="tableBox tableBox02" id="contact">
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
				<ul class="submit submit02 clearfix">
					<li>
						<input id="editform" type="submit" name="_retry_input__" value="修正する">
					</li>
					<li>
						<input id="submitform" type="submit" name="__send__" value="上記の内容で送信する">
					</li>
				</ul>
			</form>
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
<?php

function draw( $point ) {
  // テストだし…
  global $im;
  global $black;
  global $white;
  //global $gray;

  // 描画
  imagefilledpolygon($im, $point, 4, $black);
  imagepolygon($im, $point, 4, $white);
}

// 文字列を受け取る
$p = @$_GET['p'];
// ざっくりとvalidate

// 描画する
// -------------------------------

// お絵かき領域の作成
//$im = imagecreatetruecolor(320, 320);
$im = imagecreatetruecolor(321, 321);
// 色の作成
$black = imagecolorallocate($im, 0,0,0);
$white = imagecolorallocate($im, 255, 255, 255);
//$gray = imagecolorallocate($im, 150, 150, 150);

/*
３レベル(一番外側)
	左の壁
	正面左左
	正面左
	正面
	正面右
	正面右右
	右の壁
*/


/*
２レベル(一回り外側)
*/
// 正面左
draw(array(99,99, 99, 219, -1,219, -1,99));
// 正面の壁
draw(array(99,99, 219,99, 219,219, 99, 219));
// 正面右
draw(array(219,99, 360,99, 369,219, 219,219));
// 左の壁
draw(array(99,99, 99, 219, 59,259, 59,59));
// 右の壁
draw(array(219,99, 219,219, 259,259, 259,59));

/*
１レベル(一番内側)
*/
// 正面の壁
draw(array(59,59, 259,59, 259,259, 59,259));
// 左の壁
draw(array(0,0, 59,59, 59,259, 0,319));
// 右の壁
draw(array(319,0, 259,59, 259,259, 319, 319));

// 出力
header ('Content-Type: image/png');
imagepng($im);

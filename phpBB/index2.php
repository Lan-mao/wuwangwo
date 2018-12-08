<?php

$message = '<p style="text-align:center;"><img alt="" class="rd-article-img-1" src="http://img.randianah.com/website/official/leash01.jpg"></p>

<p class="first-line-indent-2">我们想为狗找些合适的运动。也许这可以改善狗的运动能力，</p>

<div class="ckeditor-html5-video" data-responsive="true" style="text-align:center;">
<video autoplay="autoplay" controls="controls" loop="loop" src="http://img.randianah.com/website/official/KbFEw/ds-fallover.mp4" style="height:auto;max-width:100%;"></video>
</div>

<p class="first-line-indent-2">也许我们想开发它们隐藏的令人惊讶的运动天赋，</p>

<div class="ckeditor-html5-video" data-responsive="true" style="text-align:center;">
<video autoplay="autoplay" controls="controls" loop="loop" src="http://img.randianah.com/website/official/KbFEw/ds-dogbalance.mp4" style="height:auto;max-width:100%;"></video>
</div>

<p class="first-line-indent-2">也许我们想用运动改善它们令人担忧的行为习惯，也许我们只是想和它们一起享受愉快的运动时光。</p>';


$newc = 'red';

$message = preg_replace('~<img([^>]*)>~', "<mip-img$1></mip-img>", $message);
$message = str_replace('<video', "<mip-video", $message);
$message = str_replace('</video>', "</mip-video>", $message);

echo $message;

phpinfo();


//usage example
//resize_crop_image(192, 192, "1425883769584.jpg", "test.jpg");

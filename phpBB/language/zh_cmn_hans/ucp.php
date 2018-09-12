<?php
/**
 *
 * This file is part of the phpBB Forum Software package.
 * @简体中文语言　David Yin <https://www.g2soft.net/>
 *
 * @copyright (c) phpBB Limited <https://www.phpbb.com>
 * @license       GNU General Public License, version 2 (GPL-2.0)
 *
 * For full copyright and license information, please see
 * the docs/CREDITS.txt file.
 *
 */

/**
 * DO NOT CHANGE
 */
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

// Privacy policy and T&C
$lang = array_merge($lang, array(
	'TERMS_OF_USE_CONTENT' => '<h2>燃点爱好用户服务使用协议</h2>

<h3>1、服务条款的确认和接纳</h3>

<p>燃点爱好，网址：randianah.com，以下简称&ldquo;本平台&rdquo;。用户承诺在仔细阅读和完全接受《燃点爱好用户服务使用协议》（以下简称&ldquo;本协议&rdquo;）项下全部条款的基础上使用本平台的各项服务。用户点击&quot;注册&quot;或&quot;登录&quot;按钮进行注册或登录，即表示完全接受以上述及的所有条款。</p>

<p>燃点爱好可能根据法律法规的要求或业务运营的需要，对本协议服务条款不时进行增加、删减、修改及/或补充（以下统称&ldquo;修改&rdquo;）。除非另有规定，否则任何修改将在该等修改内容发布之时立即生效，您对本平台的注册、使用、及继续使用均表明您接受此等修改。如果您不同意本协议服务条款（包括本平台可能不定时对其或其中引述的其他规则所进行的任何修改）的任一规定，则请勿注册或使用本平台，或您可以主动取消本平台提供的服务。</p>

<p>为了便于您了解适用于您的条款和条件，燃点爱好将在本平台上发布燃点爱好对本协议服务条款的修改，您应不时地审阅本协议服务条款以及经参引而并入其中的其他规则。</p>

<h3>2、服务说明</h3>

<p>燃点爱好运用自己的操作系统通过国际互联网络为用户提供各项服务，是一家网络服务提供商，且这种服务是免费的。用户必须：</p>

<p>（1）提供设备，包括个人电脑一台、调制解调器一个及配备上网装置。</p>

<p>（2）个人上网和支付与此服务有关的电话费用。</p>

<p>考虑到本平台产品服务的重要性，用户同意：</p>

<p>（1）提供设备，包括个人电脑一台、调制解调器一个及配备上网装置。</p>

<p>（2）不断更新注册资料，符合及时、详尽准确的要求。所有原始键入的资料将引用为注册资料。</p>

<p>（3）燃点爱好保留随时变更、中断或终止部分或全部网络服务的权利。</p>

<p>用户可授权燃点爱好向第三方透露其注册资料，否则燃点爱好不能公开用户的姓名、住址、出件地址、电子邮箱、账号。除非：</p>

<p>（1）用户要求本平台或授权某人通过电子邮件服务或其他方式透露这些信息。</p>

<p>（2）相应的法律、法规要求及程序服务需要本平台提供用户的个人资料。</p>

<p>用户在注册账号或使用本平台服务的过程中，可能需要填写一些必要的信息。若国家法律法规有特殊规定的，用户需要填写真实的身份信息。若您填写的信息不完整，则无法使用本平台服务或在使用过程中受到限制。</p>

<p>用户应当为自己提供资料的合法性负责，如果用户提供的资料不准确，不真实，不合法或无效，燃点爱好保留中断直至终止用户使用燃点爱好部分或全部服务的权利。</p>

<p>用户在享有燃点爱好各项服务的同时，同意接受燃点爱好提供的各类信息服务。</p>

<h3>3、使用规则</h3>

<p>（1）用户在申请使用燃点爱好提供的网络服务时，必须向燃点爱好提供准确的个人资料，如个人资料有任何变动，必须及时更新。若您填写的信息不完整或不准确，则无法使用本平台服务或在使用过程中受到限制。</p>

<p>（2）用户注册成功后，燃点爱好将给予您一个用户账号及相应的密码，该用户账号和密码由用户负责保管；用户应当对以其用户账号进行的所有言论、行为、活动和事件承担法律责任。</p>

<p>&nbsp;&nbsp;用户的账号名称应当符合《互联网用户账号名称管理规定》之规定，在账号名称、头像和简介等注册信息中不得出现违法和不良信息。燃点爱好对用户提交的账号名称、头像和简介等注册信息有权进行审核，对含有违法和不良信息的，不予注册。对于已经注册的含有违法或者不良信息的账号名称、头像、简介，燃点爱好有权采取通知限期改正、暂停使用、注销登记等措施，造成的后果由用户自行承担。对冒用、关联机构或社会名人注册账号名称的，燃点爱好有权注销其账号，并向互联网信息内容主管部门报告。</p>

<p>&nbsp;&nbsp;燃点爱好对用户提交的账号名称等信息予以审核通过并不代表网站对其予以任何批准、许可、授权、同意或者支持，用户仍然应当自行承担其法律责任，且网站保留进行后续不时审核并予以处理的权利。</p>

<p>&nbsp;&nbsp;燃点爱好保护用户信息及公民个人隐私，自觉接受社会监督，及时处理公众举报的账号名称、头像和简介等注册信息中的违法和不良信息。</p>

<p>（3）用户在使用燃点爱好某些频道时，燃点爱好需要对用户身份进行特别验证，具体的验证方式以各频道页面显示为准。</p>

<p>（4）用户在使用燃点爱好服务，应当爱国、守法、自律、真实、文明，必须遵循以下原则：</p>

<p>&nbsp;&nbsp;(a) 遵守法律法规、社会主义制度、国家利益、公民合法权益、公共秩序、社会道德风尚和信息真实性等七条底线；</p>

<p>&nbsp;&nbsp;(b) 不得为任何非法目的而使用网络服务系统；</p>

<p>&nbsp;&nbsp;(c) 遵守所有与网络服务有关的网络协议、规定和程序；</p>

<p>&nbsp;&nbsp;(d) 不得利用燃点爱好服务系统进行任何可能对互联网的正常运转造成不利影响的行为；</p>

<p>&nbsp;&nbsp;(e) 不得利用燃点爱好服务系统传输任何骚扰性的、中伤他人的、辱骂性的、恐吓性的、庸俗淫秽的或其他任何非法的信息资料；</p>

<p>&nbsp;&nbsp;(f) 不得利用燃点爱好服务系统进行任何不利于燃点爱好的行为。</p>

<p>（6）燃点爱好用户账号的有效期为3个月。如果一个燃点爱好用户账号在任意连续九十日不曾使用该账号，即在该任意连续九十日未以该账号名义登录燃点爱好，则该账号有可能被新的用户注册，届时该账号原有信息将全部丢失。</p>

<p>（7）用户不得以任何形式和任何目的对注册账号和所发布的信息进行有偿交易。一经发现，燃点爱好有权删除交易相关的所有注册账号极其发布的相关信息。</p>

<h3>4、用户隐私制度</h3>

<p>尊重用户个人隐私是燃点爱好的一项基本政策。燃点爱好将按照本协议及《隐私政策》（链接地址：http://randianah.com/about/falv.htm ）的规定收集、使用、储存和分享您的个人信息。本协议对个人信息保护规定的内容与上述《隐私政策》有相冲突的，及本协议对个人信息保护相关内容未作明确规定的，以《隐私政策》的内容为准。如您对《隐私政策》、您的信息的相关事宜有任何问题、意见或建议，以及有关协议或燃点爱好的隐私措施的问题请与我们联系。</p>

<p>燃点爱好不会未经您的同意将您的个人信息转移或披露给任何非关联的第三方，除非燃点爱好在诚信的基础上认为透露这些信息在以下几种情况是必要的：</p>

<p>（1）遵守有关法律法规的规定，或法院、公安部门等政府机关有权部门要求。</p>

<p>（2）遵从燃点爱好产品服务程序或提供本平台服务的必要。</p>

<p>（3）在紧急情况下竭力维护用户个人和社会大众的隐私安全。</p>

<p>（4）为完成燃点爱好合并、分立、收购或资产转让而转移。</p>

<p>（5）为维护燃点爱好的利益或燃点爱好认为必要的其他情况下。</p>

<p>用户在此授权燃点爱好可以向其电子邮箱发送商业信息。</p>

<p>燃点爱好将运用各种安全技术和程序建立完善的管理制度来保护用户的个人信息，以免遭受未经授权的访问、使用或披露。</p>

<h3>5、用户的账号、密码和安全性</h3>

<p>您一旦注册成功成为用户，您将得到一个密码和账号。如果您未保管好自己的账号和密码而对您、燃点爱好或第三方造成的损害，您将承担全部责任。</p>

<p>每个用户都要对其账号中的所有言论、行为、活动和事件承担全部责任。您可随时改变您的密码和图标，也可以结束旧的账号重开一个新账号。用户同意若发现任何非法使用用户账号或安全漏洞的情况，立即通告燃点爱好。</p>

<h3>6、免责声明</h3>

<p>用户明确同意使用本平台服务的使用所存在的风险将完全由您自己承担，因用户使用燃点爱好服务而产生的一切后果也由您自己承担，燃点爱好对您不承担任何责任。若燃点爱好已经明示其网络服务提供方式发生变更并提醒您应当注意事项，您未按要求操作所产生的一切后果亦由您自行承担。</p>

<p>燃点爱好明确表示不提供任何类型的保证，不论是明确的或隐含的。包括并不限于：</p>

<p>&nbsp;&nbsp;（1）不保证服务一定能满足您的要求或您的使用预期。</p>

<p>&nbsp;&nbsp;（2）不保证服务不会中断，且对服务的及时性、安全性、准确性都不作保证。</p>

<p>&nbsp;&nbsp;（3）不保证信息能够准确、及时、顺利地传送。</p>

<p>&nbsp;&nbsp;（4）对于本平台服务包含的或用户经由或从任何与本平台服务有关的途径所获得的任何内容、信息或广告，不保证其正确性或可靠性。</p>

<p>&nbsp;&nbsp;（5）对于用户经本平台上的信息、广告、展示而购买、取得的任何产品或服务，均不承担任何保证责任。用户须对相关信息自行甄别并自行承担相应风险。</p>

<p>燃点爱好对由于下列原因导致的直接的、间接的、偶然的、惩罚性的及继发的损害不承担责任：</p>

<p>&nbsp;&nbsp;（1）不正当使用本平台产品服务；</p>

<p>&nbsp;&nbsp;（2）在网上购买商品或类似服务；</p>

<p>&nbsp;&nbsp;（3）在网上进行交易；</p>

<p>&nbsp;&nbsp;（4）非法使用本平台服务；</p>

<p>&nbsp;&nbsp;（5）用户传送的信息有所变动。</p>

<h3>7、未经燃点爱好同意禁止进行商业性行为</h3>

<p>用户承诺未经燃点爱好书面同意，不得利用燃点爱好各项服务在燃点爱好或相关网站上进行销售或其他商业性行为。用户违反此约定，燃点爱好将依法追究其违约责任，由此给燃点爱好造成损失的，燃点爱好有权进行追偿。</p>

<h3>8、信息的储存及限制</h3>

<p>燃点爱好对本平台上所有服务将尽力维护其安全性及方便性，但对服务中出现信息删除或储存失败不承担任何责任。</p>

<p>用户理解并接受是否下载或通过燃点爱好产品服务取得任何信息资料取决于用户自己，并由用户自行承担系统受损或资料丢失的所有风险和责任.</p>

<p>燃点爱好保留在任何时候为任何理由而不经通知地过滤、移除、筛查或编辑本平台上发布或存储的任何内容的权利，用户须自行负责备份和替换在本平台发布或存储的任何内容，成本和费用自理。</p>

<p>燃点爱好用户账号的有效期为3个月。如果一个燃点爱好用户账号在任意连续九十日不曾使用，即在该任意连续九十日未以该账号名义登录燃点爱好，则该账号有可能被新的用户注册，届时该账号原有信息将全部丢失，所有信息或资料丢失的风险由用户自行承担。</p>

<p>燃点爱好保留判定用户的行为是否符合燃点爱好服务条款要求的权利，如果用户违背了本平台服务条款的规定，燃点爱好将会中断、终止该用户本平台部分或全部服务直至注销该用户本平台注册账号。</p>

<h3>9、保障</h3>

<p>用户同意保障和维护燃点爱好全体成员的利益，负责支付由于您在使用过程中超出服务范围及/或违反服务条款而引起纠纷的损害补偿费用及律师费用，其他人使用您的电脑、账号和其它知识产权的追索费。</p>

<h3>10、结束服务</h3>

<p>用户或燃点爱好可随时根据实际情况中断服务。燃点爱好有权随时修改、中断及/或终止全部或部分服务而无须不需对任何用户或第三方负责。用户若反对本协议任何服务条款的建议或对后来的条款修改有异议，或对燃点爱好服务不满，用户可以不再使用燃点爱好服务。结束用户服务后，用户使用燃点爱好服务的权利立即终止。从该时起，燃点爱好不再对用户承担任何义务。</p>

<h3>11、通告</h3>

<p>所有发给用户的通告都可通过电子邮件或常规的信件或网页公告的方式通知或公布。燃点爱好会通过邮件服务或网页公告或燃点爱好认为适当的方式发送消息给用户，告知您服务条款的修改、服务变更及/或其它重要事项。燃点爱好通过以上任一方式向用户发报消息后，用户未在3日内通过书面方式提出异议，视为接受新消息的内容。同时，燃点爱好保留对用来申请燃点爱好用户注册的电子邮箱投放商业性广告的权利。</p>

<h3>12、参与广告策划</h3>

<p>燃点爱好同意并许可，用户可在您发表的信息中加入宣传资料或参与广告策划，在燃点爱好各项免费服务上展示您的产品。任何这类促销方法，包括运输货物、付款、服务、商业条件、担保及与广告有关的描述都只是在相应的用户和广告销售商之间发生，燃点爱好不承担任何责任。燃点爱好没有任何义务为这类广告及/或销售承担任何责任，也不从中获取任何利益。</p>

<h3>13、知识产权</h3>

<p>用户保证和声明对其所提供的作品拥有完整的合法的著作权，保证燃点爱好使用该作品不违反国家的法律法规，也不侵犯任何第三方的合法权益或承担任何义务。用户应对其所提供作品因形式、内容及授权的不完善、不合法所造成的一切后果承担完全责任。用户同意燃点爱好对其上传作品在全世界范围内享有免费的、永久性的、不可撤消的、独家的和完全的许可使用和再许可的权利。此许可和再许可权利包括但不限于此作品的著作权、邻接权及获得利益等权利。</p>

<p>燃点爱好保留对其网站所有内容进行实时监控的权利，并有权依其自主判断对任何违反本协议约定的作品实施删除。燃点爱好对于删除用户作品引起的任何后果或导致用户的任何损失不负任何责任。</p>

<p>因用户作品的违法或侵害第三人的合法权益而导致燃点爱好或其关联方对第三方承担任何性质的赔偿、补偿或罚款而遭受损失（直接的、间接的、偶然的、惩罚性的和继发的损失，包括但不限于燃点爱好为此而支出的律师费、公证费、差旅费），用户对于燃点爱好或其关联方蒙受的上述损失承担全部赔偿责任。</p>

<h3>14、内容的所有权</h3>

<p>内容的定义包括：文字，软件，图片，图形，图表，音频，视频，网页，域名；广告中的全部内容；电子邮件的全部内容；燃点爱好平台服务为用户提供的商业信息，所有这些内容均受版权、商标、标识和其它财产所有权法律的保护。用户只能在燃点爱好及/或相关权利人的授权下才能使用这些内容，而不能擅自复制、再造这些内容、或创造与内容有关的派生产品。</p>

<h3>15、适用法律及争议管辖</h3>

<p>用户和燃点爱好一致同意有关本协议以及使用燃点爱好的服务产生的争议均适用中华人民共和国法律交由燃点爱好住所地有管辖权的法院诉讼解决。</p>

<h3>16、未成年人用户特别提示</h3>

<p>燃点爱好鼓励父母或监护人指导未满十八岁的未成年人使用燃点爱好的服务。燃点爱好建议未成年人鼓励您的父母或监护人阅读本协议，并建议未成年人在提交注册使用本平台服务之前寻求父母或监护人的指导和同意。</p>

<p>未成年人用户必须遵守全国青少年网络文明公约：</p>

<p>要善于网上学习，不浏览不良信息；</p>

<p>要增强自护意识，不随意约会网友；</p>

<p>要维护网络安全，不破坏网络秩序；</p>

<p>要有益身心健康，不沉溺虚拟时空。</p>

<h3>17、其他</h3>

<p>（1）燃点爱好将视向用户所提供服务内容之特性，要求用户在注册燃点爱好提供的有关服务时，遵守特定的条件和条款；如该等条件和条款与以上服务条款有任何不一致之处，则以该等条件和条款为准。</p>

<p>（2）若本协议有任何服务条款与法律相抵触，则该等条款将按尽可能接近的方法重新解析，而本协议其他条款仍持续对用户具有法律效力和影响。</p>

<p>（3）本协议中的任何条款无论因何种原因完全或部分无效或不具有执行力，本协议的其余条款仍应有效并且有约束力。</p>
',
	'PRIVACY_POLICY'		=> '<h2>燃点爱好隐私政策</h2>

<p class="first-line-indent-2">本《隐私政策》（以下简称「本政策」）阐述了燃点爱好将如何处理您的个人信息和隐私信息，并申明了燃点爱好对保护隐私的承诺，燃点爱好未来有可能根据信息处理情境不时更新或修改本政策。请您在向燃点爱好提交个人信息或隐私信息之前，阅读、了解并同意本政策和任何补充政策。本隐私政策要点如下：</p>

<ul>
	<li>我们会逐一说明我们对个人信息收集、使用、保护等处理的情况，以便您能够了解个人信息的概况。</li>
	<li><strong>当您注册燃点爱好帐号和使用我们的服务时，我们会根据您的同意和提供服务的需要，收集您的姓名、性别、年龄、个人资料照片或视频、身份证号、电话号码、电子邮件、社交帐号、身份验证信息、位置信息和日志信息等个人信息。</strong></li>
	<li><strong>除了产品的核心功能外，燃点爱好提供一些附加功能来提升用户体验，包括：消息设置、邮件设置、推送通知设置、燃点爱好实验室等。当您使用燃点爱好的附加功能时，我们不会额外收集您的个人信息，除非根据本政策告知并取得您的同意。</strong></li>
	<li><strong>当您在未登录状态下时，将显示为「游客」。为了更好地为您提供便捷流畅的社区体验，「游客」同样可以进行关注、点赞、收藏等基础社区行为。为了方便您查阅这些过往信息，我们需要获取您的设备号(IMEI码)以便记录存档。</strong></li>
	<li>目前，除法律法规、法律程序、诉讼或政府主管部门强制性要求外，燃点爱好不会主动公开披露您的个人信息，如果存在其他需要公开披露个人信息的情形，我们会征得您的明示同意。同时，我们保证披露采取符合法律和业界标准的安全防护措施。</li>
	<li>您可以通过本隐私政策所列的途径访问、更正或删除您的个人信息，也可以进行隐私设置或与我们取得联系。</li>
</ul>

<p class="first-line-indent-2">您使用或继续使用我们的服务，即意味着同意我们按照本《隐私政策》收集、使用、储存、共享、转让和公开披露您的相关信息。</p>

<h3>1. 我们收集的个人信息</h3>

<p class="first-line-indent-2">个人信息是指以电子或者其他方式记录的能够单独或者与其他信息结合识别自然人个人身份的各种信息，包括但不限于自然人的姓名、出生日期、身份证件号码、个人生物识别信息、住址、电话号码等。此类信息会在您注册和使用我们的服务时被收集，燃点爱好仅会出于本政策所述以下目的收集和使用您的个人信息：</p>

<h4>1.1 您直接提供和我们自动采集的个人信息</h4>

<ul>
	<li>注册信息。您使用燃点爱好提供的服务，可以注册并登录经注册的燃点爱好帐号。此时，<strong>您需要向我们提供以下信息：帐号名称、头像（如有）和手机号码等。</strong>提供上述信息并同意注册协议和本政策后，您可以使用燃点爱好的核心业务功能，包括：浏览燃点爱好平台内的内容、发布信息、回答、评论、评价等。<strong>在您注册燃点爱好帐号时，我们会使用手机号码对您进行实名验证，如您拒绝提供手机号码或进行实名验证，您仍可浏览部分燃点爱好平台内的内容，但将无法发布内容、评论、评价等信息发布服务。</strong></li>
	<li>附加信息。当您使用燃点爱好附加业务功能时，为满足向您提供该产品和服务之目的，除注册信息外，您还需要进一步向我们提供包括但不限于您的个人身份信息、位置信息及其他为您提供服务所必需的信息，如果您不使用特定产品和服务，则无需提供相关信息（以下将详细阐明）。
	<ul>
		<li><strong>位置信息。当您开启设备定位功能并使用我们基于位置提供的相关服务时，我们会收集有关您位置的信息。该信息属于敏感信息，拒绝提供该信息仅会使您无法使用与位置信息相关的功能，但不影响您正常使用燃点爱好的其他功能。</strong></li>
		<li><strong>关键词信息。当您使用燃点爱好提供的搜索服务时，我们会收集您的查询关键字信息、设备信息等，</strong>为了提供高效的搜索服务，这些信息有部分会暂时存储在您的本地存储设备之中。<strong>该等关键词信息通常无法单独识别您的个人身份，不属于您的个人信息，不在本政策的限制范围内。</strong>只有当您的搜索关键词信息与您的其他信息互有联系并可以识别您的个人身份时，则在结合使用期间，我们会将您的搜索关键词信息作为您的个人信息，与您的搜索历史记录一同按照本政策对其进行处理与保护。</li>
		<li><strong>真实身份信息。当您使用燃点爱好提供的身份认证服务时，我们会收集您的姓名、身份证号、职业、有关身份证明等信息。如果您不提供这些信息，我们将无法提供相关服务。</strong></li>
		<li><strong>联系方式信息。当您向燃点爱好进行帐号申诉或参与营销活动时，为了方便与您联系或帮助您解决问题，我们会收集并记录您的姓名、手机号码、电子邮件及其他联系方式等个人信息。如您拒绝提供上述信息，我们可能无法向您及时反馈投诉结果或向您邮寄礼品（如有）。</strong></li>
		<li><strong>用户共享的信息。当您在燃点爱好中使用第三方提供的服务时，您同意燃点爱好允许该第三方收集您的帐号名称、头像及其他提供服务所必须的个人信息。如果您拒绝第三方在提供服务时收集上述信息，将可能导致您无法在燃点爱好中使用该第三方服务。</strong></li>
	</ul>
	</li>
</ul>

<h4>1.2 我们可能从第三方获取您个人信息的情形</h4>

<p class="first-line-indent-2">您也可以使用第三方帐号（如微信、微博）登录燃点爱好。<strong>此时您可选择授权燃点爱好在符合相关法律和法规规定的前提下读取您在该第三方平台上登记、公布、记录的公开信息（包括但不限于昵称、头像、关注用户列表等）。</strong>对于我们要求但第三方无法提供的个人信息，我们仍可以要求您补充提供。燃点爱好可能从第三方获取您的上述信息的目的是为了记住您作为燃点爱好用户的登录身份，并向您提供个性化推荐，以便于燃点爱好向您提供更优质的产品服务。您可以在使用第三方帐号登录燃点爱好时选择授权燃点爱好可获取的个人信息的范围，或在使用燃点爱好的过程中通过【帐号与安全-社交帐号绑定】设置拒绝或管理燃点爱好获取您个人信息的权限。<strong>但请注意，如果停止某些权限，您有可能无法享受最佳的服务体验，某些服务也可能无法正常使用。</strong></p>

<h4>1.3 征得授权同意的例外</h4>

<p class="first-line-indent-2">根据相关法律法规的规定，以下情形中收集您的个人信息无需征得您的授权同意：</p>

<p><strong>（1）涉及国家安全与利益、社会公共利益；</strong></p>

<p><strong>（2）与犯罪侦查有关的相关活动；</strong></p>

<p><strong>（3）出于维护您或他人的生命财产安全但在特殊情况下无法获得您的及时授权；</strong></p>

<p><strong>（4）从其他合法公开的渠道中收集您的个人信息；</strong></p>

<p><strong>（5）法律法规规定的其他情形。</strong></p>

<h3>2. 燃点爱好会如何使用您的个人信息</h3>

<p class="first-line-indent-2">我们会将您的个人信息用于以下目的：</p>

<ul>
	<li>为您提供个性化服务。</li>
	<li>帮助我们设计新服务，提升现有服务体验。</li>
	<li>在我们提供服务时，用于身份验证、客户服务、安全防范、诈骗监测、存档和备份用途，确保我们向您提供的产品和服务的安全性。</li>
	<li>向您发送您可能感兴趣的产品和服务的信息；向您提供与您更加相关的广告以替代普遍投放的广告；邀请您参与燃点爱好活动和市场调查。</li>
	<li>开展内部审计、数据分析和研究，以更好地改善我们的产品、服务及与用户之间的沟通。</li>
</ul>

<h3>3. 我们会如何使用 Cookie 和同类技术</h3>

<h4>3.1 Cookie</h4>

<p class="first-line-indent-2">您使用我们的服务时，我们会在您的计算机或移动设备上存储名为 Cookie 的小数据文件。Cookie 通常包含标识符、站点名称以及一些号码和字符。我们使用该等信息判断注册用户是否已经登录，提升服务/产品质量及优化用户体验。如您不希望个人信息保存在 Cookie 中，您可对浏览器进行配置，选择禁用 Cookie 功能。禁用 Cookie 功能后，可能影响您访问燃点爱好或不能充分取得燃点爱好提供的服务。</p>

<p class="first-line-indent-2">燃点爱好不会将 Cookie 用于本政策所述目的之外的任何用途。您可根据自己的偏好管理或删除Cookie。您可以清除计算机上保存的所有 Cookie，大部分网络浏览器都设有阻止 Cookie 的功能。</p>

<h4>3.2 设备权限调用</h4>

<p class="first-line-indent-2"><strong>燃点爱好在提供服务的过程中，可能需要您开通一些设备权限，例如通知、相册、相机、手机通讯录、蓝牙等访问权限。</strong>您也可以在设备的设置功能中随时选择关闭部分或者全部权限，从而拒绝燃点爱好收集相应的个人信息。在不同设备中，权限显示方式及关闭方式可能有所不同，具体请参考设备及系统开发方说明或指引。</p>

<h3>4 我们会如何共享、转让、公开披露您的个人信息</h3>

<h4>4.1 共享</h4>

<p class="first-line-indent-2">燃点爱好不会在未经您同意或授权的情况下将您的个人信息提供给第三方。但是，经您确认同意，燃点爱好可在以下情况下共享您的个人信息。</p>

<ul>
	<li>在获取同意的情况下共享：获得您的明确同意后，燃点爱好会与其他方共享您的个人信息。</li>
	<li>共享给燃点爱好的关联公司：在本政策声明的使用目的范围内，<strong>您的个人信息可能会与燃点爱好的关联公司共享。</strong>作为一项政策，我们只会共享必要的信息。关联公司如要改变个人信息的处理目的，将再次征求您的授权同意。</li>
	<li>共享给授权合作伙伴：<strong>燃点爱好可能会与合作伙伴共享您的某些个人信息，以提供更好的客户服务和用户体验。</strong>例如，燃点爱好向您寄送礼品（如有）时，燃点爱好必须与物流服务提供商共享您的个人信息才能安排寄送，或者安排合作伙伴向您提供服务。我们仅会出于特定、明确而合法的目的处理您的个人信息，并且只会共享提供服务所必要的信息。同时，我们会与其签署严格的保密协定，要求他们按照我们的说明、本政策以及其他任何相关的保密和安全措施来处理个人信息。</li>
	<li>在法定情形下的共享：<strong>我们可能会根据法律法规规定、诉讼争议解决需要，或按行政、司法机关依法提出的要求，对外共享您的个人信息。&nbsp;</strong></li>
</ul>

<h4>4.2 转让</h4>

<p class="first-line-indent-2">我们不会将您的个人信息转让给任何公司、组织和个人，但以下情况除外：</p>

<ul>
	<li>在获取明确同意的情况下转让：获得您的明确同意后，我们会向其他方转让您的个人信息；</li>
	<li><strong>在涉及合并、收购或破产清算时</strong>，如涉及到个人信息转让，我们会要求新的持有您个人信息的公司、组织继续受此隐私政策的约束，否则我们将要求该公司、组织重新向您征求授权同意。</li>
</ul>

<h4>4.3 公开披露</h4>

<p class="first-line-indent-2">我们仅会在以下情况下，且采取符合法律和业界标准的安全防护措施的前提下，才会公开披露您的个人信息</p>

<ul>
	<li>获得您的明确同意；</li>
	<li><strong>基于法律法规、法律程序、诉讼或政府主管部门强制性要求。</strong>但我们保证，在符合法律法规的前提下，当我们收到上述披露信息的请求时，我们会要求必须出具与之相应的法律文件。</li>
</ul>

<h3>5. 如何管理您的个人信息</h3>

<p class="first-line-indent-2">我们将尽一切可能采取适当的技术手段，保证收集到的有关于您的个人信息的准确性，并保证及时进行更新。</p>

<p class="first-line-indent-2">您也可以通过「设置」页面，按照燃点爱好的相关政策及提示，对您的个人信息进行访问、更正及删除。</p>

<h3>6. 推广服务</h3>

<p class="first-line-indent-2"><strong>我们可能使用您的个人信息，通过我们的站内私信、电子邮件或其他方式向您提供或推广我们或第三方的商品和服务。</strong></p>

<h3>7. 我们会如何保护和保存您的个人信息</h3>

<p class="first-line-indent-2">燃点爱好重视个人信息的安全。我们采取互联网业内标准做法来保护您的个人信息，防止信息遭到未经授权访问、披露、使用、修改、损坏或丢失。我们会采取一切合理可行的措施，保护您的个人信息。</p>

<p class="first-line-indent-2">我们会采取一切合理可行的措施，确保未收集与燃点爱好提供的服务无关的个人信息。我们会尽全力保护您的个人信息，但请您理解，由于技术的限制以及可能存在的各种恶意手段，在互联网行业，不可能始终保证信息百分之百的安全。您需要了解，您接入我们的服务所用的系统和通讯网络，有可能因我们可控范围外的因素而出现问题。</p>

<p class="first-line-indent-2">在发生个人信息安全事件的场合，我们将按照法律法规的要求，及时向您告知：安全事件的基本情况和可能的影响、我们已采取或将要采取的处置措施、您可自主防范和降低风险的建议、对您的补救措施等。我们将及时将事件相关情况以邮件、信函、电话、推送通知等方式告知您，难以逐一告知个人信息主体时，我们会采取合理、有效的方式发布公告。</p>

<p class="first-line-indent-2">同时，我们还将按照监管部门要求，主动上报个人信息安全事件的处置情况。</p>

<p class="first-line-indent-2">我们在中华人民共和国境内收集和产生的个人信息将存储在中华人民共和国境内。如果日后为处理跨境业务，需要向境外机构传输境内收集的相关个人信息的，我们会事先征得您的同意，按照法律、行政法规和相关监管部门的规定执行，并通过签订协议、核查等有效措施，要求境外机构为所获得的个人信息保密。</p>

<p class="first-line-indent-2">我们仅会在达到本政策所述目的所必需的时限内保存您的个人信息，但为了遵守适用的法律法规、法院判决或裁定、其他有权机关的要求、维护公共利益等目的，我们可能会将个人信息保存时间予以适当延长。</p>

<h3>8. 第三方提供商及其服务</h3>

<p class="first-line-indent-2">为确保流畅的浏览体验，您可能会收到来自燃点爱好及其合作伙伴外部的第三方（以下简称「第三方」）提供的内容或网络链接。燃点爱好对此类第三方无控制权。您可选择是否访问第三方提供的链接、内容、产品和服务。</p>

<p class="first-line-indent-2">燃点爱好无法控制第三方的隐私和个人信息保护政策，此类第三方不受到本政策的约束。您在向第三方提交个人信息之前，请确保您阅读并认可这些第三方的隐私保护政策。</p>

<h3>9. 燃点爱好会如何处理未成年人的个人信息</h3>

<p class="first-line-indent-2">我们鼓励父母或监护人指导未满十八岁的未成年人使用我们的服务。我们建议未成年人鼓励他们的父母或监护人阅读本政策，并建议未成年人在提交个人信息之前寻求父母或监护人的同意和指导。但是，如果您确认自己能够完全理解本政策的全部内容且您为使用燃点爱好服务所进行的相关操作行为与您的年龄、智力相适应的，则您可以独立进行相关操作（包括向我们提交您的个人信息）。</p>

<h3>10. 本政策如何更新及适用范围</h3>

<p class="first-line-indent-2">本政策为《燃点爱好用户服务使用协议》的重要组成部分。燃点爱好保留不时更新或修改本政策的权利。如果该等修改造成您在本政策下权利的实质减少，燃点爱好会通过不同渠道向您发送变更通知，包括但不限于网站公示、私信通知等方式。</p>

<p class="first-line-indent-2"><strong>若您不同意修改后的隐私政策，您有权并应立即停止使用燃点爱好的服务。如果您继续使用燃点爱好的服务，则视为您接受燃点爱好对本政策相关条款所做的修改。</strong></p>

<p class="first-line-indent-2">燃点爱好的所有服务均适用本政策。但某些服务有其特定的隐私政策，该等特定的隐私政策更具体地说明燃点爱好在该服务中如何处理您的信息。如本政策与特定服务的隐私政策有不一致之处，请以该特定隐私政策为准。</p>

<h3>11. 联系我们</h3>

<p class="first-line-indent-2">当您对本政策有任何疑问，可以发送邮件至coderjian@aliyun.com咨询，我们将及时解决您的问题。</p>
',
));

// Common language entries
$lang = array_merge($lang, array(
	'ACCOUNT_ACTIVE'                 => '您的帐号已经激活，感谢您的注册。',
	'ACCOUNT_ACTIVE_ADMIN'           => '这个帐号现在被激活了',
	'ACCOUNT_ACTIVE_PROFILE'         => '您的帐号已经重新激活。',
	'ACCOUNT_ADDED'                  => '感谢注册，您的帐号已经建立，请使用您的用户名和密码登录。',
	'ACCOUNT_COPPA'                  => '您的帐号已经建立但是需要批准。更多信息请查收您的 Email。',
	'ACCOUNT_EMAIL_CHANGED'          => '您的帐号已经更新。 但是， 论坛需要您重新验证 email 的更改。 包含激活代码的 email 已经发送到您的新邮箱， 请检查邮箱以激活帐号。',
	'ACCOUNT_EMAIL_CHANGED_ADMIN'    => '您的帐号已经更新。 但是， 论坛需要由管理员验证您的 email 更改。 您会收到一封包含此信息的 email， 在帐号激活后， 我们会再次 email 通知您。',
	'ACCOUNT_INACTIVE'               => '您的帐号已经建立，激活码已经发往您注册时提供的 Email，请查收以获得更多信息。 若没有收到，请等多一些时间或者查看一下您的垃圾邮件箱。',
	'ACCOUNT_INACTIVE_ADMIN'         => '您的帐号已经建立，但是您必须等待管理员批准帐号后才能登录。您将收到一封 Email，在帐号获得批准后我们将再次通知您。',
	'ACTIVATION_EMAIL_SENT'          => '激活 Email 已经发往您的邮箱',
	'ACTIVATION_EMAIL_SENT_ADMIN'    => '激活 Email 已经发往论坛管理员的邮箱。',
	'ADD'                            => '添加',
	'ADD_BCC'                        => '添加[BCC]',
	'ADD_FOES'                       => '添加损友',
	'ADD_FOES_EXPLAIN'               => '您可以在不同的行上分别输入几个用户名',
	'ADD_FOLDER'                     => '添加文件夹',
	'ADD_FRIENDS'                    => '添加好友',
	'ADD_FRIENDS_EXPLAIN'            => '您可以在不同的行上分别输入几个用户名',
	'ADD_NEW_RULE'                   => '添加新规则',
	'ADD_RULE'                       => '添加规则',
	'ADD_TO'                         => '添加【收件人】',
	'ADD_USERS_UCP_EXPLAIN'          => '您可以在这里添加新组员。 您可以选择是否让这个组成为新组员的默认组。 多个会员请分行输入.',
	'ADMIN_EMAIL'                    => '管理员可以给我发送 email',
	'AGREE'                          => '我同意本服务条款',
	'ALLOW_PM'                       => '允许用户给我发私人短信',
	'ALLOW_PM_EXPLAIN'               => '注意：管理员和版主有给您发私人短信的特权。',
	'ALREADY_ACTIVATED'              => '您已经激活了您的帐号',
	'ATTACHMENTS_EXPLAIN'            => '这是您在论坛中发表的附件列表。',
	'ATTACHMENTS_DELETED'            => '成功删除数个附件。',
	'ATTACHMENT_DELETED'             => '成功删除附件。',
	'AUTOLOGIN_SESSION_KEYS_DELETED' => '所选的 "自动登录"之 登录密钥成功删除。',
	'AVATAR_CATEGORY'                => '分类',
	'AVATAR_DRIVER_GRAVATAR_TITLE'   => 'Gravatar',
	'AVATAR_DRIVER_GRAVATAR_EXPLAIN' => 'Gravatar 是一个服务，允许您跨站点维护相同的头像，访问 <a href="http://www.gravatar.com/">Gravatar</a> 获得更多信息。',
	'AVATAR_DRIVER_LOCAL_TITLE'      => '系统相册头像',
	'AVATAR_DRIVER_LOCAL_EXPLAIN'    => '您可以从本地系统相册选择您的头像。',
	'AVATAR_DRIVER_REMOTE_TITLE'     => '远程头像',
	'AVATAR_DRIVER_REMOTE_EXPLAIN'   => '从其他网站链接头像图片。',
	'AVATAR_DRIVER_UPLOAD_TITLE'     => '上传头像',
	'AVATAR_DRIVER_UPLOAD_EXPLAIN'   => '上传您的自定义头像。',
	'AVATAR_EXPLAIN'                 => '最大尺寸：宽 %1$s ， 高 %2$s ， 文件大小 %3$.2f KiB。',
	'AVATAR_EXPLAIN_NO_FILESIZE'     => '最大尺寸：宽 %1$s 像素， 高 %2$s 像素。',
	'AVATAR_FEATURES_DISABLED'       => '头像功能暂时关闭.',
	'AVATAR_GALLERY'                 => '系统相册',
	'AVATAR_GENERAL_UPLOAD_ERROR'    => '无法上传头像到 %s',
	'AVATAR_NOT_ALLOWED'             => '无法显示头像， 因为头像功能已经停用。',
	'AVATAR_PAGE'                    => '页',
	'AVATAR_SELECT'                  => '选择您的头像',
	'AVATAR_TYPE'                    => '头像类型',
	'AVATAR_TYPE_NOT_ALLOWED'        => '当前头像无法显示， 因为该头像类型已经停用。',

	'BACK_TO_DRAFTS'            => '回到已经保存的草稿',
	'BACK_TO_LOGIN'             => '回到登录窗口',
	'BIRTHDAY'                  => '生日',
	'BIRTHDAY_EXPLAIN'          => '如果设置年份，在您生日时，生日列表中将显示您的年龄。',
	'BOARD_DATE_FORMAT'         => '我的时间格式',
	'BOARD_DATE_FORMAT_EXPLAIN' => '时间格式设置使用 PHP <a href="http://www.php.net/date">date()</a> 函数',
	'BOARD_LANGUAGE'            => '我的语言',
	'BOARD_STYLE'               => '我的论坛风格',
	'BOARD_TIMEZONE'            => '我的时区',
	'BOOKMARKS'                 => '收藏夹',
	'BOOKMARKS_EXPLAIN'         => '您可以收藏主题以方便将来查找。如果需要删除其中的书签请选中勾选框，然后点击 <em>删除书签</em> 按钮。',
	'BOOKMARKS_DISABLED'        => '论坛已经禁用收藏夹',
	'BOOKMARKS_REMOVED'         => '成功移除了书签',

	'CANNOT_EDIT_MESSAGE_TIME'   => '您将不能再编辑或删除这个短信',
	'CANNOT_MOVE_TO_SAME_FOLDER' => '您不能将短信移往将被删除的文件夹。',
	'CANNOT_MOVE_FROM_SPECIAL'   => '短信不能从发件箱中移出。',
	'CANNOT_RENAME_FOLDER'       => '这个文件夹不能被重命名。',
	'CANNOT_REMOVE_FOLDER'       => '这个文件夹不能删除。',
	'CHANGE_DEFAULT_GROUP'       => '更改默认组',
	'CHANGE_PASSWORD'            => '更改密码',
	'CLICK_GOTO_FOLDER'          => '%1$s前往您的 “%3$s” 文件夹%2$s',
	'CLICK_RETURN_FOLDER'        => '%1$s回到您的 “%3$s” 文件夹%2$s',
	'CONFIRMATION'               => '注册确认',
	'CONFIRM_CHANGES'            => '确认修改',
	'CONFIRM_EXPLAIN'            => '为了防止机器自动注册行为，请输入一组确认码，确认码显示在下面的图片中。如果您对阅读这组确认码存在困难，请联络 %s论坛管理员%s。',
	'VC_REFRESH'                 => '刷新确认码',
	'VC_REFRESH_EXPLAIN'         => '如果您无法辨认当前的确认码， 您可以点击按钮更换新的确认码。',

	'CONFIRM_PASSWORD'                => '确认新密码',
	'CONFIRM_PASSWORD_EXPLAIN'        => '只有在改变密码时您才需要再重复输入一次',
	'COPPA_BIRTHDAY'                  => '为了继续注册进程，请输入您的生日。',
	'COPPA_COMPLIANCE'                => 'COPPA 守则',
	'COPPA_EXPLAIN'                   => '请注意点击提交将创建您的帐号，但是帐号将需要父母或监护人的批复才能激活。您将收到一份包含表单拷贝的 email 指导您后续的操作。',
	'CREATE_FOLDER'                   => '添加文件夹',
	'CURRENT_IMAGE'                   => '当前图片',
	'CURRENT_PASSWORD'                => '当前密码',
	'CURRENT_PASSWORD_EXPLAIN'        => '如果想修改 email 或者用户名，您必须输入您现在的密码。',
	'CURRENT_CHANGE_PASSWORD_EXPLAIN' => '要修改密码、email、手机号或用户名，您必须输入您现在的密码',
	'CUR_PASSWORD_EMPTY'              => '您没有输入您的当前密码。',
	'CUR_PASSWORD_ERROR'              => '您输入的当前密码不正确。',
	'CUSTOM_DATEFORMAT'               => '自定义……',

	'DEFAULT_ACTION'             => '默认操作',
	'DEFAULT_ACTION_EXPLAIN'     => '如果以上都不可用，这个操作将被触发',
	'DEFAULT_ADD_SIG'            => '默认添加我的签名',
	'DEFAULT_BBCODE'             => '默认允许 BBCode',
	'DEFAULT_NOTIFY'             => '默认在有回复时通知',
	'DEFAULT_SMILIES'            => '默认允许表情',
	'DEFINED_RULES'              => '已设定的规则',
	'DELETED_TOPIC'              => '已经删除的话题',
	'DELETE_ATTACHMENT'          => '删除附件',
	'DELETE_ATTACHMENTS'         => '删除附件',
	'DELETE_ATTACHMENT_CONFIRM'  => '您确认删除这个附件吗？',
	'DELETE_ATTACHMENTS_CONFIRM' => '您确认删除这些附件吗？',
	'DELETE_AVATAR'              => '删除图片',
	'DELETE_COOKIES_CONFIRM'     => '您确认删除本论坛的所有cookie吗？',
	'DELETE_MARKED_PM'           => '删除选中的短信',
	'DELETE_MARKED_PM_CONFIRM'   => '您确认删除所有选中的短信吗？',
	'DELETE_OLDEST_MESSAGES'     => '删除最早的短信',
	'DELETE_MESSAGE'             => '删除短信',
	'DELETE_MESSAGE_CONFIRM'     => '您确认删除这些短信吗？',
	'DELETE_MESSAGES_IN_FOLDER'  => '清空回收站中的短信',
	'DELETE_RULE'                => '删除规则',
	'DELETE_RULE_CONFIRM'        => '您确认删除这条规则吗？',
	'DEMOTE_SELECTED'            => '降级所选',
	'DISABLE_CENSORS'            => '开启用词过滤',
	'DISPLAY_GALLERY'            => '显示系统相册',
	'DOMAIN_NO_MX_RECORD_EMAIL'  => '输入的 email 域名没有有效的 MX 记录。',
	'DOWNLOADS'                  => '下载',
	'DRAFTS_DELETED'             => '所有选中的草稿已经被删除。',
	'DRAFTS_EXPLAIN'             => '这里可以查看，编辑和删除您保存的草稿。',
	'DRAFT_UPDATED'              => '草稿已经更新。',

	'EDIT_DRAFT_EXPLAIN' => '这里您可以编辑您的草稿。草稿不能包含附件和投票。',
	'EMAIL_BANNED_EMAIL' => '您输入的 email 地址不允许使用。',
	'EMAIL_REMIND'       => '这必须是与您的帐户关联的 e-mail 地址。如果您没有通过管理界面改变过您的 e-mail 地址，它就是您在注册时使用的地址。',
	'EMAIL_TAKEN_EMAIL'  => '您输入的 email 地址已经被使用',
	'EMPTY_DRAFT'				=> '您必须填入适当的内容才能提交更改',
	'EMPTY_DRAFT_TITLE'			=> '您必须输入一个草稿标题',
	'EXPORT_AS_XML'				=> '导出为 XML',
	'EXPORT_AS_CSV'				=> '导出为 CSV',
	'EXPORT_AS_CSV_EXCEL'		=> '导出为 CSV (Excel)',
	'EXPORT_AS_TXT'				=> '导出为 TXT',
	'EXPORT_AS_MSG'				=> '导出为 MSG',
	'EXPORT_FOLDER'				=> '导出格式',

	'FIELD_REQUIRED'					=> '字段 “%s” 是必填项。',
	'FIELD_TOO_SHORT'					=> array(
	1 => '字段 “%2$s” 太短，需要最少 %1$d 字符。',
	2 => '字段 “%2$s” 太短，需要最少 %1$d 字符。',
),
	'FIELD_TOO_LONG'					=> array(
	1 => '字段 “%2$s” 太长，最多允许 %1$d 字符。',
	2 => '字段 “%2$s” 太长，最多允许 %1$d 字符。',
),
	'FIELD_TOO_SMALL'					=> '“%1$s” 的值太小，必须大于 %2$d。',
	'FIELD_TOO_LARGE'					=> '“%1$s” 的值太大，必须小于 %2$d。',
	'FIELD_INVALID_CHARS_INVALID'		=> '字段 “%s” 包含无效字符。',
	'FIELD_INVALID_CHARS_NUMBERS_ONLY'	=> '字段 “%s” 包含无效字符，只允许填入数字。',
	'FIELD_INVALID_CHARS_ALPHA_DOTS'	=> '字段 “%s” 有无效字符，只有字母数字或点是允许的。',
	'FIELD_INVALID_CHARS_ALPHA_ONLY'	=> '字段 “%s” 包含无效字符，只允许英文字母与数字。',
	'FIELD_INVALID_CHARS_ALPHA_PUNCTUATION'	=> '字段 “%s” 有无效字符，只有字母数字或下划线及连字符是允许的并且第一个字符必须是字母。',
	'FIELD_INVALID_CHARS_ALPHA_SPACERS'	=> '字段 “%s” 包含无效字符，只允许英文字符，空格，和 -+_[] 这些符号。',
	'FIELD_INVALID_CHARS_ALPHA_UNDERSCORE'	=> '字段 “%s” 有无效字符，只有字母数字或下划线是允许的。',
	'FIELD_INVALID_CHARS_LETTER_NUM_DOTS'	=> '字段 “%s” 有无效字符，只有字母、数字或点是允许的。',
	'FIELD_INVALID_CHARS_LETTER_NUM_ONLY'	=> '字段 “%s” 有无效字符，只有字母和数字是允许的。',
	'FIELD_INVALID_CHARS_LETTER_NUM_PUNCTUATION'	=> '字段 “%s” 有无效字符，只有字母、数字或下划线及连字符是允许的并且第一个字符必须是字母。',
	'FIELD_INVALID_CHARS_LETTER_NUM_SPACERS'		=> '字段 “%s” 有无效字符，只有字母、数字、空格或-+_[]是允许的。',
	'FIELD_INVALID_CHARS_LETTER_NUM_UNDERSCORE'		=> '字段 “%s” 有无效字符，只有字母、数字或下划线是允许的。',
	'FIELD_INVALID_DATE'				=> '字段 “%s” 包含无效日期。',
	'FIELD_INVALID_URL'					=> '字段 “%s” 有一个无效网址。',
	'FIELD_INVALID_VALUE'				=> '字段 “%s” 值无效。',

	'FOE_MESSAGE'				=> '损友发来的短信',
	'FOES_EXPLAIN'				=> '损友列表上的用户默认被忽略。这些用户的帖子将不会全部显示，但允许对您发送私人短信。请注意这不能阻止版主和管理员的短信。',
	'FOES_UPDATED'				=> '您的损友列表已经更新',
	'FOLDER_ADDED'				=> '文件夹已经添加',
	'FOLDER_MESSAGE_STATUS'		=> array(
	1 => '%2$d / %1$s 已储存',
	2 => '%2$d / %1$s 已储存',
),
	'FOLDER_NAME_EMPTY'			=> '您需要指定一个文件夹名称.',
	'FOLDER_NAME_EXIST'			=> '文件夹 <strong>%s</strong> 已经存在',
	'FOLDER_OPTIONS'			=> '文件夹选项',
	'FOLDER_RENAMED'			=> '文件夹已经重命名',
	'FOLDER_REMOVED'			=> '文件夹已经删除',
	'FOLDER_STATUS_MSG'			=> array(
	1 => '文件夹已使用 %3$d%%  (%2$d / %1$s 已储存)',
	2 => '文件夹已使用 %3$d%%  (%2$d / %1$s 已储存)',
),
	'FORWARD_PM'				=> '转发短信',
	'FORCE_PASSWORD_EXPLAIN'	=> '为了继续浏览论坛，您需要更改您的密码',
	'FRIEND_MESSAGE'			=> '好友的短信',
	'FRIENDS'					=> '好友',
	'FRIENDS_EXPLAIN'			=> '好友名单能让您迅速找到您经常联络的其他用户。如果模板支持，好友发表的帖子将被高亮显示。',
	'FRIENDS_OFFLINE'			=> '离线好友',
	'FRIENDS_ONLINE'			=> '线上好友',
	'FRIENDS_UPDATED'			=> '您的好友名单已经更新',
	'FULL_FOLDER_OPTION_CHANGED'=> '在文件夹满时的操作已经更改',
	'FWD_ORIGINAL_MESSAGE'		=> '-------- 原短信 --------',
	'FWD_SUBJECT'				=> '标题： %s',
	'FWD_DATE'					=> '日期： %s',
	'FWD_FROM'					=> '发信人： %s',
	'FWD_TO'					=> '收信人： %s',

	'GLOBAL_ANNOUNCEMENT'		=> '全站公告',

	'GRAVATAR_AVATAR_EMAIL'			=> 'Gravatar 邮箱',
	'GRAVATAR_AVATAR_EMAIL_EXPLAIN'	=> '输入您用来注册 <a href="http://www.gravatar.com/">Gravatar</a> 账户的邮箱地址。',
	'GRAVATAR_AVATAR_SIZE'			=> '头像尺寸',
	'GRAVATAR_AVATAR_SIZE_EXPLAIN'	=> '指定头像宽高，留空将自动检测。',

	'HIDE_ONLINE'				=> '隐藏您的线上状态',
	'HIDE_ONLINE_EXPLAIN'		=> '若您更改这个设置，它将在您下次访问论坛时生效。',
	'HOLD_NEW_MESSAGES'			=> '不接收新短信 (新短信将被挂起直到有足够的可用空间)',
	'HOLD_NEW_MESSAGES_SHORT'	=> '新短信将被挂起',

	'IF_FOLDER_FULL'			=> '如果您的文件夹已经装满',
	'IMPORTANT_NEWS'			=> '重要公告',
	'INVALID_USER_BIRTHDAY'			=> '输入的生日日期无效.',
	'INVALID_CHARS_USERNAME'	=> '用户名包含禁用字符。',
	'INVALID_CHARS_NEW_PASSWORD'=> '密码没有包含要求的字符。',
	'ITEMS_REQUIRED'			=> '标记 * 号的表格是必填项目',

	'JOIN_SELECTED'				=> '加入选中',

	'LANGUAGE'					=> '语言设定',
	'LINK_REMOTE_AVATAR'		=> '连接远程头像',
	'LINK_REMOTE_AVATAR_EXPLAIN'=> '输入包含您的头像的远程链接地址。',
	'LINK_REMOTE_SIZE'			=> '头像尺寸',
	'LINK_REMOTE_SIZE_EXPLAIN'	=> '指定头像的长和宽，如果留空将自动检测。',
	'LOGIN_EXPLAIN_UCP'			=> '请登录后使用用户控制面板',
	'LOGIN_LINK'					=> '用您的论坛账号连接或注册您的外部服务账户',
	'LOGIN_LINK_EXPLAIN'			=> '您已经尝试登录使用一个未连接到本论坛账号的外部服务，您必须连接此账号到一个已有账号或者创建一个新账号。',
	'LOGIN_LINK_MISSING_DATA'		=> '连接您账号用外部服务所需的数据不可用，请重启登录进程。',
	'LOGIN_LINK_NO_DATA_PROVIDED'	=> '没有数据被提供到此页用来连接一个外部账号到一个论坛账号，请联系论坛管理员如果您继续遇到问题。',
	'LOGIN_KEY'					=> '登录密钥',
	'LOGIN_TIME'				=> '登录时间',
	'LOGIN_REDIRECT'			=> '您已经成功登录',
	'LOGOUT_FAILED'				=> '您没有退出登录， 因为请求并不符合您这次对话信息。 请联络论坛管理员反映这个问题。',
	'LOGOUT_REDIRECT'			=> '您已经顺利退出',

	'MARK_IMPORTANT'				=> '标记为重要',
	'MARKED_MESSAGE'				=> '标记的短信',
	'MAX_FOLDER_REACHED'			=> '达到最大用户允许自定义文件夹数目',
	'MESSAGE_BY_AUTHOR'				=> '由',
	'MESSAGE_COLOURS'				=> '短信颜色',
	'MESSAGE_DELETED'				=> '短信删除成功.',
	'MESSAGE_EDITED'				=> '短信编辑成功.',
	'MESSAGE_HISTORY'				=> '短信历史',
	'MESSAGE_REMOVED_FROM_OUTBOX'	=> '这条短信已被它的作者删除.',
	'MESSAGE_SENT_ON'				=> '时间',
	'MESSAGE_STORED'				=> '短信发送成功',
	'MESSAGE_TO'					=> '收件人',
	'MESSAGES_DELETED'				=> '短信已经删除',
	'MOVE_DELETED_MESSAGES_TO'		=> '移动已删除的短信到',
	'MOVE_DOWN'						=> '下移',
	'MOVE_MARKED_TO_FOLDER'			=> '移动标记的到 %s',
	'MOVE_PM_ERROR'					=> array(
	1 => '一个错误发生在移动消息到新文件夹时，只有 %2$d / %1$s 被移动。',
	2 => '一个错误发生在移动消息到新文件夹时，只有 %2$d / %1$s 被移动。',
),
	'MOVE_TO_FOLDER'				=> '移动到文件夹',
	'MOVE_UP'						=> '上移',

	'NEW_FOLDER_NAME'				=> '新文件夹名',
	'NEW_PASSWORD'					=> '新密码',
	'NEW_PASSWORD_CONFIRM_EMPTY'	=> '您没有输入确认密码。',
	'NEW_PASSWORD_ERROR'			=> '您输入的密码不匹配',

	'NOTIFICATIONS_MARK_ALL_READ'						=> '标记所有通知为已读',
	'NOTIFICATIONS_MARK_ALL_READ_CONFIRM'				=> '您确定要标记所有通知为已读吗？',
	'NOTIFICATIONS_MARK_ALL_READ_SUCCESS'				=> '所用通知已被标记为已读。',
	'NOTIFICATION_GROUP_MISCELLANEOUS'					=> '其他通知',
	'NOTIFICATION_GROUP_MODERATION'						=> '版主通知',
	'NOTIFICATION_GROUP_ADMINISTRATION'					=> '管理员通知',
	'NOTIFICATION_GROUP_POSTING'						=> '发布通知',
	'NOTIFICATION_METHOD_BOARD'							=> '通告',
	'NOTIFICATION_METHOD_EMAIL'							=> 'Email',
	'NOTIFICATION_METHOD_JABBER'						=> 'Jabber',
	'NOTIFICATION_TYPE'									=> '通知类型',
	'NOTIFICATION_TYPE_BOOKMARK'						=> '有人回复了您收藏的主题',
	'NOTIFICATION_TYPE_GROUP_REQUEST'					=> '有人请求加入您的组',
	'NOTIFICATION_TYPE_IN_MODERATION_QUEUE'				=> '一个贴子或主题需要批准',
	'NOTIFICATION_TYPE_MODERATION_QUEUE'				=> '您的主题/帖子被版主批准或不批准',
	'NOTIFICATION_TYPE_PM'								=> '有人发给您私信',
	'NOTIFICATION_TYPE_POST'							=> '有人回复了您订阅的主题',
	'NOTIFICATION_TYPE_QUOTE'							=> '有人在贴子中引用了您的文章',
	'NOTIFICATION_TYPE_REPORT'							=> '有人报告了一个帖子',
	'NOTIFICATION_TYPE_TOPIC'							=> '有人在您订阅的版面创建了一个主题',
	'NOTIFICATION_TYPE_ADMIN_ACTIVATE_USER'				=> '用户需要激活',

	'NOTIFY_METHOD'					=> '通知方式',
	'NOTIFY_METHOD_BOTH'			=> '全部',
	'NOTIFY_METHOD_EMAIL'			=> '只用 email',
	'NOTIFY_METHOD_EXPLAIN'			=> '通过这个论坛发送短信的方法',
	'NOTIFY_METHOD_IM'				=> '只用 Jabber',
	'NOTIFY_ON_PM'					=> '当有新短信时通知我',
	'NOT_ADDED_FRIENDS_ANONYMOUS'	=> '您不能添加匿名用户到您的好友列表',
	'NOT_ADDED_FRIENDS_BOTS'		=> '您不能添加搜索爬虫到您的好友列表',
	'NOT_ADDED_FRIENDS_FOES'		=> '您不能添加损友列表上的用户到您的好友列表',
	'NOT_ADDED_FRIENDS_SELF'		=> '您不能将自己添加为好友',
	'NOT_ADDED_FOES_MOD_ADMIN'		=> '您不能添加管理员和版主到损友列表',
	'NOT_ADDED_FOES_ANONYMOUS'		=> '您不能添加匿名用户到损友列表',
	'NOT_ADDED_FOES_BOTS'			=> '您不能添加搜索爬虫到损友列表',
	'NOT_ADDED_FOES_FRIENDS'		=> '您不能添加好友列表上的用户到损友列表',
	'NOT_ADDED_FOES_SELF'			=> '您不能将自己添加到损友列表',
	'NOT_AGREE'						=> '我不同意本服务条款',
	'NOT_ENOUGH_SPACE_FOLDER'		=> '目标文件夹 “%s” 已经装满。请求的操作无法完成。',
	'NOT_MOVED_MESSAGES'			=> array(
	1 => '您有 %d 私信已挂起，因为文件夹已满。',
	2 => '您有 %d 私信已挂起，因为文件夹已满。',
),
	'NO_ACTION_MODE'				=> '没有指定操作。',
	'NO_AUTHOR'						=> '这条短信没有设定作者',
	'NO_AVATAR'						=> '没有选择个人头像',
	'NO_AVATAR_CATEGORY'			=> '无',

	'NO_AUTH_DELETE_MESSAGE'		=> '您不能删除私人短信',
	'NO_AUTH_EDIT_MESSAGE'			=> '您不能编辑私人短信',
	'NO_AUTH_FORWARD_MESSAGE'		=> '您不能转发私人短信',
	'NO_AUTH_GROUP_MESSAGE'			=> '您不能群发私人短信',
	'NO_AUTH_PASSWORD_REMINDER'      => '您不能更换新密码',
	'NO_AUTH_PROFILEINFO'			=> '您未被授权修改个人信息。',
	'NO_AUTH_READ_HOLD_MESSAGE'      => '您不能阅读被挂起的短信',
	'NO_AUTH_READ_MESSAGE'			=> '您不能阅读私人短信',
	'NO_AUTH_READ_REMOVED_MESSAGE'	=> '您不能阅读这条短信，因为已经被作者删除',
	'NO_AUTH_SEND_MESSAGE'			=> '您不能发送私人短信',
	'NO_AUTH_SIGNATURE'				=> '您不能设定个人签名',

	'NO_BCC_RECIPIENT'			=> '无',
	'NO_BOOKMARKS'				=> '您没有收藏',
	'NO_BOOKMARKS_SELECTED'		=> '您没有选中收藏',
	'NO_EDIT_READ_MESSAGE'		=> '这条短信无法被编辑，因为它已经被阅读了',
	'NO_EMAIL_USER'				=> '无法找到符合的 email/用户名信息',
	'NO_FOES'					=> '黑名单是空的',
	'NO_FRIENDS'				=> '好友列表是空的',
	'NO_FRIENDS_OFFLINE'		=> '没有离线好友',
	'NO_FRIENDS_ONLINE'			=> '没有线上好友',
	'NO_GROUP_SELECTED'			=> '没有指定用户组',
	'NO_IMPORTANT_NEWS'			=> '没有重要公告',
	'NO_MESSAGE'				=> '无法找到私人短信',
	'NO_NEW_FOLDER_NAME'		=> '您必须指定一个新文件夹名',
	'NO_NEWER_PM'				=> '没有更新的短信',
	'NO_OLDER_PM'				=> '没有更早的短信',
	'NO_PASSWORD_SUPPLIED'		=> '您不能使用空白密码登录.',
	'NO_RECIPIENT'				=> '没有定义收信人',
	'NO_RULES_DEFINED'			=> '没有定义的规则',
	'NO_SAVED_DRAFTS'			=> '没有保存的草稿',
	'NO_TO_RECIPIENT'			=> '无',
	'NO_WATCHED_FORUMS'			=> '您没有订阅任何版面。',
	'NO_WATCHED_SELECTED'      => '您没有选中任何已订阅的主题或版面.',
	'NO_WATCHED_TOPICS'			=> '您没有订阅任何话题。',

	'PASS_TYPE_ALPHA_EXPLAIN'	=> '密码长度必须介于 %1$s 和 %2$s 之间并且包含混合大小写英文字母和数字',
	'PASS_TYPE_ANY_EXPLAIN'		=> '密码长度必须介于 %1$s 和 %2$s 之间',
	'PASS_TYPE_CASE_EXPLAIN'	=> '密码长度必须介于 %1$s 和 %2$s 之间并且包含混合大小写字母',
	'PASS_TYPE_SYMBOL_EXPLAIN'	=> '密码长度必须介于 %1$s 和 %2$s 之间并且包含合大小写英文字母和数字及符号',
	'PASSWORD'					=> '密码',
	'PASSWORD_ACTIVATED'		=> '您的新密码已经启用',
	'PASSWORD_UPDATED'			=> '您的新密码已经发送到您的注册 email 邮箱。',
	'PASSWORD_RESET'			=> '您的密码修改成功，请使用新密码重新登录。',
	'PERMISSIONS_RESTORED'		=> '成功恢复原权限。',
	'PERMISSIONS_TRANSFERRED'	=> '成功切换到 <strong>%s</strong>的权限， 您现在可以使用这个用户的权限浏览版面。<br />请注意管理员权限不会被切换。 您可以在任何时候恢复回原权限。',
	'PM_DISABLED'				=> '这个论坛的私人短信功能已经关闭',
	'PM_FROM'					=> '发件人',
	'PM_FROM_REMOVED_AUTHOR'	=> '这条短信的发送者已经不再是注册用户。',
	'PM_ICON'					=> '私信图标',
	'PM_INBOX'					=> '收件箱',
	'PM_MARK_ALL_READ'			=> '标记所有信息为已读',
	'PM_MARK_ALL_READ_SUCCESS'	=> '此文件夹里的所有私信已标记为已读',
	'PM_NO_USERS'				=> '请求添加的用户不存在.',
	'PM_OUTBOX'					=> '发件箱',
	'PM_SENTBOX'				=> '已发送',
	'PM_SUBJECT'				=> '短信标题',
	'PM_TO'						=> '发送给',
	'PM_TOOLS'					=> '信息工具',
	'PM_USERS_REMOVED_NO_PERMISSION'	=> '一些用户不能被添加由于他们没有权限阅读私信。',
	'PM_USERS_REMOVED_NO_PM'	=> '一些用户无法添加， 因为他们禁用了站内短信接收。',
	'POST_EDIT_PM'				=> '编辑短信',
	'POST_FORWARD_PM'			=> '转发短信',
	'POST_NEW_PM'				=> '发送短信',
	'POST_PM_LOCKED'			=> '私人短信已锁定',
	'POST_PM_POST'				=> '引用帖子',
	'POST_QUOTE_PM'				=> '引用短信',
	'POST_REPLY_PM'				=> '回复短信',
	'PRINT_PM'					=> '打印预览',
	'PREFERENCES_UPDATED'		=> '您的参数已经更新。',
	'PROFILE_INFO_NOTICE'		=> '请注意这些信息将对其他成员可见。请谨慎包含个人资料。标记 * 的表格是必填栏目。',
	'PROFILE_UPDATED'			=> '您的资料已经更新。',
	'PROFILE_AUTOLOGIN_KEYS'	=> '"自动登录"的登录密钥会帮助您在访问论坛时自动登入论坛。如果您登出，将只会删除您点选登出的电脑所关联的登录密钥。在这里您可以看到所记住的在其他电脑上创建的登录密钥。',
	'PROFILE_NO_AUTOLOGIN_KEYS'	=> '没有保存的 "自动登录"之 登录密钥。',

	'RECIPIENT'							=> '收件人',
	'RECIPIENTS'						=> '收件人',
	'REGISTRATION'						=> '注册',
	'RELEASE_MESSAGES'					=> '%s释放所有挂起的短信%s… 如果有足够的可用空间它们将被派送到合适的文件夹。',
	'REMOVE_ADDRESS'					=> '删除地址',
	'REMOVE_SELECTED_BOOKMARKS'			=> '删除选中的书签',
	'REMOVE_SELECTED_BOOKMARKS_CONFIRM'	=> '您确信要删除所有选中的书签吗？',
	'REMOVE_BOOKMARK_MARKED'			=> '删除书签',
	'REMOVE_FOLDER'						=> '删除文件夹',
	'REMOVE_FOLDER_CONFIRM'				=> '您确定要删除这个文件夹吗？',
	'RENAME'							=> '重命名',
	'RENAME_FOLDER'						=> '重命名文件夹',
	'REPLIED_MESSAGE'					=> '回复短信',
	'REPLY_TO_ALL'						=> '回复至发信者和所有收件人。',
	'REPORT_PM'							=> '举报短信',
	'RESIGN_SELECTED'					=> '辞去选中',
	'RETURN_FOLDER'						=> '%1$s回到前一个文件夹%2$s',
	'RETURN_UCP'						=> '%s回到用户控制面板%s',
	'RULE_ADDED'						=> '规则已经添加',
	'RULE_ALREADY_DEFINED'				=> '这个规则已经存在',
	'RULE_DELETED'						=> '规则已经移除',
	'RULE_LIMIT_REACHED'				=> '您不能再添加私信规则，已到达规则数上限。',
	'RULE_NOT_DEFINED'					=> '没有正确指定规则',
	'RULE_REMOVED_MESSAGES'				=> array(
	1 => '%d 私信已被过滤删除。',
	2 => '%d 私信已被过滤删除。',
),

	'SAME_PASSWORD_ERROR'		=> '您输入的新密码和现在使用的密码相同',
	'SEARCH_YOUR_POSTS'			=> '显示您的帖子',
	'SEND_PASSWORD'				=> '发送密码',
	'SENT_AT'					=> '发送于',
	'SHOW_EMAIL'				=> '用户可以通过 email 联络我',
	'SIGNATURE_EXPLAIN'			=> '这是一个可以显示在您的帖子中的文字。字数限制为 %d 。',
	'SIGNATURE_PREVIEW'			=> '签名预览',
	'SIGNATURE_TOO_LONG'		=> '您的签名太长了。',
	'SELECT_CURRENT_TIME'		=> '选择当前时间',
	'SELECT_TIMEZONE'			=> '选择时区',
	'SORT'						=> '重新排列',
	'SORT_COMMENT'				=> '文件注释',
	'SORT_DOWNLOADS'			=> '下载次数',
	'SORT_EXTENSION'			=> '扩展名',
	'SORT_FILENAME'				=> '文件名',
	'SORT_POST_TIME'			=> '发布时间',
	'SORT_SIZE'					=> '文件大小',

	'TIMEZONE'					=> '时区',
	'TIMEZONE_DATE_SUGGESTION'	=> '建议： %s',
	'TIMEZONE_INVALID'			=> '您选的时区无效。',
	'TO'						=> '收件人',
	'TO_MASS'					=> '收件人',
	'TO_ADD'					=> '添加收件人',
	'TO_ADD_MASS'				=> '添加收件人',
	'TO_ADD_GROUPS'				=> '添加组',
	'TOO_MANY_RECIPIENTS'		=> '收件人过多',
	'TOO_MANY_REGISTERS'		=> '在这次对话中您已经超过注册的最大尝试次数。请稍后再尝试。',

	'UCP'						=> '用户控制面板',
	'UCP_ACTIVATE'				=> '激活帐号',
	'UCP_ADMIN_ACTIVATE'		=> '请注意在帐号激活前您必须输入一个有效的 Email 地址，管理员将审核您的帐号，如果审核通过将会发送通知邮件到您提供的 Email 地址。',
	'UCP_ATTACHMENTS'			=> '附件',
	'UCP_AUTH_LINK'				=> '外部账户',
	'UCP_AUTH_LINK_ASK'			=> '您当前没有关联外部账户，点下面的按钮连接论坛账号到一个外部服务账号。',
	'UCP_AUTH_LINK_ID'			=> '唯一标识符',
	'UCP_AUTH_LINK_LINK'		=> '连接',
	'UCP_AUTH_LINK_MANAGE'		=> '管理外部账户关联',
	'UCP_AUTH_LINK_NOT_SUPPORTED'	=> '连接论坛账号到外部服务不支持此论坛当前的验证方法。',
	'UCP_AUTH_LINK_TITLE'		=> '管理您的外部账户关联',
	'UCP_AUTH_LINK_UNLINK'		=> '无连接',
	'UCP_COPPA_BEFORE'			=> '早于 %s',
	'UCP_COPPA_ON_AFTER'		=> '晚于 %s',
	'UCP_EMAIL_ACTIVATE'		=> '请注意在帐号激活前您必须输入一个有效的 Email 地址。通过这个 Email 地址您将收到包含帐号激活链接的邮件。',
	'UCP_JABBER'				=> 'Jabber 地址',
	'UCP_LOGIN_LINK'			=> '设置一个外部账户关联',

	'UCP_MAIN'					=> '主要信息',
	'UCP_MAIN_ATTACHMENTS'		=> '管理附件',
	'UCP_MAIN_BOOKMARKS'		=> '管理收藏夹',
	'UCP_MAIN_DRAFTS'			=> '管理草稿',
	'UCP_MAIN_FRONT'			=> '首页',
	'UCP_MAIN_SUBSCRIBED'		=> '管理订阅',

	'UCP_NO_ATTACHMENTS'		=> '您没有发表的附件',

	'UCP_NOTIFICATION_LIST'				=> '管理通知',
	'UCP_NOTIFICATION_LIST_EXPLAIN'		=> '这里您可以查看所有历史通知。',
	'UCP_NOTIFICATION_OPTIONS'			=> '编辑通知选项',
	'UCP_NOTIFICATION_OPTIONS_EXPLAIN'	=> '这里您可以设置您的首选通知方法。',

	'UCP_PREFS'					=> '论坛相关参数',
	'UCP_PREFS_PERSONAL'		=> '编辑全局设置',
	'UCP_PREFS_POST'			=> '编辑发帖设置',
	'UCP_PREFS_VIEW'			=> '编辑显示设置',

	'UCP_PM'					=> '管理私人短信',
	'UCP_PM_COMPOSE'			=> '编写短信',
	'UCP_PM_DRAFTS'				=> '管理短信草稿',
	'UCP_PM_OPTIONS'			=> '编辑选项',
	'UCP_PM_UNREAD'				=> '未读短信',
	'UCP_PM_VIEW'				=> '查看短信',

	'UCP_PROFILE'				=> '个人资料',
	'UCP_PROFILE_AVATAR'		=> '编辑个人头像',
	'UCP_PROFILE_PROFILE_INFO'	=> '编辑个人信息',
	'UCP_PROFILE_REG_DETAILS'	=> '编辑帐号设置',
	'UCP_PROFILE_SIGNATURE'		=> '编辑发文签名',
	'UCP_PROFILE_AUTOLOGIN_KEYS'=> '管理 "自动登录"之 登录密钥',

	'UCP_USERGROUPS'			=> '用户组',
	'UCP_USERGROUPS_MEMBER'		=> '管理成员',
	'UCP_USERGROUPS_MANAGE'		=> '管理用户组',

	'UCP_PASSWORD_RESET_DISABLED'	=> '密码重设功能已禁用，如果您需要帮助访问账户，请联系 %s论坛管理员%s',
	'UCP_REGISTER_DISABLE'			=> '暂时停止新用户注册。',
	'UCP_REMIND'					=> '发送密码',
	'UCP_RESET_PASSWORD'					=> '重置密码',
	'UCP_RESEND'					=> '发送激活邮件',
	'UCP_EMAIL_TEL_ERROR'    	=> '请输入正确的电子邮箱或手机号',
	'UCP_EMAIL_EXIST_ERROR'		=> '电子邮箱已存在',
	'UCP_EMAIL_NOT_EXIST_ERROR'	=> '电子邮箱不存在',
	'UCP_TEL_EXIST_ERROR'		=> '手机号已存在',
	'UCP_TEL_NOT_EXIST_ERROR'	=> '手机不存在',
	'UCP_SEND_VERIFY_CODE_ERROR'	=> '验证码发送异常',
	'UCP_VERIFY_CODE_ERROR'	=> '验证码错误',
	'UCP_WELCOME'					=> '欢迎来到用户控制面板。这里您可以监控，查看和更新您的资料，参数，订阅版面和主题。您还可以给其他用户发送短信 (如果允许)。在继续下一步操作前请确认您已经仔细阅读了所有的公告。',
	'UCP_ZEBRA'						=> '好友与黑名单',
	'UCP_ZEBRA_FOES'				=> '管理损友列表',
	'UCP_ZEBRA_FRIENDS'				=> '管理好友列表',
	'UNDISCLOSED_RECIPIENT'			=> '未知收件人',
	'UNKNOWN_FOLDER'				=> '未知文件夹',
	'UNWATCH_MARKED'				=> '退订选中',
	'UPLOAD_AVATAR_FILE'			=> '选择文件',
	'UPLOAD_AVATAR_URL'				=> '从链接上传',
	'UPLOAD_AVATAR_URL_EXPLAIN'		=> '填入包含图片的链接，目标图片将被拷贝到这个论坛。',
	'USERNAME_ALPHA_ONLY_EXPLAIN'	=> '用户名长度必须介于 %1$s 和 %2$s 之间，并且只能使用英文字符',
	'USERNAME_ALPHA_SPACERS_EXPLAIN'=> '用户名长度必须介于 %1$s 和 %2$s 之间，并且只能使用英文字符，空格和 -+_[] 这些字符。',
	'USERNAME_ASCII_EXPLAIN'		=> '用户名长度必须介于 %1$s 和 %2$s 之间，并且只能使用 ASCII 字符，不能使用特殊字符',
	'USERNAME_LETTER_NUM_EXPLAIN'	=> '用户名长度必须介于 %1$s 和 %2$s 之间，并且只能使用英文和数字',
	'USERNAME_LETTER_NUM_SPACERS_EXPLAIN'=> '用户名必须介于 %1$s 和 %2$s 之间，并且只能使用英文，数字，空格和 -+_[] 这些字符。',
	'USERNAME_CHARS_ANY_EXPLAIN'	=> '长度必须介于 %1$s 和 %2$s 之间<br />一年只能修改一次',
	'USERNAME_TAKEN_USERNAME'		=> '您输入的用户名已经被使用，请选择另一个用户名。',
	'USERNAME_DISALLOWED_USERNAME'	=> '您输入的用户名是禁止的。',
	'USER_NOT_FOUND_OR_INACTIVE'	=> '您指定的用户名无法找到或者未被激活。',


	'VIEW_AVATARS'				=> '显示头像',
	'VIEW_EDIT'					=> '查看/编辑',
	'VIEW_FLASH'				=> '显示 Flash 动画',
	'VIEW_IMAGES'				=> '显示主题中的图片',
	'VIEW_NEXT_HISTORY'			=> '历史记录中的下一条短信',
	'VIEW_NEXT_PM'				=> '下一条短信',
	'VIEW_PM'					=> '查看短信',
	'VIEW_PM_INFO'				=> '短信信息',
	'VIEW_PM_MESSAGES'			=> array(
	1 => '%d 信息',
	2 => '%d 信息',
),
	'VIEW_PREVIOUS_HISTORY'		=> '历史记录中的前一条短信',
	'VIEW_PREVIOUS_PM'			=> '前一条短信',
	'VIEW_PROFILE'				=> '查看资料',
	'VIEW_SIGS'					=> '显示签名',
	'VIEW_SMILIES'				=> '显示笑脸',
	'VIEW_TOPICS_DAYS'			=> '显示几天前的主题',
	'VIEW_TOPICS_DIR'			=> '显示主题排序方向',
	'VIEW_TOPICS_KEY'			=> '显示主题排序依据',
	'VIEW_POSTS_DAYS'			=> '显示几天前的帖子',
	'VIEW_POSTS_DIR'			=> '显示帖子排序方向',
	'VIEW_POSTS_KEY'			=> '显示帖子排序依据',

	'WATCHED_EXPLAIN'			=> '以下是您订阅的版面和主题列表。您将收到它们的更新信息。退订： 选中版面或主题后点击 <em>退订选中</em> 按钮。',
	'WATCHED_FORUMS'			=> '观察的版面',
	'WATCHED_TOPICS'			=> '观察的主题',
	'WRONG_ACTIVATION'			=> '您提供的激活码在数据库中找不到匹配的记录',

	'YOUR_DETAILS'				=> '您的信息',
	'YOUR_FOES'					=> '您的损友列表',
	'YOUR_FOES_EXPLAIN'			=> '删除用户名： 选中并点击提交',
	'YOUR_FRIENDS'				=> '您的好友',
	'YOUR_FRIENDS_EXPLAIN'		=> '删除用户名： 选中并点击提交',
	'YOUR_WARNINGS'				=> '您的警告级别',

	'PM_ACTION' => array(
	'PLACE_INTO_FOLDER' => '放入文件夹',
	'MARK_AS_READ'      => '标记成已读',
	'MARK_AS_IMPORTANT' => '标记短信',
	'DELETE_MESSAGE'    => '删除短信',
),
	'PM_CHECK' => array(
	'SUBJECT' => '标题',
	'SENDER'  => '发送人',
	'MESSAGE' => '信息',
	'STATUS'  => '信息状态',
	'TO'      => '收信人',
),
	'PM_RULE' => array(
	'IS_LIKE'     => '匹配',
	'IS_NOT_LIKE' => '不匹配',
	'IS'          => '是',
	'IS_NOT'      => '不是',
	'BEGINS_WITH' => '以...开头',
	'ENDS_WITH'   => '以...结束',
	'IS_FRIEND'   => '是好友',
	'IS_FOE'      => '是损友',
	'IS_USER'     => '是用户',
	'IS_GROUP'    => '在用户组中',
	'ANSWERED'    => '已回复的',
	'FORWARDED'   => '已转发的',
	'TO_GROUP'    => '我的默认用户组',
	'TO_ME'       => '我',
),

	'GROUPS_EXPLAIN'	=> '用户组设置使管理员更好的管理用户。您会处于一个默认的组中。组定义将决定您对于其他用户的显示信息，例如您的用户名颜色，头像，级别等等。您可以改变您的默认组，但是这取决于管理员的设置。您也可能被放入或加入其他组。一些用户组将会具有额外的权限访问更多的区域。',
	'GROUP_LEADER'		=> '组领导',
	'GROUP_MEMBER'		=> '组成员',
	'GROUP_PENDING'		=> '待批准的组',
	'GROUP_NONMEMBER'	=> '非组成员',
	'GROUP_DETAILS'		=> '组信息',

	'NO_LEADER'		=> '没有组领导',
	'NO_MEMBER'		=> '没有组成员',
	'NO_PENDING'	=> '没有待批准的成员',
	'NO_NONMEMBER'	=> '没有零成员组',
));

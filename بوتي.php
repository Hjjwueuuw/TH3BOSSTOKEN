<?php
/*غير الحقوق واثبت انك فاشل
اذا تريد تنقل اذكر اسمي او اسم قناتي */

/*====================
CH : @AX_GB
DEV : @O_1_W
Translator : @AX_GB
/*====================*/
$admin = '1534317836';//ايدي ادمن
$token = '6770068108:AAH1N0V8OxXKScRh04smLebOGZs6P3f3RFU';//توكن بوتك
$botim = 'SERO9BOT';//يوزر بوتك
$botname = bot('getme',['SERO9Bot'])->result->username;

function bot($method,$datas=[]){
global $token;
    $url = "https://api.telegram.org/bot".$token."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$mid = $message->message_id;
$data = $update->callback_query->data;
$type = $message->chat->type;
$text = $message->text;
$cid = $message->chat->id;
$uid= $message->from->id;
$gname = $message->chat->title;
$left = $message->left_chat_member;
$new = $message->new_chat_member;
$name = $message->from->first_name;
$repid = $message->reply_to_message->from->id;
$repname = $message->reply_to_message->from->first_name;
$newid = $message->new_chat_member->id;
$leftid = $message->left_chat_member->id;
$newname = $message->new_chat_member->first_name;
$leftname = $message->left_chat_member->first_name;
$username = $message->from->username;
$cmid = $update->callback_query->message->message_id;
$cusername = $message->chat->username;
$repmid = $message->reply_to_message->message_id; 
$ccid = $update->callback_query->message->chat->id;
$cuid = $update->callback_query->message->from->id;
$cqid = $update->callback_query->id;

$photo = $update->message->photo;
$gif = $update->message->animation;
$video = $update->message->video;
$music = $update->message->audio;
$voice = $update->message->voice;
$sticker = $update->message->sticker;
$document = $update->message->document;
$for = $message->forward_from;
$forc = $message->forward_from_chat;
mkdir("pul");
mkdir("odam");
mkdir("qiwi");
$pul = file_get_contents("pul/$cid.txt");
$odam = file_get_contents("odam/$cid.dat");
$key = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"❤️ قسم الرشق"]],
[['text'=>"🎟️ معلوماتي"],['text'=>"🎟️ رابط الدعوة"]],
[['text'=>"🏆 الاوأل"],['text'=>"💬 تواصل الدعم"]],
]
]);

$key3 = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"⏪ رجوع لي خلف"]],
]
]);

$key2 = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"⏪ رجوع لي خلف"]],
]
]);

$panel = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"♐ قسم الاذاعة"]],
[['text'=>"➕ تعبئة الحساب"],['text'=>"➖ سحب رصيد"]],
[['text'=>"🚀 إحصائيات"],['text'=>"⏪ رجوع لي خلف"]],
]
]);

$key4 = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"✅OK"]],
]
]);

if(mb_stripos($text,"/start $cid")!==false){
    bot('sendMessage',[
          'chat_id'=>$cid,
          'text'=>"▶ حدد القسم المطلوب في القائمة الرئيسية 👇",
          'parse_mode'=>'html',
          'reply_markup'=>$key,
          ]);
    }else{
          $idref = "pul/$ex.db";
          $idref2 = file_get_contents($idref);
          $id = "$cid\n";
          $handle = fopen($idref, 'a+');
          fwrite($handle, $id);
          fclose($handle);
    if(mb_stripos($idref2,$cid) !== false ){
    }else{
    $pub=explode(" ",$text);
    $ex=$pub[1];
    $pul = file_get_contents("pul/$ex.txt");
    $a=$pul+5;
    file_put_contents("pul/$ex.txt","$a");
    $odam = file_get_contents("odam/$ex.dat");
    $b=$odam+1;
    file_put_contents("odam/$ex.dat","$b");
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"💥 اكسب عملات عامة عن طريق دعوة أصدقائك إلى برنامجنا الآلي
     سوف تحصل على 5 علاقات عامة لكل صديق تقوم بإحالته💸",
    'parse_mode'=>'html',
    'reply_markup'=>$key,
    ]);
    bot('sendmessage',[
    'chat_id'=>$ex,
    'text'=>"👏 تهانينا! قام صديقك بالتسجيل من خلال الروبوت الخاص بنا وحصلت على 5PR.",
    'parse_mode'=>'html',
    'reply_markup'=>$key,
    ]);
    }
    }

if($text=="/start"){
$pul = file_get_contents("pul/$cid.txt");
$mm=$pul+0;
file_put_contents("pul/$cid.txt","$mm");
$odam = file_get_contents("odam/$cid.dat");
$kkd=$odam+0;
file_put_contents("odam/$cid.dat","$kkd");
bot('sendmessage',[
    'chat_id'=>$cid,
    'text'=>"👋اهلا بك عزيزي $name
🤖مرحبا بكم في بوت لدينا.

من خلال الروبوت الخاص بنا، يمكنك رشق كومنتات والإعجابات والمشاهدات إلي جميع تطبيقات Telegram وTiktok وInstagram. واستخدم خدماتنا المفيدة الأخرى🤩


الرجاء تحديد الزر المطلوب:",
    'parse_mode'=>'html',
    'reply_markup'=>$key
    ]);
}
if($text=="⏪ رجوع لي خلف"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🔝مرحبا بكم في الصفحة الرئيسية",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}
if($text=="✅OK"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"💳 انتظر حتى يصبح الأمر ساري المفعول\n\n 🔝انت هنا",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}
if($text=="🎟️ رابط الدعوة"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"عدد إحالتك 🔳: $odam شخص
🎟️ رصيدك: $pul $

👫لك 5 روبل على كل صديقك يدخل من رابط دعوتك.
🌐رابط الإحالة الخاص بك:\nhttps://t.me/$botname?start=$cid",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}
if($text=="🎟️ معلوماتي"){
$pul = file_get_contents("pul/$cid.txt");
$odam = file_get_contents("odam/$cid.dat");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🆔 ايدي خاص بك: <code>$cid</code>

🔸 أصدقائك: <b>$odam</b> شخص
🔹 اموالك: <b>$pul $</b>",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}

if($text==""){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"أرسل رابط قناتك (المجموعة)...

مثال: https://t.me/AX_GB

💸 مطلوب 100 PR لإجراء الحد الأدنى للسحب.

🔸عند 100 - 100 PR",   
'parse_mode'=>'html',
'reply_markup'=>$key3,
]);
}
if(mb_stripos($text,"https://t.me/")!==false){
file_put_contents("qiwi/$cid.txt","$text");
$qiwi=file_get_contents("qiwi/$cid.txt");
$pul = file_get_contents("pul/$cid.txt");
$odam = file_get_contents("odam/$cid.dat");
if($pul>=100){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"رابط القناة (المجموعة): <b>$qiwi</b>
💸 من أجل تطور: <b>$pul PR</b>

🎫 تم قبول الطلب! حالة الطلب: قيد المعالجة...! سنبلغك بتنفيذ الطلب من خلال الروبوت",
'parse_mode'=>'html',
'reply_markup'=>$key4
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"انتباه <b>$cid</b> وا وصل الطلب!

رابط القناة (المجموعة): <b>$qiwi</b>
نقاطك: <b>$pul PR</b>
الناس المدعوين: <b>$odam</b> شخص
ID : <code>$cid</code>",
'parse_mode'=>'html',
]);
$pul = file_get_contents("pul/$cid.txt");
$k=$pul-$pul;
file_put_contents("pul/$cid.txt","$k");
$sum=file_get_contents("tolandi.txt");
$uio=$pul+$sum;
file_put_contents("tolandi.txt","$uio");
}else{
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"☝️ حسابك لا يحتوي على ما يكفي من العملات العامة!\nفي رصيدك: $pul PR هنالك!.",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}
}
if($text=="💬 تواصل الدعم"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🆘 قم بزيارة دردشة الدعم الخاصة بنا حيث يمكنك العثور على إجابات للأسئلة المتداولة.

🧾 معلومات محدثة عن الجوائز والمزيد، فقط على الروبوت!

⚠️ إذا لم تتبع شروط البوت - سيتم منعك من البوت! 👇",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"تواصل الدعم",'url'=>"https://t.me/AX_GB"]],
]
])
]);
}

if((mb_stripos($text,"/panel")!==false) and $cid==$admin){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"⚙ <b>مرحبًا بك في لوحة الإدارة:</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
}
if($text=="➕ تعبئة الحساب"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"👤 لتعبئة حساب المستخدم الخاص بك:

/plus id ارسل عدد نقاط

👉 مثال: /plus $admin 100",   
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
}
if($text=="➖ سحب رصيد"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"👤 سحب رصيد حساب مستخدم:

/minus id ارسل عدد نقاط

👉 مثال: /minus $admin 100",   
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
}

if((mb_stripos($text,"/plus")!==false) and $cid==$admin){
$exx=explode(" ",$text);
$ex1=$exx[1];
$ex2=$exx[2];
$pul = file_get_contents("pul/$ex1.txt");
$rr=$pul+$ex2;
file_put_contents("pul/$ex1.txt","$rr");
$pul = file_get_contents("pul/$ex1.txt");
$odam = file_get_contents("odam/$ex1.dat");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"انتباه <b>$ex1</b> وا <b>$ex2 PR</b> اضافة!

نقاطك: <b>$pul PR</b>
ID : <code>$ex1</code>",
'parse_mode'=>'html',
]);
bot('sendmessage',[
'chat_id'=>$ex1,
'text'=>"✅ سحب نقاط! <b>$ex2 PR</b> تمت إضافتها إلى حساب الروبوت الخاص بك.

الرصيد الحالي: <b>$pul PRb>",
'parse_mode'=>'html',
]);
}
if((mb_stripos($text,"/minus")!==false) and $cid==$admin){
$exxx=explode(" ",$text);
$ex3=$exxx[1];
$ex4=$exxx[2];
$pul = file_get_contents("pul/$ex3.txt");
$rr=$pul-$ex4;
file_put_contents("pul/$ex3.txt","$rr");
$pul = file_get_contents("pul/$ex3.txt");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"انتباه <b>$ex1</b> وا <b>$ex2 PR</b> إزالة!

نقاطك: <b>$pul PR</b>
ID: <code>$ex1</code>",
'parse_mode'=>'html',
]);
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"✅ سحب نقاط! <b>$ex2 PR</b> تمت إزالة الروبوت الخاص بك من حسابك. الرصيد الحالي: <b>$pul PR</b>",
'parse_mode'=>'html',
]);
}
$lichka = file_get_contents("lichka.db");
$xabar = file_get_contents("xabarlar.txt");

if($type=="private"){
if(strpos($lichka,"$cid") !==false){
}else{
file_put_contents("lichka.db","$lichka\n$cid");
}
} 
$reply = $message->reply_to_message->text;
$rpl = json_encode([
            'resize_keyboard'=>false,
            'force_reply'=>true,
            'selective'=>true
        ]);
if($text=="♐ قسم الاذاعة" and $cid==$admin){
  bot('sendmessage',[
    'chat_id'=>$admin,
    'text'=>"أدخل نص الرسالة المراد إرسالها!",
    'parse_mode'=>"html",
]);
    file_put_contents("xabarlar.txt","user");
}
if($xabar=="user" and $cid==$admin){
if($text=="/cancel"){
	file_put_contents("xabarlar.txt","");
}else{
  $lich = file_get_contents("lichka.db");
  $lichka = explode("\n",$lich);
  foreach($lichka as $lichkalar){
  $okuser=bot("sendmessage",[
    'chat_id'=>$lichkalar,
    'text'=>$text,
    'parse_mode'=>'html'
]);
}
if($okuser){
  bot("sendmessage",[
    'chat_id'=>$admin,
    'text'=>"تم إرسالها إلى جميع المستخدمين!",
    'parse_mode'=>'html',
]);
  file_put_contents("xabarlar.txt","");
}
}
}



$sum=file_get_contents("tolandi.txt");
if($text=="🚀 إحصائيات"){
$sum=file_get_contents("tolandi.txt");
$lich = substr_count($lichka,"\n");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"📶 أعضاء الروبوت لدينا: <b>$lich ta</b>

💳 تم استخدام رابط: <b>$sum PR</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
}
if(mb_stripos($text,"/pul")!==false){
$him=explode(" ",$text);
$hm=$him[1];
file_put_contents("tolandi.txt","$hm");
$sum=file_get_contents("tolandi.txt");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"$sum تمت إضافة العلاقات العامة!",
'parse_mode'=>'html',
]);
}
if($text=="❤️ قسم الرشق"){
bot('sendmessage',[
    'chat_id'=>$cid,
    'text'=>"<b>
اهلا بك عزيزي فى قسم الرشق?</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
 'keyboard'=>[
  [['text'=>"❤️ 𝐈𝐧𝐬𝐭𝐚𝐠𝐫𝐚𝐦"],], 
[['text'=>"👤 𝐓𝐢𝐤 𝐭𝐨𝐤"],['text'=>"👤 𝐓𝐞𝐥𝐞𝐠𝐫𝐚𝐦"],],  

 [['text'=>"⏪ رجوع لي خلف"]]
   ]
   ]), 
   ]);
  
}

if($text=="❤️ 𝐈𝐧𝐬𝐭𝐚𝐠𝐫𝐚𝐦"){
bot('sendmessage',[
    'chat_id'=>$cid,
    'text'=>"<b>
اهلا بك عزيزي فى قسم الرشق?</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
 'keyboard'=>[
  [['text'=>"❤️ 𝐋𝐚𝐲𝐤"],], [['text'=>"👁 مشهدات"],['text'=>"👥 متابعين"],],  

 [['text'=>"⏪ رجوع لي خلف"]]
   ]
   ]), 
   ]);
  
}

if($text=="👤 𝐓𝐢𝐤 𝐭𝐨𝐤"){
bot('sendmessage',[
    'chat_id'=>$cid,
    'text'=>"<b>
اهلا بك عزيزي فى قسم الرشق?</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
 'keyboard'=>[
  [['text'=>"👁 𝐩𝐫𝐚𝐬𝐦𝐨𝐭𝐫"],['text'=>"👥متابعين"],],  

 [['text'=>"⏪ رجوع لي خلف"]]
   ]
   ]), 
   ]);
  
}

if($text=="👤 𝐓𝐞𝐥𝐞𝐠𝐫𝐚𝐦"){
bot('sendmessage',[
    'chat_id'=>$cid,
    'text'=>"<b>
اهلا بك عزيزي فى قسم الرشق?</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
 'keyboard'=>[
  [['text'=>"👁مشهدات"],['text'=>"👥متابعين"],],  
 [['text'=>"⏪ رجوع لي خلف"]]
   ]
   ]), 
   ]);
  
}



if($text=="👥متابعين"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🔗 أرسل لي رابط قناتك أو مجموعتك على التليجرام.
مثال: @AX_GB


🏁 سرعة الرشق: 5-10 دقيقة
🚴 السرعة : 30000 يوميا
🔥 الخدمة: متابعين عرب حقيقين
✅ الحد الأقصى: 100000 لكل رابط
⚠️ يرجى التحقق من الرابط بعناية، ولن نقوم برد الأموال المدفوعة مقابل رابط خاطئ.

🎟️ 3 من RP - 1 من نقاط
🎟️ رصيدك: $pul",   
'parse_mode'=>'html',
'reply_markup'=>$key3,
]);
}

if(mb_stripos($text,"@")!==false){
file_put_contents("qiwi/$cid.txt","$text");
$qiwi=file_get_contents("qiwi/$cid.txt");
$pul = file_get_contents("pul/$cid.txt");
$odam = file_get_contents("odam/$cid.dat");
if($pul>=150){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🎫 تم قبول الطلب! حالة الطلب: قيد المعالجة...! سنبلغك بتنفيذ الطلب من خلال الروبوت",
'parse_mode'=>'html',
'reply_markup'=>$key4
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"
💳 اكتمل طلب المستخدم!
♐️ ID: $cid
🔎 Link: $qiwi
🔢 الكمية عند: 150
♎️ قيد تنفيذ: 50
 فعلت بنجاح!",
'parse_mode'=>'html',
]);
$pul = file_get_contents("pul/$cid.txt");
$k=$pul-$pul;
file_put_contents("pul/$cid.txt","$k");
$sum=file_get_contents("tolandi.txt");
$uio=$pul+$sum;
file_put_contents("tolandi.txt","$uio");
}else{
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"☝️ الحد الأدنى للطلب 50 شخص\nفي رصيدك: $pul PR هنالك!
50 شخص = 150 PR.",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}
}



if($text=="👁مشهدات"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🔗 أرسل لي رابط منشورك على Telegram.
مثال:
https://t.me/AX_GB/1


🏁 سرعة الرشق: 5-10 دقيقة
🚴 السرعة : 5000 يوميا
🔥 الجودة: مشهدات
✅ الحد الأقصى: 10000 لكل رابط يجب عليك إرسال رابط للمنشور، ولن نقوم برد العلاقات العامة للروابط الخاطئة، ولن يتم قبول أي شكاوى لهذه الخدمة. كن مراعيًا.


🎟 1 دولار - 10 مشاهدات
🎟️ رصيدك: $pul",   
'parse_mode'=>'html',
'reply_markup'=>$key3,
]);
}

if(mb_stripos($text,"https://")!==false){
file_put_contents("qiwi/$cid.txt","$text");
$qiwi=file_get_contents("qiwi/$cid.txt");
$pul = file_get_contents("pul/$cid.txt");
$odam = file_get_contents("odam/$cid.dat");
if($pul>=5){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🎫 تم قبول الطلب! حالة الطلب: قيد المعالجة...! سنبلغك بتنفيذ الطلب من خلال الروبوت",
'parse_mode'=>'html',
'reply_markup'=>$key4
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"
💳 اكتمل طلب المستخدم!
♐️ ID: $cid
🔎 Link: $qiwi
🔢 الكمية عند: 5
♎️ قيد تنفيذ: 50
 فعلت بنجاح!",
'parse_mode'=>'html',
]);
$pul = file_get_contents("pul/$cid.txt");
$k=$pul-$pul;
file_put_contents("pul/$cid.txt","$k");
$sum=file_get_contents("tolandi.txt");
$uio=$pul+$sum;
file_put_contents("tolandi.txt","$uio");
}else{
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}
}



if($text=="👥متابعين"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🔗 أرسل لي اسم مستخدم Tiktok الخاص بك.
مثال:
tiktok.com/User



🏁 سرعة الرشق: 5-10 دقيقة
🚴 السرعة : 30000 يوميا
🔥 الخدمة: متابعين عرب حقيقين 
✅ الحد الأقصى: 100000 لكل رابط
⚠️ يرجى التحقق من اسم المستخدم الخاص بك بعناية، ولن نقوم برد الأموال المدفوعة مقابل اسم مستخدم خاطئ.

🎟️ 3 نقاط - 1 عضو
🎟️ رصيدك: $pul",   
'parse_mode'=>'html',
'reply_markup'=>$key3,
]);
}

if(mb_stripos($text,"@")!==false){
file_put_contents("qiwi/$cid.txt","$text");
$qiwi=file_get_contents("qiwi/$cid.txt");
$pul = file_get_contents("pul/$cid.txt");
$odam = file_get_contents("odam/$cid.dat");
if($pul>=150){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🎫 تم قبول الطلب! حالة الطلب: قيد المعالجة...! سنبلغك بتنفيذ الطلب من خلال الروبوت",
'parse_mode'=>'html',
'reply_markup'=>$key4
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"
💳 اكتمل طلب المستخدم! مشترك ثابت
♐️ ID: $cid
🔎 Tik Tok: $qiwi
🔢 الكمية عند: 150
♎️ قيد تنفيذ: 50
 فعلت بنجاح!",
'parse_mode'=>'html',
]);
$pul = file_get_contents("pul/$cid.txt");
$k=$pul-$pul;
file_put_contents("pul/$cid.txt","$k");
$sum=file_get_contents("tolandi.txt");
$uio=$pul+$sum;
file_put_contents("tolandi.txt","$uio");
}else{
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}
}

if($text=="👁 𝐩𝐫𝐚𝐬𝐦𝐨𝐭𝐫"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🔗 أرسل لي رابط منشورك على Tiktok.
مثال:
https://vm.tiktok.com/link/


🏁 سرعة الرشق: 5-10 دقيقة
🚴 السرعة : 30000 يوميا
🔥 الخدمة: مشهدات حقيقة 
✅ الحد الأقصى: 100000 لكل رابط
⚠️ يرجى التحقق من الرابط بعناية، ولن نقوم برد الأموال المدفوعة مقابل رابط خاطئ.

🎟️ 1 ta RP - 5 ta prosmotr
🎟️ رصيدك: $pul",   
'parse_mode'=>'html',
'reply_markup'=>$key3,
]);
}

if(mb_stripos($text,"https://")!==false){
file_put_contents("qiwi/$cid.txt","$text");
$qiwi=file_get_contents("qiwi/$cid.txt");
$pul = file_get_contents("pul/$cid.txt");
$odam = file_get_contents("odam/$cid.dat");
if($pul>=10){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🎫 تم قبول الطلب! حالة الطلب: قيد المعالجة...! سنبلغك بتنفيذ الطلب من خلال الروبوت",
'parse_mode'=>'html',
'reply_markup'=>$key4
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"
💳 اكتمل طلب المستخدم! مشهدات تيك 
♐️ ID: $cid
🔎 Link: $qiwi
🔢 الكمية عند: 10
♎️ قيد تنفيذ: 50
 فعلت بنجاح!",
'parse_mode'=>'html',
]);
$pul = file_get_contents("pul/$cid.txt");
$k=$pul-$pul;
file_put_contents("pul/$cid.txt","$k");
$sum=file_get_contents("tolandi.txt");
$uio=$pul+$sum;
file_put_contents("tolandi.txt","$uio");
}else{
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}
}

if($text=="❤️ 𝐋𝐚𝐲𝐤"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🔗 أرسل لي رابطًا لمنشورك على Instagram. :
https://www.instagram.com/p/CC4Ha4pJqC-/?utm_medum=copy_link


🏁 سرعة الرشق: 5-10 دقيقة
🚴 السرعة : 30000 يوميا
🔥 الخدمة : رشق متابعين عرب 
✅ الحد الأقصى: 100000 لكل رابط
⚠️ يرجى التحقق من الرابط بعناية، ولن نقوم برد الأموال المدفوعة مقابل رابط خاطئ.

🎟️ 1 ta PR - 5 ta layk
🎟️ رصيدك: $pul",   
'parse_mode'=>'html',
'reply_markup'=>$key3,
]);
}

if(mb_stripos($text,"https://")!==false){
file_put_contents("qiwi/$cid.txt","$text");
$qiwi=file_get_contents("qiwi/$cid.txt");
$pul = file_get_contents("pul/$cid.txt");
$odam = file_get_contents("odam/$cid.dat");
if($pul>=10){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🎫 تم قبول الطلب! حالة الطلب: قيد المعالجة...! سنبلغك بتنفيذ الطلب من خلال الروبوت",
'parse_mode'=>'html',
'reply_markup'=>$key4
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"
💳 اكتمل طلب المستخدم ليك!
♐️ ID: $cid
🔎 Link: $qiwi
🔢 الكمية عند: 10
♎️ قيد تنفيذ: 50
 فعلت بنجاح!",
'parse_mode'=>'html',
]);
$pul = file_get_contents("pul/$cid.txt");
$k=$pul-$pul;
file_put_contents("pul/$cid.txt","$k");
$sum=file_get_contents("tolandi.txt");
$uio=$pul+$sum;
file_put_contents("tolandi.txt","$uio");
}else{
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}
}

if($text=="👥 متابعين"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🔗 أرسل لي اسم مستخدم Instagram الخاص بك.
مثال:
Instagram.com/user


🏁 سرعة الرشق: 5-10 دقيقة
🚴 السرعة : 30000 يوميا
🔥 الخدمة : رشق متابعين عرب 
✅ الحد الأقصى: 100000 لكل رابط
⚠️ يرجى التحقق من اسم المستخدم الخاص بك بعناية، ولن نقوم برد الأموال المدفوعة مقابل اسم مستخدم خاطئ.

🎟️ 3 نقاط مقابل - شخص 1
🎟️ رصيدك: $pul",   
'parse_mode'=>'html',
'reply_markup'=>$key3,
]);
}

if(mb_stripos($text,"@")!==false){
file_put_contents("qiwi/$cid.txt","$text");
$qiwi=file_get_contents("qiwi/$cid.txt");
$pul = file_get_contents("pul/$cid.txt");
$odam = file_get_contents("odam/$cid.dat");
if($pul>=150){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🎫 تم قبول الطلب! حالة الطلب: قيد المعالجة...! سنبلغك بتنفيذ الطلب من خلال الروبوت",
'parse_mode'=>'html',
'reply_markup'=>$key4
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"
💳 اكتمل طلب المستخدم! متابع الانستا
♐️ ID: $cid
🔎 Link: $qiwi
🔢 الكمية عند: 150
♎️ قيد تنفيذ: 50
 فعلت بنجاح!",
'parse_mode'=>'html',
]);
$pul = file_get_contents("pul/$cid.txt");
$k=$pul-$pul;
file_put_contents("pul/$cid.txt","$k");
$sum=file_get_contents("tolandi.txt");
$uio=$pul+$sum;
file_put_contents("tolandi.txt","$uio");
}else{
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}
}

if($text=="👁 مشهدات"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🔗 أرسل لي رابطًا لمنشورك على Instagram. :
https://www.instagram.com/p/CS0o802i7fD/?utm_meium=copy_link


🏁 سرعة الرشق: 5-10 دقيقة
🚴 السرعة : 30000 يوميا
🔥 الخدمة: مشهدات حقيقة  
✅ الحد الأقصى: 100000 لكل رابط
⚠️ يرجى التحقق من الرابط بعناية، ولن نقوم برد الأموال المدفوعة مقابل رابط خاطئ.

🎟️ 1 تا PR - 10 مقابل
🎟️ رصيدك: $pul",   
'parse_mode'=>'html',
'reply_markup'=>$key3,
]);
}

if(mb_stripos($text,"https://")!==false){
file_put_contents("qiwi/$cid.txt","$text");
$qiwi=file_get_contents("qiwi/$cid.txt");
$pul = file_get_contents("pul/$cid.txt");
$odam = file_get_contents("odam/$cid.dat");
if($pul>=5){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🎫 تم قبول الطلب! حالة الطلب: قيد المعالجة...! سنبلغك بتنفيذ الطلب من خلال الروبوت",
'parse_mode'=>'html',
'reply_markup'=>$key4
]);
bot('sendmessage',[
'chat_id'=>$kanal,
'text'=>"
💳 تم إكمال طلب المستخدم عرض!
♐️ ID: $cid
🔎link: $qiwi
🔢 الكمية عند: 5
♎️ قيد تنفيذ: 50
 فعلت بنجاح!",
'parse_mode'=>'html',
]);
$pul = file_get_contents("pul/$cid.txt");
$k=$pul-$pul;
file_put_contents("pul/$cid.txt","$k");
$sum=file_get_contents("tolandi.txt");
$uio=$pul+$sum;
file_put_contents("tolandi.txt","$uio");
}else{
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}
}


if($text=="🏆 الاوأل"){
$reyting = reyting();
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"$reyting",
'parse_mode'=>'html',
]);
}

function reyting(){
$tx = $message->text;
$ex=explode("_",$tx);
$text = "<b>🛡اكثر اشخاص تشارق رابط الدعوه خاص بة:</b>\n\n";
$daten = [];
$rev = [];
$fayllar = glob("*pul/$ex[1]/*.*");
foreach($fayllar as $file){
if(mb_stripos($file,".txt")!==false){
$value = file_get_contents($file);
$id = str_replace(["pul/$ex[1]/",".txt"],["",""],$file);
$daten[$value] = $id;
$rev[$id] = $value;
}
echo $file;
}

asort($rev);
$reversed = array_reverse($rev);
for($i=0;$i<10;$i+=1){
$order = $i+1;
$id = $daten["$reversed[$i]"];
$text.= "<b>{$order}</b>. <a href='tg://user?id={$id}'>{$id}</a> - "."<b>".$reversed[$i]."</b>"." <i>شخص</i>"."\n";
}
return $text;
}
/*غير الحقوق واثبت انك فاشل
اذا تريد تنقل اذكر اسمي او اسم قناتي */

/*====================
CH : @AX_GB
DEV : @O_1_W
Translator : @AX_GB
/*====================*/
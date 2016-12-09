<?php
 mail('abhisheksharma.oct90@gmail.com','Cron','cool');
		$url = "http://www.mixb.jp/uk/job/job_edit_f.php";
		
       $headers = array("Content-Type:multipart/form-data");
        
      	//$data = array('psw' => 'yessure', 'id' => '20520');
       $data = array("sample"=>1,"work_gyosyu_id"=>25,"job_type_work_biyou_survice"=>"on","job_type_work_other"=>"on","job_type_other"=>"セラピスト","eng_skl_id"=>"2","visa_wh"=>"on","company_name"=>"The Massage Rooms Limited","tantou"=>"Amer","email"=>"Admin@TheMassageRooms.com","web"=>"www.TheMassageRooms.com","area_id"=>"7","area_real_name"=>"ロンドン市内全域","title"=>"Massage therapist ★ マッサージセラピスト募集","detail"=>"We are looking for more massage therapists to join our happy and successful team. You can earn good money but you must be honest, reliable, willing to travel around London to visit customers.English is not important so long as you can massage well and are happy to travel around London. It is a great way to learn and improve your English by meeting new people and speaking with them every day.
       

Check out our website, and feel free to contact us. 
We hold interviews in West London.

www.TheMassageRooms.com

オーナーに代わって。ロンドン内での出張マッサージセラピストを募集しています。現地の出張マッサージ専門の会社です。一緒に頑張るセラピストはイギリス人含めヨーロピアンが殆どです。そしてお客様は男女ともに世界各国から。ホテルへ出向くこともあれば個人宅やオフィスへお伺いすることもあります。簡単な英語のやり取りは必要ですが、伝えよう、理解しようという気持ちがあれば大丈夫です。慣れてくれば英会話の練習にもなりますし、いろんな国の話しが聞けるのも楽しいです。ロンドン中を回るで地理や交通機関に詳しくなり、意外なすてきな場所やお店発見もあったりします。普段は見れない住宅やホテルのインテリアもまた楽しめます。

                           忙しい日もありますが空いた時間は自由に使えます。私事ですが、たった一年間でアロマセラピースクールや語学学校、旅行へいくのに十分なほどの資金ができました。お客様によってはチップを弾んでくれる方もいます。

                           質問やトラブルはオーナーに聞けば直ぐに対応してくれるので安心です。オーナーはネイティブのイギリス人なので、問い合わせメールは英語でお願いします。
                           
Admin@TheMassageRooms.com","max_file_size[]"=>"2024000","max_file_size[]"=>"2024000","max_file_size[]"=>"2024000","pic1_save"=>"20160514_210349a184.jpg","pic2_save"=>"20160514_210349b184.jpg","pic3_save"=>"20160514_210349c184.jpg","password"=>"yessure","id"=>"20520","edit_del"=>1);

      	$url = 'http://www.mixb.jp/uk/job/job_edit_p.php';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        // Apply the XML to our curl call
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);

        $data = curl_exec($ch);

        if (curl_errno($ch)) {
        	mail('abhisheksharma.oct90@gmail.com','Error In Cron','error');
            print "Error: " . curl_error($ch);
        } else {
        	//echo 'cool';
            // Show me the result
            //echo $data;
            mail('abhisheksharma.oct90@gmail.com','Success Cron','Success');
            curl_close($ch);
        } 
        
?>
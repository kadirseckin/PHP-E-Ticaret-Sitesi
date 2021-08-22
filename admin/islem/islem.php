<?php 
session_start();

require_once 'baglanti.php';


if(isset($_POST['ayarKaydet'])){
	$duzenle=$baglanti->prepare("UPDATE ayarlar SET
			baslik=:baslik,
			aciklama=:aciklama,
			anahtarkelime=:anahtarkelime 	

			WHERE id=1
		");

	$update=$duzenle->execute(array(
		'baslik'=>$_POST['baslik'],
		'aciklama'=>$_POST['aciklama'],
		'anahtarkelime'=>$_POST['anahtarkelime']

	));

	if($update){
		header("Location:../ayarlar.php?yuklenme=basarili");
	}else{
		header("Location:../ayarlar.php?yuklenme=basarisiz");
	}

}


if(isset($_POST['iletisimKaydet'])){
	$duzenle=$baglanti->prepare("UPDATE ayarlar SET
			telefon=:telefon,
			email=:email,
			adres=:adres,
			mesai=:mesai 	

			WHERE id=1
		");

	$update=$duzenle->execute(array(
		'telefon'=>$_POST['telefon'],
		'email'=>$_POST['email'],
		'adres'=>$_POST['adres'],
		'mesai'=>$_POST['mesai']

	));

	if($update){
		header("Location:../iletisim.php?yuklenme=basarili");
	}else{
		header("Location:../iletisim.php?yuklenme=basarisiz");
	}

}

if(isset($_POST['sosyalmedyaKaydet'])){
	$duzenle=$baglanti->prepare("UPDATE ayarlar SET
			instagram=:instagram,
			twitter=:twitter,
			facebook=:facebook,
			youtube=:youtube 	

			WHERE id=1
		");

	$update=$duzenle->execute(array(
		'instagram'=>$_POST['instagram'],
		'twitter'=>$_POST['twitter'],
		'facebook'=>$_POST['facebook'],
		'youtube'=>$_POST['youtube']

	));

	if($update){
		header("Location:../sosyalmedya.php?yuklenme=basarili");
	}else{
		header("Location:../sosyalmedya.php?yuklenme=basarisiz");
	}

}

if(isset($_POST['logoKaydet'])){
	$uploads_dir='../resimler/logo';
	@$tmp_name=$_FILES['logo'] ["tmp_name"];
	@$name=$_FILES['logo'] ["name"];

	$sayi1=rand(1,1000000);
	$sayi2=rand(1,1000000);
	$sayi3=rand(10000,2000000);

	$sayilar=$sayi1.$sayi2.$sayi3;
	$resimyolu=$sayilar.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$resimyolu");
   //image yüklendi

	//dbye kaydedelim
	$duzenle=$baglanti->prepare("UPDATE ayarlar SET
			logo=:logo		
			WHERE id=1
		");

	$update=$duzenle->execute(array(
		'logo'=>$resimyolu

	));

	if($update){
		$resimsil=$_POST['eskilogo'];
		unlink("../resimler/logo/$resimsil");

		header("Location:../ayarlar.php?yuklenme=basarili");
	}else{
		header("Location:../ayarlar.php?yuklenme=basarisiz");
	}

}


if(isset($_POST['hakkimizdaKaydet'])){


	if($_FILES['resim']["size"]>0){

		$uploads_dir='../resimler/hakkimizda';
		@$tmp_name=$_FILES['resim'] ["tmp_name"];
		@$name=$_FILES['resim'] ["name"];

		$sayi1=rand(1,1000000);
		$sayi2=rand(1,1000000);
		$sayi3=rand(10000,2000000);

		$sayilar=$sayi1.$sayi2.$sayi3;
		$resimyolu=$sayilar.$name;

		@move_uploaded_file($tmp_name, "$uploads_dir/$resimyolu");
   		//image yüklendi

		$duzenle=$baglanti->prepare("UPDATE hakkimizda SET
			hakkimizda_baslik=:baslik,
			hakkimizda_detay=:detay,
			hakkimizda_misyon=:misyon,
			hakkimizda_vizyon=:vizyon,
			hakkimizda_resim=:resim 	

			WHERE hakkimizda_id=1
		");

		$update=$duzenle->execute(array(
		'baslik'=>$_POST['baslik'],
		'detay'=>$_POST['detay'],
		'misyon'=>$_POST['misyon'],
		'vizyon'=>$_POST['vizyon'],
		'resim'=>$resimyolu

	));

		if($update){
		
		$resimsil=$_POST['eskiresim'];
		unlink("../resimler/hakkimizda/$resimsil");

		header("Location:../hakkimizda.php?yuklenme=basarili");
		}else{
		header("Location:../hakkimizda.php?yuklenme=basarisiz");
		}

	}else{


		$duzenle=$baglanti->prepare("UPDATE hakkimizda SET
			hakkimizda_baslik=:baslik,
			hakkimizda_detay=:detay,
			hakkimizda_misyon=:misyon,
			hakkimizda_vizyon=:vizyon
				

			WHERE hakkimizda_id=1
		");

		$update=$duzenle->execute(array(
		'baslik'=>$_POST['baslik'],
		'detay'=>$_POST['detay'],
		'misyon'=>$_POST['misyon'],
		'vizyon'=>$_POST['vizyon']
		

	));
		
		if($update){
		header("Location:../hakkimizda.php?yuklenme=basarili");
		}else{
		header("Location:../hakkimizda.php?yuklenme=basarisiz");
		}

	}

}

if(isset($_POST['girisyap'])){
	//güvenlik için 

	$kadi=htmlspecialchars($_POST['kadi']);
	$sifre=htmlspecialchars($_POST['sifre']);
	$sifreguclu=md5($sifre);


	$kullanicisor=$baglanti->prepare(
		"SELECT *from kullanici 
		WHERE kullanici_adi=:kullanici_adi and 
		kullanici_sifre=:kullanici_sifre and 
		kullanici_yetki=:kullanici_yetki");

	$kullanicisor->execute(array(
		'kullanici_adi'=>$kadi,
		'kullanici_sifre'=>$sifreguclu,
		'kullanici_yetki'=>2 //admin
	));

	$kullanici=$kullanicisor->rowCount();

	if($kullanici>0){
		$_SESSION['girisbelgesi']=$kadi;
		Header("Location:../Index?durum=hosgeldin");
	}
	else{
		Header("Location:../Login?durum=hata");
	}


}


if(isset($_POST['uyelerKaydet'])){

	$kadi=htmlspecialchars($_POST['kadi']);
	$adsoyad=htmlspecialchars($_POST['adsoyad']);
	$sifre=htmlspecialchars($_POST['sifre']);
	$mail=htmlspecialchars($_POST['email']);
	$sifreguclu=md5($sifre);


	$kullanicisor=$baglanti->prepare("
		SELECT *from kullanici 
		WHERE kullanici_adi=:kullanici_adi and 
		kullanici_yetki=:kullanici_yetki");

	$kullanicisor->execute(array(
		'kullanici_adi'=>$kadi,
		'kullanici_yetki'=>2 //admin
	));

	$kullanici=$kullanicisor->rowCount();

	//kullanıcı varsa yönlendir kaydetme
	if($kullanici>0){
		Header("Location:../uyeler-ekle?durum=kullanicivar");
		
	}else{ //kullanıcı yoksa kaydet
		$uploads_dir='../resimler/kullanici';
		@$tmp_name=$_FILES['resim'] ["tmp_name"];
		@$name=$_FILES['resim'] ["name"];

		$sayi1=rand(1,1000000);
		$sayi2=rand(1,1000000);
		$sayi3=rand(10000,2000000);

		$sayilar=$sayi1.$sayi2.$sayi3;
		$resimyolu=$sayilar.$name;

		@move_uploaded_file($tmp_name, "$uploads_dir/$resimyolu");

	

		$kullaniciKaydet=$baglanti->prepare("INSERT INTO kullanici SET
			
			kullanici_adi=:kullanici_adi,
			kullanici_sifre=:kullanici_sifre,
			kullanici_adsoyad=:kullanici_adsoyad,
			kullanici_yetki=:kullanici_yetki,
			kullanici_resim=:kullanici_resim,
			kullanici_mail=:kullanici_mail	

		");  //yetki 2 ise admin

		$insert=$kullaniciKaydet->execute(array(
		'kullanici_adi'=>$kadi,
		'kullanici_sifre'=>$sifreguclu,
		'kullanici_adsoyad'=>$adsoyad,
		 'kullanici_mail'=>$mail,
		'kullanici_yetki'=>2,
		'kullanici_resim'=>$resimyolu
		

	));
		
		
		if($insert){
		header("Location:../uyeler?yuklenme=basarili");
		}else{
		header("Location:../uyeler?yuklenme=basarisiz");
		}
	}


	
}


if(isset($_GET['kullanicisil'])){
	$kullaniciSil=$baglanti->prepare("DELETE from kullanici WHERE kullanici_id=:kullanici_id");
	$sil=$kullaniciSil->execute(array(

		'kullanici_id'=>$_GET['id'] 
	));

	if($sil){
		header("Location:../uyeler?silme=basarili");
	}else{
		header("Location:../uyeler?silme=basarisiz");
	}
}

if(isset($_POST['kategoriKaydet'])){
	$kategoriKaydet=$baglanti->prepare("INSERT INTO kategori SET
			
			kategori_adi=:kategori_adi,
			kategori_sira=:kategori_sira,
			kategori_durum=:kategori_durum
		

		");  //yetki 2 ise admin

		$insert=$kategoriKaydet->execute(array(
		'kategori_adi'=>$_POST['katadi'],
		'kategori_sira'=>$_POST['sira'],
		'kategori_durum'=>$_POST['kategoridurum']

		

	));
		
		
		if($insert){
		header("Location:../kategori?yuklenme=basarili");
		}else{
		header("Location:../kategori?yuklenme=basarisiz");
		}
}


if(isset($_POST['kategoriDuzenle'])){

	$id=$_POST['kategori_id'];
	$duzenle=$baglanti->prepare("UPDATE kategori SET
			kategori_adi=:kategori_adi,
			kategori_sira=:kategori_sira,
			kategori_durum=:kategori_durum 	

			WHERE kategori_id=$id
		");

	$update=$duzenle->execute(array(
		'kategori_adi'=>$_POST['katadi'],
		'kategori_sira'=>$_POST['sira'],
		'kategori_durum'=>$_POST['kategoridurum']

	));

	if($update){
		header("Location:../kategori.php?yuklenme=basarili");
	}else{
		header("Location:../kategori.php?yuklenme=basarisiz");
	}

}


if(isset($_GET['kategoriSil'])){
	$kategorisil=$baglanti->prepare("DELETE from kategori WHERE kategori_id=:kategori_id");
	$sil=$kategorisil->execute(array(

		'kategori_id'=>$_GET['id'] 
	));

	if($sil){
		header("Location:../kategori?silme=basarili");
	}else{
		header("Location:../kategori?silme=basarisiz");
	}
}

//Slider
if(isset($_POST['sliderKaydet'])){
	$uploads_dir='../resimler/slider';
	@$tmp_name=$_FILES['sliderresim'] ["tmp_name"];
	@$name=$_FILES['sliderresim'] ["name"];

	$sayi1=rand(1,1000000);
	$sayi2=rand(1,1000000);
	$sayi3=rand(10000,2000000);

	$sayilar=$sayi1.$sayi2.$sayi3;
	$resimyolu=$sayilar.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$resimyolu");


	$sliderKaydet=$baglanti->prepare("INSERT INTO slider SET
			
			slider_baslik=:slider_baslik,
			slider_aciklama=:slider_aciklama,
			slider_button=:slider_button,
			slider_link=:slider_link,
			slider_resim=:slider_resim,
			slider_sira=:slider_sira,
			slider_durum=:slider_durum,
			slider_banner=:slider_banner
		

		");  //yetki 2 ise admin

		$insert=$sliderKaydet->execute(array(
		
		'slider_baslik'=> $_POST['sliderbaslik'],
		'slider_aciklama'=> $_POST['slideraciklama'],
		'slider_button'=> $_POST['sliderbutton'],
		'slider_link'=> $_POST['sliderlink'],
		'slider_resim'=> $resimyolu,
		'slider_sira'=> $_POST['slidersira'],
		'slider_durum'=> $_POST['sliderdurum'],
		'slider_banner'=> $_POST['sliderbanner']


		

	));
		
		
		if($insert){
		header("Location:../slider?yuklenme=basarili");
		}else{
		header("Location:../slider?yuklenme=basarisiz");
		}
}



if(isset($_POST['sliderDuzenle'])){

	$uploads_dir='../resimler/slider';
	@$tmp_name=$_FILES['sliderresim'] ["tmp_name"];
	@$name=$_FILES['sliderresim'] ["name"];

	$sayi1=rand(1,1000000);
	$sayi2=rand(1,1000000);
	$sayi3=rand(10000,2000000);

	$sayilar=$sayi1.$sayi2.$sayi3;
	$resimyolu=$sayilar.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$resimyolu");


	$id=$_POST['slider_id'];

	//eğer yeni resim ile güncelleme yaptıysak eskisini silebiliriz

	if($_FILES['sliderresim']["size"]>0){
		$resimsil=$_POST['eskiSliderResim'];
		unlink("../resimler/slider/$resimsil");
	}


	$duzenle=$baglanti->prepare("UPDATE  slider SET
			
			slider_baslik=:slider_baslik,
			slider_aciklama=:slider_aciklama,
			slider_button=:slider_button,
			slider_link=:slider_link,
			slider_resim=:slider_resim,
			slider_sira=:slider_sira,
			slider_durum=:slider_durum,
			slider_banner=:slider_banner

			WHERE slider_id=$id
		

		");  //yetki 2 ise admin

		$update=$duzenle->execute(array(
		
		'slider_baslik'=> $_POST['sliderbaslik'],
		'slider_aciklama'=> $_POST['slideraciklama'],
		'slider_button'=> $_POST['sliderbutton'],
		'slider_link'=> $_POST['sliderlink'],
		'slider_resim'=> ($_FILES['sliderresim']["size"]>0) ? $resimyolu : $_POST['eskiSliderResim'],
		'slider_sira'=> $_POST['slidersira'],
		'slider_durum'=> $_POST['sliderdurum'],
		'slider_banner'=> $_POST['sliderbanner']
		

	));


	if($update){
		header("Location:../slider.php?yuklenme=basarili");
	}else{
		header("Location:../slider.php?yuklenme=basarisiz");
	}

}


if(isset($_POST['sliderSil'])){
	$sliderSil=$baglanti->prepare("DELETE from slider WHERE slider_id=:slider_id");
	$sil=$sliderSil->execute(array(

		'slider_id'=>$_POST['id'] 
	));

	if($sil){
		$resimsil=$_POST['resim'];
		unlink("../resimler/slider/$resimsil");
		header("Location:../slider?silme=basarili");
	}else{
		header("Location:../slider?silme=basarisiz");
	}
}



 ?>
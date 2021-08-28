<?php 
require_once 'admin/islem/baglanti.php';
session_start();

if (isset($_POST['login'])){
	$kadi=htmlspecialchars($_POST['kadi']);
	$sifre=htmlspecialchars($_POST['sifre']);
	$sifreguclu=md5($sifre);

	$kullanicisor=$baglanti->prepare(
		"SELECT * FROM kullanici 
		WHERE kullanici_adi=:kullanici_adi and 
		kullanici_sifre=:kullanici_sifre and 
		kullanici_yetki=:kullanici_yetki");

	$kullanicisor->execute(array(
		'kullanici_adi'=>$kadi,
		'kullanici_sifre'=>$sifreguclu,
		'kullanici_yetki'=>1 //normal kullanici (admin değil)
	));

	$varmi=$kullanicisor->rowCount();

	if($varmi>0){
		$_SESSION['normalgiris']=$kadi;
		header("Location:index");

	}else{
		header("Location:giris?girisdurum=hata");
	}
}


if(isset($_POST['register'])){	
	$kadi=htmlspecialchars($_POST['kadi']);
	$sifre=htmlspecialchars($_POST['sifre']);
	$sifretekrar=htmlspecialchars($_POST['sifretekrar']);
	$adsoyad=htmlspecialchars($_POST['adsoyad']);
	$email=htmlspecialchars($_POST['email']);
	
	//aynı kullanıcı varmı kontrol ediyoruz.
	$kullanicisor=$baglanti->prepare(
		"SELECT *FROM kullanici 
		WHERE kullanici_adi=:kullanici_adi and
		kullanici_yetki=:kullanici_yetki");

	$kullanicisor->execute(array(
		'kullanici_adi'=>$kadi,
		'kullanici_yetki'=>1 //normal kullanici (admin değil)
	));


	$varmi=$kullanicisor->rowCount();

	//kullanıcı varsa hata ver.yoksa  password ve password tekrar kontrolü yapalım.
	if($varmi>0){
		header("Location:giris?durum=kullaniciZatenVar");
	}else{
		//buda sağlanıyorsa karakter kontroll edelim. Oda sağlanıyorsa kayıt yapalım
		if($sifre==$sifretekrar){
			if(strlen($sifre)>=8){

			$kullaniciKaydet=$baglanti->prepare("INSERT INTO kullanici SET
			
			kullanici_adi=:kullanici_adi,
			kullanici_sifre=:kullanici_sifre,
			kullanici_adsoyad=:kullanici_adsoyad,
			kullanici_yetki=:kullanici_yetki,
			kullanici_mail=:kullanici_mail	

		");  //yetki 2 ise admin

		$insert=$kullaniciKaydet->execute(array(
		'kullanici_adi'=>$kadi,
		'kullanici_sifre'=>md5($sifre),
		'kullanici_adsoyad'=>$adsoyad,
		'kullanici_yetki'=>1,
		'kullanici_mail'=>$email
		
	));
		
		
		if($insert){
		header("Location:giris?durum=basarili");
		}else{
		header("Location:giris?durum=hata");
		}


			}else{
				header("Location:giris?durum=sifreKarakterHata");
			}

		}else{
			header("Location:giris?durum=sifrehata");
		}
		
	}
}


if(isset($_POST['sepeteEkle'])){

	$gelenUrl=$_SERVER['HTTP_REFERER'];

	$id=$_POST['urun_id'];
	$adet=$_POST['adet'];

	setcookie('sepet['.$id.']',$adet,strtotime("7day"));
	header("Location:$gelenUrl");
}


if(isset($_GET['sepetsil'])){
	$gelenUrl=$_SERVER['HTTP_REFERER'];
	
	$id=$_GET['id'];


	setcookie('sepet['.$id.']',"",strtotime("-7day"));

	
	header("Location:$gelenUrl");
}



if (isset($_POST['alisverisBitir'])) {

$toplamfiyat=$_POST['toplamfiyat'];
$kadi=$_POST['kadi'];


$alisveriskaydet=$baglanti->prepare("INSERT into siparisler SET 

			kullanici_id=:kullanici_id,
			urun_id=:urun_id,
			urun_adet=:urun_adet,

			urun_fiyat=:urun_fiyat,
			toplam_fiyat=:toplam_fiyat,
			odeme_turu=:odeme_turu,
			siparis_onay=:siparis_onay
");


$urunler=$baglanti->prepare("SELECT * FROM  urunler where urun_id=:urun_id  order by urun_sira ASC");

	foreach ($_COOKIE['sepet'] as $key => $value) {


		$urunler->execute(array(
			'urun_id'=>$key


		));
		$urunlercek=$urunler->fetch(PDO::FETCH_ASSOC);
		$fiyat=$urunlercek['urun_fiyat'];

		

		$insert=$alisveriskaydet->execute(array(
			'kullanici_id'=>$kadi,
			'urun_id'=>$key,
			'urun_adet'=>$value,
			'urun_fiyat'=>$fiyat,
			'toplam_fiyat'=>$toplamfiyat,
			'odeme_turu'=>$_POST['odeme'],
			'siparis_onay'=>0


		));

	}
		if ($insert) { 
			//ekleme başarılı ise sepeti temizledik.
			foreach ($_COOKIE['sepet'] as $key => $value) {
				setcookie('sepet['.$key.']',"",strtotime("-7day"));
			}
			header("Location:index");

		}
		else{
			header("Location:index");
		}

	}





 ?>
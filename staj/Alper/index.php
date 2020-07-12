<?php
include 'header.php';

session_start(); //oturum başlattık
include("connect.php"); //veri tabanına bağlandık

//eğer mevcut oturum varsa sayfayı yönlendiriyoruz.
if (isset($_SESSION["Oturum"]) && $_SESSION["Oturum"] == "6789") {
    header("location:index.php");
} //eğer önceden beni hatırla işaretlenmiş ise oturum oluşturup sayfayı yönlendiriyoruz.
else if (isset($_COOKIE["cerez"])) {
    //Kullanıcı adlarını çeken sorgumuz

    $sorgu = $baglanti->prepare("select mail from person");
    $sorgu->execute();


    //Kullanıcı adlarını döngü yardımı ile tek tek elde ediyoruz
    while ($sonuc = $sorgu->fetch()) {
        //eğer bizim belirlediğimiz yapıya uygun kullanıcı var mı diye bakıyoruz.
        if ($_COOKIE["cerez"] == md5("aa" . $sonuc['kullanici'] . "bb")) {

            //oturum oluşturma buradaki değerleri güvenlik açısından
            //farklı değerler yapabilirsiniz
            //aynı zamanda kullanıcı adınıda burada tuttum
            $_SESSION["Oturum"] = "6789";
            $_SESSION["kullanici"] = $sonuc['kullanici'];

            //sonrasında index sayfasına yönlendiriyorum
            header("location:index.php");
        }
    }
}
//Giriş formu doldurulmuşsa kontrol ediyoruz
if ($_POST) {
    $txtkullanici = $_POST["txtkullanici"]; //Kullanıcı adını değişkene atadık
    $txtParola = $_POST["txtParola"]; //Parolayı değişkene atadık
}

?>



<div class="container">
    <div class="row">
        <div class="col-9">
            <div class="slider">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://i.sozcu.com.tr/wp-content/uploads/2018/03/iecrop/e2-1_16_9_1521015127.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Gezilecek Yerler</h5>
                                <p>İstanbul,İzmir,Muğla,Antalya..</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.nevsehir-taksi.net/assets/images/nevsehir-gezilecek-yerler-16-9-1522310610-865x487.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Turlar</h5>
                                <p>Tur seyahatleri.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://kazaviti-thassos.com/wp-content/uploads/2017/07/kazaviti-restaurant-1-865x487.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Konaklama</h5>
                                <p>Pansiyonlar,evler,hoteller..</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="tickerv-wrap">
                <ul>
                    <li>Forum Başlık 1</li>
                    <li>Forum Başlık 2</li>
                    <li>Forum Başlık 3</li>
                    <li>Forum Başlık 4</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container1">
    <div class="row">
        <div class="col-8">
            <div class="card-group">

                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Keşfedilecek Yerler</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Keşfedilecek Yerler</h5>
                        <p class="card-text">Belki haber olur, belki forumdan bilgi..</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Keşfedilecek Yerler</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <H2> Bir şey eklenecek!</H2>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
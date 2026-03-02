# php-mysql-inner-join-example

> A practical example of using PHP and MySQL INNER JOIN to filter and display related database records.

Bu proje, PHP ve MySQL kullanılarak ilişkisel veritabanı (Relational Database) mantığının nasıl kurulacağını ve `INNER JOIN` ile farklı tablolardaki verilerin nasıl birleştirileceğini gösteren temel bir uygulamadır.

## 🚀 Proje Hakkında

Uygulama, veritabanında bulunan "Kategoriler" ve "Ürünler" tablolarını birbirine bağlar. Kullanıcı arayüzü üzerinden bir Kategori ID'si girildiğinde, sistem arka planda bu iki tabloyu `INNER JOIN` ile birleştirir ve sadece o kategoriye ait olan ürünleri listeler.

### Temel Özellikler:
* `mysqli` ile veritabanı bağlantısı.
* `INNER JOIN` sorguları ile ilişkili veri çekimi.
* URL parametreleri (`GET` metodu) ile dinamik veri filtreleme.
* Bulunamayan kategoriler veya boş kategoriler için hata/bilgi mesajları.

## 🛠️ Kullanılan Teknolojiler
* **Backend:** PHP
* **Veritabanı:** MySQL
* **Frontend:** HTML

## 🗄️ Veritabanı Yapısı

Sistem iki ana tablodan oluşmaktadır:

1. **kategoriler:**
   * `kategori_id` (Primary Key, INT)
   * `kategori_adi` (VARCHAR)

2. **urunler:**
   * `urun_id` (Primary Key, INT)
   * `urun_adi` (VARCHAR)
   * `fiyat` (DECIMAL/INT)
   * `kategori_id` (Foreign Key, INT) - *Kategoriler tablosu ile ilişkiyi sağlar.*

## ⚙️ Kurulum ve Çalıştırma

Projeyi kendi bilgisayarınızda çalıştırmak için aşağıdaki adımları izleyebilirsiniz:

1. Bu depoyu bilgisayarınıza klonlayın veya indirin.
2. XAMPP, WAMP veya benzeri bir yerel sunucu (localhost) başlatın.
3. Proje klasörünü yerel sunucunuzun kök dizinine (örn: `htdocs` veya `www`) taşıyın.
4. phpMyAdmin (veya kullandığınız veritabanı yöneticisi) üzerinden `odev_db` adında yeni bir veritabanı oluşturun.
5. Proje dizinindeki `veritabani.sql` dosyasını bu veritabanına içe aktarın (Import).
6. Tarayıcınızda `http://localhost/proje-klasor-adi/` adresine giderek projeyi görüntüleyin.

## 📬 İletişim

Geliştirici: Tolga  
E-posta: dev.tolgahanbulbul@gmail.com

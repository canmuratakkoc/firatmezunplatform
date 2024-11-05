# Mezun Paylaşım Platformu

Bu proje, Laravel kullanarak geliştirilen bir **mezun paylaşım platformu**dur. Platform, mezunların bir araya gelerek paylaşımlar yapabileceği ve iletişim kurabileceği bir ortam sağlamayı amaçlamaktadır. Facebook benzeri bir yapıya sahip olup, mezunlar arasında sosyal etkileşimi artırmayı hedefler.

## Özellikler

- **Profil Sayfası**: Mezunların kendilerini tanıtabileceği bir profil sayfası.
- **Paylaşım Yapma**: Mezunların gönderi, resim ve durum paylaşabileceği bir alan.
- **Yorum ve Beğeni**: Diğer mezunların paylaşımlarına yorum yapma ve beğenme.
- **Arkadaş Ekleme**: Mezunlar arasında arkadaş ekleme özelliği.
- **Bildirimler**: Beğeniler, yorumlar ve arkadaşlık istekleri için bildirimler.

## Kurulum

1. Gerekli bağımlılıkları yükleyin:

    ```bash
    composer install
    npm install
    ```

2. `.env` dosyasını oluşturun ve veritabanı bilgilerini doldurun:

    ```bash
    cp .env.example .env
    ```

3. Uygulama anahtarını oluşturun:

    ```bash
    php artisan key:generate
    ```

4. Veritabanını migrate edin ve gerekli tabloları oluşturun:

    ```bash
    php artisan migrate:fresh --seed
    ```

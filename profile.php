<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="images/favicon.ico">

    <!-- Boostrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.3/swiper-bundle.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">

    <title>Profile | PawMate</title>

</head>

<body>
    <?php require_once("src/header.php");
    $query = "SELECT * FROM kullanicilar WHERE kullanici_id = '".$_SESSION["user_id"]."'";
    $result = pg_query($conn, $query);
    $profileData = pg_fetch_assoc($result);
    ?>
    <section class="banner">
        <div class="container">
            <h1>Profil</h1>
        </div>
    </section>
    <section class="profile-container">
        <div class="container">
            <div class="form-info">
                <h1>Profil</h1>
                <div class="little-text">Profilinizi güncelleyin</div>
            </div>
            <form class="custom-form" name="profile_update_form" style="justify-content: space-between;" onsubmit="return false;" action="">
                <div class="half-input">
                    <input type="text" value="<?= $profileData["kullanici_ad"] ?>" name="profile_name" placeholder="Adınız">
                </div>
                <div class="half-input">
                    <input type="text" name="profile_surname" value="<?= $profileData["kullanici_soyad"] ?>" placeholder="Soyadınız" >
                </div>
                <div class="half-input">
                    <input type="text" name="profile_username" value="<?= $profileData["kullanici_nickname"] ?>" placeholder="Kullanıcı Adınız" >
                </div>
                <div class="half-input">
                    <input type="text" name="profile_phone-no" value="<?= $profileData["kullanici_telefon_no"] ?>" placeholder="Telefon No" >
                    <label for="phone-no" style="opacity: 50%; font-size:16px;">Telefon numaranızı başında 0 olmadan yazınız.</label>
                </div>
                <div>
                    <input type="text" name="profile_address" value="<?= $profileData["kullanici_adres"] ?>" placeholder="Adres" >
                </div>
                <div>
                    <input type="text" name="profile_email" value="<?= $profileData["kullanici_email"] ?>" placeholder="E-Mail" >
                </div>
                <div>
                <input type="text" name="previous_email" value="<?= $profileData["kullanici_email"] ?>"  hidden>
                <input type="text" name="previous_username" value="<?= $profileData["kullanici_nickname"] ?>" hidden >
                    <input type="password" name="profile_password" value="<?= $profileData["kullanici_sifre"] ?>" id="passwordField" placeholder="Şifre">
                    <button id="showPassword" type="button" class="btn btn-primary" style="margin-top: 5px;">Şifreyi göster</button>

                </div>
                <div class="btns">
                    <button class="custom-btn" id="update" type="submit">Güncelle</button>
                </div>

            </form>

        </div>
    </section>


    <?php include("src/footer.php"); ?>
</body>

<script>
const passwordField = document.getElementById('passwordField');
    const showPasswordButton = document.getElementById('showPassword');

    showPasswordButton.addEventListener('click', function() {
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            showPasswordButton.textContent = 'Şifreyi gizle';
        } else {
            passwordField.type = 'password';
            showPasswordButton.textContent = 'Şifreyi göster';
        }
    });

</script>
</html>
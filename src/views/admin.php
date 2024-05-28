<?php
session_start();

if (empty($_SESSION['id_admin'])) {
    echo "<script>
    alert('Sesi Anda telah habis!');
    window.location.assign('../../');
    </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Buku Tamu Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-900">
    <div class="m-10">
        <h1 class="font-bold text-2xl">Aplikasi Buku Tamu Sekolah</h1>
        <h3 class="mb-6 mt-1">Anda login sebagai <span class="font-bold"><?= ($_SESSION['level'] == 'admin') ? htmlspecialchars('Administrator') : htmlspecialchars('Petugas ' . $_SESSION['username']) ?></span></h3>
        <a class="m-[1px] bg-blue-500 hover:bg-blue-600 duration-300 text-white px-3 py-2 rounded-md" href="admin.php">Home</a>
        <a class="m-[1px] bg-blue-500 hover:bg-blue-600 duration-300 text-white px-3 py-2 rounded-md" href="?url=buku-tamu">Buku Tamu</a>
        <?php if ($_SESSION['level'] == 'admin') : ?>
            <a class="m-[1px] bg-blue-500 hover:bg-blue-600 duration-300 text-white px-3 py-2 rounded-md" href="?url=petugas">Petugas</a>
        <?php endif ?>

        <a class="max-sm:inline-block max-sm:mt-3 md:absolute md:top-0 md:right-0 md:m-20 bg-red-500 hover:bg-red-600 duration-300 text-white px-3 py-2 rounded-md text-sm" href="../controllers/LogoutController.php">Logout</a>

        <hr class="mt-6">
        <?php if (empty($_GET['url'])) : ?>
            <h1 class="mt-4 font-bold text-xl">Selamat Datang di Aplikasi Buku Tamu Sekolah</h1>
            <p>Aplikasi ini berguna untuk mencatat tamu yang datang beserta keperluannya.</p>
        <?php else :
            $url = $_GET['url'];
            include "./layouts/$url.php";
        endif
        ?>
    </div>
</body>

</html>
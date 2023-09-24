<?php

require_once(__DIR__ . "/functions.php");

redirectIfNotPostRequest();

try {
    $conn = new PDO("mysql:dbname=challenge_16_php_pdo;host=localhost;", "root", "");
} catch (PDOException $e) {
    echo "Try again later";
    die();
}

$page1 = "form.php";
$page2 = "company.php?id=";

$cover_img = $_POST["cover-img"];
$main_title = $_POST["main-title"];
$subtitle = $_POST["subtitle"];
$about = $_POST["about"];
$phone = $_POST["phone"];
$location = $_POST["location"];
$offer = $_POST["offer"];
$catalogue_img_1 = $_POST["catalogue-img-1"];
$catalogue_desc_1 = $_POST["catalogue-desc-1"];
$catalogue_img_2 = $_POST["catalogue-img-2"];
$catalogue_desc_2 = $_POST["catalogue-desc-2"];
$catalogue_img_3 = $_POST["catalogue-img-3"];
$catalogue_desc_3 = $_POST["catalogue-desc-3"];
$contact_info = $_POST["contact-info"];
$linkedin = $_POST["linkedin"];
$facebook = $_POST["facebook"];
$twitter = $_POST["twitter"];
$instagram = $_POST["instagram"];

requiredFieldsLogin($page1, $cover_img, $main_title, $subtitle, $about, $phone, $location, $offer, $catalogue_img_1, $catalogue_desc_1, $catalogue_img_2, $catalogue_desc_2, $catalogue_img_3, $catalogue_desc_3, $contact_info, $linkedin, $facebook, $twitter, $instagram);

$sql = "INSERT INTO company_webs (cover_img, main_title, subtitle, about_you, phone, offer, location, img_url_1, description_1, img_url_2, description_2, img_url_3, description_3, company_description, linkedin, facebook, twitter, instagram) 
            VALUES (:cover_img, :main_title, :subtitle, :about_you, :phone, :offer, :location, :img_url_1, :description_1, :img_url_2, :description_2, :img_url_3, :description_3, :company_description, :linkedin, :facebook, :twitter, :instagram)";

$statement = $conn->prepare($sql);

if ($statement->execute(
    [
        'cover_img' => $cover_img,
        'main_title' => $main_title,
        'subtitle' => $subtitle,
        'about_you' => $about,
        'phone' => $phone,
        'offer' => $offer,
        'location' => $location,
        'img_url_1' => $catalogue_img_1,
        'description_1' => $catalogue_desc_1,
        'img_url_2' => $catalogue_img_2,
        'description_2' => $catalogue_desc_2,
        'img_url_3' => $catalogue_img_3,
        'description_3' => $catalogue_desc_3,
        'company_description' => $contact_info,
        'linkedin' => $linkedin,
        'facebook' => $facebook,
        'twitter' => $twitter,
        'instagram' => $instagram
    ]
)) {
    $sql_getLastID = "SELECT id FROM `company_webs` ORDER BY id DESC LIMIT 1";

    $statement = $conn->query($sql_getLastID);
    $row = $statement->fetch();
    $lastID = $row['id'];

    redirect($page2 . $lastID);
    die();
}

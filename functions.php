<?php

function redirect($url)
{
    header("Location: $url");
    die();
}

function redirectIfNotPostRequest()
{
    if ($_SERVER['REQUEST_METHOD'] != "POST") {
        redirect("index.php");
    }
}

function requiredFieldsLogin($page, $cover_img, $main_title, $subtitle, $about, $phone, $location, $offer, $catalogue_img_1, $catalogue_desc_1, $catalogue_img_2, $catalogue_desc_2, $catalogue_img_3, $catalogue_desc_3, $contact_info, $linkedin, $facebook, $twitter, $instagram)
{
    if (
        empty($cover_img)
        || empty($main_title)
        || empty($subtitle)
        || empty($about)
        || empty($phone)
        || empty($location)
        || empty($offer)
        || empty($catalogue_img_1)
        || empty($catalogue_desc_1)
        || empty($catalogue_img_2)
        || empty($catalogue_desc_2)
        || empty($catalogue_img_3)
        || empty($catalogue_desc_3)
        || empty($contact_info)
        || empty($linkedin)
        || empty($facebook)
        || empty($twitter)
        || empty($instagram)
    ) {
        redirect("$page?status=error&reason=fieldsempty");
    }
}

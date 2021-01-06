<?php
if (isset($_SESSION['success_message']))
{
    echo '<div class="alert alert-success fade show" role="alert">'. $_SESSION['success_message'] . '</div>';

    unset($_SESSION['success_message']);
}
if (isset($_SESSION['error_message']))
{
    echo '<div class="alert alert-danger fade show" role="alert">'. $_SESSION['error_message'] . '</div>';
    unset($_SESSION['error_message']);
}
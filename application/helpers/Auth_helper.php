<?php

defined('BASEPATH') or exit('No direct script access allowed');

function cek_login()
{
    $CI = &get_instance();
    $username = $CI->session->username;

    if ($username == NULL) {
        $CI->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Belum Login!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('auth');
    }
}

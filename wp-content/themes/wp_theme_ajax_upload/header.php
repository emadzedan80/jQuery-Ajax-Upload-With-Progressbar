<!DOCTYPE html>
<html>

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no">
      <title>Basic WordPress Theme</title>
      <?php wp_head(); ?>
</head>

<body>
      <header>
            <div class="container">
                  <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="<?php echo site_url(''); ?>">
                              <span class="custom-logo-link">
                                    <?php
                                    if (function_exists('the_custom_logo')) {
                                          the_custom_logo();
                                    }
                                    ?>
                              </span>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                              data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                              aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                              <ul class="navbar-nav">
                                    <li class="nav-item">
                                          <a class="nav-link" href="<?php echo site_url(''); ?>">Version1 (Upload & Echo)</a>
                                    </li>
                                    <li class="nav-seperator"> | </li>
                                    <li class="nav-item">
                                          <a class="nav-link" href="<?php echo site_url('version2'); ?>">Version2 (Upload & Google Sheet Using Zapier)</a>
                                    </li>
                                    <li class="nav-seperator"> | </li>
                                    <li class="nav-item">
                                          <a class="nav-link" href="<?php echo site_url('version3'); ?>">Version3 (Upload & DB)</a>
                                    </li>
                                    <li class="nav-seperator"> | </li>
                                    <li class="nav-item">
                                          <a class="nav-link" href="<?php echo site_url('version4'); ?>">Version4 (Upload & HubSpot API)</a>
                                    </li>
                              </ul>
                        </div>
                  </nav>
            </div>
      </header>
      <main>
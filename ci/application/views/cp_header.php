<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="" />

    <title>PANEL DE CONTROL</title>

    <link rel="stylesheet" href="<?=base_url()?>assets_cp/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets_cp/css/font-icons/entypo/css/entypo.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
    <link rel="stylesheet" href="<?=base_url()?>assets_cp/css/bootstrap.css">
    <link rel="stylesheet" href="<?=base_url()?>assets_cp/css/neon-core.css">
    <link rel="stylesheet" href="<?=base_url()?>assets_cp/css/neon-theme.css">
    <link rel="stylesheet" href="<?=base_url()?>assets_cp/css/neon-forms.css">
    <link rel="stylesheet" href="<?=base_url()?>assets_cp/css/custom.css">

    <link rel="stylesheet" href="<?=base_url()?>assets_cp/css/bootstrap-chosen.css">

    <script src="<?=base_url()?>assets_cp/js/jquery-1.11.0.min.js"></script>
    <script>$.noConflict();</script>

    <!--[if lt IE 9]><script src="<?=base_url()?>assets_cp/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        .tr_lista_cliente{
            cursor: context-menu;
        }
        body{
            overflow-y: scroll;
        }
        .mbf{
            margin: 0 0 20px 0;
        }
    </style>
</head>
<body class="page-body  page-left-in" data-url="<?=base_url()?>">

        <div class="page-container">
    
    <div class="sidebar-menu">

        <div class="sidebar-menu-inner">
            
            <header class="logo-env">

                <div class="logo">
                    <a href="<?=base_url()?>">
                        <img src="<?=base_url()?>assets_cp/images/logo-massive.png" width="120" alt="" />
                    </a>
                </div>

                <div class="sidebar-collapse">
                    <a href="#" class="sidebar-collapse-icon">
                        <i class="entypo-menu"></i>
                    </a>
                </div>

                                
                <div class="sidebar-mobile-menu visible-xs">
                    <a href="#" class="with-animation">
                        <i class="entypo-menu"></i>
                    </a>
                </div>

            </header>
            
                        
            
                                    
            <ul id="main-menu" class="main-menu">
                <li class="opened active">
                    <a href="<?=base_url()?>">
                        <i class="entypo-gauge"></i>
                        <span class="title">Módulos</span>
                    </a>
                    <ul>
                        <li>
                            <a class="active" href="<?=base_url()?>control_panel/productos">
                                <span class="title">Productos</span>
                            </a>
                        </li>
                    </ul>
                </li>
                
                
            </ul>
            
        </div>

    </div>

    <div class="main-content">
                
        <div class="row">
        
            <div class="col-md-6 col-sm-8 clearfix">
        
        
                    
                
        
            </div>
        
        
            <div class="col-md-6 col-sm-4 clearfix hidden-xs">
        
                <ul class="list-inline links-list pull-right">
        
                    <li>
                        <a href="extra-login.html">
                            Salir <i class="entypo-logout right"></i>
                        </a>
                    </li>
                </ul>
        
            </div>
        
        </div>
        
        <hr />
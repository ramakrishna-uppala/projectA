<?php
/**
 * Template Admin
 * 
 * Template usage
 *  $data['page'] = array(
 *      'title' => 'Main Title',                                - 
 *      'page_title' => 'Page Tilte',                           -
 *      'breadcrumb' => [['name' => 'name', 'url' => 'url']],   -
 *      'layout' => 1,                                          - Optional [0 or 1] for fullscreen pages like dahsboards etc,.
 *      'js' => [file1, file2,],                                - load path public/js/<file-name>
 *      'css' => [file1, file,],                                - load path public/css/<file-name>
 *  );
 * @author Ramakrishna<rama@highgoweb.com>
 * @version 1.0
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= esc(PROJECT_TITLE) ?> : <?= esc($page['title']) ?></title>
        <!-- CSS files -->
        <link rel="stylesheet" type="text/css" href="<?= WEBROOT ?>html/bootstrap-5.3/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?= WEBROOT ?>html/bootstrap-5.3/icons/bootstrap-icons.css">
        <link rel="stylesheet" type="text/css" href="<?= WEBROOT ?>html/template/theme/css/template_admin_theme.css">
        <link rel="stylesheet" type="text/css" href="<?= WEBROOT ?>html/template/template_admin.css">
        
        <!-- menu css -->
        <?
        // Project CSS files
        if(isset($page['css'])) {
            foreach($page['css'] as $css_file) {
                ?><link rel="stylesheet" type="text/css" href="<?= WEBROOT ?>html/<?= $css_file ?>.css"><?
            }
        }
        ?>
        <!-- JS files -->
        <script type="text/javascript" src="<?= WEBROOT ?>html/jquery/jquery-3.7.1.min.js"></script>
        <script type="text/javascript" src="<?= WEBROOT ?>html/bootstrap-5.3/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="<?= WEBROOT ?>html/js/main.js"></script>
        <script type="text/javascript">var WEBROOT = '<?= WEBROOT ?>';</script>
        <?
        // Project JS files
        if(isset($page['js'])) {
            foreach($page['js'] as $js_file) {
                ?><script type="text/javascript" src="<?= WEBROOT ?>html/<?= $js_file ?>.js"></script><?
            }
        }
        ?>
        <!-- Bootstrap select files -->
        <link rel="stylesheet" href="<?= WEBROOT ?>html/bootstrap-select/css/bootstrap-select.min.css" />
        <script src="<?= WEBROOT ?>html/bootstrap-select/js/bootstrap-select.min.js"></script>
        <!-- Date Picker Files -->
        <link rel="stylesheet" type="text/css" href="/invoiceTracking/public/date-picker/datepicker.min.css" />
        <script type="text/javascript" src="/invoiceTracking/public/date-picker/datepicker.min.js"></script>
    </head>
    <body>
        <div class="wrapper position-relative">
            <?
            $page_layout = isset($page['layout']) ? $page['layout'] : 0;
            ?>
            <? // Load main navigation ?>
            <?= view_cell('Navigation::templateAdminMainNavigation') ?>
            <div class="page-body content-page">
                <div class="content">
                    <div class="container-fluid">
                        <? if($page_layout == 0):?>
                            <div class="page-card-header d-flex justify-content-between align-items-center mb-3 mt-3 pt-1 pb-1">
                                <div class="page-title"><h4><?= esc($page['page_title']); ?></h4></div>
                                <nav aria-label="breadcrumb" class="page-breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= esc(WEBROOT) ?>">Home</a></li>
                                        <?
                                        if(isset($page['breadcrumb'])) {
                                            foreach($page['breadcrumb'] as $breadcrumb_item) {
                                                ?><li class="breadcrumb-item"><a href="<?= esc(WEBROOT) . esc($breadcrumb_item['url']) ?>"><?= esc($breadcrumb_item['name']) ?></a></li><?
                                            }
                                        }
                                        ?>
                                        <li class="breadcrumb-item active" aria-current="page"><?= esc($page['page_title']); ?></li>
                                    </ol>
                                </nav>
                            </div>
                        <? endif;?>
                        <div class="page-content"><?= $this->renderSection('page'); ?></div>
                    </div>
                </div>
                <footer>
                    <div class="text-center footer">
                        &copy;<?= date('Y');?> HighGo&reg;
                    </div>
                </footer>
            </div>
        </div>
        <script type="text/javascript" src="<?= WEBROOT ?>html/template/theme/js/menu.js"></script><!-- menu js -->
    </body>
</html>
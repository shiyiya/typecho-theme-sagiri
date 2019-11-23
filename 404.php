<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('component/header.php'); ?>

<div id="main" class="main" role="main">
    <section class="home-404">
        <h1>Oh, Oooops!</h1>
        <p>Something went worong.Please try again</p>
        <a href="<?php $this->options->siteUrl() ?>" class="btn">Go home</a>
    </section>
</div>

<style>
    .header-wrap {
        display: none
    }

    #main {
        height: 100%;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .home-404 {
        font-family: 'Telefon Black', Sans-Serif;
        animation: fade-in-top 2s;
    }

    .home-404 h1 {
        font-size: 64px;
        font-family: 'Telefon Black', Sans-Serif;
    }

    .home-404 p {
        font-size: 24px;
        font-family: 'Telefon Black', Sans-Serif;
    }

    .home-404 .btn {
        padding: 16px 36px;
        box-shadow: 3px 3px 2px #ccc;
        border: 1px solid #505160;
        border-radius: 3px;
        font-size: 16px;
    }

    .home-404 .btn:hover {
        font-weight: 600;
        border-width: 2px;
    }

    #footer {
        display: none;
    }
</style>

<?php $this->need('component/footer.php'); ?>
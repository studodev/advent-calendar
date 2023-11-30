<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Calendrier de l'Avent découverte</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?&family=Space+Mono&family=Comfortaa:wght@600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/icon.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/app.js" defer></script>
    </head>
    <body>
        <header>
            <img src="images/logo.png" alt="Logo de studo.dev">
            <span>vous accompagne avant Noël ...</span>
        </header>

        <div id="calendar">
            <?php foreach ($items as $key => $item) { ?>
                <?php $opened = $item->getDrawDate() !== null; ?>

                <div class="case <?php echo $opened ? 'opened' : ''; ?>"
                     data-name="<?php echo $item->getName(); ?>"
                     data-day="<?php echo $key; ?>"
                >
                    <div class="case-content">
                        <div class="case-content__back">
                            <i class="icon icon-<?php echo $item->getType()->value; ?>"></i>
                            <?php echo $item->getName(); ?>
                        </div>
                        <div class="case-content__front">
                            <span><?php echo $key; ?></span>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </body>
</html>

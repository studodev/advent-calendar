<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Calendrier de l'Avent découverte</title>

        <link rel="stylesheet" href="css/style.css">
        <script src="js/app.js" defer></script>
    </head>
    <body>
        <div id="calendar">
            <?php foreach ($items as $key => $item) { ?>
                <?php $opened = $item->getDrawDate() !== null; ?>

                <div class="case <?php echo $opened ? 'opened' : ''; ?>"
                     data-name="<?php echo $item->getName(); ?>"
                     data-day="<?php echo $key; ?>"
                >
                    <div class="case-content">
                        <div class="case-content__back">
                            <?php echo $item->getName(); ?>
                        </div>
                        <div class="case-content__front">
                            <?php echo $key; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </body>
</html>

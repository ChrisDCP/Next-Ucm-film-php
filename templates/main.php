<main>
    <section>
        <img src="<?= $poster_url; ?>" width="250" alt="poster de <?= $title; ?> "
        style= "border-radius: 16px">
    </section>

    <hgroup>
        <h3><?= $title;?> - <?=$until_message?></h3>
        <p>Fecha de estreno: <?= $release_date?></p>
        <p>La siguiente es: <?= $following_production ?></p>
    </hgroup>

</main>

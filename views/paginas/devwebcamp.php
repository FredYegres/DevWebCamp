<main class="devwebcamp">
    <h2 class="devwebcamp__heading"><?php echo $titulo; ?></h2>
    <p class="devwebcamp__descripcion">Conoce la conferencia más importante de Latinoamérica</p>

    <div class="devwebcamp__grid">
        <div <?php aos_animacion(); ?> class="devwebcamp__imagen">
            <picture>
                <source srcset="build/img/sobre_devwebcamp.avif" type="image/avif">
                <source srcset="build/img/sobre_devwebcamp.webp" type="image/webp">
                <img src="build/img/sobre_devwebcamp.jpg" loading="lazy" width="200" height="300" alt="imagen devwebcamp">
            </picture>
        </div>

        <div class="devwebcamp__contenido">
            <p <?php aos_animacion(); ?> class="devwebcamp__texto">Sed tellus magna, porttitor sit amet nisl et, faucibus vestibulum dui. Integer mollis sapien sit amet sollicitudin ultrices. Ut ac facilisis tellus. Duis urna odio, sagittis nec posuere at, ultricies sed quam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Interdum et malesuada fames ac ante ipsum primis in faucibus. </p>

            <p <?php aos_animacion(); ?> class="devwebcamp__texto">Sed tellus magna, porttitor sit amet nisl et, faucibus vestibulum dui. Integer mollis sapien sit amet sollicitudin ultrices. Ut ac facilisis tellus. Duis urna odio, sagittis nec posuere at, ultricies sed quam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Interdum et malesuada fames ac ante ipsum primis in faucibus. </p>
        </div>
    </div>
</main>
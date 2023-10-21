<!-- Vista previa -->
<div class="contPreCarga">
    <h3>Vista previa</h3>
    <div class="contVista">
        <div class="contVista-info">
            <div class="contVista-info-title-1">
                <h4 id="previewTitle">Titulo</h4>
                <p id="previewCategory">Categoria</p>
            </div>
            <div class="contVista-info-title-2">
                <p id="previewPrice">C$100</p>
                <div class="contVista-info-perfil">
                    <img src="\img\perfil.png" alt="">
                    <p>
                        <?php
                        $firstName = explode(' ', Auth::user()->name)[0];
                        $lastName = explode(' ', Auth::user()->last_name)[0];
                        echo $firstName . ' ' . $lastName;
                        ?>
                    </p>
                </div>
            </div>
            <div class="contVista-info-descrip">
                <p id="previewDescription">Descripción</p>
                <p></p>
            </div>
            <div class="contVista-info-btn-public">
                <button class="btn-public-com">
                    <i class="fi fi-rr-redo"></i>
                </button>
                <button class="btn-public-fav">
                    <i class="fi fi-rr-heart"></i>
                    <P>Favoritos</P>
                </button>
                <button class="btn-public-men">
                    <i class="fi fi-rr-comment"></i>
                    <p>Enviar un mensaje</p>
                </button>
            </div>
        </div>
        <div class="contVista-Pre">
            <div class="contVista-Pre-carrusel">
                <i class="fi fi-rr-angle-small-left"></i>
                <i class="fi fi-rr-angle-small-right"></i>
            </div>

            <div class="contVista-Pre-img">
                <img id="previewImage" src="{{ $post->url()}}" alt="">
            </div>

        </div>
    </div>
</div>
